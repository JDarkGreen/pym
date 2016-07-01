<?php /* Single Name: Single Servicios Plantilla */ ?>

<!-- Header -->
<?php get_header(); $theme_mod = get_theme_mod('theme_custom_settings');  ?>

<!-- Incluir Banner de Pagina -->
<?php
	global $post; //Objeto actual - o -Pagina 

	/* Conseguimos la pagina de proyectos */
	$page = get_page_by_path("proyectos");
	$banner = $page;  // Seteamos la variable banner de acuerdo a la página
	include( locate_template("partials/banner-common-pages.php") ); 
?>

<!-- Contenedor Principal -->
<main class="pageWrapper">
	<div class="container relative">
		
		<div class="row">

			<div class="col-xs-4">
				<!-- Seccion de Contenido -->
				<section class="pageProyecto__content relative">

					<!-- Titulo  --> <h2 class="titleCommon__page titleCommon__page--left text-uppercase text-xs-left"> <span class="relative"> <?php _e( $post->post_title , LANG ); ?> </span> </h2>

					<!-- Contenido -->
					<div class="text-justify">
						<?php 
							if( !empty($post->post_content) ) : 
							echo apply_filters('the_content' , $post->post_content);
							else: 
							echo apply_filters('the_content' , "Actualizando Contenido" );
							endif;
						?>
					</div> <!-- /.text-justify -->

				</section> <!-- /.pageProyecto__content-->

			</div> <!-- /.col-xs-4 -->

			<div class="col-xs-8">
				
				<!-- Galería de Imagenes del proyecto -->
				<div class="relative">
					<?php  
						/*
						*  Wrapper o Contenedor
						*  Attributos disponible 
						* data-items , data-items-responsive , data-margins , data-dots
						*/
					?>
					<div id="carousel-proyect" class="section__single_gallery pageProyectos__carousel js-carousel-gallery" data-items="1" data-items-responsive="1" data-margins="0" data-dots="true">
						<!-- Obtener todas los items de la galeria -->
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
							<article class="item-proyecto relative container-flex align-center">
								<!-- Imagen -->
								<figure class="center-block"><img src="<?= $item->guid; ?>" alt="<?= $item->post_title; ?>" class="img-fluid" /></figure>
							</article> <!-- /.item-tour -->

						<?php endif; endforeach; ?>
					</div> <!-- /.section__single_gallery -->

					<!-- Flechas -->
					<!-- Izquierda -->
					<a href="#" class="arrowCarouselProyect arrowCarouselProyect--left js-prevent-default js-carousel-prev" data-slider="carousel-proyect"><i class="fa fa-chevron-left" aria-hidden="true"></i></a>

					<!-- Derecha -->
					<a href="#" class="arrowCarouselProyect arrowCarouselProyect--right js-prevent-default js-carousel-next" data-slider="carousel-proyect"><i class="fa fa-chevron-right" aria-hidden="true"></i></a>

				</div> <!-- /.relative fin de sección-->

				<!-- Indicadores -->
				<section class="gallery_indicators text-xs-center">
					<?php 
						//variable de control 
						$k = 0;
						foreach ( $input_ids_img as $item_img ) : 
						//Si es diferente de null o tiene elementos
						if( !empty($item_img) ) : 
						//Conseguir todos los datos de este item
						$item = get_post( $item_img  ); 
					?>  <!-- ITEM -->
						<a href="#" class="gallery_indicator js-carousel-indicator" data-slider="carousel-proyect" data-to="<?= $k ?>">
							<img src="<?= $item->guid; ?>" alt="<?= $item->post_title; ?>" class="img-fluid" /></figure>
						</a>
					<?php $k++; endif; endforeach; ?>
				</section> <!-- /.gallery_indicators -->

			</div> <!-- /.col-xs-8 -->
				
		</div> <!-- /.row -->

		<!-- Botón de Regresar a Los otros proyectos -->
		<?php  
			/* Obtener pagina de proyecto */
			$page_proyecto = get_page_by_path("proyectos");
		?>
		<a href="<?= get_permalink( $page_proyecto->ID ); ?>" class="btnCommon__show-more text-uppercase"> <?php _e( "regresar" , LANG ); ?></a>

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