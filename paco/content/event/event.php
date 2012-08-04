<?php
	if (isset($_GET['config_file']))
		require_once($_GET['config_file']);

	require_once(ABS_INCLUDE_SHARE_MODULES.'/wordpress/wp-blog-header.php'); 
?>
<link rel="stylesheet" type="text/css" media="screen" href="<?= ABS_CSS ?>/event.css">

<div id="events">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?> 

<div class='article'>
	<p class="the_date"><?= POSTED_ON ?>
		<span class="stress_word">
			<?php echo strftime("%d %B %Y", strtotime(get_the_time('Y-m-d'))); ?>
		</span>
	</p>
	<h3 class='the_title'><?php the_title(); ?></h3>
	<div class='the_content'><?php the_content(); ?></div>
</div>
<hr>

<?php endwhile; else: ?> 
<p><?php _e('Sorry, no posts matched your criteria.'); ?></p> 
<?php endif; ?> 
</div>

<!-- h3>Jazz Festival - 05/11/2011</h3>

<a href="http://www.noticiassin.com/2011/11/las-terrenas-vibrara-a-ritmo-de-jazz/">Noticiassin</a>
<a href="http://www.diariolibre.com/revista/2011/11/03/i311589_index.html">Diaro Libre</a>
<a href="http://www.las-terrenas-live.com/las-terrenas/noticias/ano-2011/noviembre-2011/eric-litman-y-su-banda-wavelength-paco-cabana.html">Las Terrenas Live</a>
<a href="http://jazzendominicana.blogspot.com/2011/11/tsunami-de-jazz-blues-las-terrenas-las.html">Jazz en dominicana</a>
<a href="http://ultimasnoticias.cc/tag/wavelength">Ultima noticias</a>
<a href="http://nortediario.blogspot.com/2011/11/tsunami-de-jazz-blues-las-terrenas.html">Norte Diario</a>
<a href="http://www.eldiariodelabahia.com/2011/11/eric-litman-en-las-terrenas-jazz.html">El diario de la bahia</a>
<a href="http://lascallesdesantodomingo.blogspot.com/2011/11/noticias-sin-servicios-informativos_03.html">Las calles de Santo Domingo</a -->