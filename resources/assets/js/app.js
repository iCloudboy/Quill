/**
 * Created by cohenmacdonald1 on 10/04/2017.
 */

$(document).ready(function()
{
    $(".header-image").click(function()
    {
        var X=$(this).attr('id');
        if(X===1)
        {
            $(".header-image-menu").show();
            $(this).attr('id', '0');
        }
        else
        {
            $(".header-image-menu").hide();
            $(this).attr('id', '1');
        }
    });

    // $(".header-image-menu").mouseup(function()
    // {
    //     return false;
    // });
    //
    // $(".header-image").mouseup(function()
    // {
    //     return false;
    // });
    //
    // $(document).mouseup(function()
    // {
    //     $(".header-image-menu").hide();
    //     $(".header-image").attr('id', '');
    // });

});
