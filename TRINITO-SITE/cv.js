$(function()
{
    $(".img-circle").animate({
        width: '65%',
        opacity: '0.6'
    });
    $(".thumbnail0").hide();
    $("#about").animate({opacity:'0.8'});
    
    $("#about").mouseenter(
        function(){
            $("#about").animate({opacity:'1'});     
            $(".thumbnail1").hide(500,function(){
                $(".img-circle").animate(
                    {
                        width:'70%',
                        opacity: '1'
                    },1000);  
                $(".thumbnail0").show(1000);
            });
    });
    $("#about").mouseleave(
        function(){         
            $(".thumbnail0").hide(500,function(){
                $(".img-circle").animate(
                    {
                        width:'65%',
                        opacity: '0.6'
                    },500);
                $(".thumbnail1").show(1000);
                $("#about").animate({opacity:'0.8'});
            });
            
        });
        
   
    $("#skills").mouseenter(function(){
        $(".progress").addClass("progress pro1");
    });

/*-----------------------------------------education-------------------------------------*/    
    $("#education-block2").hover(
        function(){
            $("#education-block2").addClass("educ");    
        },
        function(){
            $("#education-block2").removeClass("educ");
        });

    $("#education-block1").hover(
        function(){
            $("#education-block1").addClass("educ1");
        },
        function(){
            $("#education-block1").removeClass("educ1");
        }); 
 /*---------------------------------------------experience-----------------------------------*/
 
    $("#tml1").hover(
        function(){
            $("#tml11").addClass("timel");
        },
        function(){
            $("#tml11").removeClass("timel");
        });
    $("#tml2").hover(
        function(){
            $("#tml22").addClass("timel");
        },
        function(){
            $("#tml22").removeClass("timel");
        });
    $("#tml3").hover(
        function(){
            $("#tml33").addClass("timel");
        },
        function(){
            $("#tml33").removeClass("timel");
        });

    
});
