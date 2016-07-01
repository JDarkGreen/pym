<?php /* Taxonomy Template de Categorias Proyectos */ ?>

<!-- Header -->
<?php get_header(); $options = get_option('theme_custom_settings');  ?>

<!-- Incluir Banner de Pagina -->
<?php
	$current_term = get_queried_object(); //Objeto actual 

	/*
	* Options Term
	* ["term_id"] ["name"] ["slug"] ["term_group"] ["term_taxonomy_id"] 
	* ["taxonomy"] ["description"] ["parent"] ["count"] ["filter"] 
	*/

	$page         = get_page_by_path('proyectos');  //buscamos el objeto de acuerdo a la página galeria
	$banner       = $page;  // Seteamos la variable banner de acuerdo al post
	include( locate_template("partials/banner-common-pages.php") ); 
?>

<!-- Contenedor Principal -->
<main class="pageWrapper">
	<div class="container">
		
		<!-- Seccion de Contenido -->
		<section class="pageProyectos__content">
			<div class="row">

				<div class="col-xs-4">
					<!-- Sidebar de Servicios -->
					<aside class="sidebarCommon">
						<!-- Titulo de Sidebar --> <h2 class="titleSidebar"> <?php _e( "Categorias" , LANG ); ?></h2>

						<?php 

							/* Obtenemos todos los terminos de la taxonomia de proyecto */
							$args = array( 'taxonomy'   => 'proyecto_category', 'hide_empty' => false, 'orderby' => 'name' , 'order' => 'DESC' );
							$cats_proyectos = get_terms( $args ); 

							/* Escogemos el primer termino */
							$first_cat_proyectos = $cats_proyectos[0];

							if( !empty($cats_proyectos) ) : foreach( $cats_proyectos as $cat_proyectos ) :
						?> <!-- Botones -->
						<a href="<?= get_term_link($cat_proyectos); ?>" class="<?= $current_term->term_id == $cat_proyectos->term_id ? 'active' : '' ?>"><?php _e( $cat_proyectos->name , LANG ); ?>
							<!-- Icon  -->
							<i class="fa fa-chevron-right" aria-hidden="true"></i>
						</a>
						<?php endforeach; endif; ?>						
					</aside> <!-- /.sidebarServices -->
				</div> <!-- /.col-xs-4 -->

				<div class="col-xs-8">
					<section>

						<!-- Titulo  --> <h2 class="titleCommon__page text-uppercase text-xs-left"> <span class="relative"> <?php _e( "proyectos terminados" , LANG ); ?> </span> </h2> 

						<!-- Separacion  --> <br>

						<!-- Conseguimos todos los proyectos segun esta taxonomia actual -->
						<?php  
							$args = array(
								'order'          => 'DESC',
								'orderby'        => 'date',
								'post_status'    => 'publish',
								'post_type'      => 'proyecto',
								'posts_per_page' => -1,
								'tax_query' => array(
									array(
										'taxonomy' => 'proyecto_category',
										'field'    => 'slug',
										'terms'    => $current_term->slug,
									),
								),
							);
							$proyectos = get_posts( $args );

							/* numero de post con esta taxonomia */
							$number_proyectos = count( $proyectos ); 

							/* número de cuantos post quieres presentar por pagina */
							$post_per_page  = 4;

							/* Si el número de post es mayor a la cantidad por presentar entonces
							* se hace un carousel */
							if ( $number_proyectos > $post_per_page ) : 

								/* Wrapper for slider */
	
								/*
								*  Attributos disponibles 
								* data-items = number , data-items-responsive = number_mobile ,
								* data-margins = margin_in_pixels , data-dots = true or false
								* if data-autoplay false then not autoplay else true ;
								*/
							?>

							<div id="carousel-proyectos" class="section__single_gallery js-carousel-gallery" data-items="1" data-items-responsive="1" data-margins="5" data-dots="false" data-autoplay="false" >

								<?php  
									/* división para saber el número total de paginación */
									$number_items = floor( $number_proyectos / $post_per_page );

									$repeat_items = 1 +  $number_items; 

									/* repeticiones */
									for( $i = 0 ; $i < $repeat_items ; $i++ ){ 
								?>  <!-- Seccion que contendrá los articulos o proyectos por la taxonomia categoria de proyecto 4 por pagina -->

									<section class="containerProyects">
										<?php 
											/* argumentos y articulos */
											$args2 = array(
												'order'          => 'DESC',
												'orderby'        => 'date',
												'post_status'    => 'publish',
												'post_type'      => 'proyecto',
												'posts_per_page' => 4,
												'offset'         => $i * $post_per_page,
												'tax_query' => array(
													array(
														'taxonomy' => 'proyecto_category',
														'field'    => 'slug',
														'terms'    => $current_term->slug,
													),
												),
											);
											/* proyectos */
											$projects_finish = get_posts( $args2 );
											foreach( $projects_finish as $project_finish ) :
										?> <!--  Articulo -->
											<article class="col-xs-6" >
												<!-- Imagen -->
												<figure> <?= get_the_post_thumbnail( $project_finish->ID , 'full' , array('class'=>'img-fluid') ); ?> </figure>

												<!-- Titulo -->
												<h3> <?= $project_finish->post_title; ?> </h3>

												<!-- Cliente asociado -->
												<div class="clients-associate text-xs-center text-uppercase">
													<?php
														$cliente_asociado = get_post_meta( $project_finish->ID , 'mb_clients_select' , true );
														$cliente_asociado = !empty($cliente_asociado) && $cliente_asociado !== "none" ? $cliente_asociado : "actualizando cliente";
														echo $cliente_asociado;
													?> <!-- Flecha abajo o caret -->
													<i class="fa fa-caret-down" aria-hidden="true"></i>
												</div>	

											</article> <!-- /article -->
										<?php endforeach; ?>
									</section> <!-- /.containerProyects -->		

								<?php } /* end for */?>

							</div> <!-- /. fin de contenedor para slider -->
						
						<!-- Sino hacer una seccion simple -->
						<?php else: ?>
							
							<section class="containerProyects">
								<?php foreach( $proyectos as $proyecto ) : ?>
									<!-- Articulos -->
									<article class="col-xs-6" >
										<!-- Imagen -->
										<figure> <?= get_the_post_thumbnail( $proyecto->ID , 'full' , array('class'=>'img-fluid') ); ?> </figure>

										<!-- Titulo -->
										<h3> <?= $proyecto->post_title; ?> </h3>

										<!-- Cliente asociado -->
										<div class="clients-associate text-xs-center text-uppercase">
											<?php
												$cliente_asociado = get_post_meta( $proyecto->ID , 'mb_clients_select' , true );
												$cliente_asociado = !empty($cliente_asociado) && $cliente_asociado !== "none" ? $cliente_asociado : "actualizando cliente";
												echo $cliente_asociado;
											?>
											<!-- Flecha abajo o caret -->
											<i class="fa fa-caret-down" aria-hidden="true"></i>
										</div> <!-- /.clients-associate text-xs-center text-uppercase -->	

									</article> <!-- /article -->
								<?php endforeach; ?>
							</section> <!-- /.containerProyects -->

						<?php endif; /* Fin de condicional */ ?> 

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
