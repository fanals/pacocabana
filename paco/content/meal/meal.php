<?php
if (isset($_GET['config_file']))
	require_once($_GET['config_file']);
?>
<link rel="stylesheet" type="text/css" media="screen" href="<?= ABS_CSS ?>/meal.css">
<div id="meal_body">
    
    <table id="meal_pres">
        <tr>
            <td><a class="ajax_link" href="meal_cocktails"><img src="<?= ABS_IMAGES ?>/cocktails.jpg" /></a></td>
            <td><a class="ajax_link" href="meal_starters"><img src="<?= ABS_IMAGES ?>/starters.jpg" /></a></td>
            <td><a class="ajax_link" href="meal_fish"><img src="<?= ABS_IMAGES ?>/fish.jpg" /></a></td>
            <td><a class="ajax_link" href="meal_meat-pasta"><img src="<?= ABS_IMAGES ?>/pasta.jpg" /></a></td>
        </tr>
        <tr>
            <td><a class="ajax_link" href="meal_cocktails"><?= COCKTAIL ?></a></td>
            <td><a class="ajax_link" href="meal_starters"><?= STARTERS ?></a></td>
            <td><a class="ajax_link" href="meal_fish"><?= FISH ?></a></td>
            <td><a class="ajax_link" href="meal_meat-pasta"><?= MEAT_PASTA ?></a></td>
        </tr>
    </table>

</div>