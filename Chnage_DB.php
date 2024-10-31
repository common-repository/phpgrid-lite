<? global $pluginDir;
session_start();?>
<?php if(isset($_POST['Submit']))
{
	echo "bhadresh";
	
	$_SESSION['a'] = $_POST['hname'];
	$_SESSION['b'] = $_POST['uname'];
	$_SESSION['c'] = $_POST['pass'];
	$_SESSION['d'] = $_POST['dbname'];
	$_SESSION['e'] = $_POST['dbtype'];
	$_SESSION['f'] =$_POST['dbche'];
}?>

<div>
	<h1>Insert New Data Base Details</h1>
</div>
<div>
<form method="post" action="">
  <table>
     <tr>
        <td>Host Name:</td>
        <td>&nbsp;&nbsp;<input type="text" name="hname" id="hname"></td>
     </tr>
     <tr>
        <td>User Name:</td>
        <td>&nbsp;&nbsp;<input type="text" name="uname" id="uname"></td>
     </tr>
     <tr>
        <td>Password:</td>
        <td>&nbsp;&nbsp;<input type="text" name="pass" id="pass"></td>
     </tr>
     <tr>
        <td>DB Name:</td>
        <td>&nbsp;&nbsp;<input type="text" name="dbname" id="dbname"></td>
     </tr>
     <tr>
        <td>DB Type:</td>
        <td>&nbsp;&nbsp;<input type="text" name="dbtype" id="dbtype"></td>
     </tr>
     <tr>
        <td>DB Che.</td>
        <td>&nbsp;&nbsp;<input type="text" name="dbche" id="dbche"></td>
     </tr>
     <tr>
        <td>&nbsp;</td>
        <td><input type="submit" name="Submit" id="Submit" value="Submit"></td>
     </tr>
  </table>
</form>
</div>