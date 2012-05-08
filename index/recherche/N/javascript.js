$(document).ready(function() {
	$("#recherche").click(function(){
		$("div#panel").animate({
			height: "500px"
		})
		.animate({
			height: "100px"
		}, "fast");
		$("div.panel_button").toggle();
                	});	
	
   $("div#hide_button").click(function(){
		$("div#panel").animate({
			height: "0px"
		}, "fast");
		
	
   });	
	
});