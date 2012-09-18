<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lineas_accion_escuelas_Model extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}


	/**
	 * This function saving the data in the db
	 *
	 * @access public
	 * @param array fields of the table
	 * @return integer  affected rows
	 */
	function add_m($options = array())
	{
		//code here
		$this->db->insert('lineas_accion_escuelas', $options);
		return $this->db->insert_id();
	}


	/**
	 * This function editing the data in the db
	 *
	 * @access public
	 * @param array fields of the table
	 * @return integer  affected rows
	 */
	function edit_m($options = array())
	{
		//code here
		if(isset($options['linea_periodo_escuela_id']))
			$this->db->set('linea_periodo_escuela_id', $options['linea_periodo_escuela_id']);
		if(isset($options['linea_accion_id']))
			$this->db->set('linea_accion_id', $options['linea_accion_id']);
		if(isset($options['created_at']))
			$this->db->set('created_at', $options['created_at']);
		if(isset($options['updated_at']))
			$this->db->set('updated_at', $options['updated_at']);

		$this->db->where('id', $options['id']);

		$this->db->update('lineas_accion_escuelas');

		if($this->db->affected_rows()>0) return $this->db->affected_rows();
		else return $this->db->affected_rows() + 1;
	}


	/**
	 * This function deleting the data in the db
	 *
	 * @access public
	 * @param  integer $id primary key of record
	 * @return integer  affected rows
	 */
	function delete_m($id)
	{
		//code here
		$this->db->where('id', $id);
		$this->db->delete('lineas_accion_escuelas');
		return $this->db->affected_rows();

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
		if(isset($options['id']))
			$this->db->where('lae.id', $options['id']);
		if(isset($options['linea_periodo_escuela_id']))
			$this->db->where('lae.linea_periodo_escuela_id', $options['linea_periodo_escuela_id']);
		if(isset($options['linea_accion_id']))
			$this->db->where('lae.linea_accion_id', $options['linea_accion_id']);
		if(isset($options['created_at']))
			$this->db->where('lae.created_at', $options['created_at']);
		if(isset($options['updated_at']))
			$this->db->where('lae.updated_at', $options['updated_at']);
		
		//este atributo no es propio de la tabla principal pero
		//se puede dar el caso de querer filtrar todas lineas de acciones
		//de un periodo y no solo por mes.
		if(isset($options['periodo_escuela_id']))
			$this->db->where('lpe.periodo_escuela_id', $options['periodo_escuela_id']);


		//limit / offset
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'],$options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		//sort
		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'],$options['sortDirection']);

		$this->db->select("lae.*, la.nombre as linea_accion_nombre, lpe.mes, lpe.mes as mes_descripcion, lpe.anio");
		$this->db->from("lineas_accion_escuelas as lae");
		$this->db->join("lineas_periodos_escuelas as lpe", "lpe.id = lae.linea_periodo_escuela_id");
		$this->db->join("lineas_accion as la", "la.id = lae.linea_accion_id");
		
		
		$query = $this->db->get();

		if(isset($options['count'])) return $query->num_rows();

		//format field of type date if it exist for human 
		if($query->num_rows()>0){ 
			if(isset($options['id']) && $flag==1){
				$query->row(0)->created_at = $this->basicrud->formatDateToHuman($query->row(0)->created_at);
				$query->row(0)->updated_at = $this->basicrud->formatDateToHuman($query->row(0)->updated_at);
				$query->row(0)->mes_descripcion = $this->basicrud->getMesDescripcion($query->row(0)->mes_descripcion);
				return $query->row(0);
			}else{
				foreach($query->result() as $row){ 
					$row->created_at = $this->basicrud->formatDateToHuman($row->created_at);
					$row->updated_at = $this->basicrud->formatDateToHuman($row->updated_at);
					$row->mes_descripcion = $this->basicrud->getMesDescripcion($row->mes_descripcion);
				}
				return $query->result();
			}
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
		$fields[]='linea_periodo_escuela_id';
		$fields[]='mes';
		$fields[]='mes_descripcion';
		$fields[]='anio';
		$fields[]='linea_accion_id';
		$fields[]='created_at';
		$fields[]='updated_at';
		$fields[]='periodo_escuela_id'; //este campo es solo para finalidad de busqueda
		return $fields;
	}

}