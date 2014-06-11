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

class HomeModel
{
    function __construct($db) {
        $this->db = $db;
    }

    public function info()
    {
    	return $this->db->info();
    }
}
