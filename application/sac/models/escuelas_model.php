<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Escuelas_Model extends CI_Model {

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
		$this->db->insert('escuelas', $options);
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
		if(isset($options['cue']))
			$this->db->set('cue', $options['cue']);
		if(isset($options['nombre']))
			$this->db->set('nombre', $options['nombre']);
		if(isset($options['direccion']))
			$this->db->set('direccion', $options['direccion']);
		if(isset($options['telefono']))
			$this->db->set('telefono', $options['telefono']);
		if(isset($options['email']))
			$this->db->set('email', $options['email']);
		if(isset($options['habilitado']))
			$this->db->set('habilitado', $options['habilitado']);
		if(isset($options['localidad_id']))
			$this->db->set('localidad_id', $options['localidad_id']);
		if(isset($options['director_id']))
			$this->db->set('director_id', $options['director_id']);
		if(isset($options['created_at']))
			$this->db->set('created_at', $options['created_at']);
		if(isset($options['updated_at']))
			$this->db->set('updated_at', $options['updated_at']);
		if(isset($options['departamento_id']))
			$this->db->set('departamento_id', $options['departamento_id']);

		$this->db->where('id', $options['id']);

		$this->db->update('escuelas');

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
		$this->db->delete('escuelas');
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
			$this->db->where('e.id', $options['id']);
		if(isset($options['cue']))
			$this->db->where('e.cue', $options['cue']);
		if(isset($options['nombre']))
			$this->db->like('e.nombre', $options['nombre']);
		if(isset($options['direccion']))
			$this->db->like('e.direccion', $options['direccion']);
		if(isset($options['telefono']))
			$this->db->like('e.telefono', $options['telefono']);
		if(isset($options['email']))
			$this->db->like('e.email', $options['email']);
		if(isset($options['habilitado']))
			$this->db->where('e.habilitado', $options['habilitado']);
		if(isset($options['localidad_id']))
			$this->db->where('e.localidad_id', $options['localidad_id']);
		if(isset($options['director_id']))
			$this->db->where('e.director_id', $options['director_id']);
		if(isset($options['created_at']))
			$this->db->where('e.created_at', $options['created_at']);
		if(isset($options['updated_at']))
			$this->db->where('e.updated_at', $options['updated_at']);
		if(isset($options['departamento_id']))
			$this->db->where('e.departamento_id', $options['departamento_id']);

		//limit / offset
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'],$options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		//sort
		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'],$options['sortDirection']);

		$this->db->select("e.*, d.nombre as departamento_nombre, l.nombre as localidad_nombre, di.apellido as director_apellido, di.nombre as director_nombre");
		$this->db->from("escuelas as e");
		$this->db->join("departamentos as d","d.id = e.departamento_id");
		$this->db->join("localidades as l","l.id = e.localidad_id");
		$this->db->join("directores as di","di.id = e.director_id");
		
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


	function getExisteCue_m($options = array())
	{
		//code here
		if(isset($options['id']))
			$this->db->where_not_in('id', $options['id']);
		if(isset($options['cue']))
			$this->db->where('cue', $options['cue']);
		
		$query = $this->db->get("escuelas");

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
		$fields[]='cue';
		$fields[]='nombre';
		$fields[]='direccion';
		$fields[]='telefono';
		$fields[]='email';
		$fields[]='habilitado';
		$fields[]='localidad_id';
		$fields[]='localidad_nombre';
		$fields[]='departamento_id';
		$fields[]='departamento_nombre';
		$fields[]='director_id';
		$fields[]='director_apellido';
		$fields[]='director_nombre';
		$fields[]='created_at';
		$fields[]='updated_at';
		return $fields;
	}

}