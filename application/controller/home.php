<?php
/**
 * JunePHP
 * It's just a lightweight PHP framework.
 *
 * @author Wen Peng
 * @link http://www.pengblog.com
 * @link wen@pengblog.com
 */

if (!defined('ACCESS')) exit('No direct script access allowed');

class Home extends Controller
{
	public function index($url_parameter = null)
	{

		$dbinfo = $this->loadModel('home')->info();
		$this->tpl->set('temp','Message from Controller: You are in the controller home, using the method index()');
		$this->tpl->set('usage',$this->theUsage());
		$this->tpl->set('info',$dbinfo);
		$this->tpl->show('home/index');
	}

}
