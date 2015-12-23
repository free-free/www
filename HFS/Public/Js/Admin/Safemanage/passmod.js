$(document).ready(function(){
	var userName=$(":input[name='user']").val();
	$(":input[name='oldpass']").blur(function(event) {
		if($(this).val()!=""){
			$.ajax({
				url: '../../../Public/Php/index.php',
				type: 'get',
				dataType: 'json',
				data:'user='+userName+'&pass='+$(this).val(),
				success:function(json){
					$("span").text(json.msg);
					if(json.msg=='密码正确'){
						$(".submit").removeAttr('disabled');
					}else{
						$(".submit").attr("disabled","disabled");
					}
				}
			})
			.done(function() {
				console.log("success");
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});
		}
	});
})