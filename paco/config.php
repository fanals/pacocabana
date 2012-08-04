<?php

define('TITLE_WEBSITE', 'Paco Cabana');

define('ABS_INCLUDE_SHARE_ROOT', $_SERVER["DOCUMENT_ROOT"].'/pacocabana');
define('ABS_SHARE_ROOT', '/pacocabana');

define('ABS_INCLUDE_ROOT', ABS_INCLUDE_SHARE_ROOT.'/paco');
define('ABS_ROOT', ABS_SHARE_ROOT.'/paco');

define('ABS_INCLUDE_CONFIG_FILE', ABS_INCLUDE_ROOT.'/config.php');

define('ABS_SHARE_MODULES', ABS_SHARE_ROOT.'/modules');
define('ABS_INCLUDE_SHARE_MODULES', ABS_INCLUDE_SHARE_ROOT.'/modules');

define('ABS_MODULES', ABS_ROOT.'/modules');
define('ABS_INCLUDE_MODULES', ABS_INCLUDE_ROOT.'/modules');

define('ABS_CONTENT', ABS_ROOT.'/content');
define('ABS_INCLUDE_CONTENT', ABS_INCLUDE_ROOT.'/content');

define('ABS_CSS', ABS_ROOT.'/css');
define('ABS_INCLUDE_CSS', ABS_INCLUDE_ROOT.'/css');

define('ABS_JS', ABS_ROOT.'/js');
define('ABS_INCLUDE_JS', ABS_INCLUDE_ROOT.'/js');

define('ABS_IMAGES', ABS_ROOT.'/images');
define('ABS_INCLUDE_IMAGES', ABS_INCLUDE_ROOT.'/images');

define('ABS_LANG', ABS_ROOT.'/lang');
define('ABS_INCLUDE_LANG', ABS_INCLUDE_ROOT.'/lang');

session_start();
$_SESSION['hl'] = isset($_SESSION['hl']) ? $_SESSION['hl'] : 'do';
$hl_array = array('fr', 'us', 'do');
$hl_HL_array = array('fr_FR', 'en_US', 'es_DO');
if (isset($_GET['hl']) && in_array($_GET['hl'], $hl_array))
    $_SESSION['hl'] = $_GET['hl'];
$_SESSION['hl_HL'] = $hl_HL_array[array_search($_SESSION['hl'], $hl_array)];
require_once(ABS_INCLUDE_LANG.'/'.$_SESSION['hl'].'-lang.php');
?>
