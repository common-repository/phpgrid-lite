<?php
session_start();

	$a = $_SESSION['phpgrid_host']; 
	$b = $_SESSION['phpgrid_db_user'];
	$c = $_SESSION['phpgrid_db_pass']; 
	$d = $_SESSION['phpgrid_db_name']; 
	$e = $_SESSION['phpgrid_db_type']; 
	$f = $_SESSION['phpgrid_db_charset']; 
	$g = $_SESSION['server_root'];

define('DB_HOSTNAME',$a);
define('DB_USERNAME',$b);
define('DB_PASSWORD', $c);
define('DB_NAME',$d);
define('DB_TYPE',$e);
define('DB_CHARSET',$f);

define('SERVER_ROOT', $g);

/******** DO NOT MODIFY ***********/
require_once('phpGrid.php');     
/**********************************/
?>
