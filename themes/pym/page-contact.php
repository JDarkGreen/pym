<?php /* Template Name: Página Contacto Plantilla */ ?>

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

		<!-- Seccion de datos  -->
		<div class="row">
			
			<div class="col-xs-6">
	
				<!-- SECCIÓN DE DATOS  -->
				<section class="pageContact__data">

					<!-- Titulo  --> <h2 class="titleCommon__page text-uppercase"> <span class="relative"> <?php _e( "atención al cliente" , LANG ); ?> </span> </h2>

					<!-- Lista de Datos -->
					<ul class="mainFooter__list-data">

						<!-- Telefono -->
						<?php if( isset($theme_mod['contact_tel']) && !empty($theme_mod['contact_tel']) ) : ?>
							<li> <!-- Icono --> <i class="fa fa-phone " aria-hidden="true"></i>
							<?php 
								$numeros = $theme_mod['contact_tel'];
								$numeros = explode( "," , $numeros );
								foreach( $numeros as $numero => $value ) : 
							?> <p> <?= $value; ?></p>
							<?php endforeach; ?>
							</li>
						<?php endif; ?>

						<!-- Email -->
						<?php if( isset($theme_mod['contact_email']) && !empty($theme_mod['contact_email']) ) : ?>
							<li> <!-- Icono --> <i class="fa fa-envelope" aria-hidden="true"></i>
								<p class="text-red"><?= $theme_mod['contact_email']; ?> </p>
							</li>
						<?php endif; ?>

						<!-- Ubicación -->
						<?php if( isset($theme_mod['contact_address']) && !empty($theme_mod['contact_address']) ) : ?>
							<li> <!-- Icono --> <i class="fa fa-map-marker" aria-hidden="true"></i>
							<?= $theme_mod['contact_address']; ?> 
							</li>
						<?php endif; ?>								

					</ul> <!-- /.mainFooter__list-data -->

				</section> <!-- /. -->

				<!-- SECCIÓN DE REDES SOCIALES  -->
				<section class="pageContact__social">

					<!-- Titulo  --> <h2 class="titleCommon__page text-uppercase"> <span class="relative"> <?php _e( "redes sociales" , LANG ); ?> </span> </h2>

					<!-- Lista de Redes Sociales -->
					<ul class="social-links social-links--gray">
						<!-- Facebook -->
						<?php if( isset($theme_mod['red_social_fb']) && !empty($theme_mod['red_social_fb']) ) : ?>
							<li><a href="<?= $theme_mod['red_social_fb']; ?>">
								<i class="fa fa-facebook" aria-hidden="true"></i>
							</a></li>
						<?php endif; ?>
						<!-- Twitter -->
						<?php if( isset($theme_mod['red_social_twitter']) && !empty($theme_mod['red_social_twitter']) ): ?>
							<li><a href="<?= $theme_mod['red_social_twitter']; ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a> </li>
						<?php endif; ?>
						<!-- Youtube -->
						<?php if( isset($theme_mod['red_social_ytube']) && !empty($theme_mod['red_social_ytube']) ) : ?>
							<li><a href="<?= $theme_mod['red_social_ytube']; ?>"><i class="fa fa-youtube" aria-hidden="true"></i></a> </li>
						<?php endif; ?>
					</ul> <!-- /.social-links -->

				</section> <!-- /. -->
				
			</div> <!-- /.col-xs-6 -->

			<div class="col-xs-6">

				<!-- SECCIÓN DE REDES SOCIALES  -->
				<section class="pageContact__formulary">

					<!-- Titulo  --> <h2 class="titleCommon__page text-uppercase"> <span class="relative"> <?php _e( "llena nuestro formulario" , LANG ); ?> </span> </h2>

					<!-- Limpiar floats --><div class="clearfix"></div>

					<!-- Formulario -->
					<form id="form-contacto" action="" class="pageContacto__form" method="POST">

						<!-- Nombre -->
						<div class="pageContacto__form__group">
							<label for="input_name" class="sr-only"></label>
							<input type="text" id="input_name" name="input_name" placeholder="<?php _e( 'Nombres', LANG ); ?>" required />
						</div> <!-- /.pageContacto__form__group -->

						<!-- Email -->
						<div class="pageContacto__form__group">
							<label for="input_email" class="sr-only"></label>
							<input type="email" id="input_email" name="input_email" placeholder="<?php _e( 'E-mail', LANG ); ?>" data-parsley-trigger="change" required="" data-parsley-type-message="Escribe un email válido"/>
						</div> <!-- /.pageContacto__form__group -->						

						<!-- Teléfono -->
						<div class="pageContacto__form__group">
							<label for="input_phone" class="sr-only"></label>
							<input type="text" id="input_phone" name="input_phone" placeholder="Teléfono" data-parsley-type='digits' data-parsley-type-message="Solo debe contener números" required="" />
						</div> <!-- /.pageContacto__form__group -->

						<!-- Asunto -->
						<div class="pageContacto__form__group">
							<label for="input_subject" class="sr-only"></label>
							<input type="text" id="input_subject" name="input_subject" placeholder="<?php _e( 'Nombres', LANG ); ?>" required />
						</div> <!-- /.pageContacto__form__group -->

						<!-- Texto -->
						<div class="pageContacto__form__group">
							<label for="input_email" class="sr-only"></label>
							<textarea name="input_consulta" id="input_consulta" placeholder="<?php _e( 'Su Mensaje', LANG ); ?>" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-minlength-message="Necesitas más de 20 caracteres" data-parsley-validation-threshold="10"></textarea>
						</div> <!-- /.pageContacto__form__group -->

						<button type="submit" id="send-form" class="btnCommon__show-more btnCommon__show-more--rojo text-uppercase">
							<?php _e( 'enviar' , LANG ); ?>
						</button> <!-- /.btn__send-form -->

						<!-- Limpiar Floats  --> <div class="clearfix"></div>

					</form> <!-- /.pageContacto__form -->

				</section> <!-- /. -->				

			</div> <!-- /.col-xs-6 -->

		</div> <!-- /.row -->

		<!-- Linea separadora --> <div id="separator-line-gray"></div>
		
		<!-- Sección de Mapa -->
		<section class="pageContact__map">
			
			<div class="container"> 

			<!-- Titulo  --> <h2 class="titleCommon__page text-uppercase"> <span class="relative"> <?php _e( "mapa" , LANG ); ?> </span> </h2>
			
			<?php if( isset($theme_mod['contact_mapa']) && !empty($theme_mod['contact_mapa']) ) : ?>
			<div id="canvas-map"></div>
			<?php else: ?>
				<div class="container"> <?php _e("Actualizando Contenido" , LANG ); ?></div>
			<?php endif; ?>

		</section> <!-- /.pageContact__map -->		

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

<!-- Script Google Mapa -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCNMUy9phyQwIbQgX3VujkkoV26-LxjbG0"></script>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>

<!-- Scripts Solo para esta plantilla -->
<?php 
	if( !empty($theme_mod['contact_mapa']) ) : 
	$mapa = explode(',', $theme_mod['contact_mapa'] ); 

	$zoom_mapa = isset( $theme_mod['contact_mapa_zoom'] ) && !empty( $theme_mod['contact_mapa_zoom'] ) ? $theme_mod['contact_mapa_zoom'] : 16;
?>
	<script type="text/javascript">	

		<?php  
			$lat = $mapa[0];
			$lng = $mapa[1];
		?>

	    var map;
	    var lat = <?= $lat ?>;
	    var lng = <?= $lng ?>;

	    function initialize() {
	      //crear mapa
	      map = new google.maps.Map(document.getElementById('canvas-map'), {
	        center: {lat: lat, lng: lng},
	        zoom  : <?= $zoom_mapa; ?>,
	      });

	      //infowindow
	      var infowindow    = new google.maps.InfoWindow({
	        content: '<?= "P&M Constructora" ?>'
	      });

	      //icono
	      //var icono = "<?= IMAGES ?>/icon/contacto_icono_mapa.jpg";

	      //crear marcador
	      marker = new google.maps.Marker({
	        map      : map,
	        draggable: false,
	        animation: google.maps.Animation.DROP,
	        position : {lat: lat, lng: lng},
	        title    : "<?php _e(bloginfo('name') , LANG )?>",
	        //icon     : "<?= IMAGES . '/icon/icon_map.png' ?>",
	      });
	      //marker.addListener('click', toggleBounce);
	      marker.addListener('click', function() {
	        infowindow.open( map, marker);
	      });
	    }

	    google.maps.event.addDomListener(window, "load", initialize);

	</script>
<?php endif; ?>


<!-- Footer -->
<?php get_footer(); ?>