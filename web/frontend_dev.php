<?php

// this check prevents access to debug front controllers that are deployed by accident to production servers.
// feel free to remove this, extend it or make something more sophisticated.
//if (!in_array(@$_SERVER['REMOTE_ADDR'], array('175.100.138.164','1.186.100.114','192.168.0.22','192.168.0.30','121.246.221.54','115.113.153.142','117.200.215.58','14.97.61.107','127.0.0.1', '::1')))
//{
//  die('You are not allowed to access this file. Check '.basename(__FILE__).' for more information.');
//}

require_once(dirname(__FILE__).'/../config/ProjectConfiguration.class.php');

$configuration = ProjectConfiguration::getApplicationConfiguration('frontend', 'dev', true);
sfContext::createInstance($configuration)->dispatch();
