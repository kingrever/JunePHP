<?php
/**
 * JunePHP
 * It's just a lightweight PHP framework.
 *
 * @author Wen Peng
 * @link http://www.pengblog.com
 * @link wen@pengblog.com
 */

// 强制使用UTF8编码
header("Content-type:text/html;charset=utf-8");

// 程序开始执行时间
define('START_TIME', microtime());

// 设定唯一入口
define('ACCESS', true);

// 检测PHP环境
if(version_compare(PHP_VERSION,'5.3.0','<'))  die('require PHP > 5.3.0 !');

// 引入初始化文件
require 'application/initialize.php';

// 亲^_^ 后面不需要任何代码了 就是如此简单