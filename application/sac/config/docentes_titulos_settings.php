<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/* Config general titles */

$config['recordListTitle']=' Listado de docentes_titulos';
$config['recordAddTitle']=' Nuevo docentes_titulos';
$config['recordEditTitle']=' Editar docentes_titulos';
$config['accessTitle']='<div class="accessTitle"> No tienes permiso para realizar esta operaci&oacute;n </div>';

/* Config labels of the form fields */

$config['id']='Id';
$config['docente_id']='Docente';
$config['titulo_id']='Titulo';
$config['created_at']='Fecha de alta';
$config['updated_at']='Actuzalizado el';

/* Config fields for search */

$config['search_by_id']= 1;
$config['search_by_docente_id']= 0;
$config['search_by_titulo_id']= 0;
$config['search_by_created_at']= 0;
$config['search_by_updated_at']= 0;

/* Config fields for show in the result list */

$config['show_id']= 1;
$config['show_docente_id']= 1;
$config['show_titulo_id']= 1;
$config['show_created_at']= 1;
$config['show_updated_at']= 1;

/* Config params of pagination */

$config['pag_perpage']= 4;

/* Config flash messages */

$config['docentes_titulos_flash_add_message']= 'The docentes_titulos has been successfully added.';
$config['docentes_titulos_flash_edit_message']= 'The docentes_titulos has been successfully updated.';
$config['docentes_titulos_flash_delete_message']= 'The docentes_titulos has been successfully deleted';
$config['docentes_titulos_flash_error_delete_message']= 'The docentes_titulos hasn\'t been deletedd';
$config['docentes_titulos_flash_error_message']= 'A database error has occured, please contact your administrator.';

/* End of file docentes_titulos_settings.php */
/* Location: ./application/config/docentes_titulos_settings.php */
