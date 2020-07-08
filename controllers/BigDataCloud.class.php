<?php

/**
 * BigDataCloud.class.php
 * Description:
 *
 */

class BigDataCloud extends Curl
{

	private $_logger;

	public function __construct($logger) {
		parent::__construct($logger);

		$this->_logger = $logger;
	}

	public function reverseGeocode($url)
	{
		$this->_logger->info('BigDataCloud URL: ' . $url);

        $curlResult = self::runCurl('GET', $url, null, null, null);
        $this->_logger->debug('BigDataCloud Curl Result-: ' . $curlResult);

        return json_decode($curlResult);
	}
}
