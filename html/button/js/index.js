$(function (){
	$(".link .button").hover(function(){
		var title=$(this).attr('data');
		$('.tip em').text(title);
		$('.tip').css('opacity':1;);
	},
	function(){

	})

})
