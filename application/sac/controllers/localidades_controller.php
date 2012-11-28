<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Localidades_Controller extends CI_Controller {

	private $flagR;
	private $flagI;
	private $flagU;
	private $flagD;
	private $flags;

	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('logged_in') == true) { 
			$this->load->model('localidades_model');
			$this->load->model('departamentos_model');
			$this->config->load('localidades_settings');
			$data['flags'] = $this->basicauth->getPermissions('localidades');
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
			$data['fieldSearch'] = $this->basicrud->getFieldSearch($this->localidades_model->getFieldsTable_m());
			$this->load->view('localidades_view/home_localidades', $data);
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
		$this->form_validation->set_rules('id', 'id', 'trim|integer|xss_clean');
		$this->form_validation->set_rules('nombre', 'nombre', 'trim|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('habilitado', 'habilitado', 'trim|integer|xss_clean');
		$this->form_validation->set_rules('departamento_id', 'departamento_id', 'trim|integer|xss_clean');

		if($this->form_validation->run())
		{	
			$data_localidades  = array();
			$data_localidades['nombre'] = $this->input->post('nombre');
			$data_localidades['habilitado'] = $this->input->post('habilitado');
			$data_localidades['departamento_id'] = $this->input->post('departamento_id');
			$data_localidades['updated_at'] = $this->basicrud->formatDateToBD();

			$id_localidades = $this->localidades_model->add_m($data_localidades);
			if($id_localidades){ 
				$this->session->set_flashdata('flashConfirm', $this->config->item('localidades_flash_add_message')); 
				redirect('localidades_controller','location');
			}else{
				$this->session->set_flashdata('flashError', $this->config->item('localidades_flash_error_message')); 
				redirect('localidades_controller','location');
			}
		}else{
			$data['departamentos'] = $this->departamentos_model->get_m();
			$this->load->view('localidades_view/form_add_localidades',$data);
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
		$data['localidades'] = $this->localidades_model->get_m(array('id' => $id),$flag=1);
		$this->form_validation->set_rules('id', 'id', 'trim|integer|xss_clean');
		$this->form_validation->set_rules('nombre', 'nombre', 'trim|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('habilitado', 'habilitado', 'trim|integer|xss_clean');
		$this->form_validation->set_rules('departamento_id', 'departamento_id', 'trim|integer|xss_clean');

		if($this->form_validation->run()){
			$data_localidades  = array();
			$data_localidades['id'] = $this->input->post('id');
			$data_localidades['nombre'] = $this->input->post('nombre');
			$data_localidades['habilitado'] = $this->input->post('habilitado');
			$data_localidades['departamento_id'] = $this->input->post('departamento_id');
			$data_localidades['updated_at'] = $this->basicrud->formatDateToBD();

			if($this->localidades_model->edit_m($data_localidades)){ 
				$this->session->set_flashdata('flashConfirm', $this->config->item('localidades_flash_edit_message')); 
				redirect('localidades_controller','location');
			}else{
				$this->session->set_flashdata('flashError', $this->config->item('localidades_flash_error_message')); 
				redirect('localidades_controller','location');
			}
		}else{
			$data['departamentos'] = $this->departamentos_model->get_m();
			$this->load->view('localidades_view/form_edit_localidades',$data);
		}
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

		if($this->localidades_model->delete_m($id)){ 
			$this->session->set_flashdata('flashConfirm', $this->config->item('localidades_flash_delete_message')); 
			redirect('localidades_controller','location');
		}else{
			$this->session->set_flashdata('flashError', $this->config->item('localidades_flash_error_delete_message')); 
			redirect('localidades_controller','location');
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
		$data_search_localidades = array(); 
		$data_search_pagination = array(); 
		$flag = 0; 
		$data['flag'] = $this->flags;
		if($this->flagR)
		{
			$fieldSearch = $this->basicrud->getFieldSearch($this->localidades_model->getFieldsTable_m());
			foreach($fieldSearch as $field)
			{
				if($this->input->post($field) != '') 
				{
					$data_search_localidades[$field] = $this->input->post($field);
					$data_search_pagination[$field] = $this->input->post($field);
					$flag = 1;
				}
			}

			$data_search_pagination['count'] = true;
			$data_search_localidades['limit'] = $this->config->item('pag_perpage');
			$data_search_localidades['offset'] = $offset;
			$data_search_localidades['sortBy'] = 'id';
			$data_search_localidades['sortDirection'] = 'asc';

			$data['pagination'] = $this->basicrud->getPagination(array('nameModel'=>'localidades_model','perpage'=>$this->config->item('pag_perpage')),$data_search_pagination);
			$data['localidades'] = $this->localidades_model->get_m($data_search_localidades);
			
			$data['fieldShow'] = $this->basicrud->getFieldToShow($this->localidades_model->getFieldsTable_m());
			$this->load->view('localidades_view/record_list_localidades',$data);
		}

	}

}