<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reintegros_Controller extends CI_Controller {

	private $flagR;
	private $flagI;
	private $flagU;
	private $flagD;
	private $flags;

	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('logged_in') == true) { 
			$this->load->model('reintegros_model');
			$this->config->load('reintegros_settings');
			$data['flags'] = $this->basicauth->getPermissions('reintegros');
			$this->flagR = $data['flags']['flag-read'];
			$this->flagI = $data['flags']['flag-insert'];
			$this->flagU = $data['flags']['flag-update'];
			$this->flagD = $data['flags']['flag-delete'];
			$this->flags = array('r'=>$this->flagR,'i'=>$this->flagI,'u'=>$this->flagU,'d'=>$this->flagD);
		}
	}

	function index()
	{
		//code here
		if($this->flagR){
			$data['flag'] = $this->flags;
			$data['title_header'] = $this->config->item('recordListTitle');
			$this->search_c();
		}

	}


	/**
	 * This function validates and sends the data to the 
	 * method of the model responsible for saving 
	 * the data in the db
	 *
	 * @access public
	 * @return void
	 */
	function add_c()
	{
		//code here
		if(!$this->flagI){
			echo $this->config->item('accessTitle');
			exit();
		}

		$data = array();
		$data['title_header'] = $this->config->item('recordAddTitle');
	
		$this->form_validation->set_rules('tipo', 'tipo', 'trim|integer|xss_clean');
		$this->form_validation->set_rules('monto', 'monto', 'trim|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('persona_id', 'persona_id', 'trim|required|integer|xss_clean');
		
		
		if($this->form_validation->run())
		{	
			$data_reintegros  = array();
			$data_reintegros['tipo'] = $this->input->post('tipo');
			$data_reintegros['monto'] = $this->input->post('monto');
			$data_reintegros['persona_id'] = $this->input->post('persona_id');
			$data_reintegros['updated_at'] = $this->basicrud->formatDateToBD();

			$id_reintegros = $this->reintegros_model->add_m($data_reintegros);
			if($id_reintegros){ 
				$this->session->set_flashdata('flashConfirm', $this->config->item('reintegros_flash_add_message')); 
				redirect('reintegros_controller','location');
			}else{
				$this->session->set_flashdata('flashError', $this->config->item('reintegros_flash_error_message')); 
				redirect('reintegros_controller','location');
			}
		}
		$this->load->view('reintegros_view/form_add_reintegros',$data);

	}


	/**
	 * This function validates and sends the data to the 
	 * method of the model responsible for updating 
	 * the data in the db
	 *
	 * @access public
	 * @return void
	 */
	function edit_c($id)
	{
		//code here
		if(!$this->flagU){
			echo $this->config->item('accessTitle');
			exit();
		}

		$data = array();
		$data['title_header'] = $this->config->item('recordEditTitle');
		$data['reintegros'] = $this->reintegros_model->get_m(array('id' => $id),$flag=1);
		
		$this->form_validation->set_rules('id', 'id', 'trim|required|integer|xss_clean');
		$this->form_validation->set_rules('tipo', 'tipo', 'trim|integer|xss_clean');
		$this->form_validation->set_rules('monto', 'monto', 'trim|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('persona_id', 'persona_id', 'trim|required|integer|xss_clean');
		
		
		if($this->form_validation->run()){
			$data_reintegros  = array();
			$data_reintegros['id'] = $this->input->post('id');
			$data_reintegros['tipo'] = $this->input->post('tipo');
			$data_reintegros['monto'] = $this->input->post('monto');
			$data_reintegros['persona_id'] = $this->input->post('persona_id');
			$data_reintegros['updated_at'] = $this->basicrud->formatDateToBD();

			if($this->reintegros_model->edit_m($data_reintegros)){ 
				$this->session->set_flashdata('flashConfirm', $this->config->item('reintegros_flash_edit_message')); 
				redirect('reintegros_controller','location');
			}else{
				$this->session->set_flashdata('flashError', $this->config->item('reintegros_flash_error_message')); 
				redirect('reintegros_controller','location');
			}
		}
		$this->load->view('reintegros_view/form_edit_reintegros',$data);

	}


	/**
	 * This function sends the id of record to the
	 * method of the model responsible for deleting 
	 * the record in the db
	 *
	 * @access public
	 * @param $id id of record
	 * @return void
	 */
	function delete_c($id)
	{
		//code here
		if(!$this->flagD){
			echo $this->config->item('accessTitle');
			exit();
		}

		if($this->reintegros_model->delete_m($id)){ 
			$this->session->set_flashdata('flashConfirm', $this->config->item('reintegros_flash_delete_message')); 
			redirect('reintegros_controller','location');
		}else{
			$this->session->set_flashdata('flashError', $this->config->item('reintegros_flash_error_delete_message')); 
			redirect('reintegros_controller','location');
		}

	}


	/**
	 * This function filter and sends the data to the view
	 * to shows the found result
	 *
	 * @access public
	 * @return void
	 */
	function search_c($offset = 0)
	{
		//code here
		$data = array(); 
		$fieldSearch = array(); 
		$data_search_reintegros = array(); 
		$data_search_pagination = array(); 
		
		if($this->flagR)
		{
			$fieldSearch = $this->basicrud->getFieldSearch($this->reintegros_model->getFieldsTable_m());
			foreach($fieldSearch as $field)
			{
				if($this->input->post($field) != '') 
				{
					$data_search_reintegros[$field] = $this->input->post($field);
					$data_search_pagination[$field] = $this->input->post($field);
				}
			}

			$data_search_pagination['count'] = true;
			$data_search_reintegros['limit'] = $this->config->item('pag_perpage');
			$data_search_reintegros['offset'] = $offset;
			$data_search_reintegros['sortBy'] = 'id';
			$data_search_reintegros['sortDirection'] = 'asc';

			$data['pagination'] = $this->basicrud->getPagination(array('nameModel'=>'reintegros_model','perpage'=>$this->config->item('pag_perpage')),$data_search_pagination);
			$data['reintegros'] = $this->reintegros_model->get_m($data_search_reintegros);
			
			$data['flag'] = $this->flags;
			$this->load->view('reintegros_view/record_list_reintegros',$data);
		}

	}

}