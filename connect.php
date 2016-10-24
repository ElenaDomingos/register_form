<?php

if(!defined('INCLUDE_CHECK')) die('You don't have access!');


/* Конфигурация базы данных */

$db_host		= 'localhost';
$db_user		= '';
$db_pass		= '';
$db_database	= ''; 

/* Конец секции */



$link = mysql_connect($db_host,$db_user,$db_pass) or die('Not possible to connect the database');

mysql_select_db($db_database,$link);
mysql_query("SET names UTF8");

?>