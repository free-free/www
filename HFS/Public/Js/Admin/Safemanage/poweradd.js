$(document).ready(function(){
   $("form").submit(function(event){
        event.preventDefault();
        var userName=$(":input[name='userName']").val();
        var password=$(":input[name='password']").val();
        var userPower=$(":input[name='userPower']").val();
        var truename=$(":input[name='truename']").val();
        var studentID=$(":input[name='studentID']").val();
        $.ajax({
        	url: 'checkAdd',
        	type: 'POST',
        	dataType: 'json',
        	data: {userName:userName,password:password,userPower:userPower,
        		  truename:truename,studentID:studentID},
        })
        .done(function(json) {
        if(json){
        	if(json.userName){$("span:eq(0)").text(json.userName);
            }else{$("span:eq(0)").text("");}
            if(json.password){$("span:eq(1)").text(json.password);
            }else{$("span:eq(1)").text("");}
            if(json.userPower){$("span:eq(2)").text(json.userPower);
            }else{$("span:eq(2)").text("");}
            if(json.truename){$("span:eq(3)").text(json.truename);
            }else{$("span:eq(3)").text("");}
            if(json.studentID){$("span:eq(4)").text(json.studentID);
            }else{$("span:eq(4)").text("");}
        }else{
        	$("span:eq(0)").text("");
        	$("span:eq(1)").text("");
        	$("span:eq(2)").text("");
        	$("span:eq(3)").text("");
        	$("span:eq(4)").text("");
        	$("form").unbind('submit');
            $("form").submit();
        }
        	console.log("success");
        })
        .fail(function() {
        	console.log("error");
        })
        .always(function() {
        	console.log("complete");
        });
        
    });
})