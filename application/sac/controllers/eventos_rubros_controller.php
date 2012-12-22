<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Eventos_rubros_Controller extends CI_Controller {

	private $flagR;
	private $flagI;
	private $flagU;
	private $flagD;
	private $flags;

	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('logged_in') == true) { 
			$this->load->model('eventos_rubros_model');
			$this->load->model('eventos_model');
			$this->load->model('rubros_model');
			$this->load->model('fuentes_rubros_model');
			$this->config->load('eventos_rubros_settings');
			$data['flags'] = $this->basicauth->getPermissions('eventos_rubros');
			$this->flagR = $data['flags']['flag-read'];
			$this->flagI = $data['flags']['flag-insert'];
			$this->flagU = $data['flags']['flag-update'];
			$this->flagD = $data['flags']['flag-delete'];
			$this->flags = array('r'=>$this->flagR,'i'=>$this->flagI,'u'=>$this->flagU,'d'=>$this->flagD);
		}
	}

	function index()
	{
		//code here
		if($this->flagR){
			$data['flag'] = $this->flags;
			$data['title_header'] = $this->config->item('recordListTitle');
			$this->search_c();
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
	function add_c($evento_id = "", $proyecto_id = "")
	{
		//code here
		if(!$this->flagI){
			echo $this->config->item('accessTitle');
			exit();
		}

		$data = array();
		$data['title_header'] = $this->config->item('recordAddTitle');
		$this->form_validation->set_rules('evento_id', 'evento_id', 'trim|required|integer|xss_clean');
		$this->form_validation->set_rules('fuente_rubro_id', 'fuente_rubro_id', 'trim|required|integer|xss_clean');
		$this->form_validation->set_rules('costo', 'costo', 'trim|required|xss_clean');
		
		if($this->form_validation->run())
		{	
			$data_eventos_rubros  = array();
			$data_eventos_rubros['evento_id'] = $this->input->post('evento_id');
			$data_eventos_rubros['fuente_rubro_id'] = $this->input->post('fuente_rubro_id');
			$data_eventos_rubros['updated_at'] = $this->basicrud->formatDateToBD();
			$data_eventos_rubros['costo'] = $this->input->post('costo');

			$id_eventos_rubros = $this->eventos_rubros_model->add_m($data_eventos_rubros);
			if($id_eventos_rubros){ 
				$this->session->set_flashdata('flashConfirmModal', $this->config->item('eventos_rubros_flash_add_message')); 
				redirect('eventos_rubros_controller/show_c/'.$evento_id."/".$proyecto_id,'location');
			}else{
				$this->session->set_flashdata('flashErrorModal', $this->config->item('eventos_rubros_flash_error_message')); 
				redirect('eventos_rubros_controller/show_c/'.$evento_id."/".$proyecto_id,'location');
			}
		}else{
			$data["rubros"] = $this->rubros_model->get_m();
			$data["evento_id"] = $evento_id;
			$data["proyecto_id"] = $proyecto_id;
			$this->load->view('eventos_rubros_view/form_add_eventos_rubros',$data);
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
	function edit_c($id,$evento_id,$proyecto_id)
	{
		//code here
		if(!$this->flagU){
			echo $this->config->item('accessTitle');
			exit();
		}

		$data = array();
		$data['title_header'] = $this->config->item('recordEditTitle');
		
		$data['eventos_rubros'] = $this->eventos_rubros_model->get_m(array('id' => $id),$flag=1);
		
		$this->form_validation->set_rules('id', 'id', 'trim|required|integer|xss_clean');
		$this->form_validation->set_rules('evento_id', 'evento_id', 'trim|required|integer|xss_clean');
		$this->form_validation->set_rules('fuente_rubro_id', 'fuente_rubro_id', 'trim|required|integer|xss_clean');
		$this->form_validation->set_rules('costo', 'costo', 'trim|required|xss_clean');
		
		if($this->form_validation->run()){
			$data_eventos_rubros  = array();
			$data_eventos_rubros['id'] = $this->input->post('id');
			$data_eventos_rubros['evento_id'] = $this->input->post('evento_id');
			$data_eventos_rubros['fuente_rubro_id'] = $this->input->post('fuente_rubro_id');
			$data_eventos_rubros['updated_at'] = $this->basicrud->formatDateToBD();
			$data_eventos_rubros['costo'] = $this->input->post('costo');

			if($this->eventos_rubros_model->edit_m($data_eventos_rubros)){ 
				$this->session->set_flashdata('flashConfirmModal', $this->config->item('eventos_rubros_flash_edit_message')); 
				redirect('eventos_rubros_controller/show_c/'.$evento_id."/".$proyecto_id,'location');
			}else{
				$this->session->set_flashdata('flashErrorModal', $this->config->item('eventos_rubros_flash_error_message')); 
				redirect('eventos_rubros_controller/show_c/'.$evento_id."/".$proyecto_id,'location');
			}
		}else{
			$data["fuentes_rubro"] = $this->fuentes_rubros_model->get_m(array("rubro_id" => $data['eventos_rubros']->rubro_id));
			$data["evento_id"] = $evento_id;
			$data["proyecto_id"] = $proyecto_id;
			$this->load->view('eventos_rubros_view/form_edit_eventos_rubros',$data);
		}
	}

	public function show_c($evento_id,$proyecto_id)
	{
		$data['flag'] = $this->flags;
		$data['proyecto_id'] = $proyecto_id;
		$data['evento'] = $this->eventos_model->get_m(array('id' => $evento_id)); 
		$this->load->view("eventos_rubros_view/form_show_eventos_rubros",$data);
	}

	/**
	 * This function sends the id of record to the
	 * method of the model responsible for deleting 
	 * the record in the db
	 *
	 * @access public
	 * @param $id id of record
	 * @return void
	 */
	function delete_c($id,$evento_id,$proyecto_id)
	{
		//code here
		if(!$this->flagD){
			echo $this->config->item('accessTitle');
			exit();
		}

		if($this->eventos_rubros_model->delete_m($id)){ 
			$this->session->set_flashdata('flashConfirmModal', $this->config->item('eventos_rubros_flash_delete_message')); 
			redirect('eventos_rubros_controller/show_c/'.$evento_id."/".$proyecto_id,'location');
		}else{
			$this->session->set_flashdata('flashErrorModal', $this->config->item('eventos_rubros_flash_error_delete_message')); 
			redirect('eventos_rubros_controller/show_c/'.$evento_id."/".$proyecto_id,'location');
		}

	}


	/**
	 * This function filter and sends the data to the view
	 * to shows the found result
	 *
	 * @access public
	 * @return void
	 */
	function search_c($offset = 0)
	{
		//code here
		$data = array(); 
		$fieldSearch = array(); 
		$data_search_eventos_rubros = array(); 
		$data_search_pagination = array(); 
		
		if($this->flagR)
		{
			$fieldSearch = $this->basicrud->getFieldSearch($this->eventos_rubros_model->getFieldsTable_m());
			foreach($fieldSearch as $field)
			{
				if($this->input->post($field) != '') 
				{
					$data_search_eventos_rubros[$field] = $this->input->post($field);
					$data_search_pagination[$field] = $this->input->post($field);
					
				}
			}

			$data_search_pagination['count'] = true;
			$data_search_eventos_rubros['limit'] = $this->config->item('pag_perpage');
			$data_search_eventos_rubros['offset'] = $offset;
			$data_search_eventos_rubros['sortBy'] = 'id';
			$data_search_eventos_rubros['sortDirection'] = 'asc';

			$data['pagination'] = $this->basicrud->getPagination(array('nameModel'=>'eventos_rubros_model','perpage'=>$this->config->item('pag_perpage')),$data_search_pagination);
			$data['eventos_rubros'] = $this->eventos_rubros_model->get_m($data_search_eventos_rubros);
			
			$data['flag'] = $this->flags;
			$data['proyecto_id'] = $this->input->post("proyecto_id");
			$this->load->view('eventos_rubros_view/record_list_eventos_rubros',$data);
		}

	}

}