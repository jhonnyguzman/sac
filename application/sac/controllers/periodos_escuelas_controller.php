<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Periodos_escuelas_Controller extends CI_Controller {

	private $flagR;
	private $flagI;
	private $flagU;
	private $flagD;
	private $flags;

	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('logged_in') == true) { 
			$this->load->model('periodos_escuelas_model');
			$this->load->model('periodos_model');
			$this->load->model('escuelas_model');
			$this->config->load('periodos_escuelas_settings');
			$data['flags'] = $this->basicauth->getPermissions('periodos_escuelas');
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
			$data['fieldSearch'] = $this->basicrud->getFieldSearch($this->periodos_escuelas_model->getFieldsTable_m());
			$this->load->view('periodos_escuelas_view/home_periodos_escuelas', $data);
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
	function add_c($periodo_id='', $escuela_id='')
	{
		//code here
		if(!$this->flagI){
			echo $this->config->item('accessTitle');
			exit();
		}

		$data = array();
		$data['title_header'] = $this->config->item('recordAddTitle');

		$this->form_validation->set_rules('periodo_id', 'periodo_id', 'trim|required|integer|callback_periodo_check|xss_clean');
		$this->form_validation->set_rules('escuelas_id', 'escuelas_id', 'trim|required|integer|xss_clean');
		$this->form_validation->set_rules('matricula', 'matricula', 'trim|required|integer|xss_clean');
		$this->form_validation->set_rules('resolucion', 'resolucion', 'trim|required|integer|xss_clean');
		$this->form_validation->set_rules('cantidad_horas', 'cantidad_horas', 'trim|required|integer|xss_clean');
	
		if($this->form_validation->run())
		{	
			$data_periodos_escuelas  = array();
			$data_periodos_escuelas['periodo_id'] = $this->input->post('periodo_id');
			$data_periodos_escuelas['escuelas_id'] = $this->input->post('escuelas_id');
			$data_periodos_escuelas['matricula'] = $this->input->post('matricula');
			$data_periodos_escuelas['resolucion'] = $this->input->post('resolucion');
			$data_periodos_escuelas['cantidad_horas'] = $this->input->post('cantidad_horas');
			$data_periodos_escuelas['updated_at'] = $this->basicrud->formatDateToBD();

			$id_periodos_escuelas = $this->periodos_escuelas_model->add_m($data_periodos_escuelas);
			if($id_periodos_escuelas){ 
				$this->session->set_flashdata('flashConfirmModal', $this->config->item('periodos_escuelas_flash_add_message')); 
				redirect('periodos_escuelas_controller/show_c/'.$escuela_id,'location');
			}else{
				$this->session->set_flashdata('flashErrorModal', $this->config->item('periodos_escuelas_flash_error_message')); 
				redirect('periodos_escuelas_controller/show_c/'.$escuela_id,'location');
			}
		}else{
			$data['periodo'] = $this->periodos_model->get_m(array('id' => $periodo_id), $flag = 1);
			$data['escuela'] = $this->escuelas_model->get_m(array('id' => $escuela_id),$flag = 1);
			$this->load->view('periodos_escuelas_view/form_add_periodos_escuelas',$data);
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
		$data['periodos_escuelas'] = $this->periodos_escuelas_model->get_m(array('id' => $id),$flag=1);
		
		$this->form_validation->set_rules('id', 'id', 'trim|integer|xss_clean');
		$this->form_validation->set_rules('periodo_id', 'periodo_id', 'trim|required|integer|xss_clean');
		$this->form_validation->set_rules('escuelas_id', 'escuelas_id', 'trim|required|integer|xss_clean');
		$this->form_validation->set_rules('matricula', 'matricula', 'trim|required|integer|xss_clean');
		$this->form_validation->set_rules('resolucion', 'resolucion', 'trim|required|integer|xss_clean');
		$this->form_validation->set_rules('cantidad_horas', 'cantidad_horas', 'trim|required|integer|xss_clean');

		if($this->form_validation->run()){
			$data_periodos_escuelas  = array();
			$data_periodos_escuelas['id'] = $this->input->post('id');
			$data_periodos_escuelas['periodo_id'] = $this->input->post('periodo_id');
			$data_periodos_escuelas['escuelas_id'] = $this->input->post('escuelas_id');
			$data_periodos_escuelas['matricula'] = $this->input->post('matricula');
			$data_periodos_escuelas['resolucion'] = $this->input->post('resolucion');
			$data_periodos_escuelas['cantidad_horas'] = $this->input->post('cantidad_horas');
			$data_periodos_escuelas['updated_at'] = $this->basicrud->formatDateToBD();

			if($this->periodos_escuelas_model->edit_m($data_periodos_escuelas)){ 
				$this->session->set_flashdata('flashConfirmModal', $this->config->item('periodos_escuelas_flash_edit_message')); 
				redirect('periodos_escuelas_controller/show_c/'.$this->input->post('escuelas_id'),'location');
			}else{
				$this->session->set_flashdata('flashErrorModal', $this->config->item('periodos_escuelas_flash_error_message')); 
				redirect('periodos_escuelas_controller/show_c/'.$this->input->post('escuelas_id'),'location');
			}
		}else{
			$this->load->view('periodos_escuelas_view/form_edit_periodos_escuelas',$data);
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
	function delete_c($id,$escuela_id)
	{
		//code here
		if(!$this->flagD){
			echo $this->config->item('accessTitle');
			exit();
		}

		if($this->periodos_escuelas_model->delete_m($id)){ 
			$this->session->set_flashdata('flashConfirmModal', $this->config->item('periodos_escuelas_flash_delete_message')); 
			redirect('periodos_escuelas_controller/show_c/'.$escuela_id,'location');
		}else{
			$this->session->set_flashdata('flashErrorModal', $this->config->item('periodos_escuelas_flash_error_delete_message')); 
			redirect('periodos_escuelas_controller/show_c/'.$escuela_id,'location');
		}

	}


	/**
	 * Esta funcion muestra la interfaz para consultar los periodos asignados 
	 * a una escuela, ademas en esa interfaz tambien se puede
	 * asignar periodos a la escuela
	 *
	 * @access public
	 * @param integer $escuela_id 
	 * @return void
	 */
	function show_c($escuelas_id)
	{
		$data['escuela_id'] = $escuelas_id;
		$data['periodos'] = $this->periodos_model->get_m(array('estado' => 3)); //traer periodo con estado activo
		$data['periodos_activos'] = $this->periodos_escuelas_model->get_m(array('escuelas_id' => $escuelas_id)); //traer periodo activo de una escuela
		$this->load->view("periodos_escuelas_view/form_show_periodos_escuelas",$data);
	}


	/**
	 * Esta funcion muestra la vista donde se encuentra la estructura
	 * html de la ventana modal 
	 *
	 * @access public
	 * @param integer $escuela_id 
	 * @return void
	 */
	function showModal_c($escuelas_id)
	{
		$data['escuelas_id'] = $escuelas_id;
		$this->load->view("periodos_escuelas_view/modal_periodos_escuelas",$data);
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
		$data_search_periodos_escuelas = array(); 
		$data_search_pagination = array(); 
		$flag = 0; 
		$data['flag'] = $this->flags;
		if($this->flagR)
		{
			$fieldSearch = $this->basicrud->getFieldSearch($this->periodos_escuelas_model->getFieldsTable_m());
			foreach($fieldSearch as $field)
			{
				if($this->input->post($field) != '') 
				{
					$data_search_periodos_escuelas[$field] = $this->input->post($field);
					$data_search_pagination[$field] = $this->input->post($field);
					$flag = 1;
				}
			}

			$data_search_pagination['count'] = true;
			$data_search_periodos_escuelas['limit'] = $this->config->item('pag_perpage');
			$data_search_periodos_escuelas['offset'] = $offset;
			$data_search_periodos_escuelas['sortBy'] = 'periodos_escuelas_id';
			$data_search_periodos_escuelas['sortDirection'] = 'asc';

			if($flag==1){
				$data['pagination'] = $this->basicrud->getPagination(array('nameModel'=>'periodos_escuelas_model','perpage'=>$this->config->item('pag_perpage')),$data_search_pagination);
				$data['periodos_escuelas'] = $this->periodos_escuelas_model->get_m($data_search_periodos_escuelas);
			}else{
				$data['pagination'] = $this->basicrud->getPagination(array('nameModel'=>'periodos_escuelas_model','perpage'=>$this->config->item('pag_perpage'),$data_search_pagination));
				$data['periodos_escuelas'] = $this->periodos_escuelas_model->get_m($data_search_periodos_escuelas);
			}
			$data['fieldShow'] = $this->basicrud->getFieldToShow($this->periodos_escuelas_model->getFieldsTable_m());
			$this->load->view('periodos_escuelas_view/record_list_periodos_escuelas',$data);
		}

	}


	public function periodo_check($periodo_id)
	{
		$periodo_escuela = array();
		$periodo_escuela = $this->periodos_escuelas_model->get_m(array('periodo_id' => $periodo_id, 'escuelas_id' => $this->input->post('escuelas_id')));
		if (count($periodo_escuela) > 0)
		{
			$this->form_validation->set_message('periodo_check', 'El periodo seleccionado ya ha sido asignado a esta escuela');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}


}