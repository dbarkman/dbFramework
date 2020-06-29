<?php

/**
 * OpenCage.class.php
 * Description:
 *
 */

class OpenCage extends Curl
{

	private $_logger;

	public function __construct($logger) {
		parent::__construct($logger);

		$this->_logger = $logger;
	}

	public function reverseGeocode($url)
	{
		$this->_logger->debug('OpenCage URL: ' . $url);

        $curlResult = self::runCurl('GET', $url, null, null, null);
        $this->_logger->debug('OpenCage Curl Result-: ' . $curlResult);

        return json_decode($curlResult);
	}
}
