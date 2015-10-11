function getByClass(clsName,pid){
      var oParent=pid?document.getElementById(pid):document,
		 elements=[],
		 allElements=oParent.getElementsByTagName('*');
      for(var i=0;i<allElements.length;i++){
                  if(allElements[i].className==clsName){
			                 elements.push(allElements[i]);
                   }
             }
	     return elements;
}

window.onload=drag;

function drag(){
     var qTitle=getByClass('login_logo_webqq','loginPanel')[0];
     qTitle.onmousedown=fnDown;
     qTitle.onmouseup=fnUp;
}

function fnDown(event){
    event=event||window.event;
    var qLoginPanel=document.getElementById('loginPanel'),
      disx=event.clientX-qLoginPanel.offsetLeft,
      disy=event.clientY-qLoginPanel.offsetTop,
      clientW=document.body.clientWidth||document.documentElement.clientWidth,
      clientH=document.body.clientHeight||document.documentElement.clientHeight,
      panelW=qLoginPanel.offsetWidth,
      panelH=qLoginPanel.offsetHeight;
    document.onmousemove=function(event){
      		var event=event||window.event;
      		document.title=event.clientX+':'+event.clientY,
          y=event.clientY-disy,
          x=event.clientX-disx;
          if(y<0){
              qLoginPanel.style.top=10+'px';
          }else if(y>(clientH-panelH)){
              qLoginPanel.style.top=(clientH-panelH)+'px';
          }else{
              qLoginPanel.style.top=y+'px';
          }
          if(x<0){
            qLoginPanel.style.left=10+'px';
          }else if(x>(clientW-panelW)){
            qLoginPanel.style.left=(clientW-panelW)+'px';
          }else{
            qLoginPanel.style.left=x+'px';
          }
	  }
}
function fnUp(){
     document.onmousemove=null;
}