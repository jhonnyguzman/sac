<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/* Config general titles */

$config['recordListTitle']=' Listado de docentes_perfiles';
$config['recordAddTitle']=' Nuevo docentes_perfiles';
$config['recordEditTitle']=' Editar docentes_perfiles';
$config['accessTitle']='<div class="accessTitle"> No tienes permiso para realizar esta operaci&oacute;n </div>';

/* Config labels of the form fields */

$config['id']='Id';
$config['docente_id']='Docente escuela id';
$config['docente_apellido']='Docente';
$config['docente_nombre']='Docente';
$config['perfil_id']='Perfil';
$config['perfil_nombre']='Perfil';
$config['created_at']='Fecha de alta';
$config['updated_at']='Actualizado el';

/* Config fields for search */

$config['search_by_id']= 1;
$config['search_by_docente_id']= 0;
$config['search_by_perfil_id']= 0;
$config['search_by_created_at']= 0;
$config['search_by_updated_at']= 0;

/* Config fields for show in the result list */

$config['show_id']= 1;
$config['show_docente_id']= 1;
$config['show_docente_apellido']= 1;
$config['show_docente_nombre']= 1;
$config['show_perfil_id']= 1;
$config['show_perfil_nombre']= 1;
$config['show_created_at']= 1;
$config['show_updated_at']= 1;

/* Config params of pagination */

$config['pag_perpage']= 10;

/* Config flash messages */

$config['docentes_perfiles_flash_add_message']= 'Registro agregado correctamente.';
$config['docentes_perfiles_flash_edit_message']= 'Registro editado correctamente.';
$config['docentes_perfiles_flash_delete_message']= 'Registro eliminado correctamente';
$config['docentes_perfiles_flash_error_delete_message']= 'The docentes_perfiles hasn\'t been deletedd';
$config['docentes_perfiles_flash_error_message']= 'A database error has occured, please contact your administrator.';

/* End of file docentes_perfiles_settings.php */
/* Location: ./application/config/docentes_perfiles_settings.php */
