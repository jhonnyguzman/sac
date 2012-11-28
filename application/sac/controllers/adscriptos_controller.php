<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Adscriptos_Controller extends CI_Controller {

	private $flagR;
	private $flagI;
	private $flagU;
	private $flagD;
	private $flags;

	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('logged_in') == true) { 
			$this->load->model('adscriptos_model');
			$this->config->load('adscriptos_settings');
			$data['flags'] = $this->basicauth->getPermissions('adscriptos');
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
		
		$this->form_validation->set_rules('proyecto_persona_id', 'proyecto_persona_id', 'trim|required|integer|xss_clean');
		$this->form_validation->set_rules('escuela_id', 'escuela_id', 'trim|required|integer|xss_clean');
		$this->form_validation->set_rules('cantidad_horas', 'cantidad_horas', 'trim|required|integer|xss_clean');
		$this->form_validation->set_rules('habilitado', 'habilitado', 'trim|integer|xss_clean');
		
		
		if($this->form_validation->run())
		{	
			$data_adscriptos  = array();
			$data_adscriptos['proyecto_persona_id'] = $this->input->post('proyecto_persona_id');
			$data_adscriptos['escuela_id'] = $this->input->post('escuela_id');
			$data_adscriptos['cantidad_horas'] = $this->input->post('cantidad_horas');
			$data_adscriptos['habilitado'] = $this->input->post('habilitado');
			$data_adscriptos['updated_at'] = $this->basicrud->formatDateToBD();

			$id_adscriptos = $this->adscriptos_model->add_m($data_adscriptos);
			if($id_adscriptos){ 
				$this->session->set_flashdata('flashConfirm', $this->config->item('adscriptos_flash_add_message')); 
				redirect('adscriptos_controller','location');
			}else{
				$this->session->set_flashdata('flashError', $this->config->item('adscriptos_flash_error_message')); 
				redirect('adscriptos_controller','location');
			}
		}
		$this->load->view('adscriptos_view/form_add_adscriptos',$data);

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
		$data['adscriptos'] = $this->adscriptos_model->get_m(array('id' => $id),$flag=1);
		$this->form_validation->set_rules('id', 'id', 'trim|required|integer|xss_clean');
		$this->form_validation->set_rules('proyecto_persona_id', 'proyecto_persona_id', 'trim|required|integer|xss_clean');
		$this->form_validation->set_rules('escuela_id', 'escuela_id', 'trim|required|integer|xss_clean');
		$this->form_validation->set_rules('cantidad_horas', 'cantidad_horas', 'trim|required|integer|xss_clean');
		$this->form_validation->set_rules('habilitado', 'habilitado', 'trim|integer|xss_clean');
		
		
		if($this->form_validation->run()){
			$data_adscriptos  = array();
			$data_adscriptos['id'] = $this->input->post('id');
			$data_adscriptos['proyecto_persona_id'] = $this->input->post('proyecto_persona_id');
			$data_adscriptos['escuela_id'] = $this->input->post('escuela_id');
			$data_adscriptos['cantidad_horas'] = $this->input->post('cantidad_horas');
			$data_adscriptos['habilitado'] = $this->input->post('habilitado');
			$data_adscriptos['updated_at'] = $this->basicrud->formatDateToBD();

			if($this->adscriptos_model->edit_m($data_adscriptos)){ 
				$this->session->set_flashdata('flashConfirm', $this->config->item('adscriptos_flash_edit_message')); 
				redirect('adscriptos_controller','location');
			}else{
				$this->session->set_flashdata('flashError', $this->config->item('adscriptos_flash_error_message')); 
				redirect('adscriptos_controller','location');
			}
		}
		$this->load->view('adscriptos_view/form_edit_adscriptos',$data);

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

		if($this->adscriptos_model->delete_m($id)){ 
			$this->session->set_flashdata('flashConfirm', $this->config->item('adscriptos_flash_delete_message')); 
			redirect('adscriptos_controller','location');
		}else{
			$this->session->set_flashdata('flashError', $this->config->item('adscriptos_flash_error_delete_message')); 
			redirect('adscriptos_controller','location');
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
		$data_search_adscriptos = array(); 
		$data_search_pagination = array(); 
		
		if($this->flagR)
		{
			$fieldSearch = $this->basicrud->getFieldSearch($this->adscriptos_model->getFieldsTable_m());
			foreach($fieldSearch as $field)
			{
				if($this->input->post($field) != '') 
				{
					$data_search_adscriptos[$field] = $this->input->post($field);
					$data_search_pagination[$field] = $this->input->post($field);
					
				}
			}

			$data_search_pagination['count'] = true;
			$data_search_adscriptos['limit'] = $this->config->item('pag_perpage');
			$data_search_adscriptos['offset'] = $offset;
			$data_search_adscriptos['sortBy'] = 'id';
			$data_search_adscriptos['sortDirection'] = 'asc';

			$data['pagination'] = $this->basicrud->getPagination(array('nameModel'=>'adscriptos_model','perpage'=>$this->config->item('pag_perpage')),$data_search_pagination);
			$data['adscriptos'] = $this->adscriptos_model->get_m($data_search_adscriptos);
		
			$data['flag'] = $this->flags;
			$this->load->view('adscriptos_view/record_list_adscriptos',$data);
		}

	}

}