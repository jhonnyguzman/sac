<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fuentes_lineas_Controller extends CI_Controller {

	private $flagR;
	private $flagI;
	private $flagU;
	private $flagD;
	private $flags;

	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('logged_in') == true) { 
			$this->load->model('fuentes_lineas_model');
			$this->load->model('fuentes_model');
			$this->config->load('fuentes_lineas_settings');
			$data['flags'] = $this->basicauth->getPermissions('fuentes_lineas');
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
	function add_c($fuente_id="")
	{
		//code here
		if(!$this->flagI){
			echo $this->config->item('accessTitle');
			exit();
		}

		$data = array();
		$data['title_header'] = $this->config->item('recordAddTitle');
		
		$this->form_validation->set_rules('fuente_id', 'fuente_id', 'trim|required|integer|xss_clean');
		$this->form_validation->set_rules('anio', 'anio', 'trim|required|integer|callback_checkAnio|xss_clean');
		$this->form_validation->set_rules('monto_global', 'monto_global', 'trim|required|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('monto_especial', 'monto_especial', 'trim|required|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('estado', 'estado', 'trim|integer|xss_clean');
		
		
		if($this->form_validation->run())
		{	
			$data_fuentes_lineas  = array();
			$data_fuentes_lineas['fuente_id'] = $this->input->post('fuente_id');
			$data_fuentes_lineas['anio'] = $this->input->post('anio');
			$data_fuentes_lineas['monto_global'] = $this->input->post('monto_global');
			$data_fuentes_lineas['monto_especial'] = $this->input->post('monto_especial');
			$data_fuentes_lineas['estado'] = 12; //estado 'Activa'
			$data_fuentes_lineas['updated_at'] = $this->basicrud->formatDateToBD();

			$id_fuentes_lineas = $this->fuentes_lineas_model->add_m($data_fuentes_lineas);
			if($id_fuentes_lineas){ 
				if($this->fuentes_lineas_model->cambiarEstado_m($id_fuentes_lineas,$this->input->post('fuente_id')))
				{ 
					$this->session->set_flashdata('flashConfirmModal', $this->config->item('fuentes_lineas_flash_add_message')); 
					redirect('fuentes_lineas_controller/show_c/'.$fuente_id,'location');
				}else{
					$this->session->set_flashdata('flashErrorModal', $this->config->item('fuentes_lineas_flash_error_message')); 
					redirect('fuentes_lineas_controller/show_c/'.$fuente_id,'location');
				}
			}else{
				$this->session->set_flashdata('flashErrorModal', $this->config->item('fuentes_lineas_flash_error_message')); 
				redirect('fuentes_lineas_controller/show_c/'.$fuente_id,'location');
			}
		}else{
			$data["fuente_id"] = $fuente_id;
			$data["anios"] = $this->basicrud->getAnios();
			$this->load->view('fuentes_lineas_view/form_add_fuentes_lineas',$data);
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
	function edit_c($id,$fuente_id)
	{
		//code here
		if(!$this->flagU){
			echo $this->config->item('accessTitle');
			exit();
		}

		$data = array();
		$data['title_header'] = $this->config->item('recordEditTitle');
		$data['fuentes_lineas'] = $this->fuentes_lineas_model->get_m(array('id' => $id),$flag=1);
		
		$this->form_validation->set_rules('id', 'id', 'trim|required|integer|xss_clean');
		$this->form_validation->set_rules('fuente_id', 'fuente_id', 'trim|required|integer|xss_clean');
		$this->form_validation->set_rules('anio', 'anio', 'trim|required|integer|xss_clean');
		$this->form_validation->set_rules('monto_global', 'monto_global', 'trim|required|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('monto_especial', 'monto_especial', 'trim|required|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('estado', 'estado', 'trim|integer|xss_clean');
		
		
		if($this->form_validation->run()){
			$data_fuentes_lineas  = array();
			$data_fuentes_lineas['id'] = $this->input->post('id');
			$data_fuentes_lineas['fuente_id'] = $this->input->post('fuente_id');
			$data_fuentes_lineas['anio'] = $this->input->post('anio');
			$data_fuentes_lineas['monto_global'] = $this->input->post('monto_global');
			$data_fuentes_lineas['monto_especial'] = $this->input->post('monto_especial');
			$data_fuentes_lineas['estado'] = $this->input->post('estado');
			$data_fuentes_lineas['updated_at'] = $this->basicrud->formatDateToBD();

			if($this->fuentes_lineas_model->edit_m($data_fuentes_lineas)){ 
				$this->session->set_flashdata('flashConfirmModal', $this->config->item('fuentes_lineas_flash_edit_message')); 
				redirect('fuentes_lineas_controller/show_c/'.$fuente_id,'location');
			}else{
				$this->session->set_flashdata('flashErrorModal', $this->config->item('fuentes_lineas_flash_error_message')); 
				redirect('fuentes_lineas_controller/show_c/'.$fuente_id,'location');
			}
		}else{
			$data["fuente_id"] = $fuente_id;
			$data["anios"] = $this->basicrud->getAnios();
			$this->load->view('fuentes_lineas_view/form_edit_fuentes_lineas',$data);
		}
	}


	public function showModal_c($fuente_id = "")
	{
		if($fuente_id){
			$data['flag'] = $this->flags;
			$data['fuente'] = $this->fuentes_model->get_m(array('id' => $fuente_id), $flag=1);
			$this->load->view("fuentes_lineas_view/modal_fuentes_lineas",$data);
		}
	}


	public function show_c($fuente_id)
	{
		if($this->flagR)
		{
			$data['flag'] = $this->flags;
			$data['fuente_id'] = $fuente_id;
			$data['fuentes_lineas'] = $this->fuentes_lineas_model->get_m(array('fuente_id' => $fuente_id)); 
			$this->load->view("fuentes_lineas_view/form_show_fuentes_lineas",$data);
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
	function delete_c($id,$fuente_id)
	{
		//code here
		if(!$this->flagD){
			echo $this->config->item('accessTitle');
			exit();
		}

		if($this->fuentes_lineas_model->delete_m($id)){ 
			$this->session->set_flashdata('flashConfirmModal', $this->config->item('fuentes_lineas_flash_delete_message')); 
			redirect('fuentes_lineas_controller/show_c/'.$fuente_id,'location');
		}else{
			$this->session->set_flashdata('flashErrorModal', $this->config->item('fuentes_lineas_flash_error_delete_message')); 
			redirect('fuentes_lineas_controller/show_c/'.$fuente_id,'location');
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
		$data_search_fuentes_lineas = array(); 
		$data_search_pagination = array(); 
	
		if($this->flagR)
		{
			$fieldSearch = $this->basicrud->getFieldSearch($this->fuentes_lineas_model->getFieldsTable_m());
			foreach($fieldSearch as $field)
			{
				if($this->input->post($field) != '') 
				{
					$data_search_fuentes_lineas[$field] = $this->input->post($field);
					$data_search_pagination[$field] = $this->input->post($field);
					
				}
			}

			$data_search_pagination['count'] = true;
			$data_search_fuentes_lineas['limit'] = $this->config->item('pag_perpage');
			$data_search_fuentes_lineas['offset'] = $offset;
			$data_search_fuentes_lineas['sortBy'] = 'id';
			$data_search_fuentes_lineas['sortDirection'] = 'asc';

			$data['pagination'] = $this->basicrud->getPagination(array('nameModel'=>'fuentes_lineas_model','perpage'=>$this->config->item('pag_perpage')),$data_search_pagination);
			$data['fuentes_lineas'] = $this->fuentes_lineas_model->get_m($data_search_fuentes_lineas);
		
			$data['flag'] = $this->flags;
			$this->load->view('fuentes_lineas_view/record_list_fuentes_lineas',$data);
		}

	}


	function checkAnio($anio)
	{
		$fuente_linea = $this->fuentes_lineas_model->get_m(array('anio' => $anio, "fuente_id" => $this->input->post("fuente_id")));
		if(count($fuente_linea) > 0){
			$this->form_validation->set_message('checkAnio','El Año seleccionado ya ha sido asignado a esta fuente');
			return false;
		}else{
			return true;
		}
	}
}