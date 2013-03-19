<?php

/**
 * MobileProperties.class.php
 * Description:
 *
 */

//imports
//require_once dirname(__FILE__) . '/Properties.class.php';

class FrameworkProperties extends Properties
{
	private $_propertiesFile;
	const PROP_LOGFILE = "framework.log.file";
	const PROP_LOGLEVEL = "framework.log.level";

	public function __construct()
	{
		$this->_propertiesFile = dirname(__FILE__) . '/../config/framework.properties';
		parent::__construct();
		$this->load($this->_propertiesFile);
	}

	public function load($file)
	{
		parent::load($file);
	}

	public function save($file)
	{
		parent::save($file);
	}

	public function getLogFile()
	{
		return parent::getProperty(self::PROP_LOGFILE);
	}

	public function getLogLevel()
	{
		$string = $this->getLogLevelString();
		return Logger::getLevelInt($string);
	}

	public function getLogLevelString()
	{
		$string = $this->getProperty(self::PROP_LOGLEVEL);
		$level = Logger::getLevelInt($string);
		if ($level != NULL) {
			return $string;
		}
		return "INFO";
	}

	public function setLogFile($value)
	{
		$this->setProperty(self::PROP_LOGFILE, $value);
	}

	public function setLogLevel($value)
	{
		$this->setLogLevelString(Logger::getLevelString($value));
	}

	public function setLogLevelString($value)
	{
		$this->setProperty(self::PROP_LOGLEVEL, $value);
	}
}
