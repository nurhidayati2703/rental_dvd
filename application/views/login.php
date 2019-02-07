<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Modern an Admin Panel Category Flat Bootstarp Resposive Website Template | Login :: w3layouts</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Modern Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
 <!-- Bootstrap Core CSS -->
<link href="<?= base_url() ?>assets/css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="<?= base_url() ?>assets/css/style.css" rel='stylesheet' type='text/css' />
<link href="<?= base_url() ?>assets/css/font-awesome.css" rel="stylesheet"> 
<!-- jQuery -->
<script src="<?= base_url() ?>assets/js/jquery.min.js"></script>
<!----webfonts--->
<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
<!---//webfonts--->  
<!-- Bootstrap Core JavaScript -->
<script src="<?= base_url() ?>assets/js/bootstrap.min.js"></script>
</head>
<body id="login" style="min-height: 100vh">
<div class="alert alert-success" id="msg" style="display: none"></div>

  <div class="login-logo">
    <a href="index.html"><img src="<?= base_url() ?>assets/images/logo.png" alt=""/></a>
  </div>
  <h2 class="form-heading" style="margin-top: 100px;">login</h2>
  <div class="app-cam">
	  <form id="signin" method="post" action="#">
		<input type="text" class="text" value="Username" name="username" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Username';}">
		<input type="password" value="Password" name="password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'password';}">
		<div class="submit">
      <input style="width: 100%" type="button" value="Login" id="loginTmbl" name="login1" class="btn btn-primary">
      <input type="hidden" name="login" value="1">
      </div>
		<div class="login-social-link">
          <a href="index.html" class="facebook">
              Facebook
          </a>
          <a href="index.html" class="twitter">
              Twitter
          </a>
        </div>
	</form>

  <script type="text/javascript">
    $(document).ready(function(){
      $("#loginTmbl").click(function(){
        var data = $("#signin").serialize();
        $("#msg").html("Memeriksa Data Login...");
        $.ajax({
          url : "<?php base_url()?>akun/proses_login",
          type: "POST",
          dataType: "json",
          data: data,
          cache : false,
          success:function(dt){
            if (dt.status==1) {
              $("#msg").show('fade');
              $("#msg").html(dt.keterangan);
              setTimeout(function(){
                window.location.href="<?= base_url()?>index.php/home";
              }, 2000);
            } else{
              $("#msg").show('fade');
              $("#msg").html(dt.keterangan);
              setTimeout(function(){
                $("#msg").hide('fade');
              }, 2000);
            }
          }
        });
      });
    });
  </script>
  </div>
</body>
</html>
