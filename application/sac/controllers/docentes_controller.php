<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Docentes_Controller extends CI_Controller {

	private $flagR;
	private $flagI;
	private $flagU;
	private $flagD;
	private $flags;

	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('logged_in') == true) { 
			$this->load->model('docentes_model');
			$this->load->model('titulos_model');
			$this->load->model('docentes_titulos_model');
			$this->config->load('docentes_settings');
			$data['flags'] = $this->basicauth->getPermissions('docentes');
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
			$data['fieldSearch'] = $this->basicrud->getFieldSearch($this->docentes_model->getFieldsTable_m());
			$this->load->view('docentes_view/home_docentes', $data);
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
		
		$this->form_validation->set_rules('dni', 'D.N.I.', 'trim|required|integer|callback_checkDni|xss_clean');
		$this->form_validation->set_rules('apellido', 'apellido', 'trim|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('nombre', 'nombre', 'trim|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('telefono', 'telefono', 'trim|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('email', 'email', 'trim|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('titulo_id[]', 'Titulo', 'trim|required|integer|xss_clean');
		$this->form_validation->set_rules('habilitado', 'habilitado', 'trim|integer|xss_clean');
		
		if($this->form_validation->run())
		{	
			$data_docentes  = array();
			$data_docentes['dni'] = $this->input->post('dni');
			$data_docentes['apellido'] = $this->input->post('apellido');
			$data_docentes['nombre'] = $this->input->post('nombre');
			$data_docentes['telefono'] = $this->input->post('telefono');
			$data_docentes['email'] = $this->input->post('email');
			$data_docentes['habilitado'] = $this->input->post('habilitado');
			$data_docentes['updated_at'] = $this->basicrud->formatDateToBD();	

			$id_docentes = $this->docentes_model->add_m($data_docentes);
			if($id_docentes){ 
				$this->cargarTitulos($id_docentes,$this->input->post('titulo_id'));
				$this->session->set_flashdata('flashConfirm', $this->config->item('docentes_flash_add_message')); 
				redirect('docentes_controller','location');
			}else{
				$this->session->set_flashdata('flashError', $this->config->item('docentes_flash_error_message')); 
				redirect('docentes_controller','location');
			}
		}else{
			$data['titulos'] = $this->titulos_model->get_m();
			$this->load->view('docentes_view/form_add_docentes',$data);
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
		$data['docentes'] = $this->docentes_model->get_m(array('id' => $id),$flag=1);
		
		$this->form_validation->set_rules('id', 'id', 'trim|integer|xss_clean');
		$this->form_validation->set_rules('dni', 'D.N.I.', 'trim|integer|callback_checkDniEdit|xss_clean');
		$this->form_validation->set_rules('apellido', 'apellido', 'trim|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('nombre', 'nombre', 'trim|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('telefono', 'telefono', 'trim|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('email', 'email', 'trim|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('titulo_id[]', 'Titulo', 'trim|required|integer|xss_clean');
		$this->form_validation->set_rules('habilitado', 'habilitado', 'trim|integer|xss_clean');
	
		if($this->form_validation->run()){
			$data_docentes  = array();
			$data_docentes['id'] = $this->input->post('id');
			$data_docentes['dni'] = $this->input->post('dni');
			$data_docentes['apellido'] = $this->input->post('apellido');
			$data_docentes['nombre'] = $this->input->post('nombre');
			$data_docentes['telefono'] = $this->input->post('telefono');
			$data_docentes['email'] = $this->input->post('email');
			$data_docentes['habilitado'] = $this->input->post('habilitado');
			$data_docentes['updated_at'] = $this->basicrud->formatDateToBD();

			if($this->docentes_model->edit_m($data_docentes)){ 
				if($this->updateTitulos($id, $this->input->post('titulo_id'))){
					$this->session->set_flashdata('flashConfirm', $this->config->item('docentes_flash_edit_message')); 
					redirect('docentes_controller','location');
				}else{
					$this->session->set_flashdata('flashError', $this->config->item('docentes_flash_error_message')); 
					redirect('docentes_controller','location');
				}
			}else{
				$this->session->set_flashdata('flashError', $this->config->item('docentes_flash_error_message')); 
				redirect('docentes_controller','location');
			}
		}else{
			$data['titulos_asignados'] = $this->docentes_titulos_model->get_m(array('docente_id' => $id));
			$data['titulos_sin_asignar'] = $this->basicrud->getTitulosSinAsignar(
				$this->titulos_model->get_m(), $data['titulos_asignados']);
			$this->load->view('docentes_view/form_edit_docentes',$data);
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

		if($this->docentes_model->delete_m($id)){ 
			$this->session->set_flashdata('flashConfirm', $this->config->item('docentes_flash_delete_message')); 
			redirect('docentes_controller','location');
		}else{
			$this->session->set_flashdata('flashError', $this->config->item('docentes_flash_error_delete_message')); 
			redirect('docentes_controller','location');
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
		$data_search_docentes = array(); 
		$data_search_pagination = array(); 
		
		$data['flag'] = $this->flags;
		if($this->flagR)
		{
			$fieldSearch = $this->basicrud->getFieldSearch($this->docentes_model->getFieldsTable_m());
			foreach($fieldSearch as $field)
			{
				if($this->input->post($field) != '') 
				{
					$data_search_docentes[$field] = $this->input->post($field);
					$data_search_pagination[$field] = $this->input->post($field);
				}
			}

			$data_search_pagination['count'] = true;
			$data_search_docentes['limit'] = $this->config->item('pag_perpage');
			$data_search_docentes['offset'] = $offset;
			$data_search_docentes['sortBy'] = 'id';
			$data_search_docentes['sortDirection'] = 'asc';

			
			$data['pagination'] = $this->basicrud->getPagination(array('nameModel'=>'docentes_model','perpage'=>$this->config->item('pag_perpage')),$data_search_pagination);
			$data['docentes'] = $this->docentes_model->get_m($data_search_docentes);
			
			$data['fieldShow'] = $this->basicrud->getFieldToShow($this->docentes_model->getFieldsTable_m());
			$this->load->view('docentes_view/record_list_docentes',$data);


		}

	}



	function cargarTitulos($docente_id, $titulos_id  = array())
	{
		if($titulos_id)
		{
			foreach ($titulos_id as $f) {
				$data = array();
				$data['docente_id'] = $docente_id;
				$data['titulo_id'] = $f;
				$data['updated_at'] = $this->basicrud->formatDateToBD();
				$id_docentes_titutos = $this->docentes_titulos_model->add_m($data);
			}
		}
	}


	/**
	 * Esta funcion permite agregar nuevos titulos a un docente.
	 * Tambien permite eliminar titulos de docentes.
	 * Si en el formulario de edicion se han eliminado titulos de docentes, esta funcion verifica
	 * y los elimina de la base de datos 
	 * 
	 * @access public
	 * @param integer $docente_id  permite recuperar todos los titulos asignados a un docente 
	 * @param array $titulos_id  titulos pasados desde el formulario de edicion
	 * @return boolean true or false
	 */
	function updateTitulos($docente_id, $titulos_id)
	{
		$dpe_basic = array(); 
		$eliminados = array();
		$nuevos = array();

		$dpe = $this->docentes_titulos_model->get_m(array('docente_id' => $docente_id));
		
		foreach ($dpe as $key => $value) {
			$dpe_basic[] = $value->titulo_id;
		}

		$eliminados = array_diff($dpe_basic, $titulos_id);  //extraer titulos eliminados
		$nuevos = array_diff($titulos_id,$dpe_basic); //extraer los titulos nuevos que se han agregado

		//eliminar
		if(count($eliminados) > 0){
			foreach ($eliminados as $f) {
				$row_affected = $this->docentes_titulos_model->delete_m(array('docente_id' => $docente_id, 'titulo_id' => $f));
			}

		}

		//agregar
		if(count($nuevos) > 0){
			foreach ($nuevos as $f) {
				$id_dpe = $this->docentes_titulos_model->add_m(
					array('docente_id' => $docente_id, 
						  'titulo_id' => $f,
						  'updated_at' => $this->basicrud->formatDateToBD()));
			}
		}

		return true;
	}



	function checkDni($dni)
	{
		$docente = $this->docentes_model->get_m(array('dni' => $dni));
		if(count($docente) > 0){
			$this->form_validation->set_message('checkDni','El DNI del docente ingresado ya existe en el sistema.');
			return false;
		}else{
			return true;
		}
	}


	function checkDniEdit($dni)
	{
		$docente = $this->docentes_model->getExisteDni_m(array('id'=>$this->input->post("id"), 'dni' => $dni));
		if(count($docente) > 0){
			$this->form_validation->set_message('checkDniEdit','El D.N.I. del docente ingresado ya existe en el sistema.');
			return false;
		}else{
			return true;
		}
	}
}