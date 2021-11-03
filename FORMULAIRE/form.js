$(function()
{
    $("#panel-form").submit(function(e){
        e.preventDefault();
        $(".comment").empty();
        var postdata = $("#panel-form").serialize();

        $.ajax({
            type: 'POST',
            url: 'form.php',
            data: postdata,
            dataType: 'json',
            success: function(result)
            {
                if(result.isSuccess)
                {
                    $("#panel-form").append("<p class='remerciment'>Votre message a bien ete envoyer, merci de m'avoir contacter !!!</p>");
                }
                else
                {
                    $("#nom + .comment").html(result.nomError);
                    $("#prenom + .comment").html(result.prenomError);
                    $("#phone + .comment").html(result.phoneError);
                    $("#email + .comment").html(result.emailError);
                    $("#coms + .comment").html(result.comsError);
                }
            }
            
        });
    });
});