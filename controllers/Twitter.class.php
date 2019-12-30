<?php

/**
 * Twitter.class.php
 * Description:
 *
 */

class Twitter
{
	private $_twitter;

	public function __construct($consumerKey, $consumerSecret, $accessToken, $accessTokenSecret)
	{
		require_once dirname(__FILE__) . '/../Twitter/oauthdamnit.php';
		$this->_twitter = new OAuthDamnit($consumerKey, $consumerSecret, $accessToken, $accessTokenSecret);
	}

	public function tweet($tweet)
	{
		return $this->_twitter->post('https://api.twitter.com/1.1/statuses/update.json', $tweet);
	}

    public function getUser($params)
    {
        return $this->_twitter->get('https://api.twitter.com/1.1/users/show.json', $params);
    }

    public function getStatuses($user)
	{
		return $this->_twitter->get('https://api.twitter.com/1.1/statuses/user_timeline.json', $user);
	}

    public function getFollowers($params)
    {
        return $this->_twitter->get('https://api.twitter.com/1.1/followers/list.json', $params);
    }

    public function getRateLimitStatus($params)
	{
		return $this->_twitter->get('https://api.twitter.com/1.1/application/rate_limit_status.json', $params);
	}
}