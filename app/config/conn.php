<?php
    session_start();
    date_default_timezone_set('Asia/Manila');
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $db = 'dss';

    mysql_connect($host,$usser,$pass) or die('Unable to Connect!');
    mysql_select_db($db) or die('No Database');
?>