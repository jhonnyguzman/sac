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
			'lineas_accion_escuelas_controller',
			'docentes_titulos_controller',
			'lineas_periodos_controller',
			'consultas_controller',
			'alertas_controller',
			 "ejes_controller",
			 "lineas_controller",
			 "proyectos_controller",
			 "eventos_controller",
			 "personas_controller",
			 "proyectos_personas_controller",
			 "adscriptos_controller",
			 "contratados_controller",
			 "reintegros_controller",
			 "proyectos_fuentes_lineas_controller",
			 "fuentes_lineaas_controller",
			 "fuentes_controller",
			 "fuentes_rubros_controller",
			 "rubros_controller",
			 "eventos_rubros_controller",
			 "proveedores_controller",
			 "proveedores_rubros_controller",
			 "facturas_controller",
			 "facturas_lineas_controller");
		if($CI->session->userdata('logged_in') == true && $CI->router->method == 'login') redirect('admin','location');
		if($CI->session->userdata('logged_in') != true && $CI->router->method != 'login' && in_array($CI->router->class, $privatecontrollers))
		{
			//redirect('usuarios_controller/login_c');
			echo "<script>window.open('".base_url()."a/login','_top');</script>";
		}
	}

}

