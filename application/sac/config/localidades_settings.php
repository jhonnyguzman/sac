<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/* Config general titles */

$config['recordListTitle']=' Listado de localidades';
$config['recordAddTitle']=' Nuevo localidad';
$config['recordEditTitle']=' Editar localidad';
$config['accessTitle']='<div class="accessTitle"> No tienes permiso para realizar esta operaci&oacute;n </div>';

/* Config labels of the form fields */

$config['id']='Id';
$config['nombre']='Nombre';
$config['habilitado']='Habilitado';
$config['departamento_id']='Departamento';
$config['departamento_nombre']='Departamento';
$config['created_at']='Fecha de alta';
$config['updated_at']='Actualizado el';

/* Config fields for search */

$config['search_by_id']= 0;
$config['search_by_nombre']= 1;
$config['search_by_habilitado']= 0;
$config['search_by_departamento_id']= 0;
$config['search_by_created_at']= 0;
$config['search_by_updated_at']= 0;

/* Config fields for show in the result list */

$config['show_id']= 0;
$config['show_nombre']= 1;
$config['show_habilitado']= 1;
$config['show_departamento_id']= 1;
$config['show_created_at']= 0;
$config['show_updated_at']= 0;

/* Config params of pagination */

$config['pag_perpage']= 30;

/* Config flash messages */

$config['localidades_flash_add_message']= 'Registro agregado correctamente.';
$config['localidades_flash_edit_message']= 'Registro editado correctamente.';
$config['localidades_flash_delete_message']= 'Registro eliminado correctamente';
$config['localidades_flash_error_delete_message']= 'The localidades hasn\'t been deletedd';
$config['localidades_flash_error_message']= 'A database error has occured, please contact your administrator.';

/* End of file localidades_settings.php */
/* Location: ./application/config/localidades_settings.php */
