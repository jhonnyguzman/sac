<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/* Config general titles */

$config['recordListTitle']=' Listado de periodos';
$config['recordAddTitle']=' Nuevo periodo';
$config['recordEditTitle']=' Editar periodo';
$config['accessTitle']='<div class="accessTitle"> No tienes permiso para realizar esta operaci&oacute;n </div>';

/* Config labels of the form fields */

$config['id']='Id';
$config['fecha_inicio']='Fecha de inicio';
$config['fecha_fin']='Fecha de fin';
$config['costo_hora']='Costo por hora';
$config['created_at']='Fecha de alta';
$config['updated_at']='Actualizado el';
$config['estado']='Estado';
$config['estado_descripcion']='Estado';

/* Config fields for search */

$config['search_by_id']= 0;
$config['search_by_fecha_inicio']= 1;
$config['search_by_fecha_fin']= 1;
$config['search_by_costo_hora']= 0;
$config['search_by_created_at']= 0;
$config['search_by_updated_at']= 0;
$config['search_by_estado']= 0;

/* Config fields for show in the result list */

$config['show_id']= 1;
$config['show_fecha_inicio']= 1;
$config['show_fecha_fin']= 1;
$config['show_costo_hora']= 1;
$config['show_created_at']= 1;
$config['show_updated_at']= 1;
$config['show_estado']= 1;
$config['show_estado_descripcion']= 1;


/* Config params of pagination */

$config['pag_perpage']= 10;

/* Config flash messages */

$config['periodos_flash_add_message']= 'Registro agregado correctamente.';
$config['periodos_flash_edit_message']= 'Registro editado correctamente.';
$config['periodos_flash_delete_message']= 'Registro eliminado correctamente';
$config['periodos_flash_error_delete_message']= 'Error al eliminar registro.';
$config['periodos_flash_error_change_state_message']= 'El periodo se dio de alta  correctamente pero nose pudo 
														cambiar el estado a historico de los periodos existentes previamente';

$config['periodos_flash_error_message']= 'A database error has occured, please contact your administrator.';

/* End of file periodos_settings.php */
/* Location: ./application/config/periodos_settings.php */
