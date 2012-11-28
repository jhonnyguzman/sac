<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Facturas_Controller extends CI_Controller {

	private $flagR;
	private $flagI;
	private $flagU;
	private $flagD;
	private $flags;

	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('logged_in') == true) { 
			$this->load->model('facturas_model');
			$this->load->model('proveedores_model');
			$this->load->model('facturas_lineas_model');
			$this->load->model('tabgral_model');
			$this->config->load('facturas_settings');
			$data['flags'] = $this->basicauth->getPermissions('facturas');
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
			$data['fieldSearch'] = $this->basicrud->getFieldSearch($this->facturas_model->getFieldsTable_m());
			$this->load->view('facturas_view/home_facturas', $data);
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
		
		$this->form_validation->set_rules('nro_factura', 'nro_factura', 'trim|required|integer|xss_clean');
		$this->form_validation->set_rules('fecha', 'fecha', 'trim|required|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('monto', 'monto', 'trim|required|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('estado', 'estado', 'trim|required|integer|xss_clean');
		$this->form_validation->set_rules('observacion', 'observacion', 'trim|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('proveedor_id', 'proveedor_id', 'trim|required|integer|xss_clean');
		
		
		if($this->form_validation->run())
		{	
			$data_facturas  = array();
			$data_facturas['nro_factura'] = $this->input->post('nro_factura');
			$data_facturas['fecha'] = $this->basicrud->getFormatDateToBD($this->input->post('fecha'));
			$data_facturas['monto'] = $this->input->post('monto');
			$data_facturas['estado'] = $this->input->post('estado');
			$data_facturas['observacion'] = $this->input->post('observacion');
			$data_facturas['proveedor_id'] = $this->input->post('proveedor_id');
			$data_facturas['updated_at'] = $this->basicrud->formatDateToBD();

			$id_facturas = $this->facturas_model->add_m($data_facturas);
			if($id_facturas){ 
				$this->cargarLineasFacturas($id_facturas);
				$this->session->set_flashdata('flashConfirm', $this->config->item('facturas_flash_add_message')); 
				redirect('facturas_controller','location');
			}else{
				$this->session->set_flashdata('flashError', $this->config->item('facturas_flash_error_message')); 
				redirect('facturas_controller','location');
			}
		}else{
			$data["estados"] = $this->tabgral_model->get_m(array("grupos_tabgral_id" => 5));  //traer estados de facturas
			$data["proveedores"] = $this->proveedores_model->get_m(array("habilitado" => 1));
			$this->load->view('facturas_view/form_add_facturas',$data);
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
		$data['facturas'] = $this->facturas_model->get_m(array('id' => $id),$flag=1);
		
		$this->form_validation->set_rules('id', 'id', 'trim|required|integer|xss_clean');
		$this->form_validation->set_rules('nro_factura', 'nro_factura', 'trim|required|integer|xss_clean');
		$this->form_validation->set_rules('fecha', 'fecha', 'trim|required|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('monto', 'monto', 'trim|required|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('estado', 'estado', 'trim|integer|xss_clean');
		$this->form_validation->set_rules('observacion', 'observacion', 'trim|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('proveedor_id', 'proveedor_id', 'trim|required|integer|xss_clean');
		
		
		if($this->form_validation->run()){
			$data_facturas  = array();
			$data_facturas['id'] = $this->input->post('id');
			$data_facturas['nro_factura'] = $this->input->post('nro_factura');
			$data_facturas['fecha'] = $this->basicrud->getFormatDateToBD($this->input->post('fecha'));
			$data_facturas['monto'] = $this->input->post('monto');
			$data_facturas['estado'] = $this->input->post('estado');
			$data_facturas['observacion'] = $this->input->post('observacion');
			$data_facturas['proveedor_id'] = $this->input->post('proveedor_id');
			$data_facturas['updated_at'] = $this->basicrud->formatDateToBD();

			if($this->facturas_model->edit_m($data_facturas))
			{ 
				if($this->deleteLineasFactura($data_facturas['id']))
				{
					$this->cargarLineasFacturas($data_facturas['id']);
					$this->session->set_flashdata('flashConfirm', $this->config->item('facturas_flash_edit_message')); 
					redirect('facturas_controller','location');
				}else{
					$this->session->set_flashdata('flashError', $this->config->item('facturas_flash_error_message')); 
					redirect('facturas_controller','location');	
				}
			}else{
				$this->session->set_flashdata('flashError', $this->config->item('facturas_flash_error_message')); 
				redirect('facturas_controller','location');
			}
		}else{
			$data["estados"] = $this->tabgral_model->get_m(array("grupos_tabgral_id" => 5));  //traer estados de facturas
			$data["proveedores"] = $this->proveedores_model->get_m(array("habilitado" => 1));
			$data["facturas_lineas"] = $this->facturas_lineas_model->get_m(array("factura_id" => $id));
			$this->load->view('facturas_view/form_edit_facturas',$data);
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
	function delete_c($id)
	{
		//code here
		if(!$this->flagD){
			echo $this->config->item('accessTitle');
			exit();
		}

		if($this->facturas_model->delete_m($id)){ 
			$this->session->set_flashdata('flashConfirm', $this->config->item('facturas_flash_delete_message')); 
			redirect('facturas_controller','location');
		}else{
			$this->session->set_flashdata('flashError', $this->config->item('facturas_flash_error_delete_message')); 
			redirect('facturas_controller','location');
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
		$data_search_facturas = array(); 
		$data_search_pagination = array(); 
		
		if($this->flagR)
		{
			$fieldSearch = $this->basicrud->getFieldSearch($this->facturas_model->getFieldsTable_m());
			foreach($fieldSearch as $field)
			{
				if($this->input->post($field) != '') 
				{
					$data_search_facturas[$field] = $this->input->post($field);
					$data_search_pagination[$field] = $this->input->post($field);	
				}
			}

			$data_search_pagination['count'] = true;
			$data_search_facturas['limit'] = $this->config->item('pag_perpage');
			$data_search_facturas['offset'] = $offset;
			$data_search_facturas['sortBy'] = 'id';
			$data_search_facturas['sortDirection'] = 'asc';

			$data['pagination'] = $this->basicrud->getPagination(array('nameModel'=>'facturas_model','perpage'=>$this->config->item('pag_perpage')),$data_search_pagination);
			$data['facturas'] = $this->facturas_model->get_m($data_search_facturas);
		
			$data['flag'] = $this->flags;
			$this->load->view('facturas_view/record_list_facturas',$data);
		}

	}

	private function cargarLineasFacturas($factura_id)
	{
		$conceptos = $this->input->post('concepto');
		$costos = $this->input->post('costo');
		$cantidades = $this->input->post('cantidad');
		$subtotales = $this->input->post('subtotal');
		if(count($conceptos) > 0 )
		{
			for($i = 0; $i < count($conceptos); $i++){
				$data = array();
				$data["concepto"] = $conceptos[$i];
				$data["costo"] = $costos[$i];
				$data["cantidad"] = $cantidades[$i];
				$data["subtotal"] = $subtotales[$i];
				$data["factura_id"] = $factura_id;
				$data["updated_at"] = $this->basicrud->formatDateToBD();
				$id_factura_linea = $this->facturas_lineas_model->add_m($data);
			}
		}
	}

	private function deleteLineasFactura($factura_id)
	{
		if($this->facturas_lineas_model->delete_m(array("factura_id" => $factura_id))){ 
			return TRUE;
		}
		return FALSE;
	}
}