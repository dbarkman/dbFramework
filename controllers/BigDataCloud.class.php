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

	public function reverseGeocode($url) {
		$this->_logger->debug('BigDataCloud URL: ' . $url);
        $response = self::runCurl('GET', $url, null, null, null, true);
        if ($response['status'] == 200) {
            $this->_logger->debug("BigDataCloud API returned: " . $response['status']);
        } else {
            $this->_logger->warn("BigDataCloud API returned: " . $response['status']);
        }
        if ($response['status'] == 429) {
            $this->_logger->error("BigDataCloud API returned 429, BACK OFF!");
            return FALSE;
        } else {
            return json_decode($response['output']);
        }
    }
}
