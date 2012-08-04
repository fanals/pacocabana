<span id="config_file" rel="<?= ABS_INCLUDE_CONFIG_FILE ?>"></span>
<div id="header">
    <a href="home" class="ajax_link"><div id="banner"></div></a>
    <div id="all_menu">
        <ul id="menu">
            <li id="firstMenuButton"><a href="../" class="choose"><span></span></a></li>
            <li><a href="home" class="home ajax_link"><span class="active"></span></a></li>
            <li><a href="meal" class="meal ajax_link"><span></span></a></li>
            <li><a href="event" class="event ajax_link"><span></span></a></li>
            <li><a href="reservation" class="reservation ajax_link"><span></span></a></li>
        </ul>
        <div id="music_button">
            <img id="music_not_playing" src="<?= ABS_IMAGES ?>/music_not_playing.png" />
            <img id="music_playing" src="<?= ABS_IMAGES ?>/music_playing.gif" />
        </div>
        <div id="flags">
                <a href="?hl=do" class="ajax_link"><img src="<?= ABS_IMAGES ?>/do.png" /></a>
                <a href="?hl=fr" class="ajax_link"><img src="<?= ABS_IMAGES ?>/fr.png" /></a>
                <a href="?hl=us" class="ajax_link"><img src="<?= ABS_IMAGES ?>/us.png" /></a>
        </div>
        <div style="clear: both;"></div>
    </div>
    <object id="player1" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=10,0,0,0" width="0" height="0">
            <PARAM NAME=movie VALUE="audioplay.swf?playerid=1&configfile=player_config.xml">
            <PARAM NAME=quality VALUE=high>
            <PARAM NAME=wmode VALUE="transparent">
            <PARAM NAME="allowScriptAccess" value="always" />
            <embed wmode="transparent" src="audioplay.swf?playerid=1&configfile=player_config.xml" quality=high width="0" height="0" name="player1" allowScriptAccess="always"
                align="" TYPE="application/x-shockwave-flash"
                pluginspage="http://www.macromedia.com/go/getflashplayer">
            </embed>
    </object>
</div>
