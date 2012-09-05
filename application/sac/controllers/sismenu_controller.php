<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sismenu_Controller extends CI_Controller {

	private $flagR;
	private $flagI;
	private $flagU;
	private $flagD;
	private $flags;

	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('logged_in') == true) { 
			$this->load->model('sismenu_model');
			$this->load->model('sisvinculos_model');
			$this->load->model('tabgral_model');
			$this->config->load('sismenu_settings');
			$data['flags'] = $this->basicauth->getPermissions('sys_menu');
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
			$data['title_header'] = $this->config->item('recordListTitle');
			$data['flag'] = $this->flags;
			$this->load->view('sismenu_view/home_sismenu', $data);
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

		$this->form_validation->set_rules('descripcion', 'descripcion', 'trim|required|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('estado', 'estado', 'trim|integer|xss_clean');
		$this->form_validation->set_rules('parent', 'parent', 'trim|integer|xss_clean');
		$this->form_validation->set_rules('sisvinculos_link', 'sisvinculos_link', 'trim|required|alpha_numeric|xss_clean');
		if($this->form_validation->run())
		{	
			$data_sismenu  = array();
			$data_sismenu['descripcion'] = $this->input->post('descripcion');
			$data_sismenu['estado'] = $this->input->post('estado');
			$data_sismenu['parent'] = $this->input->post('parent');
			$data_sismenu['iconpath'] = $this->input->post('iconpath');
			$data_sismenu['updated_at'] = $this->basicrud->formatDateToBD();

			$id_sismenu = $this->sismenu_model->add_m($data_sismenu);
			if($id_sismenu){ 
				$id_sisvinculos = $this->sisvinculos_model->add_m(array('sismenu_id'=>$id_sismenu,'link'=>$this->input->post('link'))); 
				if($id_sisvinculos){ 
					$this->session->set_flashdata('flashConfirm', $this->config->item('flash_add_message')); 
					redirect('sismenu_controller','location');
				}else{ 
					$this->session->set_flashdata('flashError', $this->config->item('flash_error_message')); 
					redirect('sismenu_controller','location');
				}
			}else{
				$this->session->set_flashdata('flashError', $this->config->item('flash_error_message')); 
				redirect('sismenu_controller','location');
			}
		}else{
			$data['parents'] = $this->sismenu_model->get_m(array('estado'=>1));
			$data['estados'] = $this->tabgral_model->get_m(array('grupos_tabgral_id'=>1));
			$this->load->view('sismenu_view/form_add_sismenu',$data);
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
	function edit_c($sismenu_id)
	{
		//code here
		$data = array();
		$data['title_header'] = $this->config->item('recordEditTitle');

		$data['sismenu'] = $this->sismenu_model->get_m(array('id' => $sismenu_id),$flag=1);

		$this->form_validation->set_rules('id', 'id', 'trim|required|integer|xss_clean');
		$this->form_validation->set_rules('descripcion', 'descripcion', 'trim|required|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('estado', 'estado', 'trim|integer|xss_clean');
		$this->form_validation->set_rules('parent', 'parent', 'trim|integer|xss_clean');
		$this->form_validation->set_rules('link', 'link', 'trim|required|alpha_numeric|xss_clean');
		
		if($this->form_validation->run()){
			$data_sismenu  = array();
			$data_sismenu['id'] = $this->input->post('id');
			$data_sismenu['descripcion'] = $this->input->post('descripcion');
			$data_sismenu['estado'] = $this->input->post('estado');
			$data_sismenu['parent'] = $this->input->post('parent');
			$data_sismenu['iconpath'] = $this->input->post('iconpath');
			$data_sismenu['updated_at'] = $this->basicrud->formatDateToBD();

			if($this->sismenu_model->edit_m($data_sismenu)){ 
				if($this->sisvinculos_model->edit_m(array('sismenu_id'=>$this->input->post('id'),'link'=>$this->input->post('link')))){ 
					$this->session->set_flashdata('flashConfirm', $this->config->item('flash_edit_message')); 
					redirect('sismenu_controller','location');
				}else{
					$this->session->set_flashdata('flashError', $this->config->item('flash_error_message')); 
					redirect('sismenu_controller','location');
				}
			}else{
				$this->session->set_flashdata('flashError', $this->config->item('flash_error_message')); 
				redirect('sismenu_controller','location');
			}
		}else{
			$data['parents'] = $this->sismenu_model->get_m(array('estado'=>1));
			$data['estados'] = $this->tabgral_model->get_m(array('grupos_tabgral_id'=>1));
			$this->load->view('sismenu_view/form_edit_sismenu',$data);
		}

	}


	/**
	 * This function sends the id of record to the
	 * method of the model responsible for deleting 
	 * the record in the db
	 *
	 * @access public
	 * @param $sismenu_id id of record
	 * @return void
	 */
	function delete_c($id)
	{
		//code here
		if($this->sismenu_model->delete_m($id)){ 
			$this->session->set_flashdata('flashConfirm', $this->config->item('flash_delete_message')); 
			redirect('sismenu_controller','location');
		}else{
			$this->session->set_flashdata('flashError', $this->config->item('flash_error_delete_message')); 
			redirect('sismenu_controller','location');
		}

	}

	function search_c($offset = 0)
	{
		//code here
		$data = array(); 
		$fieldSearch = array(); 
		$data_search_sismenu  = array();
		$data_search_pagination  = array();
		
		if($this->flagR)
		{
			$fieldSearch = $this->basicrud->getFieldSearch($this->sismenu_model->getFieldsTable_m());
			foreach($fieldSearch as $field)
			{
				if($this->input->post($field) != '')
				{ 
					$data_search_sismenu[$field] = $this->input->post($field);
					$data_search_pagination[$field] = $this->input->post($field);
				}
			}
			
			$data_search_pagination['count'] = true;
			$data_search_sismenu['limit'] = $this->config->item('pag_perpage');
			$data_search_sismenu['offset'] = $offset;
			$data_search_sismenu['sortBy'] = 'parent';
			$data_search_sismenu['sortDirection'] = 'asc';

			$data['pagination'] = $this->basicrud->getPagination(array('nameModel'=>'sismenu_model','perpage'=>$this->config->item('pag_perpage')),$data_search_pagination);
			$data['sismenu'] = $this->sismenu_model->get_m($data_search_sismenu);
		
			$data['flag'] = $this->flags;
			$this->load->view('sismenu_view/record_list_sismenu',$data);
		}

	}

}
