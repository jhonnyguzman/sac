<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/* Config general titles */

$config['recordListTitle']=' Listado de lineas_accion_escuelas';
$config['recordAddTitle']=' Nuevo lineas_accion_escuelas';
$config['recordEditTitle']=' Editar lineas_accion_escuelas';
$config['accessTitle']='<div class="accessTitle"> No tienes permiso para realizar esta operaci&oacute;n </div>';

/* Config labels of the form fields */

$config['id']='Id';
$config['linea_periodo_escuela_id']='Mes';
$config['mes']='Mes';
$config['mes_descripcion']='Mes';
$config['anio']='Año';
$config['linea_accion_id']='Linea de acci&oacute;n';
$config['created_at']='Fecha de alta';
$config['updated_at']='Actualizado el';

$config['periodo_escuela_id']='Periodo';

/* Config fields for search */

$config['search_by_id']= 0;
$config['search_by_linea_periodo_escuela_id']= 1;
$config['search_by_linea_accion_id']= 0;
$config['search_by_created_at']= 0;
$config['search_by_updated_at']= 0;
$config['search_by_periodo_escuela_id']= 1;

/* Config fields for show in the result list */

$config['show_id']= 1;
$config['show_linea_periodo_escuela_id']= 1;
$config['show_mes']= 1;
$config['show_mes_descripcion']= 1;
$config['show_anio']= 1;
$config['show_linea_accion_id']= 1;
$config['show_created_at']= 1;
$config['show_updated_at']= 1;

/* Config params of pagination */

$config['pag_perpage']= 4;

/* Config flash messages */

$config['lineas_accion_escuelas_flash_add_message']= 'The lineas_accion_escuelas has been successfully added.';
$config['lineas_accion_escuelas_flash_edit_message']= 'The lineas_accion_escuelas has been successfully updated.';
$config['lineas_accion_escuelas_flash_delete_message']= 'The lineas_accion_escuelas has been successfully deleted';
$config['lineas_accion_escuelas_flash_error_delete_message']= 'The lineas_accion_escuelas hasn\'t been deletedd';
$config['lineas_accion_docentes_flash_error_delete_fk_message']= 'La linea de accion no puede ser eliminada porque tiene asignada docentes';
$config['lineas_accion_escuelas_flash_error_message']= 'A database error has occured, please contact your administrator.';
$config['lineas_accion_escuelas_flash_error_message_01']= 'La escuela a&uacute;n no posee periodos asignados.';

/* End of file lineas_accion_escuelas_settings.php */
/* Location: ./application/config/lineas_accion_escuelas_settings.php */
