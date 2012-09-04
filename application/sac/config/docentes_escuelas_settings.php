<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/* Config general titles */

$config['recordListTitle']=' Listado de docentes_escuelas';
$config['recordAddTitle']=' Nuevo docentes_escuelas';
$config['recordEditTitle']=' Editar docentes_escuelas';
$config['accessTitle']='<div class="accessTitle"> No tienes permiso para realizar esta operaci&oacute;n </div>';

/* Config labels of the form fields */

$config['id']='id';
$config['docente_perfil_id']='docente_perfil_id';
$config['escuela_id']='escuela_id';
$config['created_at']='created_at';
$config['updated_at']='updated_at';

/* Config fields for search */

$config['search_by_id']= 1;
$config['search_by_docente_perfil_id']= 0;
$config['search_by_escuela_id']= 0;
$config['search_by_created_at']= 0;
$config['search_by_updated_at']= 0;

/* Config fields for show in the result list */

$config['show_id']= 1;
$config['show_docente_perfil_id']= 1;
$config['show_escuela_id']= 1;
$config['show_created_at']= 1;
$config['show_updated_at']= 1;

/* Config params of pagination */

$config['pag_perpage']= 10;

/* Config flash messages */

$config['docentes_escuelas_flash_add_message']= 'Registro agregado correctamente.';
$config['docentes_escuelas_flash_edit_message']= 'Registro editado correctamente.';
$config['docentes_escuelas_flash_delete_message']= 'Registro eliminado correctamente';
$config['docentes_escuelas_flash_error_delete_message']= 'The docentes_escuelas hasn\'t been deletedd';
$config['docentes_escuelas_flash_error_message']= 'A database error has occured, please contact your administrator.';

/* End of file docentes_escuelas_settings.php */
/* Location: ./application/config/docentes_escuelas_settings.php */
