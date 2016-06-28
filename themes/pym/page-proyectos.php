<?php /* Template Name: Página Proyectos Plantilla */ ?>

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
						<a href="<?= get_term_link($cat_proyectos); ?>" class="<?= $first_cat_proyectos->term_id == $cat_proyectos->term_id ? 'active' : '' ?>"><?php _e( $cat_proyectos->name , LANG ); ?>
							<!-- Icon  -->
							<i class="fa fa-chevron-right" aria-hidden="true"></i>
						</a>
						<?php endforeach; endif; ?>						
					</aside> <!-- /.sidebarServices -->
				</div> <!-- /.col-xs-4 -->

				<div class="col-xs-8">
					<section>

						<!-- Titulo  --> <h2 class="titleCommon__page text-uppercase text-xs-left"> <span class="relative"> <?php _e( "proyectos terminados" , LANG ); ?> </span> </h2> 

						<!-- Separacion  --> <br><br>

						<?php  
							/*
							* Obtenemos todos los post con la primera taxonomia de los proyectos
							*/
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
										'terms'    => $first_cat_proyectos->slug,
									),
								),
							);
							$proyectos = get_posts( $args );

							/* numero de post con esta taxonomia */
							$number_proyectos = count( $proyectos ); 
							/* numero de cuantos post quieres presentar por pagina */
							$post_per_page  = 4;
							/* division para saber cuantas veces se va a repetir los items*/
							$number_items = round( $number_proyectos / $post_per_page );

							for( $i = 0 ; $i < $number_items ; $i++ ){ 
						?>  <!-- Seccion que contendrá los articulos o proyectos por la taxonomia categoria de proyecto 4 por pagina -->

							<section class="containerProyects">
								<?php 
									/* argumentos y articulos */
									$args2 = array(
										'order'          => 'DESC',
										'orderby'        => 'date',
										'post_status'    => 'publish',
										'post_type'      => 'proyecto',
										'offset'         => $i * $post_per_page,
										'tax_query' => array(
											array(
												'taxonomy' => 'proyecto_category',
												'field'    => 'slug',
												'terms'    => $first_cat_proyectos->slug,
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
									</article> <!-- /article -->
								<?php endforeach; ?>
							</section> <!-- /.containerProyects -->		

						<?php } /* end for */?>

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