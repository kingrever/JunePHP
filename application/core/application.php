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

class Application
{
	private $url_controller = null;
	private $url_action = null;
	private $url_parameter = null;

	/**
	 *  构造函数
	 */
	public function __construct()
	{
		// 解析URL片段
		$this->explodeUrl();

		if (isset($this->url_controller)){
			// 检查控制器是否存在
			if (file_exists( CONTROLLER_PATH . $this->url_controller . '.php')) {

				// 如果存在，载入并实例化控制器
				$this->url_controller = $this->loadController($this->url_controller);

				// 检查方法是否定义
				if (isset($this->url_action)){
					if (method_exists($this->url_controller, $this->url_action)) {
						// 检查是否存在传入参数
						if (isset($this->url_parameter)) {
							// 如果参数存在
							$this->url_controller->{$this->url_action}($this->url_parameter);
						} else {
							// 如参数不存在
							$this->url_controller->{$this->url_action}();
						}
					} else {
						// 如方法不存在，报错
						header("HTTP/1.0 404 Not Found");exit('The file can not be found!');
					}
				} else {
					// 如果未定义，执行默认方法
					$this->url_controller->index();
				}
			} else {
				// 如控制器不存在，报错
				header("HTTP/1.0 404 Not Found");exit('The file can not be found!');
			}
		} else {
			// 如果未定义，执行默认控制器
			$home = $this->loadController('home');
			$home->index();
		}
	}

	/**
	 *  解析URL片段
	 */
	private function explodeUrl()
	{
		if (isset($_GET['segments'])) {

			// 解析URL片段
			$segments = rtrim($_GET['segments'], '/');
			$segments = filter_var($segments, FILTER_SANITIZE_URL);
			$segments = explode('/', $segments);

			// 保存URL片段
			$this->url_controller = (isset($segments[0]) ? $segments[0] : null);
			$this->url_action = (isset($segments[1]) ? $segments[1] : null);
			$this->url_parameter = (isset($segments[2]) ? array_slice($segments, 2) : null);
		}
	}

	/**
	 *  载入控制器
	 */
	private function loadController($controller_name){
		$controller_path = CONTROLLER_PATH . strtolower($controller_name) . '.php';
		if (file_exists($controller_path)) {
			require $controller_path;
			return new $controller_name();
		}
	}

}
