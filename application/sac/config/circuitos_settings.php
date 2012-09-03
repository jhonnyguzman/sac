<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/* Config general titles */

$config['recordListTitle']=' Listado de circuitos';
$config['recordAddTitle']=' Nuevo circuitos';
$config['recordEditTitle']=' Editar circuitos';
$config['accessTitle']='<div class="accessTitle"> No tienes permiso para realizar esta operaci&oacute;n </div>';

/* Config labels of the form fields */

$config['id']='id';
$config['nombre']='nombre';
$config['habilitado']='habilitado';
$config['created_at']='created_at';
$config['updated_at']='updated_at';

/* Config fields for search */

$config['search_by_id']= 0;
$config['search_by_nombre']= 1;
$config['search_by_habilitado']= 0;
$config['search_by_created_at']= 0;
$config['search_by_updated_at']= 0;

/* Config fields for show in the result list */

$config['show_id']= 1;
$config['show_nombre']= 1;
$config['show_habilitado']= 1;
$config['show_created_at']= 1;
$config['show_updated_at']= 1;

/* Config params of pagination */

$config['pag_perpage']= 10;

/* Config flash messages */

$config['circuitos_flash_add_message']= 'Registro agregado correctamente.';
$config['circuitos_flash_edit_message']= 'Registro editado correctamente.';
$config['circuitos_flash_delete_message']= 'Registro eliminado correctamente';
$config['circuitos_flash_error_delete_message']= 'The circuitos hasn\'t been deletedd';
$config['circuitos_flash_error_message']= 'A database error has occured, please contact your administrator.';

/* End of file circuitos_settings.php */
/* Location: ./application/config/circuitos_settings.php */
