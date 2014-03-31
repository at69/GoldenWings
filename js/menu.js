// DOM Ready
$(function() {

    var $el, leftPos, newWidth;
        $menu = $("#menu1");
    
    $menu.append("<li id='magic-line'></li>");
    
    var $magicLine = $("#magic-line");
    
    $magicLine
        .width($(".current_menu_item").width())
        .height($menu.height())
        .css("left", $(".current_menu_item a").position().left)
        .data("origLeft", $(".current_menu_item a").position().left)
        .data("origWidth", $magicLine.width())
        .data("origColor", $(".current_menu_item a").attr("rel"));
                
    $("#menu1 a").hover(function() {
        $el = $(this);
        leftPos = $el.position().left;
        newWidth = $el.parent().width();
        $magicLine.stop().animate({
            left: leftPos,
            width: newWidth 
        })
    }, function() {
        $magicLine.stop().animate({
            left: $magicLine.data("origLeft"),
            width: $magicLine.data("origWidth"),
            backgroundColor: $magicLine.data("origColor")
        });    
    });
    
    /* Kick IE into gear */
    $(".current_menu_item a").mouseenter();
    
});