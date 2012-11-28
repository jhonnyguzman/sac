<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/* Config general titles */

$config['recordListTitle']=' Listado de rubros';
$config['recordAddTitle']=' Nuevo rubros';
$config['recordEditTitle']=' Editar rubros';
$config['accessTitle']='<div class="accessTitle"> No tienes permiso para realizar esta operaci&oacute;n </div>';

/* Config labels of the form fields */

$config['id']='Id';
$config['nombre']='Nombre';
$config['es_monto_transferible']='¿Es el monto transferible?';
$config['created_at']='Fecha de alta';
$config['updated_at']='Actualizado el';

/* Config fields for search */

$config['search_by_id']= 1;
$config['search_by_nombre']= 0;
$config['search_by_es_monto_transferible']= 0;
$config['search_by_created_at']= 0;
$config['search_by_updated_at']= 0;

/* Config fields for show in the result list */

$config['show_id']= 1;
$config['show_nombre']= 1;
$config['show_es_monto_transferible']= 1;
$config['show_created_at']= 1;
$config['show_updated_at']= 1;

/* Config params of pagination */

$config['pag_perpage']= 4;

/* Config flash messages */

$config['rubros_flash_add_message']= 'The rubros has been successfully added.';
$config['rubros_flash_edit_message']= 'The rubros has been successfully updated.';
$config['rubros_flash_delete_message']= 'The rubros has been successfully deleted';
$config['rubros_flash_error_delete_message']= 'The rubros hasn\'t been deletedd';
$config['rubros_flash_error_message']= 'A database error has occured, please contact your administrator.';

/* End of file rubros_settings.php */
/* Location: ./application/config/rubros_settings.php */
