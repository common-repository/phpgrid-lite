<?php
include('../../../wp-load.php');

global $wpdb;
$table=$wpdb->prefix . 'phpgrid';

$sql="update $table set setting_value='".$_POST['db_host']."' where grid_id=".$_POST['id']." and setting_name='db_host';";
$wpdb->query($sql);
$sql="update $table set setting_value='".$_POST['db_name']."' where grid_id=".$_POST['id']." and setting_name='db_name';";
$wpdb->query($sql);
$sql="update $table set setting_value='".$_POST['db_type']."' where grid_id=".$_POST['id']." and setting_name='db_type';";
$wpdb->query($sql);
$sql="update $table set setting_value='".$_POST['db_user']."' where grid_id=".$_POST['id']." and setting_name='db_user';";
$wpdb->query($sql);
$sql="update $table set setting_value='".$_POST['db_pass']."' where grid_id=".$_POST['id']." and setting_name='db_pass';";
$wpdb->query($sql);
$sql="update $table set setting_value='".$_POST['db_charset']."' where grid_id=".$_POST['id']." and setting_name='db_charset';";
$wpdb->query($sql);
$sql="update $table set setting_value='".$_POST['server_root']."' where grid_id=".$_POST['id']." and setting_name='server_root';";
$wpdb->query($sql);
$sql="update $table set setting_value='".$_POST['sql_select']."' where grid_id=".$_POST['id']." and setting_name='sql_select';";
$wpdb->query($sql);
$sql="update $table set setting_value='".$_POST['table_name']."' where grid_id=".$_POST['id']." and setting_name='table_name';";
$wpdb->query($sql);
$sql="update $table set setting_value='".$_POST['primary_key']."' where grid_id=".$_POST['id']." and setting_name='primary_key';";
$wpdb->query($sql);
$sql="update $table set setting_value='".$_POST['sql_where']."' where grid_id=".$_POST['id']." and setting_name='sql_where';";
$wpdb->query($sql);
$sql="update $table set setting_value='".$_POST['caption']."' where grid_id=".$_POST['id']." and setting_name='caption';";
$wpdb->query($sql);
$sql="update $table set setting_value='".$_POST['enable_search']."' where grid_id=".$_POST['id']." and setting_name='enable_search';";
$wpdb->query($sql);
$sql="update $table set setting_value='".$_POST['grid_width']."' where grid_id=".$_POST['id']." and setting_name='grid_width';";
$wpdb->query($sql);
$sql="update $table set setting_value='".$_POST['grid_height']."' where grid_id=".$_POST['id']." and setting_name='grid_height';";
$wpdb->query($sql);
$sql="update $table set setting_value='".$_POST['theme_roller']."' where grid_id=".$_POST['id']." and setting_name='theme_roller';";
$wpdb->query($sql);
$sql="update $table set setting_value='".$_POST['locale_setting']."' where grid_id=".$_POST['id']." and setting_name='locale_setting';";
$wpdb->query($sql);
$sql="update $table set setting_value='".$_POST['column_property_detail']."' where grid_id=".$_POST['id']." and setting_name='column_property_detail';";
$wpdb->query($sql);

echo '1';