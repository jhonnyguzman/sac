<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/* Config general titles */

$config['recordListTitle']=' Listado de departamentos';
$config['recordAddTitle']=' Nuevo departamento';
$config['recordEditTitle']=' Editar departamento';
$config['accessTitle']='<div class="accessTitle"> No tienes permiso para realizar esta operaci&oacute;n </div>';

/* Config labels of the form fields */

$config['id']='Id';
$config['nombre']='Nombre';
$config['habilitado']='Habilitado';
$config['circuito_id']='Circuito Id';
$config['circuito_nombre']='Circuito';
$config['created_at']='Fecha de alta';
$config['updated_at']='Actualizado el';

/* Config fields for search */

$config['search_by_id']= 0;
$config['search_by_nombre']= 1;
$config['search_by_habilitado']= 0;
$config['search_by_circuito_id']= 0;
$config['search_by_created_at']= 0;
$config['search_by_updated_at']= 0;

/* Config fields for show in the result list */

$config['show_id']= 0;
$config['show_nombre']= 1;
$config['show_habilitado']= 1;
$config['show_circuito_id']= 1;
$config['show_created_at']= 0;
$config['show_updated_at']= 0;

/* Config params of pagination */

$config['pag_perpage']= 30;

/* Config flash messages */

$config['departamentos_flash_add_message']= 'Registro agregado correctamente.';
$config['departamentos_flash_edit_message']= 'Registro editado correctamente.';
$config['departamentos_flash_delete_message']= 'Registro eliminado correctamente';
$config['departamentos_flash_error_delete_message']= 'The departamentos hasn\'t been deletedd';
$config['departamentos_flash_error_message']= 'A database error has occured, please contact your administrator.';

/* End of file departamentos_settings.php */
/* Location: ./application/config/departamentos_settings.php */
