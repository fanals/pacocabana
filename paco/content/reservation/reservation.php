<?php
	if (isset($_GET['config_file']))
		require_once($_GET['config_file']);
?>
	<iframe style="width: 100%; height:550px; border: none;" src=<?= ABS_SHARE_MODULES.'/myseat/api/reserve.php?outletID=2' ?> scrolling="no" class="frame"> 
		&lt;p&gt;Your browser does not support iframes.&lt;/p&gt;
	</iframe>