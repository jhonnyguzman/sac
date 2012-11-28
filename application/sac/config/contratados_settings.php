<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/* Config general titles */

$config['recordListTitle']=' Listado de contratados';
$config['recordAddTitle']=' Nuevo contratados';
$config['recordEditTitle']=' Editar contratados';
$config['accessTitle']='<div class="accessTitle"> No tienes permiso para realizar esta operaci&oacute;n </div>';

/* Config labels of the form fields */

$config['id']='id';
$config['proyecto_persona_id']='proyecto_persona_id';
$config['fecha_inicio']='fecha_inicio';
$config['fecha_fin']='fecha_fin';
$config['monto_total']='monto_total';
$config['cantidad_horas']='cantidad_horas';
$config['funcion']='funcion';
$config['habilitado']='habilitado';
$config['created_at']='created_at';
$config['updated_at']='updated_at';

/* Config fields for search */

$config['search_by_id']= 1;
$config['search_by_proyecto_persona_id']= 0;
$config['search_by_fecha_inicio']= 0;
$config['search_by_fecha_fin']= 0;
$config['search_by_monto_total']= 0;
$config['search_by_cantidad_horas']= 0;
$config['search_by_funcion']= 0;
$config['search_by_habilitado']= 0;
$config['search_by_created_at']= 0;
$config['search_by_updated_at']= 0;

/* Config fields for show in the result list */

$config['show_id']= 1;
$config['show_proyecto_persona_id']= 1;
$config['show_fecha_inicio']= 1;
$config['show_fecha_fin']= 1;
$config['show_monto_total']= 1;
$config['show_cantidad_horas']= 1;
$config['show_funcion']= 1;
$config['show_habilitado']= 1;
$config['show_created_at']= 1;
$config['show_updated_at']= 1;

/* Config params of pagination */

$config['pag_perpage']= 4;

/* Config flash messages */

$config['contratados_flash_add_message']= 'The contratados has been successfully added.';
$config['contratados_flash_edit_message']= 'The contratados has been successfully updated.';
$config['contratados_flash_delete_message']= 'The contratados has been successfully deleted';
$config['contratados_flash_error_delete_message']= 'The contratados hasn\'t been deletedd';
$config['contratados_flash_error_message']= 'A database error has occured, please contact your administrator.';

/* End of file contratados_settings.php */
/* Location: ./application/config/contratados_settings.php */
