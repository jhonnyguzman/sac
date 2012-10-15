<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Alertas_Model extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}


	/**
	 * This function get the data of the db
	 *
	 * @access public
	 * @param array fields of the table
	 * @param integer	flag to indicate if return one record or more of one record
	 * @return array  result
	 */
	function getAlertaCriterio1_m($options = array(),$flag=0)
	{
		//code here
	
		if(isset($options['mes']))
			$this->db->where(
			"
			(SELECT SUM(lad.cantidad_horas) FROM lineas_accion_docentes as lad
			JOIN `lineas_accion_escuelas` as lae ON `lae`.`id` = `lad`.`linea_accion_escuela_id` 
			JOIN `lineas_periodos_escuelas` as lpe ON `lpe`.`id` = `lae`.`linea_periodo_escuela_id`
			JOIN `periodos_escuelas` as pe ON `pe`.`id` = `lpe`.`periodo_escuela_id` 
			JOIN `periodos` as p ON `p`.`id` = `pe`.`periodo_id`
			WHERE lad.docente_id = d.id AND lpe.mes =  ".$options['mes']." AND `p`.`id` = ".$options['periodo_id']." ) > 4

			", NULL, FALSE);
		

		//limit / offset
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'],$options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		//sort
		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'],$options['sortDirection']);

		$this->db->select("
			d.apellido as docente_apellido,
			d.nombre as docente_nombre,
			d.dni as docente_dni,
			
			(SELECT SUM(lad.cantidad_horas) FROM lineas_accion_docentes as lad
			JOIN `lineas_accion_escuelas` as lae ON `lae`.`id` = `lad`.`linea_accion_escuela_id` 
			JOIN `lineas_periodos_escuelas` as lpe ON `lpe`.`id` = `lae`.`linea_periodo_escuela_id`
			JOIN `periodos_escuelas` as pe ON `pe`.`id` = `lpe`.`periodo_escuela_id` 
			JOIN `periodos` as p ON `p`.`id` = `pe`.`periodo_id`
			WHERE lad.docente_id = d.id AND lpe.mes =  ".$options['mes']." AND `p`.`id` = ".$options['periodo_id']." ) as horas_asignadas
						",FALSE);

		$this->db->from("docentes as d");

		$query = $this->db->get();

		if(isset($options['count'])) return $query->num_rows();


		if($query->num_rows()>0){ 
			return $query->result();
		}

	}



	/**
	 * This function get the data of the db
	 *
	 * @access public
	 * @param array fields of the table
	 * @param integer	flag to indicate if return one record or more of one record
	 * @return array  result
	 */
	function getAlertaCriterio2_m($options = array(),$flag=0)
	{
		//code here
	
		if(isset($options['mes']))
			$this->db->where(
			"
			(SELECT COUNT(*) FROM lineas_accion_docentes as lad
			JOIN `lineas_accion_escuelas` as lae ON `lae`.`id` = `lad`.`linea_accion_escuela_id` 
			JOIN `lineas_periodos_escuelas` as lpe ON `lpe`.`id` = `lae`.`linea_periodo_escuela_id`
			JOIN `periodos_escuelas` as pe ON `pe`.`id` = `lpe`.`periodo_escuela_id` 
			JOIN `periodos` as p ON `p`.`id` = `pe`.`periodo_id`
			WHERE lad.docente_id = d.id AND lpe.mes =  ".$options['mes']." AND `p`.`id` = ".$options['periodo_id']." ) >= 2

			", NULL, FALSE);
		

		//limit / offset
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'],$options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		//sort
		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'],$options['sortDirection']);

		$this->db->select("
			d.apellido as docente_apellido,
			d.nombre as docente_nombre,
			d.dni as docente_dni,
			
			(SELECT COUNT(*) FROM lineas_accion_docentes as lad
			JOIN `lineas_accion_escuelas` as lae ON `lae`.`id` = `lad`.`linea_accion_escuela_id` 
			JOIN `lineas_periodos_escuelas` as lpe ON `lpe`.`id` = `lae`.`linea_periodo_escuela_id`
			JOIN `periodos_escuelas` as pe ON `pe`.`id` = `lpe`.`periodo_escuela_id` 
			JOIN `periodos` as p ON `p`.`id` = `pe`.`periodo_id`
			WHERE lad.docente_id = d.id AND lpe.mes =  ".$options['mes']." AND `p`.`id` = ".$options['periodo_id']." ) as numero_de_lineas
						",FALSE);

		$this->db->from("docentes as d");

		$query = $this->db->get();

		if(isset($options['count'])) return $query->num_rows();


		if($query->num_rows()>0){ 
			return $query->result();
		}

	}



	/**
	 * This function get the data of the db
	 *
	 * @access public
	 * @param array fields of the table
	 * @param integer	flag to indicate if return one record or more of one record
	 * @return array  result
	 */
	function getAlertaCriterio3_m($options = array(),$flag=0)
	{
		//code here
	
		if(isset($options['mes']))
			$this->db->where(
			"
			(SELECT COUNT(DISTINCT lad.perfil_id)  FROM lineas_accion_docentes as lad
			JOIN `lineas_accion_escuelas` as lae ON `lae`.`id` = `lad`.`linea_accion_escuela_id` 
			JOIN `lineas_periodos_escuelas` as lpe ON `lpe`.`id` = `lae`.`linea_periodo_escuela_id`
			JOIN `periodos_escuelas` as pe ON `pe`.`id` = `lpe`.`periodo_escuela_id` 
			JOIN `periodos` as p ON `p`.`id` = `pe`.`periodo_id`
			WHERE lad.docente_id = d.id AND lpe.mes =  ".$options['mes']." AND `p`.`id` = ".$options['periodo_id']." ) >= 2

			", NULL, FALSE);
		

		//limit / offset
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'],$options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		//sort
		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'],$options['sortDirection']);

		$this->db->select("
			d.apellido as docente_apellido,
			d.nombre as docente_nombre,
			d.dni as docente_dni,
			
			(SELECT COUNT(DISTINCT lad.perfil_id)  FROM lineas_accion_docentes as lad
			JOIN `lineas_accion_escuelas` as lae ON `lae`.`id` = `lad`.`linea_accion_escuela_id` 
			JOIN `lineas_periodos_escuelas` as lpe ON `lpe`.`id` = `lae`.`linea_periodo_escuela_id`
			JOIN `periodos_escuelas` as pe ON `pe`.`id` = `lpe`.`periodo_escuela_id` 
			JOIN `periodos` as p ON `p`.`id` = `pe`.`periodo_id`
			WHERE lad.docente_id = d.id AND lpe.mes =  ".$options['mes']." AND `p`.`id` = ".$options['periodo_id']." ) as numero_de_perfiles
						",FALSE);

		$this->db->from("docentes as d");

		$query = $this->db->get();

		if(isset($options['count'])) return $query->num_rows();


		if($query->num_rows()>0){ 
			return $query->result();
		}

	}




	/**
	 * This function getting all the fields of the table
	 *
	 * @access public
	 * @return array  fields of table
	 */
	function getFieldsTable_m()
	{
		//code here
		$fields=array();
		$fields[]='id';
		$fields[]='periodo_escuela_id';
		$fields[]='mes';

		$fields[]='circuito_nombre';
		$fields[]='departamento_nombre';
		$fields[]='localidad_nombre';
		$fields[]='escuela_nombre';
		$fields[]='matricula';
		$fields[]='periodo';
		$fields[]='cantidad_horas';
		$fields[]='anio';
		$fields[]='mes_descripcion';
		$fields[]='resolucion';
		$fields[]='periodo_costo_hora';
		$fields[]='horas_por_mes';

		$fields[]='docente_apellido';
		$fields[]='docente_nombre';
		$fields[]='docente';
		$fields[]='docente_dni';
		$fields[]='perfil_nombre';
		$fields[]='linea_accion_nombre';
		$fields[]='linea_accion_docente_cantidad_horas';
		$fields[]='horas_restantes';
		$fields[]='horas_gastadas';
		$fields[]='horas_asignadas';

		$fields[]='numero_de_lineas';
		$fields[]='numero_de_perfiles';

		$fields[]='circuito_id';
		$fields[]='periodo_id';
		$fields[]='escuela_id';
		
		
		$fields[]='periodo_fecha_inicio';
		$fields[]='periodo_fecha_fin';
		
		return $fields;

	}

}
