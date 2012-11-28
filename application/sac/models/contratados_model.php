<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contratados_Model extends CI_Model {

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
		$this->db->insert('contratados', $options);
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
		if(isset($options['proyecto_persona_id']))
			$this->db->set('proyecto_persona_id', $options['proyecto_persona_id']);
		if(isset($options['fecha_inicio']))
			$this->db->set('fecha_inicio', $options['fecha_inicio']);
		if(isset($options['fecha_fin']))
			$this->db->set('fecha_fin', $options['fecha_fin']);
		if(isset($options['monto_total']))
			$this->db->set('monto_total', $options['monto_total']);
		if(isset($options['cantidad_horas']))
			$this->db->set('cantidad_horas', $options['cantidad_horas']);
		if(isset($options['funcion']))
			$this->db->set('funcion', $options['funcion']);
		if(isset($options['habilitado']))
			$this->db->set('habilitado', $options['habilitado']);
		if(isset($options['created_at']))
			$this->db->set('created_at', $options['created_at']);
		if(isset($options['updated_at']))
			$this->db->set('updated_at', $options['updated_at']);

		$this->db->where('id', $options['id']);

		$this->db->update('contratados');

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
		$this->db->delete('contratados');
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
			$this->db->where('id', $options['id']);
		if(isset($options['proyecto_persona_id']))
			$this->db->where('proyecto_persona_id', $options['proyecto_persona_id']);
		if(isset($options['fecha_inicio']))
			$this->db->where('fecha_inicio', $options['fecha_inicio']);
		if(isset($options['fecha_fin']))
			$this->db->where('fecha_fin', $options['fecha_fin']);
		if(isset($options['monto_total']))
			$this->db->where('monto_total', $options['monto_total']);
		if(isset($options['cantidad_horas']))
			$this->db->where('cantidad_horas', $options['cantidad_horas']);
		if(isset($options['funcion']))
			$this->db->like('funcion', $options['funcion']);
		if(isset($options['habilitado']))
			$this->db->where('habilitado', $options['habilitado']);
		if(isset($options['created_at']))
			$this->db->where('created_at', $options['created_at']);
		if(isset($options['updated_at']))
			$this->db->where('updated_at', $options['updated_at']);

		//limit / offset
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'],$options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		//sort
		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'],$options['sortDirection']);

		$query = $this->db->get('contratados');

		if(isset($options['count'])) return $query->num_rows();

		//format field of type date if it exist for human 
		if($query->num_rows()>0){ 
			if($flag==1){
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
		$fields[]='proyecto_persona_id';
		$fields[]='fecha_inicio';
		$fields[]='fecha_fin';
		$fields[]='monto_total';
		$fields[]='cantidad_horas';
		$fields[]='funcion';
		$fields[]='habilitado';
		$fields[]='created_at';
		$fields[]='updated_at';
		return $fields;
	}

}