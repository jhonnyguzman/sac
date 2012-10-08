<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lineas_accion_docentes_Model extends CI_Model {

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
		$this->db->insert('lineas_accion_docentes', $options);
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
		if(isset($options['linea_accion_escuela_id']))
			$this->db->set('linea_accion_escuela_id', $options['linea_accion_escuela_id']);
		if(isset($options['docente_id']))
			$this->db->set('docente_id', $options['docente_id']);
		if(isset($options['created_at']))
			$this->db->set('created_at', $options['created_at']);
		if(isset($options['updated_at']))
			$this->db->set('updated_at', $options['updated_at']);
		if(isset($options['cantidad_horas']))
			$this->db->set('cantidad_horas', $options['cantidad_horas']);
		if(isset($options['perfil_id']))
			$this->db->set('perfil_id', $options['perfil_id']);

		$this->db->where('id', $options['id']);

		$this->db->update('lineas_accion_docentes');

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
		$this->db->delete('lineas_accion_docentes');
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
			$this->db->where('lad.id', $options['id']);
		if(isset($options['linea_accion_escuela_id']))
			$this->db->where('lad.linea_accion_escuela_id', $options['linea_accion_escuela_id']);
		if(isset($options['docente_id']))
			$this->db->where('lad.docente_id', $options['docente_id']);
		if(isset($options['created_at']))
			$this->db->where('lad.created_at', $options['created_at']);
		if(isset($options['updated_at']))
			$this->db->where('lad.updated_at', $options['updated_at']);
		if(isset($options['cantidad_horas']))
			$this->db->where('lad.cantidad_horas', $options['cantidad_horas']);
		if(isset($options['perfil_id']))
			$this->db->where('lad.perfil_id', $options['perfil_id']);

		//limit / offset
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'],$options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		//sort
		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'],$options['sortDirection']);

		$this->db->select("lad.*, d.apellido as docente_apellido, d.nombre as docente_nombre, p.nombre as perfil_nombre");
		$this->db->from("lineas_accion_docentes as lad");
		$this->db->join("docentes as d","d.id = lad.docente_id");
		$this->db->join("perfiles as p","p.id= lad.perfil_id");
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


	function getCiclosDocentes_m($linea_periodo_escuela_id, $docente_id, $ciclo)
	{
		$result = array();
		$query_str = "select la.ciclo, tg.descripcion as ciclo_descripcion from lineas_accion_docentes as lad 
		inner join lineas_accion_escuelas as lae on lae.id = lad.linea_accion_escuela_id 
		inner join lineas_accion as la on la.id = lae.linea_accion_id
		inner join sys_tabgral as tg on tg.id = la.ciclo 
		where  lae.linea_periodo_escuela_id = ? and lad.docente_id = ? and la.ciclo = ?";
		$query = $this->db->query($query_str,array($linea_periodo_escuela_id, $docente_id, $ciclo));
		if($query->num_rows()>0){
			return $result = $query->result();
		}
	}



	function getPeriodo($linea_accion_escuela_id)
	{
		$this->db->where('lae.id', $linea_accion_escuela_id);

		$this->db->select("pe.periodo_id, lpe.id as linea_periodo_escuela_id");
		$this->db->from("lineas_accion_escuelas as lae");
		$this->db->join("lineas_periodos_escuelas as lpe", "lpe.id = lae.linea_periodo_escuela_id");
		$this->db->join("periodos_escuelas as pe", "pe.id = lpe.periodo_escuela_id");

		$query = $this->db->get();
		if($query->num_rows()>0){
			return $result = $query->result();
		}
	}


	function getTotalHorasAsignadas($periodo_id, $mes, $docente_id)
	{
		$total = 0;
		$this->db->where('pe.periodo_id', $periodo_id);
		$this->db->where('lpe.mes', $mes);
		$this->db->where('lad.docente_id', $docente_id);

		$this->db->select("pe.periodo_id, lad.cantidad_horas as linea_accion_docente_cantidad_horas");
		$this->db->from("periodos_escuelas as pe");
		$this->db->join("lineas_periodos_escuelas as lpe", "lpe.periodo_escuela_id = pe.id");
		$this->db->join("lineas_accion_escuelas as lae","lae.linea_periodo_escuela_id = lpe.id");
		$this->db->join("lineas_accion_docentes as lad", "lad.linea_accion_escuela_id = lae.id");

		$query = $this->db->get();
		if($query->num_rows() > 0){
			foreach ($query->result() as $f) {
				$total+= $f->linea_accion_docente_cantidad_horas; 
			}
		}

		return $total;
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
		$fields[]='linea_accion_escuela_id';
		$fields[]='docente_id';
		$fields[]='docente_apellido';
		$fields[]='docente_nombre';
		$fields[]='perfil_id';
		$fields[]='perfil_nombre';
		$fields[]='cantidad_horas';
		$fields[]='created_at';
		$fields[]='updated_at';
		return $fields;
	}

}