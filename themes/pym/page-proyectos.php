<?php /* Template Name: Página Proyectos Plantilla */ ?>

<!-- Header -->
<?php get_header(); $theme_mod = get_theme_mod('theme_custom_settings');  ?>

<!-- Incluir Banner de Pagina -->
<?php
	global $post; //Objeto actual - Pagina 
	$banner = $post;  // Seteamos la variable banner de acuerdo al post
	include( locate_template("partials/banner-common-pages.php") ); 

	/* variables global query */
 	global $wp_query;
 	/* variable paged paginación */
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

	echo $paged;
?>

<!-- Contenedor Principal -->
<main class="pageWrapper">
	<div class="container">

		<!-- Titulo  --> <h2 class="titleCommon__page titleCommon__page--left text-uppercase text-xs-left"> <span class="relative"> <?php _e( "proyectos terminados" , LANG ); ?> </span> </h2> 

		<!-- Separador --> <br/>

		<!-- Seccion de Contenido -->
		<section class="pageProyectos__content">

			<div class="row">

				<!-- Conseguimos todos los proyectos segun esta taxonomia actual -->
				<?php  
				
					/* Posts por página */
					$post_per_page = 9;

					$args = array(
						'meta_key'       => 'mb_fecha_select',
						'order'          => 'DESC',
						'orderby'        => 'meta_value_num',
						'paged'          => $paged, /*paginacion*/
						'post_status'    => 'publish',
						'post_type'      => 'proyecto',
						'posts_per_page' => $post_per_page,
					);
					$the_query = new WP_Query( $args );  
					if( $the_query->have_posts() ) : while( $the_query->have_posts() ) : $the_query->the_post();
				?>
					<div class="col-xs-4">
						<!-- Articulo -->
						<article class="articleProyectoItem">
							<!-- Links -->
							<a href="<?php the_permalink(); ?>">
							<!-- Imagen -->
							<figure> 
								<?php if( has_post_thumbnail() ) : 
									echo get_the_post_thumbnail( get_the_id() ,'full' , array('class'=>'img-fluid') );
									endif;
								?>
							</figure>  <!-- /end of image -->
							</a> <!--  end of link -->
							<!-- Titulo o nombre del proyecto -->
							<h3 class="text-capitalize"> 
								<a href="<?= get_permalink( $proyecto->ID ); ?>">
									<?php _e( get_the_title() , LANG ); ?>
								</a>
							</h3>
						</article> <!-- /.articleProyectoItem -->
					</div> <!-- /.col-xs-4 -->

				<?php endwhile; endif; ?>

			</div> <!-- /.row -->

			<!-- Construimos nuestro paginador -->
			<?php 
				/*
				The total number of pages. Is the result of $found_posts / $posts_per_page 
				*/
				$pages = $the_query->max_num_pages;
			?>
			<div class="pagePaginator pull-xs-right">
				<p> <?php _e( "Página" , LANG ); ?></p>
				<?php for ($i=1; $i <= $pages ; $i++) { ?>

					<a class="<?= $i == $paged ? 'active current' : '' ?>" href="<?= get_pagenum_link( $i ); ?>"> <?= $i; ?> </a>
				
				<?php } /* endfor */ ?>
			</div> <!-- /.pagePaginator -->

			<!-- Limpiar Floats --> <div class="clearfix"></div>

		</section> <!-- /.pageProyectos__content -->	

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