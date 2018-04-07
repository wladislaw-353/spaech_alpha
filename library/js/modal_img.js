$(function() {
    
    $(".library .item").magnificPopup({
    	type : 'image',
    	removalDelay: 300,
    	mainClass: 'mfp-fade'
    });

	$("img, a").on("dragstart", function(event) { event.preventDefault(); });

});