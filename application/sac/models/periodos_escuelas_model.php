<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Periodos_escuelas_Model extends CI_Model {

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
		$this->db->insert('periodos_escuelas', $options);
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
		if(isset($options['periodo_id']))
			$this->db->set('periodo_id', $options['periodo_id']);
		if(isset($options['escuelas_id']))
			$this->db->set('escuelas_id', $options['escuelas_id']);
		if(isset($options['matricula']))
			$this->db->set('matricula', $options['matricula']);
		if(isset($options['resolucion']))
			$this->db->set('resolucion', $options['resolucion']);
		if(isset($options['cantidad_horas']))
			$this->db->set('cantidad_horas', $options['cantidad_horas']);
		if(isset($options['created_at']))
			$this->db->set('created_at', $options['created_at']);
		if(isset($options['updated_at']))
			$this->db->set('updated_at', $options['updated_at']);

		$this->db->where('id', $options['id']);

		$this->db->update('periodos_escuelas');

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
		$this->db->delete('periodos_escuelas');
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
		if(isset($options['periodo_id']))
			$this->db->where('periodo_id', $options['periodo_id']);
		if(isset($options['escuelas_id']))
			$this->db->where('escuelas_id', $options['escuelas_id']);
		if(isset($options['matricula']))
			$this->db->where('matricula', $options['matricula']);
		if(isset($options['resolucion']))
			$this->db->where('resolucion', $options['resolucion']);
		if(isset($options['cantidad_horas']))
			$this->db->where('cantidad_horas', $options['cantidad_horas']);
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

		$query = $this->db->get('periodos_escuelas');

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
		$fields[]='periodo_id';
		$fields[]='escuelas_id';
		$fields[]='matricula';
		$fields[]='resolucion';
		$fields[]='cantidad_horas';
		$fields[]='created_at';
		$fields[]='updated_at';
		return $fields;
	}

}