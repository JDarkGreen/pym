<?php /* Seccion que muestra el pdf catalogo */ ?>

<!-- Sección de Catálogo -->
<section class="pageInicio__our__pdf text-xs-center text-md-left">
	<?php /*Obtener PDF*/ 
		$link_catalogo = isset($theme_mod['widget_nosotros_pdf']) && !empty($theme_mod['widget_nosotros_pdf']) ? $theme_mod['widget_nosotros_pdf'] : "#";
	?>
	<!-- Imagen Icono Ocultar en mobile --> <figure class="hidden-xs-down"><img src="<?= IMAGES ?>/icon/icon-file.png" alt="pdf-catalogo-constructora" class="img-fluid imgNotBlur"></figure>

	<!-- Enlace --> <a target="_blank" href="<?= $link_catalogo; ?>" class="btnCommon__show-more btnCommon__show-more--black text-uppercase"><?php _e( "descargar brochure" , LANG ) ?></a>
</section> <!-- /.pageInicio__our__pdf -->