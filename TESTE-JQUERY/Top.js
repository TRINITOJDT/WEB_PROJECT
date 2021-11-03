$(document).ready(function(){

    var $mainMenuItems = $("#main-menu ul").children("li"),
    totaMainMenuItemes = $mainMenuItems.length,
    openedIndex = 2,

    //init = function()----------------------------------------------------------------------------------------------
    //{
    //    $mainMenuItems.children(".images").click(function(){
    //        var newIndex = $(this).parent().index(),
    //        $item = $mainMenuItems.eq(newIndex),
    //        $colorImage = $item.find(".color");
    //        $colorImage.animate({left:"0px"},500);
    //        $item.animate({width:"420px"},500);
    //        $openedIndex = newIndex;
    //    });
    //};
    //init();--------------------------------------------------------------------------------------------------------

    init = function(){
        bindEvents();
        if(validIndex(openedIndex))
            animateItem1($mainMenuItems.eq(openedIndex), 750);
    },

    bindEvents = function(){
        $mainMenuItems.children(".images").click(function(){

            var newIndex = $(this).parent().index(),
            $item = $mainMenuItems.eq(newIndex);
            
            if(openedIndex === newIndex)
            {
                animateItem2($item, 500);
                openedIndex = -1;
            }
            else
            {
                if(validIndex(newIndex))
                {
                    animateItem2($mainMenuItems.eq(openedIndex), 500);
                    openedIndex = newIndex;
                    animateItem1($item, 500);
                }
            }     
        });

        $(".button").hover(
            function(){
                $(this).addClass("hovered");
            },
            function(){
                $(this).removeClass("hovered");
            }
        );

        $(".button").click(
            function(){
            var newIndex = $(this).index();
            $item = $mainMenuItems.eq(newIndex);
            
            if(openedIndex === newIndex)
            {
                animateItem2($item, 500);
                openedIndex = -1;
            }
            else
            {
                if(validIndex(newIndex))
                {
                    animateItem2($mainMenuItems.eq(openedIndex), 500);
                    openedIndex = newIndex;
                    animateItem1($item, 500);
                }
            }
        });
    },

    validIndex = function(indexToCheck)
    {
        return (indexToCheck >= 0) && (indexToCheck < totaMainMenuItemes);
    },
    
    animateItem1 = function($item, speed){
        $colorImage = $item.find(".color");
        $colorImage.animate({left:"0px"},500);
        $item.animate({width:"420px"},500);
    },
    animateItem2 = function($item, speed){
        $colorImage = $item.find(".color");
        $colorImage.animate({left:"140px"},500);
        $item.animate({width:"140px"},500);
    };

    init();

});
