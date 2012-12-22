<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Eventos_Controller extends CI_Controller {

	private $flagR;
	private $flagI;
	private $flagU;
	private $flagD;
	private $flags;

	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('logged_in') == true) { 
			$this->load->model('eventos_model');
			$this->load->model('proyectos_model');
			$this->config->load('eventos_settings');
			$data['flags'] = $this->basicauth->getPermissions('eventos');
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
	function add_c($proyecto_id = "")
	{
		//code here
		if(!$this->flagI){
			echo $this->config->item('accessTitle');
			exit();
		}

		$data = array();
		$data['title_header'] = $this->config->item('recordAddTitle');
		
		$this->form_validation->set_rules('nombre', 'nombre', 'trim|required|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('descripcion', 'descripcion', 'trim|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('fecha', 'fecha', 'trim|required|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('lugar', 'lugar', 'trim|required|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('cantidad_asistentes', 'cantidad_asistentes', 'trim|required|integer|xss_clean');
		$this->form_validation->set_rules('monto_presupuestado', 'monto_presupuestado', 'trim|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('proyecto_id', 'proyecto_id', 'trim|required|integer|xss_clean');
		
		
		if($this->form_validation->run())
		{	
			$data_eventos  = array();
			$data_eventos['nombre'] = $this->input->post('nombre');
			$data_eventos['descripcion'] = $this->input->post('descripcion');
			$data_eventos['fecha'] = $this->basicrud->getFormatDateToBD($this->input->post('fecha'));
			$data_eventos['lugar'] = $this->input->post('lugar');
			$data_eventos['cantidad_asistentes'] = $this->input->post('cantidad_asistentes');
			$data_eventos['proyecto_id'] = $this->input->post('proyecto_id');
			$data_eventos['updated_at'] = $this->basicrud->formatDateToBD();
			$data_eventos['monto_presupuestado'] = $this->input->post('monto_presupuestado');

			$id_eventos = $this->eventos_model->add_m($data_eventos);
			if($id_eventos){ 
				$this->session->set_flashdata('flashConfirmModal', $this->config->item('eventos_flash_add_message')); 
				redirect('eventos_controller/show_c/'.$proyecto_id,'location');	
			}else{
				$this->session->set_flashdata('flashErrorModal', $this->config->item('eventos_flash_error_message')); 
				redirect('eventos_controller/show_c/'.$proyecto_id,'location');	
			}
		}else{
			$data['proyecto_id'] = $proyecto_id;
			$this->load->view('eventos_view/form_add_eventos',$data);
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
	function edit_c($id,$proyecto_id)
	{
		//code here
		if(!$this->flagU){
			echo $this->config->item('accessTitle');
			exit();
		}

		$data = array();
		$data['title_header'] = $this->config->item('recordEditTitle');
		$data['eventos'] = $this->eventos_model->get_m(array('id' => $id),$flag=1);
		
		$this->form_validation->set_rules('id', 'id', 'trim|required|integer|xss_clean');
		$this->form_validation->set_rules('nombre', 'nombre', 'trim|required|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('descripcion', 'descripcion', 'trim|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('fecha', 'fecha', 'trim|required|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('lugar', 'lugar', 'trim|required|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('cantidad_asistentes', 'cantidad_asistentes', 'trim|required|integer|xss_clean');
		$this->form_validation->set_rules('monto_total', 'monto_total', 'trim|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('monto_presupuestado', 'monto_presupuestado', 'trim|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('proyecto_id', 'proyecto_id', 'trim|required|integer|xss_clean');
		
		
		if($this->form_validation->run()){
			$data_eventos  = array();
			$data_eventos['id'] = $this->input->post('id');
			$data_eventos['nombre'] = $this->input->post('nombre');
			$data_eventos['descripcion'] = $this->input->post('descripcion');
			$data_eventos['fecha'] = $this->basicrud->getFormatDateToBD($this->input->post('fecha'));
			$data_eventos['lugar'] = $this->input->post('lugar');
			$data_eventos['cantidad_asistentes'] = $this->input->post('cantidad_asistentes');
			$data_eventos['monto_total'] = $this->input->post('monto_total');
			$data_eventos['monto_presupuestado'] = $this->input->post('monto_presupuestado');
			$data_eventos['proyecto_id'] = $this->input->post('proyecto_id');
			$data_eventos['updated_at'] = $this->basicrud->formatDateToBD();

			if($this->eventos_model->edit_m($data_eventos)){ 
				$this->session->set_flashdata('flashConfirmModal', $this->config->item('eventos_flash_edit_message')); 
				redirect('eventos_controller/show_c/'.$proyecto_id,'location');	
			}else{
				$this->session->set_flashdata('flashErrorModal', $this->config->item('eventos_flash_error_message')); 
				redirect('eventos_controller/show_c/'.$proyecto_id,'location');	
			}
		}else{
			$data['proyecto_id'] = $proyecto_id;
			$this->load->view('eventos_view/form_edit_eventos',$data);
		}
	}

	public function showModal_c($proyecto_id = "")
	{
		if($proyecto_id){
			$data['flag'] = $this->flags;
			$data['proyecto'] = $this->proyectos_model->get_m(array('id' => $proyecto_id), $flag=1);
			$this->load->view("eventos_view/modal_eventos",$data);
		}
	}

	public function show_c($proyecto_id)
	{
		if($this->flagR)
		{
			$data['flag'] = $this->flags;
			$data['proyecto_id'] = $proyecto_id;
			$data['eventos'] = $this->eventos_model->get_m(array('proyecto_id' => $proyecto_id)); 
			$this->load->view("eventos_view/form_show_eventos",$data);
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
	function delete_c($id,$proyecto_id)
	{
		//code here
		if(!$this->flagD){
			echo $this->config->item('accessTitle');
			exit();
		}

		if($this->eventos_model->delete_m($id)){ 
			$this->session->set_flashdata('flashConfirmModal', $this->config->item('eventos_flash_delete_message')); 
			redirect('eventos_controller/show_c/'.$proyecto_id,'location');	
		}else{
			$this->session->set_flashdata('flashErrorModal', $this->config->item('eventos_flash_error_delete_message')); 
			redirect('eventos_controller/show_c/'.$proyecto_id,'location');	
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
		$data_search_eventos = array(); 
		$data_search_pagination = array(); 
		
		if($this->flagR)
		{
			$fieldSearch = $this->basicrud->getFieldSearch($this->eventos_model->getFieldsTable_m());
			foreach($fieldSearch as $field)
			{
				if($this->input->post($field) != '') 
				{
					$data_search_eventos[$field] = $this->input->post($field);
					$data_search_pagination[$field] = $this->input->post($field);
					
				}
			}

			$data_search_pagination['count'] = true;
			$data_search_eventos['limit'] = $this->config->item('pag_perpage');
			$data_search_eventos['offset'] = $offset;
			$data_search_eventos['sortBy'] = 'id';
			$data_search_eventos['sortDirection'] = 'asc';

			$data['pagination'] = $this->basicrud->getPagination(array('nameModel'=>'eventos_model','perpage'=>$this->config->item('pag_perpage')),$data_search_pagination);
			$data['eventos'] = $this->eventos_model->get_m($data_search_eventos);
		
			$data['flag'] = $this->flags;
			$this->load->view('eventos_view/record_list_eventos',$data);
		}

	}

}