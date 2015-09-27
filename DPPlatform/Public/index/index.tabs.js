$(document).ready(function(){
	$('.tabs-title').click(function(){
		    var ths=$(this);
		    var item=$('.item');
		    $('.tabs-title').removeClass('tabs-down');
			ths.addClass('tabs-down');
	        item.hide();
	        item.eq(parseInt(ths.attr('id'))).fadeIn(1000);


	});

});