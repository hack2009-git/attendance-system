<?php
require_once("config/db-config.php");
if(!empty($_POST))
{
	$sql = mysqli_query($dbc,"INSERT INTO sas_user(first_name,last_name,email,password,gender,mobile,status,role) VALUES('".$_POST['firstName']."','".$_POST['lastName']."','".$_POST['email']."','".md5($_POST['newPassword'])."','".$_POST['gender']."','".$_POST['mobile']."','".$_POST['status']."','".$_POST['role']."')");
	if($sql)
	{
	?>
    	<script>
			alert("Success");
			window.location = 'user.php';
		</script>
    <?php
	}
	else
	{
		header("location:user.php");
	}

}
?>