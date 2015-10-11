<?php
return array(
	//'配置项'=>'配置值'
    'URL_MODEL'=>2,
    //'DEFAULT_MODULE'=>'Index',
    'SESSION_AUTO_START'=>true,
	'URL_HTML_SUFFIX'=>'html|shtml',
	'URL_DENY_SUFFIX'=>'xml',
	'URL_CASE_INSENSITIVE'=>true,
	'DB_TYPE'               => 'mysql',     // 数据库类型
    'DB_HOST'               =>  'localhost', // 服务器地址
    'DB_NAME'               =>  'thinkphp',          // 数据库名
    'DB_USER'               =>  'root',      // 用户名
    'DB_PWD'                =>  '526114',          // 密码
    'DB_PORT'               =>  '3306',        // 端口
    'DB_PREFIX'             =>  'think_',    // 数据库表前缀
    'DB_PARAMS'          	=>  array(), // 数据库连接参数 
    'DB_CHARSET'            =>'utf8',  
    'DEFAULT_FILTER' =>'strip_tags,htmlspecialchars', //system default filter method 
    'DEFAULT_JSONP_HANDLER' =>'',    //call your jsonp callback function name ,system default callback fucntion is 'jsonpReturn'
     //默认错误跳转对应的模板文件
     'TMPL_ACTION_ERROR' => THINK_PATH . 'Tpl/dispatch_jump.tpl',
     //默认成功跳转对应的模板文件
     'TMPL_ACTION_SUCCESS' => THINK_PATH . 'Tpl/dispatch_jump.tpl',
     'DEFAULT_V_LAYER'=>'View',//the name of view ,default name is 'View'
     'DEFAULR_THEME'=>'',// the directary's name of theme file
     /*'TMPL_FILE_DEPR'=>'',*/
     'LAYOUT_ON'=>false,//enable layout function
     'LAYOUT_NAME'=>'layout', //define layout file name, View/layout.html
     'TMPL_LAYOUT_ITEM'=>'{__CONTENT__}', //subtitutle string,system default string is{__CONTENT__}
     'TMPL_L_DILIM'=>'{',
     'TMPL_R_DILIM'=>'}',
     // 'TAGLIB_BUILD_IN'=>'cx,article',//define buildin tag lib name,system defaul lib is cx
     //'TAGLIB_PRE_LOAD'=>'article,html',//preload tag lib
    
     /*thinkphp router configuration*/
     'URL_ROUTER_ON'=>true,//open router
     'URL_ROUTE_RULES'=>array(
            ':controller/:method/[:id]'    =>'home/:1/:2',
            //  'router/index/:id'       =>'http://www.baidu.com',
            'router/index/[:id]'       =>'home/router/index',
            'news/:year/:month/:day' => array('News/archive', 'status=1',array('ext'=>'html','method'=>'get')),
            'news/:id'               => 'News/read',
            'news/read/:id'          => '/news/:1',
      ),
     /**/
     /* the value of 'data_cache_type' can be follows
        Apachenote、
        Apc、
        Db、
        Eaccelerator、
        File、
        Memcache、
        Redis、
        Shmop、
        Sqlite、
        Wincache 
        Xcache
     */
    // 'DATA_CACHE_TYPE'=>'Redis',
    // 'DATA_CACHE_TIME'=>60,
      /* cache file prefix*/
     //'DATA_CACHE_PREFIX'=>'think',


);