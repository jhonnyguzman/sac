<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/* Config general titles */

$config['recordListTitle']=' Listado de Lineas de Acciones';
$config['recordAddTitle']=' Nuevo Lineas de Acciones';
$config['recordEditTitle']=' Editar Lineas de Acciones';
$config['accessTitle']='<div class="accessTitle"> No tienes permiso para realizar esta operaci&oacute;n </div>';

/* Config labels of the form fields */

$config['id']='Id';
$config['nombre']='Nombre';
$config['descripcion']='Descripci&oacute;n';
$config['habilitado']='Habilitado';
$config['ciclo']='Ciclo';
$config['ciclo_descripcion']='Ciclo';
$config['created_at']='Fecha de alta';
$config['updated_at']='Actualizado el';

/* Config fields for search */

$config['search_by_id']= 0;
$config['search_by_nombre']= 1;
$config['search_by_descripcion']= 1;
$config['search_by_habilitado']= 0;
$config['search_by_ciclo']= 0;
$config['search_by_created_at']= 0;
$config['search_by_updated_at']= 0;

/* Config fields for show in the result list */

$config['show_id']= 0;
$config['show_nombre']= 1;
$config['show_descripcion']= 1;
$config['show_habilitado']= 1;
$config['show_ciclo']= 1;
$config['show_ciclo_descripcion']= 1;
$config['show_created_at']= 0;
$config['show_updated_at']= 0;

/* Config params of pagination */

$config['pag_perpage']= 10;

/* Config flash messages */

$config['lineas_accion_flash_add_message']= 'Registro agregado correctamente.';
$config['lineas_accion_flash_edit_message']= 'Registro editado correctamente.';
$config['lineas_accion_flash_delete_message']= 'Registro eliminado correctamente';
$config['lineas_accion_flash_error_delete_message']= 'The lineas_accion hasn\'t been deletedd';
$config['lineas_accion_flash_error_message']= 'A database error has occured, please contact your administrator.';

/* End of file lineas_accion_settings.php */
/* Location: ./application/config/lineas_accion_settings.php */
