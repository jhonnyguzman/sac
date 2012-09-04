<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Docentes_perfiles_Controller extends CI_Controller {

	private $flagR;
	private $flagI;
	private $flagU;
	private $flagD;
	private $flags;

	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('logged_in') == true) { 
			$this->load->model('docentes_perfiles_model');
			$this->config->load('docentes_perfiles_settings');
			$data['flags'] = $this->basicauth->getPermissions('docentes_perfiles');
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
			$data['fieldSearch'] = $this->basicrud->getFieldSearch($this->docentes_perfiles_model->getFieldsTable_m());
			$this->load->view('docentes_perfiles_view/home_docentes_perfiles', $data);
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
		$this->form_validation->set_rules('docente_id', 'docente_id', 'trim|integer|xss_clean');
		$this->form_validation->set_rules('perfil_id', 'perfil_id', 'trim|integer|xss_clean');
		if($this->form_validation->run())
		{	
			$data_docentes_perfiles  = array();
			$data_docentes_perfiles['docente_id'] = $this->input->post('docente_id');
			$data_docentes_perfiles['perfil_id'] = $this->input->post('perfil_id');
			$data_docentes_perfiles['updated_at'] = $this->basicrud->formatDateToBD();

			$id_docentes_perfiles = $this->docentes_perfiles_model->add_m($data_docentes_perfiles);
			if($id_docentes_perfiles){ 
				$this->session->set_flashdata('flashConfirm', $this->config->item('docentes_perfiles_flash_add_message')); 
				redirect('docentes_perfiles_controller','location');
			}else{
				$this->session->set_flashdata('flashError', $this->config->item('docentes_perfiles_flash_error_message')); 
				redirect('docentes_perfiles_controller','location');
			}
		}
		$this->load->view('docentes_perfiles_view/form_add_docentes_perfiles',$data);

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
		$data['docentes_perfiles'] = $this->docentes_perfiles_model->get_m(array('id' => $id),$flag=1);
		$this->form_validation->set_rules('id', 'id', 'trim|integer|xss_clean');
		$this->form_validation->set_rules('docente_id', 'docente_id', 'trim|integer|xss_clean');
		$this->form_validation->set_rules('perfil_id', 'perfil_id', 'trim|integer|xss_clean');
		if($this->form_validation->run()){
			$data_docentes_perfiles  = array();
			$data_docentes_perfiles['id'] = $this->input->post('id');
			$data_docentes_perfiles['docente_id'] = $this->input->post('docente_id');
			$data_docentes_perfiles['perfil_id'] = $this->input->post('perfil_id');
			$data_docentes_perfiles['updated_at'] = $this->basicrud->formatDateToBD();

			if($this->docentes_perfiles_model->edit_m($data_docentes_perfiles)){ 
				$this->session->set_flashdata('flashConfirm', $this->config->item('docentes_perfiles_flash_edit_message')); 
				redirect('docentes_perfiles_controller','location');
			}else{
				$this->session->set_flashdata('flashError', $this->config->item('docentes_perfiles_flash_error_message')); 
				redirect('docentes_perfiles_controller','location');
			}
		}
		$this->load->view('docentes_perfiles_view/form_edit_docentes_perfiles',$data);

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

		if($this->docentes_perfiles_model->delete_m($id)){ 
			$this->session->set_flashdata('flashConfirm', $this->config->item('docentes_perfiles_flash_delete_message')); 
			redirect('docentes_perfiles_controller','location');
		}else{
			$this->session->set_flashdata('flashError', $this->config->item('docentes_perfiles_flash_error_delete_message')); 
			redirect('docentes_perfiles_controller','location');
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
		$data_search_docentes_perfiles = array(); 
		$data_search_pagination = array(); 
		$flag = 0; 
		$data['flag'] = $this->flags;
		if($this->flagR)
		{
			$fieldSearch = $this->basicrud->getFieldSearch($this->docentes_perfiles_model->getFieldsTable_m());
			foreach($fieldSearch as $field)
			{
				if($this->input->post($field) != '') 
				{
					$data_search_docentes_perfiles[$field] = $this->input->post($field);
					$data_search_pagination[$field] = $this->input->post($field);
					$flag = 1;
				}
			}

			$data_search_pagination['count'] = true;
			$data_search_docentes_perfiles['limit'] = $this->config->item('pag_perpage');
			$data_search_docentes_perfiles['offset'] = $offset;
			$data_search_docentes_perfiles['sortBy'] = 'id';
			$data_search_docentes_perfiles['sortDirection'] = 'asc';

			$data['pagination'] = $this->basicrud->getPagination(array('nameModel'=>'docentes_perfiles_model','perpage'=>$this->config->item('pag_perpage')),$data_search_pagination);
			$data['docentes_perfiles'] = $this->docentes_perfiles_model->get_m($data_search_docentes_perfiles);
			
			$data['fieldShow'] = $this->basicrud->getFieldToShow($this->docentes_perfiles_model->getFieldsTable_m());
			$this->load->view('docentes_perfiles_view/record_list_docentes_perfiles',$data);
		}

	}

}