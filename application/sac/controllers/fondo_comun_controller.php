<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fondo_comun_Controller extends CI_Controller {

	private $flagR;
	private $flagI;
	private $flagU;
	private $flagD;
	private $flags;

	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('logged_in') == true) { 
			$this->load->model('fondo_comun_model');
			$this->config->load('fondo_comun_settings');
			$data['flags'] = $this->basicauth->getPermissions('fondo_comun');
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
			$data['subtitle'] = $this->config->item('recordListTitle');
			$this->load->view('fondo_comun_view/home_fondo_comun', $data);
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
		$data['subtitle'] = $this->config->item('recordAddTitle');
		$this->form_validation->set_rules('id', 'id', 'trim|integer|xss_clean');
		$this->form_validation->set_rules('periodo_escuela_id', 'periodo_escuela_id', 'trim|integer|xss_clean');
		$this->form_validation->set_rules('horas_sin_usar', 'horas_sin_usar', 'trim|integer|xss_clean');
		$this->form_validation->set_rules('horas_sin_usar_restantes', 'horas_sin_usar_restantes', 'trim|integer|xss_clean');
		$this->form_validation->set_rules('created_at', 'created_at', 'trim|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('updated_at', 'updated_at', 'trim|alpha_numeric|xss_clean');
		if($this->form_validation->run())
		{	
			$data_fondo_comun  = array();
			$data_fondo_comun['periodo_escuela_id'] = $this->input->post('periodo_escuela_id');
			$data_fondo_comun['horas_sin_usar'] = $this->input->post('horas_sin_usar');
			$data_fondo_comun['horas_sin_usar_restantes'] = $this->input->post('horas_sin_usar_restantes');
			$data_fondo_comun['created_at'] = $this->basicrud->getFormatDateToBD($this->input->post('created_at'));
			$data_fondo_comun['updated_at'] = $this->basicrud->getFormatDateToBD($this->input->post('updated_at'));

			$id_fondo_comun = $this->fondo_comun_model->add_m($data_fondo_comun);
			if($id_fondo_comun){ 
				$this->session->set_flashdata('flashConfirm', $this->config->item('fondo_comun_flash_add_message')); 
				redirect('fondo_comun_controller','location');
			}else{
				$this->session->set_flashdata('flashError', $this->config->item('fondo_comun_flash_error_message')); 
				redirect('fondo_comun_controller','location');
			}
		}
		$this->load->view('fondo_comun_view/form_add_fondo_comun',$data);

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
		$data['subtitle'] = $this->config->item('recordEditTitle');
		$data['fondo_comun'] = $this->fondo_comun_model->get_m(array('id' => $id),$flag=1);
		$this->form_validation->set_rules('id', 'id', 'trim|integer|xss_clean');
		$this->form_validation->set_rules('periodo_escuela_id', 'periodo_escuela_id', 'trim|integer|xss_clean');
		$this->form_validation->set_rules('horas_sin_usar', 'horas_sin_usar', 'trim|integer|xss_clean');
		$this->form_validation->set_rules('horas_sin_usar_restantes', 'horas_sin_usar_restantes', 'trim|integer|xss_clean');
		$this->form_validation->set_rules('created_at', 'created_at', 'trim|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('updated_at', 'updated_at', 'trim|alpha_numeric|xss_clean');
		if($this->form_validation->run()){
			$data_fondo_comun  = array();
			$data_fondo_comun['id'] = $this->input->post('id');
			$data_fondo_comun['periodo_escuela_id'] = $this->input->post('periodo_escuela_id');
			$data_fondo_comun['horas_sin_usar'] = $this->input->post('horas_sin_usar');
			$data_fondo_comun['horas_sin_usar_restantes'] = $this->input->post('horas_sin_usar_restantes');
			$data_fondo_comun['created_at'] = $this->basicrud->getFormatDateToBD($this->input->post('created_at'));
			$data_fondo_comun['updated_at'] = $this->basicrud->getFormatDateToBD($this->input->post('updated_at'));

			if($this->fondo_comun_model->edit_m($data_fondo_comun)){ 
				$this->session->set_flashdata('flashConfirm', $this->config->item('fondo_comun_flash_edit_message')); 
				redirect('fondo_comun_controller','location');
			}else{
				$this->session->set_flashdata('flashError', $this->config->item('fondo_comun_flash_error_message')); 
				redirect('fondo_comun_controller','location');
			}
		}
		$this->load->view('fondo_comun_view/form_edit_fondo_comun',$data);

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

		if($this->fondo_comun_model->delete_m($id)){ 
			$this->session->set_flashdata('flashConfirm', $this->config->item('fondo_comun_flash_delete_message')); 
			redirect('fondo_comun_controller','location');
		}else{
			$this->session->set_flashdata('flashError', $this->config->item('fondo_comun_flash_error_delete_message')); 
			redirect('fondo_comun_controller','location');
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
		$data_search_fondo_comun = array(); 
		$data_search_pagination = array(); 
		
		if($this->flagR)
		{
			$fieldSearch = $this->basicrud->getFieldSearch($this->fondo_comun_model->getFieldsTable_m());
			foreach($fieldSearch as $field)
			{
				if($this->input->post($field) != '') 
				{
					$data_search_fondo_comun[$field] = $this->input->post($field);
					$data_search_pagination[$field] = $this->input->post($field);
				}
			}

			$data_search_pagination['count'] = true;
			$data_search_fondo_comun['limit'] = $this->config->item('pag_perpage');
			$data_search_fondo_comun['offset'] = $offset;
			$data_search_fondo_comun['sortBy'] = 'fondo_comun_id';
			$data_search_fondo_comun['sortDirection'] = 'asc';

			$data['pagination'] = $this->basicrud->getPagination(array('nameModel'=>'fondo_comun_model','perpage'=>$this->config->item('pag_perpage')),$data_search_pagination);
			$data['fondo_comun'] = $this->fondo_comun_model->get_m($data_search_fondo_comun);
			
			$data['flag'] = $this->flags;
			$this->load->view('fondo_comun_view/record_list_fondo_comun',$data);
		}

	}


	/**
	 * This function filter and sends the data to the view
	 * to shows the found result
	 *
	 * @access public
	 * @return void
	 */
	function searchJson_c($offset = 0)
	{
		//code here
		$data = array(); 
		$data_search_fondo_comun = array(); 
		
		if($this->flagR)
		{
			$data_search_fondo_comun['sortBy'] = 'created_at';
			$data_search_fondo_comun['sortDirection'] = 'desc';

			$data['fondo_comun'] = $this->fondo_comun_model->get_m($data_search_fondo_comun);
			if(count($data['fondo_comun']) > 0 )
				echo json_encode($data['fondo_comun']);
			else 
				echo json_encode("0");
		}

	}

}