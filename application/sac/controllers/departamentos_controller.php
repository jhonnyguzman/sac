<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Departamentos_Controller extends CI_Controller {

	private $flagR;
	private $flagI;
	private $flagU;
	private $flagD;
	private $flags;

	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('logged_in') == true) { 
			$this->load->model('departamentos_model');
			$this->config->load('departamentos_settings');
			$data['flags'] = $this->basicauth->getPermissions('departamentos');
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
			$data['fieldSearch'] = $this->basicrud->getFieldSearch($this->departamentos_model->getFieldsTable_m());
			$this->load->view('departamentos_view/home_departamentos', $data);
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
		$this->form_validation->set_rules('circuito_id', 'circuito_id', 'trim|integer|xss_clean');
		if($this->form_validation->run())
		{	
			$data_departamentos  = array();
			$data_departamentos['nombre'] = $this->input->post('nombre');
			$data_departamentos['habilitado'] = $this->input->post('habilitado');
			$data_departamentos['circuito_id'] = $this->input->post('circuito_id');
			$data_departamentos['updated_at'] = $this->basicrud->formatDateToBD();

			$id_departamentos = $this->departamentos_model->add_m($data_departamentos);
			if($id_departamentos){ 
				$this->session->set_flashdata('flashConfirm', $this->config->item('departamentos_flash_add_message')); 
				redirect('departamentos_controller','location');
			}else{
				$this->session->set_flashdata('flashError', $this->config->item('departamentos_flash_error_message')); 
				redirect('departamentos_controller','location');
			}
		}
		$this->load->view('departamentos_view/form_add_departamentos',$data);

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
		$data['departamentos'] = $this->departamentos_model->get_m(array('id' => $id),$flag=1);
		$this->form_validation->set_rules('id', 'id', 'trim|integer|xss_clean');
		$this->form_validation->set_rules('nombre', 'nombre', 'trim|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('habilitado', 'habilitado', 'trim|integer|xss_clean');
		$this->form_validation->set_rules('circuito_id', 'circuito_id', 'trim|integer|xss_clean');
		if($this->form_validation->run()){
			$data_departamentos  = array();
			$data_departamentos['id'] = $this->input->post('id');
			$data_departamentos['nombre'] = $this->input->post('nombre');
			$data_departamentos['habilitado'] = $this->input->post('habilitado');
			$data_departamentos['circuito_id'] = $this->input->post('circuito_id');
			$data_departamentos['updated_at'] = $this->basicrud->formatDateToBD();

			if($this->departamentos_model->edit_m($data_departamentos)){ 
				$this->session->set_flashdata('flashConfirm', $this->config->item('departamentos_flash_edit_message')); 
				redirect('departamentos_controller','location');
			}else{
				$this->session->set_flashdata('flashError', $this->config->item('departamentos_flash_error_message')); 
				redirect('departamentos_controller','location');
			}
		}
		$this->load->view('departamentos_view/form_edit_departamentos',$data);

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

		if($this->departamentos_model->delete_m($id)){ 
			$this->session->set_flashdata('flashConfirm', $this->config->item('departamentos_flash_delete_message')); 
			redirect('departamentos_controller','location');
		}else{
			$this->session->set_flashdata('flashError', $this->config->item('departamentos_flash_error_delete_message')); 
			redirect('departamentos_controller','location');
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
		$data_search_departamentos = array(); 
		$data_search_pagination = array(); 
		$flag = 0; 
		$data['flag'] = $this->flags;
		if($this->flagR)
		{
			$fieldSearch = $this->basicrud->getFieldSearch($this->departamentos_model->getFieldsTable_m());
			foreach($fieldSearch as $field)
			{
				if($this->input->post($field) != '') 
				{
					$data_search_departamentos[$field] = $this->input->post($field);
					$data_search_pagination[$field] = $this->input->post($field);
					$flag = 1;
				}
			}

			$data_search_pagination['count'] = true;
			$data_search_departamentos['limit'] = $this->config->item('pag_perpage');
			$data_search_departamentos['offset'] = $offset;
			$data_search_departamentos['sortBy'] = 'id';
			$data_search_departamentos['sortDirection'] = 'asc';

			$data['pagination'] = $this->basicrud->getPagination(array('nameModel'=>'departamentos_model','perpage'=>$this->config->item('pag_perpage')),$data_search_pagination);
			$data['departamentos'] = $this->departamentos_model->get_m($data_search_departamentos);

			$data['fieldShow'] = $this->basicrud->getFieldToShow($this->departamentos_model->getFieldsTable_m());
			$this->load->view('departamentos_view/record_list_departamentos',$data);
		}

	}


	function getLocalidades($departamento_id)
	{
		$this->load->model('localidades_model');
		$localidades = $this->localidades_model->get_m(array('departamento_id' => $departamento_id));
		if($localidades){
			echo json_encode($localidades);
		}else{
			echo json_encode("none");
		}
	}
}