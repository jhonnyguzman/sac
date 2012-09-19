<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Access_Hook {

	function checkUser()
	{
		$CI =& get_instance();
		$privatecontrollers = array(
			'opmenu_controller',
			'admin',
			'usuarios_controller',
			'docentes_controller',
			'escuelas_controller',
			'directores_controller',
			'lineas_accion_controller',
			'periodos_controller',
			'periodos_escuelas_controller',
			'localidades_controller',
			'sismenu_controller',
			'sisperfil_controller',
			'sispermisos_controller',
			'perfiles_controller',
			'docentes_perfiles_controller',
			'departamentos_controller',
			'titulos_controller',
			'lineas_accion_docentes_controller',
			'lineas_accion_escuelas_controller');
		if($CI->session->userdata('logged_in') == true && $CI->router->method == 'login') redirect('admin','location');
		if($CI->session->userdata('logged_in') != true && $CI->router->method != 'login' && in_array($CI->router->class, $privatecontrollers))
		{
			//redirect('usuarios_controller/login_c');
			echo "<script>window.open('".base_url()."a','_top');</script>";
		}
	}

}