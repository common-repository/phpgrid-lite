<?php
require_once('../../../wp-load.php');

/*
require_once('phpGrid.php');     

$_SESSION['a'] = $_POST['db_host'];
$_SESSION['b'] = $_POST['db_user'];
$_SESSION['c'] = $_POST['db_pass']; 
$_SESSION['d'] = $_POST['db_name'];
$_SESSION['e'] = $_POST['db_type'];
$_SESSION['f'] = $_POST['db_charset'];

error_reporting(0);

$dg = new C_DataGrid($_POST['sql_select'], $_POST['primary_key'], $_POST['table_name']);


if($_POST['sql_where']!='')
{
	$dg->set_query_filter($_POST['sql_where']);
}

$column_detail=json_decode($_POST['column_property_detail']);
$required_column_name = '';
$readonly_column_name = '';
if(is_array($column_detail))
foreach($column_detail as $obj)
{
	if($obj[0]!='')
	{
		if($obj[1]!='')
		$dg->set_col_title($obj[0],$obj[1]);
		
		if($obj[2]!='')
		$dg->set_col_width($obj[0],$obj[2]);
		
		if($obj[3]==1)
		$dg->set_col_hidden($obj[0]);
		
		if($obj[4]==1)
		$required_column_name .= $obj[0].',';
		
		if($obj[5]==1)
		$readonly_column_name .= $obj[0].',';
		
		if($obj[6]==1)
		$dg->set_col_link($obj[0]);
		
	}
	
}

if($required_column_name!='')
$dg->set_col_required(substr_replace($required_column_name,"",-1));

if($readonly_column_name!='')
$dg->set_col_readonly(substr_replace($readonly_column_name,"",-1));

if($_POST['theme_roller']!='')
$dg->set_theme($_POST['theme_roller']);

if($_POST['locale_setting']!='')
$dg->set_locale($_POST['locale_setting']);    

if($_POST['grid_width']!='' && $_POST['grid_height']!='')
$dg->set_dimension($_POST['grid_width'], $_POST['grid_height']);

if($_POST['enable_search']==1) 
$dg->enable_search(true);


if($_POST['caption']!='')
$dg->set_caption($_POST['caption']);


$dg -> display();
*/
?>
<?php
/*echo "<pre>";
print_r($_REQUEST);*/

 
session_start();
wp_enqueue_script('jquery');
$_SESSION['phpgrid_host'] = $_REQUEST['db_host'];
$_SESSION['phpgrid_db_user'] = $_REQUEST['db_user'];
$_SESSION['phpgrid_db_pass'] = $_REQUEST['db_pass']; 
$_SESSION['phpgrid_db_name'] = $_REQUEST['db_name'];
$_SESSION['phpgrid_db_type'] = $_REQUEST['db_type'];
$_SESSION['phpgrid_db_charset'] = $_REQUEST['db_charset'];
$_SESSION['server_root'] = $_REQUEST['server_root'];
require_once("conf.php");
require_once('phpGrid.php');  
error_reporting(0);   

/*echo "<pre>";
print_r($_GET);
**/
 

$dg = new C_DataGrid($_REQUEST['sql_select'],$_REQUEST['primary_key'],$_REQUEST['table_name']);
//$dg->enable_edit('FORM', 'CRUD');
/* new grid feacher*/ 

$dg->enable_autowidth(true);
//$dg->enable_advanced_search(true);
//$dg -> set_dimension($_REQUEST['grid_width'], $_REQUEST['grid_height']); 


/* finnish*/
//<!--bhadresh -->
if($_REQUEST['sql_where']!='')
{
	$dg->set_query_filter($_REQUEST['sql_where']);
}

$column_detail=json_decode($_REQUEST['column_property_detail']);
$required_column_name = '';
$readonly_column_name = '';
if(is_array($column_detail))
foreach($column_detail as $obj)
{
	if($obj[0]!='')
	{
		if($obj[1]!='')
		$dg->set_col_title($obj[0],$obj[1]);
		
		/*if($obj[2]!='')
		$dg->set_col_width($obj[0],$obj[2]);
		
		if($obj[3]==1)
		$dg->set_col_hidden($obj[0]);
		*/
		if($obj[4]==1)
		$required_column_name .= $obj[0].',';
		
		if($obj[5]==1)
		$readonly_column_name .= $obj[0].',';
		
		if($obj[6]==1)
		$dg->set_col_link($obj[0]);
		
	}
	
}

if($required_column_name!='')
$dg->set_col_required(substr_replace($required_column_name,"",-1));

if($readonly_column_name!='')
$dg->set_col_readonly(substr_replace($readonly_column_name,"",-1));

if($_REQUEST['theme_roller']!='')
$dg->set_theme($_REQUEST['theme_roller']);

if($_REQUEST['locale_setting']!='')
$dg->set_locale($_REQUEST['locale_setting']);    

/*if($_REQUEST['grid_height']!='')
$dg->set_dimension('',$_REQUEST['grid_height']);**/

if($_REQUEST['grid_height']!='')
$dg -> set_form_dimension($_REQUEST['grid_height'].'px');


if($_REQUEST['enable_search']==1) 
$dg->enable_search(true);


if($_REQUEST['caption']!='')
$dg->set_caption($_REQUEST['caption']);

//<!---FINISH--->
$dg -> display();
?>