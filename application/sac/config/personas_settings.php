<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/* Config general titles */

$config['recordListTitle']=' Listado de personas';
$config['recordAddTitle']=' Nuevo persona';
$config['recordEditTitle']=' Editar persona';
$config['accessTitle']='<div class="accessTitle"> No tienes permiso para realizar esta operaci&oacute;n </div>';

/* Config labels of the form fields */

$config['id']='Id';
$config['dni']='D.N.I.';
$config['apellido']='Apellido';
$config['nombre']='Nombre';
$config['domicilio']='Domicilio';
$config['telefono']='Teléfono';
$config['celular']='Celular';
$config['email']='Email';
$config['habilitado']='Estado';
$config['created_at']='Fecha de alta';
$config['updated_at']='Actualizado el';

/* Config fields for search */

$config['search_by_id']= 1;
$config['search_by_dni']= 0;
$config['search_by_apellido']= 0;
$config['search_by_nombre']= 0;
$config['search_by_domicilio']= 0;
$config['search_by_telefono']= 0;
$config['search_by_celular']= 0;
$config['search_by_email']= 0;
$config['search_by_habilitado']= 0;
$config['search_by_created_at']= 0;
$config['search_by_updated_at']= 0;

/* Config fields for show in the result list */

$config['show_id']= 1;
$config['show_dni']= 1;
$config['show_apellido']= 1;
$config['show_nombre']= 1;
$config['show_domicilio']= 1;
$config['show_telefono']= 1;
$config['show_celular']= 1;
$config['show_email']= 1;
$config['show_habilitado']= 1;
$config['show_created_at']= 1;
$config['show_updated_at']= 1;

/* Config params of pagination */

$config['pag_perpage']= 4;

/* Config flash messages */

$config['personas_flash_add_message']= 'The personas has been successfully added.';
$config['personas_flash_edit_message']= 'The personas has been successfully updated.';
$config['personas_flash_delete_message']= 'The personas has been successfully deleted';
$config['personas_flash_error_delete_message']= 'The personas hasn\'t been deletedd';
$config['personas_flash_error_message']= 'A database error has occured, please contact your administrator.';

/* End of file personas_settings.php */
/* Location: ./application/config/personas_settings.php */
