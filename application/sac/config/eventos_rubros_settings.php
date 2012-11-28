<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/* Config general titles */

$config['recordListTitle']=' Listado de eventos_rubros';
$config['recordAddTitle']=' Nuevo eventos_rubros';
$config['recordEditTitle']=' Editar eventos_rubros';
$config['accessTitle']='<div class="accessTitle"> No tienes permiso para realizar esta operaci&oacute;n </div>';

/* Config labels of the form fields */

$config['id']='Id';
$config['evento_id']='Evento';
$config['evento_nombre']='Evento';
$config['rubro_id']='Rubro';
$config['rubro_nombre']='Rubro';
$config['created_at']='Fecha de alta';
$config['updated_at']='Actualizado el';

/* Config fields for search */

$config['search_by_id']= 1;
$config['search_by_evento_id']= 1;
$config['search_by_rubro_id']= 1;
$config['search_by_created_at']= 0;
$config['search_by_updated_at']= 0;

/* Config fields for show in the result list */

$config['show_id']= 1;
$config['show_evento_id']= 1;
$config['show_rubro_id']= 1;
$config['show_created_at']= 1;
$config['show_updated_at']= 1;

/* Config params of pagination */

$config['pag_perpage']= 4;

/* Config flash messages */

$config['eventos_rubros_flash_add_message']= 'The eventos_rubros has been successfully added.';
$config['eventos_rubros_flash_edit_message']= 'The eventos_rubros has been successfully updated.';
$config['eventos_rubros_flash_delete_message']= 'The eventos_rubros has been successfully deleted';
$config['eventos_rubros_flash_error_delete_message']= 'The eventos_rubros hasn\'t been deletedd';
$config['eventos_rubros_flash_error_message']= 'A database error has occured, please contact your administrator.';

/* End of file eventos_rubros_settings.php */
/* Location: ./application/config/eventos_rubros_settings.php */
