<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Eventos_rubros_Model extends CI_Model {

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
		$this->db->insert('eventos_rubros', $options);
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
		if(isset($options['evento_id']))
			$this->db->set('evento_id', $options['evento_id']);
		if(isset($options['fuente_rubro_id']))
			$this->db->set('fuente_rubro_id', $options['fuente_rubro_id']);
		if(isset($options['created_at']))
			$this->db->set('created_at', $options['created_at']);
		if(isset($options['updated_at']))
			$this->db->set('updated_at', $options['updated_at']);
		if(isset($options['costo']))
			$this->db->set('costo', $options['costo']);

		$this->db->where('id', $options['id']);

		$this->db->update('eventos_rubros');

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
		$this->db->delete('eventos_rubros');
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
			$this->db->where('er.id', $options['id']);
		if(isset($options['evento_id']))
			$this->db->where('er.evento_id', $options['evento_id']);
		if(isset($options['fuente_rubro_id']))
			$this->db->where('er.fuente_rubro_id', $options['fuente_rubro_id']);
		if(isset($options['created_at']))
			$this->db->where('er.created_at', $options['created_at']);
		if(isset($options['updated_at']))
			$this->db->where('er.updated_at', $options['updated_at']);
		if(isset($options['costo']))
			$this->db->where('er.costo', $options['costo']);

		//limit / offset
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'],$options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		//sort
		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'],$options['sortDirection']);

		$this->db->select("er.*, r.id as rubro_id, r.nombre as rubro_nombre, f.nombre as fuente_nombre, e.nombre as evento_nombre");
		$this->db->from("eventos_rubros as er");
		$this->db->join("fuentes_rubros as fr","fr.id = er.fuente_rubro_id");
		$this->db->join("rubros as r","r.id = fr.rubro_id");
		$this->db->join("fuentes as f","f.id = fr.fuente_id");
		$this->db->join("eventos as e","e.id = er.evento_id");
		
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
		$fields[]='evento_id';
		$fields[]='evento_nombre';
		$fields[]='fuente_rubro_id';
		$fields[]='rubro_nombre';
		$fields[]='fuente_nombre';
		$fields[]='created_at';
		$fields[]='updated_at';
		$fields[]='costo';
		return $fields;
	}

}