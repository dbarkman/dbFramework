<?php

/**
 * Curl.class.php
 * Description:
 *
 */

class Curl
{
	private $_logger;

	public function __construct($logger) {
		$this->_logger = $logger;
	}

	protected function runCurl($requestMethod, $url, $headers = null, $userpwd = null, $fields = null, $returnStatus = false) {
        ob_start();
        $out = fopen('/var/www/html/dbFramework/logs/curl.log', 'a');
        fwrite($out, '-------------------- STARTING --------------------' . PHP_EOL);
        fwrite($out, $url . PHP_EOL);
        $ch = curl_init();
		if ($requestMethod === 'GET') curl_setopt($ch, CURLOPT_HTTPGET, 1);
		if ($requestMethod === 'POST') {
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
			curl_setopt($ch, CURLOPT_USERPWD, $userpwd);
		}
        if ($requestMethod === 'PATCH') curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PATCH');
        if (!empty($headers)) {
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        }
        if (!empty($fields)) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        }
		if ($requestMethod === 'PUT') curl_setopt($ch, CURLOPT_PUT, 1);
		if ($requestMethod === 'PUTJson') {
			curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Content-Length: ' . strlen($fields)));
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
			curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
		}
		if ($requestMethod === 'DELETE') curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');

        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_2_0);
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_TIMEOUT, 10);
		curl_setopt($ch, CURLOPT_VERBOSE, 1);
		curl_setopt($ch, CURLOPT_STDERR, $out);
		$output = curl_exec($ch);
        $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $response = array('status' => $status, 'output' => $output);

        if ($status == 429) {
            $sendMail = new SendEmail($this->_logger);
            $sendMail->send('api429@dbarkman.com', 'david.barkman13@gmail.com', '429-1 from API', 'Status: ' . $status . ', Method: ' . $requestMethod . PHP_EOL . 'URL: ' . $url);
            fwrite($out, 'API responded with ' . $status . ', ' . $requestMethod . ', ' . $url . PHP_EOL);
        }

        fwrite($out, '-------------------- ENDING --------------------' . PHP_EOL . PHP_EOL);
        fclose($out);

		curl_close($ch);

        if ($returnStatus == true) {
		    return $response;
        } else {
            return $output;
        }
	}
}
