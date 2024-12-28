<?php
$host="localhost";
$user="root";
$password="";
$db="toymafia_db";

$con = mysqli_connect($host,$user,$password,$db);
// Check connection
if (mysqli_connect_errno()) {
    $response = array('status' => 'error', 'message' => 'Failed to connect to the database.');
    echo json_encode($response);
    exit();
}
if(!$con){
  die("Could not conenct to mysql" . mysqli_connect_error());
}
?>