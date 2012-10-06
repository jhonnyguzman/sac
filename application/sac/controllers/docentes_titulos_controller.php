<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Docentes_titulos_Controller extends CI_Controller {

	private $flagR;
	private $flagI;
	private $flagU;
	private $flagD;
	private $flags;

	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('logged_in') == true) { 
			$this->load->model('docentes_titulos_model');
			$this->config->load('docentes_titulos_settings');
			$data['flags'] = $this->basicauth->getPermissions('docentes_titulos');
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
			$this->load->view('docentes_titulos_view/home_docentes_titulos', $data);
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
		
		$this->form_validation->set_rules('docente_id', 'docente_id', 'trim|required|integer|xss_clean');
		$this->form_validation->set_rules('titulo_id', 'titulo_id', 'trim|required|integer|xss_clean');

		if($this->form_validation->run())
		{	
			$data_docentes_titulos  = array();
			$data_docentes_titulos['docente_id'] = $this->input->post('docente_id');
			$data_docentes_titulos['titulo_id'] = $this->input->post('titulo_id');
			$data_docentes_titulos['updated_at'] = $this->basicrud->formatDateToBD();

			$id_docentes_titulos = $this->docentes_titulos_model->add_m($data_docentes_titulos);
			if($id_docentes_titulos){ 
				$this->session->set_flashdata('flashConfirm', $this->config->item('docentes_titulos_flash_add_message')); 
				redirect('docentes_titulos_controller','location');
			}else{
				$this->session->set_flashdata('flashError', $this->config->item('docentes_titulos_flash_error_message')); 
				redirect('docentes_titulos_controller','location');
			}
		}
		$this->load->view('docentes_titulos_view/form_add_docentes_titulos',$data);

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
		$data['docentes_titulos'] = $this->docentes_titulos_model->get_m(array('id' => $id),$flag=1);
		
		$this->form_validation->set_rules('id', 'id', 'trim|integer|xss_clean');
		$this->form_validation->set_rules('docente_id', 'docente_id', 'trim|required|integer|xss_clean');
		$this->form_validation->set_rules('titulo_id', 'titulo_id', 'trim|required|integer|xss_clean');

		
		if($this->form_validation->run()){
			$data_docentes_titulos  = array();
			$data_docentes_titulos['id'] = $this->input->post('id');
			$data_docentes_titulos['docente_id'] = $this->input->post('docente_id');
			$data_docentes_titulos['titulo_id'] = $this->input->post('titulo_id');
			$data_docentes_titulos['updated_at'] = $this->basicrud->formatDateToBD();

			if($this->docentes_titulos_model->edit_m($data_docentes_titulos)){ 
				$this->session->set_flashdata('flashConfirm', $this->config->item('docentes_titulos_flash_edit_message')); 
				redirect('docentes_titulos_controller','location');
			}else{
				$this->session->set_flashdata('flashError', $this->config->item('docentes_titulos_flash_error_message')); 
				redirect('docentes_titulos_controller','location');
			}
		}
		$this->load->view('docentes_titulos_view/form_edit_docentes_titulos',$data);

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

		if($this->docentes_titulos_model->delete_m($id)){ 
			$this->session->set_flashdata('flashConfirm', $this->config->item('docentes_titulos_flash_delete_message')); 
			redirect('docentes_titulos_controller','location');
		}else{
			$this->session->set_flashdata('flashError', $this->config->item('docentes_titulos_flash_error_delete_message')); 
			redirect('docentes_titulos_controller','location');
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
		$data_search_docentes_titulos = array(); 
		$data_search_pagination = array(); 
		
		if($this->flagR)
		{
			$fieldSearch = $this->basicrud->getFieldSearch($this->docentes_titulos_model->getFieldsTable_m());
			foreach($fieldSearch as $field)
			{
				if($this->input->post($field) != '') 
				{
					$data_search_docentes_titulos[$field] = $this->input->post($field);
					$data_search_pagination[$field] = $this->input->post($field);
					$flag = 1;
				}
			}

			$data_search_pagination['count'] = true;
			$data_search_docentes_titulos['limit'] = $this->config->item('pag_perpage');
			$data_search_docentes_titulos['offset'] = $offset;
			$data_search_docentes_titulos['sortBy'] = 'id';
			$data_search_docentes_titulos['sortDirection'] = 'asc';

			$data['pagination'] = $this->basicrud->getPagination(array('nameModel'=>'docentes_titulos_model','perpage'=>$this->config->item('pag_perpage')),$data_search_pagination);
			$data['docentes_titulos'] = $this->docentes_titulos_model->get_m($data_search_docentes_titulos);
		
			$data['flag'] = $this->flags;
			$this->load->view('docentes_titulos_view/record_list_docentes_titulos',$data);
		}

	}

}