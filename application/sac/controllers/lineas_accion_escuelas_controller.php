<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lineas_accion_escuelas_Controller extends CI_Controller {

	private $flagR;
	private $flagI;
	private $flagU;
	private $flagD;
	private $flags;

	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('logged_in') == true) { 
			$this->load->model('lineas_accion_escuelas_model');
			$this->load->model('periodos_escuelas_model');
			$this->load->model('lineas_periodos_escuelas_model');
			$this->load->model('docentes_escuelas_model');
			$this->load->model('lineas_accion_model');
			$this->config->load('lineas_accion_escuelas_settings');
			$data['flags'] = $this->basicauth->getPermissions('lineas_accion_escuelas');
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
			$this->load->view('lineas_accion_escuelas_view/home_lineas_accion_escuelas', $data);
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
	function add_c($escuela_id = "")
	{
		//code here
		if(!$this->flagI){
			echo $this->config->item('accessTitle');
			exit();
		}

		$data = array();
		$data['title_header'] = $this->config->item('recordAddTitle');
		
		$this->form_validation->set_rules('periodo_escuela_id', 'periodo_escuela_id', 'trim|integer|xss_clean');
		$this->form_validation->set_rules('linea_accion_id', 'linea_accion_id', 'trim|integer|xss_clean');

		if($this->form_validation->run())
		{	
			$data_lineas_accion_escuelas  = array();
			$data_lineas_accion_escuelas['periodo_escuela_id'] = $this->input->post('periodo_escuela_id');
			$data_lineas_accion_escuelas['linea_accion_id'] = $this->input->post('linea_accion_id');
			$data_lineas_accion_escuelas['updated_at'] = $this->basicrud->formatDateToBD();

			$id_lineas_accion_escuelas = $this->lineas_accion_escuelas_model->add_m($data_lineas_accion_escuelas);
			if($id_lineas_accion_escuelas){ 
				$this->session->set_flashdata('flashConfirm', $this->config->item('lineas_accion_escuelas_flash_add_message')); 
				redirect('lineas_accion_escuelas_controller','location');
			}else{
				$this->session->set_flashdata('flashError', $this->config->item('lineas_accion_escuelas_flash_error_message')); 
				redirect('lineas_accion_escuelas_controller','location');
			}
		}else{
			$data['lineas_accion'] = $this->lineas_accion_model->get_m(array('habilitado' => 1));
			$data['periodo_escuela'] = $this->periodos_escuelas_model->get_m(array('escuela_id' => $escuela_id,'estado' => 3), 1); //traer periodo activo
			$this->load->view('lineas_accion_escuelas_view/form_add_lineas_accion_escuelas',$data);
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
		$data['lineas_accion_escuelas'] = $this->lineas_accion_escuelas_model->get_m(array('id' => $id),$flag=1);
		
		$this->form_validation->set_rules('id', 'id', 'trim|integer|xss_clean');
		$this->form_validation->set_rules('periodo_escuela_id', 'periodo_escuela_id', 'trim|integer|xss_clean');
		$this->form_validation->set_rules('linea_accion_id', 'linea_accion_id', 'trim|integer|xss_clean');

		if($this->form_validation->run()){
			$data_lineas_accion_escuelas  = array();
			$data_lineas_accion_escuelas['id'] = $this->input->post('id');
			$data_lineas_accion_escuelas['periodo_escuela_id'] = $this->input->post('periodo_escuela_id');
			$data_lineas_accion_escuelas['linea_accion_id'] = $this->input->post('linea_accion_id');
			$data_lineas_accion_escuelas['updated_at'] =  $this->basicrud->formatDateToBD();

			if($this->lineas_accion_escuelas_model->edit_m($data_lineas_accion_escuelas)){ 
				$this->session->set_flashdata('flashConfirm', $this->config->item('lineas_accion_escuelas_flash_edit_message')); 
				redirect('lineas_accion_escuelas_controller','location');
			}else{
				$this->session->set_flashdata('flashError', $this->config->item('lineas_accion_escuelas_flash_error_message')); 
				redirect('lineas_accion_escuelas_controller','location');
			}
		}
		$this->load->view('lineas_accion_escuelas_view/form_edit_lineas_accion_escuelas',$data);

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

		if($this->lineas_accion_escuelas_model->delete_m($id)){ 
			$this->session->set_flashdata('flashConfirm', $this->config->item('lineas_accion_escuelas_flash_delete_message')); 
			redirect('lineas_accion_escuelas_controller','location');
		}else{
			$this->session->set_flashdata('flashError', $this->config->item('lineas_accion_escuelas_flash_error_delete_message')); 
			redirect('lineas_accion_escuelas_controller','location');
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
		$data_search_lineas_accion_escuelas = array(); 
		$data_search_pagination = array(); 
		
		if($this->flagR)
		{
			$fieldSearch = $this->basicrud->getFieldSearch($this->lineas_accion_escuelas_model->getFieldsTable_m());
			foreach($fieldSearch as $field)
			{
				if($this->input->post($field) != '') 
				{
					$data_search_lineas_accion_escuelas[$field] = $this->input->post($field);
					$data_search_pagination[$field] = $this->input->post($field);
				}
			}

			$data_search_pagination['count'] = true;
			$data_search_lineas_accion_escuelas['limit'] = $this->config->item('pag_perpage');
			$data_search_lineas_accion_escuelas['offset'] = $offset;
			$data_search_lineas_accion_escuelas['sortBy'] = 'id';
			$data_search_lineas_accion_escuelas['sortDirection'] = 'asc';

			$data['pagination'] = $this->basicrud->getPagination(array('nameModel'=>'lineas_accion_escuelas_model','perpage'=>$this->config->item('pag_perpage')),$data_search_pagination);
			$data['lineas_accion_escuelas'] = $this->lineas_accion_escuelas_model->get_m($data_search_lineas_accion_escuelas);
		
			$data['flag'] = $this->flags;
			$this->load->view('lineas_accion_escuelas_view/record_list_lineas_accion_escuelas',$data);
		}

	}


	/**
	 * This function filter and sends the data to the view
	 * to shows the found result
	 *
	 * @access public
	 * @return void
	 */
	function searchfast_c($offset = 0,$escuela_id='')
	{
		//code here
		$data = array(); 
		$fieldSearch = array(); 
		$data_search_lineas_accion_escuelas = array(); 
		$data_search_pagination = array(); 
		
		if($this->flagR)
		{
			$fieldSearch = $this->basicrud->getFieldSearch($this->lineas_accion_escuelas_model->getFieldsTable_m());
			foreach($fieldSearch as $field)
			{
				if($this->input->post($field) != '') 
				{
					$data_search_lineas_accion_escuelas[$field] = $this->input->post($field);
					$data_search_pagination[$field] = $this->input->post($field);
				}
			}

			$data_search_pagination['count'] = true;
			$data_search_lineas_accion_escuelas['limit'] = $this->config->item('pag_perpage');
			$data_search_lineas_accion_escuelas['offset'] = $offset;
			$data_search_lineas_accion_escuelas['sortBy'] = 'id';
			$data_search_lineas_accion_escuelas['sortDirection'] = 'asc';

			$data['pagination'] = $this->basicrud->getPagination(array('nameModel'=>'lineas_accion_escuelas_model','perpage'=>$this->config->item('pag_perpage')),$data_search_pagination);
			$data['lineas_accion_escuelas'] = $this->lineas_accion_escuelas_model->get_m($data_search_lineas_accion_escuelas);
		
			$data['flag'] = $this->flags;
			$this->load->view('lineas_accion_escuelas_view/record_list_lineas_accion_escuelas',$data);
		}

	}

}