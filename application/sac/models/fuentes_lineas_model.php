<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fuentes_lineas_Model extends CI_Model {

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
		$this->db->insert('fuentes_lineas', $options);
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
		if(isset($options['fuente_id']))
			$this->db->set('fuente_id', $options['fuente_id']);
		if(isset($options['anio']))
			$this->db->set('anio', $options['anio']);
		if(isset($options['monto_global']))
			$this->db->set('monto_global', $options['monto_global']);
		if(isset($options['monto_especial']))
			$this->db->set('monto_especial', $options['monto_especial']);
		if(isset($options['estado']))
			$this->db->set('estado', $options['estado']);
		if(isset($options['created_at']))
			$this->db->set('created_at', $options['created_at']);
		if(isset($options['updated_at']))
			$this->db->set('updated_at', $options['updated_at']);

		$this->db->where('id', $options['id']);

		$this->db->update('fuentes_lineas');

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
		$this->db->delete('fuentes_lineas');
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
			$this->db->where('fl.id', $options['id']);
		if(isset($options['fuente_id']))
			$this->db->where('fl.fuente_id', $options['fuente_id']);
		if(isset($options['anio']))
			$this->db->where('fl.anio', $options['anio']);
		if(isset($options['monto_global']))
			$this->db->where('fl.monto_global', $options['monto_global']);
		if(isset($options['monto_especial']))
			$this->db->where('fl.monto_especial', $options['monto_especial']);
		if(isset($options['estado']))
			$this->db->where('fl.estado', $options['estado']);
		if(isset($options['created_at']))
			$this->db->where('fl.created_at', $options['created_at']);
		if(isset($options['updated_at']))
			$this->db->where('fl.updated_at', $options['updated_at']);

		//limit / offset
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'],$options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		//sort
		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'],$options['sortDirection']);

		$this->db->select("fl.*, tg.descripcion as estado_descripcion");
		$this->db->from("fuentes_lineas as fl");
		$this->db->join("sys_tabgral as tg","tg.id = fl.estado");
		
		$query = $this->db->get();

		if(isset($options['count'])) return $query->num_rows();

		//format field of type date if it exist for human 
		if($query->num_rows()>0){ 
			if(isset($options['id']) && $flag==1){
				$query->row(0)->created_at = $this->basicrud->formatDateToHuman($query->row(0)->created_at);
				$query->row(0)->updated_at = $this->basicrud->formatDateToHuman($query->row(0)->updated_at);
				return $query->row(0);
			}else{
				foreach($query->result() as $row){ 
					$row->created_at = $this->basicrud->formatDateToHuman($row->created_at);
					$row->updated_at = $this->basicrud->formatDateToHuman($row->updated_at);
				}
				return $query->result();
			}
		}

	}


	/**
	 * Esta funcion cambia el estado de todos lineas de fuentes a 'historico'.
	 * La unica linea que no cambia el estado es la pasado como parametro
	 *
	 * @access public
	 * @param integer $id   fuente_linea_id que se acaba de dar de alta
	 * @param integer $fuente_id   fuente de la cual se quiere cambiar el estado 
	 * @return boolean true or false  
	 */
	function cambiarEstado_m($id,  $fuente_id)
	{
		$this->db->set('estado', 13); //estado 'historico'
		$this->db->where('fuente_id', $fuente_id);
		$this->db->where_not_in('id', $id);

		$this->db->update('fuentes_lineas');

		if($this->db->affected_rows()>0) return true;
		else return true;

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
		$fields[]='fuente_id';
		$fields[]='anio';
		$fields[]='monto_global';
		$fields[]='monto_especial';
		$fields[]='estado';
		$fields[]='estado_descripcion';
		$fields[]='created_at';
		$fields[]='updated_at';
		return $fields;
	}

}