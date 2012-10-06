<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Consultas_Model extends CI_Model {

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
	function get_m($options = array(),$flag=0)
	{
		//code here
		if(isset($options['docente_id']))
			$this->db->where('lad.docente_id', $options['docente_id']);
		if(isset($options['docente_dni']))
			$this->db->where('d.dni', $options['docente_dni']);
		if(isset($options['escuela_id']))
			$this->db->where('pe.escuelas_id', $options['escuela_id']);
		if(isset($options['periodo_id']))
			$this->db->where('pe.periodo_id', $options['periodo_id']);
		if(isset($options['linea_periodo_escuela_id']))
			$this->db->where('lae.linea_periodo_escuela_id', $options['linea_periodo_escuela_id']);
		if(isset($options['circuito_id']))
			$this->db->where('dep.circuito_id', $options['circuito_id']);
		

		//limit / offset
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'],$options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		//sort
		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'],$options['sortDirection']);

		$this->db->select("
			lpe.*,
			pe.periodo_id,
			pe.escuelas_id,
			pe.matricula,
			pe.resolucion,
			pe.cantidad_horas,
			p.fecha_inicio as periodo_fecha_inicio,
			p.fecha_fin as periodo_fecha_fin,
			p.costo_hora as periodo_costo_hora,
			lpe.mes as mes_descripcion,
			e.nombre as escuela_nombre,
			loc.nombre as localidad_nombre,
			dep.nombre as departamento_nombre,
			c.nombre as circuito_nombre,
			d.apellido as docente_apellido,
			d.nombre as docente_nombre,
			d.dni as docente_dni,
			per.nombre as perfil_nombre,
			la.nombre as linea_accion_nombre,
			lad.cantidad_horas as linea_accion_docente_cantidad_horas
			");

		$this->db->from("lineas_periodos_escuelas as lpe");
		$this->db->join("periodos_escuelas as pe","pe.id = lpe.periodo_escuela_id");
		$this->db->join("periodos as p","p.id = pe.periodo_id");
		$this->db->join("escuelas as e","e.id = pe.escuelas_id");

		$this->db->join("localidades as loc","loc.id = e.localidad_id");
		$this->db->join("departamentos as dep","dep.id = e.departamento_id");
		$this->db->join("circuitos as c","c.id = dep.circuito_id");

		$this->db->join("lineas_accion_escuelas as lae","lpe.id = lae.linea_periodo_escuela_id");
		$this->db->join("lineas_accion_docentes as lad", "lad.linea_accion_escuela_id = lae.id");
		$this->db->join("lineas_accion as la","la.id = lae.linea_accion_id");

		$this->db->join("docentes as d", "d.id = lad.docente_id");
		$this->db->join("perfiles as per", "per.id = lad.perfil_id");

		$query = $this->db->get();

		if(isset($options['count'])) return $query->num_rows();

		//format field of type date if it exist for human 
		if($query->num_rows()>0){ 
			foreach($query->result() as $row){ 
				$row->created_at = $this->basicrud->formatDateToHuman($row->created_at);
				$row->updated_at = $this->basicrud->formatDateToHuman($row->updated_at);
				$row->periodo_fecha_inicio = $this->basicrud->formatDateToHuman($row->periodo_fecha_inicio);
				$row->periodo_fecha_fin = $this->basicrud->formatDateToHuman($row->periodo_fecha_fin);
				$row->mes_descripcion = $this->basicrud->getMesDescripcion($row->mes_descripcion);
			}
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
		$fields[]='docente_id';
		$fields[]='docente_dni';
		$fields[]='escuela_id';
		$fields[]='periodo_id';
		$fields[]='linea_periodo_escuela_id';
		$fields[]='circuito_id';
		return $fields;
	}

}