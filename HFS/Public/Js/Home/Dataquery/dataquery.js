$(function(){
	var listClmWidth='';
	$('input[type="text"]').val('');
	/**
	 *
	 *@desc	: load calendar picker plugin
	 *@param :none
	 *@return none
	 */
	$('input.date').datetimepicker({
		'lang':'ch',
		'format':'Y-m-d H:i'
	});
	
	/**
	 *
	 *@desc: create :data list container
	 *@param :id 
	 *@param :info
	 *@return :data_item div
	 */
	function createDataListItem(id,info){
		var data_item,date,name,longitude,latitude,donwload;
		item=$('<div></div>').addClass('datalist-item').attr('id',id);
		data_item=$('<dl></dl>');
		item.append(data_item);
		if(info.listcon.name){
			name=$('<dd></dd>').addClass('data-info');
			name.append($('<a class="qlink"></a>').attr('href','javascript:void(0);').text(info.listcon.name).addClass('name'));
			data_item.append(name);
		}
		if(info.listcon.date){
			date=$('<dd></dd>').addClass('data-info');
			date.append($('<a class="qlink"></a>').attr('href','javascript:void(0);').text(info.listcon.date).addClass('udate'));
			data_item.append(date);
		}
		if(info.listcon.longitude||info.listcon.latitude){
			longitude=$('<dd></dd>').addClass('data-info');
			latitude=$('<dd></dd>').addClass('data-info');
			longitude.append($('<a class="qlink"></a>').attr('href','javascript:void(0);').text(info.listcon.longitude).addClass('ulng'));
			latitude.append($('<a class="qlink"></a>').attr('href','javascript:void(0);').text(info.listcon.latitude).addClass('ulat'));
			data_item.append(longitude).append(latitude);
		}
		if(info.listcon.val){
			value=$('<dd></dd>').addClass('data-info');	
			value.append($('<a class="qlink"></a>').attr('href','javascript:void(0);').text(info.listcon.val).addClass('val'));
			data_item.append(value);
		}
		if(info.downloadurl){
			download=$('<dd></dd>').addClass('data-info').addClass('data-operate');
			download.append(
			$('<a></a>')
			.attr('href',info.downloadurl)
			.append($('<img>')
					.attr('src',info.iconurl)
					.attr('alt','download')
					)
			);
			data_item.append(download);
		}
		if(id%2===0){
			item.css('background','#ccc');
		}else{
			item.css('background','#f5f5f5');
		}
		return item;
	}
/*	var json={
		'code':200,
		'msg':'good',
		'data':[
				{
				"listcon":{"name":"伽马相机数据",
						   "date":"2015-05-12",
						   "longitude":"198.32度",
						   "latitude":"123.12度"
						},
				"iconurl":"images/file_download.png",
				"downloadurl":"#"
				},
				{
				"listcon":{"name":"伽马相机数据",
						   "date":"2015-05-12",
						   "longitude":"198.32度",
						   "latitude":"123.12度"
						},
				"iconurl":"images/file_download.png",
				"downloadurl":"#"
				},
		]
	};
	for(i=0;i<json.data.length;i++){
		createDataListItem(i,json.data[i]);
	}*/



	/**
	 *
	 *@desc: Send query 
	 *@param: url  ,query back url
	 *@param: q_data,query condition
	 *@return: none
	 */
	function queryData(url,q_data){
		$.ajax(url,{
			type:'POST',
			async:true,
			contentType:'application/x-www-form-urlencoded',
			data:q_data,
			dataType:'json',
			success:function(json){
				/*详细返回数据格式见db.php*/
				$('.datalist-item').remove();
				for(var i=0;i<json.data.length;i++){
					$('.datalist').append(createDataListItem(i,json.data[i]));
				}
				$('.data-info').css('width',listClmWidth);
				var note=createNote().text(json.msg);
				$('body').append(note);
				setTimeout(function(){
					$('.note').remove();
				},1000);
				/*为数据列表的'名字','时间','纬度','经度' 绑定查询事件
					当用户点击某一行数据中的任意一个选项,则以这个选项的值为查询条件
				**/
				$('.data-info .qlink').click(function(){
					var q=$(this).attr('class')+'='+$(this).text();
					queryData('Dataquery/dataQuery',q);
				});

			},
			error:function(xhr,erorr){
					alert(xhr.responseText+'\n'+erorr);
			}
		});
	}
	/**
	 *
	 *
	 *@desc: 为查询按钮绑定按钮时间
	 *@param:none
	 *@return:none 
	 *
	 */
	 $('.btn').click(function(){
	 		var l_date=$('.l_date').val()||'',
	 			u_date=$('.u_date').val()||'',
	 			name=$('.s_name').val()||'',
	 			l_longitude=$('.l_longitude').val()||'',
	 			u_longitude=$('.u_longitude').val()||'',
	 			l_latitude=$('.l_latitude').val()||'',
	 			u_latitude=$('.u_latitude').val()||'',
	 			q=[],
	 			exp=/^-?[0-9]*\.*[0-9]*$/;
	 			/*查询条件
	 			*/
	 			l_date?q.push('ldate='+l_date):'';//最小时间 
	 			u_date?q.push('udate='+u_date):'';//最大时间
	 			name?q.push('name='+name):'';//名称
	 			l_longitude?q.push('llng='+l_longitude):'';//最小经度
	 			u_longitude?q.push('ulng='+u_longitude):'';//最大经度
	 			l_latitude?q.push('llat='+l_latitude):'';// 最小纬度
	 			u_latitude?q.push('ulat='+u_latitude):'';//最大纬度
	 			if(name==1){
	 				descBox=$('.desc-box ');
	 				descBox.find('.desc-item').remove();
	 				name=$('<span class="desc-item">名称</span>');
	 				time=$('<span class="desc-item">时间</span>');
	 				value=$('<span class="desc-item">大小</span>');
	 				operation=$('<span class="desc-item">操作</span>');
	 				descBox.append(name)
	 					   .append(time)
	 					   .append(value)
	 					   .append(operation);
	 			    listClmWidth='25%';
	 				$('.desc-item').css('width',listClmWidth);
	 			
	 			}else if(name==2||name==3){
	 				descBox=$('.desc-box ');
	 				descBox.find('.desc-item').remove();
	 				name=$('<span class="desc-item">名称</span>');
	 				time=$('<span class="desc-item">时间</span>');
	 				operation=$('<span class="desc-item">操作</span>');
	 				descBox.append(name)
	 					   .append(time)
	 					   .append(operation);
	 			    listClmWidth='33%';
	 				$('.desc-item').css('width',listClmWidth);
	 			}else {
	 				if( !exp.test(l_longitude)||
	 			   		!exp.test(u_longitude)||
	 			   		!exp.test(l_latitude)||
	 			   		!exp.test(u_latitude)||
	 			   		!l_longitude||!u_longitude||!l_latitude||!u_latitude){
	 					alert('经纬度只能为数值类型');
	 					return ;
	 				}
	 				descBox=$('.desc-box ');
	 				descBox.find('.desc-item').remove();
	 				name=$('<span class="desc-item">名称</span>');
	 				time=$('<span class="desc-item">时间</span>');
	 				value=$('<span class="desc-item">大小</span>');
	 				longitude=$('<span class="desc-item">经度</span>');
	 				latitude=$('<span class="desc-item">纬度</span>');
	 				operation=$('<span class="desc-item">操作</span>');
	 				descBox.append(name)
	 					   .append(time)
	 					   .append(longitude)
	 					   .append(latitude)   
	 					   .append(value)
	 					   .append(operation);
	 			    listClmWidth='15%';
	 				$('.desc-item').css('width',listClmWidth);
	 			}
	 			q=q.join('&');
	 			/*当查询条件q为空时,按最新时间返回20条数据*/
	 			queryData('Dataquery/dataQuery',q);

	 });
	/**
	  *
	  *@desc: create a floating notice div
	  *@param: none
	  *@return: divelement
	  */
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
 
	 /**
	  *
	  *@desc: 
	  *@param: none
	  *@return: divelement
	  */
	$('.l_longitude,.u_longitude').blur(function(){
	 	/*var  llon=parseFloat($('.l_longitude').val()?$('.l_longitude').val():0),
	 		 ulon=parseFloat($('.u_longitude').val()?$('.u_longitude').val():0);
	 	if((isNaN(llon)||isNaN(ulon))&& $(this).val()!==''){
	 		$('.lon_check_note').css('color','#f00').text('经度只能为数值');
	 	}else{
	 		$('.lon_check_note').css('color','#336699').text('*');
	 	}*/
	 	
	 	var exp=/^-?[0-9]*\.*[0-9]*$/;
	 	llngtd=$('.l_longitude').val();
	 	ulngtd=$('.u_longitude').val();
	 	if(!exp.test(llngtd)||
	 	   !exp.test(ulngtd)||
	 	   Math.abs(ulngtd/1)>180||
	 	   Math.abs(llngtd/1)>180||
	 	   !llngtd||!ulngtd
	 	   ){
	 		$('.lon_check_note').css('color','#f00').text('请正确填写经度');
	 	}else{
	 		$('.lon_check_note').css('color','#336699').text('*');
	 	}
	 })
	$('.l_latitude,.u_latitude').blur(function(){
	 	/*var  llat=parseFloat($('.l_latitude').val()?$('.l_latitude').val():0),
	 		ulat=parseFloat($('.u_latitude').val()?$('.u_latitude').val():0);
	 	if((isNaN(llat)||isNaN(ulat))&& $(this).val()!==''){
	 		$('.lat_check_note').css('color','#f00').text('纬度只能为数值');
	 	}else{
	 		$('.lat_check_note').css('color','#336699').text('*');
	 	}*/

	 	var exp=/^-?[0-9]*\.*[0-9]*$/;
	 	llttd=$('.l_latitude').val();
	 	ulttd=$('.u_latitude').val();
	 	if(!exp.test(llttd)||
	 	   !exp.test(ulttd)||
	 	   Math.abs(llttd/1)>90||
	 	   Math.abs(ulttd/1)>90||
	 	   !llttd||!ulttd
	 	   ){
	 		$('.lat_check_note').css('color','#f00').text('请正确填写纬度');
	 	}else{
	 		$('.lat_check_note').css('color','#336699').text('*');
	 	}
	 })

	 /**
	  *
	  *@desc: 
	  *@param: none
	  *@return: 
	  */
	$('.s_name').change(function(){
	  	var thisVal=$(this).val();
	  	$('input[type="text"]').val('');
	  	$('.lon_check_note').text('');
	  	$('.lat_check_note').text('');
	  	if(parseInt(thisVal)!==4){
	  		$('.search-longitude input,.search-latitude input').attr('disabled',true);
	  	}else{
	  		$('.search-longitude input,.search-latitude input').attr('disabled',false);
	  	}
	  })

	  $('.s_name').change();


});
