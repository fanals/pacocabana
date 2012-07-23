<?php
        session_start();
        header("Content-type: text/css");   
        /*header("HTTP/1.0 304 Not Modified");*/
        switch ($_SESSION['hl'])
        {
            case 'fr' :
                define ('SPRITE_MENU', 'spriteMenuFR.png');
                break;
            case 'us' :
                define ('SPRITE_MENU', 'spriteMenuUS.png');
                break;
            default :
                define ('SPRITE_MENU', 'spriteMenuDO.png');
        }
        
        /* MENU */
  
        $menu = array("choose" => 81,
                      "home" => 94,
                      "meal" => 89,
                      "event" => 120,
                      "press" => 94);

        $offset = 0;
        foreach ($menu as $key => $value)
        {
            $menu[$key] = array('width' => $value, 'offset' => $offset);
            $offset -= $value;
        }
?>
	/* Firefox Dotted Outline Fix */
	a:active { 
		outline: none; 
	}
	
	/* Firefox Dotted Outline Fix */
	a:focus { 
		-moz-outline-style: none; 
	}
	
	/* Menu Body */
	ul#menu {
		height:45px;
		background:url(../images/menu-bg.png) repeat-x;
		list-style:none;
		margin: 0;
		width: 680px;
		padding:0;
                float: left;
	}
	
	#firstMenuButton
	{
		margin-left: 0px;
	}
	/* Float LI Elements - horizontal display */
	ul#menu li {
		float:left;
	}

	/* Link - common attributes */
	ul#menu li a {
		background: url(../images/<?= SPRITE_MENU; ?>) no-repeat scroll top left;
		display:block;
		height:45px;
		position:relative;
	}
	
	/* Span (on hover) - common attributes */
	ul#menu li a span {
	 	background: url(../images/<?= SPRITE_MENU; ?>) no-repeat scroll bottom left;
		display:block;
		position:absolute;
		top:0;
		left:0;
		height:100%;
		width:100%;
		z-index:100;
	}
	
	/* Span (on hover) - display pointer */
	ul#menu li a span:hover {
		cursor:pointer;
	}
	
        /* Specify width and background position attributes specifically for the class: "Choose" */
	ul#menu li a.choose {
		width:<?= $menu['choose']['width'] ?>px;
                background-position:<?= $menu['choose']['offset'] ?>px 0px;
	}
	/* Shift background position on hover for the class: "Choose" */
	ul#menu li a.choose span {
		background-position:<?= $menu['choose']['offset'] ?>px -45px;
	}
        
	/* Specify width and background position attributes specifically for the class: "Accueil" */
	ul#menu li a.home {
		width:<?= $menu['home']['width'] ?>px;
                background-position:<?= $menu['home']['offset'] ?>px 0px;
	}
	/* Shift background position on hover for the class: "Accueil" */
	ul#menu li a.home span {
		background-position:<?= $menu['home']['offset'] ?>px -45px;
	}
	
	/* Specify width and background position attributes specifically for the class: "Meal" */
	ul#menu li a.meal {
		width:<?= $menu['meal']['width'] ?>px;
		background-position:<?= $menu['meal']['offset'] ?>px 0px;
	}
	/* Shift background position on hover for the class: "Meal" */
	ul#menu li a.meal span {
		background-position:<?= $menu['meal']['offset'] ?>px -45px;
	}

	/* Specify width and background position attributes specifically for the class: "Event" */
	ul#menu li a.event {
		width:<?= $menu['event']['width'] ?>px;
		background-position:<?= $menu['event']['offset'] ?>px 0px;
	}	
	/* Shift background position on hover for the class: "Event" */
	ul#menu li a.event span {
		background-position:<?= $menu['event']['offset'] ?>px -45px;
	}
	
	/* Specify width and background position attributes specifically for the class: "Press" */
	ul#menu li a.press {
		width:<?= $menu['press']['width'] ?>px;
		background-position:<?= $menu['press']['offset'] ?>px 0px;
	}	
	/* Shift background position on hover for the class: "Press" */
	ul#menu li a.press span {
		background-position:<?= $menu['press']['offset'] ?>px -45px;
	}
