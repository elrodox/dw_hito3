<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
	<!--<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />-->
	<!--<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />-->
	<!--[if lt IE 8]>
	<!--<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />-->
	<!--<![endif]-->
	<!--<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />-->
	<!--<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />-->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/hito1.css" />
	

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container">

	<div class="page-header">
		<h1><?php echo CHtml::encode(Yii::app()->name); ?></h1>
	</div>
	<ul class="nav nav-tabs">
		<li role="presentation" class="active"><a href="?r=persona/index">Inicio</a></li>
		<li role="presentation"><a href="?r=persona/gestion">Gestion Personas</a></li>
	</ul>
	
	
	<div id="contenido" class="row">
		<?php echo $content; ?>
	</div>
	<br><hr />
	<div class="clear"></div>
	<div id="footer" class="row text-center">
		Copyright &copy; <?php echo date('Y'); ?> by Fisfor.<br/>
		All Rights Reserved.<br/>
		
	</div><!-- footer -->

</div><!-- page -->

<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-2.1.1.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-ui.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/main.js"></script>
</body>
</html>
