<!DOCTYPE html>
<!--[if IE 8]> <html <?php language_attributes(); ?> class="ie8"> <![endif]-->
<!--[if !IE]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->
<head>
  	<meta charset="<?php bloginfo('charset'); ?>">
	<title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
	<meta name="description" content="<?php bloginfo('description'); ?>">
	<meta name="author" content="">

	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" />
	
	<!-- Pingbacks -->
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- Favicon and Apple Icons -->
	
	
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> >
	
	<?php 
		$theme_mod = get_theme_mod('theme_custom_settings'); 
		global $post;

		//Comprobar si esta desplegada la barra de Navegación
		$admin_bar = is_admin_bar_showing() ? 'mainHeader__active' : '';
	?>

<!-- Header -->
<header class="mainHeader sb-slide">

	<!-- Contenedor Version Desktop -->
	<div class="hidden-xs-down relative">

		<!-- Barra de Información -->
		<section class="mainHeader__info">
			<div class="container">

				<!-- Slogan --> <span class="pull-xs-left slogan"> <?php _e( "Proyectos Edificaciones y Reforzamiento Estructural" , LANG ); ?></span>

				<!-- Informacion --> 
				<div class="pull-xs-right"> 
					<!-- Teléfono -->
					<?php if( isset($theme_mod['contact_tel']) && !empty($theme_mod['contact_tel'])  ) : ?> 
						<span> 
							<i class="fa fa-phone" aria-hidden="true"></i>
							<?= $theme_mod['contact_tel']; ?>
						</span> <?php endif; ?>
					<!-- Email --> 
					<?php if( isset($theme_mod['contact_email']) && !empty($theme_mod['contact_email'])  ) : ?> 
						<span> 
							<i class="fa fa-envelope" aria-hidden="true"></i>
							<?= $theme_mod['contact_email']; ?>
						</span> <?php endif; ?>
				</div> <!-- /.pull-xs-right -->

			</div> <!-- /.container -->
		</section> <!-- /.mainHeader__info container-flex -->

		<!-- Seccion Logo y Navegacion -->
		<div class="container">
			<section class="mainHeader__content container-flex align-content row">
				<!-- LOGO -->
				<div class="col-xs-4">
					<h1 class="logo">
						<a href="<?= site_url() ?>">
							<img src="<?= IMAGES ?>/logo.png" alt="pym-constructora-" class="img-fluid center-block" />
						</a>
					</h1> <!-- /.logo -->
				</div> <!-- /.col-xs-4 -->				
				<!-- MAIN NAVIGATION -->
				<div class="col-xs-8">
					<!-- Navegación Principal -->
					<nav class="mainNavigation">
						<?php wp_nav_menu(
							array(
								'menu_class'     => 'main-menu text-center',
								'theme_location' => 'main-menu'
							));
						?>						
					</nav> <!-- /.mainNav -->  					
				</div> <!-- /.col-xs-8 -->
			</section> <!-- /.mainHeader__content -->
		</div> <!-- /.container -->
			
	</div> <!-- /.hidden-xs-down relative -->

	<!-- Contenedor Version Mobile -->
	<div class="mainHeader__container container-flex align-content hidden-sm-up">

		<!-- Icono Izquierda -->
		<div id="toggle-left-nav" class="icon-header"> 
			<i class="fa fa-bars" aria-hidden="true"></i> 
		</div> <!-- /.icon-header -->	

		<!-- Logo Principal -->
		<h1 class="logo">
			<a href="<?= site_url() ?>">
				<?php if( !empty($theme_mod['logo']) ) : ?>
					<img src="<?= $theme_mod['logo'] ?>" alt="<?= "-logo-" . bloginfo('name') ?>" class="img-fluid center-block" />
				<?php else: ?>
					<img src="<?= IMAGES ?>/logo.png" alt="<?= "-logo-" . bloginfo('name') ?>" class="img-fluid center-block" />
				<?php endif; ?>
			</a>
		</h1> <!-- /.lgoo -->

		<!-- Icono Izquierda -->
		<div id="toggle-right-nav" class="icon-header"> 
			<i class="fa fa-bars" aria-hidden="true"></i> 
		</div> <!-- /.icon-header -->
	
	</div> <!-- /. -->

</header> <!-- /.mainHeader sb-slide -->

<!-- Contenedor Izquierda Version Mobile -->
<aside class="sb-slidebar sb-left sb-style-push">
	<!-- Navegación Principal -->
	<nav class="mainNavigation">
		<?php wp_nav_menu(
			array(
				'menu_class'     => 'main-menu text-center',
				'theme_location' => 'main-menu'
			));
		?>						
	</nav> <!-- /.mainNav -->  
</aside> <!-- /.sb-slidebar sb-left sb-style-push -->

<!-- Flecha Indicador hacia arriba -->
<a href="#" id="arrow-up-page"><i class="fa fa-angle-up" aria-hidden="true"></i></a>

<!-- Contenedor version mobile libreria sliderbar js -->
<div id="sb-site" class="">








