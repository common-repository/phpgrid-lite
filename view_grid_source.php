<?php
error_reporting(0);
echo '<?php';
?>

required_once('phpGrid.php');

$phpgrid_object = new C_DataGrid("<?php echo $_POST['sql_select'];?>", "<?php echo $_POST['primary_key'];?>", "<?php echo $_POST['table_name'];?>");

<?php

if($_POST['sql_where']!='')
{
	echo '$phpgrid_object ->set_query_filter("'.$_POST['sql_where'].'");'."\n\n";
}
?>

<?php
$column_detail=json_decode($_POST['column_property_detail']);
$required_column_name = '';
$readonly_column_name = '';
if(is_array($column_detail))
foreach($column_detail as $obj)
{
	if($obj[0]!='')
	{
		if($obj[1]!='')
		echo '$phpgrid_object -> set_col_title("'.$obj[0].'", "'.$obj[1].'");'."\n\n";
		
		if($obj[2]!='')
		echo '$phpgrid_object ->set_col_width("'.$obj[0].'", '.$obj[2].');'."\n\n";
		
		if($obj[3]==1)
		echo '$phpgrid_object -> set_col_hidden("'.$obj[0].'");'."\n\n";
		
		if($obj[4]==1)
		$required_column_name .= $obj[0].',';
		
		if($obj[5]==1)
		$readonly_column_name .= $obj[0].',';
		
		if($obj[6]==1)
		echo '$phpgrid_object -> set_col_link("'.$obj[0].'");'."\n\n";
		
		
	}
	
}

if($required_column_name!='')
echo '$phpgrid_object -> set_col_required("'.substr_replace($required_column_name,"",-1).'");'."\n\n";

if($readonly_column_name!='')
echo '$phpgrid_object -> set_col_readonly("'.substr_replace($readonly_column_name,"",-1).'");'."\n\n";


if($_POST['theme_roller']!='')
echo '$phpgrid_object -> set_theme("'.$_POST['theme_roller'].'");'."\n\n";

if($_POST['locale_setting']!='')
echo '$phpgrid_object -> set_locale("'.$_POST['locale_setting'].'");'."\n\n";

if($_POST['grid_width']!='' && $_POST['grid_height']!='')
echo '$phpgrid_object -> set_dimension("'.$_POST['grid_width'].'","'.$_POST['grid_height'].'");'."\n\n";

if($_POST['enable_search']==1) 
echo '$phpgrid_object -> enable_search(true);'."\n\n";

?>

<?php
if($_POST['caption']!='')
echo '$phpgrid_object -> set_caption("'.$_POST['caption'].'");'."\n\n";
?>

$phpgrid_object -> display();



<?php
echo '?>';
?>
