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
		if(isset($options['estado']))
			$this->db->set('estado', $options['estado']);

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
			$this->db->where('pe.id', $options['id']);
		if(isset($options['periodo_id']))
			$this->db->where('pe.periodo_id', $options['periodo_id']);
		if(isset($options['escuelas_id']))
			$this->db->where('pe.escuelas_id', $options['escuelas_id']);
		if(isset($options['matricula']))
			$this->db->where('pe.matricula', $options['matricula']);
		if(isset($options['resolucion']))
			$this->db->where('pe.resolucion', $options['resolucion']);
		if(isset($options['cantidad_horas']))
			$this->db->where('pe.cantidad_horas', $options['cantidad_horas']);
		if(isset($options['created_at']))
			$this->db->where('pe.created_at', $options['created_at']);
		if(isset($options['updated_at']))
			$this->db->where('pe.updated_at', $options['updated_at']);
		if(isset($options['estado']))
			$this->db->where('pe.estado', $options['estado']);

		//limit / offset
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'],$options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		//sort
		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'],$options['sortDirection']);

		$this->db->select("pe.*, p.fecha_inicio as periodo_fecha_inicio, p.fecha_fin as periodo_fecha_fin , 
			e.nombre as escuela_nombre, tg.descripcion as estado_descripcion");
		$this->db->from("periodos_escuelas as pe");
		$this->db->join("periodos as p","p.id = pe.periodo_id");
		$this->db->join("escuelas as e","e.id = pe.escuelas_id");
		$this->db->join("sys_tabgral as tg","tg.id = pe.estado");
		$query = $this->db->get();

		if(isset($options['count'])) return $query->num_rows();

		//format field of type date if it exist for human 
		if($query->num_rows()>0){ 
			if(isset($options['id']) && $flag==1){
				$query->row(0)->created_at = $this->basicrud->formatDateToHuman($query->row(0)->created_at);
				$query->row(0)->updated_at = $this->basicrud->formatDateToHuman($query->row(0)->updated_at);
				$query->row(0)->periodo_fecha_inicio = $this->basicrud->formatDateToHuman($query->row(0)->periodo_fecha_inicio);
				$query->row(0)->periodo_fecha_fin = $this->basicrud->formatDateToHuman($query->row(0)->periodo_fecha_fin);
				return $query->row(0);
			}else{
				foreach($query->result() as $row){ 
					$row->created_at = $this->basicrud->formatDateToHuman($row->created_at);
					$row->updated_at = $this->basicrud->formatDateToHuman($row->updated_at);
					$row->periodo_fecha_inicio = $this->basicrud->formatDateToHuman($row->periodo_fecha_inicio);
					$row->periodo_fecha_fin = $this->basicrud->formatDateToHuman($row->periodo_fecha_fin);
				}
				return $query->result();
			}
		}

	}


	/**
	 * Esta funcion cambia el estado de todos los periodos escuelas existenes a 'historico'.
	 * El unico periodo escuela  que no cambia el estado es el pasado como parametro
	 *
	 * @access public
	 * @param integer $id   periodo_escuela que se acaba de dar de alta
	 * @param integer $escuela_id   escuela de la cual se quiere cambiar el estado 
	 * @return boolean true or false  
	 */
	function cambiarEstado_m($id,  $escuelas_id)
	{
		$this->db->set('estado', 4); //estado 'historico'
		$this->db->where('escuelas_id', $escuelas_id);
		$this->db->where_not_in('id', $id);

		$this->db->update('periodos_escuelas');

		if($this->db->affected_rows()>0) return true;
		else return true;

	}


	/**
	* Esta funcion obtiene el periodo con estado 'activo' el cual sera verificado
	* si posee horas restantes sin usar para ser asignadas al fondo comun
	*/
	function getParaFondoComun($new_periodo_escuela_id, $escuelas_id)
	{
		$this->db->where('estado', 3); // estado 'activo'
		$this->db->where('escuelas_id', $escuelas_id);
		$this->db->where_not_in('id', $new_periodo_escuela_id);

		$query = $this->db->get("periodos_escuelas");
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
		$fields[]='periodo_id';
		$fields[]='escuelas_id';
		$fields[]='periodo_fecha_inicio';
		$fields[]='periodo_fecha_fin';
		$fields[]='escuela_nombre';
		$fields[]='matricula';
		$fields[]='resolucion';
		$fields[]='cantidad_horas';
		$fields[]='created_at';
		$fields[]='updated_at';
		$fields[]='estado';
		$fields[]='estado_descripcion';
		return $fields;
	}

}