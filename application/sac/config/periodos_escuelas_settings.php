<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/* Config general titles */

$config['recordListTitle']=' Listado de periodos_escuelas';
$config['recordAddTitle']=' Nuevo periodos_escuelas';
$config['recordEditTitle']=' Editar periodos_escuelas';
$config['accessTitle']='<div class="accessTitle"> No tienes permiso para realizar esta operaci&oacute;n </div>';

/* Config labels of the form fields */

$config['id']='id';
$config['periodo_id']='periodo_id';
$config['escuelas_id']='escuelas_id';
$config['matricula']='matricula';
$config['resolucion']='resolucion';
$config['cantidad_horas']='cantidad_horas';
$config['created_at']='created_at';
$config['updated_at']='updated_at';

/* Config fields for search */

$config['search_by_id']= 1;
$config['search_by_periodo_id']= 0;
$config['search_by_escuelas_id']= 0;
$config['search_by_matricula']= 0;
$config['search_by_resolucion']= 0;
$config['search_by_cantidad_horas']= 0;
$config['search_by_created_at']= 0;
$config['search_by_updated_at']= 0;

/* Config fields for show in the result list */

$config['show_id']= 1;
$config['show_periodo_id']= 1;
$config['show_escuelas_id']= 1;
$config['show_matricula']= 1;
$config['show_resolucion']= 1;
$config['show_cantidad_horas']= 1;
$config['show_created_at']= 1;
$config['show_updated_at']= 1;

/* Config params of pagination */

$config['pag_perpage']= 4;

/* Config flash messages */

$config['periodos_escuelas_flash_add_message']= 'The periodos_escuelas has been successfully added.';
$config['periodos_escuelas_flash_edit_message']= 'The periodos_escuelas has been successfully updated.';
$config['periodos_escuelas_flash_delete_message']= 'The periodos_escuelas has been successfully deleted';
$config['periodos_escuelas_flash_error_delete_message']= 'The periodos_escuelas hasn\'t been deletedd';
$config['periodos_escuelas_flash_error_message']= 'A database error has occured, please contact your administrator.';

/* End of file periodos_escuelas_settings.php */
/* Location: ./application/config/periodos_escuelas_settings.php */
