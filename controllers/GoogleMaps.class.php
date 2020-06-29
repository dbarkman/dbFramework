<?php

/**
 * GoogleMaps.class.php
 * Description:
 *
 */

class GoogleMaps extends Curl
{

	private $_logger;

	public function __construct($logger) {
		parent::__construct($logger);

		$this->_logger = $logger;
	}

	public function reverseGeocode($url)
	{
		$this->_logger->info('Google Maps URL: ' . $url);

        $curlResult = self::runCurl('GET', $url, null, null, null);
        $this->_logger->info('Google Maps Curl Result: ' . $curlResult);

        $result = json_decode($curlResult);
        return $result;
	}
}
