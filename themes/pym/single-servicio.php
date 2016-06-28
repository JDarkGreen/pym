<?php /* Single Name: Single Servicios Plantilla */ ?>

<!-- Header -->
<?php get_header(); $theme_mod = get_theme_mod('theme_custom_settings');  ?>

<!-- Incluir Banner de Pagina -->
<?php
	global $post; //Objeto actual - o -Pagina 

	/* Conseguimos la pagina de servicios */
	$page = get_page_by_path("servicios");
	$banner = $page;  // Seteamos la variable banner de acuerdo a la página
	include( locate_template("partials/banner-common-pages.php") ); 
?>

<!-- Contenedor Principal -->
<main class="pageWrapper">
	<div class="container">
		
		<!-- Seccion de Contenido -->
		<section class="pageServicios__content">
			<div class="row">

				<div class="col-xs-4">
					<!-- Sidebar de Servicios -->
					<aside class="sidebarCommon">
						<!-- Titulo de Sidebar --> <h2 class="titleSidebar"> <?php _e( "Nuestros Servicios" , LANG ); ?></h2>

						<?php //Obtener los nombres y enlaces de los servicios 
							$args = array(
								'order'          => 'ASC',
								'orderby'        => 'menu_order',
								'post_status'    => 'publish',
								'post_type'      => 'servicio',
								'posts_per_page' => -1,
							);
							$services = get_posts( $args );
							if( !empty($services) ) : foreach( $services as $service ) :
						?> <!-- Botones -->
						<a href="<?= get_permalink($service->ID); ?>" class="<?= $post->ID === $service->ID ? 'active' : '' ?>"><?php _e( $service->post_title , LANG ); ?>
							<!-- Icon  -->
							<i class="fa fa-chevron-right" aria-hidden="true"></i>
						</a>
						<?php $i++; endforeach; endif; ?>						
					</aside> <!-- /.sidebarServices -->
				</div> <!-- /.col-xs-4 -->

				<div class="col-xs-8">
					<section>

						<!-- Titulo  --> <h2 class="titleCommon__page text-uppercase text-xs-left"> <span class="relative"> <?php _e( $post->post_title , LANG ); ?> </span> </h2> 

						<!-- Separacion  --> <br>

						<!-- Contenido y galeria -->
						<div class="row">
							<div class="col-xs-6 text-justify">
								<!-- Contenido -->
								<?php 
									if( !empty($post->post_content) ) : 
									echo apply_filters('the_content' , $post->post_content);
									else: 
									echo apply_filters('the_content' , "Actualizando Contenido" );
									endif;
								?>
							</div> <!-- /.col-xs-6 -->
 							<div class="col-xs-6">
 								
								<!-- Wrapper para sliders -->
								<?php  
									/*
									*  Attributos disponibles 
									* data-items = number , data-items-responsive = number_mobile ,
									* data-margins = margin_in_pixels , data-dots = true or false
									*/
								?>

								<div id="carousel-single-service" class="js-carousel-gallery" data-items="1" data-items-responsive="1" data-margins="5" data-dots="" >
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
										<article class="item-single-service relative">
											<!-- Imagen -->
											<?php  
												$link_img = wp_get_attachment_url( get_post_thumbnail_id( $item->ID ) );
											?>
											<!-- Link -->
											<!--a href="<?= $link_img; ?>" class="gallery-fancybox" rel="group"-->
												<figure><img src="<?= $item->guid; ?>" alt="<?= $item->post_title; ?>" class="img-fluid" />
												</figure>							
											<!--/a--> <!-- /. -->
										</article> <!-- /.item-tour -->

									<?php endif; endforeach; ?>
								</div> <!-- /.section__rooms_gallery -->

								<!-- Flechas de Carousel -->
								<section class="arrowsCarouselSection text-xs-center relative">
									<h3 class="text-uppercase"><?php _e( "galería" , LANG ); ?></h3>
									<!-- Izquierda -->
									<a href="#" id="" class="js-carousel-prev js-prevent-default" data-slider="carousel-single-service">
										<i class="fa fa-caret-left" aria-hidden="true"></i>
									</a>	
									<!-- Derecha -->
									<a href="#" id="" class="js-carousel-next js-prevent-default" data-slider="carousel-single-service">
										<i class="fa fa-caret-right" aria-hidden="true"></i>
									</a> 
								</section> <!-- /.arrowsCarousel -->

 							</div>  <!-- /.col-xs-6 -->
						</div> <!-- /.row -->

					</section> <!-- /.section -->
				</div> <!-- /.col-xs-8 -->
				
			</div> <!-- /.row -->
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