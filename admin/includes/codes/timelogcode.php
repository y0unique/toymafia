<?php
include "../../database/connection.php";

//Deleting the Issuances with the update of status to inactive
if(isset($_POST['delete'])) {
    $webID = $_POST['webID'];
    $webUsername = $_POST['webUsername'];

    $sql = "UPDATE timelogtbl SET log_status = 'inactive'";
    $query = mysqli_query($con,$sql);

    if($query){
        $inserttime = "INSERT INTO timelogtbl (user_id, log_action, log_date, log_time) 
        values ('$webID', 'Cleared all time logs',  NOW(), NOW())";
        $query1= mysqli_query($con,$inserttime);
        $query2 = mysqli_insert_id($con);
        if ($query1){
            $data = array(
                'clearLogStatus'=>'true',
                'message' => 'Cleared all logs Successfully' 
            );
            echo json_encode($data);
            return;
        } else {
            $data = array(
            'clearLogStatus'=>'false',
        );
            echo json_encode($data);
        }
    }
    else
    {
        $data = array(
            'clearLogStatus'=>'false',
            'messageError' => 'Delete Error' 
        );
        echo json_encode($data);
    }
}
?>