<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/* Config general titles */

$config['recordListTitle']=' Listado de fondo_comun';
$config['recordAddTitle']=' Nuevo fondo_comun';
$config['recordEditTitle']=' Editar fondo_comun';
$config['accessTitle']='<div class="accessTitle"> No tienes permiso para realizar esta operaci&oacute;n </div>';

/* Config labels of the form fields */

$config['id']='id';
$config['periodo_escuela_id']='periodo_escuela_id';
$config['horas_sin_usar']='horas_sin_usar';
$config['horas_sin_usar_restantes']='horas_sin_usar_restantes';
$config['created_at']='created_at';
$config['updated_at']='updated_at';

/* Config fields for search */

$config['search_by_id']= 1;
$config['search_by_periodo_escuela_id']= 0;
$config['search_by_horas_sin_usar']= 0;
$config['search_by_horas_sin_usar_restantes']= 0;
$config['search_by_created_at']= 0;
$config['search_by_updated_at']= 0;

/* Config fields for show in the result list */

$config['show_id']= 1;
$config['show_periodo_escuela_id']= 1;
$config['show_horas_sin_usar']= 1;
$config['show_horas_sin_usar_restantes']= 1;
$config['show_created_at']= 1;
$config['show_updated_at']= 1;

/* Config params of pagination */

$config['pag_perpage']= 4;

/* Config flash messages */

$config['fondo_comun_flash_add_message']= 'The fondo_comun has been successfully added.';
$config['fondo_comun_flash_edit_message']= 'The fondo_comun has been successfully updated.';
$config['fondo_comun_flash_delete_message']= 'The fondo_comun has been successfully deleted';
$config['fondo_comun_flash_error_delete_message']= 'The fondo_comun hasn\'t been deletedd';
$config['fondo_comun_flash_error_message']= 'A database error has occured, please contact your administrator.';

/* End of file fondo_comun_settings.php */
/* Location: ./application/config/fondo_comun_settings.php */
