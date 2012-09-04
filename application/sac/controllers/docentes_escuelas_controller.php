<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Docentes_escuelas_Controller extends CI_Controller {

	private $flagR;
	private $flagI;
	private $flagU;
	private $flagD;
	private $flags;

	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('logged_in') == true) { 
			$this->load->model('docentes_escuelas_model');
			$this->config->load('docentes_escuelas_settings');
			$data['flags'] = $this->basicauth->getPermissions('docentes_escuelas');
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
			$data['fieldSearch'] = $this->basicrud->getFieldSearch($this->docentes_escuelas_model->getFieldsTable_m());
			$this->load->view('docentes_escuelas_view/home_docentes_escuelas', $data);
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
		$this->form_validation->set_rules('docente_perfil_id', 'docente_perfil_id', 'trim|integer|xss_clean');
		$this->form_validation->set_rules('escuela_id', 'escuela_id', 'trim|integer|xss_clean');
		if($this->form_validation->run())
		{	
			$data_docentes_escuelas  = array();
			$data_docentes_escuelas['docente_perfil_id'] = $this->input->post('docente_perfil_id');
			$data_docentes_escuelas['escuela_id'] = $this->input->post('escuela_id');
			$data_docentes_escuelas['updated_at'] = $this->basicrud->formatDateToBD();

			$id_docentes_escuelas = $this->docentes_escuelas_model->add_m($data_docentes_escuelas);
			if($id_docentes_escuelas){ 
				$this->session->set_flashdata('flashConfirm', $this->config->item('docentes_escuelas_flash_add_message')); 
				redirect('docentes_escuelas_controller','location');
			}else{
				$this->session->set_flashdata('flashError', $this->config->item('docentes_escuelas_flash_error_message')); 
				redirect('docentes_escuelas_controller','location');
			}
		}
		$this->load->view('docentes_escuelas_view/form_add_docentes_escuelas',$data);

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
		$data['docentes_escuelas'] = $this->docentes_escuelas_model->get_m(array('id' => $id),$flag=1);
		$this->form_validation->set_rules('id', 'id', 'trim|integer|xss_clean');
		$this->form_validation->set_rules('docente_perfil_id', 'docente_perfil_id', 'trim|integer|xss_clean');
		$this->form_validation->set_rules('escuela_id', 'escuela_id', 'trim|integer|xss_clean');

		if($this->form_validation->run()){
			$data_docentes_escuelas  = array();
			$data_docentes_escuelas['id'] = $this->input->post('id');
			$data_docentes_escuelas['docente_perfil_id'] = $this->input->post('docente_perfil_id');
			$data_docentes_escuelas['escuela_id'] = $this->input->post('escuela_id');
			$data_docentes_escuelas['updated_at'] = $this->basicrud->formatDateToBD();

			if($this->docentes_escuelas_model->edit_m($data_docentes_escuelas)){ 
				$this->session->set_flashdata('flashConfirm', $this->config->item('docentes_escuelas_flash_edit_message')); 
				redirect('docentes_escuelas_controller','location');
			}else{
				$this->session->set_flashdata('flashError', $this->config->item('docentes_escuelas_flash_error_message')); 
				redirect('docentes_escuelas_controller','location');
			}
		}
		$this->load->view('docentes_escuelas_view/form_edit_docentes_escuelas',$data);

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

		if($this->docentes_escuelas_model->delete_m($id)){ 
			$this->session->set_flashdata('flashConfirm', $this->config->item('docentes_escuelas_flash_delete_message')); 
			redirect('docentes_escuelas_controller','location');
		}else{
			$this->session->set_flashdata('flashError', $this->config->item('docentes_escuelas_flash_error_delete_message')); 
			redirect('docentes_escuelas_controller','location');
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
		$data_search_docentes_escuelas = array(); 
		$data_search_pagination = array(); 
		$flag = 0; 
		$data['flag'] = $this->flags;
		if($this->flagR)
		{
			$fieldSearch = $this->basicrud->getFieldSearch($this->docentes_escuelas_model->getFieldsTable_m());
			foreach($fieldSearch as $field)
			{
				if($this->input->post($field) != '') 
				{
					$data_search_docentes_escuelas[$field] = $this->input->post($field);
					$data_search_pagination[$field] = $this->input->post($field);
					$flag = 1;
				}
			}

			$data_search_pagination['count'] = true;
			$data_search_docentes_escuelas['limit'] = $this->config->item('pag_perpage');
			$data_search_docentes_escuelas['offset'] = $offset;
			$data_search_docentes_escuelas['sortBy'] = 'id';
			$data_search_docentes_escuelas['sortDirection'] = 'asc';

			$data['pagination'] = $this->basicrud->getPagination(array('nameModel'=>'docentes_escuelas_model','perpage'=>$this->config->item('pag_perpage')),$data_search_pagination);
			$data['docentes_escuelas'] = $this->docentes_escuelas_model->get_m($data_search_docentes_escuelas);

			$data['fieldShow'] = $this->basicrud->getFieldToShow($this->docentes_escuelas_model->getFieldsTable_m());
			$this->load->view('docentes_escuelas_view/record_list_docentes_escuelas',$data);
		}

	}

}