<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Eventos_Model extends CI_Model {

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
		$this->db->insert('eventos', $options);
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
		if(isset($options['nombre']))
			$this->db->set('nombre', $options['nombre']);
		if(isset($options['descripcion']))
			$this->db->set('descripcion', $options['descripcion']);
		if(isset($options['fecha']))
			$this->db->set('fecha', $options['fecha']);
		if(isset($options['lugar']))
			$this->db->set('lugar', $options['lugar']);
		if(isset($options['cantidad_asistentes']))
			$this->db->set('cantidad_asistentes', $options['cantidad_asistentes']);
		if(isset($options['monto_total']))
			$this->db->set('monto_total', $options['monto_total']);
		if(isset($options['proyecto_id']))
			$this->db->set('proyecto_id', $options['proyecto_id']);
		if(isset($options['created_at']))
			$this->db->set('created_at', $options['created_at']);
		if(isset($options['updated_at']))
			$this->db->set('updated_at', $options['updated_at']);
		if(isset($options['monto_presupuestado']))
			$this->db->set('monto_presupuestado', $options['monto_presupuestado']);

		$this->db->where('id', $options['id']);

		$this->db->update('eventos');

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
		$this->db->delete('eventos');
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
		if(isset($options['nombre']))
			$this->db->like('nombre', $options['nombre']);
		if(isset($options['descripcion']))
			$this->db->like('descripcion', $options['descripcion']);
		if(isset($options['fecha']))
			$this->db->where('fecha', $options['fecha']);
		if(isset($options['lugar']))
			$this->db->like('lugar', $options['lugar']);
		if(isset($options['cantidad_asistentes']))
			$this->db->where('cantidad_asistentes', $options['cantidad_asistentes']);
		if(isset($options['monto_total']))
			$this->db->where('monto_total', $options['monto_total']);
		if(isset($options['proyecto_id']))
			$this->db->where('proyecto_id', $options['proyecto_id']);
		if(isset($options['created_at']))
			$this->db->where('created_at', $options['created_at']);
		if(isset($options['updated_at']))
			$this->db->where('updated_at', $options['updated_at']);
		if(isset($options['monto_presupuestado']))
			$this->db->where('monto_presupuestado', $options['monto_presupuestado']);

		//limit / offset
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'],$options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		//sort
		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'],$options['sortDirection']);

		$query = $this->db->get('eventos');

		if(isset($options['count'])) return $query->num_rows();

		//format field of type date if it exist for human 
		if($query->num_rows()>0){ 
			if(isset($options['id']) && $flag==1){
				$query->row(0)->fecha = $this->basicrud->formatDateToHuman($query->row(0)->fecha);
				$query->row(0)->created_at = $this->basicrud->formatDateToHuman($query->row(0)->created_at);
				$query->row(0)->updated_at = $this->basicrud->formatDateToHuman($query->row(0)->updated_at);
				return $query->row(0);
			}else{
				foreach($query->result() as $row){ 
					$row->fecha = $this->basicrud->formatDateToHuman($row->fecha);
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
		$fields[]='nombre';
		$fields[]='descripcion';
		$fields[]='fecha';
		$fields[]='lugar';
		$fields[]='cantidad_asistentes';
		$fields[]='monto_total';
		$fields[]='monto_presupuestado';
		$fields[]='proyecto_id';
		$fields[]='created_at';
		$fields[]='updated_at';
		return $fields;
	}

}