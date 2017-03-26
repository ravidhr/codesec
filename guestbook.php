<?php
require "config.php";

if(isset($_POST['submit'])) {
	$name = $_POST['nama'];
	$email = $_POST['email'];
	$ip = $_SERVER['REMOTE_ADDR'];
	$comment = $_POST['message'];
	
	$sql = "INSERT INTO guestbook (name,email,date,ip,comment) VALUES ('$name','$email',NOW(),'$ip','$comment')";
	$sql = mysqli_query($con,$sql) or die("<div class=\"alert alert-danger\"><strong>Query Error : </strong>".mysqli_error($con)."</div>");
	
	$row = mysqli_affected_rows($con);
	
	$res = "";
	
	if($row > 0) {
		$res = "<div class=\"alert alert-success\"><strong>Success ! </strong>Your message has been posted !</div>";
	} else {
		$res = "<div class=\"alert alert-danger\"><strong>Failed ! </strong>Something went wrong</div>";
	}
}
?>
<?php echo $res;?>
<!--Query Hint : INSERT INTO guestbook (name,email,date,ip,comment) VALUES ('$name','$email',NOW(),'$ip','$comment') -->
	<h2>Guest Book</h2>
	<p>Feel free to greet other visitors. Let's connected</p>

<form action="" method="post">
<div class="form-inline">
	<div class="form-group">
		<input type="text" class="form-control" name="nama" placeholder="Your Name" autocomplete="off" required="">
	</div>
		<div class="form-group">
		<input type="email" class="form-control" name="email" placeholder="Your Email" autocomplete="off" required="">
	</div>
</div>
<br>
<div class="form-group">
	<textarea class="form-control" name="message" rows="3" placeholder="Type your message" autocomplete="off" required=""></textarea>
</div>
<button type="submit" class="btn btn-primary" name="submit">Post Message</button>
</form>
<br>
<?php

$show = "SELECT * FROM guestbook";
$show = mysqli_query($con,$show) or die(mysqli_error($con));

$num = mysqli_num_rows($show);

if($num > 0) {
	$i = 0;
	while($i < $num) {
		$content = mysqli_fetch_assoc($show);
		?>
		<div class="bg-success">
			<p><strong>Name : </strong><?php echo $content['name'];?></p>
			<p><strong>Email : </strong><?php echo $content['email'];?></p>
			<p><strong>Message : </strong><?php echo $content['comment'];?></p>
		</div>
		<?php
	$i++;
	}	
} else {
	?>
	<div class="alert alert-info">No comments yet ! Be the first visitor to post comment !</div>
	<?php
}
?>

