<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/* Config general titles */

$config['recordListTitle']=' Listado de adscriptos';
$config['recordAddTitle']=' Nuevo adscriptos';
$config['recordEditTitle']=' Editar adscriptos';
$config['accessTitle']='<div class="accessTitle"> No tienes permiso para realizar esta operaci&oacute;n </div>';

/* Config labels of the form fields */

$config['id']='id';
$config['proyecto_persona_id']='proyecto_persona_id';
$config['escuela_id']='escuela_id';
$config['cantidad_horas']='cantidad_horas';
$config['habilitado']='habilitado';
$config['created_at']='created_at';
$config['updated_at']='updated_at';

/* Config fields for search */

$config['search_by_id']= 1;
$config['search_by_proyecto_persona_id']= 0;
$config['search_by_escuela_id']= 0;
$config['search_by_cantidad_horas']= 0;
$config['search_by_habilitado']= 0;
$config['search_by_created_at']= 0;
$config['search_by_updated_at']= 0;

/* Config fields for show in the result list */

$config['show_id']= 1;
$config['show_proyecto_persona_id']= 1;
$config['show_escuela_id']= 1;
$config['show_cantidad_horas']= 1;
$config['show_habilitado']= 1;
$config['show_created_at']= 1;
$config['show_updated_at']= 1;

/* Config params of pagination */

$config['pag_perpage']= 4;

/* Config flash messages */

$config['adscriptos_flash_add_message']= 'The adscriptos has been successfully added.';
$config['adscriptos_flash_edit_message']= 'The adscriptos has been successfully updated.';
$config['adscriptos_flash_delete_message']= 'The adscriptos has been successfully deleted';
$config['adscriptos_flash_error_delete_message']= 'The adscriptos hasn\'t been deletedd';
$config['adscriptos_flash_error_message']= 'A database error has occured, please contact your administrator.';

/* End of file adscriptos_settings.php */
/* Location: ./application/config/adscriptos_settings.php */
