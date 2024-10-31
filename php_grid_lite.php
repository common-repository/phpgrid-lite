<?php
/*
Plugin Name: phpGrid Lite
Plugin URI: http://dnktechnologies.in
Description: phpGrid Lite Wordpress Plugin
Author: khitesh
Version: 1.0
Author URI: http://dnktechnologies.in/
*/
session_start();

define('php_grid_lite', dirname(plugin_basename(__FILE__)));
$includes = ABSPATH . PLUGINDIR . '/php_grid_lite/';
$pluginDir=get_option('siteurl').'/wp-content/plugins/php_grid_lite/';

class php_grid_lite
{
	var $php_grid_lite;
	function php_grid_lite() {
		
		add_action('wp_head', array(&$this, 'wp_head'));
		//add_action('wp_footer',array(&$this,'wp_footer'));
		
		add_action('admin_menu', array(&$this, 'add_pages'));
		add_action('admin_head', array(&$this, 'admin_head'));
		
		register_activation_hook(php_grid_lite."/php_grid_lite.php", array(&$this, 'install'));		
		register_deactivation_hook(php_grid_lite."/php_grid_lite.php", array(&$this, 'uninstall'));
		
		
		add_shortcode('phpgrid', array(&$this,'phpgrid_display'));
		add_action('init', array(&$this,'addbuttons'));
	}	
	
	function install()
	{
		global $includes,$pluginDir,$wpdb;
		
		/*$file_name='../wp-content/plugins/php_grid_lite/conf.php';
			
		$file_detail="<?php\ndefine('DB_HOSTNAME','".DB_HOST."');\ndefine('DB_USERNAME', '".DB_USER."');\ndefine('DB_PASSWORD', '".DB_PASSWORD."');\ndefine('DB_NAME', '".DB_NAME."');\ndefine('DB_TYPE', 'mysql');\ndefine('DB_CHARSET','".DB_CHARSET."');?>";
		
		$fh = fopen($file_name, 'w') or die("can't open file");
		fwrite($fh, $file_detail);
		fclose($fh);*/

		require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
		
		$table=$wpdb->prefix . 'phpgrid';
		
		$sql = "CREATE TABLE IF NOT EXISTS `$table` (`id` INT( 20 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
									   `grid_id` INT( 20 ) NOT NULL ,
									   `setting_name` TEXT NOT NULL ,
									   `setting_value` TEXT NOT NULL
									  );";
		//dbDelta($sql); 
		$wpdb->query($sql);
	}
	function unstall()
	{
	}
	function add_pages() {
         
		add_menu_page('php Grid Lite', 'php Grid Lite', 'administrator', 'Default', array($this,'main_page'));
		
		// Add a second submenu to the custom main_page menu:
		add_submenu_page('Default', 'Setting Page', 'Setting Page', 'administrator', 'Setting_Page',array($this,'Setting_Page'));
	    //add_submenu_page('Default', 'Chnage DB', 'Chnage DB', 'administrator', 'Chnage_DB',array($this,'Chnage_DB'));
	}
	
	function main_page()
	{
		require_once $includes.'document/index.html';
	}
	function Setting_Page()
	{
		global $pluginDir;
		echo '<link type="text/css" rel="stylesheet" href="'.$pluginDir.'diQuery-collapsiblePanel.css" /><script type="text/javascript" src="'.$pluginDir.'diQuery-collapsiblePanel.js"></script><link type="text/css" rel="stylesheet" href="'.$pluginDir.'thickbox.css" /><script type="text/javascript" src="'.$pluginDir.'thickbox.js"></script>';
		require_once $includes.'Setting_Page.php';
	}
	function Chnage_DB()
	{
		global $pluginDir;
		echo '<link type="text/css" rel="stylesheet" href="'.$pluginDir.'diQuery-collapsiblePanel.css" /><script type="text/javascript" src="'.$pluginDir.'diQuery-collapsiblePanel.js"></script><link type="text/css" rel="stylesheet" href="'.$pluginDir.'thickbox.css" /><script type="text/javascript" src="'.$pluginDir.'thickbox.js"></script>';
		require_once $includes.'Chnage_DB.php';
	}
	
	function admin_head() 
	{
		
		
	}
	function wp_head($content)
	{
		echo '<script type="text/javascript" src="http://localhost/phpgrid/wp-content/plugins/php_grid_lite/js/jquery-1.6.2.js"></script>';
		
	}
	
	function phpgrid_display($atts)
	{
		
		/*$path = get_option('siteurl').'/wp-content/plugins/php_grid_lite/preview_grid.php';
		
		global $wpdb;
		$table=$wpdb->prefix . 'phpgrid';
		$sql="select * from $table where grid_id=".$atts['id'];
		$result=$wpdb->get_results($sql,ARRAY_A);
		$data='';
		foreach($result as $obj)
		{
			$data.=$obj['setting_name'].'='.$obj['setting_value'].'&';
		}
		//$data=str_replace("\"","\\",$data);

		$str ='<div id="phpgrid_'.$atts['id'].'" style="width:100%;height:100%;overflow:scroll;"></div><script type="text/javascript">jQuery(document).ready(function(){jQuery.ajax({type: "POST",url: "'.$path.'",data:\''.$data.'\',success: function(data){jQuery("#phpgrid_'.$atts['id'].'").html(data);}});});</script>';
		
		return $str;*/

		session_start();
		$path = get_option('siteurl').'/wp-content/plugins/php_grid_lite/preview_grid.php';
		
		
		global $wpdb;
		$table=$wpdb->prefix . 'phpgrid';
		$sql="select * from $table where grid_id=".$atts['id'];
		$result=$wpdb->get_results($sql,ARRAY_A);
		/*echo "<pre>";
		print_r($result);*/
		$_SESSION['phpgrid_host'] = $result[0]['setting_value'];
		$_SESSION['phpgrid_db_name'] = $result[1]['setting_value'];
		$_SESSION['phpgrid_db_type'] = $result[2]['setting_value'];
		$_SESSION['phpgrid_db_user'] = $result[3]['setting_value'];
		$_SESSION['phpgrid_db_pass'] = $result[4]['setting_value'];
		$_SESSION['phpgrid_db_charset'] = $result[5]['setting_value'];
		$_SESSION['server_root'] = $result[6]['setting_value'];
		/*require_once $includes.'conf.php';
		abc();
		echo "<pre>";
		print_r($_SESSION);*/
		$data='';
		foreach($result as $obj)
		{
			$data.=$obj['setting_name'].'='.$obj['setting_value'].'&';
		}
		//$data=str_replace("\"","\\",$data);
		
		/*$str ='<div id="phpgrid_'.$atts['id'].'" style="width:100%;height:100%;overflow:scroll;"></div><script type="text/javascript">jQuery(document).ready(function(){jQuery.ajax({type: "GET",url: "'.$path.'",data:\''.$data.'\',success: function(data){jQuery("#phpgrid_'.$atts['id'].'").html(data);}});});</script>';*/
		
		$str ='<iframe src="'.$path.'?abc='.$data.' style="width:100%; height:310px; overflow:scroll;"></iframe>';
		return $str;
	}
	function addbuttons()
	{
			add_filter("mce_external_plugins", array(&$this,"add_tinymce_plugin"));
     		add_filter('mce_buttons', array(&$this,'register_button'));
		
	}
	function add_tinymce_plugin($plugin_array)
	{
		$plugin_array['PhpGrid'] = WP_PLUGIN_URL.'/php_grid_lite/editor_plugin.js';
   		return $plugin_array;
	}
	function register_button($buttons)
	{
		array_push($buttons, "separator", "PhpGrid");
	    return $buttons;
	}
}
$php_grid_lite_obj = new php_grid_lite();
?>