<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Proyectos_personas_Controller extends CI_Controller {

	private $flagR;
	private $flagI;
	private $flagU;
	private $flagD;
	private $flags;

	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('logged_in') == true) { 
			$this->load->model('proyectos_personas_model');
			$this->load->model('proyectos_model');
			$this->load->model('personas_model');
			$this->load->model('escuelas_model');
			$this->load->model('contratados_model');
			$this->load->model('adscriptos_model');
			$this->config->load('proyectos_personas_settings');
			$data['flags'] = $this->basicauth->getPermissions('proyectos_personas');
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
		
		$this->form_validation->set_rules('proyecto_id', 'proyecto_id', 'trim|required|integer|xss_clean');
		$this->form_validation->set_rules('persona_id', 'persona_id', 'trim|required|integer|xss_clean');
		$this->form_validation->set_rules('tipo', 'Tipo', 'trim|required|alpha_numeric|xss_clean');
		
		if($this->form_validation->run())
		{	
			$data_proyectos_personas  = array();
			$data_proyectos_personas['proyecto_id'] = $this->input->post('proyecto_id');
			$data_proyectos_personas['persona_id'] = $this->input->post('persona_id');
			$data_proyectos_personas['updated_at'] = $this->basicrud->formatDateToBD();

			$id_proyectos_personas = $this->proyectos_personas_model->add_m($data_proyectos_personas);
			if($id_proyectos_personas){ 
				if($this->cargarTipo($id_proyectos_personas)){
					$this->session->set_flashdata('flashConfirmModal', $this->config->item('proyectos_personas_flash_add_message')); 
					redirect('proyectos_personas_controller/show_c/'.$proyecto_id,'location');	
				}else{
					$this->session->set_flashdata('flashErrorModal', $this->config->item('proyectos_personas_flash_error_message')); 
					redirect('proyectos_personas_controller/show_c/'.$proyecto_id,'location');		
				}
			}else{
				$this->session->set_flashdata('flashErrorModal', $this->config->item('proyectos_personas_flash_error_message')); 
				redirect('proyectos_personas_controller/show_c/'.$proyecto_id,'location');	
			}
		}else{
			$data['personas'] = $this->personas_model->get_m(array('habilitado' => 1));
			$data['escuelas'] = $this->escuelas_model->get_m(array('habilitado' => 1));
			$data['proyecto_id'] = $proyecto_id;
			$this->load->view('proyectos_personas_view/form_add_proyectos_personas',$data);
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
		$data['proyectos_personas'] = $this->proyectos_personas_model->get_m(array('id' => $id),$flag=1);
		
		$this->form_validation->set_rules('id', 'id', 'trim|required|integer|xss_clean');
		$this->form_validation->set_rules('proyecto_id', 'proyecto_id', 'trim|required|integer|xss_clean');
		$this->form_validation->set_rules('persona_id', 'persona_id', 'trim|required|integer|xss_clean');
		$this->form_validation->set_rules('tipo', 'Tipo', 'trim|required|alpha_numeric|xss_clean');
		
		if($this->form_validation->run()){
			$data_proyectos_personas  = array();
			$data_proyectos_personas['id'] = $this->input->post('id');
			$data_proyectos_personas['proyecto_id'] = $this->input->post('proyecto_id');
			$data_proyectos_personas['persona_id'] = $this->input->post('persona_id');
			$data_proyectos_personas['updated_at'] = $this->basicrud->formatDateToBD();

			if($this->proyectos_personas_model->edit_m($data_proyectos_personas)){
				if($this->editTipo($this->input->post('id'))){ 
					$this->session->set_flashdata('flashConfirmModal', $this->config->item('proyectos_personas_flash_edit_message')); 
					redirect('proyectos_personas_controller/show_c/'.$proyecto_id,'location');	
				}else{
					$this->session->set_flashdata('flashErrorModal', $this->config->item('proyectos_personas_flash_error_message')); 
					redirect('proyectos_personas_controller/show_c/'.$proyecto_id,'location');	
				}
			}else{
				$this->session->set_flashdata('flashErrorModal', $this->config->item('proyectos_personas_flash_error_message')); 
				redirect('proyectos_personas_controller/show_c/'.$proyecto_id,'location');	
			}
		}else{
			$data['escuelas'] = $this->escuelas_model->get_m(array('habilitado' => 1));
			$data['proyecto_id'] = $proyecto_id;
			$data['contratados'] = $this->contratados_model->get_m(array('proyecto_persona_id' => $id), $flag = 1);
			$data['adscriptos'] = $this->adscriptos_model->get_m(array('proyecto_persona_id' => $id), $flag = 1);
			if($data['contratados']) $data['tipo'] = "contratado";
			elseif($data['adscriptos']){
				$data['tipo'] = "adscripto"; 
				$data['escuelas'] = $this->escuelas_model->get_m(array('habilitado' => 1));
			}
			$this->load->view('proyectos_personas_view/form_edit_proyectos_personas',$data);
		}
	}

	public function showModal_c($proyecto_id = "")
	{
		if($proyecto_id){
			$data['proyecto'] = $this->proyectos_model->get_m(array('id' => $proyecto_id), $flag=1);
			$data['personas'] = $this->personas_model->get_m(array('habilitado' => 1));
			$this->load->view("proyectos_personas_view/modal_proyectos_personas",$data);
		}
	}


	public function show_c($proyecto_id)
	{
		if($this->flagR)
		{
			$data['flag'] = $this->flags;
			$data['proyecto_id'] = $proyecto_id;
			$data['proyectos_personas'] = $this->proyectos_personas_model->get_m(array('proyecto_id' => $proyecto_id)); 
			//$data['personas_sin_asignar'] = $this->periodos_escuelas_model->get_m(array('escuelas_id' => $escuela_id, 'estado' => 4)); 
			$this->load->view("proyectos_personas_view/form_show_proyectos_personas",$data);
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

		if($this->proyectos_personas_model->delete_m($id)){ 
			$this->session->set_flashdata('flashConfirmModal', $this->config->item('proyectos_personas_flash_delete_message')); 
			redirect('proyectos_personas_controller/show_c/'.$proyecto_id,'location');	
		}else{
			$this->session->set_flashdata('flashErrorModal', $this->config->item('proyectos_personas_flash_error_delete_message')); 
			redirect('proyectos_personas_controller/show_c/'.$proyecto_id,'location');	
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
		$data_search_proyectos_personas = array(); 
		$data_search_pagination = array(); 
		
		if($this->flagR)
		{
			$fieldSearch = $this->basicrud->getFieldSearch($this->proyectos_personas_model->getFieldsTable_m());
			foreach($fieldSearch as $field)
			{
				if($this->input->post($field) != '') 
				{
					$data_search_proyectos_personas[$field] = $this->input->post($field);
					$data_search_pagination[$field] = $this->input->post($field);	
				}
			}

			$data_search_pagination['count'] = true;
			$data_search_proyectos_personas['limit'] = $this->config->item('pag_perpage');
			$data_search_proyectos_personas['offset'] = $offset;
			$data_search_proyectos_personas['sortBy'] = 'id';
			$data_search_proyectos_personas['sortDirection'] = 'asc';

			$data['pagination'] = $this->basicrud->getPagination(array('nameModel'=>'proyectos_personas_model','perpage'=>$this->config->item('pag_perpage')),$data_search_pagination);
			$data['proyectos_personas'] = $this->proyectos_personas_model->get_m($data_search_proyectos_personas);
		
			$data['flag'] = $this->flags;
			$data['fieldShow'] = $this->basicrud->getFieldToShow($this->proyectos_personas_model->getFieldsTable_m());
			$this->load->view('proyectos_personas_view/record_list_proyectos_personas',$data);
		}

	}


	public function cargarTipo($proyecto_persona_id)
	{
		$data = array();
		$estado = FALSE;
		if($this->input->post('tipo') == "contratado"){
			$data["proyecto_persona_id"] = $proyecto_persona_id;
			$data["fecha_inicio"] = $this->basicrud->getFormatDateToBD($this->input->post('fecha_inicio'));
			$data["fecha_fin"] = $this->basicrud->getFormatDateToBD($this->input->post('fecha_fin'));
			$data["monto_total"] = $this->input->post('monto_total');
			$data["cantidad_horas"] = $this->input->post('cantidad_horas_contratado');
			$data["funcion"] = $this->input->post('funcion');
			$data["habilitado"] = 1;
			$data["updated_at"] = $this->basicrud->formatDateToBD();
			$contratado_id = $this->contratados_model->add_m($data);
			if($contratado_id) $estado = TRUE;
		}elseif($this->input->post('tipo') == "adscripto"){
			$data["proyecto_persona_id"] = $proyecto_persona_id;
			$data["escuela_id"] = $this->input->post('escuela_id');
			$data["cantidad_horas"] = $this->input->post('cantidad_horas_adscripto');
			$data["habilitado"] = 1;
			$data["updated_at"] = $this->basicrud->formatDateToBD();
			$adscripto_id = $this->adscriptos_model->add_m($data);
			if($adscripto_id) $estado = TRUE;
		}

		return $estado;
	}


	public function editTipo($proyecto_persona_id)
	{
		$data = array();
		$estado = FALSE;
		if($this->input->post('tipo') == "contratado"){
			$data["id"] = $this->input->post('contratado_id');
			$data["proyecto_persona_id"] = $proyecto_persona_id;
			$data["fecha_inicio"] = $this->basicrud->getFormatDateToBD($this->input->post('fecha_inicio'));
			$data["fecha_fin"] = $this->basicrud->getFormatDateToBD($this->input->post('fecha_fin'));
			$data["monto_total"] = $this->input->post('monto_total');
			$data["cantidad_horas"] = $this->input->post('cantidad_horas_contratado');
			$data["funcion"] = $this->input->post('funcion');
			$data["habilitado"] = 1;
			$data["updated_at"] = $this->basicrud->formatDateToBD();
			
			if($this->contratados_model->edit_m($data)) $estado = TRUE;
		}elseif($this->input->post('tipo') == "adscripto"){
			$data["id"] = $this->input->post('adscripto_id');
			$data["proyecto_persona_id"] = $proyecto_persona_id;
			$data["escuela_id"] = $this->input->post('escuela_id');
			$data["cantidad_horas"] = $this->input->post('cantidad_horas_adscripto');
			$data["habilitado"] = 1;
			$data["updated_at"] = $this->basicrud->formatDateToBD();
			if($this->adscriptos_model->edit_m($data)) $estado = TRUE;
		}

		return $estado;
	}
}