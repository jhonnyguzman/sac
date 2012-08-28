<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Circuitos_Controller extends CI_Controller {

	private $flagR;
	private $flagI;
	private $flagU;
	private $flagD;
	private $flags;

	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('logged_in') == true) { 
			$this->load->model('circuitos_model');
			$this->config->load('circuitos_settings');
			$data['flags'] = $this->basicauth->getPermissions('circuitos');
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
			$data['fieldSearch'] = $this->basicrud->getFieldSearch($this->circuitos_model->getFieldsTable_m());
			$this->load->view('circuitos_view/home_circuitos', $data);
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
	
		$this->form_validation->set_rules('nombre', 'nombre', 'trim|required|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('habilitado', 'habilitado', 'trim|integer|xss_clean');
		if($this->form_validation->run())
		{	
			$data_circuitos  = array();
			$data_circuitos['nombre'] = $this->input->post('nombre');
			$data_circuitos['habilitado'] = $this->input->post('habilitado');
			$data_circuitos['updated_at'] = $this->basicrud->formatDateToBD();

			$id_circuitos = $this->circuitos_model->add_m($data_circuitos);
			if($id_circuitos){ 
				$this->session->set_flashdata('flashConfirm', $this->config->item('circuitos_flash_add_message')); 
				redirect('circuitos_controller','location');
			}else{
				$this->session->set_flashdata('flashError', $this->config->item('circuitos_flash_error_message')); 
				redirect('circuitos_controller','location');
			}
		}
		$this->load->view('circuitos_view/form_add_circuitos',$data);

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
		$data['circuitos'] = $this->circuitos_model->get_m(array('id' => $id),$flag=1);
		$this->form_validation->set_rules('id', 'id', 'trim|integer|xss_clean');
		$this->form_validation->set_rules('nombre', 'nombre', 'trim|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('habilitado', 'habilitado', 'trim|integer|xss_clean');
		$this->form_validation->set_rules('created_at', 'created_at', 'trim|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('updated_at', 'updated_at', 'trim|alpha_numeric|xss_clean');
		if($this->form_validation->run()){
			$data_circuitos  = array();
			$data_circuitos['id'] = $this->input->post('id');
			$data_circuitos['nombre'] = $this->input->post('nombre');
			$data_circuitos['habilitado'] = $this->input->post('habilitado');
			$data_circuitos['created_at'] = $this->basicrud->getFormatDateToBD($this->input->post('created_at'));
			$data_circuitos['updated_at'] = $this->basicrud->getFormatDateToBD($this->input->post('updated_at'));

			if($this->circuitos_model->edit_m($data_circuitos)){ 
				$this->session->set_flashdata('flashConfirm', $this->config->item('circuitos_flash_edit_message')); 
				redirect('circuitos_controller','location');
			}else{
				$this->session->set_flashdata('flashError', $this->config->item('circuitos_flash_error_message')); 
				redirect('circuitos_controller','location');
			}
		}
		$this->load->view('circuitos_view/form_edit_circuitos',$data);

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

		if($this->circuitos_model->delete_m($id)){ 
			$this->session->set_flashdata('flashConfirm', $this->config->item('circuitos_flash_delete_message')); 
			redirect('circuitos_controller','location');
		}else{
			$this->session->set_flashdata('flashError', $this->config->item('circuitos_flash_error_delete_message')); 
			redirect('circuitos_controller','location');
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
		$data_search_circuitos = array(); 
		$data_search_pagination = array(); 
		
		if($this->flagR)
		{
			$fieldSearch = $this->basicrud->getFieldSearch($this->circuitos_model->getFieldsTable_m());
			foreach($fieldSearch as $field)
			{
				if($this->input->post($field) != '') 
				{
					$data_search_circuitos[$field] = $this->input->post($field);
					$data_search_pagination[$field] = $this->input->post($field);
				}
			}

			$data_search_pagination['count'] = true;
			$data_search_circuitos['limit'] = $this->config->item('pag_perpage');
			$data_search_circuitos['offset'] = $offset;
			$data_search_circuitos['sortBy'] = 'id';
			$data_search_circuitos['sortDirection'] = 'asc';

			
			$data['pagination'] = $this->basicrud->getPagination(array('nameModel'=>'circuitos_model','perpage'=>$this->config->item('pag_perpage')),$data_search_pagination);
			$data['circuitos'] = $this->circuitos_model->get_m($data_search_circuitos);
			
			$data['flag'] = $this->flags;
			$data['fieldShow'] = $this->basicrud->getFieldToShow($this->circuitos_model->getFieldsTable_m());
			$this->load->view('circuitos_view/record_list_circuitos',$data);
		}

	}

}