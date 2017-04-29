/**
 * Created by cohenmacdonald1 on 10/04/2017.
 */

$(document).ready(function()
{
    $(".header-image").click(function()
    {
        $(".header-image-menu").fadeToggle();
    });

    $(".tattoo-social-media-like i").click(function()
    {
        // $(".tattoo-social-media-like span").html(function(i,val){
        //     $.ajax({
        //         url: ""
        //     });
        // });
        $(this).toggleClass("orangeHighlight");
    });

    $('input#tattoo-newest').on('click', function() {
            $.post('app/functions/retrievecomments.func.php', function(data) {
                $('div#tattoo-comment-display-wrapper').text(data);
            });
    });

    $('.dtc').each(function() {

      var image = $(this).children().first();

        $(image).mouseenter(function() {

            $(this).next().show();

            $(this).next().mouseleave(function() {
               $(this).hide();
            });

        });

    });

});


