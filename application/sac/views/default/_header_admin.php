<!DOCTYPE html> 
<html> 
	<head> 
	<meta charset="utf-8" />
	<title>SAC - Sistema Administrativo Contable</title> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="<?=base_url()?>assets/css/bootstrap.css" rel="stylesheet">
  <link href="<?=base_url()?>assets/css/template.css" rel="stylesheet">
  <link href="<?=base_url()?>assets/css/menu.css" rel="stylesheet">
  <link href="<?=base_url()?>assets/css/validacion.css" rel="stylesheet">
  <link href="<?=base_url()?>assets/css/general.css" rel="stylesheet">
  <link href="<?=base_url()?>assets/css/chosen/chosen.css" rel="stylesheet">
  <!--[if IE 9]>
      <link rel="stylesheet" media="screen" href="css/ie9.css"/>
  <![endif]-->

  <!--[if IE 8]>
      <link rel="stylesheet" media="screen" href="css/ie8.css"/>
  <![endif]-->

  <!--[if IE 7]>
      <link rel="stylesheet" media="screen" href="css/ie7.css"/>
  <![endif]-->


	<link href="<?=base_url()?>assets/css/bootstrap-responsive.css" rel="stylesheet">

      <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?=base_url()?>assets/js/jquery.js"></script>
    <script src="<?=base_url()?>assets/js/bootstrap-transition.js"></script>
    <script src="<?=base_url()?>assets/js/bootstrap-alert.js"></script>
    <script src="<?=base_url()?>assets/js/bootstrap-dropdown.js"></script>
    <script src="<?=base_url()?>assets/js/bootstrap-scrollspy.js"></script>
    <script src="<?=base_url()?>assets/js/bootstrap-tab.js"></script>
    <script src="<?=base_url()?>assets/js/bootstrap-popover.js"></script>
    <script src="<?=base_url()?>assets/js/bootstrap-modal.js"></script>
    <script src="<?=base_url()?>assets/js/bootstrap-button.js"></script>
    <script src="<?=base_url()?>assets/js/bootstrap-collapse.js"></script>
    <script src="<?=base_url()?>assets/js/bootstrap-modal.js"></script>
    <script src="<?=base_url()?>assets/js/extras.js"></script>
    <script src="<?=base_url()?>assets/js/chosen/chosen.jquery.min.js"></script>

    <script type="text/javascript" src="<?=base_url()?>assets/js/template/plugins/jquery-1.7.min.js"></script>
    <script type="text/javascript" src="<?=base_url()?>assets/js/template/plugins/jquery-ui-1.8.16.custom.min.js"></script>
    <script type="text/javascript" src="<?=base_url()?>assets/js/template/plugins/jquery.validate.min.js"></script>
    <script type="text/javascript" src="<?=base_url()?>assets/js/template/custom/general.js"></script>
    <script type="text/javascript" src="<?=base_url()?>assets/js/template/custom/form.js"></script>
    <script type="text/javascript" src="<?=base_url()?>assets/js/validacion.js"></script>
    <!--[if lt IE 9]>
      <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <![endif]-->
</head> 

<body class="loggedin"> 

<!-- START OF HEADER -->
  <div class="header radius3">
      <div class="headerinner">
            <a href="<?=base_url()?>admin"><img src="<?=base_url()?>assets/img/login/logo_dos.png" alt="" /></a>
            <div class="headright">
                <div id="userPanel" class="headercolumn">
                    <a href="<?=base_url()?>admin" class="btn boton_dashboard">
                        <img src="<?=base_url()?>assets/img/template/dashboard.png" alt="" class="" />
                        <span><strong>Dashboard</strong></span>
                    </a>
                    <a href="" class="userinfo radius2">
                        <img src="<?=base_url()?>assets/img/template/avatar.png" alt="" class="radius2" />
                        <span><strong><?=$this->session->userdata('username')?></strong></span>
                    </a>
                    <div class="userdrop">
                        <ul>
                          <li><a href="#">Profile</a></li>
                          <li><a href="<?=base_url()?>a/logout">Salir</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div id="cssmenu"><?=$this->basicauth->getMenu()?></div>
        </div>
  </div>


  <div class="mainwrapper">
    <div class="mainwrapperinner">
      <div class="maincontent noright">
        <div class="maincontentinner">                


          
 
		