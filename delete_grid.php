<?php
include('../../../wp-load.php');

global $wpdb;
$table=$wpdb->prefix . 'phpgrid';

$sql="delete from $table where grid_id=".$_POST['id'];
$data=$wpdb->get_results($sql,ARRAY_A);

echo 'yes';
?>