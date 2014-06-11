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

class Template
{
	var $vars = array();
	var $path = '';
	var $ext = 'php';

	/**
	 *  构造函数
	 */
	function __construct($config = array()){
		foreach ($config as $key => $value) {
			$this->$key = $value;
		}
	}

	/**
	 *  模板变量赋值
	 */
	function set($name, $value){
		$this->vars[$name] = $value;
		return $this;
	}

	/**
	 *  初始化模板
	 */
	function load($file){
		$file_path = $this->path . $file . '.' .$this->ext;
		if (!file_exists($file_path)) {
			die('The template file can not be found!');
		}
		extract($this->vars);
		ob_start();
		include $file_path ;
		$contents = ob_get_contents();
		ob_end_clean();
		return $contents;
	}

	/**
	 *  输出
	 */
	function show($file){
		echo $this->load($file);
	}
}