<?php
require "config.php";

if(isset($_POST['submit'])) {
	$username = $_POST['username']; 
	$password = md5($_POST['password']);
	
	$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
	$sql = mysqli_query($con,$sql) or die("<div class=\"alert alert-danger\"><strong>Query Error : </strong>".mysqli_error($con)."</div>");
	
	$num = mysqli_num_rows($sql);
	
	$res = "";
	
	if($num === 1) {
		$row = mysqli_fetch_assoc($sql);
		$_SESSION['name'] = $row['name'];
		$_SESSION['user_level'] = $row['user_level'];
		header('Location:index.php');
		exit;	
	} else {
		$res = "<div class=\"alert alert-danger\"><strong>Failed ! </strong>Incorrect username or password !</div>";
	}
	
}
?>
<h2>Administrator Login</h2>
<!--script type="text/javascript" src="secure.js"></script> <!--javascript penghalang-->
<?php echo $res;?>
<br>
<form name="login" action="" method="post"><!-- onsubmit="return checkinput()"-->
	<div class="input-group">
		<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
		<input type="text" class="form-control" name="username" placeholder="Username" required="" autocomplete="off">
	</div>
	<br>
	<div class="input-group">
		<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
		<input type="password" class="form-control" name="password" placeholder="Password" required="" autocomplete="off">
	</div>
	<br>
	<button type="submit" class="btn btn-primary" name="submit">Log In</button>
</form>
