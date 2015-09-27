$(document).ready(function(){
   
   /*common use function,send ajax requrest  */
   	 function ajaxSendQuery(query){
	 		$.ajax({
	 			type:'POST',
	 			url:'',
	 			data:query,
	 			contentType:'application/x-wwww-form-urlencoded',
	 			dataType:'json',
	 			success:function(response,status,xhrobj){

	 			},
	 			error:function(){}
	 		});
	 }
   /* search-box-text's notation  ajax event*/
	$('.search-box-text').unbind('keyup').bind('keyup',function(){
		var searchText=$(this).val();
		$.ajax({
			type:'POST',
			url:"http://www.vekou.com/DPPlatform/Public/data/ajaxReturn.php",
			data:{
				'q_type':'notation',
				'q_text':searchText
			},
			contentType:'application/x-www-form-urlencoded',
			dataType:'json',
			success:function(response,status,xhrobj){
					
					var parentul=document.getElementById('notation-ul');
					parentul.innerHTML='';
					/*get response from ajaxreturn and show it in li */
					for(var i =0;i<response.data.length;i++){
						parentul.innerHTML+='<li class="search-box-notation-item">'+response.data[i].name+'==>'+response.data[i].address+'</li>';
					}
					/*bind mouseenter event to search-box-notation-item*/
					 $('.search-box-notation-item').unbind('mouseenter').mouseenter(function(){
				    		//get current item's content 
							var thisText=$(this).text();
							//unbind blur envent of search-box-text 
							$('.search-box-text').unbind('blur').val(thisText);
							$(this).unbind('click').click(function(){
								$('.search-box-notation').hide();
								alert(thisText);
							});
					});
					/*bind mouseout event to search-box-notation*/
					$('.search-box-notation').unbind('mouseout').mouseout(function(){
							$('.search-box-text').unbind('blur').bind('blur',function(){
									$('.search-box-notation').hide();
							});
					});
					$('.search-box-notation').show();	
	
			},
			error:function(){}
		});
	});
	/*search-box-button  ajax event*/

	$('.search-box-form').bind('submit',function(){
			var searchCon=$('.search-box-text').val();
			if(searchCon==''){
				alert('there is content');
				return false;
			}else{
				ajaxSendQuery(searchCon);
			}
	});
					
});