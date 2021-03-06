(function($){
    var origContent = "";
    var lastHash = "";
    var config_file_path = "";
    var str_get_variables = "";
    function change_page(data)
    {
        $("#body").fadeOut(300, function(){
          $(this).empty();
          $(this).append(data);
          $(this).fadeIn(300, function(){});
        });
    }

    function go_to_home(XMLHttpRequest, textStatus, errorThrown)
    {
      $.ajax({
          url: 'content/home/home.php'+str_get_variables,
          success: change_page
          });
    }

    function loadContent(hash)
    {
        if (hash != "")
        {
            lastHash = hash;
            var folder_page = hash.split('_');
            var folder = folder_page[0];
            var page = folder;
            if (folder_page.length == 2)
              page = folder_page[1];
            if (origContent == "")
            {
                origContent = $('#body').html();
            }
            $("#menu li .ajax_link span").css('opacity', '0');
            $("#menu li .ajax_link span").removeClass("active");
            $("."+folder+" span").addClass("active");
            $("."+folder+" span").css('opacity', '1');
            $.ajax({
              url: 'content/'+folder+'/'+page+'.php'+str_get_variables,
              success: change_page,
              error: go_to_home
              });
        }
        else if (origContent != "")
        {
            $('#body').html(origContent);
        }
    }

  function parse_get_variables(strData)
  {
    var objCollection = {}
    
    strData.replace(new RegExp("\\?(\\w+)=([^\\&]*)", "gi"),
        function($0, $1, $2)
        {
          objCollection[$1] = $2;
        }
    );
    return (objCollection);
  }
  
  function change_language(new_l)
  {
    // Dictionary containing each offset of the sprite menu for the first menu button
    var l_dict = {'fr': 0, 'us': -680, 'do': -1360};
    if (typeof l_dict[new_l] != 'undefined')
    {
      // Offset of the current first menu button
      // For example us will give -680 (like in l_dict)
      // The Number(element.slice(0, -2)) transforms element='18px' to 18
      var old_l = Number(($('#firstMenuButton a').css('background-position-x')).slice(0, -2));
      // Calculating the difference between the old langage and the new one
      // To go from 'us' to 'do' for example it will be -1360 - -680 = -680
      var offset = l_dict[new_l] - old_l;
      $("#menu li a").hide("clip", { direction: "horizontal" }, 500, function() {
        // Modifying each menu button to have the right position-x by adding the current position to the previously calculated offset
        $(this).css('background-position-x', function(index, value) {return String(Number(value.slice(0, -2)) + offset) + 'px';});
        $(this.firstChild).css('background-position-x', function(index, value) {return String(Number(value.slice(0, -2)) + offset) + 'px';});
        $(this).show("clip", { direction: "horizontal" }, 500);
        });
      if (lastHash.length == 0)
        loadContent("home");
      else
        loadContent(lastHash);
    }
  }

  function manage_get_php_variables(url)
  {
    var objData = parse_get_variables(url);
    url = url.replace(/^\?/gi, '&');
    str_get_variables += url;
   
    for (var key in objData)
    {
      if (key == "hl")
        change_language(objData[key]);
    }
  }

function ajax_link_click()
{
  var url = $(this).attr('href');
  url = url.replace(/^.*#/, '');
  if (url.charAt(0) == '?')
    manage_get_php_variables(url);
  else
  {
    url = url.replace(/\?.*$/gi, '');
    if (url == lastHash)
      loadContent(url);
    else
      $.history.load(url);
  }
  str_get_variables = config_file_path;
  return false;
}

    $(document).ready(function() {
            config_file_path = "?config_file="+$("#config_file").attr('rel');
            str_get_variables = config_file_path;
            $.history.init(loadContent, { unescape: "/&?=" });
            $(document).on("click", ".ajax_link", ajax_link_click);
        });
})(jQuery);
