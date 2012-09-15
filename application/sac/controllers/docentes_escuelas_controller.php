<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Docentes_escuelas_Controller extends CI_Controller {

	private $flagR;
	private $flagI;
	private $flagU;
	private $flagD;
	private $flags;

	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('logged_in') == true) { 
			$this->load->model('docentes_escuelas_model');
			$this->load->model('docentes_model');
			$this->load->model('perfiles_model');
			$this->load->model('escuelas_model');
			$this->load->model('docentes_perfiles_escuelas_model');
			$this->config->load('docentes_escuelas_settings');
			$data['flags'] = $this->basicauth->getPermissions('docentes_escuelas');
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
			$data['fieldSearch'] = $this->basicrud->getFieldSearch($this->docentes_escuelas_model->getFieldsTable_m());
			$this->load->view('docentes_escuelas_view/home_docentes_escuelas', $data);
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
	function add_c($docente_id = '', $escuela_id = '')
	{
		//code here
		if(!$this->flagI){
			echo $this->config->item('accessTitle');
			exit();
		}

		$data = array();
		$data['title_header'] = $this->config->item('recordAddTitle');
		$this->form_validation->set_rules('id', 'id', 'trim|integer|xss_clean');
		$this->form_validation->set_rules('docente_id', 'docente_id', 'trim|integer|xss_clean');
		$this->form_validation->set_rules('escuela_id', 'escuela_id', 'trim|integer|xss_clean');
		$this->form_validation->set_rules('perfiles_id[]', 'perfiles_id', 'trim|required|integer|xss_clean');

		if($this->form_validation->run())
		{	
			$data_docentes_escuelas  = array();
			$data_docentes_escuelas['docente_id'] = $this->input->post('docente_id');
			$data_docentes_escuelas['escuela_id'] = $this->input->post('escuela_id');
			$data_docentes_escuelas['updated_at'] = $this->basicrud->formatDateToBD();

			$id_docentes_escuelas = $this->docentes_escuelas_model->add_m($data_docentes_escuelas);
			if($id_docentes_escuelas){
				//cargar los perfiles asignados a un docente para una escuela dada
				foreach ($this->input->post('perfiles_id') as $key => $value) {
					$data_dpe['docente_escuela_id'] = $id_docentes_escuelas;
					$data_dpe['perfil_id'] = $value; 
					$data_dpe['updated_at'] = $this->basicrud->formatDateToBD(); 
					$id_dpe = $this->docentes_perfiles_escuelas_model->add_m($data_dpe);
				}
				$this->session->set_flashdata('flashConfirmModal', $this->config->item('docentes_escuelas_flash_add_message')); 
				redirect('docentes_escuelas_controller/show_c/'.$escuela_id,'location');
			}else{
				$this->session->set_flashdata('flashErrorModal', $this->config->item('docentes_escuelas_flash_error_message')); 
				redirect('docentes_escuelas_controller/show_c/'.$escuela_id,'location');
			}
		}else{
			$data['escuela'] = $this->escuelas_model->get_m(array('id' => $escuela_id), $flag=1);
			$data['docente'] = $this->docentes_model->get_m(array('id' => $docente_id), $flag=1);
			$data['perfiles'] = $this->perfiles_model->get_m(array('habilitado' => 1));
			$this->load->view('docentes_escuelas_view/form_add_docentes_escuelas',$data);
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
		$data['docentes_escuelas'] = $this->docentes_escuelas_model->get_m(array('id' => $id),$flag=1);
		
		$this->form_validation->set_rules('id', 'id', 'trim|integer|xss_clean');
		$this->form_validation->set_rules('docente_id', 'docente_id', 'trim|integer|xss_clean');
		$this->form_validation->set_rules('escuela_id', 'escuela_id', 'trim|integer|xss_clean');
		$this->form_validation->set_rules('perfiles_id[]', 'perfiles_id', 'trim|required|integer|xss_clean');

		if($this->form_validation->run()){
			$data_docentes_escuelas  = array();
			$data_docentes_escuelas['id'] = $this->input->post('id');
			$data_docentes_escuelas['docente_id'] = $this->input->post('docente_id');
			$data_docentes_escuelas['escuela_id'] = $this->input->post('escuela_id');
			$data_docentes_escuelas['updated_at'] = $this->basicrud->formatDateToBD();

			if($this->docentes_escuelas_model->edit_m($data_docentes_escuelas)){
				if($this->updatePerfiles($this->input->post('id'),$this->input->post('perfiles_id'))){
				 	$this->session->set_flashdata('flashConfirmModal', $this->config->item('docentes_escuelas_flash_edit_message')); 
					redirect('docentes_escuelas_controller/show_c/'.$this->input->post('escuela_id'),'location');
				}
			}else{
				$this->session->set_flashdata('flashErrorModal', $this->config->item('docentes_escuelas_flash_error_message')); 
				redirect('docentes_escuelas_controller/show_c/'.$this->input->post('escuela_id'),'location');
			}
		}else{
			
			//obtenemos todos los perfiles asignados a un docente en una escuela en particulas
			$data['docentes_perfiles_escuelas'] = $this->docentes_perfiles_escuelas_model->get_m(
													array('docente_escuela_id' => $data['docentes_escuelas']->id,
														  'docente_id' => $data['docentes_escuelas']->docente_id));
			//obtenemos todos los perfiles cargados en el sistema y habilitados
			$data['perfiles'] = $this->basicrud->getPerfilesSinAsignar(
					$this->perfiles_model->get_m(array('habilitado' => 1)), $data['docentes_perfiles_escuelas']);

			$this->load->view('docentes_escuelas_view/form_edit_docentes_escuelas',$data);
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
	function delete_c($id, $escuela_id)
	{
		//code here
		if(!$this->flagD){
			echo $this->config->item('accessTitle');
			exit();
		}

		if($this->docentes_escuelas_model->delete_m($id)){ 
			$this->session->set_flashdata('flashConfirmModal', $this->config->item('docentes_escuelas_flash_delete_message')); 
			redirect('docentes_escuelas_controller/show_c/'.$escuela_id,'location');
		}else{
			$this->session->set_flashdata('flashErrorModal', $this->config->item('docentes_escuelas_flash_error_delete_message')); 
			redirect('docentes_escuelas_controller/show_c/'.$escuela_id,'location');
		}

	}


	/**
	 * Esta funcion permite agregar nuevos perfiles de docente para una 
	 * escuela es particular. Tambien permite eliminar perfiles de docentes.
	 * Si en el formulario de edicion se han eliminado perfiles de docentes, esta verifica
	 * y los elimina de la base de datos 
	 * 
	 * @access public
	 * @param integer $docente_escuela_id  permite recuperar todos los perfiles asignados a un docente para una escuela
	 * @param array $perfiles_id  perfiles pasados desde el formulario de edicion
	 * @return boolean true or false
	 */
	function updatePerfiles($docente_escuela_id, $perfiles_id)
	{
		$dpe_basic = array(); 
		$eliminados = array();
		$nuevos = array();

		$dpe = $this->docentes_perfiles_escuelas_model->get_m(array('docente_escuela_id' => $docente_escuela_id));
		
		foreach ($dpe as $key => $value) {
			$dpe_basic[] = $value->perfil_id;
		}

		$eliminados = array_diff($dpe_basic, $perfiles_id);  //extraer perfiles eliminados
		$nuevos = array_diff($perfiles_id,$dpe_basic); //extraer los perfiles nuevos que se han agregado

		//eliminar
		if(count($eliminados) > 0){
			foreach ($eliminados as $f) {
				$row_affected = $this->docentes_perfiles_escuelas_model->delete_m(array('docente_escuela_id' => $docente_escuela_id, 'perfil_id' => $f));
			}
		}

		//agregar
		if(count($nuevos) > 0){
			foreach ($nuevos as $f) {
				$id_dpe = $this->docentes_perfiles_escuelas_model->add_m(
					array('docente_escuela_id' => $docente_escuela_id, 
						  'perfil_id' => $f,
						  'updated_at' => $this->basicrud->formatDateToBD()));
			}
		}

		return true;
	}


	/**
	 * Esta funcion muestra la interfaz para consultar los docentes asignados 
	 * a una escuela, ademas en esa interfaz tambien se puede
	 * asignar docentes a una escuela
	 *
	 * @access public
	 * @param integer $escuela_id 
	 * @return void
	 */
	function show_c($escuela_id)
	{
		$data['escuela_id'] = $escuela_id;
		$data['docentes_asignados'] = $this->docentes_escuelas_model->getDocentesAssignedToEscuelas_m($escuela_id); //traer docentes asignados a una escuela
		$data['docentes_sin_asignar'] =  $this->docentes_escuelas_model->getDocentesNotAssignedToEscuelas_m($escuela_id); //traer docentes no asignados a una escuela
		$this->load->view("docentes_escuelas_view/form_show_docentes_escuelas",$data);
	}


	/**
	 * Esta funcion muestra la vista donde se encuentra la estructura
	 * html de la ventana modal 
	 *
	 * @access public
	 * @param integer $escuela_id 
	 * @return void
	 */
	function showModal_c($escuela_id)
	{
		$data['escuela_id'] = $escuela_id;
		$this->load->view("docentes_escuelas_view/modal_docentes_escuelas",$data);
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
		$data_search_docentes_escuelas = array(); 
		$data_search_pagination = array(); 
		$flag = 0; 
		$data['flag'] = $this->flags;
		if($this->flagR)
		{
			$fieldSearch = $this->basicrud->getFieldSearch($this->docentes_escuelas_model->getFieldsTable_m());
			foreach($fieldSearch as $field)
			{
				if($this->input->post($field) != '') 
				{
					$data_search_docentes_escuelas[$field] = $this->input->post($field);
					$data_search_pagination[$field] = $this->input->post($field);
					$flag = 1;
				}
			}

			$data_search_pagination['count'] = true;
			$data_search_docentes_escuelas['limit'] = $this->config->item('pag_perpage');
			$data_search_docentes_escuelas['offset'] = $offset;
			$data_search_docentes_escuelas['sortBy'] = 'id';
			$data_search_docentes_escuelas['sortDirection'] = 'asc';

			$data['pagination'] = $this->basicrud->getPagination(array('nameModel'=>'docentes_escuelas_model','perpage'=>$this->config->item('pag_perpage')),$data_search_pagination);
			$data['docentes_escuelas'] = $this->docentes_escuelas_model->get_m($data_search_docentes_escuelas);

			$data['fieldShow'] = $this->basicrud->getFieldToShow($this->docentes_escuelas_model->getFieldsTable_m());
			$this->load->view('docentes_escuelas_view/record_list_docentes_escuelas',$data);
		}

	}

}