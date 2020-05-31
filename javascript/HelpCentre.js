jQuery(document).ready(function(){
//$('h2').click(function(){$('p').hide;});

//$("#h21").css('background','blue');

$('p').hide();

$('h5').click(function(){
		$(this).next('p').show(3000);
	});

$('h5').mouseover(function(){
		$('.contentBox').hide();
	});

$('p').hover(
		function(){$('.contentBox').css({'color':'white'});},

		function(){$('.contentBox').css({'color':'white'});}
	);

});
