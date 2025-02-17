<?php

/**
 * Tools.class.php
 * Project: 3CommasManager
 * Created with PhpStorm
 * Developer: David Barkman
 * Created on: 9/26/24 @ 17:17
 */
 
class Tools
{
    public static function convertDurationSecondsToTime($duration): string {
        $days = 0;
        $hours = 0;
        $minutes = 0;
        $seconds = 0;
        while ($duration > 0) {
            if ($duration / 86400 > 1) {
                $days = floor($duration / 86400);
                $duration -= ($days * 86400);
            } else if ($duration / 3600 > 1) {
                if ($duration == 86400) {
                    $days++;
                    $duration = 0;
                } else {
                    $hours = floor($duration / 3600);
                    $duration -= ($hours * 3600);
                }
            } else if ($duration / 60 > 1) {
                if ($duration == 3600) {
                    $hours++;
                    $duration = 0;
                } else {
                    $minutes = floor($duration / 60);
                    $duration -= ($minutes * 60);
                }
            } else {
                if ($duration == 60) {
                    $minutes++;
                    $duration = 0;
                } else {
                    $seconds = $duration;
                    $duration = 0;
                }
            }
        }
        $time = "";
        if ($days > 0) $time = $days < 10 ?  "0" . $days . ":" : $days . ":";
        $time .= ($hours > 0) ? ($hours < 10) ? "0" . $hours . ":" : $hours . ":" : "00:";
        $time .= ($minutes > 0) ? ($minutes < 10) ? "0" . $minutes . ":" : $minutes . ":" : "00:";
        $time .= ($seconds > 0) ? ($seconds < 10) ? "0" . $seconds : $seconds : "00";
        return $time;
    }

    public static function convertTimeToDurationSeconds($time): string {
        $timeParts = explode(':', $time);
        $seconds = $timeParts[0] * 3600;
        $seconds += $timeParts[1] * 60;
        $seconds += intval($timeParts[2]);
        return $seconds;
    }

    public static function shortenAddys($address, $parts): string {
        $first4 = substr($address, 0, 4);
        $last4 = substr($address, -4);
        switch ($parts) {
            case 1:
                return $first4;
            case 2:
                return $last4;
            default:
                return $first4 . '...' . $last4;
        }
    }
}