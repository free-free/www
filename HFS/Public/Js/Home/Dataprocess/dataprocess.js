$(function(){
	
	/**
	 *@desc:load datetimepicker plugins
	 *@param:none
	 *@return: none
	 *
	 */
	$('.date').datetimepicker({
		'lang':'ch',
		'format':"Y-m-d H:i",
		'readonly':true
	});
	/**
	 *@desc:generate a graphic box div and append it to it's parent node
	 *@param: id ,box's id
	 *@param: desc,graphic description
	 *@return: none
	 *
	 */
	function createDataViewBox(id,desc){
			var box,item,graphic_title,graphic,graphic_desc;
			box=$('<div></div>').addClass('data-view-box').attr('id',id);
			item=$('<div></div>').addClass('data-view-item');
			graphic=$('<div></div>').addClass('graphic').attr('id','graphic'+id);
			graphic_desc=$('<div></div>').addClass('graphic-desc').text(desc);
			item.append(graphic).append(graphic_desc);
			box.append(item);
			$('.data-view').append(box);
	}
	/**
	 *@desc:config echarts plugins
	 *@param: e_path,the path of echarts's core file
	 *@return: echarts config instance
	 *
	 */
    function echartsConfig(e_path){
    		//e_path=e_path||'/HFS/Public/plugins/echarts/build/dist';
    		e_path=e_path||'../../Public/Plugins/echarts/build/dist';
    		require.config({
            paths: {
                echarts:e_path
            }
   			 });
    		return require;
    }

    /**
	 *@desc:draw line graphic
	 *@param: clsName,the class name of dateview box which you are going to draw a graphic on it
	 *@param: index,the index number of dataview box
	 *@param: json,graphic data ans related param
	 *@param: title
	 *@param: e,a echarts instance
	 *@return:none
	 */
     function  echartsCreateLineGraphic(clsName,index,json,title,e){
            var echarts=e||echartsConfig();
            var legend_data=[],x_axis=[],y_axis=[],series=[];
            for(var i=0;i<json.y.length;i++){
            	legend_data.push(json.y[i].legendName);
            	if(i>=1){
            		series.push({
	            		name:json.y[i].legendName,
	            		type:'line',
						itemStyle: {normal: {areaStyle: {type: 'default'}}},
						data:json.y[i].data
	            	});
            	}else{
	            	series.push({
	            		name:json.y[i].legendName,
	            		type:'line',
						itemStyle: {normal: {areaStyle: {type: 'default'}}},
						data:json.y[i].data
	            	});
            	}
            	y_axis.push({
            		name:json.y[i].name,
            		type : 'value',
					max : json.y[i].max
            	});
            }
            for(var i=0;i<json.x.length;i++){
            	x_axis.push({
            		type : 'category',
					boundaryGap : false,
					axisLine: {onZero: false},
					data:json.x[i].data
            	});
            }


    		echarts(
           		 [
	                'echarts',
	                'echarts/chart/line'   // 按需加载所需图表，如需动态类型切换功能，别忘了同时加载相应图表
            	],
	            function (ec) {
	                var myChart = ec.init($(clsName)[index]);
	                var   option = {
						    title : {
						        text: title,
						        subtext: '智能信号检测与核仪器组',
						        x: 'center'
						    },
						    tooltip : {
						        trigger: 'axis',
						        formatter: function(params) {
						        	var re=params[0].name + '<br/>';
						        	for(var i=0;i<params.length;i++){
						        		re+=params[i].seriesName + ' : ' + params[i].value + ' Gy/h(y)<br/>'
						        	}
									return re;
						        }
						    },
						    legend: {
						        data:legend_data,
						        x: 'left'
						    },
						    toolbox: {
						        show : true,
						        feature : {
						            mark : {show: true},
						            dataView : {show: true, readOnly: false},
						            magicType : {show: true, type: ['line', 'bar']},
						            restore : {show: true},
						            saveAsImage : {show: true}
						        }
						    },
						    dataZoom : {
						        show : true,
						        realtime : true,
						        start : 0,
						        end : 100
						    },
						    xAxis :x_axis,
						    yAxis :y_axis,
						    series :series 
				           };
	                myChart.setOption(option);
	            }
	    	);
     }
     /**
	 *@desc:
	 *@param: 
	 *@param: 
	 *@param:
	 *@param:
	 *@param:
	 *@return:none
	 */
	 function echartsCreateScatterGraphic(clsName,index,json,title,e){
	 		var echarts=e||echartsConfig();
	 		var legend_data=[],series=[];
            for(var i=0;i<json.y.length;i++){
            	legend_data.push(json.y[i].legendName);
	            series.push({
	            		name:json.y[i].legendName,
	            		type:'scatter',
						markPoint : {data : [{type : 'max', name: '最大值'},{type : 'min', name: '最小值'}]},
						data:json.y[i].data
	            	});

             }
	 		 echarts(
           		 [
	                'echarts',
	                'echarts/chart/scatter',   // 按需加载所需图表，如需动态类型切换功能，别忘了同时加载相应图表
            	],
	            function (ec){
	                var myChart = ec.init($(clsName)[index]);
	                option = {
							    title : {
							        text: title,
							        subtext: '智能信号检测与核仪器组',
							        x:'center'
							    },
							    tooltip : {
							        trigger: 'axis',
							        showDelay : 0,
							        formatter : function (params) {
							                return params.seriesName + ' :<br/>'
							                   + '剂量率: '+params.value[2]+'Gy/h(y)';
							        },  
							        axisPointer:{
							            show: true,
							            type : 'cross',
							            lineStyle: {
							                type : 'dashed',
							                width : 1
							            }
							        }
							    },
							    legend: {
							        data:legend_data,
							        x:'left'
							    },
							    toolbox: {
							        show : true,
							        feature : {
							            mark : {show: true},
							            dataZoom : {show: true},
							            dataView : {show: true, readOnly: false},
							            restore : {show: true},
							            saveAsImage : {show: true}
							        }
							    },
							    xAxis : [
							        {
							            type : 'value',
							            scale:true,
							            axisLabel : {
							                formatter:'{value}'
							            }
							       
							        }
							    ],   
							    yAxis : [
							        {
							            type : 'value',
							            scale:true,
							            axisLabel : {
							                formatter: '{value}'
							            }

							        }
							    ],
							    series :series
				     };
					 myChart.setOption(option);
				}
	         );
	 		     
	 }



   /*返回数据格式 详见process.php
    json={
    	x:[{data:
    		['2009/6/12 2:00', '2009/6/12 3:00', '2009/6/12 4:00', '2009/6/12 5:00', '2009/6/12 6:00']
		   }
		  ],
    	y:[
    		{legendName:'device1',name:'y1',max:500,data:[100,50,250,300,400]},
    		{legendName:'device2',name:'y2',max:500,data:ydata},
    	 ]
    }
	/**
	 *@desc:left search box scroll event
	 *@param: none
	 *@return: none
	 *
	 */
	$(window).scroll(function(){
		var rightBox=$('.right-box');
		var scrollHeight=$(window).scrollTop();
		var sBoxLeftWidth=rightBox.offset().left;
		var sBoxOriginHeight=$('.left-box').offset().top;
		if(scrollHeight>=sBoxOriginHeight){
			rightBox.css({
				'position':'fixed',
				'top':0,
				'left':sBoxLeftWidth
			});
		}else {
			rightBox.css('position','static')
		}
	});
	/**
	 *
	 *@desc: Send query 
	 *@param: url  ,query back url
	 *@param: q_data,query condition
	 *@return: none
	 */
	function queryData(url,q_data){
		$.ajax(url+'?'+Math.random(),{
			type:'POST',
			async:true,
			contentType:'application/x-www-form-urlencoded',
			data:q_data,
			dataType:'json',
			success:function(json){
				$('.data-view-box').remove();
			/*	if(json.length<$('.data-view-box').length){
					for(var i=json.length-2;i<$('.data-view-box').length;i++){
						$('.data-view-box').eq(i).remove();
					}
				}*/
				for(var i=0;i<json.length;i++){
					if($('.data-view-box').length<(i+1)){
						createDataViewBox(i,json[i].desc);
					/******/
					}else{
						$('.data-view-box').eq(i).find('.graphic-desc').text(json[i].desc);
					}
					if(json[i].gType==1){
						echartsCreateLineGraphic('.graphic',i,json[i],'剂量率分布图' );  	
					}else if(json[i].gType==2){
						echartsCreateLineGraphic('.graphic',i,json[i],'伽马能谱' );  	
					}else if(json[i].gType==3){
						echartsCreateScatterGraphic('.graphic',i,json[i],'伽马相机数据');  	
					}else{
						if(json[i].y[0]){
						   createSpaceMap('graphic'+i,json[i].y[0].data,json[i].y[0].max);
					    }
					}
					//console.log(json[0].post);
					
				}
				/*echartsCreateScatterGraphic('.graphic',i,json[i],'伽马相机数据');*/

			},
			error:function(xhr,erorr){
					alert(xhr.responseText+'\n'+erorr);
			}
		});
	}
	/**
	 *@desc:search button click event
	 *@param: none
	 *@return: none
	 *
	 */
	$('a.search-btn').click(function(){
		var optionE=$('input.option:checked');
		var lDateE=$('input.l_date').val()||'';
		var uDateE=$('input.u_date').val()||'';
		var deviceNameE=$('input.device_name').val()||'';
		var qType=[],dName=[],json={},q='';
		for(var i=0;i<optionE.length;i++){
			qType.push(optionE.eq(i).val());
		}
		json.type=qType;
		json.lDate=lDateE;
		json.uDate=uDateE;
		json.dName=deviceNameE.split(',');
		json=JSON.stringify(json);
	/*	console.log(json);*/
		q='q='+json;
		//queryData('/HFS/Public/Php/process.php',q);
		queryData('Dataprocess/dataPro',q);
	});


	/**
	 *@desc  判断浏览区是否支持canvas
	 *@param none
	 *@return none
	 *
	 */
    function isSupportCanvas() {
      var elem = document.createElement('canvas');
      return !!(elem.getContext && elem.getContext('2d'));
    }
    if (!isSupportCanvas()) {
      alert('热力图仅对支持canvas的浏览器适用,您所使用的浏览器不能使用热力图功能,请换个浏览器试试~')
    }


	/**
	 *@desc GaoDe Map 初始化地图对象，加载地图
	 *@param id,points
	 *@return: none
	 *
	 */
    function createSpaceMap(id,points,maxV){
    	var heatmap,map,pts=[];
  	    map = new AMap.Map(id, {
		        resizeEnable: true,
		        center: [points[0][0],points[0][1]],//地图中心点
		        zoom: 20, //地图显示的缩放级别,
		        layers:[new AMap.TileLayer(),new AMap.TileLayer.Satellite()]
  	 	 });
  	    for(var i=0;i<points.length;i++){
  	    	pts.push({
  	    		'lng':points[i][0],
  	    		'lat':points[i][1],
  	    		'count':points[i][2]
  	    	});
  	    }
   		map.plugin(["AMap.Heatmap"], function () {
		      heatmap = new AMap.Heatmap(map, {
		        radius: 20, //给定半径
		        visible:true,
		        opacity: [0, 0.8]
		          ,gradient:{
		           0.5: 'blue',
		           0.65: 'rgb(117,211,248)',
		           0.7: 'rgb(0, 255, 0)',
		           0.9: '#ffea00',
		           1.0: 'red'
		           }
		      	});
		      //设置数据集
		      heatmap.setDataSet({
		        data: pts,
		        max: maxV
		      });
   		});	
   		heatmap.show();
    }


    $('a.search-btn').click();
   	$(window).scrollTop(0);
});
