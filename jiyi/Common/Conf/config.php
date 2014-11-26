<?php
return array(
	//'配置项'=>'配置值'
	'DEFAULT_THEME' => 'Default',	// 设置默认的模板主题
	'URL_MODEL' => '2', // 设置路由模式
	'DEFAULT_MODULE' => 'Home', // 设置默认访问模块
	'LOAD_EXT_CONFIG' => 'db', // 设置额外加载的配置项，多个用,隔开
	//'TMPL_EXCEPTION_FILE' => __ROOT__.'Public/Tpl/myerror.tpl', //报错的模版
	'TMPL_PARSE_STRING'  =>array(     
		'__PUBLIC__' => '/Public/acestyle/', // 更改默认的/Public 替换规则
        '__STATICS__'=>'/Public/statics/'
		//'__JS__'     => '/Public/JS/', // 增加新的JS类库路径替换规则     
		//'__UPLOAD__' => '/Uploads', // 增加新的上传路径替换规则
	),

	//配置SESSION 存储机制
    'SESSION_TYPE' => 'Redis',
    'SESSION_PREFIX' => 'jiyi_',
    'SESSION_EXPIRE' => 3600,
    'REDIS_HOST' => '127.0.0.1',//Redis服务器地址
    'REDIS_PORT' => 6379, //Redis连接端口

	//调试模式的配置
	'SHOW_ERROR_MSG' =>  false,    // 显示错误信息
	'SHOW_PAGE_TRACE' => false, //打开trace页面调试

    /* URL配置 */
    'URL_CASE_INSENSITIVE' => true, //默认false 表示URL区分大小写 true则表示不区分大小写
    'URL_MODEL' => 2, //URL模式 0:普通模式 1：PATHINFO模式 2：REWRITE模式 3：兼容模式
    'VAR_URL_PARAMS' => '', // PATHINFO URL参数变量
    'URL_PATHINFO_DEPR' => '/', //PATHINFO URL分割符
    'URL_HTML_SUFFIX' => '.html',
    //允许模块名称列表，不然路由没法针对模块
    //'MODULE_DENY_LIST' => array('Admin'),
    'MODULE_ALLOW_LIST' => array('Home','Admin'), // 允许访问的模块

    'DEFAULT_CHARSET' => 'utf-8', // 默认输出编码
);