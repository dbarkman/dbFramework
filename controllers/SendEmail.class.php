<?php

/**
 * SendEmail.class.php
 * Description:
 *
 */

class SendEmail extends Curl
{
    private $_logger;
    private $_status;
    private $_response;

    private $_apiKey;
    private $_secretKey;

    public function __construct($logger) {
        $this->_logger = $logger;

        global $maijetCreds;
        $this->_apiKey = $maijetCreds['apiKey'];
        $this->_secretKey = $maijetCreds['apiSecret'];
    }

	public function send($fromAddress, $toAddress, $subject, $message) {
        $body = [
            'Messages' => [
                [
                    'From' => [
                        'Email' => $fromAddress
                    ],
                    'To' => [
                        [
                            'Email' => $toAddress
                        ]
                    ],
                    'Subject' => $subject,
                    'TextPart' => $message
                ]
            ]
        ];
        $fields = json_encode($body);

        $user = base64_encode($this->_apiKey . ':' . $this->_secretKey);
        $headers = array(
            'Authorization: Basic ' . $user,
            'Content-Type: application/json'
        );

        $url = 'https://api.mailjet.com/v3.1/send';

        $response = self::runCurl('POST', $url, $headers, $user, $fields, true);
        $this->_status = $response['status'];
        $this->_response = json_decode($response['output']);
        $this->_logger->info("Mailjet API returned: " . $this->_status);
        return $this->_status;
	}

    public function getStatus() {
        return $this->_status;
    }

    public function getResponse() {
        return $this->_response;
    }

}