<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Proveedores_rubros_Controller extends CI_Controller {

	private $flagR;
	private $flagI;
	private $flagU;
	private $flagD;
	private $flags;

	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('logged_in') == true) { 
			$this->load->model('proveedores_rubros_model');
			$this->load->model('proveedores_model');
			$this->load->model('rubros_model');
			$this->config->load('proveedores_rubros_settings');
			$data['flags'] = $this->basicauth->getPermissions('proveedores_rubros');
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
			$data['fieldSearch'] = $this->basicrud->getFieldSearch($this->proveedores_rubros_model->getFieldsTable_m());
			$this->load->view('proveedores_rubros_view/home_proveedores_rubros', $data);
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
	function add_c($proveedor_id = "")
	{
		//code here
		if(!$this->flagI){
			echo $this->config->item('accessTitle');
			exit();
		}

		$data = array();
		
		$this->form_validation->set_rules('proveedor_id', 'proveedor_id', 'trim|required|integer|xss_clean');
		$this->form_validation->set_rules('rubro_id', 'rubro_id', 'trim|required|integer|callback_checkRubro|xss_clean');
	
		if($this->form_validation->run())
		{	
			$data_proveedores_rubros  = array();
			$data_proveedores_rubros['proveedor_id'] = $this->input->post('proveedor_id');
			$data_proveedores_rubros['rubro_id'] = $this->input->post('rubro_id');
			$data_proveedores_rubros['updated_at'] =  $this->basicrud->formatDateToBD();

			$id_proveedores_rubros = $this->proveedores_rubros_model->add_m($data_proveedores_rubros);
			if($id_proveedores_rubros){ 
				$this->session->set_flashdata('flashConfirmModal', $this->config->item('proveedores_rubros_flash_add_message')); 
				redirect('proveedores_rubros_controller/show_c/'.$proveedor_id,'location');
			}else{
				$this->session->set_flashdata('flashErrorModal', $this->config->item('proveedores_rubros_flash_error_message')); 
				redirect('proveedores_rubros_controller/show_c/'.$proveedor_id,'location');
			}
		}else{
			$data['rubros'] = $this->rubros_model->get_m();
			$data["proveedor_id"] = $proveedor_id;
			$this->load->view('proveedores_rubros_view/form_add_proveedores_rubros',$data);
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
		$data['subtitle'] = $this->config->item('recordEditTitle');
		$data['proveedores_rubros'] = $this->proveedores_rubros_model->get_m(array('id' => $id),$flag=1);
		$this->form_validation->set_rules('id', 'id', 'trim|integer|xss_clean');
		$this->form_validation->set_rules('proveedor_id', 'proveedor_id', 'trim|integer|xss_clean');
		$this->form_validation->set_rules('rubro_id', 'rubro_id', 'trim|integer|xss_clean');
		$this->form_validation->set_rules('created_at', 'created_at', 'trim|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('updated_at', 'updated_at', 'trim|alpha_numeric|xss_clean');
		if($this->form_validation->run()){
			$data_proveedores_rubros  = array();
			$data_proveedores_rubros['id'] = $this->input->post('id');
			$data_proveedores_rubros['proveedor_id'] = $this->input->post('proveedor_id');
			$data_proveedores_rubros['rubro_id'] = $this->input->post('rubro_id');
			$data_proveedores_rubros['created_at'] = $this->basicrud->getFormatDateToBD($this->input->post('created_at'));
			$data_proveedores_rubros['updated_at'] = $this->basicrud->getFormatDateToBD($this->input->post('updated_at'));

			if($this->proveedores_rubros_model->edit_m($data_proveedores_rubros)){ 
				$this->session->set_flashdata('flashConfirm', $this->config->item('proveedores_rubros_flash_edit_message')); 
				redirect('proveedores_rubros_controller','location');
			}else{
				$this->session->set_flashdata('flashError', $this->config->item('proveedores_rubros_flash_error_message')); 
				redirect('proveedores_rubros_controller','location');
			}
		}
		$this->load->view('proveedores_rubros_view/form_edit_proveedores_rubros',$data);

	}

	public function showModal_c($proveedor_id = "")
	{
		if($proveedor_id){
			$data['flag'] = $this->flags;
			$data['proveedor'] = $this->proveedores_model->get_m(array('id' => $proveedor_id), $flag=1);
			$this->load->view("proveedores_rubros_view/modal_proveedores_rubros",$data);
		}
	}


	public function show_c($proveedor_id)
	{
		if($this->flagR)
		{
			$data['flag'] = $this->flags;
			$data['proveedor_id'] = $proveedor_id;
			$data['proveedores_rubros'] = $this->proveedores_rubros_model->get_m(array('proveedor_id' => $proveedor_id)); 
			$this->load->view("proveedores_rubros_view/form_show_proveedores_rubros",$data);
		}
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
	function delete_c($id,$proveedor_id)
	{
		//code here
		if(!$this->flagD){
			echo $this->config->item('accessTitle');
			exit();
		}

		if($this->proveedores_rubros_model->delete_m($id)){ 
			$this->session->set_flashdata('flashConfirmModal', $this->config->item('proveedores_rubros_flash_delete_message')); 
			redirect('proveedores_rubros_controller/show_c/'.$proveedor_id,'location');
		}else{
			$this->session->set_flashdata('flashErrorModal', $this->config->item('proveedores_rubros_flash_error_delete_message')); 
			redirect('proveedores_rubros_controller/show_c/'.$proveedor_id,'location');
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
		$data_search_proveedores_rubros = array(); 
		$data_search_pagination = array(); 
		$flag = 0; 
		$data['flag'] = $this->flags;
		if($this->flagR)
		{
			$fieldSearch = $this->basicrud->getFieldSearch($this->proveedores_rubros_model->getFieldsTable_m());
			foreach($fieldSearch as $field)
			{
				if($this->input->post($field) != '') 
				{
					$data_search_proveedores_rubros[$field] = $this->input->post($field);
					$data_search_pagination[$field] = $this->input->post($field);
					$flag = 1;
				}
			}

			$data_search_pagination['count'] = true;
			$data_search_proveedores_rubros['limit'] = $this->config->item('pag_perpage');
			$data_search_proveedores_rubros['offset'] = $offset;
			$data_search_proveedores_rubros['sortBy'] = 'id';
			$data_search_proveedores_rubros['sortDirection'] = 'asc';

			if($flag==1){
				$data['pagination'] = $this->basicrud->getPagination(array('nameModel'=>'proveedores_rubros_model','perpage'=>$this->config->item('pag_perpage')),$data_search_pagination);
				$data['proveedores_rubros'] = $this->proveedores_rubros_model->get_m($data_search_proveedores_rubros);
			}else{
				$data['pagination'] = $this->basicrud->getPagination(array('nameModel'=>'proveedores_rubros_model','perpage'=>$this->config->item('pag_perpage'),$data_search_pagination));
				$data['proveedores_rubros'] = $this->proveedores_rubros_model->get_m($data_search_proveedores_rubros);
			}
			$data['fieldShow'] = $this->basicrud->getFieldToShow($this->proveedores_rubros_model->getFieldsTable_m());
			$this->load->view('proveedores_rubros_view/record_list_proveedores_rubros',$data);
		}

	}

	function checkRubro($rubro_id)
	{
		$proveedor_rubro = $this->proveedores_rubros_model->get_m(array('rubro_id' => $rubro_id, "proveedor_id" => $this->input->post("proveedor_id")));
		if(count($proveedor_rubro) > 0){
			$this->form_validation->set_message('checkRubro','El Rubro seleccionado ya ha sido asignado a este proveedor');
			return false;
		}else{
			return true;
		}
	}

}