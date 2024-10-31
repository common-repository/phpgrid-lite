<?php
include('../../../wp-load.php');

global $wpdb;
$table=$wpdb->prefix . 'phpgrid';

$sql="select * from $table where setting_name='caption'";
$data=$wpdb->get_results($sql,ARRAY_A);
?>
<table width="100%" class="grid_list_table">
<?php for($i=0;$i<count($data);$i++)
{
	?>
<tr>
<td class="edit_btn" align="center"><input type="button" value="Edit" onclick="edit_grid(<?php echo $data[$i]['grid_id'];?>);"/></td>
<td><input type="button" value="Delete" onclick="delete_grid(<?php echo $data[$i]['grid_id'];?>);"/></td>
<td class="grid_name" align="left">phpGrid <?php echo $data[$i]['grid_id'];?></td>
<td class="empty_fild" align="left">Short COde: [phpgrid id=<?php echo $data[$i]['grid_id'];?>]</td>
<td class="empty_fild" align="left"></td>
</tr>
<?php
}?>

</table>
