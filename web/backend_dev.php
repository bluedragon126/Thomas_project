<?php

// this check prevents access to debug front controllers that are deployed by accident to production servers.
// feel free to remove this, extend it or make something more sophisticated.

//if (!in_array(@$_SERVER['REMOTE_ADDR'], array('127.0.0.1', '::1')))
//if (!in_array(@$_SERVER['REMOTE_ADDR'], array('1.186.100.114', '121.246.221.54','115.113.153.142','14.97.61.107','127.0.0.1', '192.168.0.22', '::1')))
//{
  //die('You are not allowed to access this file. Check '.basename(__FILE__).' for more information.');
//}

require_once(dirname(__FILE__).'/../config/ProjectConfiguration.class.php');

$configuration = ProjectConfiguration::getApplicationConfiguration('backend', 'dev', true);
sfContext::createInstance($configuration)->dispatch();
