<?php header("Content-Type: text/html; charset=utf-8"); ?>
<!DOCTYPE html>
<html>
	<head>
		<?php include('head.php'); ?>
	</head>
	
	<body>
		<div id=main>
			<?php include('header.php'); ?>
			<div id=body>
			<?php
			if (isset($_GET['page']))
			{
				$file = explode('_', $_GET['page']);
				$folder = $file[0];
				$page = isset($file[1]) ? $file[1] : $file[0];
			
				if (file_exists(ABS_INCLUDE_CONTENT.'/'.$folder.'/'.$page.'.php'))
				{
					include(ABS_INCLUDE_CONTENT.'/'.$folder.'/'.$page.'.php');
				}
				else
					include(ABS_INCLUDE_CONTENT.'/home/home.php');
			}
			else
				include(ABS_INCLUDE_CONTENT.'/home/home.php');
			?>
			</div>
			<?php include('footer.php'); ?>
		</div>
	</body>
</html>