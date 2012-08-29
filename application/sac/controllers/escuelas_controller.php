<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Escuelas_Controller extends CI_Controller {

	private $flagR;
	private $flagI;
	private $flagU;
	private $flagD;
	private $flags;

	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('logged_in') == true) { 
			$this->load->model('escuelas_model');
			$this->load->model('localidades_model');
			$this->load->model('departamentos_model');
			$this->load->model('directores_model');
			$this->config->load('escuelas_settings');
			$data['flags'] = $this->basicauth->getPermissions('escuelas');
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
			$this->load->view('escuelas_view/home_escuelas', $data);
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

		$this->form_validation->set_rules('cue', 'cue', 'trim|integer|xss_clean');
		$this->form_validation->set_rules('nombre', 'nombre', 'trim|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('direccion', 'direccion', 'trim|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('telefono', 'telefono', 'trim|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('email', 'email', 'trim|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('habilitado', 'habilitado', 'trim|integer|xss_clean');
		$this->form_validation->set_rules('localidad_id', 'localidad_id', 'trim|integer|xss_clean');
		$this->form_validation->set_rules('director_id', 'director_id', 'trim|integer|xss_clean');
		
		if($this->form_validation->run())
		{	
			$data_escuelas  = array();
			$data_escuelas['cue'] = $this->input->post('cue');
			$data_escuelas['nombre'] = $this->input->post('nombre');
			$data_escuelas['direccion'] = $this->input->post('direccion');
			$data_escuelas['telefono'] = $this->input->post('telefono');
			$data_escuelas['email'] = $this->input->post('email');
			$data_escuelas['habilitado'] = $this->input->post('habilitado');
			$data_escuelas['localidad_id'] = $this->input->post('localidad_id');
			$data_escuelas['director_id'] = $this->input->post('director_id');
			$data_escuelas['updated_at'] = $this->basicrud->formatDateToBD();
			$data_escuelas['departamento_id'] = $this->input->post('departamento_id');

			$id_escuelas = $this->escuelas_model->add_m($data_escuelas);
			if($id_escuelas){ 
				$this->session->set_flashdata('flashConfirm', $this->config->item('escuelas_flash_add_message')); 
				redirect('escuelas_controller','location');
			}else{
				$this->session->set_flashdata('flashError', $this->config->item('escuelas_flash_error_message')); 
				redirect('escuelas_controller','location');
			}
		}else{
			$data['departamentos'] = $this->departamentos_model->get_m();
			$data['localidades'] = $this->localidades_model->get_m();
			$data['directores'] = $this->directores_model->get_m();
			$this->load->view('escuelas_view/form_add_escuelas',$data);
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
			$this->session->set_flashdata('flashError', $this->config->item('accessTitle')); 
			redirect('escuelas_controller','location');
		}

		$data = array();
		$data['title_header'] = $this->config->item('recordEditTitle');
		$data['escuelas'] = $this->escuelas_model->get_m(array('id' => $id),$flag=1);
		$this->form_validation->set_rules('id', 'id', 'trim|required|integer|xss_clean');
		$this->form_validation->set_rules('cue', 'cue', 'trim|required|integer|xss_clean');
		$this->form_validation->set_rules('nombre', 'nombre', 'trim|required|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('direccion', 'direccion', 'trim|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('telefono', 'telefono', 'trim|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('email', 'email', 'trim|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('habilitado', 'habilitado', 'trim|integer|xss_clean');
		$this->form_validation->set_rules('localidad_id', 'localidad_id', 'trim|integer|xss_clean');
		$this->form_validation->set_rules('director_id', 'director_id', 'trim|integer|xss_clean');
		
		if($this->form_validation->run()){
			$data_escuelas  = array();
			$data_escuelas['id'] = $this->input->post('id');
			$data_escuelas['cue'] = $this->input->post('cue');
			$data_escuelas['nombre'] = $this->input->post('nombre');
			$data_escuelas['direccion'] = $this->input->post('direccion');
			$data_escuelas['telefono'] = $this->input->post('telefono');
			$data_escuelas['email'] = $this->input->post('email');
			$data_escuelas['habilitado'] = $this->input->post('habilitado');
			$data_escuelas['localidad_id'] = $this->input->post('localidad_id');
			$data_escuelas['director_id'] = $this->input->post('director_id');
			$data_escuelas['updated_at'] = $this->basicrud->formatDateToBD();
			$data_escuelas['departamento_id'] = $this->input->post('departamento_id');

			if($this->escuelas_model->edit_m($data_escuelas)){ 
				$this->session->set_flashdata('flashConfirm', $this->config->item('escuelas_flash_edit_message')); 
				redirect('escuelas_controller','location');
			}else{
				$this->session->set_flashdata('flashError', $this->config->item('escuelas_flash_error_message')); 
				redirect('escuelas_controller','location');
			}
		}else{
			$data['departamentos'] = $this->departamentos_model->get_m();
			$data['localidades'] = $this->localidades_model->get_m();
			$data['directores'] = $this->directores_model->get_m();
			$this->load->view('escuelas_view/form_edit_escuelas',$data);
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

		if($this->escuelas_model->delete_m($id)){ 
			$this->session->set_flashdata('flashConfirm', $this->config->item('escuelas_flash_delete_message')); 
			redirect('escuelas_controller','location');
		}else{
			$this->session->set_flashdata('flashError', $this->config->item('escuelas_flash_error_delete_message')); 
			redirect('escuelas_controller','location');
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
		$data_search_escuelas = array(); 
		$data_search_pagination = array(); 
		
		if($this->flagR)
		{
			$fieldSearch = $this->basicrud->getFieldSearch($this->escuelas_model->getFieldsTable_m());
			foreach($fieldSearch as $field)
			{
				if($this->input->post($field) != '') 
				{
					$data_search_escuelas[$field] = $this->input->post($field);
					$data_search_pagination[$field] = $this->input->post($field);
				}
			}

			$data_search_pagination['count'] = true;
			$data_search_escuelas['limit'] = $this->config->item('pag_perpage');
			$data_search_escuelas['offset'] = $offset;
			$data_search_escuelas['sortBy'] = 'id';
			$data_search_escuelas['sortDirection'] = 'asc';

			
			$data['pagination'] = $this->basicrud->getPagination(array('nameModel'=>'escuelas_model','perpage'=>$this->config->item('pag_perpage')),$data_search_pagination);
			$data['escuelas'] = $this->escuelas_model->get_m($data_search_escuelas);
			$data['flag'] = $this->flags;

			$data['fieldShow'] = $this->basicrud->getFieldToShow($this->escuelas_model->getFieldsTable_m());
			$this->load->view('escuelas_view/record_list_escuelas',$data);
		}

	}

}