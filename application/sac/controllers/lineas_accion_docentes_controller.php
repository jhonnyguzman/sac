<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lineas_accion_docentes_Controller extends CI_Controller {

	private $flagR;
	private $flagI;
	private $flagU;
	private $flagD;
	private $flags;

	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('logged_in') == true) { 
			$this->load->model('lineas_accion_docentes_model');
			$this->load->model('lineas_accion_escuelas_model');
			$this->load->model('docentes_model');
			$this->load->model('perfiles_model');
			$this->config->load('lineas_accion_docentes_settings');
			$data['flags'] = $this->basicauth->getPermissions('lineas_accion_docentes');
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
			$this->load->view('lineas_accion_docentes_view/home_lineas_accion_docentes', $data);
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
	function add_c($linea_accion_escuela_id = "")
	{
		//code here
		if(!$this->flagI){
			echo $this->config->item('accessTitle');
			exit();
		}

		$data = array();
		$data['title_header'] = $this->config->item('recordAddTitle');
		
		$this->form_validation->set_rules('linea_accion_escuela_id', 'linea_accion_escuela_id', 'trim|required|integer|xss_clean');
		$this->form_validation->set_rules('docente_id', 'docente_id', 'trim|required|integer|callback_checkDocente|callback_checkCiclo|xss_clean');
		$this->form_validation->set_rules('perfil_id', 'perfil_id', 'trim|required|integer|xss_clean');
		$this->form_validation->set_rules('cantidad_horas', 'cantidad_horas', 'trim|required|integer|xss_clean');
		
		if($this->form_validation->run())
		{	
			$data_lineas_accion_docentes  = array();
			$data_lineas_accion_docentes['linea_accion_escuela_id'] = $this->input->post('linea_accion_escuela_id');
			$data_lineas_accion_docentes['docente_id'] = $this->input->post('docente_id');
			$data_lineas_accion_docentes['updated_at'] = $this->basicrud->formatDateToBD();
			$data_lineas_accion_docentes['cantidad_horas'] = $this->input->post('cantidad_horas');
			$data_lineas_accion_docentes['perfil_id'] = $this->input->post('perfil_id');

			$id_lineas_accion_docentes = $this->lineas_accion_docentes_model->add_m($data_lineas_accion_docentes);
			if($id_lineas_accion_docentes){ 
				$this->session->set_flashdata('flashConfirmModal', $this->config->item('lineas_accion_docentes_flash_add_message')); 
				redirect('lineas_accion_docentes_controller/show_c/'.$linea_accion_escuela_id,'location');
			}else{
				$this->session->set_flashdata('flashErrorModal', $this->config->item('lineas_accion_docentes_flash_error_message')); 
				redirect('lineas_accion_docentes_controller/show_c/'.$linea_accion_escuela_id,'location');
			}
		}else{
			$data['linea_accion_escuela_id']= $linea_accion_escuela_id;
			$data['docentes'] = $this->docentes_model->get_m(array('habilitado' => 1));
			$data['perfiles'] = $this->perfiles_model->get_m(array('habilitado' => 1));
			$this->load->view('lineas_accion_docentes_view/form_add_lineas_accion_docentes',$data);
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
	function edit_c($id, $linea_accion_escuela_id='')
	{
		//code here
		if(!$this->flagU){
			echo $this->config->item('accessTitle');
			exit();
		}

		$data = array();
		$data['title_header'] = $this->config->item('recordEditTitle');
		$data['lineas_accion_docentes'] = $this->lineas_accion_docentes_model->get_m(array('id' => $id),$flag=1);
		
		$this->form_validation->set_rules('id', 'id', 'trim|required|integer|xss_clean');
		$this->form_validation->set_rules('linea_accion_escuela_id', 'linea_accion_escuela_id', 'trim|required|integer|xss_clean');
		$this->form_validation->set_rules('docente_id', 'docente_id', 'trim|required|integer|xss_clean');
		$this->form_validation->set_rules('perfil_id', 'perfil_id', 'trim|required|integer|xss_clean');
		$this->form_validation->set_rules('cantidad_horas', 'cantidad_horas', 'trim|required|integer|xss_clean');

		if($this->form_validation->run()){
			$data_lineas_accion_docentes  = array();
			$data_lineas_accion_docentes['id'] = $this->input->post('id');
			$data_lineas_accion_docentes['linea_accion_escuela_id'] = $this->input->post('linea_accion_escuela_id');
			$data_lineas_accion_docentes['docente_id'] = $this->input->post('docente_id');
			$data_lineas_accion_docentes['updated_at'] = $this->basicrud->formatDateToBD();
			$data_lineas_accion_docentes['cantidad_horas'] = $this->input->post('cantidad_horas');
			$data_lineas_accion_docentes['perfil_id'] = $this->input->post('perfil_id');

			if($this->lineas_accion_docentes_model->edit_m($data_lineas_accion_docentes)){ 
				$this->session->set_flashdata('flashConfirmModal', $this->config->item('lineas_accion_docentes_flash_edit_message')); 
				redirect('lineas_accion_docentes_controller/show_c/'.$linea_accion_escuela_id,'location');
			}else{
				$this->session->set_flashdata('flashErrorModal', $this->config->item('lineas_accion_docentes_flash_error_message')); 
				redirect('lineas_accion_docentes_controller/show_c/'.$linea_accion_escuela_id,'location');
			}
		}else{
			$data['linea_accion_escuela_id']= $linea_accion_escuela_id;
			$data['perfiles'] = $this->perfiles_model->get_m(array('habilitado' => 1));
			//$data['escuela_id'] = $this->getEscuelaId($linea_accion_escuela_id);
			$this->load->view('lineas_accion_docentes_view/form_edit_lineas_accion_docentes',$data);
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
	function delete_c($id, $linea_accion_escuela_id)
	{
		//code here
		if(!$this->flagD){
			echo $this->config->item('accessTitle');
			exit();
		}

		if($this->lineas_accion_docentes_model->delete_m($id)){ 
			$this->session->set_flashdata('flashConfirmModal', $this->config->item('lineas_accion_docentes_flash_delete_message')); 
			redirect('lineas_accion_docentes_controller/show_c/'.$linea_accion_escuela_id,'location');
		}else{
			$this->session->set_flashdata('flashErrorModal', $this->config->item('lineas_accion_docentes_flash_error_delete_message')); 
			redirect('lineas_accion_docentes_controller/show_c/'.$linea_accion_escuela_id,'location');
		}

	}


	/**
	 * Esta funcion muestra la interfaz para ver los docentes asignados a
	 * una linea de accion y para agregar nuevos docentes a esa linea de accion
	 * @access public
	 * @param integer $linea_accion_escuela_id 
	 * @return void
	 */
	function show_c($linea_accion_escuela_id)
	{
		$data['escuela_id'] = $this->getEscuelaId($linea_accion_escuela_id);
		$data['linea_accion_escuela_id'] = $linea_accion_escuela_id; 
		$data['linea_accion_escuela'] = $this->lineas_accion_escuelas_model->get_m(array('id' => $linea_accion_escuela_id));
		$this->load->view("lineas_accion_docentes_view/form_show_lineas_accion_docentes",$data);
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
		$data_search_lineas_accion_docentes = array(); 
		$data_search_pagination = array(); 
		
		if($this->flagR)
		{
			$fieldSearch = $this->basicrud->getFieldSearch($this->lineas_accion_docentes_model->getFieldsTable_m());
			foreach($fieldSearch as $field)
			{
				if($this->input->post($field) != '') 
				{
					$data_search_lineas_accion_docentes[$field] = $this->input->post($field);
					$data_search_pagination[$field] = $this->input->post($field);
				}
			}

			$data_search_pagination['count'] = true;
			$data_search_lineas_accion_docentes['limit'] = $this->config->item('pag_perpage');
			$data_search_lineas_accion_docentes['offset'] = $offset;
			$data_search_lineas_accion_docentes['sortBy'] = 'created_at';
			$data_search_lineas_accion_docentes['sortDirection'] = 'desc';

			$data['pagination'] = $this->basicrud->getPagination(array('nameModel'=>'lineas_accion_docentes_model','perpage'=>$this->config->item('pag_perpage')),$data_search_pagination);
			$data['lineas_accion_docentes'] = $this->lineas_accion_docentes_model->get_m($data_search_lineas_accion_docentes);
				
			$data['flag'] = $this->flags;
			$this->load->view('lineas_accion_docentes_view/record_list_lineas_accion_docentes',$data);
		}

	}


	private function getEscuelaId($linea_accion_escuela_id)
	{	
		$this->load->model('lineas_periodos_escuelas_model');
		$this->load->model('periodos_escuelas_model');
		
		$linea_accion_escuela = $this->lineas_accion_escuelas_model->get_m(array('id' =>$linea_accion_escuela_id));
		$linea_periodo_escuela = $this->lineas_periodos_escuelas_model->get_m(array('id' => $linea_accion_escuela[0]->linea_periodo_escuela_id));
		$periodo_escuela = $this->periodos_escuelas_model->get_m(array('id' => $linea_periodo_escuela[0]->periodo_escuela_id));
		return $periodo_escuela[0]->escuelas_id;
	}


	public function checkDocente($docente_id)
	{
		$linea_accion_docente = $this->lineas_accion_docentes_model->get_m(
			array(
				'linea_accion_escuela_id' => $this->input->post('linea_accion_escuela_id'),
				'docente_id' => $docente_id));

		if(count($linea_accion_docente) > 0){
			$this->form_validation->set_message('checkDocente', 'El Docente seleccionado ya ha sido asignado a esta linea de acci&oacute;n');
			return FALSE;
		}else{
			return TRUE;
		}
	}


	public function checkCiclo($docente_id)
	{
		$this->load->model('lineas_accion_model');

		$linea_accion_escuela = $this->lineas_accion_escuelas_model->get_m(array('id' => $this->input->post('linea_accion_escuela_id')));
		$linea_accion = $this->lineas_accion_model->get_m(array('id' => $linea_accion_escuela[0]->linea_accion_id));
		$ciclos = $this->lineas_accion_docentes_model->getCiclosDocentes_m(
			$linea_accion_escuela[0]->linea_periodo_escuela_id,
			$docente_id,
			$linea_accion[0]->ciclo);

		if(count($ciclos) > 0){
			$this->form_validation->set_message('checkCiclo', 
				"El Docente seleccionado ya ha sido dado de alta en 
				una linea de acci&oacute;n cuyo ciclo '".$ciclos[0]->ciclo_descripcion."' es igual al de 
				la linea de acci&oacute;n en la cual esta intentando 
				dar de alta este docente.");
			return FALSE;
		}else{
			return TRUE;
		}
	}
}