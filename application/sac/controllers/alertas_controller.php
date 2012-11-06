<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Alertas_Controller extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('logged_in') == true) { 
			$this->load->model('alertas_model');
			$this->load->model('docentes_model');
			$this->load->model('circuitos_model');
			$this->load->model('escuelas_model');
			$this->load->model('periodos_escuelas_model');
			$this->load->model('periodos_model');
			$this->config->load('alertas_settings');
		}
	}

	function index()
	{
		$data['title_header'] = "Alertas";
		$data['periodo_activo'] = $this->periodos_model->get_m(array('estado' => 3, 'limit' => 1, 'offset' => 0)); //periodo activo
		$this->load->view('alertas_view/home_alertas', $data);
	}


	/**
	 * Esta función permite buscar todos aquellos registros que  cumplan con el siguiente criterio:
	 *  -  Un docente está realizando más de 4 horas.
	 *
	 * @access public
	 * @return void
	 */
	public function searchCriterio1_c($offset = 0)
	{
		//code here
		$data = array(); 
		$fieldSearch = array(); 
		$data_search_alertas = array(); 
		$data_search_pagination = array(); 
		
		
		$fieldSearch = $this->basicrud->getFieldSearch($this->alertas_model->getFieldsTable_m());
		foreach($fieldSearch as $field)
		{
			if($this->input->post($field) != '') 
			{
				if($field == 'mes'){
					$data_search_alertas[$field] = $this->getMes($this->input->post($field));
					$data_search_pagination[$field] = $this->getMes($this->input->post($field));
				}else{
					$data_search_alertas[$field] = $this->input->post($field);
					$data_search_pagination[$field] = $this->input->post($field);
				}
			}
		}

		$data_search_pagination['count'] = true;
		$data_search_alertas['limit'] = $this->config->item('pag_perpage');
		$data_search_alertas['offset'] = $offset;
		$data_search_alertas['sortBy'] = 'docente_apellido';
		$data_search_alertas['sortDirection'] = 'asc';

		
		$data['pagination'] = $this->basicrud->getPagination(array('nameModel'=>'alertas_model','nameMethod'=>'getAlertaCriterio1_m','perpage'=>$this->config->item('pag_perpage')),$data_search_pagination);
		$data['alertas'] = $this->alertas_model->getAlertaCriterio1_m($data_search_alertas);
		$data['fieldShow'] = $this->basicrud->getFieldToShow($this->alertas_model->getFieldsTable_m());

		$this->load->view('alertas_view/record_list_alertas_criterio_1',$data);

	}



	/**
	 * Esta función permite buscar todos aquellos registros que  cumplan con el siguiente criterio:
	 *  -  Un docente se encuentra en dos o más líneas de acción diferentes.
	 *
	 * @access public
	 * @return void
	 */
	public function searchCriterio2_c($offset = 0)
	{
		//code here
		$data = array(); 
		$fieldSearch = array(); 
		$data_search_alertas = array(); 
		$data_search_pagination = array(); 
		
		
		$fieldSearch = $this->basicrud->getFieldSearch($this->alertas_model->getFieldsTable_m());
		foreach($fieldSearch as $field)
		{
			if($this->input->post($field) != '') 
			{
				if($field == 'mes'){
					$data_search_alertas[$field] = $this->getMes($this->input->post($field));
					$data_search_pagination[$field] = $this->getMes($this->input->post($field));
				}else{
					$data_search_alertas[$field] = $this->input->post($field);
					$data_search_pagination[$field] = $this->input->post($field);
				}
			}
		}

		$data_search_pagination['count'] = true;
		$data_search_alertas['limit'] = $this->config->item('pag_perpage');
		$data_search_alertas['offset'] = $offset;
		$data_search_alertas['sortBy'] = 'docente_apellido';
		$data_search_alertas['sortDirection'] = 'asc';

		
		$data['pagination'] = $this->basicrud->getPagination(array('nameModel'=>'alertas_model','nameMethod'=>'getAlertaCriterio2_m','perpage'=>$this->config->item('pag_perpage')),$data_search_pagination);
		$data['alertas'] = $this->alertas_model->getAlertaCriterio2_m($data_search_alertas);
		$data['fieldShow'] = $this->basicrud->getFieldToShow($this->alertas_model->getFieldsTable_m());

		$this->load->view('alertas_view/record_list_alertas_criterio_2',$data);

	}


	/**
	 * Esta función permite buscar todos aquellos registros que  cumplan con el siguiente criterio:
	 *  -  Un docente desempeña diferentes perfiles.
	 *
	 * @access public
	 * @return void
	 */
	public function searchCriterio3_c($offset = 0)
	{
		//code here
		$data = array(); 
		$fieldSearch = array(); 
		$data_search_alertas = array(); 
		$data_search_pagination = array(); 
		
		
		$fieldSearch = $this->basicrud->getFieldSearch($this->alertas_model->getFieldsTable_m());
		foreach($fieldSearch as $field)
		{
			if($this->input->post($field) != '') 
			{
				if($field == 'mes'){
					$data_search_alertas[$field] = $this->getMes($this->input->post($field));
					$data_search_pagination[$field] = $this->getMes($this->input->post($field));
				}else{
					$data_search_alertas[$field] = $this->input->post($field);
					$data_search_pagination[$field] = $this->input->post($field);
				}
			}
		}

		$data_search_pagination['count'] = true;
		$data_search_alertas['limit'] = $this->config->item('pag_perpage');
		$data_search_alertas['offset'] = $offset;
		$data_search_alertas['sortBy'] = 'docente_apellido';
		$data_search_alertas['sortDirection'] = 'asc';

		
		$data['pagination'] = $this->basicrud->getPagination(array('nameModel'=>'alertas_model','nameMethod'=>'getAlertaCriterio3_m','perpage'=>$this->config->item('pag_perpage')),$data_search_pagination);
		$data['alertas'] = $this->alertas_model->getAlertaCriterio3_m($data_search_alertas);
		$data['fieldShow'] = $this->basicrud->getFieldToShow($this->alertas_model->getFieldsTable_m());

		$this->load->view('alertas_view/record_list_alertas_criterio_3',$data);

	}


	private function getMes($aniomes)
	{
		$part1 = explode("-", $aniomes);
		return $part1[1];
	}
}