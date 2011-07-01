$(document).ready(function(){


			$('#boton2').click(function(){
			//alert("Presionaste un <a>");

			//$('#menu li').css({'width' : '33%'});
			$('#tmenu ').css({'top' : '50px'});
			$('#tmenu').slideToggle("slow");	
			
					
			}); 
		

})

$(document).ready(function() {
 
	//ACCORDION BUTTON ACTION	
	$('div.accordionButton').click(function() {
		$('div.accordionContent').slideUp('normal');	
		$(this).next().slideDown('normal');
	});
 
	//HIDE THE DIVS ON PAGE LOAD	
	$("div.accordionContent").hide();
 
});
