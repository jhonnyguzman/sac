<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Periodos_Model extends CI_Model {

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
		$this->db->insert('periodos', $options);
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
		if(isset($options['fecha_inicio']))
			$this->db->set('fecha_inicio', $options['fecha_inicio']);
		if(isset($options['fecha_fin']))
			$this->db->set('fecha_fin', $options['fecha_fin']);
		if(isset($options['costo_hora']))
			$this->db->set('costo_hora', $options['costo_hora']);
		if(isset($options['created_at']))
			$this->db->set('created_at', $options['created_at']);
		if(isset($options['updated_at']))
			$this->db->set('updated_at', $options['updated_at']);
		if(isset($options['estado']))
			$this->db->set('estado', $options['estado']);

		$this->db->where('id', $options['id']);

		$this->db->update('periodos');

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
		$this->db->delete('periodos');
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
			$this->db->where('p.id', $options['id']);
		if(isset($options['fecha_inicio']))
			$this->db->where('p.fecha_inicio', $options['fecha_inicio']);
		if(isset($options['fecha_fin']))
			$this->db->where('p.fecha_fin', $options['fecha_fin']);
		if(isset($options['costo_hora']))
			$this->db->where('p.costo_hora', $options['costo_hora']);
		if(isset($options['created_at']))
			$this->db->where('p.created_at', $options['created_at']);
		if(isset($options['updated_at']))
			$this->db->where('p.updated_at', $options['updated_at']);
		if(isset($options['estado']))
			$this->db->where('p.estado', $options['estado']);

		//limit / offset
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'],$options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		//sort
		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'],$options['sortDirection']);

		$this->db->select("p.*, tg.descripcion as estado_descripcion, p.fecha_inicio as fecha_inicio_default,p.fecha_fin as fecha_fin_default ");
		$this->db->from("periodos as p");
		$this->db->join("sys_tabgral as tg", "tg.id = p.estado");
		$query = $this->db->get();

		if(isset($options['count'])) return $query->num_rows();

		//format field of type date if it exist for human 
		if($query->num_rows()>0){ 
			if(isset($options['id']) && $flag==1){
				$query->row(0)->fecha_inicio = $this->basicrud->formatDateToHuman($query->row(0)->fecha_inicio);
				$query->row(0)->fecha_fin = $this->basicrud->formatDateToHuman($query->row(0)->fecha_fin);
				$query->row(0)->created_at = $this->basicrud->formatDateToHuman($query->row(0)->created_at);
				$query->row(0)->updated_at = $this->basicrud->formatDateToHuman($query->row(0)->updated_at);
				return $query->row(0);
			}else{
				foreach($query->result() as $row){ 
					$row->fecha_inicio = $this->basicrud->formatDateToHuman($row->fecha_inicio);
					$row->fecha_fin = $this->basicrud->formatDateToHuman($row->fecha_fin);
					$row->created_at = $this->basicrud->formatDateToHuman($row->created_at);
					$row->updated_at = $this->basicrud->formatDateToHuman($row->updated_at);
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
		$fields[]='fecha_inicio';
		$fields[]='fecha_inicio_default';
		$fields[]='fecha_fin';
		$fields[]='fecha_fin_default';
		$fields[]='costo_hora';
		$fields[]='estado';
		$fields[]='estado_descripcion';
		$fields[]='created_at';
		$fields[]='updated_at';
		return $fields;
	}


	/**
	 * Esta funcion cambia el estado de todos los periodos existenes a 'historico'.
	 * El unico periodo que no cambia el estado es el pasado como parametro
	 *
	 * @access public
	 * @param integer $id   periodo que se acaba de dar de alta
	 * @return boolean true or false  
	 */
	function cambiarEstado_m($id)
	{
		$this->db->set('estado', 4); //estado 'historico'
		$this->db->where_not_in('id', $id);

		$this->db->update('periodos');

		if($this->db->affected_rows()>0) return true;
		else return false;

	}
}