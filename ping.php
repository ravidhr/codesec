<?php
if(isset($_POST['host'])) {
	if($_POST['host'] !== "") {
		$res = "<pre>".shell_exec("ping -c 4 '".$_POST['host']."'")."</pre>";
	} else {
		$res = "<div class=\"alert alert-danger\"><strong>Alert ! </strong>Host could not be empty</div>";
	}
}
?>

<h2>Ping Tool</h2>
<p>Feel free to ping any host using our Ping Tool !</p>
<form action="" method="post">
	<div class="form-group">
		<input class="form-control" type="text" name="host" placeholder="Host" autocomplete="off" required="">
	</div>
	<button type="submit" class="btn btn-primary">Ping Host</button>
</form>

<?php
if(isset($res)) {
	echo "<br>";
	echo $res;
}

?>

