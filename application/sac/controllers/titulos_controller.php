<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Titulos_Controller extends CI_Controller {

	private $flagR;
	private $flagI;
	private $flagU;
	private $flagD;
	private $flags;

	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('logged_in') == true) { 
			$this->load->model('titulos_model');
			$this->load->model('tabgral_model');
			$this->config->load('titulos_settings');
			$data['flags'] = $this->basicauth->getPermissions('titulos');
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
			$data['fieldSearch'] = $this->basicrud->getFieldSearch($this->titulos_model->getFieldsTable_m());
			$this->load->view('titulos_view/home_titulos', $data);
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
		$this->form_validation->set_rules('tipo', 'tipo', 'trim|integer|xss_clean');
		
		if($this->form_validation->run())
		{	
			$data_titulos  = array();
			$data_titulos['nombre'] = $this->input->post('nombre');
			$data_titulos['tipo'] = $this->input->post('tipo');
			$data_titulos['updated_at'] = $this->basicrud->formatDateToBD();

			$id_titulos = $this->titulos_model->add_m($data_titulos);
			if($id_titulos){ 
				$this->session->set_flashdata('flashConfirm', $this->config->item('titulos_flash_add_message')); 
				redirect('titulos_controller','location');
			}else{
				$this->session->set_flashdata('flashError', $this->config->item('titulos_flash_error_message')); 
				redirect('titulos_controller','location');
			}
		}else{
			$data['tipos'] = $this->tabgral_model->get_m(array('grupos_tabgral_id' => 4));
			$this->load->view('titulos_view/form_add_titulos',$data);
		}
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
		$data['titulos'] = $this->titulos_model->get_m(array('id' => $id),$flag=1);
		$data['tipos'] = $this->tabgral_model->get_m(array('grupos_tabgral_id' => 4));
		
		$this->form_validation->set_rules('id', 'id', 'trim|required|integer|xss_clean');
		$this->form_validation->set_rules('nombre', 'nombre', 'trim|required|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('tipo', 'tipo', 'trim|integer|xss_clean');
		if($this->form_validation->run()){
			$data_titulos  = array();
			$data_titulos['id'] = $this->input->post('id');
			$data_titulos['nombre'] = $this->input->post('nombre');
			$data_titulos['tipo'] = $this->input->post('tipo');
			$data_titulos['updated_at'] = $this->basicrud->formatDateToBD();

			if($this->titulos_model->edit_m($data_titulos)){ 
				$this->session->set_flashdata('flashConfirm', $this->config->item('titulos_flash_edit_message')); 
				redirect('titulos_controller','location');
			}else{
				$this->session->set_flashdata('flashError', $this->config->item('titulos_flash_error_message')); 
				redirect('titulos_controller','location');
			}
		}
		$this->load->view('titulos_view/form_edit_titulos',$data);

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

		if($this->titulos_model->delete_m($id)){ 
			$this->session->set_flashdata('flashConfirm', $this->config->item('titulos_flash_delete_message')); 
			redirect('titulos_controller','location');
		}else{
			$this->session->set_flashdata('flashError', $this->config->item('titulos_flash_error_delete_message')); 
			redirect('titulos_controller','location');
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
		$data_search_titulos = array(); 
		$data_search_pagination = array(); 
		$flag = 0; 
		$data['flag'] = $this->flags;
		if($this->flagR)
		{
			$fieldSearch = $this->basicrud->getFieldSearch($this->titulos_model->getFieldsTable_m());
			foreach($fieldSearch as $field)
			{
				if($this->input->post($field) != '') 
				{
					$data_search_titulos[$field] = $this->input->post($field);
					$data_search_pagination[$field] = $this->input->post($field);
					$flag = 1;
				}
			}

			$data_search_pagination['count'] = true;
			$data_search_titulos['limit'] = $this->config->item('pag_perpage');
			$data_search_titulos['offset'] = $offset;
			$data_search_titulos['sortBy'] = 'id';
			$data_search_titulos['sortDirection'] = 'asc';

			$data['pagination'] = $this->basicrud->getPagination(array('nameModel'=>'titulos_model','perpage'=>$this->config->item('pag_perpage')),$data_search_pagination);
			$data['titulos'] = $this->titulos_model->get_m($data_search_titulos);
			
			$data['fieldShow'] = $this->basicrud->getFieldToShow($this->titulos_model->getFieldsTable_m());
			$this->load->view('titulos_view/record_list_titulos',$data);
		}

	}

}