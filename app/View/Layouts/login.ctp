<!DOCTYPE html>
<head>

<title>
<?php 
	if($title_for_layout!='')
		echo $title_for_layout.' | ';

 	echo $settings_var['app_name'];
?>
</title>

<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />

<style type="text/css" media="all">
	@import url("<?php echo $settings_var['base_url'];?>/css/login.css");
</style>
<script type="text/javascript" src="<?php echo Router::url('/',true);?>/js/jquery-1.9.1.min.js"></script>
<!--<script type="text/javascript" src="/js/chatJs/firebug-lite/content/firebug-lite-dev.js"></script>-->
</head>

<body>

<?php
	//pr($settings_var);
?>
	<div id="container">

		<?php
			//if($settings_var['logo_file']!=''):
		?>
		<div class="logoBox">
			<img src="<?php echo Router::url('/',true);?>/img/<?php //echo $settings_var['logo_file'];?>" alt="<?php //echo $settings_var['app_name'];?>" />
		</div>
		<?php
			//else:
		?>	
		<p id="hal"><?php //echo $settings_var['app_name'];?></p>
		<?php
			//endif;			
		?>

		<div style="padding: 15px; font-size: 12px">
		<?php
		    $authflash = $this->Session->flash('auth');
		    if($authflash)
		    	echo $authflash;
		    elseif($flash=$this->Session->flash())	
		    	echo $flash;
		?>		
		</div>	
		
	      	<?php echo $content_for_layout;?>
    </div>
</body>
</html>