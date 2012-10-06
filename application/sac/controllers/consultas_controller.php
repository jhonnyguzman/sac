<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Consultas_Controller extends CI_Controller {

	private $flagR;
	private $flagI;
	private $flagU;
	private $flagD;
	private $flags;

	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('logged_in') == true) { 
			$this->load->model('consultas_model');
			$this->load->model('docentes_model');
			$this->load->model('circuitos_model');
			$this->load->model('escuelas_model');
			$this->load->model('periodos_escuelas_model');
			$this->load->model('periodos_model');
			$this->config->load('consultas_settings');
		}
	}

	function index()
	{
		//code here
		$data['title_header'] = "Consultas Generales";
		$data['docentes'] = $this->docentes_model->get_m(array('habilitado' => 1));
		$data['circuitos'] = $this->circuitos_model->get_m(array('habilitado' => 1));
		$data['escuelas'] = $this->escuelas_model->get_m(array('habilitado' => 1));
		$data['periodo_escuela_activo'] = $this->periodos_escuelas_model->get_m(array('estado' => 3, 'limit' => 1, 'offset' => 0)); //periodo activo
		$data['periodos_escuela_historicos'] = $this->getPeriodosHistoricosUnicos($this->periodos_escuelas_model->get_m(array('estado' => 4))); //periodo historicos 

		$this->load->view('consultas_view/home_consultas', $data);

	}


	function getPeriodosHistoricosUnicos($periodos_escuela_historicos = array())
	{

		$array1 = array();$resultado = array();$flag=false;
		foreach ($periodos_escuela_historicos as $f) {
			$array1[] = $f->periodo_id;
		}

		$resultado_parcial = array_unique($array1);

		for ($i=0; $i < count($periodos_escuela_historicos); $i++) { 
			if($flag==false){
				if($periodos_escuela_historicos[$i]->periodo_id == $resultado_parcial[$i]){
					$resultado[] = $periodos_escuela_historicos[$i];
					$flag= true;
				}
			}
		}

		return $resultado;
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
		$data_search_consultas = array(); 
		$data_search_pagination = array(); 
		
		
		$fieldSearch = $this->basicrud->getFieldSearch($this->consultas_model->getFieldsTable_m());
		foreach($fieldSearch as $field)
		{
			if($this->input->post($field) != '') 
			{
				if($field == "periodo_id"){
					$data_search_consultas[$field] = $this->formatPeriodoId($this->input->post($field));
					$data_search_pagination[$field] = $this->formatPeriodoId($this->input->post($field));
				}else{
					$data_search_consultas[$field] = $this->input->post($field);
					$data_search_pagination[$field] = $this->input->post($field);
				}
			}
		}

		$data_search_pagination['count'] = true;
		$data_search_consultas['limit'] = $this->config->item('pag_perpage');
		$data_search_consultas['offset'] = $offset;
		$data_search_consultas['sortBy'] = 'escuelas_id';
		$data_search_consultas['sortDirection'] = 'asc';

		
		$data['pagination'] = $this->basicrud->getPagination(array('nameModel'=>'consultas_model','perpage'=>$this->config->item('pag_perpage')),$data_search_pagination);
		$data['consultas'] = $this->consultas_model->get_m($data_search_consultas);
		
		$this->load->view('consultas_view/record_list_consultas',$data);

	}



	function formatPeriodoId($periodo_id)
	{
		$res1 = explode("-", $periodo_id);
		return $res1[0];
	}
}