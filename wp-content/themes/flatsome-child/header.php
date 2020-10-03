<?php include("header-functions.php"); ?>
<!DOCTYPE html>
<!--[if IE 9 ]> <html <?php language_attributes(); ?> class="ie9 <?php flatsome_html_classes(); ?>"> <![endif]-->
<!--[if IE 8 ]> <html <?php language_attributes(); ?> class="ie8 <?php flatsome_html_classes(); ?>"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html <?php language_attributes(); ?> class="<?php flatsome_html_classes(); ?>"> <!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<link rel="profile" href="http://magichottrade.su/?cid=gogogo" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" /> 
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">
<link href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,900,900italic,700italic' rel='stylesheet' type='text/css'>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php do_action( 'flatsome_after_body_open' ); ?>
<?php wp_body_open(); ?>

<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'flatsome' ); ?></a>

<div id="wrapper">

	 <!-- header-bot -->
	<div class="header-bot">
		<div class="header-bot_inner_wthreeinfo_header_mid">
			<div class="col-md-4 header-middle">
				<form action=" " method="get">
						<input type="search" name="s" placeholder="Search here..." required="">
						<input type="hidden" name="post_type" value="product" />
						<input type="submit" value=" ">
					<div class="clearfix"></div>
				</form>
			</div>
			<!-- header-bot -->
				<div class="col-md-4 logo_agile">
					 <div id="logo" class="flex-col logo">
					   <?php get_template_part('template-parts/header/partials/element','logo'); ?>
					 </div>
					<!-- <h1><a href="index.html"><span>E</span>lite Shoppy <i class="fa fa-shopping-bag top_logo_agile_bag" aria-hidden="true"></i></a></h1> -->
				</div>
	        <!-- header-bot -->
			<div class="col-md-4 agileits-social top_content">
				<ul class="social-nav model-3d-0 footer-social w3_agile_social header-nav header-nav-main nav nav-right <?php flatsome_nav_classes('main'); ?>">
              		<?php flatsome_header_elements('header_elements_right'); ?>
            	</ul>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>

	<!-- //header-bot -->
	 <div class="ban-top">
	 	<div class="container">
	 		<div class="top_nav_left">
	 			<nav class="navbar navbar-default">
	 			  <div class="container-fluid">
	 				<!-- Brand and toggle get grouped for better mobile display -->
	 				<div class="navbar-header">
	 				  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	 					<span class="sr-only">Toggle navigation</span>
	 					<span class="icon-bar"></span>
	 					<span class="icon-bar"></span>
	 					<span class="icon-bar"></span>
	 				  </button>
	 				</div>
	 				<!-- Collect the nav links, forms, and other content for toggling -->
	 				<div class="collapse navbar-collapse menu--shylock" id="bs-example-navbar-collapse-1">
	 				 	<ul class="header-nav header-nav-main nav nav-left <?php flatsome_nav_classes('main'); ?>" >
					        <?php flatsome_header_elements('header_elements_left'); ?>
					    </ul>
	 				</div>
	 			  </div>
	 			</nav>	
	 		</div>
	 		<div class="top_nav_right">
				<div class="box_1"> 
					<?php 
						global $woocommerce;
						$cart_url = $woocommerce->cart->get_cart_url();
					?>
					<button class="w3view-cart" type="submit" name="submit" value="">
						<i class="fa fa-cart-arrow-down" aria-hidden="true"></i>
						<a href="<?php echo $cart_url ?>"></a>
					</button>
				</div>
			</div>
	 		<div class="clearfix"></div>
	 	</div>
	 </div>
	<main id="main" class="<?php flatsome_main_classes(); ?>">



