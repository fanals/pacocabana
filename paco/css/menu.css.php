<?php
        session_start();
        header("Content-type: text/css");
        /* Offset in the sprite menu for the right langage */
        switch ($_SESSION['hl'])
        {
            case 'fr' :
            	$offset = 0;  
                break;
            case 'us' :
            	$offset = -680;
                break;
            default:
            	$offset = -1360;
        }
        
        /* Width in pixel for each part of the menu */
        $menu = array("choose" => 81,
                      "home" => 110,
                      "meal" => 107,
                      "event" => 157,
                      "reservation" => 225);

        /* Calculating width and offset in the sprite for each part of the menu */
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
		background: url(../images/spriteMenu.png) no-repeat;
		background-position-y: 0px;
		display:block;
		height:45px;
		position:relative;
	}
	
	/* Span (on hover) - common attributes */
	ul#menu li a span {
	 	background: url(../images/spriteMenu.png) no-repeat;
	 	background-position-y: -45px;
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
                background-position-x:<?= $menu['choose']['offset'] ?>px;
	}
	/* Shift background position on hover for the class: "Choose" */
	ul#menu li a.choose span {
		background-position-x:<?= $menu['choose']['offset'] ?>px;
	}
        
	/* Specify width and background position attributes specifically for the class: "Accueil" */
	ul#menu li a.home {
		width:<?= $menu['home']['width'] ?>px;
                background-position-x:<?= $menu['home']['offset'] ?>px;
	}
	/* Shift background position on hover for the class: "Accueil" */
	ul#menu li a.home span {
		background-position-x:<?= $menu['home']['offset'] ?>px;
	}
	
	/* Specify width and background position attributes specifically for the class: "Meal" */
	ul#menu li a.meal {
		width:<?= $menu['meal']['width'] ?>px;
		background-position-x:<?= $menu['meal']['offset'] ?>px;
	}
	/* Shift background position on hover for the class: "Meal" */
	ul#menu li a.meal span {
		background-position-x:<?= $menu['meal']['offset'] ?>px;
	}

	/* Specify width and background position attributes specifically for the class: "Event" */
	ul#menu li a.event {
		width:<?= $menu['event']['width'] ?>px;
		background-position-x:<?= $menu['event']['offset'] ?>px;
	}	
	/* Shift background position on hover for the class: "Event" */
	ul#menu li a.event span {
		background-position-x:<?= $menu['event']['offset'] ?>px;
	}
	
	/* Specify width and background position attributes specifically for the class: "Reservation" */
	ul#menu li a.reservation {
		width:<?= $menu['reservation']['width'] ?>px;
		background-position-x:<?= $menu['reservation']['offset'] ?>px;
	}	
	/* Shift background position on hover for the class: "reservation" */
	ul#menu li a.reservation span {
		background-position-x:<?= $menu['reservation']['offset'] ?>px;
	}
