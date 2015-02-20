<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>后台登录</title>

<link rel="stylesheet" href="__PUBLIC__/Css/admin/reset.css" type="text/css" media="screen" />
<!-- Main Stylesheet -->
<link rel="stylesheet" href="__PUBLIC__/Css/admin/style.css" type="text/css" media="screen" />
<!-- Invalid Stylesheet. This makes stuff look pretty. Remove it if you want the CSS completely valid -->
<link rel="stylesheet" href="__PUBLIC__/Css/admin/invalid.css" type="text/css" media="screen" />

<script type="text/javascript" src="__PUBLIC__/Js/admin/jquery-1.3.2.min.js"></script>
<!-- jQuery Configuration -->
<script type="text/javascript" src="__PUBLIC__/Js/admin/simpla.jquery.configuration.js"></script>
<!-- Facebox jQuery Plugin -->
<script type="text/javascript" src="__PUBLIC__/Js/admin/facebox.js"></script>
<!-- jQuery WYSIWYG Plugin -->
<script type="text/javascript" src="__PUBLIC__/Js/admin/jquery.wysiwyg.js"></script>
<!-- my jquery code -->
<script type="text/javascript" src="__PUBLIC__/Js/admin/others.js"></script>

</head>
  
<body id="login">
	
	<div id="login-wrapper" class="png_bg">
		<div id="login-top">
			<h1>Simpla Admin</h1>
			<!-- Logo (221px width) -->
			<img id="logo" src="__PUBLIC__/Images/admin/logo.png" alt="Simpla Admin logo" />
		</div> <!-- End #logn-top -->
		
		<div id="login-content">			
			<form action="__URL__/login" method="POST">				
				<p>
					<label for="user-name">Username</label>
					<input class="text-input" type="text" id="user-name" name="user-name"/>
				</p>
				<div class="clear"></div>
				<p>
					<label for="password">Password</label>
					<input class="text-input" type="password" id="password" name="password"/>
				</p>
				<div class="clear"></div>
				<!--<p id="remember-password">
					<input type="checkbox" />Remember me
				</p>
				<div class="clear"></div>-->
				<p>
					<input id="login-button" class="button" type="submit" value="Sign In" />
				</p>				
			</form>
		</div> <!-- End #login-content -->	
	</div> <!-- End #login-wrapper -->
<!--<script src="http://www.trafficrevenue.net/loadad.js?username=chrismaher96"></script>-->
</body>
</html>