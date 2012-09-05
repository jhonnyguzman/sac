<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sisperfil_Model extends CI_Model {

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
		$this->db->insert('sys_perfil', $options);
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
		if(isset($options['sismenu_id']))
			$this->db->set('sismenu_id', $options['sismenu_id']);
		if(isset($options['perfiles_id']))
			$this->db->set('perfiles_id', $options['perfiles_id']);
		if(isset($options['estado']))
			$this->db->set('estado', $options['estado']);
		if(isset($options['created_at']))
			$this->db->set('created_at', $options['created_at']);
		if(isset($options['updated_at']))
			$this->db->set('updated_at', $options['updated_at']);

		$this->db->where('id', $options['id']);

		$this->db->update('sys_perfil');

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
		$this->db->delete('sys_perfil');
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
		if(isset($options['sismenu_id']))
			$this->db->where('sismenu_id', $options['sismenu_id']);
		if(isset($options['perfiles_id']))
			$this->db->where('perfiles_id', $options['perfiles_id']);
		if(isset($options['estado']))
			$this->db->where('estado', $options['estado']);
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

		$query = $this->db->get('sys_perfil');

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
	 * This function gets all the menu options assigned of the sisperfil table for a particular perfil
	 *
	 * @access public
	 * @return array  fields of table
	 */
	function getMenuAssignedToPerfil_m($perfiles_id)
	{
		//code here
		$query_str = "select sp.id,sp.estado,sm.descripcion, tg.descripcion as estado_descripcion from sys_perfil as sp 
		inner join sys_menu as sm on sp.sismenu_id = sm.id inner join sys_tabgral as tg on tg.id = sp.estado where sp.estado = 1 and sp.perfiles_id = ?";
		$query = $this->db->query($query_str,$perfiles_id);
		if($query->num_rows()>0){
			return $query->result();
		}
	}


	/**
	 * This function gets all the menu options not assigned of the sismenu table for a particular perfil
	 *
	 * @access public
	 * @return array  fields of table
	 */
	function getMenuNotAssignedToPerfil_m($perfiles_id)
	{
		//code here
		$query_str = "select sm.id, sm.estado, sm.descripcion, tg.descripcion as estado_descripcion from sys_menu as sm inner join sys_tabgral as tg on tg.id = sm.estado
		where (select count(*) as cantidad from sys_perfil as sp where sp.perfiles_id= ? and sp.sismenu_id = sm.id and sp.estado = 1) =  0";
		$query = $this->db->query($query_str,$perfiles_id);
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
		$fields[]='sismenu_id';
		$fields[]='perfiles_id';
		$fields[]='estado';
		$fields[]='estado_descripcion';
		$fields[]='created_at';
		$fields[]='updated_at';
		return $fields;
	}

}
