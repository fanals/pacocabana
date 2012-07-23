function getPlayer(movieName)
{
        if (navigator.appName.indexOf("Microsoft") != -1) 
        {
                return window[movieName];
        } 
        else 
        {
                return document[movieName];
        }
}
        
$(function()
{
    $("#music_playing").click(function() {
        getPlayer('player1').stopMusic();
        $(this).css('width', '0px');
        });
    $("#music_not_playing").click(function() {
        getPlayer('player1').playMusic();
        $("#music_playing").css('width', '105px');
        });
});