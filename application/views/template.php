<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
	<title>Modern an Admin Panel Category Flat Bootstarp Resposive Website Template | Home :: w3layouts</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Modern Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
	Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!-- Bootstrap Core CSS -->
	<link href="<?= base_url() ?>assets/css/bootstrap.min.css" rel='stylesheet' type='text/css' />
	<!-- Custom CSS -->
	<link href="<?= base_url() ?>assets/css/style.css" rel='stylesheet' type='text/css' />
	<!-- Graph CSS -->
	<link href="<?= base_url() ?>assets/css/lines.css" rel='stylesheet' type='text/css' />
	<link href="<?= base_url() ?>assets/css/font-awesome.css" rel="stylesheet"> 
	<!-- jQuery -->
	<script src="<?= base_url() ?>assets/js/jquery.min.js"></script>
<!---//webfonts--->  
<!-- Nav CSS -->
<link href="<?= base_url() ?>assets/css/custom.css" rel="stylesheet">
<!-- Metis Menu Plugin JavaScript -->
<script src="<?= base_url() ?>assets/js/metisMenu.min.js"></script>
<script src="<?= base_url() ?>assets/js/custom.js"></script>
<!-- Graph JavaScript -->
<script src="<?= base_url() ?>assets/js/d3.v3.js"></script>
<script src="<?= base_url() ?>assets/js/rickshaw.js"></script>
</head>
<body>
	<div id="wrapper">
		<!-- Navigation -->
		<nav class="top1 navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="index.html">Modern</a>
			</div>
			<!-- /.navbar-header -->
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-comments-o"></i><span class="badge">4</span></a>
					<ul class="dropdown-menu">
						<li class="dropdown-menu-header">
							<strong>Messages</strong>
							<div class="progress thin">
								<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
									<span class="sr-only">40% Complete (success)</span>
								</div>
							</div>
						</li>
						<li class="avatar">
							<a href="#">
								<img src="<?= base_url() ?>assets/images/1.png" alt=""/>
								<div>New message</div>
								<small>1 minute ago</small>
								<span class="label label-info">NEW</span>
							</a>
						</li>
						<li class="avatar">
							<a href="#">
								<img src="<?= base_url() ?>assets/images/2.png" alt=""/>
								<div>New message</div>
								<small>1 minute ago</small>
								<span class="label label-info">NEW</span>
							</a>
						</li>
						<li class="avatar">
							<a href="#">
								<img src="<?= base_url() ?>assets/images/3.png" alt=""/>
								<div>New message</div>
								<small>1 minute ago</small>
							</a>
						</li>
						<li class="avatar">
							<a href="#">
								<img src="<?= base_url() ?>assets/images/4.png" alt=""/>
								<div>New message</div>
								<small>1 minute ago</small>
							</a>
						</li>
						<li class="avatar">
							<a href="#">
								<img src="<?= base_url() ?>assets/images/5.png" alt=""/>
								<div>New message</div>
								<small>1 minute ago</small>
							</a>
						</li>
						<li class="avatar">
							<a href="#">
								<img src="<?= base_url() ?>assets/images/pic1.png" alt=""/>
								<div>New message</div>
								<small>1 minute ago</small>
							</a>
						</li>
						<li class="dropdown-menu-footer text-center">
							<a href="#">View all messages</a>
						</li>	
					</ul>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle avatar" data-toggle="dropdown"><img src="<?= base_url() ?>assets/images/1.png"><span class="badge">9</span></a>
					<ul class="dropdown-menu">
						<li class="m_2"><a href="<?php echo base_url('index.php/akun/logout') ?>"><i class="fa fa-lock"></i> Logout</a></li>	
					</ul>
				</li>
			</ul>
			<form class="navbar-form navbar-right">
				<input type="text" class="form-control" value="Search..." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search...';}">
			</form>
			<div class="navbar-default sidebar" role="navigation">
				<div class="sidebar-nav navbar-collapse">
					
					<ul class="nav" id="side-menu">
						<li>
							<a href="<?= base_url() ?>index.php/home"><i class="fa fa-laptop fa-fw nav_icon"></i>Dashboard</a>
						</li>
						<li <?php if ($this->session->userdata('level')=='kasir'): ?>
							<?php echo "style='display:none'" ?>
						<?php endif ?>>
							<a href="<?= base_url() ?>index.php/genre"><i class="fa fa-indent fa-fw nav_icon"></i>Genre</a>
						</li>
						<li <?php if ($this->session->userdata('level')=='kasir'): ?>
							<?php echo "style='display:none'" ?>
						<?php endif ?>>
							<a href="<?= base_url() ?>index.php/film"><i class="fa fa-book fa-fw nav_icon"></i>Film</a>
						</li>
						<li <?php if ($this->session->userdata('level')=='admin'): ?>
							<?php echo "style='display:none'" ?>
						<?php endif ?>>
							<a href="<?= base_url() ?>index.php/transaksi"><i class="fa fa-dashboard fa-fw nav_icon"></i>Transaksi</a>
						</li>
						<li <?php if ($this->session->userdata('level')=='admin'): ?>
							<?php echo "style='display:none'" ?>
						<?php endif ?>>
							<a href="<?= base_url() ?>index.php/cart"><i class="fa fa-tags fa-fw nav_icon"></i>Cart</a>
						</li>

						<li <?php if ($this->session->userdata('level')=='kasir'): ?>
							<?php echo "style='display:none'" ?>
						<?php endif ?>>
						<a href="<?= base_url() ?>index.php/kasir"><i class="fa fa-users fa-fw nav_icon"></i>Kasir</a>
						</li>
					</ul>
				</div>
				<!-- /.sidebar-collapse -->
			</div>
			<!-- /.navbar-static-side -->
		</nav>
		<div id="page-wrapper">
			<div class="col-md-12 graphs">


				<?php $this->load->view($content); ?>



			</div>
		</div>
		<!-- /#page-wrapper -->
	</div>
	<!-- /#wrapper -->
	<!-- Bootstrap Core JavaScript -->
	<script src="<?= base_url() ?>assets/js/bootstrap.min.js"></script>
</body>
</html>
