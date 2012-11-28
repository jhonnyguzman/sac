<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rubros_Controller extends CI_Controller {

	private $flagR;
	private $flagI;
	private $flagU;
	private $flagD;
	private $flags;

	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('logged_in') == true) { 
			$this->load->model('rubros_model');
			$this->config->load('rubros_settings');
			$data['flags'] = $this->basicauth->getPermissions('rubros');
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
			$data['fieldSearch'] = $this->basicrud->getFieldSearch($this->rubros_model->getFieldsTable_m());
			$this->load->view('rubros_view/home_rubros', $data);
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
		
		$this->form_validation->set_rules('nombre', 'nombre', 'trim|required|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('es_monto_transferible', 'es_monto_transferible', 'trim|required|integer|xss_clean');
		
		if($this->form_validation->run())
		{	
			$data_rubros  = array();
			$data_rubros['nombre'] = $this->input->post('nombre');
			$data_rubros['es_monto_transferible'] = $this->input->post('es_monto_transferible');
			$data_rubros['updated_at'] = $this->basicrud->formatDateToBD();

			$id_rubros = $this->rubros_model->add_m($data_rubros);
			if($id_rubros){ 
				$this->session->set_flashdata('flashConfirm', $this->config->item('rubros_flash_add_message')); 
				redirect('rubros_controller','location');
			}else{
				$this->session->set_flashdata('flashError', $this->config->item('rubros_flash_error_message')); 
				redirect('rubros_controller','location');
			}
		}
		$this->load->view('rubros_view/form_add_rubros',$data);

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
		$data['rubros'] = $this->rubros_model->get_m(array('id' => $id),$flag=1);
	
		$this->form_validation->set_rules('id', 'id', 'trim|required|integer|xss_clean');
		$this->form_validation->set_rules('nombre', 'nombre', 'trim|required|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('es_monto_transferible', 'es_monto_transferible', 'trim|required|integer|xss_clean');
		if($this->form_validation->run()){
			$data_rubros  = array();
			$data_rubros['id'] = $this->input->post('id');
			$data_rubros['nombre'] = $this->input->post('nombre');
			$data_rubros['es_monto_transferible'] = $this->input->post('es_monto_transferible');
			$data_rubros['updated_at'] = $this->basicrud->formatDateToBD();

			if($this->rubros_model->edit_m($data_rubros)){ 
				$this->session->set_flashdata('flashConfirm', $this->config->item('rubros_flash_edit_message')); 
				redirect('rubros_controller','location');
			}else{
				$this->session->set_flashdata('flashError', $this->config->item('rubros_flash_error_message')); 
				redirect('rubros_controller','location');
			}
		}
		$this->load->view('rubros_view/form_edit_rubros',$data);

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

		if($this->rubros_model->delete_m($id)){ 
			$this->session->set_flashdata('flashConfirm', $this->config->item('rubros_flash_delete_message')); 
			redirect('rubros_controller','location');
		}else{
			$this->session->set_flashdata('flashError', $this->config->item('rubros_flash_error_delete_message')); 
			redirect('rubros_controller','location');
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
		$data_search_rubros = array(); 
		$data_search_pagination = array(); 
		
		if($this->flagR)
		{
			$fieldSearch = $this->basicrud->getFieldSearch($this->rubros_model->getFieldsTable_m());
			foreach($fieldSearch as $field)
			{
				if($this->input->post($field) != '') 
				{
					$data_search_rubros[$field] = $this->input->post($field);
					$data_search_pagination[$field] = $this->input->post($field);
				}
			}

			$data_search_pagination['count'] = true;
			$data_search_rubros['limit'] = $this->config->item('pag_perpage');
			$data_search_rubros['offset'] = $offset;
			$data_search_rubros['sortBy'] = 'id';
			$data_search_rubros['sortDirection'] = 'asc';

			$data['pagination'] = $this->basicrud->getPagination(array('nameModel'=>'rubros_model','perpage'=>$this->config->item('pag_perpage')),$data_search_pagination);
			$data['rubros'] = $this->rubros_model->get_m($data_search_rubros);
		
			$data['flag'] = $this->flags;
			$this->load->view('rubros_view/record_list_rubros',$data);
		}

	}

}