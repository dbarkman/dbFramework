<?php

/**
 * LogRequest.class.php
 * Description:
 *
 */

class LogRequest
{
	public static function LogRequestToDB($arguments, $db)
	{
		$uuid = $arguments['uuid'];
		$noun = $arguments['noun'];
		$verb = $arguments['verb'];
		$request = $arguments['request'];
		$agent = $arguments['agent'];
		$timeStamp = $arguments['timeStamp'];
		$language = $arguments['language'];
		$httpStatus = $arguments['httpStatus'];
		$errorCode = $arguments['errorCode'];
		$queryTime = $arguments['queryTime'];
		$time = $arguments['time'];
		$size = $arguments['size'];
		$memory = $arguments['memory'];
		$appVersion = $arguments['appVersion'];
		$platform = $arguments['platform'];
		$device = $arguments['device'];
		$machine = $arguments['machine'];
		$osVersion = $arguments['osVersion'];
		$ip = $arguments['ip'];

		$query = "
			INSERT INTO
				APIRequests
			SET
				uuid = '$uuid',
				noun = '$noun',
				verb = '$verb',
				request = '$request',
				agent = '$agent',
				timeStamp = '$timeStamp',
				language = '$language',
				httpStatus = '$httpStatus',
				errorCode = '$errorCode',
				queryTime = '$queryTime',
				time = '$time',
				size = '$size',
				memory = '$memory',
				appVersion = '$appVersion',
				platform = '$platform',
				device = '$device',
				machine = '$machine',
				osVersion = '$osVersion',
				ip = '$ip'
		";
		mysqli_query($db, $query);
	}
}
