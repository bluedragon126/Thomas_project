<?php 
// Directory
error_reporting(E_ALL);
$directory = "/var/www/vhosts/borstjanaren.se/httpdocs/spool";
$files = scandir($directory);
echo (count($files) -  2);