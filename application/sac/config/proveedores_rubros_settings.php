<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/* Config general titles */

$config['recordListTitle']=' Listado de proveedores_rubros';
$config['recordAddTitle']=' Nuevo proveedores_rubros';
$config['recordEditTitle']=' Editar proveedores_rubros';
$config['accessTitle']='<div class="accessTitle"> No tienes permiso para realizar esta operaci&oacute;n </div>';

/* Config labels of the form fields */

$config['id']='Id';
$config['proveedor_id']='Proveedor';
$config['proveedor_razon_social']='Proveedor';
$config['rubro_id']='Rubro';
$config['rubro_nombre']='Rubro';
$config['created_at']='Fecha de alta';
$config['updated_at']='Actualizado el';

/* Config fields for search */

$config['search_by_id']= 1;
$config['search_by_proveedor_id']= 0;
$config['search_by_rubro_id']= 0;
$config['search_by_created_at']= 0;
$config['search_by_updated_at']= 0;

/* Config fields for show in the result list */

$config['show_id']= 1;
$config['show_proveedor_id']= 1;
$config['show_rubro_id']= 1;
$config['show_created_at']= 1;
$config['show_updated_at']= 1;

/* Config params of pagination */

$config['pag_perpage']= 4;

/* Config flash messages */

$config['proveedores_rubros_flash_add_message']= 'The proveedores_rubros has been successfully added.';
$config['proveedores_rubros_flash_edit_message']= 'The proveedores_rubros has been successfully updated.';
$config['proveedores_rubros_flash_delete_message']= 'The proveedores_rubros has been successfully deleted';
$config['proveedores_rubros_flash_error_delete_message']= 'The proveedores_rubros hasn\'t been deletedd';
$config['proveedores_rubros_flash_error_message']= 'A database error has occured, please contact your administrator.';

/* End of file proveedores_rubros_settings.php */
/* Location: ./application/config/proveedores_rubros_settings.php */
