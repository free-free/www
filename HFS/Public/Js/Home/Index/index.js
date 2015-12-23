$(document).ready(function(){
	/* focus image switch*/
	var timer;
	var index=0;
    function switchImg(obj,click){
		$('.focus-img img').hide();
		$('.s-btn').removeClass('on');
		if(click==true){
				$(obj).addClass('on');
				index=parseInt($(obj).attr('id'));
		}else{
				index+=1;
				if(index>4){
					index=0;
				}
				$('.s-btn').eq(index).addClass('on');
		}
		$('.focus-img img').eq(index).fadeIn(1500);
	}
	$('.s-btn').click(function(){
		clearInterval(timer);
		switchImg(this,true);
		timer=setInterval(function(){switchImg('',false);},10000);	
	});
	timer=setInterval(function(){switchImg('',false);},10000);
});