<?php
session_start();
	$a = $_SESSION['a']; 
	$b = $_SESSION['b'];
	$c = $_SESSION['c']; 
	$d = $_SESSION['d']; 
	$e = $_SESSION['e']; 
	$f = $_SESSION['f']; 


define('DB_HOSTNAME',$a);
define('DB_USERNAME',$b);
define('DB_PASSWORD', $c);
define('DB_NAME',$d);
define('DB_TYPE',$e);
define('DB_CHARSET',$f);?>