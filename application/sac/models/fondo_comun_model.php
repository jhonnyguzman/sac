<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fondo_comun_Model extends CI_Model {

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
		$this->db->insert('fondo_comun', $options);
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
		if(isset($options['periodo_escuela_id']))
			$this->db->set('periodo_escuela_id', $options['periodo_escuela_id']);
		if(isset($options['horas_sin_usar']))
			$this->db->set('horas_sin_usar', $options['horas_sin_usar']);
		if(isset($options['horas_sin_usar_restantes']))
			$this->db->set('horas_sin_usar_restantes', $options['horas_sin_usar_restantes']);
		if(isset($options['created_at']))
			$this->db->set('created_at', $options['created_at']);
		if(isset($options['updated_at']))
			$this->db->set('updated_at', $options['updated_at']);

		$this->db->where('id', $options['id']);

		$this->db->update('fondo_comun');

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
		$this->db->delete('fondo_comun');
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
			$this->db->where('fc.id', $options['id']);
		if(isset($options['periodo_escuela_id']))
			$this->db->where('fc.periodo_escuela_id', $options['periodo_escuela_id']);
		if(isset($options['horas_sin_usar']))
			$this->db->where('fc.horas_sin_usar', $options['horas_sin_usar']);
		if(isset($options['horas_sin_usar_restantes']))
			$this->db->where('fc.horas_sin_usar_restantes', $options['horas_sin_usar_restantes']);
		if(isset($options['created_at']))
			$this->db->where('fc.created_at', $options['created_at']);
		if(isset($options['updated_at']))
			$this->db->where('fc.updated_at', $options['updated_at']);

		//limit / offset
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'],$options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		//sort
		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'],$options['sortDirection']);

		$this->db->select("fc.*, p.fecha_inicio as periodo_fecha_inicio, p.fecha_fin as periodo_fecha_fin, e.nombre as escuela_nombre");
		$this->db->from("fondo_comun as fc");
		$this->db->join("periodos_escuelas as pe","pe.id = fc.periodo_escuela_id");
		$this->db->join("periodos as p","pe.periodo_id = p.id");
		$this->db->join("escuelas as e","pe.escuelas_id = e.id");

		$query = $this->db->get();

		if(isset($options['count'])) return $query->num_rows();

		//format field of type date if it exist for human 
		if($query->num_rows()>0){ 
			if(isset($options['id']) && $flag==1){
				$query->row(0)->created_at = $this->basicrud->formatDateToHuman($query->row(0)->created_at);
				$query->row(0)->updated_at = $this->basicrud->formatDateToHuman($query->row(0)->updated_at);
				$query->row(0)->periodo_fecha_inicio = $this->basicrud->formatDateToHuman($query->row(0)->periodo_fecha_inicio);
				$query->row(0)->periodo_fecha_fin = $this->basicrud->formatDateToHuman($query->row(0)->periodo_fecha_fin);
				return $query->row(0);
			}else{
				foreach($query->result() as $row){ 
					$row->created_at = $this->basicrud->formatDateToHuman($row->created_at);
					$row->updated_at = $this->basicrud->formatDateToHuman($row->updated_at);
					$row->periodo_fecha_inicio = $this->basicrud->formatDateToHuman($row->periodo_fecha_inicio);
					$row->periodo_fecha_fin = $this->basicrud->formatDateToHuman($row->periodo_fecha_fin);
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
		$fields[]='periodo_escuela_id';
		$fields[]='horas_sin_usar';
		$fields[]='horas_sin_usar_restantes';
		$fields[]='created_at';
		$fields[]='updated_at';
		return $fields;
	}

}