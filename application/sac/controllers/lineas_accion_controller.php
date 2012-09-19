<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lineas_accion_Controller extends CI_Controller {

	private $flagR;
	private $flagI;
	private $flagU;
	private $flagD;
	private $flags;

	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('logged_in') == true) { 
			$this->load->model('lineas_accion_model');
			$this->load->model('tabgral_model');
			$this->config->load('lineas_accion_settings');
			$data['flags'] = $this->basicauth->getPermissions('lineas_accion');
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
			$data['fieldSearch'] = $this->basicrud->getFieldSearch($this->lineas_accion_model->getFieldsTable_m());
			$this->load->view('lineas_accion_view/home_lineas_accion', $data);
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
		$this->form_validation->set_rules('descripcion', 'descripcion', 'trim|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('habilitado', 'habilitado', 'trim|integer|xss_clean');
		$this->form_validation->set_rules('ciclo', 'ciclo', 'trim|integer|xss_clean');

		if($this->form_validation->run())
		{	
			$data_lineas_accion  = array();
			$data_lineas_accion['nombre'] = $this->input->post('nombre');
			$data_lineas_accion['descripcion'] = $this->input->post('descripcion');
			$data_lineas_accion['habilitado'] = $this->input->post('habilitado');
			$data_lineas_accion['ciclo'] = $this->input->post('ciclo');
			$data_lineas_accion['updated_at'] = $this->basicrud->formatDateToBD();

			$id_lineas_accion = $this->lineas_accion_model->add_m($data_lineas_accion);
			if($id_lineas_accion){ 
				$this->session->set_flashdata('flashConfirm', $this->config->item('lineas_accion_flash_add_message')); 
				redirect('lineas_accion_controller','location');
			}else{
				$this->session->set_flashdata('flashError', $this->config->item('lineas_accion_flash_error_message')); 
				redirect('lineas_accion_controller','location');
			}
		}else{
			$data['ciclos'] = $this->tabgral_model->get_m(array('grupos_tabgral_id' => 3)); //obtener todos los ciclos
			$this->load->view('lineas_accion_view/form_add_lineas_accion',$data);
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
		$data['lineas_accion'] = $this->lineas_accion_model->get_m(array('id' => $id),$flag=1);
		$this->form_validation->set_rules('id', 'id', 'trim|integer|xss_clean');
		$this->form_validation->set_rules('nombre', 'nombre', 'trim|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('descripcion', 'descripcion', 'trim|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('habilitado', 'habilitado', 'trim|integer|xss_clean');
		$this->form_validation->set_rules('ciclo', 'ciclo', 'trim|integer|xss_clean');

		if($this->form_validation->run()){
			$data_lineas_accion  = array();
			$data_lineas_accion['id'] = $this->input->post('id');
			$data_lineas_accion['nombre'] = $this->input->post('nombre');
			$data_lineas_accion['descripcion'] = $this->input->post('descripcion');
			$data_lineas_accion['habilitado'] = $this->input->post('habilitado');
			$data_lineas_accion['ciclo'] = $this->input->post('ciclo');
			$data_lineas_accion['updated_at'] = $this->basicrud->formatDateToBD();

			if($this->lineas_accion_model->edit_m($data_lineas_accion)){ 
				$this->session->set_flashdata('flashConfirm', $this->config->item('lineas_accion_flash_edit_message')); 
				redirect('lineas_accion_controller','location');
			}else{
				$this->session->set_flashdata('flashError', $this->config->item('lineas_accion_flash_error_message')); 
				redirect('lineas_accion_controller','location');
			}
		}else{
			$data['ciclos'] = $this->tabgral_model->get_m(array('grupos_tabgral_id' => 3)); //obtener todos los ciclos
			$this->load->view('lineas_accion_view/form_edit_lineas_accion',$data);
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

		if($this->lineas_accion_model->delete_m($id)){ 
			$this->session->set_flashdata('flashConfirm', $this->config->item('lineas_accion_flash_delete_message')); 
			redirect('lineas_accion_controller','location');
		}else{
			$this->session->set_flashdata('flashError', $this->config->item('lineas_accion_flash_error_delete_message')); 
			redirect('lineas_accion_controller','location');
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
		$data_search_lineas_accion = array(); 
		$data_search_pagination = array(); 
		$flag = 0; 
		$data['flag'] = $this->flags;
		if($this->flagR)
		{
			$fieldSearch = $this->basicrud->getFieldSearch($this->lineas_accion_model->getFieldsTable_m());
			foreach($fieldSearch as $field)
			{
				if($this->input->post($field) != '') 
				{
					$data_search_lineas_accion[$field] = $this->input->post($field);
					$data_search_pagination[$field] = $this->input->post($field);
					$flag = 1;
				}
			}

			$data_search_pagination['count'] = true;
			$data_search_lineas_accion['limit'] = $this->config->item('pag_perpage');
			$data_search_lineas_accion['offset'] = $offset;
			$data_search_lineas_accion['sortBy'] = 'id';
			$data_search_lineas_accion['sortDirection'] = 'asc';

			$data['pagination'] = $this->basicrud->getPagination(array('nameModel'=>'lineas_accion_model','perpage'=>$this->config->item('pag_perpage')),$data_search_pagination);
			$data['lineas_accion'] = $this->lineas_accion_model->get_m($data_search_lineas_accion);
			
			$data['fieldShow'] = $this->basicrud->getFieldToShow($this->lineas_accion_model->getFieldsTable_m());
			$this->load->view('lineas_accion_view/record_list_lineas_accion',$data);
		}

	}

}