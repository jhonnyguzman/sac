<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/* Config general titles */

$config['recordListTitle']=' Listado de perfiles de docentes';
$config['recordAddTitle']=' Nuevo perfil docente';
$config['recordEditTitle']=' Editar perfil docente';
$config['accessTitle']='<div class="accessTitle"> No tienes permiso para realizar esta operaci&oacute;n </div>';

/* Config labels of the form fields */

$config['id']='Id';
$config['nombre']='Nombre';
$config['descripcion']='Descripci&oacute;n';
$config['cantidad_hora']='Cantidad de horas';
$config['habilitado']='Habilitado';
$config['created_at']='Fecha de alta';
$config['updated_at']='Actualizado el';

/* Config fields for search */

$config['search_by_id']= 0;
$config['search_by_nombre']= 1;
$config['search_by_descripcion']= 0;
$config['search_by_cantidad_hora']= 0;
$config['search_by_habilitado']= 0;
$config['search_by_created_at']= 0;
$config['search_by_updated_at']= 0;

/* Config fields for show in the result list */

$config['show_id']= 1;
$config['show_nombre']= 1;
$config['show_descripcion']= 1;
$config['show_cantidad_hora']= 1;
$config['show_habilitado']= 1;
$config['show_created_at']= 1;
$config['show_updated_at']= 1;

/* Config params of pagination */

$config['pag_perpage']= 4;

/* Config flash messages */

$config['perfiles_flash_add_message']= 'The perfiles has been successfully added.';
$config['perfiles_flash_edit_message']= 'The perfiles has been successfully updated.';
$config['perfiles_flash_delete_message']= 'The perfiles has been successfully deleted';
$config['perfiles_flash_error_delete_message']= 'The perfiles hasn\'t been deletedd';
$config['perfiles_flash_error_message']= 'A database error has occured, please contact your administrator.';

/* End of file perfiles_settings.php */
/* Location: ./application/config/perfiles_settings.php */
