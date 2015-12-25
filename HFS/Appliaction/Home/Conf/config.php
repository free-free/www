<?php
return array(
	//'配置项'=>'配置值'
	    'TMPL_L_DELIM'          =>      "<{",
		'TMPL_R_DELIM'          =>      "}>",
	    'TMPL_TEMPLATE_SUFFIX'  =>      '.html',
	    'LOG_RECORD_LEVEL'      =>      array('EMERG','ALERT','ERROR'),
	    'DB_TYPE'               =>      'mysqli',   //设置数据库类型
		'DB_HOST'               =>      'localhost',//设置主机
		'DB_NAME'               =>      'nuclear_manage_system',//设置数据库名
		'DB_USER'               =>      'root',    //设置用户名
		'DB_PWD'                =>      '526114',        //设置密码
		// 'DB_HOST'               =>      'my0082097.xincache1.cn',
		// 'DB_NAME'               =>      'my0082097',
		// 'DB_USER'               =>      'my0082097',
		// 'DB_PWD'                =>      'zx147369',
		'DB_PORT'               =>      '3306',    //设置端口号
		'DB_PREFIX'             =>      'think_',     //设置表前缀
		'SHOW_PAGE_TRACE'       =>      'true',      //开启页面Trace
		'TMPL_ACTION_ERROR'     =>      MODULE_PATH.'View/Public/error.html', // 默认错误跳转对应的模板文件
        'TMPL_ACTION_SUCCESS'   =>      MODULE_PATH.'View/Public/success.html', // 默认成功跳转对应的模板文件
		'ACTION_SUFFIX'         =>      'Action',  // 操作方法后缀
	    'URL_HTML_SUFFIX'       =>      'html|shtml|xml',      // 多个伪静态后缀设置 用|分割
	    'TMPL_PARSE_STRING'     =>array(
	    	'__CSS__'=> __ROOT__ .'/Public/Css/Home',
	    	'__JS__' =>__ROOT__ .'/Public/Js/Home',
	    	'__IMAGES__'=>__ROOT__ .'/Public/Images',
	    	'__PLUGINS__'=>__ROOT__ .'/Public/Plugins',
	    	'__UPLOADS__'=>__ROOT__ .'/Uploads',
	    	'__PHP__'=>__ROOT__ .'/Public/Php',
	     ),
	    TMPL_DENY_PHP           =>false,
);