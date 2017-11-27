<?php
	$hostname = 'localhost';
	$username = 'root';
	$password = '';
	$connection = mysql_connect($hostname,$username,$password) or die('Could not Connect DB');
	mysql_select_db('gallery',$connection) or die('Could not Select DB');
?>