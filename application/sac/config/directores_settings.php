<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/* Config general titles */

$config['recordListTitle']=' Listado de directores';
$config['recordAddTitle']=' Nuevo directores';
$config['recordEditTitle']=' Editar directores';
$config['accessTitle']='<div class="accessTitle"> No tienes permiso para realizar esta operaci&oacute;n </div>';

/* Config labels of the form fields */

$config['id']='id';
$config['dni']='dni';
$config['apellido']='apellido';
$config['nombre']='nombre';
$config['telefono']='telefono';
$config['email']='email';
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
$config['show_habilitado']= 0;
$config['show_created_at']= 0;
$config['show_updated_at']= 0;

/* Config params of pagination */

$config['pag_perpage']= 10;

/* Config flash messages */

$config['directores_flash_add_message']= 'The directores has been successfully added.';
$config['directores_flash_edit_message']= 'The directores has been successfully updated.';
$config['directores_flash_delete_message']= 'The directores has been successfully deleted';
$config['directores_flash_error_delete_message']= 'The directores hasn\'t been deletedd';
$config['directores_flash_error_message']= 'A database error has occured, please contact your administrator.';

/* End of file directores_settings.php */
/* Location: ./application/config/directores_settings.php */
