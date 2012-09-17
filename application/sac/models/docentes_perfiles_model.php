<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class docentes_perfiles_Model extends CI_Model {

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
		$this->db->insert('docentes_perfiles', $options);
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
		if(isset($options['docente_id']))
			$this->db->set('docente_id', $options['docente_id']);
		if(isset($options['perfil_id']))
			$this->db->set('perfil_id', $options['perfil_id']);
		if(isset($options['created_at']))
			$this->db->set('created_at', $options['created_at']);
		if(isset($options['updated_at']))
			$this->db->set('updated_at', $options['updated_at']);

		$this->db->where('id', $options['id']);

		$this->db->update('docentes_perfiles');

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
	function delete_m($options = array())
	{
		//code here
		if(isset($options['id']))
			$this->db->where('id', $options["id"]);
		if(isset($options['docente_id']))
			$this->db->where('docente_id', $options["docente_id"]);
		if(isset($options['perfil_id']))
			$this->db->where('perfil_id', $options["perfil_id"]);
		
		$this->db->delete('docentes_perfiles');
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
			$this->db->where('dp.id', $options['id']);
		if(isset($options['docente_id']))
			$this->db->where('dp.docente_id', $options['docente_id']);
		if(isset($options['perfil_id']))
			$this->db->where('dp.perfil_id', $options['perfil_id']);
		if(isset($options['created_at']))
			$this->db->where('dp.created_at', $options['created_at']);
		if(isset($options['updated_at']))
			$this->db->where('dp.updated_at', $options['updated_at']);


		//limit / offset
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'],$options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		//sort
		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'],$options['sortDirection']);

		$this->db->select("dp.*, d.apellido as docente_apellido, d.nombre as docente_nombre, p.nombre as perfil_nombre");
		$this->db->from("docentes_perfiles as dp");
		$this->db->join("docentes as d", "d.id = dp.docente_id");
		$this->db->join("perfiles as p", "p.id = dp.perfil_id");
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
	 * This function gets all the perfiles  assigned of the docentes_perfiles table for a particular docente
	 *
	 * @access public
	 * @return array  fields of table
	 */
	function getPerfilesAssignedToDocente_m($docente_id)
	{
		//code here
		$query_str = "select dp.id,p.nombre, p.cantidad_hora, dp.docente_id from docentes_perfiles as dp 
		inner join perfiles as p on dp.perfil_id = p.id where dp.docente_id = ?";
		$query = $this->db->query($query_str,$docente_id);
		if($query->num_rows()>0){
			return $query->result();
		}
	}


	/**
	 * This function gets all the perfiles not assigned of the perfiles table for a particular docente
	 *
	 * @access public
	 * @return array  fields of table
	 */
	function getPerfilesNotAssignedToDocente_m($docente_id)
	{
		//code here
		$query_str = "select p.id, p.habilitado, p.nombre,p.cantidad_hora from perfiles as p 
		where (select count(*) as cantidad from docentes_perfiles as dp where dp.docente_id= ? and dp.perfil_id = p.id) = 0";
		$query = $this->db->query($query_str,$docente_id);
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
		$fields[]='docente_id';
		$fields[]='docente_apellido';
		$fields[]='docente_nombre';
		$fields[]='perfil_id';
		$fields[]='perfil_nombre';
		$fields[]='created_at';
		$fields[]='updated_at';
		return $fields;
	}

}