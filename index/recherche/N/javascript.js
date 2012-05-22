$(document).ready(function() {
	$("#recherche").click(function(){
		$("div#pan").animate({
			height: "500px"
		})
		.animate({
			height: "90px"
		}, "fast");
		$("div#hide_butt").toggle();
                	});	
	
   $("div#hide_butt").click(function(){
		$("div#pan").animate({
			height: "0px"
		}, "fast");
		$("div#hide_butt").toggle();
	
   });	
	
});