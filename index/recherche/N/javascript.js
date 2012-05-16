$(document).ready(function() {
	$("#recherche").click(function(){
		$("div#panel").animate({
			height: "500px"
		})
		.animate({
			height: "90px"
		}, "fast");
		$("div#hide_button").toggle();
                	});	
	
   $("div#hide_button").click(function(){
		$("div#panel").animate({
			height: "0px"
		}, "fast");
		$("div#hide_button").toggle();
	
   });	
	
});