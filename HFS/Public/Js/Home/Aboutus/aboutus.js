$(function(){
	$('.desc').click(function(){
		$('.l-side-box span').hide();
		$(this).find('span').show();
		$('.desc').removeClass('on').addClass('non');
		$(this).removeClass('non').addClass('on');
		$('.article').hide();
		$('.article').eq(parseInt($(this).attr('id'))-1).show();
	})
});