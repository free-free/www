var eventUtil={
	addHandler:function(element,type,handler){
		if(element.addEventListener){
			element.addEventListener(type,handler,false);
		}else if(element.attachEvent){
			element.attachEvent('on'+type,handler);
		}else{
			element['on'+type]=handler;
		}
        },
	removeHandler:function(element,type,handler){
        if(element.removeEventListener){
			element.removeEventListener(type,handler,false);
	  	}else if(element.detachEvent){
			element.detachEvent('on'+type,handler);
		}else{
			element['on'+type]=null;
		}
        },
    getEvent:function(event){ return event?event:window.event;},	
	preventDefault:function(event){
		event=event||window.event;
		if(event.preventDefault){
			event.preventDefault();//none IE
		}else{
			event.returnValue=false;//IE
		}
	},
	stopPropagation:function(event){
		event=event||window.event;
		if(event.stopPropagation){
			event.stopPropagation();
		}else{
			event.cancleBubble=true;
		}
	},
	getTarget:function(event){
		event=event||window.event;
		return event.target||event.srcElement;
	}
}
