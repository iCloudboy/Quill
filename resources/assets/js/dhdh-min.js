$(document).ready(function(){$(".account").click(function(){1==$(this).attr("id")?($(".submenu").show(),$(this).attr("id","0")):($(".submenu").hide(),$(this).attr("id","1"))}),$(".submenu").mouseup(function(){return!1}),$(".account").mouseup(function(){return!1}),$(document).mouseup(function(){$(".submenu").hide(),$(".account").attr("id","")})});