<?php /* Pagina Single */ ?>

<!-- Header -->
<?php get_header(); $options = get_option('theme_custom_settings');  ?>

<!-- Get Header -->
<?php get_header(); ?>

<!-- Incluir Banner de Pagina -->
<?php
	global $post;
	$page         = get_page_by_path('blog');  //buscamos el objeto de acuerdo a la página
	$banner       = $page;  // Seteamos la variable banner de acuerdo al post
	include( locate_template("partials/banner-common-pages.php") ); 
?>

<!-- Contenedor Global -->
<main class="pageWrapper pageBlog">
	
	<div class="container">
		<div class="row">

			<!-- Articulo Principal -->
			<main class="col-xs-12 col-md-8 pageWrapper__article">

				<?php 
					/* Extraer todas las categorías padre */  
					$categorias = get_categories( array(
						'orderby' => 'name' , 'parent' => 0,
					) );
				?>

				<article class="item-preview-post">

					<!-- Titulo --> <h2 class=""><?php _e( $post->post_title , LANG ); ?></h2>

					<!-- Imagen -->
					<figure>
						<?php if( has_post_thumbnail( $post->ID ) ) : ?>
							<?= get_the_post_thumbnail( $post->ID , 'full' , array('class'=>'img-fluid imgNotBlur') ); ?>
						<?php endif; ?>
					</figure> <!-- /. -->

					<!-- Separador --> <p></p>

					<!-- Contenido -->
					<div class="text-justify">
						<?php 
							if( !empty( $post->post_content ) ) : 
							echo _e( apply_filters('the_content' , $post->post_content ) , LANG );
							endif;
						?>
					</div> <!-- /.text-justify -->

					<!-- Enviar Permalink -->
					<?php $the_link_share = get_permalink( $post->ID ); ?>

					<!-- Sección Compartir en Redes Sociales -->
					<?php include( locate_template("partials/section-share-type-post.php") ); ?>

				</article> <!-- /. -->

			</main> <!-- /.col-xs-12 -->

			<!-- Sidebar  Ocultar en mobile -->
			<div class="col-md-4 hidden-xs-down">
				<aside class="sidebarCommon">
					<!-- Titulo de Sidebar --> 
					<h2 class="titleSidebar"> <?php _e( "Categorias" , LANG ); ?></h2>

				<!-- Sección de Categorías -->
				<?php foreach( $categorias as $categoria ) : ?>
					<a href="<?= get_term_link( $categoria ); ?>" class="link-to-item <?= $category->term_id == $categoria->term_id ? 'active' : '' ?>"><?php _e( $categoria->name , LANG  ); ?>
						<!-- Icon  -->
						<i class="fa fa-chevron-right" aria-hidden="true"></i>
					</a>
				<?php endforeach; ?>

				</aside> <!-- /.sidebarCommon -->

			</div> <!-- /.col-md-4 hidden-xs-down -->


		</div> <!-- /.row -->
	</div> <!-- /.container -->

</main> <!-- /.pageWrapper -->

<!-- Get Footer -->
<?php get_footer(); ?>