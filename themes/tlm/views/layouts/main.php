<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/web-app-theme/base.css" media="screen"/>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/web-app-theme/themes/default/style.css" media="screen"/>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/dc-mega-menu/black.css" />

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/tlm.css" media="screen"/>
	<?php if($this->route=='site/login' or $this->route=='user/login/login'):?><link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/login.css" media="screen"/><?php endif;?>
	<?php if(isset($this->module) and $this->module->getName()=='user'):?><link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/user-module.css" media="screen"/><?php endif;?>
	<?php if(isset($this->module) and $this->module->getName()=='rights'):?><link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/rights-module.css" media="screen"/><?php endif;?>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/override.css" media="screen"/>

	<script type='text/javascript' src='<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.hoverIntent.js'></script>
	<script type='text/javascript' src='<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.dcmegamenu.1.3.3.js'></script>
</head>

<body>

<div class="container">

	<div id="header">
		<h1><?php echo CHtml::encode(Yii::app()->name); ?></h1>
		<?php if(!Yii::app()->user->isGuest):?>
		<div id="user-navigation">
		<?php
		try {
			$this->renderPartial('//layouts/_userNavigation');
		}  catch(Exception $e) {
			// do nothing
		}
		?>
		</div>
		<?php endif;?>
		<div id="main-navigation">
		<?php
		try {
			$this->renderPartial('//layouts/_mainNavigation');
		}  catch(Exception $e) {
			// do nothing
		}
		?>
		</div>
	</div><!-- header -->

	<?php if(!Yii::app()->user->isGuest):?>
	<div class="black">
		<?php
		try {
			$this->renderPartial('//layouts/_extendedNavigation');
		}  catch(Exception $e) {
			// do nothing
		}
		?>
	</div>
	<?php endif;?>

	<div id="wrapper">
		<?php
			foreach(Yii::app()->user->getFlashes() as $key => $message) {
				echo '<div class="flash-' . $key . '">' . $message . "</div>\n";
			}
			echo $content;
		?>
	</div>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y').' '.Yii::app()->params['companyName']; ?><br/>
		All Rights Reserved.<br/>
		<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->
<?php
Yii::app()->clientScript->registerScript('convert-main-menu', "
	$('.black > ul').dcMegaMenu({
		rowItems: '3',
		speed: 0,
		effect: 'slide',
	});
");
	
Yii::app()->clientScript->registerScript('remove-blank-sidebar', "
	portletCount = $('.container #wrapper #sidebar .portlet').size();
	
	if(!portletCount) {
		sidebar = $('.container #wrapper #sidebar');
		if(sidebar.size()) {
			sidebar.remove();
		}
	}
");
	
Yii::app()->clientScript->registerScript('adjust-width', "
	wrapper = $('#wrapper');
	wOuter = wrapper.outerWidth() - wrapper.width();
	calculatedWidth = wOuter + $('#content').outerWidth() + $('#sidebar').outerWidth();
	defaultVal = $('body').width();
	if(calculatedWidth > defaultVal) {
		header = $('#header');
		hOuter = header.outerWidth() - header.width();
		header.width(calculatedWidth - hOuter);

		black = $('.black');
		bOuter = black.outerWidth() - black.width();
		black.width(calculatedWidth - bOuter);
	
		footer = $('#footer');
		fOuter = footer.outerWidth() - footer.width();
		footer.width(calculatedWidth - fOuter);
	}
");
?>
</body>
</html>
