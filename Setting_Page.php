<div class="wrap">
 <h2>Setting Page</h2>
 <br />
 <br />
 <div>

<div class="collapsibleContainer" title="Database Connection Setting">
<p>
<table>
<tr>
<td>
<label>Database Host</label>
</td>
<td>
<input type="text" name="db_host" id="db_host"/>
</td>
</tr>
<tr>
<td>
<label>Database Name</label>
</td>
<td>
<input type="text" name="db_name" id="db_name"/>
</td>
</tr>
<tr>
<td>
<label>Database Type</label>
</td>
<td>
<input type="text" name="db_type" id="db_type"/>
</td>
</tr>
<tr>
<td>
<label>Database User Name</label>
</td>
<td>
<input type="text" name="db_user" id="db_user"/>
</td>
</tr>
<tr>
<td>
<label>Database Password</label>
</td>
<td>
<input type="text" name="db_pass" id="db_pass"/>
</td>
</tr>

<tr>
<td><label>Database Charset</label></td>
<td><input type="text" name="db_charset" id="db_charset"/></td>
</tr>
<tr>
<td><label>Server Root</label></td>
<td><input type="text" name="server_root" id="server_root"/> &nbsp;<strong style="color:#ccc;">{Ex:- /Project Folder Name/wp-content/plugins/php_grid_lite(plugin name)}</strong></td>
</tr>
</table>
</p>
</div>
<div class="collapsibleContainer" title="Constructor">
<p>
<table>
<tr>
<td><label>SQL Select</label></td>
<td><input type="text" name="sql_select" id="sql_select"/></td>
</tr>
<tr>
<td><label>Table Name</label></td>
<td><input type="text" name="table_name" id="table_name"/></td>
</tr>
<tr>
<td><label>Primary Key</label></td>
<td><input type="text" name="primary_key" id="primary_key"/></td>
</tr>
</table>
</p>
</div>
<div class="collapsibleContainer" title="Query Filter">
<p>
<table>
<tr>
<td><label>SQL Where</label></td>
<td><input type="text" name="sql_where" id="sql_where"/></td>
</tr>
</table>
</p>
</div>
<div class="collapsibleContainer" title="Data Grid Caption">
<p>
<table>
<tr>
<td><label>Caption</label></td>
<td><input type="text" name="caption" id="caption"/></td>
</tr>
</table>
</p>
</div>
<div class="collapsibleContainer" title="Column Property">
<p>
<div id="column_detail">
</div>
<input type="button" value="Add New Column" onClick="add_new_column()"/>
<input type="hidden" name="total_column" id="total_column" value="0" />
</p>
</div>


<style type="text/css">

table.grid_list_table
{
	border:5px inset;
	border-width: 1px;
	border-color: gray;
	width:90%;
	margin:10px;
}
table.grid_list_table td
{
	border:5px inset;
	border-width: 1px;
	border-color: gray;
	padding-left: 10px;
	
}
table.grid_list_table .edit_btn
{
	width:10%;
}
table.grid_list_table .grid_name
{
	width:20%;
}
table.grid_list_table .empty_fild
{
	width:30%;
}
.loading_animation
{
	background-image:url('<?php echo $pluginDir;?>loading.gif');
	background-repeat:no-repeat;
	background-position:center;
	background-color:#999;
	top:0;
	left:0;
	height:100%;
	width:100%;
	display:none;
	z-index:50000;
	position:fixed;
	filter:alpha(opacity=50);
	-moz-opacity: 0.50;
	opacity: 0.50;
	
}
.column_data
{
	position:relative;
	float:left;
	width:auto;
	height:auto;
}
.column_remove
{
	position:relative;
	float:right;
	background-image:url('<?php echo $pluginDir;?>Remove-icon.png');
	background-repeat:no-repeat;
	background-position:center;
	background-color:#607882;
	width:20px;
	height:50px;
	
	
}
</style>
<div class="collapsibleContainer" title="Other Setting">
<p>
<table>
<tr>
<td><label>Enable Search</label></td>
<td><select id="enable_search"><option value="0">No</option><option value="1">Yes</option></select></td>
</tr>
<tr>
<!--<td><label>Grid Width</label></td><td><input type="text" id="grid_width"/></td>--><td><label>Grid Height</label></td><td><input type="text" id="grid_height"/></td>
</tr>
<tr>
<td><label>Theme Roller</label></td><td><input type="text" id="theme_roller"/></td>
</tr>
<tr>
<td><label>Locale Setting</label></td><td><input type="text" id="locale_setting"/></td>
</tr>
</table>
</p>
</div>

<div class="collapsibleContainer" title="All Grid">
<p>
<div id="all_grid">

</div>
</p>
</div>

<br/>
<table style="text-align:center" width="90%">
<tr>
<td width="30%"><input type="button" value="Save Grid" name="Save" onclick="save_grid();" id="save_grid" style="display:none"/><input type="button" value="Add Grid" name="AddGrid" onclick="add_grid();" id="add_grid"/></td>
<!--<td width="30%"><input type="button" value="Preview Grid" name="Preview" onclick="preview_grid();"/></td>-->
<td width="30%"><input type="button" value="Preview Grid test" name="Preview test" onclick="preview_grid_test();"/></td>
<!--<td width="30%"><a href="<?php echo $pluginDir;?>preview_grid.php"><input type="button" value="Preview Grid" name="Preview" /></a></td>-->
<td width="30%"><input type="button" value="View Grid Source" name="ViewSource" onclick="view_grid_source();"/></td>
</tr>
</table>
<br/><br/><br/>
<div id="loading_animation" class="loading_animation" align="center"></div>
<div id="add_new_mixandmatch"></div>

<script language="javascript" type="text/javascript">
var current_edit_grid_id=0;
    jQuery(document).ready(function() {
        jQuery(".collapsibleContainer").collapsiblePanel();
		load_allgrid();
    });
	
	function add_new_column()
	{
		var id = parseInt(jQuery("#total_column").val());
		var str='<br/><div id="col_'+id+'"><div class="column_data"><table><tr><td><label>Columm Name</label></td><td><input type="text" id="column_name_'+id+'"/></td><td><label>Column Title</label></td><td><input type="text" id="column_title_'+id+'"/></td><td><label>Column Width</label></td><td><input type="text" id="column_width_'+id+'"/></td></tr></table><table><tr><td><label>Column Hidden</label></td><td><select id="column_hidden_'+id+'"><option value="0">No</option><option value="1">Yes</option></select></td><td><label>Column Required</label></td><td><select id="column_required_'+id+'"><option value="0">No</option><option value="1">Yes</option></select></td><td><label>Column ReadOnly</label></td><td><select id="column_readonly_'+id+'"><option value="0">No</option><option value="1">Yes</option></select></td><td><label>Display Hyperlink</label></td><td><select id="column_hyperlink_'+id+'"><option value="0">No</option><option value="1">Yes</option></select></td></tr></table></div><div class="column_remove" onclick="remove_column_data(\''+id+'\')">&nbsp;</div></div><br/>';
		
		
		jQuery("#column_detail").append(str);
		jQuery("#total_column").val(parseInt(jQuery("#total_column").val())+1);
		
	}
	function add_new_column_with_data(data)
	{
		var id = parseInt(jQuery("#total_column").val());
		var str='<br/><div id="col_'+id+'"><div class="column_data"><table><tr><td><label>Columm Name</label></td><td><input type="text" id="column_name_'+id+'" value="'+data[0]+'"/></td><td><label>Column Title</label></td><td><input type="text" id="column_title_'+id+'" value="'+data[1]+'"/></td><td><label>Column Width</label></td><td><input type="text" id="column_width_'+id+'" value="'+data[2]+'"/></td></tr></table><table><tr><td><label>Column Hidden</label></td><td><select id="column_hidden_'+id+'">';
		
		if(data[3]==1)
		str+='<option value="0">No</option><option value="1"  selected>Yes</option>';		
		else
		str+='<option value="0" selected>No</option><option value="1">Yes</option>';
		
		str+='</select></td><td><label>Column Required</label></td><td><select id="column_required_'+id+'">';
		
		if(data[4]==1)
		str+='<option value="0">No</option><option value="1" selected>Yes</option>';
		else
		str+='<option value="0" selected>No</option><option value="1">Yes</option>';
		
		str+='</select></td><td><label>Column ReadOnly</label></td><td><select id="column_readonly_'+id+'">';
		
		if(data[5]==1)
		str+='<option value="0">No</option><option value="1" selected>Yes</option>';
		else
		str+='<option value="0" selected>No</option><option value="1">Yes</option>';
		
		str+='</select></td><td><label>Display Hyperlink</label></td><td><select id="column_hyperlink_'+id+'">';
		
		if(data[6]==1)
		str+='<option value="0">No</option><option value="1" selected>Yes</option>';
		else
		str+='<option value="0" selected>No</option><option value="1">Yes</option>';
		
		
		
		str+='</select></td></tr></table></div><div class="column_remove" onclick="remove_column_data(\''+id+'\')">&nbsp;</div></div><br/>';
		
		jQuery("#column_detail").append(str);
		jQuery("#total_column").val(parseInt(jQuery("#total_column").val())+1);
	}
	function save_grid()
	{
		display_loading();
		jQuery.ajax({
			   type: "POST",
			   url: "<?php echo $pluginDir;?>save_grid.php",
			   data: get_all_fild_value()+'&id='+current_edit_grid_id,
			   success: function(data)
			   {
				 if(data==1)
				 {
					 alert('Save Grid Sucessfully');
					 clear_form_data();
			  		 jQuery('#save_grid').css("display", "none");
					 jQuery('#add_grid').css("display", "");	 

				 }
				 else
				 {
					 alert('Error In save grid');
				 }
				 
				 hide_loading();
				 
			   }
			 });
	}
	function preview_grid()
	{
		display_loading();
		tb_show('Grid Preview','#TB_inline?width=800&height=500', null);
		jQuery.ajax({
			   type: "POST",
			   url: "<?php echo $pluginDir;?>preview_grid.php",
			   data: get_all_fild_value(),
			   success: function(data)
			   {
				 alert(data);
				 jQuery("#TB_ajaxContent").html(data);
				 hide_loading();
			   }
			 });
	 }
	 function preview_grid_test()
	 {
		var abc=new Array();
		/*sql_select = jQuery("#sql_select").val();
		table_name = jQuery("#table_name").val();
		primary_key = jQuery("#primary_key").val();*/
		abc = get_all_fild_value();
		
		window.open('<?php echo $pluginDir;?>preview_grid.php?sql_select='+abc,'','width=auto,height=auto,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=0,top=0')
		
	 }
	function view_grid_source()
	{
		display_loading();
		tb_show('Grid Source','#TB_inline?width=600&height=500', null);
		jQuery.ajax({
			   type: "POST",
			   url: "<?php echo $pluginDir;?>view_grid_source.php",
			   data: get_all_fild_value(),
			   success: function(data)
			   {
				 
				 jQuery("#TB_ajaxContent").html('<textarea style="width:95%;height:95%;">'+data+'</textarea>');
				 hide_loading();

			   }
			 });
	}
	function edit_grid(id)
	{
		clear_form_data();
		current_edit_grid_id=id;
		display_loading();
		jQuery.ajax({
			   type: "POST",
			   url: "<?php echo $pluginDir;?>edit_grid.php",
			   data: 'id='+id,
			   success: function(data)
			   {
				 fill_form_data(data);
				 hide_loading();
			   }
			 });
	}
	function delete_grid(id)
	{
		display_loading();
		jQuery.ajax({
			   type: "POST",
			   url: "<?php echo $pluginDir;?>delete_grid.php",
			   data: 'id='+id,
			   success: function(data)
			   {	 
				 hide_loading();
				 if(data=='yes')
				 load_allgrid();
				 else
				 alert('error');
			   }
			 });
	}
	function load_allgrid()
	{
		display_loading();
		jQuery.ajax({
			   
			   url: "<?php echo $pluginDir;?>all_grid.php",
			   success: function(data)
			   {
				 jQuery("#all_grid").html(data);
				 hide_loading();
			   }
			 });
	}
	function add_grid()
	{
		display_loading();
		jQuery.ajax({
			   type: "POST",
			   url: "<?php echo $pluginDir;?>add_grid.php",
			   data: get_all_fild_value(),
			   success: function(data)
			   {
				 if(data==1)
				 {
					 alert('Add Grid Sucessfully');
					 clear_form_data();
				 }
				 else
				 {
					 alert('Error In add grid');
				 }
				 
				 hide_loading();
				 load_allgrid();
			   }
			 });
	}
	function fill_form_data(data)
	{
		 var obj=eval('(' + data + ')');
		 jQuery.each(obj, function(i, val) 
		 {
			   if(val !=null)
			   if(val[0] != 'column_property_detail')
			   {
				   jQuery("#"+val[0]).val(val[1]);
			   }
			   else
			   {
				   var tmp = eval('(' + val[1] + ')');
				   if(tmp.length >0)
				   {
					   for(var i=0;i<tmp.length;i++)
					   {
						   add_new_column_with_data(tmp[i]);
					   }
					   
				   }
			   }
    	 });
		jQuery('#save_grid').css("display", "");
		jQuery('#add_grid').css("display", "none");
		
		
	}
	function remove_column_data(id)
	{
		jQuery("#column_name_"+id).val('');
		jQuery('#col_'+id).css("display", "none");
		
	}
	function clear_form_data()
	{
		jQuery("#db_host").val('');
		jQuery("#db_name").val('');
		jQuery("#db_type").val('');
		jQuery("#db_user").val('');
		jQuery("#db_pass").val('');
		jQuery("#db_charset").val('');
		jQuery("#server_root").val('');
		jQuery("#sql_select").val('');
		jQuery("#table_name").val('');
		jQuery("#primary_key").val('');
		jQuery("#sql_where").val('');
		jQuery("#caption").val('');
		jQuery("#total_column").val('0');
		jQuery("#column_detail").html('');
		jQuery("#grid_width").val('');
		jQuery("#grid_height").val('');
		jQuery("#theme_roller").val('');
		jQuery("#locale_setting").val('');
		jQuery("#enable_search").val(0);
		
	}
	function get_all_fild_value()
	{
		var str='';
		str+='db_host='+escape(jQuery("#db_host").val())+'&';
		str+='db_name='+escape(jQuery("#db_name").val())+'&';
		str+='db_type='+escape(jQuery("#db_type").val())+'&';
		str+='db_user='+escape(jQuery("#db_user").val())+'&';
		str+='db_pass='+escape(jQuery("#db_pass").val())+'&';
		str+='db_charset='+escape(jQuery("#db_charset").val())+'&';
		str+='server_root='+escape(jQuery("#server_root").val())+'&';
		str+='sql_select='+escape(jQuery("#sql_select").val())+'&';
		str+='table_name='+escape(jQuery("#table_name").val())+'&';
		str+='primary_key='+escape(jQuery("#primary_key").val())+'&';
		str+='sql_where='+escape(jQuery("#sql_where").val())+'&';
		str+='caption='+escape(jQuery("#caption").val())+'&';
		
		str+='enable_search='+escape(jQuery("#enable_search").val())+'&';
		str+='grid_width='+escape(jQuery("#grid_width").val())+'&';
		str+='grid_height='+escape(jQuery("#grid_height").val())+'&';
		str+='theme_roller='+escape(jQuery("#theme_roller").val())+'&';
		str+='locale_setting='+escape(jQuery("#locale_setting").val())+'&';
		
		
		var totalcolumn = parseInt(jQuery("#total_column").val());
		/*
		var tmp=new Array();
		for(var i=0;i<totalcolumn;i++)
		{
			
			tmp[i]=new Array();
			tmp[i][0]=jQuery("#column_name_"+i).val();
			tmp[i][1]=jQuery("#column_title_"+i).val();
			tmp[i][2]=jQuery("#column_width_"+i).val();
			tmp[i][3]=jQuery("#column_hidden_"+i).val();
			tmp[i][4]=jQuery("#column_required_"+i).val();
			tmp[i][5]=jQuery("#column_readonly_"+i).val();
			tmp[i][6]=jQuery("#column_hyperlink_"+i).val();
			
		}
		alert(tmp.toSource());
		str+='column_property_detail='+escape(tmp.toSource());
		*/
		var column_data='[';
		for(var i=0;i<totalcolumn;i++)
		{
			if(jQuery("#column_name_"+i).val()!='')
			{
				var tmp='[';
			
				tmp+="\""+jQuery("#column_name_"+i).val()+"\",";
				tmp+="\""+jQuery("#column_title_"+i).val()+"\",";
				tmp+="\""+jQuery("#column_width_"+i).val()+"\",";
				tmp+="\""+jQuery("#column_hidden_"+i).val()+"\",";
				tmp+="\""+jQuery("#column_required_"+i).val()+"\",";
				tmp+="\""+jQuery("#column_readonly_"+i).val()+"\",";
				tmp+="\""+jQuery("#column_hyperlink_"+i).val()+"\"";
				tmp+='],';
				column_data+=tmp;
			}	
		}
		if(column_data.length>1)
		column_data=column_data.substring(0, column_data.length-1)+"]";
		else
		column_data+=']';
		//alert(column_data);
		str+='column_property_detail='+column_data;
		return str;
	}
	function display_loading()
	{
		document.getElementById('loading_animation').style.display = 'block';
	}
	function hide_loading()
	{
		document.getElementById('loading_animation').style.display = 'none';
	}
</script> 
</div>
</div>