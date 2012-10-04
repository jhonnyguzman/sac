<?php 

/**
 * Clase Basicauth 
 * 
 * Esta clase contiene los métodos neecesarios para autentificación de usuarios 
 * y para generar el menú dinámico de la aplicación. 
 * Está configurada para que se autocargue cada ves que se inicia la aplicación,
 * por los  que los métodos de la misma pueden ser llamados desde cualquier controlador.
 * 
 * @package libraries
 * @author Johnny Guzmán
 * @version  1.0  
 */
 
 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 
class Basicauth {
	
	private $CI;
	
	function __construct() 
	{
		$this->CI = & get_instance();			
	}
	
	
	
	/**
	 * El método _required permite verificar si los índices de 
	 * uno de los arrays asociativos que ricibe existe en el otro array que recibe  
	 * 
	 *
	 * @param array  $required  índices a verificar
	 * @param array  $data  índices que tienen que estar en el arrat $required
	 * @return boolean true si los índices del array $data estan en el array %required
	 */
	function _required($required, $data)
	{
		foreach($required as $field)
			if(!isset($data[$field])) return false;
			
		return true;
	}
	
	
	
	function _default($defaults, $options)
	{
		return array_merge($defaults, $options);
	}
	
		
		
	/**
	 * Método de autentificación de usuarios
	 *
	 * El método login agrega información desde la base de datos a la sessión de datos del usuario.
	 * 
	 * Option: Values
	 * --------------
	 * username |
	 * password
	 *
	 * @param array $options
	 * @return array data
	 */
	function login($options = array()) 
	{
		
		$data = array();
		
		// valores requeridos
		if(!$this->_required(
			array('username', 'password'),
			$options)
		) return false;
		
		$query_a = $this->CI->db->get_where('sys_usuarios', array('username'=>$options['username'], 'password'=>$options['password']));
		
		//comprabamos si existe el usuario
		if($query_a->num_rows() > 0){
			
			//comprobamos que el usuario este habilitado
			if($query_a->row()->estado == 1){
				
				//comprobamos si el perfil del usuario esta habilitado
				$query_b = $this->CI ->db->get_where('sys_perfiles',array('id'=>$query_a->row()->perfiles_id,'estado'=>1));
				
				if($query_b->num_rows()>0) {
					$this->CI->session->sess_destroy();
					$this->CI->session->sess_create();
					$this->CI->session->set_userdata(
						array(
						'logged_in'=> true, 
						'username'=>$query_a->row()->username,
						'email'=>$query_a->row()->email,
						'usuario_id'=>$query_a->row()->id,
						'estado'=> $query_a->row()->estado,
						'perfil_id'=> $query_b->row()->id,
						'perfiles_descripcion'=> $query_b->row()->descripcion
						)
					);
				} else {
					$data['error'] = "El perfil de este usuario esta deshabilitado temporalmente. Consulte con el administrador de sistema";	
				}
			} else {
				$data['error'] = "El usuario esta deshabilitado temporalmente";	
			}
					
		} else {
			$data['error'] = "Usuario o contrasena incorrecta";	
		}
		
		return $data;
	}
	
	
	
	/**
	 * Método para eliminar la sessión de datos del usuario que actualmente esta identificado
	 * 
	 */
	function logout() 
	{
		$CI = & get_instance();	
		$CI->session->sess_destroy();	
	}	
	
	
	
	/**
	 * Método de verificación de opciones de menu del asuario segun su perfil
	 *
	 * El método checkMenuUser verifica si el perfil del usuario tiene asignado opciones del menu.
	 * 
	 * @return array data
	 */
	function checkMenuUser()
	{
		
		$data = array();
		
		//listamos todos los menus e items para este usuario  
		$query_str = "select sp.perfiles_id,sm.id, sm.descripcion, sv.link, sp.estado 
		from sys_perfil as sp inner join sys_menu as sm 
		on sp.sismenu_id = sm.id 
		inner join sys_vinculos as sv 
		on sp.sismenu_id = sv.sismenu_id 
		where sp.perfiles_id = ? and sp.estado = 1 and sm.estado = 1;";
						 
		$query_a = $this->CI->db->query($query_str,$this->CI->session->userdata('perfil_id'));
		
		if(!$query_a->num_rows()>0){	
			$data['error'] = "Su perfil aun no tiene asignadas opciones de menu. Consulte con el administrador del sistema";
			$this->logout();
		}
		
		return $data;
	}
	
		
	/**
	 * Método de generación de menu de usuario
	 *
	 * El método generarMenu se encarga de construir el menu principal de la aplicación según el peril del usuario.
	 * 
	 * @return string data
	 */
	function getMenu($parent=0,$ul_start="<ul class='nav' >")
	{
		
		$query_str = "select s.id, s.descripcion, s.parent,s.iconpath, sv.link from sys_menu as s 
		inner join sys_perfil as sp on s.id = sp.sismenu_id inner join
		sys_vinculos as sv on s.id = sv.sismenu_id where 
		s.parent = $parent and 
		s.estado=1
		and sp.perfiles_id = ".$this->CI->session->userdata('perfil_id')."
		ORDER BY s.parent, s.iconpath, s.descripcion";
		
		$query_a = $this->CI->db->query($query_str);
		
		if($query_a->num_rows()>0)
		{		
			echo $ul_start;
			foreach($query_a->result() as $field)
			{
				if($field->link == "#"){
					echo " <li class='dropdown'><a href='#' class='dropdown-toggle' data-toggle='dropdown' >".$field->descripcion."<b class='caret'></b></a>";		
				}else{
					if($this->getParents($field->id))
			   			echo " <li class='dropdown-submenu'><a href='".base_url()."".$field->link."'>".$field->descripcion."</a>";
			   		else
			   			echo " <li><a  href='".base_url()."".$field->link."'>".$field->descripcion."</a>";
			    }	
				$this->getMenu($field->id,$ul_start="<ul class='dropdown-menu' >"); 	
			}
			echo "</ul>";
		}
		echo "</li>";
		
	}
	
	
	function getParents($parent)
	{
		$query_str = "select s.id, s.descripcion, s.parent,s.iconpath, sv.link from sys_menu as s 
		inner join sys_perfil as sp on s.id = sp.sismenu_id inner join
		sys_vinculos as sv on s.id = sv.sismenu_id where 
		s.parent = $parent and 
		s.estado=1
		and sp.perfiles_id = ".$this->CI->session->userdata('perfil_id')."
		ORDER BY s.parent, s.descripcion";
		
		$query_a = $this->CI->db->query($query_str);
		
		if($query_a->num_rows()>0)
			return true;
		else
			return false;
	}


	/**
	 * This function checks the permissions that a profile has on a table
	 *
	 * @access	public
	 * @param	string		the name of the table
	 * @return	array			flags the permissions
	 */
	function getPermissions($nameTable) 
	{
		$data = array();
		
		$query_str = "select flag_read, flag_insert, flag_update, flag_delete
		from sys_permisos where perfiles_id=".$this->CI->session->userdata('perfil_id')." and tabla = '".$nameTable."'";
		
		$query = $this->CI->db->query($query_str);
		if($query->num_rows()>0)
		{
			$data['flag-read'] = $query->row(0)->flag_read;
			$data['flag-insert'] = $query->row(0)->flag_insert;
			$data['flag-update'] = $query->row(0)->flag_update;
			$data['flag-delete'] = $query->row(0)->flag_delete;														
		}
		
		return $data;	
	}
	
	
}
?>
