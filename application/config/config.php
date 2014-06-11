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
 * 调试模式
 */
define('APP_DEBUG', true);

/**
 * 系统常量
 */
define('APP_NAME', '轻量级PHP框架');
define('APP_AUTHOR', 'Wen Peng');

/**
 * URL配置
 */
define('URL', 'http://www.mvc.com/');
define('ENABLE_REWRITE', true);
define('URL_SUFFIX', 'html');

// 路径常量
define('DS', DIRECTORY_SEPARATOR);
define('CORE_PATH', 'application/core/');
define('CONTROLLER_PATH', 'application/controller/');
define('MODEL_PATH', 'application/model/');
define('VIEW_PATH', 'application/view/');

/**
 * 模板配置
 */
$config['template'] = array(
	'path' => VIEW_PATH,
	'ext' => 'php',
	'vars' => array('appname' => APP_NAME , 'appauthor' => APP_AUTHOR),
);

/**
 * 数据库配置
 */
$config['database'] = array(
	'database_type' => 'mysql',
	'server' => 'localhost',
	'username' => 'root',
	'password' => 'root',
	'database_name' => 'mvc',
);
