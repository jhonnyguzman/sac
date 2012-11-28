<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/* Config general titles */

$config['recordListTitle']=' Listado de proyectos';
$config['recordAddTitle']=' Nuevo proyecto';
$config['recordEditTitle']=' Editar proyecto';
$config['accessTitle']='<div class="accessTitle"> No tienes permiso para realizar esta operaci&oacute;n </div>';

/* Config labels of the form fields */

$config['id']='Id';
$config['nombre']='Nombre';
$config['descripcion']='Descripción';
$config['habilitado']='Estado';
$config['linea_id']='Linea';
$config['linea_nombre']='Linea';
$config['created_at']='Fecha de alta';
$config['updated_at']='Actualizado el';

/* Config fields for search */

$config['search_by_id']= 1;
$config['search_by_nombre']= 0;
$config['search_by_descripcion']= 0;
$config['search_by_habilitado']= 0;
$config['search_by_linea_id']= 0;
$config['search_by_created_at']= 0;
$config['search_by_updated_at']= 0;

/* Config fields for show in the result list */

$config['show_id']= 1;
$config['show_nombre']= 1;
$config['show_descripcion']= 1;
$config['show_habilitado']= 1;
$config['show_linea_id']= 1;
$config['show_created_at']= 1;
$config['show_updated_at']= 1;

/* Config params of pagination */

$config['pag_perpage']= 4;

/* Config flash messages */

$config['proyectos_flash_add_message']= 'The proyectos has been successfully added.';
$config['proyectos_flash_edit_message']= 'The proyectos has been successfully updated.';
$config['proyectos_flash_delete_message']= 'The proyectos has been successfully deleted';
$config['proyectos_flash_error_delete_message']= 'The proyectos hasn\'t been deletedd';
$config['proyectos_flash_error_message']= 'A database error has occured, please contact your administrator.';

/* End of file proyectos_settings.php */
/* Location: ./application/config/proyectos_settings.php */
