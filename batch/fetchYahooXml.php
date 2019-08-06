<?php 
$yahoo_host = 'query.yahooapis.com';
//$yahoo_host = '98.137.129.181';
$url="http://$yahoo_host/v1/public/yql?q=select%20*%20from%20yahoo.finance.quotes%20where%20symbol%20in%20%28%22^OMXS30%22%29&env=store://datatables.org/alltableswithkeys";
$file = 'c:\\systerbt\\yahoo_data\omx.xml';
$data = file_get_contents($url);
if($data!==false){
	file_put_contents($file, $data);
}

$file = 'c:\\systerbt\\yahoo_data\sp.xml';
$url="http://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20yahoo.finance.quotes%20where%20symbol%20in%20%28%22^GSPC%22%29&env=store://datatables.org/alltableswithkeys";
$data = file_get_contents($url);
if($data!==false){
	file_put_contents($file, $data);
}


?>
