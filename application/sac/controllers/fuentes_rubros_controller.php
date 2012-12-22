<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fuentes_rubros_Controller extends CI_Controller {

	private $flagR;
	private $flagI;
	private $flagU;
	private $flagD;
	private $flags;

	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('logged_in') == true) { 
			$this->load->model('fuentes_rubros_model');
			$this->load->model('fuentes_model');
			$this->load->model('rubros_model');
			$this->config->load('fuentes_rubros_settings');
			$data['flags'] = $this->basicauth->getPermissions('fuentes_rubros');
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
	function add_c($fuente_id="")
	{
		//code here
		if(!$this->flagI){
			echo $this->config->item('accessTitle');
			exit();
		}

		$data = array();
		$data['title_header'] = $this->config->item('recordAddTitle');
		
		$this->form_validation->set_rules('rubro_id', 'rubro_id', 'trim|required|integer|callback_checkRubro|xss_clean');
		$this->form_validation->set_rules('fuente_id', 'fuente_id', 'trim|required|integer|xss_clean');
		
		
		if($this->form_validation->run())
		{	
			$data_fuentes_rubros  = array();
			$data_fuentes_rubros['rubro_id'] = $this->input->post('rubro_id');
			$data_fuentes_rubros['fuente_id'] = $this->input->post('fuente_id');
			$data_fuentes_rubros['updated_at'] = $this->basicrud->formatDateToBD();

			$id_fuentes_rubros = $this->fuentes_rubros_model->add_m($data_fuentes_rubros);
			if($id_fuentes_rubros){ 
				$this->session->set_flashdata('flashConfirmModal', $this->config->item('fuentes_rubros_flash_add_message')); 
				redirect('fuentes_rubros_controller/show_c/'.$fuente_id,'location');
			}else{
				$this->session->set_flashdata('flashErrorModal', $this->config->item('fuentes_rubros_flash_error_message')); 
				redirect('fuentes_rubros_controller/show_c/'.$fuente_id,'location');
			}
		}else{
			$data["fuente_id"] = $fuente_id;	
			$data["rubros"] = $this->rubros_model->get_m();	
			$this->load->view('fuentes_rubros_view/form_add_fuentes_rubros',$data);
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
	function edit_c($id)
	{
		//code here
		if(!$this->flagU){
			echo $this->config->item('accessTitle');
			exit();
		}

		$data = array();
		$data['title_header'] = $this->config->item('recordEditTitle');
		$data['fuentes_rubros'] = $this->fuentes_rubros_model->get_m(array('id' => $id),$flag=1);
		
		$this->form_validation->set_rules('id', 'id', 'trim|required|integer|xss_clean');
		$this->form_validation->set_rules('rubro_id', 'rubro_id', 'trim|required|integer|xss_clean');
		$this->form_validation->set_rules('fuente_id', 'fuente_id', 'trim|required|integer|xss_clean');
		
		
		if($this->form_validation->run()){
			$data_fuentes_rubros  = array();
			$data_fuentes_rubros['id'] = $this->input->post('id');
			$data_fuentes_rubros['rubro_id'] = $this->input->post('rubro_id');
			$data_fuentes_rubros['fuente_id'] = $this->input->post('fuente_id');
			$data_fuentes_rubros['updated_at'] = $this->basicrud->formatDateToBD();

			if($this->fuentes_rubros_model->edit_m($data_fuentes_rubros)){ 
				$this->session->set_flashdata('flashConfirm', $this->config->item('fuentes_rubros_flash_edit_message')); 
				redirect('fuentes_rubros_controller','location');
			}else{
				$this->session->set_flashdata('flashError', $this->config->item('fuentes_rubros_flash_error_message')); 
				redirect('fuentes_rubros_controller','location');
			}
		}
		$this->load->view('fuentes_rubros_view/form_edit_fuentes_rubros',$data);

	}


	public function showModal_c($fuente_id = "")
	{
		if($fuente_id){
			$data['flag'] = $this->flags;
			$data['fuente'] = $this->fuentes_model->get_m(array('id' => $fuente_id), $flag=1);
			$this->load->view("fuentes_rubros_view/modal_fuentes_rubros",$data);
		}
	}


	public function show_c($fuente_id)
	{
		if($this->flagR)
		{
			$data['flag'] = $this->flags;
			$data['fuente_id'] = $fuente_id;
			$data['fuentes_rubros'] = $this->fuentes_rubros_model->get_m(array('fuente_id' => $fuente_id)); 
			$this->load->view("fuentes_rubros_view/form_show_fuentes_rubros",$data);
		}
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
	function delete_c($id,$fuente_id)
	{
		//code here
		if(!$this->flagD){
			echo $this->config->item('accessTitle');
			exit();
		}

		if($this->fuentes_rubros_model->delete_m($id)){ 
			$this->session->set_flashdata('flashConfirmModal', $this->config->item('fuentes_rubros_flash_delete_message')); 
			redirect('fuentes_rubros_controller/show_c/'.$fuente_id,'location');
		}else{
			$this->session->set_flashdata('flashErrorModal', $this->config->item('fuentes_rubros_flash_error_delete_message')); 
			redirect('fuentes_rubros_controller/show_c/'.$fuente_id,'location');
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
		$data_search_fuentes_rubros = array(); 
		$data_search_pagination = array(); 
		
		if($this->flagR)
		{
			$fieldSearch = $this->basicrud->getFieldSearch($this->fuentes_rubros_model->getFieldsTable_m());
			foreach($fieldSearch as $field)
			{
				if($this->input->post($field) != '') 
				{
					$data_search_fuentes_rubros[$field] = $this->input->post($field);
					$data_search_pagination[$field] = $this->input->post($field);
					
				}
			}

			$data_search_pagination['count'] = true;
			$data_search_fuentes_rubros['limit'] = $this->config->item('pag_perpage');
			$data_search_fuentes_rubros['offset'] = $offset;
			$data_search_fuentes_rubros['sortBy'] = 'id';
			$data_search_fuentes_rubros['sortDirection'] = 'asc';

			$data['pagination'] = $this->basicrud->getPagination(array('nameModel'=>'fuentes_rubros_model','perpage'=>$this->config->item('pag_perpage')),$data_search_pagination);
			$data['fuentes_rubros'] = $this->fuentes_rubros_model->get_m($data_search_fuentes_rubros);
		
			$data['flag'] = $this->flags;
			$this->load->view('fuentes_rubros_view/record_list_fuentes_rubros',$data);
		}

	}


	function getFuentesByRubro($rubro_id)
	{
		$fuentes_rubro = $this->fuentes_rubros_model->get_m(array("rubro_id" => $rubro_id));
		if(count($fuentes_rubro) > 0){
			echo json_encode($fuentes_rubro);
		}else{
			echo json_encode("none");
		}
	}

	function checkRubro($rubro_id)
	{
		$fuente_rubro = $this->fuentes_rubros_model->get_m(array('rubro_id' => $rubro_id, "fuente_id" => $this->input->post("fuente_id")));
		if(count($fuente_rubro) > 0){
			$this->form_validation->set_message('checkRubro','El Rubro seleccionado ya ha sido asignado a esta fuente');
			return false;
		}else{
			return true;
		}
	}

}