<?php /* Archivo que contiene el partial de carousel clientes */ ?>

<!-- Seccion Clientes  -->
<section class="pageInicio_clientes">
	<div class="container">

		<!-- Titulo  --> <h2 class="titleCommon__page text-uppercase text-xs-center"> <span class="relative"> <?php _e( "nuestros clientes" , LANG ); ?> </span> </h2> 

		<!-- Separador --> <br />

		<!-- Contenedor relativo -->
		<div class="relative">

			<!-- Wrapper para sliders -->
			<?php  
				/*
				*  Attributos disponibles 
				* data-items = number , data-items-responsive = number_mobile ,
				* data-margins = margin_in_pixels , data-dots = true or false
				*/
			?>
			<div id="carousel-clientes" class="pageInicio_clientes__gallery js-carousel-gallery" data-items="1" data-items-responsive="5" data-margins="63" data-dots="false" data-autoplay="true">
				<?php /*Extraer los clientes*/ 
					$args = array(
						'order'          => 'ASC',
						'orderby'        => 'menu_order',
						'post_status'    => 'publish',
						'post_type'      => 'cliente',
						'posts_per_page' => -1,
					);
					$clientes = get_posts( $args );
					foreach( $clientes as $cliente ) :
				?> <!-- Imagen -->
					<figure>
						<?= get_the_post_thumbnail( $cliente->ID,'full',array('class'=>'img-fluid') ); ?>
					</figure> <!-- /figure -->
				<?php endforeach; ?> 
			</div> <!-- /.pageInicio_clientes__gallery -->

			<!-- Flechas de Carousel  -->
			<?php /*
			<a href="#" id="arrow__cliente--prev" class="arrow__common-slider arrow__common-slider--prev">
				<i class="fa fa-chevron-circle-left" aria-hidden="true"></i>
			</a>

			<a href="#" id="arrow__cliente--next" class="arrow__common-slider arrow__common-slider--next">
				<i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
			</a>  */ ?>

		</div> <!-- /.relative -->

	</div> <!-- /.container -->
</section> <!-- /.pageInicio_clientes -->