<?php
	$server="localhost";
	$user="root";
	$password="";
	$con=mysql_connect($server,$user,$password) or die(mysql_error());
	$sel=mysql_select_db('jj') or die(mysql_error());
?>