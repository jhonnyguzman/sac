<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Periodos_Controller extends CI_Controller {

	private $flagR;
	private $flagI;
	private $flagU;
	private $flagD;
	private $flags;

	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('logged_in') == true) { 
			$this->load->model('periodos_model');
			$this->load->model('lineas_periodos_model');
			$this->config->load('periodos_settings');
			$data['flags'] = $this->basicauth->getPermissions('periodos');
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
			$this->load->view('periodos_view/home_periodos', $data);
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
	
		$this->form_validation->set_rules('fecha_inicio', 'fecha_inicio', 'trim|required|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('fecha_fin', 'fecha_fin', 'trim|required|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('costo_hora', 'costo_hora', 'trim|required|alpha_numeric|xss_clean');
	
		if($this->form_validation->run())
		{	
			$data_periodos  = array();
			$data_periodos['fecha_inicio'] = $this->basicrud->getFormatDateToBD($this->input->post('fecha_inicio'));
			$data_periodos['fecha_fin'] = $this->basicrud->getFormatDateToBD($this->input->post('fecha_fin'));
			$data_periodos['costo_hora'] = $this->input->post('costo_hora');
			$data_periodos['updated_at'] = $this->basicrud->formatDateToBD();
			$data_periodos['estado'] = 3; // estado 'activo' por defecto

			$id_periodos = $this->periodos_model->add_m($data_periodos);
			if($id_periodos){
				if($this->periodos_model->cambiarEstado_m($id_periodos)){
					if($this->cargarLineasPeriodos($id_periodos))
					{
						$this->session->set_flashdata('flashConfirm', $this->config->item('periodos_flash_add_message')); 
						redirect('periodos_controller','location');
					}else{
						$this->session->set_flashdata('flashError', $this->config->item('periodos_flash_error_change_state_message')); 
						redirect('periodos_controller','location');
					}
				}else{
					$this->session->set_flashdata('flashError', $this->config->item('periodos_flash_error_change_state_message')); 
					redirect('periodos_controller','location');
				} 
			}else{
				$this->session->set_flashdata('flashError', $this->config->item('periodos_flash_error_message')); 
				redirect('periodos_controller','location');
			}
		}
		$this->load->view('periodos_view/form_add_periodos',$data);

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
		$data['periodos'] = $this->periodos_model->get_m(array('id' => $id),$flag=1);
		
		$this->form_validation->set_rules('id', 'id', 'trim|required|integer|xss_clean');
		$this->form_validation->set_rules('fecha_inicio', 'fecha_inicio', 'trim|required|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('fecha_fin', 'fecha_fin', 'trim|required|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('costo_hora', 'costo_hora', 'trim|required|alpha_numeric|xss_clean');

		if($this->form_validation->run()){
			$data_periodos  = array();
			$data_periodos['id'] = $this->input->post('id');
			$data_periodos['fecha_inicio'] = $this->basicrud->getFormatDateToBD($this->input->post('fecha_inicio'));
			$data_periodos['fecha_fin'] = $this->basicrud->getFormatDateToBD($this->input->post('fecha_fin'));
			$data_periodos['costo_hora'] = $this->input->post('costo_hora');
			$data_periodos['updated_at'] = $this->basicrud->formatDateToBD();

			if($this->periodos_model->edit_m($data_periodos)){ 
				$this->session->set_flashdata('flashConfirm', $this->config->item('periodos_flash_edit_message')); 
				redirect('periodos_controller','location');
			}else{
				$this->session->set_flashdata('flashError', $this->config->item('periodos_flash_error_message')); 
				redirect('periodos_controller','location');
			}
		}
		$this->load->view('periodos_view/form_edit_periodos',$data);

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

		if($this->periodos_model->delete_m($id)){ 
			$this->session->set_flashdata('flashConfirm', $this->config->item('periodos_flash_delete_message')); 
			redirect('periodos_controller','location');
		}else{
			$this->session->set_flashdata('flashError', $this->config->item('periodos_flash_error_delete_message')); 
			redirect('periodos_controller','location');
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
		$data_search_periodos = array(); 
		$data_search_pagination = array(); 
		
		if($this->flagR)
		{
			$fieldSearch = $this->basicrud->getFieldSearch($this->periodos_model->getFieldsTable_m());
			foreach($fieldSearch as $field)
			{
				if($this->input->post($field) != '') 
				{
					$data_search_periodos[$field] = $this->input->post($field);
					$data_search_pagination[$field] = $this->input->post($field);
				}
			}

			$data_search_pagination['count'] = true;
			$data_search_periodos['limit'] = $this->config->item('pag_perpage');
			$data_search_periodos['offset'] = $offset;
			$data_search_periodos['sortBy'] = 'created_at';
			$data_search_periodos['sortDirection'] = 'desc';

			$data['pagination'] = $this->basicrud->getPagination(array('nameModel'=>'periodos_model','perpage'=>$this->config->item('pag_perpage')),$data_search_pagination);
			$data['periodos'] = $this->periodos_model->get_m($data_search_periodos);
			
			$data['flag'] = $this->flags;
			$data['fieldShow'] = $this->basicrud->getFieldToShow($this->periodos_model->getFieldsTable_m());
			$this->load->view('periodos_view/record_list_periodos',$data);
		}

	}



	public function cargarLineasPeriodos($periodo_id)
	{
		$periodo = $this->periodos_model->get_m(array('id' => $periodo_id));
		if($periodo){
			$meses = $this->basicrud->calcularMeses($periodo[0]->fecha_inicio_default, $periodo[0]->fecha_fin_default);
			for($i=0; $i<count($meses); $i++){
				$data['periodo_id'] = $periodo_id;
				$data['mes'] = $meses[$i]['mes'];
				$data['anio'] = $meses[$i]['anio'];
				$data['updated_at'] = $this->basicrud->formatDateToBD();
				$id_lineas_periodos = $this->lineas_periodos_model->add_m($data);
			}
			return true;
		}

		return false;

	}


	function getMeses($periodo_id)
	{
		$meses = $this->lineas_periodos_model->get_m(array('periodo_id' => $periodo_id));
		if($meses){
			echo json_encode($meses);
		}else{
			echo json_encode("none");
		}
	}
}	