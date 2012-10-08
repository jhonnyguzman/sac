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
			$this->load->model('lineas_periodos_escuelas_model');
			$this->load->model('periodos_escuelas_model');
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
		$this->form_validation->set_rules('cantidad_horas', 'cantidad_horas', 'trim|required|integer|callback_checkExisteHoras|callback_checkCantidadHoras|xss_clean');
		
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
				$this->actualizarHorasRestantes($this->input->post('linea_accion_escuela_id'),$this->input->post('cantidad_horas'));
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
		$this->form_validation->set_rules('cantidad_horas', 'cantidad_horas', 'trim|required|callback_checkEditExisteHoras|callback_checkEditCantidadHoras|integer|xss_clean');

		if($this->form_validation->run()){
			$data_lineas_accion_docentes  = array();
			$data_lineas_accion_docentes['id'] = $this->input->post('id');
			$data_lineas_accion_docentes['linea_accion_escuela_id'] = $this->input->post('linea_accion_escuela_id');
			$data_lineas_accion_docentes['docente_id'] = $this->input->post('docente_id');
			$data_lineas_accion_docentes['updated_at'] = $this->basicrud->formatDateToBD();
			$data_lineas_accion_docentes['cantidad_horas'] = $this->input->post('cantidad_horas');
			$data_lineas_accion_docentes['perfil_id'] = $this->input->post('perfil_id');

			if($this->lineas_accion_docentes_model->edit_m($data_lineas_accion_docentes)){
				$this->actualizarHorasRestantes(
					$this->input->post('linea_accion_escuela_id'),
					$this->input->post('cantidad_horas'),
					$this->input->post('cantidad_horas_old')
					); 
				$this->session->set_flashdata('flashConfirmModal', $this->config->item('lineas_accion_docentes_flash_edit_message')); 
				redirect('lineas_accion_docentes_controller/show_c/'.$linea_accion_escuela_id,'location');
			}else{
				$this->session->set_flashdata('flashErrorModal', $this->config->item('lineas_accion_docentes_flash_error_message')); 
				redirect('lineas_accion_docentes_controller/show_c/'.$linea_accion_escuela_id,'location');
			}
		}else{
			$data['linea_accion_escuela_id']= $linea_accion_escuela_id;
			$data['perfiles'] = $this->perfiles_model->get_m(array('habilitado' => 1));
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

		$linea_accion_docente = $this->lineas_accion_docentes_model->get_m(array('id' => $id));
		if(count($linea_accion_docente) > 0){
			//actualizamos horas_restantes 
			$this->actualizarHorasRestantes($linea_accion_escuela_id,0,$linea_accion_docente[0]->cantidad_horas);
			//eliminamos registro
			if($this->lineas_accion_docentes_model->delete_m($id)){ 
				$this->session->set_flashdata('flashConfirmModal', $this->config->item('lineas_accion_docentes_flash_delete_message')); 
				redirect('lineas_accion_docentes_controller/show_c/'.$linea_accion_escuela_id,'location');
			}else{
				$this->session->set_flashdata('flashErrorModal', $this->config->item('lineas_accion_docentes_flash_error_delete_message')); 
				redirect('lineas_accion_docentes_controller/show_c/'.$linea_accion_escuela_id,'location');
			}
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
					if($field == "linea_accion_escuela_id")
						$data['linea_accion_escuela_id'] = $this->input->post($field);
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


	/**
	 * Esta función permite verificar si existen horas disponibles en el mes para asignarlas 
	 * a un docente para una linea de acción dada. Si no existe devuelve un mensaje de 
	 * validación en el formulario de alta.
	 *
	 * @access public
	 * @param integer $cantidad_horas 			Son las horas asignadas al docente
	 * @return true/false
	 */
	public function checkExisteHoras($cantidad_horas)
	{
		$linea_accion_escuela_id = $this->input->post("linea_accion_escuela_id");

		$linea_accion_escuela = $this->lineas_accion_escuelas_model->get_m(array('id' => $linea_accion_escuela_id));
		if(count($linea_accion_escuela) > 0){
			$linea_periodo_escuela = $this->lineas_periodos_escuelas_model->get_m(array('id' => $linea_accion_escuela[0]->linea_periodo_escuela_id));
			if(count($linea_periodo_escuela) > 0){
				if( ($linea_periodo_escuela[0]->horas_restantes - $cantidad_horas) >= 0 ){
					return TRUE;
				}else{
					$this->form_validation->set_message('checkExisteHoras', 
						"La cantidad de horas por asignar supera a la cantidad de horas restantes (".$linea_periodo_escuela[0]->horas_restantes.") del mes en cuestión.");
					return FALSE;
				}
			}
		}
	}


	/**
	 * Esta función permite verificar si existen horas disponibles en el mes para asignarlas 
	 * a un docente para una linea de acción dada. Si no existe devuelve un mensaje de 
	 * validación en el formulario de edición de asignación de horas a docentes.
	 *
	 * @access public
	 * @param integer $cantidad_horas 			Son las horas asignadas al docente
	 * @return true/false
	 */
	public function checkEditExisteHoras($cantidad_horas)
	{
		$linea_accion_escuela_id = $this->input->post("linea_accion_escuela_id");

		$linea_accion_escuela = $this->lineas_accion_escuelas_model->get_m(array('id' => $linea_accion_escuela_id));
		if(count($linea_accion_escuela) > 0){
			$linea_periodo_escuela = $this->lineas_periodos_escuelas_model->get_m(array('id' => $linea_accion_escuela[0]->linea_periodo_escuela_id));
			if(count($linea_periodo_escuela) > 0){
				if( ($linea_periodo_escuela[0]->horas_restantes - ($cantidad_horas - $this->input->post("cantidad_horas_old")) ) >= 0 ){
					return TRUE;
				}else{
					$this->form_validation->set_message('checkEditExisteHoras', 
						"La cantidad de horas por asignar supera a la cantidad de horas restantes (".$linea_periodo_escuela[0]->horas_restantes.") del mes en cuestión.");
					return FALSE;
				}
			}
		}
	}


	/**
	 * Esta función permite verificar que a un docente no se le asignen mas de 8 horas
	 * institucionales independientemente de la escuela en donde se lo este por asignar 
	 * para un mes dado de una linea de acción en particular. Esta función es aplicable
	 * cuando se esta asignando horas institucionales a un docente.
	 *
	 * @access public
	 * @param integer $cantidad_horas 			Son las horas asignadas al docente
	 * @return true/false
	 */
	public function checkCantidadHoras($cantidad_horas)
	{
		$linea_accion_escuela = $this->lineas_accion_escuelas_model->get_m(array('id' => $this->input->post("linea_accion_escuela_id") ));
		$linea_periodo_escuela = $this->lineas_periodos_escuelas_model->get_m(array('id' =>$linea_accion_escuela[0]->linea_periodo_escuela_id));
		$periodo_escuela = $this->periodos_escuelas_model->get_m(array('id' => $linea_periodo_escuela[0]->periodo_escuela_id));

		if(count($periodo_escuela) > 0){
			$total_horas_asignadas = $this->lineas_accion_docentes_model->getTotalHorasAsignadas(
				$periodo_escuela[0]->periodo_id,
				$linea_periodo_escuela[0]->mes,
				$this->input->post("docente_id"));
			if(($total_horas_asignadas + $cantidad_horas ) <= 8 ){
				return TRUE;
			}else{
				$this->form_validation->set_message('checkCantidadHoras', 
						"La cantidad de horas ingresada supera las 8 hs que es la máxima cantidad admisible por docente");
				return FALSE;
			}
		}
	}



	/**
	 * Esta función permite verificar que a un docente no se le asignen mas de 8 horas
	 * institucionales independientemente de la escuela en donde se lo este por asignar 
	 * para un mes dado de una linea de acción en particular. Esta función es aplicable
	 * para cuando se esta editando las horas institucionales asignadas a un docente.
	 *
	 * @access public
	 * @param integer $cantidad_horas 			Son las horas asignadas al docente
	 * @return true/false
	 */
	public function checkEditCantidadHoras($cantidad_horas)
	{
		$linea_accion_escuela = $this->lineas_accion_escuelas_model->get_m(array('id' => $this->input->post("linea_accion_escuela_id") ));
		$linea_periodo_escuela = $this->lineas_periodos_escuelas_model->get_m(array('id' =>$linea_accion_escuela[0]->linea_periodo_escuela_id));
		$periodo_escuela = $this->periodos_escuelas_model->get_m(array('id' => $linea_periodo_escuela[0]->periodo_escuela_id));

		if(count($periodo_escuela) > 0){
			$total_horas_asignadas = $this->lineas_accion_docentes_model->getTotalHorasAsignadas(
				$periodo_escuela[0]->periodo_id,
				$linea_periodo_escuela[0]->mes,
				$this->input->post("docente_id"));
			if(($total_horas_asignadas + ($cantidad_horas - $this->input->post("cantidad_horas_old"))) <= 8 ){
				return TRUE;
			}else{
				$this->form_validation->set_message('checkEditCantidadHoras', 
						"La cantidad de horas ingresadas supera las 8 hs que es la máxima cantidad admisible por docente. 
						<br> (".$total_horas_asignadas.") horas en total asignadas.");
				return FALSE;
			}
		}
	}


	/**
	 * Esta función permite restar las horas restantes de un mes dado.
	 * Cuando se asignan horas institucionales a un docente para una linea de acción
	 * para un mes dado, esas horas asignadas se deben restar a la cantidad de horas 
	 * asignadas al mes en cuestion. Por ejemplo si a un mes se le asigno 60 horas institucionales
	 * y luego para una linea de accion X en dicho mes se asigna 5 horas a un docente Y, esas
	 * 5 horas se deben restar de las 60 horas que posee el mes.
	 *
	 * @access public
	 * @param integer $linea_accion_escuela_id 	
	 * @param integer $cantidad_horas 			Son las horas asignadas al docente
	 * @param integer $cantidad_horas_old		Son las horas anterior a una modificación. 
	 * @return void
	 */
	public function actualizarHorasRestantes($linea_accion_escuela_id="", $cantidad_horas="", $cantidad_horas_old = "")
	{
		$linea_accion_escuela = $this->lineas_accion_escuelas_model->get_m(array('id' => $linea_accion_escuela_id));
		if(count($linea_accion_escuela) > 0){
			$linea_periodo_escuela = $this->lineas_periodos_escuelas_model->get_m(array('id' => $linea_accion_escuela[0]->linea_periodo_escuela_id));
			if(count($linea_periodo_escuela) > 0){
				if($cantidad_horas_old != "")
				{
					$data['id'] = $linea_periodo_escuela[0]->id;
					$data['horas_restantes'] = $linea_periodo_escuela[0]->horas_restantes  -  ($cantidad_horas - $cantidad_horas_old);
					$data['updated_at'] = $this->basicrud->formatDateToBD();	
				}else{
					$data['id'] = $linea_periodo_escuela[0]->id;
					$data['horas_restantes'] = $linea_periodo_escuela[0]->horas_restantes - $cantidad_horas;
					$data['updated_at'] = $this->basicrud->formatDateToBD();				
				}
				$this->lineas_periodos_escuelas_model->edit_m($data);
			}
		}	
	}
}