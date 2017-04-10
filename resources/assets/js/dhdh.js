$(document).ready(function()
{
    $(".account").click(function()
    {
        var X=$(this).attr('id');
        if(X==1)
        {
            $(".submenu").show();
            $(this).attr('id', '0');
        }
        else
        {
            $(".submenu").hide();
            $(this).attr('id', '1');
        }
    });

    $(".submenu").mouseup(function()
    {
        return false
    });

    $(".account").mouseup(function()
    {
        return false
    });
    $(document).mouseup(function()
    {
        $(".submenu").hide();
        $(".account").attr('id', '');
    });

});
