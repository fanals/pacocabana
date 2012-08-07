<?php
	if (isset($_GET['config_file']))
		require_once($_GET['config_file']);
	require_once(ABS_INCLUDE_SHARE_MODULES.'/wordpress/wp-blog-header.php');
?>
<link rel="stylesheet" type="text/css" media="screen" href="<?= ABS_CSS ?>/event.css">

<div id="events">

<?php query_posts('category_name='.$_SESSION['hl']); ?>
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