<?php
   	require_once('../../../wp-load.php');
	global $wpdb;
	$mydata;
	$sql = "SELECT DISTINCT grid_id FROM " . $wpdb->prefix. "phpgrid";
		$results =  $wpdb->get_results($sql);
		if($results=="")
		{
			return 'Error';
			exit;
		}
		foreach ($results as $result)
		{
			 $mydata.=$result->grid_id.',';
		}
	echo substr($mydata,0,-1);
?>
