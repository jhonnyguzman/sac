<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Proveedores_Controller extends CI_Controller {

	private $flagR;
	private $flagI;
	private $flagU;
	private $flagD;
	private $flags;

	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('logged_in') == true) { 
			$this->load->model('proveedores_model');
			$this->config->load('proveedores_settings');
			$data['flags'] = $this->basicauth->getPermissions('proveedores');
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
			$data['fieldSearch'] = $this->basicrud->getFieldSearch($this->proveedores_model->getFieldsTable_m());
			$this->load->view('proveedores_view/home_proveedores', $data);
		
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
		
		$this->form_validation->set_rules('cuit', 'cuit', 'trim|required|alpha_numeric|callback_checkCuit|xss_clean');
		$this->form_validation->set_rules('razon_social', 'razon_social', 'trim|required|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('domicilio', 'domicilio', 'trim|required|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('telefono', 'telefono', 'trim|required|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('celular', 'celular', 'trim|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('email', 'email', 'trim|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('habilitado', 'habilitado', 'trim|integer|xss_clean');
	
		if($this->form_validation->run())
		{	
			$data_proveedores  = array();
			$data_proveedores['cuit'] = $this->input->post('cuit');
			$data_proveedores['razon_social'] = $this->input->post('razon_social');
			$data_proveedores['domicilio'] = $this->input->post('domicilio');
			$data_proveedores['telefono'] = $this->input->post('telefono');
			$data_proveedores['celular'] = $this->input->post('celular');
			$data_proveedores['email'] = $this->input->post('email');
			$data_proveedores['habilitado'] = $this->input->post('habilitado');
			$data_proveedores['updated_at'] = $this->basicrud->formatDateToBD();

			$id_proveedores = $this->proveedores_model->add_m($data_proveedores);
			if($id_proveedores){ 
				$this->session->set_flashdata('flashConfirm', $this->config->item('proveedores_flash_add_message')); 
				redirect('proveedores_controller','location');
			}else{
				$this->session->set_flashdata('flashError', $this->config->item('proveedores_flash_error_message')); 
				redirect('proveedores_controller','location');
			}
		}
		$this->load->view('proveedores_view/form_add_proveedores',$data);

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
		$data['proveedores'] = $this->proveedores_model->get_m(array('id' => $id),$flag=1);

		$this->form_validation->set_rules('id', 'id', 'trim|required|integer|xss_clean');
		$this->form_validation->set_rules('cuit', 'cuit', 'trim|required|alpha_numeric|callback_checkCuitEdit|xss_clean');
		$this->form_validation->set_rules('razon_social', 'razon_social', 'trim|required|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('domicilio', 'domicilio', 'trim|required|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('telefono', 'telefono', 'trim|required|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('celular', 'celular', 'trim|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('email', 'email', 'trim|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('habilitado', 'habilitado', 'trim|integer|xss_clean');

		if($this->form_validation->run()){
			$data_proveedores  = array();
			$data_proveedores['id'] = $this->input->post('id');
			$data_proveedores['cuit'] = $this->input->post('cuit');
			$data_proveedores['razon_social'] = $this->input->post('razon_social');
			$data_proveedores['domicilio'] = $this->input->post('domicilio');
			$data_proveedores['telefono'] = $this->input->post('telefono');
			$data_proveedores['celular'] = $this->input->post('celular');
			$data_proveedores['email'] = $this->input->post('email');
			$data_proveedores['habilitado'] = $this->input->post('habilitado');
			$data_proveedores['updated_at'] = $this->basicrud->formatDateToBD();

			if($this->proveedores_model->edit_m($data_proveedores)){ 
				$this->session->set_flashdata('flashConfirm', $this->config->item('proveedores_flash_edit_message')); 
				redirect('proveedores_controller','location');
			}else{
				$this->session->set_flashdata('flashError', $this->config->item('proveedores_flash_error_message')); 
				redirect('proveedores_controller','location');
			}
		}
		$this->load->view('proveedores_view/form_edit_proveedores',$data);

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

		if($this->proveedores_model->delete_m($id)){ 
			$this->session->set_flashdata('flashConfirm', $this->config->item('proveedores_flash_delete_message')); 
			redirect('proveedores_controller','location');
		}else{
			$this->session->set_flashdata('flashError', $this->config->item('proveedores_flash_error_delete_message')); 
			redirect('proveedores_controller','location');
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
		$data_search_proveedores = array(); 
		$data_search_pagination = array(); 

		if($this->flagR)
		{
			$fieldSearch = $this->basicrud->getFieldSearch($this->proveedores_model->getFieldsTable_m());
			foreach($fieldSearch as $field)
			{
				if($this->input->post($field) != '') 
				{
					$data_search_proveedores[$field] = $this->input->post($field);
					$data_search_pagination[$field] = $this->input->post($field);
				}
			}

			$data_search_pagination['count'] = true;
			$data_search_proveedores['limit'] = $this->config->item('pag_perpage');
			$data_search_proveedores['offset'] = $offset;
			$data_search_proveedores['sortBy'] = 'id';
			$data_search_proveedores['sortDirection'] = 'asc';

			$data['pagination'] = $this->basicrud->getPagination(array('nameModel'=>'proveedores_model','perpage'=>$this->config->item('pag_perpage')),$data_search_pagination);
			$data['proveedores'] = $this->proveedores_model->get_m($data_search_proveedores);
		
			$data['flag'] = $this->flags;
			$this->load->view('proveedores_view/record_list_proveedores',$data);
		}

	}

	function checkCuit($cuit)
	{
		$proveedor = $this->proveedores_model->get_m(array('cuit' => $cuit));
		if(count($proveedor) > 0){
			$this->form_validation->set_message('checkCuit','El C.U.I.T. del proveedor ingresado ya existe en el sistema.');
			return false;
		}else{
			return true;
		}
	}

	function checkCuitEdit($cuit)
	{
		$proveedor = $this->proveedores_model->getExisteCuit_m(array('id'=>$this->input->post("id"), 'cuit' => $cuit));
		if(count($proveedor) > 0){
			$this->form_validation->set_message('checkCuitEdit','El C.U.I.T. del proveedor ingresado ya existe en el sistema.');
			return false;
		}else{
			return true;
		}
	}

}