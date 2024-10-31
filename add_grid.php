<?php
include('../../../wp-load.php');

global $wpdb;
$table=$wpdb->prefix . 'phpgrid';

$sql="select max(grid_id) as id from $table";
$data=$wpdb->get_results($sql,ARRAY_A);
$id=(int)$data[0]['id']+1;

$sql="insert into $table values (null,$id,'db_host','".$_POST['db_host']."');";
$wpdb->query($sql);
$sql="insert into $table values (null,$id,'db_name','".$_POST['db_name']."');";
$wpdb->query($sql);
$sql="insert into $table values (null,$id,'db_type','".$_POST['db_type']."');";
$wpdb->query($sql);
$sql="insert into $table values (null,$id,'db_user','".$_POST['db_user']."');";
$wpdb->query($sql);
$sql="insert into $table values (null,$id,'db_pass','".$_POST['db_pass']."');";
$wpdb->query($sql);
$sql="insert into $table values (null,$id,'db_charset','".$_POST['db_charset']."');";
$wpdb->query($sql);
$sql="insert into $table values (null,$id,'server_root','".$_POST['server_root']."');";
$wpdb->query($sql);
$sql="insert into $table values (null,$id,'sql_select','".$_POST['sql_select']."');";
$wpdb->query($sql);
$sql="insert into $table values (null,$id,'table_name','".$_POST['table_name']."');";
$wpdb->query($sql);
$sql="insert into $table values (null,$id,'primary_key','".$_POST['primary_key']."');";
$wpdb->query($sql);
$sql="insert into $table values (null,$id,'sql_where','".$_POST['sql_where']."');";
$wpdb->query($sql);
$sql="insert into $table values (null,$id,'caption','".$_POST['caption']."');";
$wpdb->query($sql);
$sql="insert into $table values (null,$id,'enable_search','".$_POST['enable_search']."');";
$wpdb->query($sql);
$sql="insert into $table values (null,$id,'grid_width','".$_POST['grid_width']."');";
$wpdb->query($sql);
$sql="insert into $table values (null,$id,'grid_height','".$_POST['grid_height']."');";
$wpdb->query($sql);
$sql="insert into $table values (null,$id,'theme_roller','".$_POST['theme_roller']."');";
$wpdb->query($sql);
$sql="insert into $table values (null,$id,'locale_setting','".$_POST['locale_setting']."');";
$wpdb->query($sql);
$sql="insert into $table values (null,$id,'column_property_detail','".$_POST['column_property_detail']."');";
$wpdb->query($sql);
	
echo '1';
?>