<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/* Config general titles */

$config['recordListTitle']=' Listado de fuentes';
$config['recordAddTitle']=' Nueva fuente';
$config['recordEditTitle']=' Editar fuente';
$config['accessTitle']='<div class="accessTitle"> No tienes permiso para realizar esta operaci&oacute;n </div>';

/* Config labels of the form fields */

$config['id']='Id';
$config['nombre']='Nombre';
$config['created_at']='Fecha de alta';
$config['updated_at']='Actualizado el';

/* Config fields for search */

$config['search_by_id']= 1;
$config['search_by_nombre']= 0;
$config['search_by_created_at']= 0;
$config['search_by_updated_at']= 0;

/* Config fields for show in the result list */

$config['show_id']= 1;
$config['show_nombre']= 1;
$config['show_created_at']= 1;
$config['show_updated_at']= 1;

/* Config params of pagination */

$config['pag_perpage']= 4;

/* Config flash messages */

$config['fuentes_flash_add_message']= 'The fuentes has been successfully added.';
$config['fuentes_flash_edit_message']= 'The fuentes has been successfully updated.';
$config['fuentes_flash_delete_message']= 'The fuentes has been successfully deleted';
$config['fuentes_flash_error_delete_message']= 'The fuentes hasn\'t been deletedd';
$config['fuentes_flash_error_message']= 'A database error has occured, please contact your administrator.';

/* End of file fuentes_settings.php */
/* Location: ./application/config/fuentes_settings.php */
