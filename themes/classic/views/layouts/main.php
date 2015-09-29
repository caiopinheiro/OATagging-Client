<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/themes/classic/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/themes/classic/css/style.css" />
        
        <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . "/js/jquery.js"); ?>     
        <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . "/js/bootstrap.min.js",CClientScript::POS_END); ?>     
        
<!--	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />-->

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
<!--<div class="container-principal">-->
<!--<div class="container" id="page">-->

	<div id="header">
        <nav class="navbar navbar-inverse-header navbar-fixed-top" role="navigation">
            <div class="container-principal">
                <div class="navbar-header">
                    <span class="navbar-brand">OAT_LOGO</span>
                    <a class="navbar-brand item-nav" href="<?php echo Yii::app()->baseUrl; ?>/">Home</a>
                </div>
                <div class="navbar-header navbar-right">
                    <?php if((Yii::app()->controller->id == 'avaliacoes' || Yii::app()->controller->id == 'administrador' )&& Yii::app()->user->getState('email') && (Yii::app()->user->getState('validacao') == 1)){ ?>
                        <a class="btn btn-nav" id="btn-login" onclick="window.location = 'index.php?r=acesso/logout';">Logout</a>
                    <?php } ?> 
                    <?php if(Yii::app()->controller->id == 'site' && Yii::app()->user->getState('email') && (Yii::app()->user->getState('tipo_user') == 2) && (Yii::app()->user->getState('validacao') == 1) ) {?>
                        <span class="navbar-brand"><?php echo Yii::app()->user->getState('nome') ?></span>
                        <a class="btn btn-nav" id="btn-login" onclick="window.location = 'index.php?r=avaliacoes';">Avaliação</a>
                    <?php } else if(Yii::app()->controller->id == 'site' && Yii::app()->user->getState('email') && (Yii::app()->user->getState('tipo_user') == 1) && (Yii::app()->user->getState('validacao') == 1) ) {?>
                        <span class="navbar-brand"><?php echo Yii::app()->user->getState('nome') ?></span>
                        <a class="btn btn-nav" id="btn-login" onclick="window.location = 'index.php?r=administrador';">Administração</a>
                    <?php } ?>    
                </div>
            </div>
        </nav>
    </div><!-- header -->
    <div class="container">
	<?php echo $content; ?>
    </div>    
	<div class="clear"></div>

	<div class="footer">
            <p>OAT - Online Assistive Tagging</p>
        </div>
        
        <!--div class="footer">
		Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
		All Rights Reserved.<br/>
		<?php// echo Yii::powered(); ?>
	</div--><!-- footer -->

<!--</div> page -->
<!--</div>-->
</body>
</html>
