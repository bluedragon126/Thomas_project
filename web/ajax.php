<?php
session_start();

function createPayment($paymentReference, $payerAlias, $amount, $message, $config){
	try{

		if($payerAlias != ""){//echo "1==>";

			$data = array("payeePaymentReference" => $paymentReference,//'234567892'
				"callbackUrl" => $config["callbackUrl"],
				"payerAlias" => $payerAlias,//46739866319
				"payeeAlias" => $config["payeeAlias"],//'1233144318'
				"amount" => $amount,//'1'
				"currency" => $config["currency"],//'SEK'
				"message" => $message,//'Tack för din betalning!'
				"sessiontest" => "session123");

		}else{//echo "2==>";
			
			$data = array("payeePaymentReference" => $paymentReference,
				"callbackUrl" => $config["callbackUrl"],
				"payeeAlias" => $config["payeeAlias"],
				"amount" => $amount, 
				"currency" => $config["currency"],
				"message" => $message);

		}

		$data_string = json_encode($data);

		//Debug: request body
		//echo "<h2>Sent data:</h2>" . "<pre>" . $data_string . "</pre>" . "<hr>";

		//$ch = curl_init('https://mss.swicpc.bankgirot.se/swish-cpcapi/api/v1/paymentrequests/'); 
		$ch = curl_init('https://swicpc.bankgirot.se/swish-cpcapi/api/v1/paymentrequests/'); 
		
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
		////curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); //Uncomment this if you didn't add the root CA, curl will then ignore the SSL verification error.
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Content-Length: ' . strlen($data_string)) );

		curl_setopt($ch, CURLOPT_CAINFO,  $config["CAINFO"]);
		curl_setopt($ch, CURLOPT_SSLCERT,  $config["SSLCERT"]);
		curl_setopt($ch, CURLOPT_SSLKEY,  $config["SSLKEY"]);
		curl_setopt($ch, CURLOPT_SSLCERTPASSWD,  $config["SSLCERTPASSWD"]);
		curl_setopt($ch, CURLOPT_SSLKEYPASSWD,  $config["SSLKEYPASSWD"]);

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_VERBOSE, 1);
		curl_setopt($ch, CURLOPT_HEADER, 1);
		////curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);//////

		$result = curl_exec($ch);
		//Debug: result, including headers
		// echo "<h2>Result</h2>";
		// echo "<pre>";
		// echo $result;
		// echo "</pre>";
		// echo "<pre>";
		// echo "CURLINFO_EFFECTIVE_URL: " . curl_getinfo($ch, CURLINFO_EFFECTIVE_URL) . "\n";
		// echo "CURLINFO_HTTP_CODE: " . curl_getinfo($ch, CURLINFO_HTTP_CODE) . "\n";
		// echo "CURLINFO_SSL_VERIFYRESULT: " . curl_getinfo($ch, CURLINFO_SSL_VERIFYRESULT) . "\n";
		// echo "CURLINFO_HEADER_SIZE: " . curl_getinfo($ch, CURLINFO_HEADER_SIZE) . "\n";
		// echo "</pre>";

		if (FALSE === $result)
		        throw new Exception(curl_error($ch), curl_errno($ch));

	    // Success response format:
		// Array
		// (
		//     [0] => HTTP/1.1 201 Created
		//     [1] => Server: Apache-Coyote/1.1
		//     [2] => Location: https://mss.swicpc.bankgirot.se/swish-cpcapi/api/v1/paymentrequests/484CBBC467DB4C98959DEFAC5BBDECF9
		//     [3] => Content-Length: 0
		//     [4] => Date: Mon, 03 Apr 2017 07:09:18 GMT
		//     [5] => 
		//     [6] => 
		// )

		// Error response format:
		// Array
		// (
		//     [0] => HTTP/1.1 422 Unprocessable Entity
		//     [1] => Server: Apache-Coyote/1.1
		//     [2] => Content-Type: application/json
		//     [3] => Transfer-Encoding: chunked
		//     [4] => Date: Mon, 03 Apr 2017 07:08:11 GMT
		//     [5] => 
		//     [6] => [{"errorCode":"ACMT03","errorMessage":"Payer not Enrolled","additionalInformation":null}]
		// )

		$headers = explode("\r\n",$result);
		$headerArr = array();
		foreach ($headers as $headerline) {
			$lineArr = explode(": ",$headerline,2);
			$val=null;
			if(sizeof($lineArr)>1){
				$val=$lineArr[1];
			}
			$headerArr[$lineArr[0]] = $val;
		}
		// var_dump($headerArr); // debug view of entire response

		if(array_key_exists("Location",	$headerArr)){
			$locationURL = $headerArr["Location"];
			$transactionId = explode("/",$locationURL)[sizeOf(explode("/",$locationURL))-1];
		}else{
			//Error: no location header present in response
			header('Content-Type: application/json');
			return $headers[sizeof($headers)-1];
		}

		// Store transactionId in the current order
		header('Content-Type: application/json');
		return '{"transactionId":"' . $transactionId . '","transactionURL":"' . $locationURL . '"}';


	} catch(Exception $e) {

	    //$errVar = trigger_error(sprintf('Curl failed with error #%d: %s', $e->getCode(), $e->getMessage()), E_USER_ERROR);
            return '{"errorMessage":"' . $e->getMessage(). '"}';
	}
	curl_close($ch);


}

function getPayment($paymentId, $config){
	try{

		if($paymentId != ""){

			//$ch = curl_init('https://mss.swicpc.bankgirot.se/swish-cpcapi/api/v1/paymentrequests/' . $paymentId); 
			$ch = curl_init('https://swicpc.bankgirot.se/swish-cpcapi/api/v1/paymentrequests/' . $paymentId); 
			
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
			//curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); //Uncomment this if you didn't add the root CA, curl will then ignore the SSL verification error.

			curl_setopt($ch, CURLOPT_CAINFO,  $config["CAINFO"]);
			curl_setopt($ch, CURLOPT_SSLCERT,  $config["SSLCERT"]);
			curl_setopt($ch, CURLOPT_SSLKEY,  $config["SSLKEY"]);
			curl_setopt($ch, CURLOPT_SSLCERTPASSWD,  $config["SSLCERTPASSWD"]);
			curl_setopt($ch, CURLOPT_SSLKEYPASSWD,  $config["SSLKEYPASSWD"]);

			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_VERBOSE, 1);
			curl_setopt($ch, CURLOPT_HEADER, 0);

			$result = curl_exec($ch);

			//Debug: response, including headers
			// echo "<h2>Result</h2>";
			// echo "<pre>";
			// var_dump($result);
			// echo "</pre>";
			// echo "<hr>";
			// echo "<pre>";
			// echo $result;
			// echo "</pre>";
			// echo "<pre>";
			// echo "CURLINFO_EFFECTIVE_URL: " . curl_getinfo($ch, CURLINFO_EFFECTIVE_URL) . "\n";
			// echo "CURLINFO_HTTP_CODE: " . curl_getinfo($ch, CURLINFO_HTTP_CODE) . "\n";
			// echo "CURLINFO_SSL_VERIFYRESULT: " . curl_getinfo($ch, CURLINFO_SSL_VERIFYRESULT) . "\n";
			// echo "CURLINFO_HEADER_SIZE: " . curl_getinfo($ch, CURLINFO_HEADER_SIZE) . "\n";

			// echo "</pre>";
		}else{
			//echo "No payment ID specified";
                        return '{"errorMessage":"Api Error"}';
		}

		if (FALSE === $result)
		        throw new Exception(curl_error($ch), curl_errno($ch));

		echo $result;

	} catch(Exception $e) {

	    //trigger_error(sprintf('Curl failed with error #%d: %s', $e->getCode(), $e->getMessage()), E_USER_ERROR);
            return '{"errorMessage":"' . $e->getMessage(). '"}';

	}
	curl_close($ch);


}

// Globals
$config = array(
	"callbackUrl"     => "https://www.thetradingaspirants.com/shopPaymentType",
	"payeeAlias"      => "1233144318", //Swish number of the merchant
	"currency"        => "SEK", //currency code	
        "CAINFO"          => '/var/www/vhosts/borstjanaren.se/httpdocs/swish/swishcacert.pem', //Path to root CA
	"SSLCERT"         => '/var/www/vhosts/borstjanaren.se/httpdocs/swish/swishclientcert.pem', //Path to client certificate
	"SSLKEY"          => '/var/www/vhosts/borstjanaren.se/httpdocs/swish/swish.key', //Path to private key
	"SSLCERTTYPE"     => 'PEM', 
	"SSLCERTPASSWD"   => 'borst#17118*', //Password for client certificate, if it's protected	
	"SSLKEYPASSWD"    => 'borst#17118*' //Password for private key password, if it's protected	
);

if(isset($_GET["orderId"]) && isset($_GET["phone"]) && isset($_GET["samt"])){//echo "3==>";
	echo createPayment($_GET["orderId"], $_GET["phone"], $_GET["samt"], $_GET["msg"], $config);
}else{
	if(isset($_GET["transactionId"])){//echo "4==>";
		
		if(isset($_GET["action"]) && $_GET["action"] == "update"){//echo "5==>";
			getPayment($_GET["transactionId"], $config);
		}else{//echo "6==>";
			if(isset($_SESSION[$_GET["transactionId"]])){//echo "7==>";
				echo '{"transactionId":"' . $_GET["transactionId"] . '","status":"' . $_SESSION[$_GET["transactionId"]]["status"] . '"}';
			}else{//echo "8==>"; 
				//echo '{"error":"Callback not received yet", "transactionId":"' . $_GET["transactionId"] . '","status":"unknown" }';
				echo getPayment($_GET["transactionId"], $config);
			}
		}
	}else{//echo "9==>";
		echo '{"error":"Parameter missing"}';
	}
}
?>