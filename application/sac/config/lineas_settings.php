<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/* Config general titles */

$config['recordListTitle']=' Listado de lineas';
$config['recordAddTitle']=' Nueva linea';
$config['recordEditTitle']=' Editar linea';
$config['accessTitle']='<div class="accessTitle"> No tienes permiso para realizar esta operaci&oacute;n </div>';

/* Config labels of the form fields */

$config['id']='Id';
$config['nombre']='Nombre';
$config['descripcion']='Descripción';
$config['habilitado']='Estado';
$config['eje_id']='Eje';
$config['eje_nombre']='Eje';
$config['created_at']='Fecha de alta';
$config['updated_at']='Actualizado el';

/* Config fields for search */

$config['search_by_id']= 1;
$config['search_by_nombre']= 0;
$config['search_by_descripcion']= 0;
$config['search_by_habilitado']= 0;
$config['search_by_eje_id']= 0;
$config['search_by_created_at']= 0;
$config['search_by_updated_at']= 0;

/* Config fields for show in the result list */

$config['show_id']= 1;
$config['show_nombre']= 1;
$config['show_descripcion']= 1;
$config['show_habilitado']= 1;
$config['show_eje_id']= 1;
$config['show_created_at']= 1;
$config['show_updated_at']= 1;

/* Config params of pagination */

$config['pag_perpage']= 4;

/* Config flash messages */

$config['lineas_flash_add_message']= 'The lineas has been successfully added.';
$config['lineas_flash_edit_message']= 'The lineas has been successfully updated.';
$config['lineas_flash_delete_message']= 'The lineas has been successfully deleted';
$config['lineas_flash_error_delete_message']= 'The lineas hasn\'t been deletedd';
$config['lineas_flash_error_message']= 'A database error has occured, please contact your administrator.';

/* End of file lineas_settings.php */
/* Location: ./application/config/lineas_settings.php */
