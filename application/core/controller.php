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

class Controller
{
	protected static $tpl_container = null;
	protected static $db_container = null;

	/**
	 * 构造函数
	 */
	public function __construct()
	{
		$this->tpl = self::tplInit();
		$this->db = self::dbInit();
	}

	public function theUsage(){

		return "<div style='position:fixed;z-index:999;bottom:0;right:0;color:yellow;background-color:red;padding:5px 10px;'>内存消耗：". $this->memoryUsage() ." MB&nbsp;&nbsp;进程时间：". $this->queryTime() ." 秒</div>";
	}

	/**
	 * 获取系统配置
	 */
	public static function getConfig( $key = null ) {
		global $config;
		if ($key && $config[$key]) {
			return $config[$key];
		}
		return $config;
	}

	/**
	 * Database初始化
	 */
	public static function dbInit(){
		if( self::$db_container == null ){
			self::$db_container = new Medoo( self::getConfig('database') );
		}
		return self::$db_container;
	}

	/**
	 * Template初始化
	 */
	public static function tplInit(){
		if( self::$tpl_container == null ){
			self::$tpl_container = new Template( self::getConfig('template') );
		}
		return self::$tpl_container;
	}

	/**
	 * 载入模型
	 */
	function loadModel($model_name){
		$path = MODEL_PATH . strtolower($model_name) . '.php';
		if (file_exists($path)) {
			require $path;
			$model = $model_name . 'Model';
			return new $model($this->db);
		}
	}

	/**
	 * 内存使用计算
	 */
	function memoryUsage(){
		return memory_get_usage()/1024/1024;
	}

	/**
	 * 进程时间计算
	 */
	function queryTime(){
		return $this->microTimeFloat() - $this->microTimeFloat(START_TIME);
	}

	/**
	 * 时间戳精度转换
	 */
	function microTimeFloat($micro_array = null){
		$micro_tmp = $micro_array ? $micro_array : microtime();
		$result = explode(' ', $micro_tmp);
		return $result[1] + $result[0];
	}

}
