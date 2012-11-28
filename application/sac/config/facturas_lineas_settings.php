<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/* Config general titles */

$config['recordListTitle']=' Listado de facturas_lineas';
$config['recordAddTitle']=' Nuevo facturas_lineas';
$config['recordEditTitle']=' Editar facturas_lineas';
$config['accessTitle']='<div class="accessTitle"> No tienes permiso para realizar esta operaci&oacute;n </div>';

/* Config labels of the form fields */

$config['id']='id';
$config['concepto']='concepto';
$config['costo']='costo';
$config['cantidad']='cantidad';
$config['subtotal']='subtotal';
$config['factura_id']='factura_id';
$config['created_at']='created_at';
$config['updated_at']='updated_at';

/* Config fields for search */

$config['search_by_id']= 1;
$config['search_by_concepto']= 0;
$config['search_by_costo']= 0;
$config['search_by_cantidad']= 0;
$config['search_by_subtotal']= 0;
$config['search_by_factura_id']= 0;
$config['search_by_created_at']= 0;
$config['search_by_updated_at']= 0;

/* Config fields for show in the result list */

$config['show_id']= 1;
$config['show_concepto']= 1;
$config['show_costo']= 1;
$config['show_cantidad']= 1;
$config['show_subtotal']= 1;
$config['show_factura_id']= 1;
$config['show_created_at']= 1;
$config['show_updated_at']= 1;

/* Config params of pagination */

$config['pag_perpage']= 4;

/* Config flash messages */

$config['facturas_lineas_flash_add_message']= 'The facturas_lineas has been successfully added.';
$config['facturas_lineas_flash_edit_message']= 'The facturas_lineas has been successfully updated.';
$config['facturas_lineas_flash_delete_message']= 'The facturas_lineas has been successfully deleted';
$config['facturas_lineas_flash_error_delete_message']= 'The facturas_lineas hasn\'t been deletedd';
$config['facturas_lineas_flash_error_message']= 'A database error has occured, please contact your administrator.';

/* End of file facturas_lineas_settings.php */
/* Location: ./application/config/facturas_lineas_settings.php */
