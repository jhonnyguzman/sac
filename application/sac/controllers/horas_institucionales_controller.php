<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Horas_institucionales_Controller extends CI_Controller {

	private $flagR;
	private $flagI;
	private $flagU;
	private $flagD;
	private $flags;

	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('logged_in') == true) { 
			$this->load->model('horas_institucionales_model');
			$this->load->model('escuelas_model');
			$this->config->load('horas_institucionales_settings');
			$data['flags'] = $this->basicauth->getPermissions('horas_institucionales');
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
			$data['escuelas'] = $this->escuelas_model->get_m(array('habilitado' => 1));
			$this->load->view('horas_institucionales_view/home_horas_institucionales', $data);
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

		$this->form_validation->set_rules('linea_accion_docente_id', 'linea_accion_docente_id', 'trim|integer|xss_clean');
		$this->form_validation->set_rules('cantidad_horas', 'cantidad_horas', 'trim|integer|xss_clean');
		$this->form_validation->set_rules('linea_periodo_escuela_id', 'linea_periodo_escuela_id', 'trim|integer|xss_clean');

		if($this->form_validation->run())
		{	
			$data_horas_institucionales  = array();
			$data_horas_institucionales['linea_accion_docente_id'] = $this->input->post('linea_accion_docente_id');
			$data_horas_institucionales['cantidad_horas'] = $this->input->post('cantidad_horas');
			$data_horas_institucionales['linea_periodo_escuela_id'] = $this->input->post('linea_periodo_escuela_id');
			$data_horas_institucionales['updated_at'] = $this->basicrud->formatDateToBD();

			$id_horas_institucionales = $this->horas_institucionales_model->add_m($data_horas_institucionales);
			if($id_horas_institucionales){ 
				$this->session->set_flashdata('flashConfirm', $this->config->item('horas_institucionales_flash_add_message')); 
				redirect('horas_institucionales_controller','location');
			}else{
				$this->session->set_flashdata('flashError', $this->config->item('horas_institucionales_flash_error_message')); 
				redirect('horas_institucionales_controller','location');
			}
		}
		$this->load->view('horas_institucionales_view/form_add_horas_institucionales',$data);

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
		$data['horas_institucionales'] = $this->horas_institucionales_model->get_m(array('id' => $id),$flag=1);
		
		$this->form_validation->set_rules('id', 'id', 'trim|integer|xss_clean');
		$this->form_validation->set_rules('linea_accion_docente_id', 'linea_accion_docente_id', 'trim|integer|xss_clean');
		$this->form_validation->set_rules('cantidad_horas', 'cantidad_horas', 'trim|integer|xss_clean');
		$this->form_validation->set_rules('linea_periodo_escuela_id', 'linea_periodo_escuela_id', 'trim|integer|xss_clean');

		if($this->form_validation->run()){
			$data_horas_institucionales  = array();
			$data_horas_institucionales['id'] = $this->input->post('id');
			$data_horas_institucionales['linea_accion_docente_id'] = $this->input->post('linea_accion_docente_id');
			$data_horas_institucionales['cantidad_horas'] = $this->input->post('cantidad_horas');
			$data_horas_institucionales['linea_periodo_escuela_id'] = $this->input->post('linea_periodo_escuela_id');
			$data_horas_institucionales['updated_at'] = $this->basicrud->formatDateToBD();

			if($this->horas_institucionales_model->edit_m($data_horas_institucionales)){ 
				$this->session->set_flashdata('flashConfirm', $this->config->item('horas_institucionales_flash_edit_message')); 
				redirect('horas_institucionales_controller','location');
			}else{
				$this->session->set_flashdata('flashError', $this->config->item('horas_institucionales_flash_error_message')); 
				redirect('horas_institucionales_controller','location');
			}
		}
		$this->load->view('horas_institucionales_view/form_edit_horas_institucionales',$data);

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

		if($this->horas_institucionales_model->delete_m($id)){ 
			$this->session->set_flashdata('flashConfirm', $this->config->item('horas_institucionales_flash_delete_message')); 
			redirect('horas_institucionales_controller','location');
		}else{
			$this->session->set_flashdata('flashError', $this->config->item('horas_institucionales_flash_error_delete_message')); 
			redirect('horas_institucionales_controller','location');
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
		$data_search_horas_institucionales = array(); 
		$data_search_pagination = array(); 

		if($this->flagR)
		{
			$fieldSearch = $this->basicrud->getFieldSearch($this->horas_institucionales_model->getFieldsTable_m());
			foreach($fieldSearch as $field)
			{
				if($this->input->post($field) != '') 
				{
					$data_search_horas_institucionales[$field] = $this->input->post($field);
					$data_search_pagination[$field] = $this->input->post($field);
				}
			}

			$data_search_pagination['count'] = true;
			$data_search_horas_institucionales['limit'] = $this->config->item('pag_perpage');
			$data_search_horas_institucionales['offset'] = $offset;
			$data_search_horas_institucionales['sortBy'] = 'id';
			$data_search_horas_institucionales['sortDirection'] = 'asc';

			$data['pagination'] = $this->basicrud->getPagination(array('nameModel'=>'horas_institucionales_model','perpage'=>$this->config->item('pag_perpage')),$data_search_pagination);
			$data['horas_institucionales'] = $this->horas_institucionales_model->get_m($data_search_horas_institucionales);

			$data['flag'] = $this->flags;
			$data['fieldShow'] = $this->basicrud->getFieldToShow($this->horas_institucionales_model->getFieldsTable_m());
			$this->load->view('horas_institucionales_view/record_list_horas_institucionales',$data);
		}

	}

}