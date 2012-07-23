$(function()
{
        $("ul#menu span").css("opacity","0");
        $("ul#menu .active").css("opacity","1");
        $("ul#menu span").hover(function()
        {
                $(this).stop().animate(
                {
                        opacity: 1
                }, 'normal');
        },
        function ()
        {
                if (!$(this).hasClass("active"))
                {
                        $(this).stop().animate(
                        {
                                opacity: 0
                        }, 'normal');
                }
        });
});
