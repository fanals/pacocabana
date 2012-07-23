<?php
if (isset($_GET['config_file']))
	require_once($_GET['config_file']);
?>
<link rel="stylesheet" type="text/css" media="screen" href="<?= ABS_CSS ?>/home.css">
<div id="welcome">
	<h3><?= WELCOME_TITLE ?></h3>
	<p><?= WELCOME_TXT ?></p>
	<img id="map" src="<?= ABS_IMAGES ?>/repdom-card.png" />
	<h3 id="map_title"><?= MAP_TITLE ?></h3>
</div>
<div id="container">
	<div id="example">
		<img src="<?= ABS_SHARE_MODULES; ?>/slideshow/img/new-ribbon.png" width="112" height="112" alt="New Ribbon" id="ribbon">
		<div id="slides">
			<div class="slides_container">
				<img src="<?= ABS_SHARE_MODULES; ?>/slideshow/slides/paco1.jpg" width="480" height="320" alt="">
				<img src="<?= ABS_SHARE_MODULES; ?>/slideshow/slides/paco2.jpg" width="480" height="320" alt="">
				<img src="<?= ABS_SHARE_MODULES; ?>/slideshow/slides/paco3.jpg" width="480" height="320" alt="">
				<img src="<?= ABS_SHARE_MODULES; ?>/slideshow/slides/paco4.jpg" width="480" height="320" alt="">
				<img src="<?= ABS_SHARE_MODULES; ?>/slideshow/slides/paco5.jpg" width="480" height="320" alt="">
				<img src="<?= ABS_SHARE_MODULES; ?>/slideshow/slides/paco6.jpg" width="480" height="320" alt="">
				<img src="<?= ABS_SHARE_MODULES; ?>/slideshow/slides/paco7.jpg" width="480" height="320" alt="">
				<img src="<?= ABS_SHARE_MODULES; ?>/slideshow/slides/paco8.jpg" width="480" height="320" alt="">
			</div>
			<a href="#" class="prev"><img src="<?= ABS_SHARE_MODULES; ?>/slideshow/img/arrow-prev.png" width="24" height="43" alt="Arrow Prev"></a>
			<a href="#" class="next"><img src="<?= ABS_SHARE_MODULES; ?>/slideshow/img/arrow-next.png" width="24" height="43" alt="Arrow Next"></a>
		</div>
		<img src="<?= ABS_SHARE_MODULES; ?>/slideshow/img/paco-frame.png" width="600" height="400" alt="" id="frame">
	</div>
</div>
<?php require_once(ABS_INCLUDE_SHARE_MODULES.'/slideshow/slideshow-script.php'); ?>
