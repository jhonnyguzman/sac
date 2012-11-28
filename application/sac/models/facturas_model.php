<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Facturas_Model extends CI_Model {

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
		$this->db->insert('facturas', $options);
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
		if(isset($options['nro_factura']))
			$this->db->set('nro_factura', $options['nro_factura']);
		if(isset($options['fecha']))
			$this->db->set('fecha', $options['fecha']);
		if(isset($options['monto']))
			$this->db->set('monto', $options['monto']);
		if(isset($options['estado']))
			$this->db->set('estado', $options['estado']);
		if(isset($options['observacion']))
			$this->db->set('observacion', $options['observacion']);
		if(isset($options['proveedor_id']))
			$this->db->set('proveedor_id', $options['proveedor_id']);
		if(isset($options['created_at']))
			$this->db->set('created_at', $options['created_at']);
		if(isset($options['updated_at']))
			$this->db->set('updated_at', $options['updated_at']);

		$this->db->where('id', $options['id']);

		$this->db->update('facturas');

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
		$this->db->delete('facturas');
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
			$this->db->where('f.id', $options['id']);
		if(isset($options['nro_factura']))
			$this->db->where('f.nro_factura', $options['nro_factura']);
		if(isset($options['fecha']))
			$this->db->where('f.fecha', $options['fecha']);
		if(isset($options['monto']))
			$this->db->where('f.monto', $options['monto']);
		if(isset($options['estado']))
			$this->db->where('f.estado', $options['estado']);
		if(isset($options['observacion']))
			$this->db->like('f.observacion', $options['observacion']);
		if(isset($options['proveedor_id']))
			$this->db->where('f.proveedor_id', $options['proveedor_id']);
		if(isset($options['created_at']))
			$this->db->where('f.created_at', $options['created_at']);
		if(isset($options['updated_at']))
			$this->db->where('f.updated_at', $options['updated_at']);

		//limit / offset
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'],$options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		//sort
		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'],$options['sortDirection']);

		$this->db->select("f.*, p.razon_social as proveedor_razon_social, tg.descripcion as estado_descripcion");
		$this->db->from("facturas as f");
		$this->db->join("proveedores as p","p.id = f.proveedor_id");
		$this->db->join("sys_tabgral as tg","tg.id = f.estado");

		$query = $this->db->get();

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
		$fields[]='nro_factura';
		$fields[]='fecha';
		$fields[]='monto';
		$fields[]='estado';
		$fields[]='estado_descripcion';
		$fields[]='observacion';
		$fields[]='proveedor_id';
		$fields[]='proveedor_razon_social';
		$fields[]='created_at';
		$fields[]='updated_at';
		return $fields;
	}

}