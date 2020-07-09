<?php
session_start();
$db = "xxx";
$dbserver = "xxx";
$dbuser = "xxx";
$dbpassword = "xxx";
$mysql_ok = "failure";
$prefix = "";

if (isset($_GET['page'])) $page = $_GET['page'];
else $page = 1;
$page++;
$page--;

if ($conx = mysqli_connect($dbserver, $dbuser, $dbpassword, $db))
{
	mysqli_query($conx,"SET NAMES UTF8");
	mysqli_query($conx,"SET CHARACTER_SET UTF8");
	$mysql_ok = "ok";
}
?>