$(function()
{

    $("#livres").hide();

    $("#l1").click(function(){
        $("#livr").hide(500,function(){
            $("#livres").show(500);
        });
       
    });

    $("#l2").click(function(){
        $("#livres").hide(500,function(){
            $("#livr").show(500);
        });
    });

});