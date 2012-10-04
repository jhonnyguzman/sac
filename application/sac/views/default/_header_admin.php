<!DOCTYPE html> 
<html lang="es"> 
	<head> 
	<meta charset="utf-8" />
	<title>SAC - Sistema Administrativo Contable</title> 
	<link href="<?=base_url()?>assets/css/bootstrap.css" rel="stylesheet">
  <link href="<?=base_url()?>assets/css/general.css" rel="stylesheet">
  <link href="<?=base_url()?>assets/css/chosen/chosen.css" rel="stylesheet">
  <script src="<?=base_url()?>assets/js/jquery-1.8.2.min.js" type="text/javascript"></script>
  <script src="<?=base_url()?>assets/js/bootstrap.js"  type="text/javascript"></script>
  <script src="<?=base_url()?>assets/js/extras.js" type="text/javascript"></script>
  <script src="<?=base_url()?>assets/js/validate/jquery.validate.js"  type="text/javascript"></script>
  <script src="<?=base_url()?>assets/js/validate/custon-methods.js"  type="text/javascript"></script>
  <script src="<?=base_url()?>assets/js/validate/validaciones.js"  type="text/javascript"></script>
  <script src="<?=base_url()?>assets/js/chosen/chosen.jquery.min.js" type="text/javascript"></script>
</head> 

<body> 

  <div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
      <div class="container-fluid">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="#">SAC</a>
          <div class="nav-collapse subnav-collapse">
            <?=$this->basicauth->getMenu()?>
          </div>
          <div class="btn-group pull-right">
            <a class="btn btn-info dropdown-toggle" data-toggle="dropdown" href="#">
              <i class="icon-user"></i> <?=$this->session->userdata('username')?>
              <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
              <li><a href="#">Profile</a></li>
              <li class="divider"></li>
              <li><a href="<?=base_url()?>a/logout">Salir</a></li>
            </ul>
          </div>

      </div>
    </div>
  </div>


  <div class="container-fluid">
    <div class="row-fluid">
      <div class="span2"></div>
      <div class="span12">
      
 
		