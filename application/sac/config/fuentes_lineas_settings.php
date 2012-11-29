<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/* Config general titles */

$config['recordListTitle']=' Listado de fuentes_lineas';
$config['recordAddTitle']=' Nuevo fuentes_lineas';
$config['recordEditTitle']=' Editar fuentes_lineas';
$config['accessTitle']='<div class="accessTitle"> No tienes permiso para realizar esta operaci&oacute;n </div>';

/* Config labels of the form fields */

$config['id']='Id';
$config['fuente_id']='Fuente';
$config['anio']='Año';
$config['monto_global']='Monto Global';
$config['monto_especial']='Monto Especial';
$config['estado']='Estado';
$config['created_at']='Fecha de alta';
$config['updated_at']='Actualizado el';

/* Config fields for search */

$config['search_by_id']= 1;
$config['search_by_fuente_id']= 0;
$config['search_by_anio']= 0;
$config['search_by_monto_global']= 0;
$config['search_by_monto_especial']= 0;
$config['search_by_estado']= 0;
$config['search_by_created_at']= 0;
$config['search_by_updated_at']= 0;

/* Config fields for show in the result list */

$config['show_id']= 1;
$config['show_fuente_id']= 1;
$config['show_anio']= 1;
$config['show_monto_global']= 1;
$config['show_monto_especial']= 1;
$config['show_estado']= 1;
$config['show_created_at']= 1;
$config['show_updated_at']= 1;

/* Config params of pagination */

$config['pag_perpage']= 4;

/* Config flash messages */

$config['fuentes_lineas_flash_add_message']= 'The fuentes_lineas has been successfully added.';
$config['fuentes_lineas_flash_edit_message']= 'The fuentes_lineas has been successfully updated.';
$config['fuentes_lineas_flash_delete_message']= 'The fuentes_lineas has been successfully deleted';
$config['fuentes_lineas_flash_error_delete_message']= 'The fuentes_lineas hasn\'t been deletedd';
$config['fuentes_lineas_flash_error_message']= 'A database error has occured, please contact your administrator.';

/* End of file fuentes_lineas_settings.php */
/* Location: ./application/config/fuentes_lineas_settings.php */
