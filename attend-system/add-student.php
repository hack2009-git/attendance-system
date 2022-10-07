<?php
require_once("config/db-config.php");
if(!empty($_POST))
{
	$sql = mysqli_query($dbc,"INSERT INTO sas_students(name,email,mobile,dob,gender,current_address,permanent_address,father_name,mother_name,academic_year,stream,class,roll_no) 
    VALUES('".$_POST['Name']."','".$_POST['gender']."','".$_POST['dob']."','"($_POST['email'])."','".$_POST['mobile']."','".$_POST['currentAddress']."','".$_POST['permanentAddress']."','".$_POST['fatherName']."','".$_POST['motherName']."','".$_POST['rollNo']."','".$_POST['stream']."','".$_POST['acamedicYear']."','".$_POST['classid']."')");
	if($sql)
	{
	?>
    	<script>
			alert("Success");
			window.location = 'student.php';
		</script>
    <?php
	}
	else
	{
		header("location:student.php");
	}

}
?>