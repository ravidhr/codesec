<?php
session_start();

if(isset($_GET['logout'])) {
	session_destroy();
	header('Location:index.php');
	exit;
}

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Born to be Pawned</title>
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<!--style>
			.well{
				width: 700px;
				
				}
		</style-->
	</head>
	<body>
		<nav class="navbar navbar-inverse">
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand" href="?">Born to be Pawned</a>
				</div>
				<ul class="nav navbar-nav">
					<li><a href="?page=home.php">Home</a></li>
					<li><a href="?page=ping.php">Ping Tool</a></li>
					<li><a href="?page=guestbook.php">Guestbook</a></li>            
					<li><a href="?page=contact.php">Contact Form</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<?php
					if(!isset($_SESSION['name']) || !isset($_SESSION['user_level'])) {
						?>
						<li><a href="?page=login.php"><span class="glyphicon glyphicon-log-in"></span>  Login</a></li>
					<?php } else {
						?>
						<li class="dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" href="index.php"><span class="glyphicon glyphicon-user"></span> Welcome, <?php echo $_SESSION['name']." ";?> <span class="caret"></span></a>
						<?php
					}
					?>
				</ul>
			</div>
		</nav>
		
		<?php
		if(isset($_GET['page']) && $_GET['page'] !== "home.php") {
			?>
			<div class="container">
				<div class="well">
				<?php
					include($_GET['page']);
				?>
				</div>
			</div>
			<?php
		} else {
			?>
			<div class="container">
			<?php
			include("home.php");
			?>
			</div>
			<?php
		}
		?>
	</body>
</html>
