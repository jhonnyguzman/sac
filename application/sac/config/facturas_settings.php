<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/* Config general titles */

$config['recordListTitle']=' Listado de facturas';
$config['recordAddTitle']=' Nueva factura';
$config['recordEditTitle']=' Editar factura';
$config['accessTitle']='<div class="accessTitle"> No tienes permiso para realizar esta operaci&oacute;n </div>';

/* Config labels of the form fields */

$config['id']='Id';
$config['nro_factura']='Nro';
$config['fecha']='Fecha';
$config['monto']='Monto';
$config['estado']='Estado';
$config['estado_descripcion']='Estado';
$config['observacion']='Observación';
$config['proveedor_id']='Proveedor';
$config['proveedor_razon_social']='Proveedor';
$config['created_at']='Fecha de alta';
$config['updated_at']='Actualizado el';

/* Config fields for search */

$config['search_by_id']= 0;
$config['search_by_nro_factura']= 1;
$config['search_by_fecha']= 0;
$config['search_by_monto']= 0;
$config['search_by_estado']= 0;
$config['search_by_observacion']= 0;
$config['search_by_proveedor_id']= 0;
$config['search_by_created_at']= 0;
$config['search_by_updated_at']= 0;

/* Config fields for show in the result list */

$config['show_id']= 1;
$config['show_nro_factura']= 1;
$config['show_fecha']= 1;
$config['show_monto']= 1;
$config['show_estado']= 1;
$config['show_observacion']= 1;
$config['show_proveedor_id']= 1;
$config['show_created_at']= 1;
$config['show_updated_at']= 1;

/* Config params of pagination */

$config['pag_perpage']= 4;

/* Config flash messages */

$config['facturas_flash_add_message']= 'The facturas has been successfully added.';
$config['facturas_flash_edit_message']= 'The facturas has been successfully updated.';
$config['facturas_flash_delete_message']= 'The facturas has been successfully deleted';
$config['facturas_flash_error_delete_message']= 'The facturas hasn\'t been deletedd';
$config['facturas_flash_error_message']= 'A database error has occured, please contact your administrator.';

/* End of file facturas_settings.php */
/* Location: ./application/config/facturas_settings.php */
