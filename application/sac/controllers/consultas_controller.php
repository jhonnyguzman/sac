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
		//$data['periodo_escuela_activo'] = $this->periodos_escuelas_model->get_m(array('estado' => 3, 'limit' => 1, 'offset' => 0)); //periodo activo
		//$data['periodos_escuela_historicos'] = $this->getPeriodosHistoricosUnicos($this->periodos_escuelas_model->get_m(array('estado' => 4))); //periodo historicos 

		$data['periodo_activo'] = $this->periodos_model->get_m(array('estado' => 3, 'limit' => 1, 'offset' => 0)); //periodo activo
		$data['periodos_historicos'] = $this->periodos_model->get_m(array('estado' => 4)); //periodo historicos 

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
	public function search_c($offset = 0)
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
				$data_search_consultas[$field] = $this->input->post($field);
				$data_search_pagination[$field] = $this->input->post($field);
			}
		}

		$data_search_pagination['count'] = true;
		$data_search_consultas['limit'] = $this->config->item('pag_perpage');
		$data_search_consultas['offset'] = $offset;
		$data_search_consultas['sortBy'] = 'escuelas_id';
		$data_search_consultas['sortDirection'] = 'asc';

		
		$data['pagination'] = $this->basicrud->getPagination(array('nameModel'=>'consultas_model','perpage'=>$this->config->item('pag_perpage')),$data_search_pagination);
		$data['consultas'] = $this->consultas_model->get_m($data_search_consultas);
		$data['fieldShow'] = $this->basicrud->getFieldToShow($this->consultas_model->getFieldsTable_m());

		$this->load->view('consultas_view/record_list_consultas',$data);

	}


	/**
	 * Esta función es usada para cuando se desea buscar con uno de lo siguientes criterios:
	 * 1.- Escuelas que han utilizado la cantidad máxima de sus horas.
	 * 2.- Escuelas que han utilizado más de la cantidad máxima de sus horas.
	 * 3.- Escuelas que han utilizado menos de la cantidad máxima de sus horas.
	 *
	 * @access public
	 * @return void
	 */
	public function searchHorasEscuelas_c($offset = 0)
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
				$data_search_consultas[$field] = $this->input->post($field);
				$data_search_pagination[$field] = $this->input->post($field);
			}
		}

		$data_search_pagination['count'] = true;
		$data_search_consultas['limit'] = $this->config->item('pag_perpage');
		$data_search_consultas['offset'] = $offset;
		$data_search_consultas['sortBy'] = 'escuelas_id';
		$data_search_consultas['sortDirection'] = 'asc';

		
		$data['pagination'] = $this->basicrud->getPagination(array('nameModel'=>'consultas_model','nameMethod'=>'getHorasEscuelas_m', 'perpage'=>$this->config->item('pag_perpage')),$data_search_pagination);
		$data['consultas'] = $this->consultas_model->getHorasEscuelas_m($data_search_consultas);
		$data['fieldShow'] = $this->quitarElementosArray($this->basicrud->getFieldToShow($this->consultas_model->getFieldsTable_m()));

		$this->load->view('consultas_view/record_list_horas',$data);

	}


	/**
	 * Esta función es usada para generar un archivo pdf y descargarlo de los resultados
	 * de la consulta generada.
	 *
	 * @access public
	 * @return void
	 */
	public function printConsultasPDF_c()
	{
		$data = array(); 
		$fieldSearch = array(); 
		$data_search_consultas = array(); 
		$this->load->helper(array('dompdf', 'file'));
		
		$fieldSearch = $this->basicrud->getFieldSearch($this->consultas_model->getFieldsTable_m());
		foreach($fieldSearch as $field)
		{
			if($this->input->get($field, TRUE) != '') 
			{
				$data_search_consultas[$field] = $this->input->get($field, TRUE);
			}
		}

		$data_search_consultas['sortBy'] = 'escuelas_id';
		$data_search_consultas['sortDirection'] = 'asc';
		$data['consultas'] = $this->consultas_model->get_m($data_search_consultas);

		$data["fieldstoprint"] = $this->input->get('toprint',TRUE);
		$data["title"] = "Listado";
		$data["todayDate"] = $this->basicrud->formatDateToHuman($this->basicrud->getDateToBDWithOutTime());
	     
	    $html = $this->load->view('consultas_view/print_consultas_pdf', $data, true);    
	    pdf_create($html, 'Listado','a4',$this->input->get('orientacion'));

	}


	/**
	 * Esta función es usada para generar un archivo pdf y descargarlo de los resultados
	 * de la consulta generada en base a los siguientes criterios.
	 * 1.- Escuelas que han utilizado la cantidad máxima de sus horas.
	 * 2.- Escuelas que han utilizado más de la cantidad máxima de sus horas.
	 * 3.- Escuelas que han utilizado menos de la cantidad máxima de sus horas.
	 *
	 * @access public
	 * @return void
	 */
	public function printHorasPDF_c()
	{
		$data = array(); 
		$fieldSearch = array(); 
		$data_search_consultas = array(); 
		$this->load->helper(array('dompdf', 'file'));
		
		$fieldSearch = $this->basicrud->getFieldSearch($this->consultas_model->getFieldsTable_m());
		foreach($fieldSearch as $field)
		{
			if($this->input->get($field, TRUE) != '') 
			{
				$data_search_consultas[$field] = $this->input->get($field, TRUE);
			}
		}

		$data_search_consultas['sortBy'] = 'escuelas_id';
		$data_search_consultas['sortDirection'] = 'asc';
		$data['consultas'] = $this->consultas_model->getHorasEscuelas_m($data_search_consultas);

		$data["fieldstoprint"] = $this->input->get('toprint',TRUE);
		$data["title"] = "Listado";
		$data["todayDate"] = $this->basicrud->formatDateToHuman($this->basicrud->getDateToBDWithOutTime());
	     
	    $html = $this->load->view('consultas_view/print_horas_pdf', $data, true);    
	    pdf_create($html, 'Listado','a4',$this->input->get('orientacion'));

	}



	/**
	 * Esta función es usada para generar un archivo excel y descargarlo en base a los resultados
	 * de la consulta generada.
	 *
	 * @access public
	 * @return void
	 */
	public function printConsultasExcel_c()
	{
		$data = array(); 
		$fieldSearch = array(); 
		$data_search_consultas = array(); 
		$this->load->library('PHPExcel');

		$fieldSearch = $this->basicrud->getFieldSearch($this->consultas_model->getFieldsTable_m());
		foreach($fieldSearch as $field)
		{
			if($this->input->get($field, TRUE) != '') 
			{
				$data_search_consultas[$field] = $this->input->get($field, TRUE);
			}
		}

		$data_search_consultas['sortBy'] = 'escuelas_id';
		$data_search_consultas['sortDirection'] = 'asc';
		$data['consultas'] = $this->consultas_model->get_m($data_search_consultas);

		$fieldstoprint = $this->input->get('toprint',TRUE);
		
		$objExcel = new PHPExcel();
		// Agregar Informacion
		$objExcel->setActiveSheetIndex(0);
		$objExcel->getActiveSheet()->setTitle('Consulta Generada');

		$contador2=0;
		foreach($fieldstoprint as $field){
			$objExcel->getActiveSheet()->setCellValue($this->basicrud->entradaColumna($contador2)."1",$this->config->item($field));
			$objExcel->getActiveSheet()->getStyle($this->basicrud->entradaColumna($contador2)."1")->getFont()->setBold(true);
			$contador2++;
		}
		
		$contador1=2;
		foreach ($data['consultas'] as $f) 
		{
			$contador2=0;
			foreach($fieldstoprint as $field){
				if($field == "periodo") {
					$objExcel->getActiveSheet()->setCellValue($this->basicrud->entradaColumna($contador2).$contador1,$f->periodo_fecha_inicio." - ".$f->periodo_fecha_fin);
				}elseif($field == "docente"){ 
					$objExcel->getActiveSheet()->setCellValue($this->basicrud->entradaColumna($contador2).$contador1,$f->docente_apellido." ".$f->docente_nombre);
				}else{
					$objExcel->getActiveSheet()->setCellValue($this->basicrud->entradaColumna($contador2).$contador1,$f->$field);
				}
				$contador2++;
			}
			$contador1++;
		}


		$filename="Listado".date("m-d-Y").".xlsx"; //save our workbook as this file name
		header('Content-Type: application/vnd.ms-excel'); //mime type
		header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
		header('Cache-Control: max-age=0'); //no cache
		             
		//save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
		//if you want to save it as .XLSX Excel 2007 format
		$objWriter = PHPExcel_IOFactory::createWriter($objExcel, 'Excel2007');  
		//force user to download the Excel file without writing it to server's HD
		$objWriter->save('php://output');

	}



	/**
	 * Esta función es usada para generar un archivo excel y descargarlo en base a los resultados
	 * de la consulta generada teniendo en cuenta los siguientes criterios.
	 * 1.- Escuelas que han utilizado la cantidad máxima de sus horas.
	 * 2.- Escuelas que han utilizado más de la cantidad máxima de sus horas.
	 * 3.- Escuelas que han utilizado menos de la cantidad máxima de sus horas.
	 *
	 * @access public
	 * @return void
	 */
	public function printHorasExcel_c()
	{
		$data = array(); 
		$fieldSearch = array(); 
		$data_search_consultas = array(); 
		$this->load->library('PHPExcel');

		$fieldSearch = $this->basicrud->getFieldSearch($this->consultas_model->getFieldsTable_m());
		foreach($fieldSearch as $field)
		{
			if($this->input->get($field, TRUE) != '') 
			{
				$data_search_consultas[$field] = $this->input->get($field, TRUE);
			}
		}

		$data_search_consultas['sortBy'] = 'escuelas_id';
		$data_search_consultas['sortDirection'] = 'asc';
		$data['consultas'] = $this->consultas_model->getHorasEscuelas_m($data_search_consultas);

		$fieldstoprint = $this->input->get('toprint',TRUE);
		
		$objExcel = new PHPExcel();
		// Agregar Informacion
		$objExcel->setActiveSheetIndex(0);
		$objExcel->getActiveSheet()->setTitle('Consulta Generada');

		$contador2=0;
		foreach($fieldstoprint as $field){
			$objExcel->getActiveSheet()->setCellValue($this->basicrud->entradaColumna($contador2)."1",$this->config->item($field));
			$objExcel->getActiveSheet()->getStyle($this->basicrud->entradaColumna($contador2)."1")->getFont()->setBold(true);
			$contador2++;
		}
		
		$contador1=2;
		foreach ($data['consultas'] as $f) 
		{
			$contador2=0;
			foreach($fieldstoprint as $field){
				if($field == "periodo") {
					$objExcel->getActiveSheet()->setCellValue($this->basicrud->entradaColumna($contador2).$contador1,$f->periodo_fecha_inicio." - ".$f->periodo_fecha_fin);
				}elseif($field == "docente"){ 
					$objExcel->getActiveSheet()->setCellValue($this->basicrud->entradaColumna($contador2).$contador1,$f->docente_apellido." ".$f->docente_nombre);
				}else{
					$objExcel->getActiveSheet()->setCellValue($this->basicrud->entradaColumna($contador2).$contador1,$f->$field);
				}
				$contador2++;
			}
			$contador1++;
		}


		$filename="Listado".date("m-d-Y").".xlsx"; //save our workbook as this file name
		header('Content-Type: application/vnd.ms-excel'); //mime type
		header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
		header('Cache-Control: max-age=0'); //no cache
		             
		//save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
		//if you want to save it as .XLSX Excel 2007 format
		$objWriter = PHPExcel_IOFactory::createWriter($objExcel, 'Excel2007');  
		//force user to download the Excel file without writing it to server's HD
		$objWriter->save('php://output');

	}


	private function quitarElementosArray($fields = array())
	{
		$quitar = array();
		$fields2 = $fields;
		
		$quitar[]='docente_apellido';
		$quitar[]='docente_nombre';
		$quitar[]='docente';
		$quitar[]='docente_dni';
		$quitar[]='perfil_nombre';
		$quitar[]='linea_accion_nombre';
		$quitar[]='linea_accion_docente_cantidad_horas';


		for ($i=0; $i < count($fields); $i++) { 
			for ($j=0; $j < count($quitar); $j++) { 
				if($quitar[$j] == $fields[$i]){
					unset($fields2[$i]);
				}
			}
		}

		return array_values($fields2);

	}
}