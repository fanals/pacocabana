<?php
if (isset($_GET['config_file']))
	require_once($_GET['config_file']);
?>
<link rel="stylesheet" type="text/css" media="screen" href="<?= ABS_CSS ?>/meal.css">
<div id="meal_body">
<div id="side_menu">
    <a class="ajax_link" href="meal_cocktails"><img src="<?= ABS_IMAGES ?>/cocktails.jpg" /></a>
    <a class="ajax_link" href="meal_cocktails"><?= COCKTAIL ?></a>
    <a class="ajax_link" href="meal_starters"><img src="<?= ABS_IMAGES ?>/starters.jpg" /></a>
    <a class="ajax_link" href="meal_starters"><?= STARTERS ?></a>
    <a class="ajax_link" href="meal_fish"><img src="<?= ABS_IMAGES ?>/fish.jpg" /></a>
    <a class="ajax_link" href="meal_fish"><?= FISH ?></a>
    <a class="ajax_link" href="meal_meat-pasta"><img class="active" src="<?= ABS_IMAGES ?>/pasta.jpg" /></a>
    <a class="ajax_link" href="meal_meat-pasta"><?= MEAT_PASTA ?></a>
</div>
<?php
$handle = fopen(ABS_INCLUDE_MEAT_PASTA, "r");
if ($handle)
{
    $buffer = fgets($handle, 4096);
    $table_title = explode(':', $buffer);
    $table_title = $table_title[1];
    $html = '<table class="meal_tables"><tr><th colspan="2" class="tab_title">'.$table_title.'</th></tr>';
    while (($buffer = fgets($handle, 4096)) !== false)
    {
        $data = explode(':', $buffer);
        $name = $data[0];
        $ingredients = $data[1];
        $price = $data[2];
        
        if ($name == "NEW_TAB")
        {
            $html .= '</table><table class="meal_tables"><tr><img id="meal_photo" src="'.ABS_IMAGES.'/starters.jpg" /></tr><tr><th colspan="2" class="tab_title">'.$table_title.'</th></tr>';
            continue;
        }
        
        $html .= '<tr><td class="name">'.$name.'</td>';
        $html .= '<td class="price">'.$price.' RD$</td></tr>';
        $html .= '<tr><td class="ingredients">';
        $ingredients = explode(',', $ingredients);
        $last_ingredient = array_pop($ingredients);
        foreach($ingredients as $ingredient)
        {
            if ($ingredient == 'br')
                $html .= '<br/>';
            else
                $html .= $ingredient.' - ';
        }
        $html .= $last_ingredient;
        $html .= '</td></tr>';
        $html .= '<tr class="tab_separators"></tr>';
    }
    $html .= '</table>';
    echo $html;
    if (!feof($handle))
    {
        echo "Not the end of file...\n";
    }
    fclose($handle);
}
?>
<div style="clear: both;"></div>
</div>