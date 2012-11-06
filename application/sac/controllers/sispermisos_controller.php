<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sispermisos_Controller extends CI_Controller {

	private $flagR;
	private $flagI;
	private $flagU;
	private $flagD;
	private $flags;

	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('logged_in') == true) { 
			$this->load->model('sispermisos_model');
			$this->load->model('sys_perfiles_model');
			$this->config->load('sispermisos_settings');
			$data['flags'] = $this->basicauth->getPermissions('sys_permisos');
			$this->flagR = $data['flags']['flag-read'];
			$this->flagI = $data['flags']['flag-insert'];
			$this->flagU = $data['flags']['flag-update'];
			$this->flagD = $data['flags']['flag-delete'];
			$this->flags = array('i'=>$this->flagI,'u'=>$this->flagU,'d'=>$this->flagD);
		}
	}

	function index()
	{
		//code here
		if($this->flagR){
			$data['flag'] = $this->flags;
			$data['title_header'] = $this->config->item('recordListTitle');
			$this->load->view('sispermisos_view/home_sispermisos', $data);
		}
	}


	/**
	 * This function validates and sends the data to the 
	 * method of the model responsible for saving 
	 * the data in the db
	 *
	 * @access public
	 * @return void
	 */
	function add_c()
	{
		//code here
		$data = array();
		$data['title_header'] = $this->config->item('recordAddTitle');
		
		$this->form_validation->set_rules('tabla', 'tabla', 'trim|required|alpha_numeric|callback_checkTable|xss_clean');
		$this->form_validation->set_rules('flag_read', 'flag_read', 'trim|integer|xss_clean');
		$this->form_validation->set_rules('flag_insert', 'flag_insert', 'trim|integer|xss_clean');
		$this->form_validation->set_rules('flag_update', 'flag_update', 'trim|integer|xss_clean');
		$this->form_validation->set_rules('flag_delete', 'flag_delete', 'trim|integer|xss_clean');
		$this->form_validation->set_rules('perfiles_id', 'perfiles_id', 'trim|integer|xss_clean');

		if($this->form_validation->run())
		{	
			$data_sispermisos  = array();
	
			$data_sispermisos['tabla'] = $this->input->post('tabla');
			$data_sispermisos['flag_read'] = $this->input->post('flag_read');
			$data_sispermisos['flag_insert'] = $this->input->post('flag_insert');
			$data_sispermisos['flag_update'] = $this->input->post('flag_update');
			$data_sispermisos['flag_delete'] = $this->input->post('flag_delete');
			$data_sispermisos['perfiles_id'] = $this->input->post('perfiles_id');
			$data_sispermisos['updated_at'] = $this->basicrud->formatDateToBD();

			$id_sispermisos = $this->sispermisos_model->add_m($data_sispermisos);
			if($id_sispermisos){ 
				$this->session->set_flashdata('flashConfirm', $this->config->item('flash_add_message')); 
				redirect('sispermisos_controller','location');
			}else{
				$this->session->set_flashdata('flashError', $this->config->item('flash_error_message')); 
				redirect('sispermisos_controller','location');
			}
		}else{
			$data["perfiles"] = $this->sys_perfiles_model->get_m();
			$data["tablas"] = $this->getTables();
			$this->load->view('sispermisos_view/form_add_sispermisos',$data);
		}

	}


	/**
	 * This function validates and sends the data to the 
	 * method of the model responsible for updating 
	 * the data in the db
	 *
	 * @access public
	 * @return void
	 */
	function edit_c($sispermisos_id)
	{
		//code here
		$data = array();
		$data['title_header'] = $this->config->item('recordEditTitle');
		$data['sispermisos'] = $this->sispermisos_model->get_m(array('id' => $sispermisos_id),$flag=1);
		
		$this->form_validation->set_rules('id', 'id', 'trim|required|integer|xss_clean');
		$this->form_validation->set_rules('tabla', 'tabla', 'trim|required|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('flag_read', 'flag_read', 'trim|integer|xss_clean');
		$this->form_validation->set_rules('flag_insert', 'flag_insert', 'trim|integer|xss_clean');
		$this->form_validation->set_rules('flag_update', 'flag_update', 'trim|integer|xss_clean');
		$this->form_validation->set_rules('flag_delete', 'flag_delete', 'trim|integer|xss_clean');
		$this->form_validation->set_rules('perfiles_id', 'perfiles_id', 'trim|integer|xss_clean');

		if($this->form_validation->run()){
			$data_sispermisos  = array();
			
			$data_sispermisos['id'] = $this->input->post('id');
			$data_sispermisos['tabla'] = $this->input->post('tabla');
			$data_sispermisos['flag_read'] = $this->input->post('flag_read');
			$data_sispermisos['flag_insert'] = $this->input->post('flag_insert');
			$data_sispermisos['flag_update'] = $this->input->post('flag_update');
			$data_sispermisos['flag_delete'] = $this->input->post('flag_delete');
			$data_sispermisos['perfiles_id'] = $this->input->post('perfiles_id');
			$data_sispermisos['updated_at'] = $this->basicrud->formatDateToBD();

			if($this->sispermisos_model->edit_m($data_sispermisos)){ 
				$this->session->set_flashdata('flashConfirm', $this->config->item('flash_edit_message')); 
				redirect('sispermisos_controller','location');
			}else{
				$this->session->set_flashdata('flashError', $this->config->item('flash_error_message')); 
				redirect('sispermisos_controller','location');
			}
		}
		$this->load->view('sispermisos_view/form_edit_sispermisos',$data);

	}


	/**
	 * This function sends the id of record to the
	 * method of the model responsible for deleting 
	 * the record in the db
	 *
	 * @access public
	 * @param $sispermisos_id id of record
	 * @return void
	 */
	function delete_c($id)
	{
		//code here
		if($this->sispermisos_model->delete_m($id)){ 
			$this->session->set_flashdata('flashConfirm', $this->config->item('flash_delete_message')); 
			redirect('sispermisos_controller','location');
		}else{
			$this->session->set_flashdata('flashError', $this->config->item('flash_error_delete_message')); 
			redirect('sispermisos_controller','location');
		}

	}

	function search_c($offset = 0)
	{
		//code here
		$data = array(); 
		$fieldSearch = array(); 
		$data_search_sispermisos  = array();
		$data_search_pagination  = array();
		
		if($this->flagR)
		{
			$fieldSearch = $this->basicrud->getFieldSearch($this->sispermisos_model->getFieldsTable_m());
			foreach($fieldSearch as $field)
			{
				if($this->input->post($field) != '')
				{ 
					$data_search_sispermisos[$field] = $this->input->post($field);
					$data_search_pagination[$field] = $this->input->post($field);
				}
			}
			
			$data_search_pagination['count'] = true;
			$data_search_sispermisos['limit'] = $this->config->item('pag_perpage');
			$data_search_sispermisos['offset'] = $offset;
			$data_search_sispermisos['sortBy'] = 'id';
			$data_search_sispermisos['sortDirection'] = 'asc';

			
			$data['pagination'] = $this->basicrud->getPagination(array('nameModel'=>'sispermisos_model','perpage'=>$this->config->item('pag_perpage')),$data_search_pagination);
			$data['syspermisos'] = $this->sispermisos_model->get_m($data_search_sispermisos);
			
			$data['flag'] = $this->flags;
			$this->load->view('sispermisos_view/record_list_sispermisos',$data);
		}

	}


	private function getTables()
	{
		$tables = array();
		$tables[] = "circuitos";
		$tables[] = "departamentos";
		$tables[] = "directores";
		$tables[] = "docentes";
		$tables[] = "docentes_perfiles_escuelas";
		$tables[] = "escuelas";
		$tables[] = "fondo_comun";
		$tables[] = "lineas_accion";
		$tables[] = "lineas_accion_docentes";
		$tables[] = "lineas_accion_escuelas";
		$tables[] = "lineas_periodos_escuelas";
		$tables[] = "perfiles";
		$tables[] = "periodos";
		$tables[] = "periodos_escuelas";
		$tables[] = "titulos";
		$tables[] = "docentes_titulos";
		$tables[] = "sys_menu";
		$tables[] = "sys_perfil";
		$tables[] = "sys_perfiles";
		$tables[] = "sys_permisos";
		$tables[] = "sys_sessiones";
		$tables[] = "sys_usuarios";
		$tables[] = "sys_vinculos";
		return $tables;
	}


	public function checkTable($tabla)
	{
		$sispermisos = array();
		$sispermisos = $this->sispermisos_model->get_m(array('tabla' => $tabla , 'perfiles_id' => $this->input->post('perfiles_id')));
		if(count($sispermisos) > 0){
			$this->form_validation->set_message('checkTable', 'La tabla '.$tabla.' ya ha sido asignada al perfil seleccionado');
			return FALSE;
		}else{
			return TRUE;
		}
	}
}
