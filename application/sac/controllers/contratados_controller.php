<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contratados_Controller extends CI_Controller {

	private $flagR;
	private $flagI;
	private $flagU;
	private $flagD;
	private $flags;

	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('logged_in') == true) { 
			$this->load->model('contratados_model');
			$this->config->load('contratados_settings');
			$data['flags'] = $this->basicauth->getPermissions('contratados');
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
		
		$this->form_validation->set_rules('proyecto_persona_id', 'proyecto_persona_id', 'trim|required|integer|xss_clean');
		$this->form_validation->set_rules('fecha_inicio', 'fecha_inicio', 'trim|required|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('fecha_fin', 'fecha_fin', 'trim|required|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('monto_total', 'monto_total', 'trim|required|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('cantidad_horas', 'cantidad_horas', 'trim|required|integer|xss_clean');
		$this->form_validation->set_rules('funcion', 'funcion', 'trim|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('habilitado', 'habilitado', 'trim|integer|xss_clean');
		
		
		if($this->form_validation->run())
		{	
			$data_contratados  = array();
			$data_contratados['proyecto_persona_id'] = $this->input->post('proyecto_persona_id');
			$data_contratados['fecha_inicio'] = $this->basicrud->getFormatDateToBD($this->input->post('fecha_inicio'));
			$data_contratados['fecha_fin'] = $this->basicrud->getFormatDateToBD($this->input->post('fecha_fin'));
			$data_contratados['monto_total'] = $this->input->post('monto_total');
			$data_contratados['cantidad_horas'] = $this->input->post('cantidad_horas');
			$data_contratados['funcion'] = $this->input->post('funcion');
			$data_contratados['habilitado'] = $this->input->post('habilitado');
			$data_contratados['updated_at'] = $this->basicrud->formatDateToBD();

			$id_contratados = $this->contratados_model->add_m($data_contratados);
			if($id_contratados){ 
				$this->session->set_flashdata('flashConfirm', $this->config->item('contratados_flash_add_message')); 
				redirect('contratados_controller','location');
			}else{
				$this->session->set_flashdata('flashError', $this->config->item('contratados_flash_error_message')); 
				redirect('contratados_controller','location');
			}
		}
		$this->load->view('contratados_view/form_add_contratados',$data);

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
		$data['contratados'] = $this->contratados_model->get_m(array('id' => $id),$flag=1);
		$this->form_validation->set_rules('id', 'id', 'trim|required|integer|xss_clean');
		$this->form_validation->set_rules('proyecto_persona_id', 'proyecto_persona_id', 'trim|required|integer|xss_clean');
		$this->form_validation->set_rules('fecha_inicio', 'fecha_inicio', 'trim|required|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('fecha_fin', 'fecha_fin', 'trim|required|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('monto_total', 'monto_total', 'trim|required|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('cantidad_horas', 'cantidad_horas', 'trim|required|integer|xss_clean');
		$this->form_validation->set_rules('funcion', 'funcion', 'trim|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('habilitado', 'habilitado', 'trim|integer|xss_clean');
		
		
		if($this->form_validation->run()){
			$data_contratados  = array();
			$data_contratados['id'] = $this->input->post('id');
			$data_contratados['proyecto_persona_id'] = $this->input->post('proyecto_persona_id');
			$data_contratados['fecha_inicio'] = $this->basicrud->getFormatDateToBD($this->input->post('fecha_inicio'));
			$data_contratados['fecha_fin'] = $this->basicrud->getFormatDateToBD($this->input->post('fecha_fin'));
			$data_contratados['monto_total'] = $this->input->post('monto_total');
			$data_contratados['cantidad_horas'] = $this->input->post('cantidad_horas');
			$data_contratados['funcion'] = $this->input->post('funcion');
			$data_contratados['habilitado'] = $this->input->post('habilitado');
			$data_contratados['updated_at'] = $this->basicrud->formatDateToBD();

			if($this->contratados_model->edit_m($data_contratados)){ 
				$this->session->set_flashdata('flashConfirm', $this->config->item('contratados_flash_edit_message')); 
				redirect('contratados_controller','location');
			}else{
				$this->session->set_flashdata('flashError', $this->config->item('contratados_flash_error_message')); 
				redirect('contratados_controller','location');
			}
		}
		$this->load->view('contratados_view/form_edit_contratados',$data);

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

		if($this->contratados_model->delete_m($id)){ 
			$this->session->set_flashdata('flashConfirm', $this->config->item('contratados_flash_delete_message')); 
			redirect('contratados_controller','location');
		}else{
			$this->session->set_flashdata('flashError', $this->config->item('contratados_flash_error_delete_message')); 
			redirect('contratados_controller','location');
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
		$data_search_contratados = array(); 
		$data_search_pagination = array(); 
		
		if($this->flagR)
		{
			$fieldSearch = $this->basicrud->getFieldSearch($this->contratados_model->getFieldsTable_m());
			foreach($fieldSearch as $field)
			{
				if($this->input->post($field) != '') 
				{
					$data_search_contratados[$field] = $this->input->post($field);
					$data_search_pagination[$field] = $this->input->post($field);
					
				}
			}

			$data_search_pagination['count'] = true;
			$data_search_contratados['limit'] = $this->config->item('pag_perpage');
			$data_search_contratados['offset'] = $offset;
			$data_search_contratados['sortBy'] = 'id';
			$data_search_contratados['sortDirection'] = 'asc';

			$data['pagination'] = $this->basicrud->getPagination(array('nameModel'=>'contratados_model','perpage'=>$this->config->item('pag_perpage')),$data_search_pagination);
			$data['contratados'] = $this->contratados_model->get_m($data_search_contratados);
		
			$data['flag'] = $this->flags;
			$this->load->view('contratados_view/record_list_contratados',$data);
		}

	}

}