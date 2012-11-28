<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Facturas_lineas_Controller extends CI_Controller {

	private $flagR;
	private $flagI;
	private $flagU;
	private $flagD;
	private $flags;

	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('logged_in') == true) { 
			$this->load->model('facturas_lineas_model');
			$this->config->load('facturas_lineas_settings');
			$data['flags'] = $this->basicauth->getPermissions('facturas_lineas');
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
		$data['title_header'] = $this->config->item('recordAddTitle');
		
		$this->form_validation->set_rules('concepto', 'concepto', 'trim|required|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('costo', 'costo', 'trim|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('cantidad', 'cantidad', 'trim|integer|xss_clean');
		$this->form_validation->set_rules('subtotal', 'subtotal', 'trim|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('factura_id', 'factura_id', 'trim|required|integer|xss_clean');
		
		
		if($this->form_validation->run())
		{	
			$data_facturas_lineas  = array();
			$data_facturas_lineas['concepto'] = $this->input->post('concepto');
			$data_facturas_lineas['costo'] = $this->input->post('costo');
			$data_facturas_lineas['cantidad'] = $this->input->post('cantidad');
			$data_facturas_lineas['subtotal'] = $this->input->post('subtotal');
			$data_facturas_lineas['factura_id'] = $this->input->post('factura_id');
			$data_facturas_lineas['updated_at'] = $this->basicrud->formatDateToBD();

			$id_facturas_lineas = $this->facturas_lineas_model->add_m($data_facturas_lineas);
			if($id_facturas_lineas){ 
				$this->session->set_flashdata('flashConfirm', $this->config->item('facturas_lineas_flash_add_message')); 
				redirect('facturas_lineas_controller','location');
			}else{
				$this->session->set_flashdata('flashError', $this->config->item('facturas_lineas_flash_error_message')); 
				redirect('facturas_lineas_controller','location');
			}
		}
		$this->load->view('facturas_lineas_view/form_add_facturas_lineas',$data);

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
		$data['facturas_lineas'] = $this->facturas_lineas_model->get_m(array('id' => $id),$flag=1);
		$this->form_validation->set_rules('id', 'id', 'trim|required|integer|xss_clean');
		$this->form_validation->set_rules('concepto', 'concepto', 'trim|required|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('costo', 'costo', 'trim|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('cantidad', 'cantidad', 'trim|integer|xss_clean');
		$this->form_validation->set_rules('subtotal', 'subtotal', 'trim|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('factura_id', 'factura_id', 'trim|required|integer|xss_clean');
		
		
		if($this->form_validation->run()){
			$data_facturas_lineas  = array();
			$data_facturas_lineas['id'] = $this->input->post('id');
			$data_facturas_lineas['concepto'] = $this->input->post('concepto');
			$data_facturas_lineas['costo'] = $this->input->post('costo');
			$data_facturas_lineas['cantidad'] = $this->input->post('cantidad');
			$data_facturas_lineas['subtotal'] = $this->input->post('subtotal');
			$data_facturas_lineas['factura_id'] = $this->input->post('factura_id');
			$data_facturas_lineas['updated_at'] = $this->basicrud->formatDateToBD();

			if($this->facturas_lineas_model->edit_m($data_facturas_lineas)){ 
				$this->session->set_flashdata('flashConfirm', $this->config->item('facturas_lineas_flash_edit_message')); 
				redirect('facturas_lineas_controller','location');
			}else{
				$this->session->set_flashdata('flashError', $this->config->item('facturas_lineas_flash_error_message')); 
				redirect('facturas_lineas_controller','location');
			}
		}
		$this->load->view('facturas_lineas_view/form_edit_facturas_lineas',$data);

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

		if($this->facturas_lineas_model->delete_m($id)){ 
			$this->session->set_flashdata('flashConfirm', $this->config->item('facturas_lineas_flash_delete_message')); 
			redirect('facturas_lineas_controller','location');
		}else{
			$this->session->set_flashdata('flashError', $this->config->item('facturas_lineas_flash_error_delete_message')); 
			redirect('facturas_lineas_controller','location');
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
		$data_search_facturas_lineas = array(); 
		$data_search_pagination = array(); 
		
		if($this->flagR)
		{
			$fieldSearch = $this->basicrud->getFieldSearch($this->facturas_lineas_model->getFieldsTable_m());
			foreach($fieldSearch as $field)
			{
				if($this->input->post($field) != '') 
				{
					$data_search_facturas_lineas[$field] = $this->input->post($field);
					$data_search_pagination[$field] = $this->input->post($field);
					
				}
			}

			$data_search_pagination['count'] = true;
			$data_search_facturas_lineas['limit'] = $this->config->item('pag_perpage');
			$data_search_facturas_lineas['offset'] = $offset;
			$data_search_facturas_lineas['sortBy'] = 'id';
			$data_search_facturas_lineas['sortDirection'] = 'asc';

			$data['pagination'] = $this->basicrud->getPagination(array('nameModel'=>'facturas_lineas_model','perpage'=>$this->config->item('pag_perpage')),$data_search_pagination);
			$data['facturas_lineas'] = $this->facturas_lineas_model->get_m($data_search_facturas_lineas);
			
			$data['flag'] = $this->flags;
			$this->load->view('facturas_lineas_view/record_list_facturas_lineas',$data);
		}

	}

}