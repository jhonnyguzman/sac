<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/* Config general titles */

$config['recordListTitle']=' Listado de lineas_periodos';
$config['recordAddTitle']=' Nuevo lineas_periodos';
$config['recordEditTitle']=' Editar lineas_periodos';
$config['accessTitle']='<div class="accessTitle"> No tienes permiso para realizar esta operaci&oacute;n </div>';

/* Config labels of the form fields */

$config['id']='Id';
$config['periodo_id']='Periodo Id';
$config['mes']='mes';
$config['mes_descripcion']='Mes';
$config['anio']='Año';
$config['created_at']='Fecha de alta';
$config['updated_at']='Actualizado el';

/* Config fields for search */

$config['search_by_id']= 1;
$config['search_by_periodo_id']= 0;
$config['search_by_mes']= 0;
$config['search_by_anio']= 0;
$config['search_by_created_at']= 0;
$config['search_by_updated_at']= 0;

/* Config fields for show in the result list */

$config['show_id']= 1;
$config['show_periodo_id']= 1;
$config['show_mes']= 1;
$config['show_anio']= 1;
$config['show_created_at']= 1;
$config['show_updated_at']= 1;

/* Config params of pagination */

$config['pag_perpage']= 4;

/* Config flash messages */

$config['lineas_periodos_flash_add_message']= 'Registro agregado correctamente.';
$config['lineas_periodos_flash_edit_message']= 'Registro actualizado correctamente.';
$config['lineas_periodos_flash_delete_message']= 'Registro eliminado correctamente.';
$config['lineas_periodos_flash_error_delete_message']= 'Error al eliminar registro.';
$config['lineas_periodos_flash_error_message']= 'A database error has occured, please contact your administrator.';

/* End of file lineas_periodos_settings.php */
/* Location: ./application/config/lineas_periodos_settings.php */
