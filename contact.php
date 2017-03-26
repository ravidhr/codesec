<?php
require "config.php";

if(isset($_POST['submit'])) {
	$nama = $_POST['nama'];
	$email = $_POST['email'];
	$ip = $_SERVER['REMOTE_ADDR'];
	$msg = $_POST['message'];
	
	$sql = "INSERT INTO contact_form (name,email,ip,comment,date) VALUES ('$nama','$email','$ip','$msg',NOW())";
	$sql = mysqli_query($con,$sql) or die("<div class=\"alert alert-danger\"><strong>Query Error : </strong>".mysqli_error($con)."</div>");
	
	$row = mysqli_affected_rows($con);
	
	$res = "";
	
	if($row > 0) {
		$res = "<div class=\"alert alert-success\"><strong>Success ! </strong>Your message has been sent to us!</div>";
	} else {
		$res = "<div class=\"alert alert-danger\"><strong>Failed ! </strong>Something went wrong</div>";
	}
}
?>
<!--Query Hint : INSERT INTO contact_form (name,email,ip,comment,date) VALUES ('$nama','$email','$ip','$msg',NOW()) -->
<h2>Contact Form</h2>
<?php echo $res;?>
<p>Any question or sugestion for our project ? Please send it to us</p>
<br>
<form action="" method="post">
	<div class="form-group">
		<label for="nama">Name</label>
		<input class="form-control" type="text" name="nama" required="" autocomplete="off">
	</div>
	<div class="form-group">
		<label for="email">Email</label>
		<input class="form-control" type="email" name="email" required="" autocomplete="off">
	</div>
	<div class="form-group">
		<label for="comment">Comment</label>
		<textarea class="form-control" name="message" rows="5" required="" autocomplete="off"></textarea>
	</div>
	<button type="submit" class="btn btn-primary" name="submit">Send to Us</button>
</form>
