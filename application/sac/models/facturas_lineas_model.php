<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Facturas_lineas_Model extends CI_Model {

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
		$this->db->insert('facturas_lineas', $options);
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
		if(isset($options['concepto']))
			$this->db->set('concepto', $options['concepto']);
		if(isset($options['costo']))
			$this->db->set('costo', $options['costo']);
		if(isset($options['cantidad']))
			$this->db->set('cantidad', $options['cantidad']);
		if(isset($options['subtotal']))
			$this->db->set('subtotal', $options['subtotal']);
		if(isset($options['factura_id']))
			$this->db->set('factura_id', $options['factura_id']);
		if(isset($options['created_at']))
			$this->db->set('created_at', $options['created_at']);
		if(isset($options['updated_at']))
			$this->db->set('updated_at', $options['updated_at']);

		$this->db->where('id', $options['id']);

		$this->db->update('facturas_lineas');

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
			$this->db->where('id', $options['id']);
		if(isset($options['factura_id']))
			$this->db->where('factura_id', $options['factura_id']);

		$this->db->delete('facturas_lineas');
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
		if(isset($options['concepto']))
			$this->db->like('concepto', $options['concepto']);
		if(isset($options['costo']))
			$this->db->where('costo', $options['costo']);
		if(isset($options['cantidad']))
			$this->db->where('cantidad', $options['cantidad']);
		if(isset($options['subtotal']))
			$this->db->where('subtotal', $options['subtotal']);
		if(isset($options['factura_id']))
			$this->db->where('factura_id', $options['factura_id']);
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

		$query = $this->db->get('facturas_lineas');

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
		$fields[]='concepto';
		$fields[]='costo';
		$fields[]='cantidad';
		$fields[]='subtotal';
		$fields[]='factura_id';
		$fields[]='created_at';
		$fields[]='updated_at';
		return $fields;
	}

}