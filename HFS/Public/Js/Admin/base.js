$(document).ready(function(){
	if($(".uplist").height()=="30"){
		$(".uplist .titlelist").toggle(function() {
		$(".uplist").animate(
			  {height:100+'px'},
			  {easing: 'easeInBack', duration: 600,});
		}, function() {
			$(".uplist").animate(
			  {height:30+'px'},
			  {easing: 'easeOutBack', duration: 600,});
		});
	}else{
		$(".uplist .titlelist").toggle(function() {
			$(".uplist").animate(
			  {height:30+'px'},
			  {easing: 'easeInBack', duration: 600,});
		}, function() {
			$(".uplist").animate(
			  {height:100+'px'},
			  {easing: 'easeOutBack', duration: 600,});
		});
	}

	if($(".infolist").height()=="30"){
		$(".infolist .titlelist").toggle(function() {
		$(".infolist").animate(
		  {height:100+'px'},
		  {easing: 'easeInBack', duration: 600,});
	    }, function() {
		$(".infolist").animate(
		  {height:30+'px'},
		  {easing: 'easeOutBack', duration: 600,});
	    });
	}else{
		$(".infolist .titlelist").toggle(function() {
		$(".infolist").animate(
		  {height:30+'px'},
		  {easing: 'easeInBack', duration: 600,});
	    }, function() {
		$(".infolist").animate(
		  {height:100+'px'},
		  {easing: 'easeOutBack', duration: 600,});
	    });
	}

	if($(".managelist").height()=="30"){
		$(".managelist .passlist").toggle(function() {
		$(".managelist").animate(
		  {height:120+'px'},
		  {easing: 'easeInBack', duration: 600,});
	    }, function() {
		$(".managelist").animate(
		  {height:30+'px'},
		  {easing: 'easeOutBack', duration: 600,});
	    });
	}else{
		$(".managelist .passlist").toggle(function() {
		$(".managelist").animate(
		  {height:30+'px'},
		  {easing: 'easeInBack', duration: 600,});
	    }, function() {
		$(".managelist").animate(
		  {height:120+'px'},
		  {easing: 'easeOutBack', duration: 600,});
	    });
	}
	
	
})