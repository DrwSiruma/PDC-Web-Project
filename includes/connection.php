<?php
$conn_error='Could not Connect.';
$mysql_host='localhost';
$mysql_user='root';
$mysql_pass='';
$mysql_db='pdc_db';

// Create connection
$conn = new mysqli($mysql_host, $mysql_user, $mysql_pass, $mysql_db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
 
?>