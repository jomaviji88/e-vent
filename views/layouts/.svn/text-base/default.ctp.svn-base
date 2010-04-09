<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta name="description" content="A collection of plugins and initialized Cakephp install common to most projects. Useful not only to help jumpstart a project, but also as a way to provide practical examples of working with various aspects of Cakephp.">
<?php echo $html->css('kitchen_web'); ?>
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon"/>
<link rel="icon" href="/favicon.ico" type="image/x-icon"/>
<title><?php echo $title_for_layout; ?></title>
</head>
<body>
<?php echo $this->element('admin_bar'); ?>
<div id="alert_messages">
<?php 
    if ($session->check('Message.flash')) {
		$session->flash();
	}
	if ($session->check('Message.auth')) {
		$session->flash('auth');
	}
?>
</div>
<div id="layout_head">
<?php echo $this->element('layout_head'); ?>
</div id="layout_head">
<div id="layout_content">
<?php echo $content_for_layout; ?>
</div>
<div style="clear:both;"></div>

</body>
</html>
