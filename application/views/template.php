<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?php echo (($title) ? $title . " | " : "") . "Dashboard"; ?></title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <script src="<?php echo base_url('js/jquery-1.7.1.min.js'); ?>"></script>
    <script src="<?php echo base_url('js/global.js'); ?>"></script>
    <link href="<?php echo base_url('bootstrap/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('global.css'); ?>" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 60px;
      }
    </style>

    <link rel="shortcut icon" href="images/favicon.ico">
  </head>

  <body>

    <div class="topbar">
      <div class="topbar-inner">
        <div class="container-fluid">
          <a class="brand" href="<?php echo base_url('/'); ?>">Global Dashboard</a>
          <ul class="nav">
            <li class="active"><a href="<?php echo base_url('/nagios'); ?>">Nagios</a></li>
            <li><a href="<?php echo base_url('/irods'); ?>">iRODS</a></li>
            <!--
	    <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
		-->
          </ul>
          <p class="pull-right">Logged in as <a href="#">username</a></p>
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="sidebar">
          <!--
	  <h5>Sidebar</h5>
          <ul>
            <li><a href="#">Link</a></li>
            <li><a href="#">Link</a></li>
            <li><a href="#">Link</a></li>
            <li><a href="#">Link</a></li>
          </ul>
          <h5>Sidebar</h5>
          <ul>
            <li><a href="#">Link</a></li>
            <li><a href="#">Link</a></li>
            <li><a href="#">Link</a></li>
            <li><a href="#">Link</a></li>
            <li><a href="#">Link</a></li>
            <li><a href="#">Link</a></li>
          </ul>
          <h5>Sidebar</h5>
          <ul>
            <li><a href="#">Link</a></li>
            <li><a href="#">Link</a></li>
          </ul>
	  -->
	  <?php echo $sidebar ?>
      </div>
      <div class="content">
	<h1><?php echo $title; ?></h1>	
<?php echo $content ?>
        <footer>
          <p>&copy; Company 2012</p>
        </footer>
      </div>
    </div>

  </body>
</html>
