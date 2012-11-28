<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/* Config general titles */

$config['recordListTitle']=' Listado de proyectos_personas';
$config['recordAddTitle']=' Nuevo proyectos_personas';
$config['recordEditTitle']=' Editar proyectos_personas';
$config['accessTitle']='<div class="accessTitle"> No tienes permiso para realizar esta operaci&oacute;n </div>';

/* Config labels of the form fields */

$config['id']='Id';
$config['proyecto_id']='Proyecto';
$config['proyecto_nombre']='Proyecto';
$config['persona_id']='Persona';
$config['persona_apellido']='Persona';
$config['persona_nombre']='Persona';
$config['created_at']='Fecha de alta';
$config['updated_at']='Actualizado el';

/* Config fields for search */

$config['search_by_id']= 1;
$config['search_by_proyecto_id']= 0;
$config['search_by_persona_id']= 0;
$config['search_by_created_at']= 0;
$config['search_by_updated_at']= 0;

/* Config fields for show in the result list */

$config['show_id']= 1;
$config['show_proyecto_id']= 1;
$config['show_persona_id']= 1;
$config['show_created_at']= 1;
$config['show_updated_at']= 1;

/* Config params of pagination */

$config['pag_perpage']= 4;

/* Config flash messages */

$config['proyectos_personas_flash_add_message']= 'The proyectos_personas has been successfully added.';
$config['proyectos_personas_flash_edit_message']= 'The proyectos_personas has been successfully updated.';
$config['proyectos_personas_flash_delete_message']= 'The proyectos_personas has been successfully deleted';
$config['proyectos_personas_flash_error_delete_message']= 'The proyectos_personas hasn\'t been deletedd';
$config['proyectos_personas_flash_error_message']= 'A database error has occured, please contact your administrator.';

$config['proyectos_personas_flash_error_message_01']= 'No existen personas cargadas en el sistema.';


/* End of file proyectos_personas_settings.php */
/* Location: ./application/config/proyectos_personas_settings.php */
