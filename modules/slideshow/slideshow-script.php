<link rel="stylesheet" href="<?= ABS_SHARE_MODULES ?>/slideshow/css/global.css">
<script src="<?= ABS_SHARE_MODULES ?>/slideshow/js/slides.min.jquery.js"></script>
<script>
        $(function(){
                $('#slides').slides({
                        effect: 'fade',
                        fadeSpeed: 1000,
                        preload: true,
                        preloadImage: '<?= ABS_SHARE_MODULES ?>/slideshow/img/loading.gif',
                        play: 5000,
                        crossfade: true,
                        pause: 2000,
                        hoverPause: true
                });
        });
</script>
