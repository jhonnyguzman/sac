<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/* Config general titles */

$config['recordListTitle']=' Listado de escuelas';
$config['recordAddTitle']=' Nueva escuela';
$config['recordEditTitle']=' Editar escuela';
$config['accessTitle']='<div class="accessTitle"> No tienes permiso para realizar esta operaci&oacute;n </div>';

/* Config labels of the form fields */

$config['id']='Id';
$config['cue']='Cue';
$config['nombre']='Nombre';
$config['direccion']='Direcci&oacute;n';
$config['telefono']='Tel&eacute;fono';
$config['email']='Email';
$config['habilitado']='Habilitado';
$config['localidad_id']='localidad_id';
$config['localidad_nombre']='Localidad';
$config['director_id']='director_id';
$config['director_nombre']='Director';
$config['created_at']='Fecha de alta';
$config['updated_at']='Actualizado el';

/* Config fields for search */

$config['search_by_id']= 0;
$config['search_by_cue']= 0;
$config['search_by_nombre']= 1;
$config['search_by_direccion']= 0;
$config['search_by_telefono']= 0;
$config['search_by_email']= 0;
$config['search_by_habilitado']= 0;
$config['search_by_localidad_id']= 0;
$config['search_by_director_id']= 0;
$config['search_by_created_at']= 0;
$config['search_by_updated_at']= 0;

/* Config fields for show in the result list */

$config['show_id']= 1;
$config['show_cue']= 1;
$config['show_nombre']= 1;
$config['show_direccion']= 1;
$config['show_telefono']= 1;
$config['show_email']= 1;
$config['show_habilitado']= 1;
$config['show_localidad_id']= 1;
$config['show_localidad_nombre']= 1;
$config['show_director_id']= 1;
$config['show_director_nombre']= 1;
$config['show_created_at']= 1;
$config['show_updated_at']= 1;

/* Config params of pagination */

$config['pag_perpage']= 4;

/* Config flash messages */

$config['escuelas_flash_add_message']= 'The escuelas has been successfully added.';
$config['escuelas_flash_edit_message']= 'The escuelas has been successfully updated.';
$config['escuelas_flash_delete_message']= 'The escuelas has been successfully deleted';
$config['escuelas_flash_error_delete_message']= 'The escuelas hasn\'t been deletedd';
$config['escuelas_flash_error_message']= 'A database error has occured, please contact your administrator.';

/* End of file escuelas_settings.php */
/* Location: ./application/config/escuelas_settings.php */
