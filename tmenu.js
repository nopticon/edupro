$(document).ready(function() {
	$('#boton2').click(function() {
		$('#tmenu ').css({'top' : '50px'});
		$('#tmenu').slideToggle("slow");
	});
});

$(document).ready(function() {
	$('div.accordionButton').click(function() {
		$('div.accordionContent').slideUp('normal');	
		$(this).next().slideDown('normal');
	});
	
	$("div.accordionContent").hide();
});
