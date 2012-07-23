<!DOCTYPE html>
<html>
	<head>
		<title>Paco Cabana - Choose</title>
		<style>
			body
			{
				background: #666;
				padding: 0;
				margin: 0;
				height: 1000px;
			}
			#main
			{
				margin-left:auto;
				margin-right:auto;
				width: 100%;
				height: 100%;
				text-align: center;
			}
			A:link {text-decoration: none;}
			A:visited {text-decoration: none;}
			/* BOTH */
			.bloc
			{
				width: 50%;
				padding: 0;
				margin: 0;
				height: 100%;
				cursor: pointer;
			}
			.title
			{
				height: 20px;
				font-size: 26px;
				margin: 0;
				margin-top: 15px;
				margin-bottom: 10px;
				font-weight: bold;
				font-family: Tahoma;
			}
			.logo
			{
				margin-left: auto;
				margin-right: auto;
			}
			.photo
			{
				border: solid white 3px;
				margin-left: auto;
				margin-right: auto;
			}
			.color
			{
				margin: 0;
				padding: 0;
				background-position: bottom;	
			}
			.photo .color
			{
				margin-top: -3px;
				margin-left: -3px;
			}
			/* BISTROT */
			#bistrot
			{
				float: right;
			}
			#bistrot .title
			{
				
			}
			#bistrot .logo
			{
				margin-top: 61px;
				margin-bottom: 48px;
				background-image: url('images/logoBistrot.png');
				background-size: 100%;
				/*width: 400px;
				height: 114px;*/
			}
			#bistrot .logo .color
			{
				
			}
			#bistrot .photo
			{
				background-image: url('images/bistrot.jpg');
				background-size: 100%;
				/*width: 480px;
				height: 320px;*/
			}
			#bistrot .photo .color
			{

			}
			/* PACO */
			#paco
			{
				float: left;
			}
			#paco .title
			{
				
			}
			#paco .logo
			{
				background-image: url('images/logoPaco.png');
				background-size: 100%;
			/*	width: 350px;
				height: 215px;*/
			}
			#paco .logo .color
			{
				
			}
			#paco .photo
			{
				background-image: url('images/paco.jpg');
				background-size: 100%;
				/*width: 480px;
				height: 320px;*/
			}
			#paco .photo .color
			{
				
			}
		</style>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
		<script src="modules/jquery/jquery.animate-colors-min.js"></script>
		<script>
		$(function() {
			// BISTROT
			$("#bistrot .logo .color").css("opacity","0");
			$("#bistrot .photo .color").css("opacity","0");
			$("#bistrot").css("backgroundColor", "#2a2a2a");
			$("#bistrot .title").css("color", "#626262");
			$("#bistrot .photo").css({'width' : '475px', 'height' : '315px'});
			$("#bistrot .logo").css({'width' : '395px', 'height' : '111px'});
			$("#bistrot").hover(function () {
				$("#bistrot .logo .color").stop().animate({
					opacity: 1
				}, 'normal');
				$("#bistrot .photo .color").stop().animate({
					opacity: 1
				}, 'normal');
				$(this).animate({
					backgroundColor: '#4a1215'
				}, 'normal');
				$("#bistrot .title").stop().animate({
					color: '#7d6646'
				}, 'normal');
				$("#bistrot .photo").css({
					'width': '480px',
					'height' : '320px',
				}, 'normal');
				$("#bistrot .logo").css({
					'width': '400px',
					'height' : '114px',
				}, 'normal');
			},
			function () {
			/*	$("#bistrot .logo .color").stop().animate({
					opacity: 0
				}, 'normal');
				$("#bistrot .photo .color").stop().animate({
					opacity: 0
				}, 'normal');
				$(this).animate({
					backgroundColor: '#2a2a2a'
				}, 'normal');
				$("#bistrot .title").animate({
					color: '#626262'
				}, 'normal');*/
			
				$("#bistrot .logo .color").stop().css({
					opacity: 0
				}, 'normal');
				$("#bistrot .photo .color").stop().css({
					opacity: 0
				}, 'normal');
				$(this).stop().css({
					backgroundColor: '#2a2a2a'
				}, 'normal');
				$("#bistrot .title").stop().css({
					color: '#626262'
				}, 'normal');
				
				$("#bistrot .photo").stop().css({
					'width': '475px',
					'height' : '315px',
				}, 'normal');
				$("#bistrot .logo").stop().css({
					'width': '395px',
					'height' : '111px',
				}, 'normal');
			});
		});
		$(function() {
			// PACO
			$("#paco .logo .color").css("opacity","0");
			$("#paco .photo .color").css("opacity","0");
			$("#paco").css("backgroundColor", "#2a2a2a");
			$("#paco .title").css("color", "#626262");
			$("#paco .photo").css({'width' : '475px', 'height' : '315px'});
			$("#paco .logo").css({'width' : '345px', 'height' : '210px'});
			$("#paco").hover(function () {
				$("#paco .logo .color").stop().animate({
					opacity: 1
				}, 'normal');
				$("#paco .photo .color").stop().animate({
					opacity: 1
				}, 'normal');
				$(this).stop().animate({
					backgroundColor: '#4B463F'
				}, 'normal');
				$("#paco .title").stop().animate({
					color: '#ffa568'
				}, 'normal');
				$("#paco .photo").css({
					'width': '480px',
					'height' : '320px',
				}, 'normal');
				$("#paco .logo").css({
					'width': '350px',
					'height' : '215px',
				}, 'normal');
			},
			function () {
			/*	$("#paco .logo .color").stop().animate({
					opacity: 0
				}, 'normal');
				$("#paco .photo .color").stop().animate({
					opacity: 0
				}, 'normal');
				$(this).animate({
					backgroundColor: '#2a2a2a'
				}, 'normal');
				$("#paco .title").animate({
					color: '#626262'
				}, 'normal');*/
			
				$("#paco .logo .color").stop().css({
					opacity: 0
				}, 'normal');
				$("#paco .photo .color").stop().css({
					opacity: 0
				}, 'normal');
				$(this).stop().css({
					backgroundColor: '#2a2a2a'
				}, 'normal');
				$("#paco .title").stop().css({
					color: '#626262'
				}, 'normal');
			
			
				$("#paco .photo").stop().css({
					'width': '475px',
					'height' : '315px',
				}, 'normal');
				$("#paco .logo").stop().css({
					'width': '345px',
					'height' : '210px',
				}, 'normal');
			});
		});
		</script>
	</head>
	
	<body>
		<div id="main">
			<a href="paco/">
			<div id="paco" class="bloc">
				<p class="title">Las terrenas</p>
				<div class="logo">
					<div class="logo color"></div>
				</div>
				<div class="photo">
					<div class="photo color"></div>
				</div>
			</div>
			</a>
			<a href="bistrot/">
			<div id="bistrot" class="bloc">
				<p class="title">Santo Domingo</p>
				<div class="logo">
					<div class="logo color"></div>
				</div>
				<div class="photo">
					<div class="photo color"></div>
				</div>
				
			</div>
			</a>
			<div style="clear: both;"></div>
		</div>
	</body>
</html>