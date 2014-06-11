<?php
/**
 * JunePHP
 * It's just a lightweight PHP framework.
 *
 * @author Wen Peng
 * @link http://www.pengblog.com
 * @link wen@pengblog.com
 */

if (!defined('ACCESS')) die('No direct script access allowed');

/**
 * 引入系统配置
 */
require 'config/config.php';

/**
 * 运行模式
 */
if (APP_DEBUG) {
	error_reporting(E_ALL);
	ini_set("display_errors", 1);
}else{
	error_reporting(0);
	ini_set("display_errors", 0);
}

/**
 * 自动注册
 */
function autoLoad($class_name) {
	$class_name = strtolower($class_name);
	if (file_exists( CORE_PATH . $class_name . '.php')) {
		require CORE_PATH . $class_name . '.php';
	}else{
		die('The file ' . $class_name . '.php is missing in the core folder.');
	}
}

/**
 * 注册Core自动加载
 */
spl_autoload_register("autoLoad");

/**
 * 启动应用
 */
$app = new application();
