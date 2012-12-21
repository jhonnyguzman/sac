<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Proyectos_personas_Model extends CI_Model {

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
		$this->db->insert('proyectos_personas', $options);
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
		if(isset($options['proyecto_id']))
			$this->db->set('proyecto_id', $options['proyecto_id']);
		if(isset($options['persona_id']))
			$this->db->set('persona_id', $options['persona_id']);
		if(isset($options['created_at']))
			$this->db->set('created_at', $options['created_at']);
		if(isset($options['updated_at']))
			$this->db->set('updated_at', $options['updated_at']);

		$this->db->where('id', $options['id']);

		$this->db->update('proyectos_personas');

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
		$this->db->delete('proyectos_personas');
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
			$this->db->where('pp.id', $options['id']);
		if(isset($options['proyecto_id']))
			$this->db->where('pp.proyecto_id', $options['proyecto_id']);
		if(isset($options['persona_id']))
			$this->db->where('pp.persona_id', $options['persona_id']);
		if(isset($options['created_at']))
			$this->db->where('pp.created_at', $options['created_at']);
		if(isset($options['updated_at']))
			$this->db->where('pp.updated_at', $options['updated_at']);

		//limit / offset
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'],$options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		//sort
		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'],$options['sortDirection']);

		$this->db->select("pp.*, p.apellido as persona_apellido, p.nombre as persona_nombre, py.nombre as proyecto_nombre");
		$this->db->from("proyectos_personas as pp");
		$this->db->join("personas as p","p.id = pp.persona_id");
		$this->db->join("proyectos as py","py.id = pp.proyecto_id");

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

	public function getRepetidos($persona_id,$proyecto_id,$tabla)
	{
		$this->db->where('proyecto_id', $proyecto_id);
		$this->db->where('persona_id', $persona_id);
		$this->db->select("pp.*");
		$this->db->from("proyectos_personas as pp");
		$this->db->join("{$tabla} as c","c.proyecto_persona_id = pp.id");
		$query = $this->db->get();
		return $query->result();
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
		$fields[]='proyecto_id';
		$fields[]='proyecto_nombre';
		$fields[]='persona_id';
		$fields[]='persona_apellido';
		$fields[]='persona_nombre';
		$fields[]='created_at';
		$fields[]='updated_at';
		return $fields;
	}

}