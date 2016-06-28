<?php /* Template Name: Página Nosotros Plantilla */ ?>

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
		
		<!-- Primera Seccion de descripcion -->
		<section class="pageNosotros__description">
			<div class="row">

				<div class="col-xs-12 col-md-6">
					<section>
						<!-- Titulo  --> <h2 class="text-uppercase text-xs-left"> <span class="relative"> <?php _e( "quienes somos" , LANG ); ?> </span> </h2>

						<!-- Contenido 1 Descripcion -->
						<div class="text-justify">
							<?= apply_filters('the_content' , $post->post_content ); ?>
						</div> <!-- /.text-justify -->


					</section> <!-- /section -->
				</div> <!-- /.col-xs-12 col-md-6 -->

				<div class="col-xs-12 col-md-6">

					<!-- Contenedor de Galería [ SERVICIOS ] -->
					<section class="relative">
						<!-- Wrapper para sliders -->
						<?php  
							/*
							*  Attributos disponibles 
							* data-items = number , data-items-responsive = number_mobile ,
							* data-margins = margin_in_pixels , data-dots = true or false
							*/
						?>

						<div id="carousel-nosotros" class="section__single_gallery js-carousel-gallery" data-items="1" data-items-responsive="1" data-margins="5" data-dots="false" >
							<!-- Obtener todas las habitaciones -->
							<?php  
								$input_ids_img  = get_post_meta($post->ID, 'imageurls_'.$post->ID , true);
								//convertir en arreglo
								$input_ids_img  = explode(',', $input_ids_img ); 

								//Hacer loop por cada item de arreglo
								foreach ( $input_ids_img as $item_img ) : 
									//Si es diferente de null o tiene elementos
									if( !empty($item_img) ) : 
									//Conseguir todos los datos de este item
									$item = get_post( $item_img  ); 
							?> <!-- Artículo -->
								<article class="item-nosotros relative">
									<!-- Imagen -->
									<figure><img src="<?= $item->guid; ?>" alt="<?= $item->post_title; ?>" class="img-fluid" /></figure>
								</article> <!-- /.item-tour -->

							<?php endif; endforeach; ?>
						</div> <!-- /.section__rooms_gallery -->

					</section> <!-- /.relative -->

					<!-- Incluir SECCION PDF CATALOGO -->
					<div class="text-xs-center">
						<?php include( locate_template("partials/pdf-catalogo.php") ); ?>
					</div> <!-- /.text-xs-center -->

				</div> <!-- /.col-xs-12 col-md-6 -->
				
			</div> <!-- /.row -->
		</section> <!-- /.pageNosotros__description -->	

		<!-- Linea de Separacion  --> <div id="separator-line-gray"></div>

		<!-- Primera Seccion de descripcion -->
		<section class="pageNosotros__description">
			<?php 
				$texto_extra = get_post_meta( $post->ID , 'custom_theme_'.$post->ID.'_extra' , true );
				$texto_extra = html_entity_decode( $texto_extra );

				if( !empty($texto_extra) ) : echo apply_filters('the_content' , $texto_extra  ); endif;
			?>
		</section> <!-- /.pageNosotros__description -->	
	

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