<?php /* Template Name: Página Clientes Plantilla */ ?>

<!-- Header -->
<?php get_header(); $theme_mod = get_theme_mod('theme_custom_settings');  ?>

<!-- Incluir Banner de Pagina -->
<?php
	global $post; //Objeto actual - Pagina 
	$banner = $post;  // Seteamos la variable banner de acuerdo al post
	include( locate_template("partials/banner-common-pages.php") ); 
?>

<!-- Contenedor Principal -->
<main class="pageWrapper">
	<div class="container">
		
		<!-- Titulo Principal --> <h2 class="titleCommon__page text-uppercase text-xs-center"> <span class="relative"> <?php _e( "principales clientes" , LANG ); ?> </span> </h2>

		<!-- Separador --> <br/>

		<section class="pageClientes">
			<!-- Titulo de seccion -->
			<h3 class="text-uppercase text-xs-center"> <?php _e( "clientes" , LANG );  ?></h3>

			<?php /*
			<!-- Contenedor de clientes -->
			<section class="pageClientes__content">
				<div class="row">
					<?php  
						/**
						* Extraer a todos los clientes
						
						$args = array(
							'order'          => 'ASC',
							'orderby'        => 'name',
							'post_status'    => 'publish',
							'post_type'      => 'cliente',
							'posts_per_page' => -1,
						);
						$clientes = get_posts( $args );
						foreach( $clientes as $cliente ) : 
					?>
					<div class="col-xs-6 text-xs-center text-capitalize">
						<p><?php _e( $cliente->post_title , LANG ); ?> </p>
					</div> <!-- /.col-xs-6 -->
					<?php endforeach; ?>
				</div> <!-- /.row -->
			</section> <!-- /.pageClientes__content -->
			*/  ?>
			
			<section class="pageClientes__content">

				<!-- Obtener el texto del contenido de la página y luego separar linea por linea -->
				<?php  
					if( !empty( $post->post_content ) ) : 

						$texto    = $post->post_content;
						$clientes = explode( "," , $texto );

						foreach( $clientes as $cliente ) :
				?>
				<div class="col-xs-6 text-xs-center text-capitalize">
					<p><?php _e( $cliente , LANG ); ?></p>
				</div> <!-- /.col-xs-6 -->
				<?php endforeach; endif; //fin condicional ?>

				<!-- Limpiar Float --> <div class="clearfix"></div>

			</section>  <!-- /.pageClientes__content -->

		</section> <!-- /.pageClientes -->	

	</div> <!-- /.container -->
</main> <!-- /.pageWrapper -->


<?php 
/*
* Incluir template servicios
*/ 
include( locate_template("partials/banner-services.php") );

?>

<?php 
/*
* Incluir plantilla clientes
*/ 

include( locate_template("partials/carousel-clientes.php") );
?>


<!-- Footer -->
<?php get_footer(); ?>