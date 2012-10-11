<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Excel  
    {
       
        
        function __construct()
        {
            // PHPExcel libraries have to be in your include path !
            require_once('PHPExcel.php');
            require_once('PHPExcel/IOFactory.php');
        }
        
       
    } 