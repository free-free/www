$(function(){
	/*device box switch*/
	$('.device-box').hide();
	$('.device-box').eq(parseInt($('.device-list').val())-1).show();
    $('.device-list').change(function(){
    	var  deviceBox=$('.device-box');
    	deviceBox.hide();
    	deviceBox.eq(parseInt($(this).val())-1).fadeIn(500);   
    });
    $('.up-file').change(function(){
          $('.file-select span').text('selected');
    });
    /* parameter clear*/
    $('.clear').click(function(){
            var deviceType=$('.device-list').val();
            var data='';
            data='devicetype='+deviceType+'&'+
            'verbscode='+1;
            send('post','returnAjax.php',data);
            if(deviceType==1){
                $('.com input ').val('');
            }else{
                $('.internet-interface input').val('');
            }
    });
    /*create note div*/
    function createNote(){
        return $('<div></div>')
        .css({
                    'display':'block',
                    'width':'100px',
                    'height':'40px',
                    'line-height':'40px',
                    'position':'absolute',
                    'left':Math.floor($(window).width()/2)-20,
                    'top':Math.floor($(window).scrollTop()+100),
                    'background':'rgba(0,0,0,0.7)',
                    'box-shadow':'0 0 10px #333',
                    'font-size':'16px',
                    'color':'#fff',
                    'text-align':'center',
                    'z-index':'1999999',
                    'border-radius':'5px'
        }).addClass('note');
    }
    /*save by ajax*/
    function send(type,url,data){
        data=data||'';
        if(type.toLowerCase()==='post'){
            $.ajax(url,{
            type:'POST',
            async:true,
            contentType:'application/x-www-form-urlencoded',
            dataType:'json',
            data:data,
            success:function(data){
                var note=createNote();
                note.text(data.msg);
                $('body').append(note);
                setTimeout(function(){
                    $('.note').remove();
                },1500)
                console.log(data);

            },
            error:function(){
                alert('failed  connect to network');
            }
            });    
        }else if(type.toLowerCase()==='get'){
            $.ajax(url,{
                type:'GET',
                async:true,
                success:function(data){
                    alert(data);
                },
                error:function(){
                    alert('failed conenect to network');
                }
            }
            );
        }
    }
    /*parameter save*/
    $('.save').click(function(){
            var deviceType=$('.device-list').val();
            var data='';
            if(deviceType==1){
                    data='speed='+$('input.speed').val()+'&'+
                    'port='+$('input.port').val()+'&'+
                    'checkbit='+$('input.checkbit').val()+'&'+
                    'databit='+$('input.databit').val()+'&'+
                    'stopbit='+$('input.stopbit').val()+'&'+
                    'devivetype='+deviceType+'&'+
                    'verbscode='+2;
                    send('post','returnAjax.php',data);
            }else if(deviceType==2){
                    data='ip='+$('input.ip').val()+'&'+
                    'ipmask='+$('input.ipmask').val()+'&'+
                    'devicetype='+deviceType+'&'+
                    'verbscode='+2;
                    send('post','returnAjax.php',data);
            }
    });
    /*parameter update*/
    $('.fix').click(function(){
            var deviceType=$('.device-list').val();
            var data='';
            if(deviceType==1){
                 data='speed='+$('input.speed').val()+'&'+
                    'port='+$('input.port').val()+'&'+
                    'checkbit='+$('input.checkbit').val()+'&'+
                    'databit='+$('input.databit').val()+'&'+
                    'stopbit='+$('input.stopbit').val()+'&'+
                    'devivetype='+deviceType+'&'+
                    'verbscode='+3;
                 send('post','returnAjax.php',data);
            }else if(deviceType==2){
                 data='ip='+$('input.ip').val()+'&'+
                    'ipmask='+$('input.ipmask').val()+'&'+
                    'devicetype='+deviceType+'&'+
                    'verbscode='+3;
                 send('post','returnAjax.php',data);
            }
    });
    /*upload parameter file*/
    $('.param-upload-btn').click(function(){
        var deviceType=$('.device-list').val();
        var file=document.getElementById('file').files[0];
        var filesiz=file.size,
            filename=file.name,
            fd=new FormData();
        if(file!=undefined){
            fd.append('file',file);
            var xhr;
            if(window.XMLHttpRequest){
                xhr=new XMLHttpRequest();
            }else{
                xhr=new ActiveXObject('Microsoft.XMLHTTP');
            }
            xhr.open("POST",'upload.php?dt='+deviceType,true);
            xhr.send(fd);
            xhr.onreadystatechange=function()
            {
                if(xhr.readyState==4&&xhr.status==200)
                {
                    var note=createNote();
                    note.text(JSON.parse(xhr.responseText).msg);
                    $('body').append(note);
                    setTimeout(function(){
                        $('.note').remove();
                    },1500)
                }
            }
        }else{

        }
    });
    /*download paramter file*/
    $('.param-download-btn').click(function(){
        var deviceType=$('.device-list').val();
        var data='dt='+deviceType+'&'+
        'd='+new Date().getTime();
        window.open('http://localhost/html/ddp/download.php?'+data);
    });

});