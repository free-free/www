$(function(){
	$(window).scrollTop(0);
	waterfall();
	$(window).scroll(function(){
		var  scrollTop=$(window).scrollTop(),
		box=$('.box'),
		lBoxTopH=box.eq(box.length-1).offset().top,
		boxH=box.eq(box.length-1).outerHeight(),
		screenH=$(window).height();
		if((lBoxTopH+Math.floor(boxH/2))<(scrollTop+screenH)){
			for(var i=0;i<7;i++){
				var b=$('<div></div>').addClass('box');
				var imgBox=$('<div></div>').addClass('img-box');
				var img=$('<img>').attr('src','../images/12.jpg');
				imgBox.append(img);
				b.append(imgBox);
				$('#main').append(b);
			}
			waterfall();
		}
		
	});
	$(window).scroll();
});

function addImg(){
	
}
function waterfall(){
	var box=$('.box'),
	height=[],
	boxW=box.outerWidth(),
	minH,minIndex,cols=parseInt($(window).width()/boxW);
	$('#main').css({'width':boxW*cols,
					'margin':'0px auto'
	});
	for(var i=0;i<box.length;i++){
		if(i<6){
			height.push(box.eq(i).outerHeight())
		}else{
			minH=Math.min.apply(null,height)
			minIndex=height.indexOf(minH);
			box.eq(i).css({'position':'absolute',
				'left':minIndex*boxW,
				'top':minH
			});
			height[minIndex]+=box.eq(i).outerHeight();
		}
	}
}