<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/* Config general titles */

$config['recordListTitle']='Horas institucionales';
$config['recordAddTitle']=' Alta de horas institucionales';
$config['recordEditTitle']=' Editar horas institucionales';
$config['accessTitle']='<div class="accessTitle"> No tienes permiso para realizar esta operaci&oacute;n </div>';

/* Config labels of the form fields */

$config['id']='Id';
$config['linea_accion_docente_id']='Linea accion docente id';
$config['cantidad_horas']='Cantidad de horas';
$config['linea_periodo_escuela_id']='Linea periodo escuela id';
$config['created_at']='Fecha de alta';
$config['updated_at']='Actualizado el';

/* Config fields for search */

$config['search_by_id']= 1;
$config['search_by_linea_accion_docente_id']= 0;
$config['search_by_cantidad_horas']= 0;
$config['search_by_linea_periodo_escuela_id']= 0;
$config['search_by_created_at']= 0;
$config['search_by_updated_at']= 0;

/* Config fields for show in the result list */

$config['show_id']= 1;
$config['show_linea_accion_docente_id']= 1;
$config['show_cantidad_horas']= 1;
$config['show_linea_periodo_escuela_id']= 1;
$config['show_created_at']= 1;
$config['show_updated_at']= 1;

/* Config params of pagination */

$config['pag_perpage']= 4;

/* Config flash messages */

$config['horas_institucionales_flash_add_message']= 'The horas_institucionales has been successfully added.';
$config['horas_institucionales_flash_edit_message']= 'The horas_institucionales has been successfully updated.';
$config['horas_institucionales_flash_delete_message']= 'The horas_institucionales has been successfully deleted';
$config['horas_institucionales_flash_error_delete_message']= 'The horas_institucionales hasn\'t been deletedd';
$config['horas_institucionales_flash_error_message']= 'A database error has occured, please contact your administrator.';

/* End of file horas_institucionales_settings.php */
/* Location: ./application/config/horas_institucionales_settings.php */
