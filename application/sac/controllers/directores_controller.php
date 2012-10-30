<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Directores_Controller extends CI_Controller {

	private $flagR;
	private $flagI;
	private $flagU;
	private $flagD;
	private $flags;

	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('logged_in') == true) { 
			$this->load->model('directores_model');
			$this->config->load('directores_settings');
			$data['flags'] = $this->basicauth->getPermissions('directores');
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
			$data['fieldSearch'] = $this->basicrud->getFieldSearch($this->directores_model->getFieldsTable_m());
			$this->load->view('directores_view/home_directores', $data);
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

		$this->form_validation->set_rules('dni', 'D.N.I.', 'trim|required|integer|callback_checkDni|xss_clean');
		$this->form_validation->set_rules('apellido', 'apellido', 'trim|required|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('nombre', 'nombre', 'trim|required|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('telefono', 'telefono', 'trim|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('email', 'email', 'trim|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('habilitado', 'habilitado', 'trim|integer|xss_clean');

		if($this->form_validation->run())
		{	
			$data_directores  = array();
			$data_directores['dni'] = $this->input->post('dni');
			$data_directores['apellido'] = $this->input->post('apellido');
			$data_directores['nombre'] = $this->input->post('nombre');
			$data_directores['telefono'] = $this->input->post('telefono');
			$data_directores['email'] = $this->input->post('email');
			$data_directores['habilitado'] = $this->input->post('habilitado');
			$data_directores['updated_at'] = $this->basicrud->formatDateToBD();

			$id_directores = $this->directores_model->add_m($data_directores);
			if($id_directores){ 
				$this->session->set_flashdata('flashConfirm', $this->config->item('directores_flash_add_message')); 
				redirect('directores_controller','location');
			}else{
				$this->session->set_flashdata('flashError', $this->config->item('directores_flash_error_message')); 
				redirect('directores_controller','location');
			}
		}
		$this->load->view('directores_view/form_add_directores',$data);

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
		$data['directores'] = $this->directores_model->get_m(array('id' => $id),$flag=1);
		$this->form_validation->set_rules('id', 'id', 'trim|integer|xss_clean');
		$this->form_validation->set_rules('dni', 'D.N.I.', 'trim|required|integer|callback_checkDniEdit|xss_clean');
		$this->form_validation->set_rules('apellido', 'apellido', 'trim|required|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('nombre', 'nombre', 'trim|required|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('telefono', 'telefono', 'trim|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('email', 'email', 'trim|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('habilitado', 'habilitado', 'trim|integer|xss_clean');
		
		if($this->form_validation->run()){
			$data_directores  = array();
			$data_directores['id'] = $this->input->post('id');
			$data_directores['dni'] = $this->input->post('dni');
			$data_directores['apellido'] = $this->input->post('apellido');
			$data_directores['nombre'] = $this->input->post('nombre');
			$data_directores['telefono'] = $this->input->post('telefono');
			$data_directores['email'] = $this->input->post('email');
			$data_directores['habilitado'] = $this->input->post('habilitado');
			$data_directores['updated_at'] = $this->basicrud->formatDateToBD();

			if($this->directores_model->edit_m($data_directores)){ 
				$this->session->set_flashdata('flashConfirm', $this->config->item('directores_flash_edit_message')); 
				redirect('directores_controller','location');
			}else{
				$this->session->set_flashdata('flashError', $this->config->item('directores_flash_error_message')); 
				redirect('directores_controller','location');
			}
		}
		$this->load->view('directores_view/form_edit_directores',$data);

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

		if($this->directores_model->delete_m($id)){ 
			$this->session->set_flashdata('flashConfirm', $this->config->item('directores_flash_delete_message')); 
			redirect('directores_controller','location');
		}else{
			$this->session->set_flashdata('flashError', $this->config->item('directores_flash_error_delete_message')); 
			redirect('directores_controller','location');
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
		$data_search_directores = array(); 
		$data_search_pagination = array(); 
		
		$data['flag'] = $this->flags;
		if($this->flagR)
		{
			$fieldSearch = $this->basicrud->getFieldSearch($this->directores_model->getFieldsTable_m());
			foreach($fieldSearch as $field)
			{
				if($this->input->post($field) != '') 
				{
					$data_search_directores[$field] = $this->input->post($field);
					$data_search_pagination[$field] = $this->input->post($field);
				}
			}

			$data_search_pagination['count'] = true;
			$data_search_directores['limit'] = $this->config->item('pag_perpage');
			$data_search_directores['offset'] = $offset;
			$data_search_directores['sortBy'] = 'id';
			$data_search_directores['sortDirection'] = 'asc';

			$data['pagination'] = $this->basicrud->getPagination(array('nameModel'=>'directores_model','perpage'=>$this->config->item('pag_perpage')),$data_search_pagination);
			$data['directores'] = $this->directores_model->get_m($data_search_directores);

			$data['fieldShow'] = $this->basicrud->getFieldToShow($this->directores_model->getFieldsTable_m());
			$this->load->view('directores_view/record_list_directores',$data);
		}

	}


	function checkDni($dni)
	{
		$director = $this->directores_model->get_m(array('dni' => $dni));
		if(count($director) > 0){
			$this->form_validation->set_message('checkDni','El DNI del director ingresado ya existe en el sistema.');
			return false;
		}else{
			return true;
		}
	}


	function checkDniEdit($dni)
	{
		$director = $this->directores_model->getExisteDni_m(array('id' => $this->input->post("id"), 'dni' => $dni));
		if(count($director) > 0){
			$this->form_validation->set_message('checkDniEdit','El DNI del director ingresado ya existe en el sistema.');
			return false;
		}else{
			return true;
		}
	}

}