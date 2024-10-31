<?php
include('../../../wp-load.php');

global $wpdb;
$table=$wpdb->prefix . 'phpgrid';

$sql="select * from $table where grid_id=".$_POST['id'];
$_SESSION['id'] = $_POST['id'];
$data=$wpdb->get_results($sql,ARRAY_A);
//print_r($data);

$str='[';
foreach($data as $obj)
{
	$str.='[\''.$obj['setting_name'].'\',\''.$obj['setting_value'].'\'],';
}
$str.=']';

echo $str;
?>