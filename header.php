<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php wp_title(); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Le styles -->
	<link href="<?php bloginfo('template_directory');?>/css/toastr.css" rel="stylesheet">
	<link href="<?php bloginfo('stylesheet_url');?>" rel="stylesheet">
	<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<?php wp_enqueue_script("jquery"); ?>
    <?php wp_head(); ?>
</head>
<body>
	<div id="wrap">
		<div id="header">
			<div class="container">
				<header class="row" id="pageHeader">
				    <div class="col-md-6">
				        <div id="logo">
				        	<a href="<?php echo site_url();?>" title="McIntyre O'Brien Solicitors">
				        		<img class="img-responsive" src="<?php bloginfo('template_directory');?>/images/title.png" />
				        	</a>
				        </div>
				    </div>
				    <div class="col-md-4 col-md-offset-2 visible-md visible-lg">
				    	<div class="row contact-info">
				    		<div class="col-md-4">
				    			<div class="row"><?php echo get_option('contact_address_line1');?></div>
				    			<div class="row"><?php echo get_option('contact_address_line2');?></div>
				    			<div class="row"><?php echo get_option('contact_address_line3');?></div>
				    		</div>
				    		<div class="col-md-8">
				    			<div class="row">
									<div class="col-md-3">Phone:</div>
									<div class="col-md-9"><?php echo get_option('contact_phone');?></div>
								</div>
				    			<div class="row">
				    				<div class="col-md-3">Fax:</div>
				    				<div class="col-md-9"><?php echo get_option('contact_fax');?></div>
				    			</div>
				    			<div class="row">
									<div class="col-md-3">Email:</div>
									<div class="col-md-9"><a href="mailto:<?php echo get_option('contact_email');?>"><?php echo get_option('contact_email');?></a></div>
								</div>
				    		</div>
				    	</div>
				    </div>
				</header>
			</div>
			<nav class="navbar navbar-default" role="navigation">
			  <div class="container">
				<div class="navbar-header">
				    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-navbar">
				      <span class="sr-only">Toggle navigation</span>
				      <span class="icon-bar"></span>
				      <span class="icon-bar"></span>
				      <span class="icon-bar"></span>
				    </button>
				</div>
				<div class="collapse navbar-collapse" id="bs-navbar">	
				
					<?php wp_nav_menu( array( 
						'container' => '',
						'theme_location' => 'primary',
						'menu_class' => 'nav navbar-nav',
						'walker' => new MegaMenu_Walker(),									
						) );
					?>
					
					<ul class="nav navbar-nav navbar-right">
					  <li>
					  	<button type="button" data-target="#callbackModal" data-toggle="modal" class="btn">
						  <span class="glyphicon glyphicon-earphone"></span> Request a Callback
						</button>
					  </li>
					</ul>
				</div>
			  </div>
			</nav>
			<div class="container visible-xs">
				<div class="row">
					<div class="col-xs-12 callme">
						<a href='tel://<?php echo get_option('contact_phone_url');?>' class="btn"><span class="glyphicon glyphicon-earphone"></span> Call Now</a>
					</div>
				</div>
			</div>
		</div>
		<!-- Callback Modal Div -->
		<!-- Modal -->
		<?php include('php/callback-form.php'); ?>
		<div class="container">
