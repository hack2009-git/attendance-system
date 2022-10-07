<?php 
include_once 'config/Database.php';
include_once 'class/User.php';

$database = new Database();
$db = $database->getConnection();

$user = new User($db);

if($user->loggedIn()) {	
	header("Location: student.php");	
}

$loginMessage = '';
if(!empty($_POST["login"]) && !empty($_POST["email"]) && !empty($_POST["password"])) {	
	$user->email = $_POST["email"];
	$user->password = $_POST["password"];	
	if($user->login()) {		
		header("Location: student.php");		
	} else {
		$loginMessage = 'Invalid login! Please try again.';
	}
} else {
	$loginMessage = 'Fill all fields.';
}
include('inc/header.php');
?>
<title>Student Attendance System</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="./css/style.css">
<script src="js/search.js"></script>
<?php include('inc/container.php');?>

<h2>Student Attendance System</h2>
	<style>
        h2{text-align: center;}
    </style>
	<div class="container login-container">
            <div class="row">
            	<div class="col-md-4 login-form-1">
                    <h3>Admin Login </h3>           
				<?php if ($loginMessage != '') { ?>
					<div id="login-alert" class="alert alert-danger col-sm-12"><?php echo $loginMessage; ?></div>                            
				<?php } ?>
				<form id="loginform" class="form-horizontal" role="form" method="POST" action="">                                    
					<div style="margin-bottom: 25px" class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
						<input type="text" class="form-control" id="email" name="email" value="<?php if(!empty($_POST["email"])) { echo $_POST["email"]; } ?>" placeholder="email" style="background:white;" required>                                        
					</div>                                
					<div style="margin-bottom: 25px" class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
						<input type="password" class="form-control" id="password" name="password" value="<?php if(!empty($_POST["password"])) { echo $_POST["password"]; } ?>" placeholder="password" required>
					</div>					
					<div style="margin-top:10px" class="form-group">                               
						<div class="col-sm-6 controls">
						  <input type="submit" name="login" value="Login" class="btnSubmit">						  
					</div>
				</div>					
				</form>   
			</div>
			<div class="col-md-4 login-form-2">
                    <h3>Teacher Login</h3>
					<?php if ($loginMessage != '') { ?>
					<div id="login-alert" class="alert alert-danger col-sm-12"><?php echo $loginMessage; ?></div>                            
				<?php } ?>
				<form id="loginform" class="form-horizontal" role="form" method="POST" action="">                                    
					<div style="margin-bottom: 25px" class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
						<input type="text" class="form-control" id="email" name="email" value="<?php if(!empty($_POST["email"])) { echo $_POST["email"]; } ?>" placeholder="email" style="background:white;" required>                                        
					</div>                                
					<div style="margin-bottom: 25px" class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
						<input type="password" class="form-control" id="password" name="password" value="<?php if(!empty($_POST["password"])) { echo $_POST["password"]; } ?>" placeholder="password" required>
					</div>					
					<div style="margin-top:10px" class="form-group">                               
						<div class="col-sm-6 controls">
						  <input type="submit" name="login" value="Login" class="btnSubmit">						  
					</div>	
					</div>				
				</form> 
				<section>
				<p>
					<h3>Teacher Login:</h3>
					<strong>Email:</strong> nayaldaksh@gmail.com<br>
					<strong>Password:</strong> 123
				</p>
				<p>
					<h3>Student Login:</h3>
					<p>Comming Soon.....</p>
					<strong>Email:</strong> kalyani123@gmail.com<br>
					<strong>Password:</strong> 123
				</p>
				</section>
            </div>
			<div class="col-md-4 login-form-2">
                    <h3>Student Login </h3>           
				<?php if ($loginMessage != '') { ?>
					<div id="login-alert" class="alert alert-danger col-sm-12"><?php echo $loginMessage; ?></div>                            
				<?php } ?>
				<form id="loginform" class="form-horizontal" role="form" method="POST" action="">                                    
					<div style="margin-bottom: 25px" class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
						<input type="text" class="form-control" id="email" name="email" value="<?php if(!empty($_POST["email"])) { echo $_POST["email"]; } ?>" placeholder="email" style="background:white;" required>                                        
					</div>                                
					<div style="margin-bottom: 25px" class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
						<input type="password" class="form-control" id="password" name="password" value="<?php if(!empty($_POST["password"])) { echo $_POST["password"]; } ?>" placeholder="password" required>
					</div>					
					<div style="margin-top:10px" class="form-group">                               
						<div class="col-sm-6 controls">
						  <input type="submit" name="login" value="Login" class="btnSubmit">						  
					</div>
				</div>					
				</form>   
			</div>
			
        </div>
    </div>
	 <!-- FOOTER -->
	 <footer style="background:; height:120%;">
        <p class="pull-right"><a href="#">Back to top</a></p>
        <p style="text-align: center;">&copy;       2022 Bugslayer, Inc. &middot;  developed by  <a href="">Bug Slayer Team </a><a href="">Privacy</a> &middot; <a href="">Terms</a></p>
      </footer>

    </div><!-- /.container -->

<?php include('inc/footer.php');?>


