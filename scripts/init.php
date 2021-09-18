<?php
error_reporting(1);
//date_default_timezone_set('Asia/Calcutta');
//date_default_timezone_set('Asia/Jerusalem');
$SITE = "/";
$ROOT = $_SERVER['CONTEXT_DOCUMENT_ROOT'] . '/';
session_start();

require_once 'database/config.php';
require_once 'database/connect.php';
require_once 'database/allconfig.php';
require_once 'function/gen.php';
require_once 'function/admin.php';

// calculate time diff in min-yr, which is higher
/* function calc_time($published_time)
{
    $published_time = strtotime($published_time);
    $current_time = time();
    $min = round(abs($published_time - $current_time) / 60, 2);
    $time = floor($min) . ' דקות'; //min
    $time = ($time == 1 ? $time : $time = 'דקה');
    if ($min > 60) {
        $hr = $min / 60;
        $time = floor($hr) . ' שעות'; //hour
        $time = ($time == 1 ? $time : $time = 'שעה');
        if ($hr > 24) {
            $day = $hr / 24;
            $time = floor($day) . ' ימים'; //day
            $time = ($time == 1 ? $time : $time = 'יום');
            if ($day > 30) {
                $mth = $day / 30;
                $time = floor($mth) . ' חודשים'; //month
                $time = ($time == 1 ? $time : $time = 'חודש');
                if ($mth > 12) {
                    $yr = $mth / 12;
                    $time = floor($yr) . ' שָׁנָה'; //year
                    $time = ($time == 1 ? $time : $time = 'שנים');
                }
            }
        }
    }
    echo $time;
} */


