<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/* Config general titles */

$config['recordListTitle']=' Listado de titulos';
$config['recordAddTitle']=' Nuevo titulo';
$config['recordEditTitle']=' Editar titulo';
$config['accessTitle']='<div class="accessTitle"> No tienes permiso para realizar esta operaci&oacute;n </div>';

/* Config labels of the form fields */

$config['id']='Id';
$config['nombre']='Nombre';
$config['tipo']='Tipo';
$config['created_at']='Fecha de alta';
$config['updated_at']='Actualizado el';

/* Config fields for search */

$config['search_by_id']= 0;
$config['search_by_nombre']= 1;
$config['search_by_tipo']= 0;
$config['search_by_created_at']= 0;
$config['search_by_updated_at']= 0;

/* Config fields for show in the result list */

$config['show_id']= 1;
$config['show_nombre']= 1;
$config['show_tipo']= 1;
$config['show_created_at']= 1;
$config['show_updated_at']= 1;

/* Config params of pagination */

$config['pag_perpage']= 4;

/* Config flash messages */

$config['titulos_flash_add_message']= 'Registro agregado correctamente.';
$config['titulos_flash_edit_message']= 'Registro editado correctamente.';
$config['titulos_flash_delete_message']= 'Registro eliminado correctamente';
$config['titulos_flash_error_delete_message']= 'The titulos hasn\'t been deletedd';
$config['titulos_flash_error_message']= 'A database error has occured, please contact your administrator.';

/* End of file titulos_settings.php */
/* Location: ./application/config/titulos_settings.php */
