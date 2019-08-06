
<?php

class SwishController
{
    public static function getRoutes()
    {
        $routes = [];

        //$routes[] = new Route('GET /swish', function () {
            $url = "https://mss.swicpc.bankgirot.se/swish-cpcapi/api/v1/paymentrequests";

            $ch = curl_init();

            $data =
                [
                    'payeePaymentReference' => '100100',
                    'callbackUrl'           => 'https://localhost/SwishApiBySwish/test.php',
                    'payerAlias'            => '46739866319',
                    'payeeAlias'            => '1231181189',
                    'amount'                => 5,
                    'currency'              => 'SEK',
                    'message'               => 'testar'
                ];

            $data_string = json_encode($data);

            $options = array(
                CURLOPT_CUSTOMREQUEST   => 'POST',
                CURLOPT_RETURNTRANSFER  => true,
                CURLOPT_URL             => $url ,
                CURLOPT_VERBOSE         => true,
				CURLOPT_CAINFO          => '/var/www/vhosts/borstjanaren.se/httpdocs/cert/Test_Swish_Root_CA_v1_Test.pem',
                CURLOPT_SSLCERT         => '/var/www/vhosts/borstjanaren.se/httpdocs/cert/Swish_Merchant_Test_Certificate_1231181189.p12',
                CURLOPT_SSLCERTPASSWD   => 'swish',
                CURLOPT_SSLCERTTYPE     => 'P12',                
                CURLOPT_POST            => true,
                CURLOPT_POSTFIELDS      => $data_string,
                CURLOPT_HTTPHEADER      => [
                    'Content-Type: application/json'
                ]
            );
			/*			
                //CURLOPT_CAINFO          => 'D:/wamp64/openssl/certs/borst_ssl.cert',
                //CURLOPT_SSLCERT         => 'D:/wamp64/openssl/certs/borst_ssl.key',
				////CURLOPT_CAINFO 			=> 'D:/wamp64/openssl/certs/mychain.txt', //Path to root CA
				////CURLOPT_SSLCERT 		=> 'D:/wamp64/openssl/certs/mycert.cer', //Path to client certificate
				////CURLOPT_SSLKEY 			=> 'D:/wamp64/openssl/certs/mykey.key', //Path to private key
			*/
var_dump($options);
            curl_setopt_array($ch , $options);

            $output = curl_exec($ch);

            if(!$output)
            {
                echo "Curl Error : " . curl_error($ch);
            }
            else
            {
                echo htmlentities($output);
            }

            return false;
        //});

        return $output;

    }

}

$profile = new SwishController();
$profile->getRoutes();
