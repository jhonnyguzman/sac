<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/* Config general titles */

$config['recordListTitle']=' Listado de reintegros';
$config['recordAddTitle']=' Nuevo reintegros';
$config['recordEditTitle']=' Editar reintegros';
$config['accessTitle']='<div class="accessTitle"> No tienes permiso para realizar esta operaci&oacute;n </div>';

/* Config labels of the form fields */

$config['id']='id';
$config['tipo']='tipo';
$config['monto']='monto';
$config['persona_id']='persona_id';
$config['created_at']='created_at';
$config['updated_at']='updated_at';

/* Config fields for search */

$config['search_by_id']= 1;
$config['search_by_tipo']= 0;
$config['search_by_monto']= 0;
$config['search_by_persona_id']= 0;
$config['search_by_created_at']= 0;
$config['search_by_updated_at']= 0;

/* Config fields for show in the result list */

$config['show_id']= 1;
$config['show_tipo']= 1;
$config['show_monto']= 1;
$config['show_persona_id']= 1;
$config['show_created_at']= 1;
$config['show_updated_at']= 1;

/* Config params of pagination */

$config['pag_perpage']= 4;

/* Config flash messages */

$config['reintegros_flash_add_message']= 'The reintegros has been successfully added.';
$config['reintegros_flash_edit_message']= 'The reintegros has been successfully updated.';
$config['reintegros_flash_delete_message']= 'The reintegros has been successfully deleted';
$config['reintegros_flash_error_delete_message']= 'The reintegros hasn\'t been deletedd';
$config['reintegros_flash_error_message']= 'A database error has occured, please contact your administrator.';

/* End of file reintegros_settings.php */
/* Location: ./application/config/reintegros_settings.php */
