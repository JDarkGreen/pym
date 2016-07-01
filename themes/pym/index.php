
<!-- Header -->
<?php 
	get_header(); 
	$theme_mod = get_theme_mod('theme_custom_settings'); 
?>

<!-- Incluir Slider de Portada -->
<?php include(locate_template('partials/slider-home.php')); ?>

<!-- Separador Comun -->
<div id="separator-line"></div>

<?php 
/*
* Seccion Proyectos
*/ 
?>
<section class="pageInicio__proyects pageWrapperSection relative">
	<div class="container">
		<!-- Titulo  --> <h2 class="titleCommon__page text-uppercase text-xs-center"> <span class="relative"> <?php _e( "proyectos" , LANG ); ?> </span> </h2>

		<!-- Contenedor de Galería [ PROYECTOS ] -->
		<div class="row">
			<?php  
				$args = array(
					'order'          => 'DESC',
					'orderby'        => 'meta_value_num',
					'meta_key'       => 'mb_fecha_select',
					'posts_per_page' => 6,
					'post_status'    => 'publish',
					'post_type'      => 'proyecto',
				);
				$proyectos = get_posts( $args ); //var_dump($proyectos);
				if( !empty($proyectos) ) : foreach( $proyectos as $proyecto ) :
			?> <!-- Articulo -->
			<div class="col-xs-12 col-md-4">
				<article class="item-proyecto">
					<?php 
						/* obtener imagen destacada */
						$feat_img = wp_get_attachment_url( get_post_thumbnail_id( $proyecto->ID ) );
						$feat_img = !empty($feat_img) ? $feat_img : "https://placeimg.com/980/727/any";
					?> <!-- Fancybox -->
					<!--a href="<?= $feat_img; ?>" class="gallery-fancybox"-->
						<!-- Imagen --> 
						<a href="<?= get_permalink( $proyecto->ID ); ?>">
						<figure><img src="<?= $feat_img; ?>" alt="<?= $proyecto->post_title ?>" class="img-fluid" /></figure>
						</a> <!-- /link -->
						<!-- Titulo --> <h2 class=""> <?= $proyecto->post_title; ?></h2>
					<!--/a-->
				</article> <!-- /.item-proyecto -->
			</div> <!-- /.col-xs-4 -->
			<?php endforeach; endif; ?>
		</div> <!-- /.row -->

		<!-- Boton Comun ver más -->
		<?php  
			/* Obtener página de proyectos */
			$page_proyectos = get_page_by_path("proyectos");
		?>	
		<a href="<?= get_permalink( $page_proyectos->ID ); ?>" class="pull-xs-right btnCommon__show-more text-uppercase"><?php _e( "ver más" , LANG ) ?></a>
		<!-- Limpiar Floats --> <div class="clearfix"></div>

	</div> <!-- /.container -->
</section> <!-- /.pageInicio__services -->


<?php 
/*
* Seccion Servicios 
*/ 
?>
<section class="pageInicio__services pageWrapperSection relative">
	<div class="container">
		<!-- Titulo  --> <h2 class="titleCommon__page text-uppercase text-xs-center"> <span class="relative"> <?php _e( "servicios" , LANG ); ?> </span> </h2>

		<!-- Contenedor de Galería [ SERVICIOS ] -->
		<section class="relative">
			<!-- Wrapper para sliders -->
			<?php  
				/*
				*  Attributos disponibles 
				* data-items = number , data-items-responsive = number_mobile ,
				* data-margins = margin_in_pixels , data-dots = true or false
				* data-autoplay= true or false
				*/
			?>
			<div id="carousel-service" class="pageInicio_gal_services js-carousel-gallery" data-items="3" data-items-responsive="1" data-margins="32" data-dots="true" data-autoplay="true">
				<!-- Obtener todas las habitaciones -->
				<?php  
					$args = array(
						'order'          => 'ASC',
						'orderby'        => 'menu_order',
						'post_status'    => 'publish',
						'post_type'      => 'servicio',
						'posts_per_page' => -1,
					); 
					$services = get_posts( $args );
					foreach( $services as $service ):
				?> <!-- Artículo -->
					<article class="item-service text-xs-left">
						<!-- Link -->
						<a href="<?= get_permalink( $service->ID ); ?>">
						<figure>
							<?php if( has_post_thumbnail( $service->ID) ) : ?>
							<?= get_the_post_thumbnail( $service->ID , 'full', array('class'=>'img-fluid') ); ?>
							<?php endif; ?>
						</figure>
						</a> <!-- /link -->

						<!-- titulo --> 
						<a href="<?= get_permalink( $service->ID ); ?>">
						<h3 class="text-uppercase"> <span class="relative"> <?php _e( $service->post_title , LANG ); ?> </span> </h3>
						</a> <!-- /en link -->

						<!-- Extracto --> <div class="text-justify"> <?= !empty($service->post_content) ? apply_filters( 'the_content' , wp_trim_words( $service->post_content , 20 , '' ) ) : apply_filters("the_content" , "Actualizando Contenido..." ); ?></div>
					</article> <!-- /.item-service -->
				<?php endforeach; ?>
			</div> <!-- /.section__rooms_gallery -->

			<!-- Boton Comun ver más -->
			<?php  
				/* Obtener página de servicios */
				$page_servicios = get_page_by_path("servicios");
			?>
			<a href="<?= get_permalink( $page_servicios->ID ); ?>" class="pull-xs-right btnCommon__show-more text-uppercase"><?php _e( "ver más" , LANG ) ?></a>
			<!-- Limpiar Floats --> <div class="clearfix"></div>


		</section> <!-- /.relative -->

	</div> <!-- /.container -->
</section> <!-- /.pageInicio__services -->


<?php 
/*
* Seccion Nosotros
*/ 

?>
<section class="pageInicio__our pageWrapperSection relative">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-md-6">
				<!-- SECCION DE IMAGEN -->
				<figure>
					<?php  
						$image_nosotros = isset($theme_mod['image_nosotros']) && !empty($theme_mod['image_nosotros']) ? $theme_mod['image_nosotros'] : "https://placeimg.com/640/571/any";
					?>
					<img src="<?= $image_nosotros; ?>" alt="nosotros-p&m-constructora-" class="img-fluid imgNotBlur" />
				</figure>
			</div> <!-- /.col-xs-12 col-md-6 -->

			<div class="col-xs-12 col-md-6">
				
				<!-- Separacion en mobile --> <p class="hidden-sm-up"></p>

				<!-- SECCION TEXTO -->
				<section class="pageInicio__our__texto">

					<!-- Titulo  --> <h2 class="titleCommon__page text-uppercase text-xs-center"> <span class="relative"> <?php _e( "nosotros" , LANG ); ?> </span> </h2>

					<!-- Texto primario nosotros -->
					<?php if( isset($theme_mod['widget_nosotros_title']) && !empty($theme_mod['widget_nosotros_title']) ) : ?>
						<h3 class="text-xs-center text-md-left"> <?= $theme_mod['widget_nosotros_title']; ?></h3>
					<?php endif; ?>					

					<!-- Texto secundario nosotros -->
					<?php if( isset($theme_mod['widget_nosotros_subtitle']) && !empty($theme_mod['widget_nosotros_subtitle']) ) : ?>
						<p> <?= $theme_mod['widget_nosotros_subtitle']; ?></p>
					<?php endif; ?>

					<!-- Boton Comun ver más -->
					<?php  
						/* Obtener página de servicios */
						$page_nosotros = get_page_by_path("nosotros");
					?>
					<a href="<?= get_permalink( $page_nosotros->ID ); ?>" class="pull-xs-right btnCommon__show-more text-uppercase"><?php _e( "ver más" , LANG ) ?></a>
					<!-- Limpiar Floats --> <div class="clearfix"></div>

					<!-- Incluir SECCION PDF CATALOGO -->
					<?php include( locate_template("partials/pdf-catalogo.php") ); ?>

				</section> <!-- /.pageInicio__our__texto-->
				<!-- Titulo -->

			</div> <!-- /.col-xs-12 col-md-6 -->
		</div> <!-- /.row -->
	</div> <!-- /.container -->
</section> <!-- /.pageInicio__services -->

<?php 
/*
* Incluir template servicios
*/ 
include( locate_template("partials/banner-services.php") );

?>

<?php 
/*
* Seccion MISCELANEO
*/ 
?>

<section class="pageInicio__miscelaneo pageWrapperSection">
	<div class="container">
		<div class="row">

			<div class="col-xs-12 col-md-8">
				<!-- SECCION DE BLOG  -->
				<section>
					<!-- Titulo  --> <h2 class="titleCommon__page text-uppercase text-xs-center"> <span class="relative"> <?php _e( "blog" , LANG ); ?> </span> </h2>

					<!-- Contenedor de [ POST ] -->
					<section class="relative">
						<!-- Wrapper para sliders -->
						<?php  
							/*
							*  Attributos disponibles 
							* data-items = number , data-items-responsive = number_mobile ,
							* data-margins = margin_in_pixels , data-dots = true or false
							*/
						?>
						<div id="carousel-service" class="pageCommon_preview-post js-carousel-gallery" data-items="2" data-items-responsive="2" data-margins="20" data-dots="true" data-autoplay="true">
							<!-- Obtener todas las habitaciones -->
							<?php  
								$args = array(
									'order'          => 'ASC',
									'orderby'        => 'menu_order',
									'post_status'    => 'publish',
									'post_type'      => 'post',
									'posts_per_page' => 6,
								); 
								$ultimos_post = get_posts( $args );
								foreach( $ultimos_post as $u_post ):
							?> <!-- Artículo -->
								<article class="item-preview-post text-xs-left">
									<!-- Link -->
									<a href="<?= get_permalink( $u_post->ID ); ?>">
										<!-- Imagen -->
										<figure class="relative">
											<?php if( has_post_thumbnail( $u_post->ID) ) : ?>
											<?= get_the_post_thumbnail( $u_post->ID , 'full', array('class'=>'img-fluid') ); ?>
											<?php endif; ?>
											<!-- Fecha -->
											<figcaption class="text-uppercase text-xs-center container-flex align-content">
												<?=  get_the_date( 'd M',$u_post->ID ); ?>
											</figcaption>
										</figure>
									</a> <!-- /link -->	

									<!-- titulo --> <h3 class=""> 
										<a href="<?= get_permalink( $u_post->ID ); ?>">
											<?php _e( $u_post->post_title , LANG ); ?> 
										</a> <!-- / -->
									</h3>

									<!-- Extracto --> <div class="text-justify"> <?= !empty($u_post->post_content) ? apply_filters( 'the_content' , wp_trim_words( $u_post->post_content , 20 , '' ) ) : apply_filters("the_content" , "Actualizando Contenido..." ); ?></div>
								</article> <!-- /.item-u_post -->
							<?php endforeach; ?>
						</div> <!-- /.section__rooms_gallery -->

					</section> <!-- /.relative -->

				</section> <!-- /.section -->
			</div> <!-- /.col-xs-8 -->

			<div class="col-xs-12 col-md-4">
					
				<!-- Separador Solo en version mobile -->
				<p class="hidden-sm-up"></p>

				<!-- SECCION DE FACEBOOK -->
				<section>
					<!-- Titulo  --> <h2 class="titleCommon__page text-uppercase text-xs-center"> <span class="relative"> <?php _e( "facebook" , LANG ); ?> </span> </h2>

					<!-- Contenedor facebook -->
					<?php
						if( isset( $theme_mod['red_social_fb'] ) && !empty( $theme_mod['red_social_fb'] ) ) :
					?>
						<section class="container__facebook">
							<!-- Contebn -->
							<div id="fb-root" class=""></div>

							<!-- Script -->
							<script>(function(d, s, id) {
								var js, fjs = d.getElementsByTagName(s)[0];
								if (d.getElementById(id)) return;
								js = d.createElement(s); js.id = id;
								js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.5";
								fjs.parentNode.insertBefore(js, fjs);
							}(document, 'script', 'facebook-jssdk'));</script>

							<div class="fb-page" data-href="<?= $theme_mod['red_social_fb']; ?>" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-height="402" data-hide-cover="false" data-show-facepile="true">
							</div> <!-- /. fb-page-->
						</section> <!-- /.container__facebook -->
					<?php else: ?>
						<p class="text-xs-center">Opcion no habilitada temporalmente</p>
					<?php endif; ?>

				</section>
			</div><!-- /.col-xs-4 -->
		</div> <!-- /.row -->
	</div> <!-- /.container -->
</section> <!-- /.pageInicio__miscelaneo -->

<?php 
/*
* Incluir plantilla clientes
*/ 

include( locate_template("partials/carousel-clientes.php") );
?>



<!-- Footer -->
<?php get_footer(); ?>