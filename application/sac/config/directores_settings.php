<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/* Config general titles */

$config['recordListTitle']=' Listado de directores';
$config['recordAddTitle']=' Nuevo director';
$config['recordEditTitle']=' Editar director';
$config['accessTitle']='<div class="accessTitle"> No tienes permiso para realizar esta operaci&oacute;n </div>';

/* Config labels of the form fields */

$config['id']='Id';
$config['dni']='D.N.I.';
$config['apellido']='Apellido';
$config['nombre']='Nombre';
$config['telefono']='Telefono';
$config['email']='Email';
$config['habilitado']='Habilitado';
$config['created_at']='Fecha de alta';
$config['updated_at']='Actualizado el';

/* Config fields for search */

$config['search_by_id']= 0;
$config['search_by_dni']= 1;
$config['search_by_apellido']= 1;
$config['search_by_nombre']= 1;
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

$config['directores_flash_add_message']= 'Registro agregado correctamente.';
$config['directores_flash_edit_message']= 'Registro editado correctamente.';
$config['directores_flash_delete_message']= 'Registro eliminado correctamente';
$config['directores_flash_error_delete_message']= 'The directores hasn\'t been deletedd';
$config['directores_flash_error_message']= 'A database error has occured, please contact your administrator.';

/* End of file directores_settings.php */
/* Location: ./application/config/directores_settings.php */
