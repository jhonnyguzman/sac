<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Personas_Controller extends CI_Controller {

	private $flagR;
	private $flagI;
	private $flagU;
	private $flagD;
	private $flags;

	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('logged_in') == true) { 
			$this->load->model('personas_model');
			$this->config->load('personas_settings');
			$data['flags'] = $this->basicauth->getPermissions('personas');
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
			$data['fieldSearch'] = $this->basicrud->getFieldSearch($this->personas_model->getFieldsTable_m());
			$this->load->view('personas_view/home_personas', $data);
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
		
		$this->form_validation->set_rules('dni', 'dni', 'trim|required|integer|callback_checkDni|xss_clean');
		$this->form_validation->set_rules('apellido', 'apellido', 'trim|required|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('nombre', 'nombre', 'trim|required|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('domicilio', 'domicilio', 'trim|required|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('telefono', 'telefono', 'trim|required|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('celular', 'celular', 'trim|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('email', 'email', 'trim|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('habilitado', 'habilitado', 'trim|integer|xss_clean');
		
		
		if($this->form_validation->run())
		{	
			$data_personas  = array();
			$data_personas['dni'] = $this->input->post('dni');
			$data_personas['apellido'] = $this->input->post('apellido');
			$data_personas['nombre'] = $this->input->post('nombre');
			$data_personas['domicilio'] = $this->input->post('domicilio');
			$data_personas['telefono'] = $this->input->post('telefono');
			$data_personas['celular'] = $this->input->post('celular');
			$data_personas['email'] = $this->input->post('email');
			$data_personas['habilitado'] = $this->input->post('habilitado');
			$data_personas['updated_at'] = $this->basicrud->formatDateToBD();

			$id_personas = $this->personas_model->add_m($data_personas);
			if($id_personas){ 
				$this->session->set_flashdata('flashConfirm', $this->config->item('personas_flash_add_message')); 
				redirect('personas_controller','location');
			}else{
				$this->session->set_flashdata('flashError', $this->config->item('personas_flash_error_message')); 
				redirect('personas_controller','location');
			}
		}
		$this->load->view('personas_view/form_add_personas',$data);

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
		$data['personas'] = $this->personas_model->get_m(array('id' => $id),$flag=1);
		
		$this->form_validation->set_rules('id', 'id', 'trim|required|integer|xss_clean');
		$this->form_validation->set_rules('dni', 'dni', 'trim|required|integer|callback_checkDniEdit|xss_clean');
		$this->form_validation->set_rules('apellido', 'apellido', 'trim|required|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('nombre', 'nombre', 'trim|required|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('domicilio', 'domicilio', 'trim|required|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('telefono', 'telefono', 'trim|required|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('celular', 'celular', 'trim|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('email', 'email', 'trim|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('habilitado', 'habilitado', 'trim|integer|xss_clean');
		
		
		if($this->form_validation->run()){
			$data_personas  = array();
			$data_personas['id'] = $this->input->post('id');
			$data_personas['dni'] = $this->input->post('dni');
			$data_personas['apellido'] = $this->input->post('apellido');
			$data_personas['nombre'] = $this->input->post('nombre');
			$data_personas['domicilio'] = $this->input->post('domicilio');
			$data_personas['telefono'] = $this->input->post('telefono');
			$data_personas['celular'] = $this->input->post('celular');
			$data_personas['email'] = $this->input->post('email');
			$data_personas['habilitado'] = $this->input->post('habilitado');
			$data_personas['updated_at'] = $this->basicrud->formatDateToBD();

			if($this->personas_model->edit_m($data_personas)){ 
				$this->session->set_flashdata('flashConfirm', $this->config->item('personas_flash_edit_message')); 
				redirect('personas_controller','location');
			}else{
				$this->session->set_flashdata('flashError', $this->config->item('personas_flash_error_message')); 
				redirect('personas_controller','location');
			}
		}
		$this->load->view('personas_view/form_edit_personas',$data);

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

		if($this->personas_model->delete_m($id)){ 
			$this->session->set_flashdata('flashConfirm', $this->config->item('personas_flash_delete_message')); 
			redirect('personas_controller','location');
		}else{
			$this->session->set_flashdata('flashError', $this->config->item('personas_flash_error_delete_message')); 
			redirect('personas_controller','location');
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
		$data_search_personas = array(); 
		$data_search_pagination = array(); 
		
		if($this->flagR)
		{
			$fieldSearch = $this->basicrud->getFieldSearch($this->personas_model->getFieldsTable_m());
			foreach($fieldSearch as $field)
			{
				if($this->input->post($field) != '') 
				{
					$data_search_personas[$field] = $this->input->post($field);
					$data_search_pagination[$field] = $this->input->post($field);
					
				}
			}

			$data_search_pagination['count'] = true;
			$data_search_personas['limit'] = $this->config->item('pag_perpage');
			$data_search_personas['offset'] = $offset;
			$data_search_personas['sortBy'] = 'id';
			$data_search_personas['sortDirection'] = 'asc';

			$data['pagination'] = $this->basicrud->getPagination(array('nameModel'=>'personas_model','perpage'=>$this->config->item('pag_perpage')),$data_search_pagination);
			$data['personas'] = $this->personas_model->get_m($data_search_personas);
			
			$data['flag'] = $this->flags;
			$this->load->view('personas_view/record_list_personas',$data);
		}

	}


	function checkDni($dni)
	{
		$persona = $this->personas_model->get_m(array('dni' => $dni));
		if(count($persona) > 0){
			$this->form_validation->set_message('checkDni','El D.N.I. de la persona ingresada ya existe en el sistema.');
			return false;
		}else{
			return true;
		}
	}

	function checkDniEdit($dni)
	{
		$persona = $this->personas_model->getExisteDni_m(array('id'=>$this->input->post("id"), 'dni' => $dni));
		if(count($persona) > 0){
			$this->form_validation->set_message('checkDniEdit','El D.N.I. de la persona ingresada ya existe en el sistema.');
			return false;
		}else{
			return true;
		}
	}
}