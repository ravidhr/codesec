<?php
// http://margodevsec.pe.hu/
$con = mysqli_connect("localhost","code","margodev","code_vuln");
$flag = "CODE{database_configuration_file_has_been_red}";

if(!$con) {
	die("Unable to connect to database");
}
?>
