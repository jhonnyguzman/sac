<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/* Config general titles */

$config['recordListTitle']=' Listado de docentes';
$config['recordAddTitle']=' Nuevo docentes';
$config['recordEditTitle']=' Editar docentes';
$config['accessTitle']='<div class="accessTitle"> No tienes permiso para realizar esta operaci&oacute;n </div>';

/* Config labels of the form fields */

$config['id']='id';
$config['dni']='dni';
$config['apellido']='apellido';
$config['nombre']='nombre';
$config['telefono']='telefono';
$config['email']='email';
$config['titulo']='titulo';
$config['habilitado']='habilitado';
$config['created_at']='created_at';
$config['updated_at']='updated_at';

/* Config fields for search */

$config['search_by_id']= 1;
$config['search_by_dni']= 0;
$config['search_by_apellido']= 0;
$config['search_by_nombre']= 0;
$config['search_by_telefono']= 0;
$config['search_by_email']= 0;
$config['search_by_titulo']= 0;
$config['search_by_habilitado']= 0;
$config['search_by_created_at']= 0;
$config['search_by_updated_at']= 0;

/* Config fields for show in the result list */

$config['show_id']= 1;
$config['show_dni']= 1;
$config['show_apellido']= 1;
$config['show_nombre']= 1;
$config['show_telefono']= 1;
$config['show_email']= 1;
$config['show_titulo']= 1;
$config['show_habilitado']= 1;
$config['show_created_at']= 1;
$config['show_updated_at']= 1;

/* Config params of pagination */

$config['pag_perpage']= 4;

/* Config flash messages */

$config['docentes_flash_add_message']= 'The docentes has been successfully added.';
$config['docentes_flash_edit_message']= 'The docentes has been successfully updated.';
$config['docentes_flash_delete_message']= 'The docentes has been successfully deleted';
$config['docentes_flash_error_delete_message']= 'The docentes hasn\'t been deletedd';
$config['docentes_flash_error_message']= 'A database error has occured, please contact your administrator.';

/* End of file docentes_settings.php */
/* Location: ./application/config/docentes_settings.php */
