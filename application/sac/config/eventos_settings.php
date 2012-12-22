<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/* Config general titles */

$config['recordListTitle']=' Listado de eventos';
$config['recordAddTitle']=' Nuevo eventos';
$config['recordEditTitle']=' Editar eventos';
$config['accessTitle']='<div class="accessTitle"> No tienes permiso para realizar esta operaci&oacute;n </div>';

/* Config labels of the form fields */

$config['id']='Id';
$config['nombre']='Nombre';
$config['descripcion']='Descripción';
$config['fecha']='Fecha';
$config['lugar']='Lugar';
$config['cantidad_asistentes']='Cant. de Asistentes';
$config['monto_total']='Monto total';
$config['monto_presupuestado']='Monto Presupuestado';
$config['proyecto_id']='Proyecto';
$config['created_at']='Fecha de alta';
$config['updated_at']='Actualizado el';

/* Config fields for search */

$config['search_by_id']= 1;
$config['search_by_nombre']= 0;
$config['search_by_descripcion']= 0;
$config['search_by_fecha']= 0;
$config['search_by_lugar']= 0;
$config['search_by_cantidad_asistentes']= 0;
$config['search_by_monto_total']= 0;
$config['search_by_monto_presupuestado']= 0;
$config['search_by_proyecto_id']= 0;
$config['search_by_created_at']= 0;
$config['search_by_updated_at']= 0;

/* Config fields for show in the result list */

$config['show_id']= 1;
$config['show_nombre']= 1;
$config['show_descripcion']= 1;
$config['show_fecha']= 1;
$config['show_lugar']= 1;
$config['show_cantidad_asistentes']= 1;
$config['show_monto_total']= 1;
$config['show_monto_presupuestado']= 1;
$config['show_proyecto_id']= 1;
$config['show_created_at']= 1;
$config['show_updated_at']= 1;

/* Config params of pagination */

$config['pag_perpage']= 4;

/* Config flash messages */

$config['eventos_flash_add_message']= 'The eventos has been successfully added.';
$config['eventos_flash_edit_message']= 'The eventos has been successfully updated.';
$config['eventos_flash_delete_message']= 'The eventos has been successfully deleted';
$config['eventos_flash_error_delete_message']= 'The eventos hasn\'t been deletedd';
$config['eventos_flash_error_message']= 'A database error has occured, please contact your administrator.';

/* End of file eventos_settings.php */
/* Location: ./application/config/eventos_settings.php */
