<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2014 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用入口文件

// 检测PHP环境
if(version_compare(PHP_VERSION,'5.3.0','<'))  die('require PHP > 5.3.0 !');


define('APP_DEBUG',true);   // 开启调试模式 建议开发阶段开启 部署阶段注释或者设为false
define('APP_PATH','./jiyi/');     // 定义应用目录
//define('BIND_MODULE','Admin');  //定义默认生成的模块名字
define('BUILD_DIR_SECURE',false); //关闭生成目录安全文件
define('RUNTIME_PATH','./Runtime/');//定义缓存目录
define('__ROOT__', '/');

// 引入ThinkPHP入口文件
require './ThinkPHP/ThinkPHP.php';

