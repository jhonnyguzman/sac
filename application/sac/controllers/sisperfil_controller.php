<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sisperfil_Controller extends CI_Controller {

	private $flagR;
	private $flagI;
	private $flagU;
	private $flagD;
	private $flags;

	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('logged_in') == true) { 
			$this->load->model('sisperfil_model');
			$this->load->model('sys_perfiles_model');
			$this->config->load('sisperfil_settings');
			$data['flags'] = $this->basicauth->getPermissions('sys_perfil');
			$this->flagR = $data['flags']['flag-read'];
			$this->flagI = $data['flags']['flag-insert'];
			$this->flagU = $data['flags']['flag-update'];
			$this->flagD = $data['flags']['flag-delete'];
			$this->flags = array('i'=>$this->flagI,'u'=>$this->flagU,'d'=>$this->flagD);
		}
	}

	function index()
	{
		//code here
		if($this->flagR){
			$data['flag'] = $this->flags;
			$data['title_header'] = $this->config->item('recordListTitle');
			$data['perfiles'] = $this->sys_perfiles_model->get_m();
			$this->load->view('sisperfil_view/home_sisperfil', $data);
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
	function add_c($sismenu_id, $perfiles_id)
	{
		//code here
		if(!$this->flagI){
			echo $this->config->item('accessTitle');
			exit();
		}
		
		$data_sisperfil  = array();
		$data_sisperfil['sismenu_id'] = $sismenu_id;
		$data_sisperfil['perfiles_id'] = $perfiles_id;
		$data_sisperfil['estado'] = 1;
		$data_sisperfil['updated_at'] = $this->basicrud->formatDateToBD();

		$id_sisperfil = $this->sisperfil_model->add_m($data_sisperfil);
		if($id_sisperfil){ 
			$this->session->set_flashdata('flashConfirm', $this->config->item('flash_add_message')); 
			redirect('sisperfil_controller','location');
		}else{
			$this->session->set_flashdata('flashError', $this->config->item('flash_error_message')); 
			redirect('sisperfil_controller','location');
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
	function edit_c($sisperfil_id)
	{
		//code here
		if(!$this->flagU){
			echo $this->config->item('accessTitle');
			exit();
		}

		$data = array();
		$data['title_header'] = $this->config->item('recordEditTitle');
		$data['sisperfil'] = $this->sisperfil_model->get_m(array('id' => $sisperfil_id),$flag=1);
		
		$this->form_validation->set_rules('id', 'id', 'trim|required|integer|xss_clean');
		$this->form_validation->set_rules('sismenu_id', 'sismenu_id', 'trim|required|integer|xss_clean');
		$this->form_validation->set_rules('perfiles_id', 'perfiles_id', 'trim|required|integer|xss_clean');
		$this->form_validation->set_rules('estado', 'estado', 'trim|integer|xss_clean');
	
		if($this->form_validation->run()){
			$data_sisperfil  = array();
			
			$data_sisperfil['id'] = $this->input->post('id');
			$data_sisperfil['sismenu_id'] = $this->input->post('sismenu_id');
			$data_sisperfil['perfiles_id'] = $this->input->post('perfiles_id');
			$data_sisperfil['estado'] = $this->input->post('estado');
			$data_sisperfil['updated_at'] = $this->basicrud->formatDateToBD();

			if($this->sisperfil_model->edit_m($data_sisperfil)){ 
				$this->session->set_flashdata('flashConfirm', $this->config->item('flash_edit_message')); 
				redirect('sispermisos_controller','location');
			}else{
				$this->session->set_flashdata('flashError', $this->config->item('flash_error_message')); 
				redirect('sispermisos_controller','location');
			}
		}
		$this->load->view('sispermisos_view/form_edit_sisperfil',$data);

	}


	/**
	 * This function sends the id of record to the
	 * method of the model responsible for deleting 
	 * the record in the db
	 *
	 * @access public
	 * @param $sisperfil_id id of record
	 * @return void
	 */
	function delete_c($id)
	{
		//code here
		if(!$this->flagD){
			echo $this->config->item('accessTitle');
			exit();
		}

		if($this->sisperfil_model->delete_m($id)){ 
			$this->session->set_flashdata('flashConfirm', $this->config->item('flash_delete_message')); 
			redirect('sisperfil_controller','location');
		}else{
			$this->session->set_flashdata('flashError', $this->config->item('flash_error_delete_message')); 
			redirect('sisperfil_controller','location');
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
		$data_search_sisperfil = array(); 
		$data_search_pagination = array(); 
		
		$data_search_sisperfil  = array();
		
		if($this->flagR)
		{
			$fieldSearch = $this->basicrud->getFieldSearch($this->sisperfil_model->getFieldsTable_m());
			foreach($fieldSearch as $field)
			{
				if($this->input->post($field) != '') 
				{
					$data_search_sisperfil[$field] = $this->input->post($field);
					$data_search_pagination[$field] = $this->input->post($field);
				}
			}

			$data_search_pagination['count'] = true;
			$data_search_sisperfil['limit'] = $this->config->item('pag_perpage');
			$data_search_sisperfil['offset'] = $offset;
			$data_search_sisperfil['sortBy'] = 'id';
			$data_search_sisperfil['sortDirection'] = 'asc';

			$data['pagination'] = $this->basicrud->getPagination(array('nameModel'=>'model','perpage'=>$this->config->item('pag_perpage')),$data_search_pagination);
			$data['sisperfil'] = $this->sisperfil_model->get_m($data_search_sisperfil);
			$data['flag'] = $this->flags;

			$this->load->view('sispermisos_view/record_list_sisperfil',$data);
		}

	}


	public function getMenuAsignados_c($perfiles_id)
	{
		if($this->flagR)
		{
			$data['flag'] = $this->flags;
			$data['menuasignados'] = $this->sisperfil_model->getMenuAssignedToPerfil_m($perfiles_id);
			$this->load->view('sisperfil_view/record_list_menu_asignados',$data);
		}
	}


	public function getMenuSinAsignar_c($perfiles_id)
	{
		if($this->flagR)
		{
			$data['flag'] = $this->flags;
			$data['menusinasignar'] = $this->sisperfil_model->getMenuNotAssignedToPerfil_m($perfiles_id);
			$this->load->view('sisperfil_view/record_list_menu_no_asignados',$data);
		}
	}

}
