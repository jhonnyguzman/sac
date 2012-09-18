<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/* Config general titles */

$config['recordListTitle']=' Listado de lineas_accion_docentes';
$config['recordAddTitle']=' Nuevo lineas_accion_docentes';
$config['recordEditTitle']=' Editar lineas_accion_docentes';
$config['accessTitle']='<div class="accessTitle"> No tienes permiso para realizar esta operaci&oacute;n </div>';

/* Config labels of the form fields */

$config['id']='Id';
$config['linea_accion_escuela_id']='Linea de acci&oacute;n';
$config['docente_id']='Asignar Docentes';
$config['docente_apellido']='Docente';
$config['docente_nombre']='Docente';
$config['perfil_id']='Perfil';
$config['perfil_nombre']='Perfil';
$config['cantidad_horas']='Cantidad de horas';
$config['created_at']='Fecha de alta';
$config['updated_at']='Actualizado el ';

/* Config fields for search */

$config['search_by_id']= 0;
$config['search_by_linea_accion_escuela_id']= 1;
$config['search_by_docente_id']= 0;
$config['search_by_perfil_id']= 0;
$config['search_by_cantidad_horas']= 0;
$config['search_by_created_at']= 0;
$config['search_by_updated_at']= 0;

/* Config fields for show in the result list */

$config['show_id']= 1;
$config['show_linea_accion_escuela_id']= 1;
$config['show_docente_id']= 1;
$config['show_docente_apellido']= 1;
$config['show_docente_nombre']= 1;
$config['show_perfil_id']= 1;
$config['show_perfil_nombre']= 1;
$config['show_cantidad_horas']= 1;
$config['show_created_at']= 1;
$config['show_updated_at']= 1;

/* Config params of pagination */

$config['pag_perpage']= 4;

/* Config flash messages */

$config['lineas_accion_docentes_flash_add_message']= 'The lineas_accion_docentes has been successfully added.';
$config['lineas_accion_docentes_flash_edit_message']= 'The lineas_accion_docentes has been successfully updated.';
$config['lineas_accion_docentes_flash_delete_message']= 'The lineas_accion_docentes has been successfully deleted';
$config['lineas_accion_docentes_flash_error_delete_message']= 'The lineas_accion_docentes hasn\'t been deletedd';
$config['lineas_accion_docentes_flash_error_message']= 'A database error has occured, please contact your administrator.';

/* End of file lineas_accion_docentes_settings.php */
/* Location: ./application/config/lineas_accion_docentes_settings.php */
