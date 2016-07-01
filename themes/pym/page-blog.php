<?php /* Template Name: Página Blog Plantilla */ ?>

<!-- Header -->
<?php get_header(); $theme_mod = get_theme_mod('theme_custom_settings');  ?>

<!-- Incluir Banner de Pagina -->
<?php
	global $post; //Objeto actual - Pagina 
	$banner = $post;  // Seteamos la variable banner de acuerdo al post
	include( locate_template("partials/banner-common-pages.php") ); 
?>

<!-- Seccion General -->
<main class="pageWrapper pageBlog">
	
	<div class="container">
		<div class="row">

			<!-- Articulo Principal -->
			<main class="col-xs-12 col-md-8">

				<?php 

					/* Extraer todas las categorías padre */  
					$categorias = get_categories( array(
						'orderby' => 'name' , 'parent' => 0,
					) );

					/* Extraer la primera categoría */
					$first_cat = $categorias[0];

					/* Vamos a obtener todos los paquetes de tour y seleccionaremos el primero*/
					$args = array(
						'order'          => 'DESC',
						'orderby'        => 'date',
						'post_status'    => 'publish',
						'post_type'      => 'post',
						'posts_per_page' => -1,
						'category_name'  => $first_cat->slug,
					);
					$articulos = get_posts( $args );
					if( !empty( $articulos ) ) : 
				?>

				<article class="pageWrapper__article pageCommon_preview-post">

					<!-- Titulo  --> <h2 class="titleCommon__page titleCommon__page--left text-uppercase text-xs-left"> <span class="relative"> <?php _e( "blog" , LANG ); ?> </span> </h2> 

					<!-- Items de Artículos -->
					<div class="row">
						<?php 
							$i = 0;
							foreach( $articulos as $articulo ) : 
						?>
							
							<!-- Articulos  -->
							<article class="item-preview-post col-xs-6 text-xs-left">
								<!-- Imagen -->
								<figure class="relative">
									<?php if( has_post_thumbnail( $articulo->ID) ) : ?>
									<?= get_the_post_thumbnail( $articulo->ID , 'full', array('class'=>'img-fluid') ); ?>
									<?php endif; ?>

									<!-- Fecha -->
									<figcaption class="text-uppercase text-xs-center container-flex align-content">
										<?=  get_the_date( 'd M',$articulo->ID ); ?>
									</figcaption>
								</figure>

								<!-- titulo --> <h3 class=""> <?php _e( $articulo->post_title , LANG ); ?> </h3>

								<!-- Extracto --> <div class="text-justify"> <?= !empty($articulo->post_content) ? apply_filters( 'the_content' , wp_trim_words( $articulo->post_content , 20 , '' ) ) : apply_filters("the_content" , "Actualizando Contenido..." ); ?></div>

								<!-- Boton ver mas  -->
								<a href="<?= get_permalink( $articulo->ID ); ?>" class="btnCommon__show-more text-uppercase"><?php _e( "ver más" , LANG  ); ?></a>

							</article> <!-- /.item-u_post -->

							<?php if( $i % 2 != 0 ) : ?>
							<!-- Limpiar Floats  --> <div class="clearfix"></div>
							<?php endif; ?>
	
						<?php $i++; endforeach; ?>
					</div> <!-- /.row -->	

				</article> <!-- /. -->

				<?php endif; ?>
			</main> <!-- /.col-xs-12 -->

			<!-- Sidebar  Ocultar en mobile -->
			<div class="col-md-4 hidden-xs-down">
				<aside class="sidebarCommon">
					<!-- Titulo de Sidebar --> 
					<h2 class="titleSidebar"> <?php _e( "Categorias" , LANG ); ?></h2>

				<!-- Sección de Categorías -->
				<?php foreach( $categorias as $categoria ) : ?>
					<a href="<?= get_term_link( $categoria ); ?>" class="link-to-item <?= $first_cat->term_id == $categoria->term_id ? 'active' : '' ?>"><?php _e( $categoria->name , LANG  ); ?>
						<!-- Icon  -->
						<i class="fa fa-chevron-right" aria-hidden="true"></i>
					</a>
				<?php endforeach; ?>

				</aside> <!-- /.sidebarCommon -->

			</div> <!-- /.col-md-4 hidden-xs-down -->

		</div> <!-- /.row -->
	</div> <!-- /.container -->

</main> <!-- /.pageRooms -->


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