<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/* Config general titles */

$config['recordListTitle']=' Listado de ejes';
$config['recordAddTitle']=' Nuevo ejes';
$config['recordEditTitle']=' Editar ejes';
$config['accessTitle']='<div class="accessTitle"> No tienes permiso para realizar esta operaci&oacute;n </div>';

/* Config labels of the form fields */

$config['id']='id';
$config['nombre']='nombre';
$config['descripcion']='descripcion';
$config['habilitado']='habilitado';
$config['created_at']='created_at';
$config['updated_at']='updated_at';

/* Config fields for search */

$config['search_by_id']= 1;
$config['search_by_nombre']= 0;
$config['search_by_descripcion']= 0;
$config['search_by_habilitado']= 0;
$config['search_by_created_at']= 0;
$config['search_by_updated_at']= 0;

/* Config fields for show in the result list */

$config['show_id']= 1;
$config['show_nombre']= 1;
$config['show_descripcion']= 1;
$config['show_habilitado']= 1;
$config['show_created_at']= 1;
$config['show_updated_at']= 1;

/* Config params of pagination */

$config['pag_perpage']= 4;

/* Config flash messages */

$config['ejes_flash_add_message']= 'The ejes has been successfully added.';
$config['ejes_flash_edit_message']= 'The ejes has been successfully updated.';
$config['ejes_flash_delete_message']= 'The ejes has been successfully deleted';
$config['ejes_flash_error_delete_message']= 'The ejes hasn\'t been deletedd';
$config['ejes_flash_error_message']= 'A database error has occured, please contact your administrator.';

/* End of file ejes_settings.php */
/* Location: ./application/config/ejes_settings.php */
