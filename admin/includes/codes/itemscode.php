<?php
include "../../database/connection.php";

//Add School
if(isset($_POST['add'])){

    $webID = $_POST['webID'];
    $webUsername = $_POST['webUsername'];
    $school_id = $_POST['school_id'];
    $school_district = $_POST['school_district'];
    $school_name = $_POST['school_name'];
    $school_principal = $_POST['school_principal'];
    $school_address = $_POST['school_address'];
    $school_contact = $_POST['school_contact'];
    $school_email = $_POST['school_email'];
    $school_link = mysqli_real_escape_string($con, $_POST['school_link']);
    $school_type = $_POST['school_type'];
    $school_shsAvailability = $_POST['school_shsAvailability'];
    $school_spedAvailablity = $_POST['school_spedAvailablity'];
 
    $sql = "INSERT INTO schoolstbl (school_id, school_name, school_address, school_principal, school_contact, school_link, school_email, school_district, school_type, school_shsAvailability, school_spedAvailablity, school_status) 
                            values ('$school_id','$school_name', '$school_address', '$school_principal', '$school_contact' , '$school_link', '$school_email', '$school_district' , '$school_type', '$school_shsAvailability', '$school_spedAvailablity' , 'active')";
    $query= mysqli_query($con,$sql);
    $lastId = mysqli_insert_id($con);

    if($query){
        $inserttime = "INSERT INTO timelogtbl (user_id, log_action, log_date, log_time) 
                                       values ('$webID', 'Added School $school_id, name: $school_name',  NOW(), NOW())";
        $query1= mysqli_query($con,$inserttime);
        $query2 = mysqli_insert_id($con);
        if ($query1)
        {
            $data = array
            (
                'addSchoolStatus'=>'true',
                'message' => 'Added Successfully' 
            );
            echo json_encode($data);
            return;
        }
        else
        {
            $data = array(
                'addSchoolStatus'=>'false',
            );
            echo json_encode($data);
        }
    }
    else
    {
        $data = array(
            'addSchoolStatus'=>'false',
        );
        echo json_encode($data);
    } 
}

// View School
if(isset($_POST['view']))
{
    $id = $_POST['id'];
    $sql = "SELECT * FROM schoolsvw WHERE school_id = '$id'";
    $query = mysqli_query($con,$sql);
    $row = mysqli_fetch_assoc($query);
    echo json_encode($row);
};

//Edit School
if(isset($_POST['update'])){
    $id = $_POST['id'];
    $webID = $_POST['webID'];
    $webUsername = $_POST['webUsername'];
    $school_id = $_POST['school_id'];
    $school_district = $_POST['school_district'];
    $school_name = $_POST['school_name'];
    $school_principal = $_POST['school_principal'];
    $school_address = $_POST['school_address'];
    $school_contact = $_POST['school_contact'];
    $school_email = $_POST['school_email'];
    $school_link = mysqli_real_escape_string($con, $_POST['school_link']);
    $school_type = $_POST['school_type'];
    $school_shsAvailability = $_POST['school_shsAvailability'];
    $school_spedAvailablity = $_POST['school_spedAvailablity'];

    $sql = "UPDATE schoolstbl SET school_id = '$school_id', 
                                    school_district = '$school_district',
                                    school_name = '$school_name', 
                                    school_principal = '$school_principal',
                                    school_address = '$school_address',
                                    school_contact = '$school_contact', 
                                    school_email = '$school_email',
                                    school_link = '$school_link',
                                    school_type = '$school_type',
                                    school_shsAvailability = '$school_shsAvailability',
                                    school_spedAvailablity = '$school_spedAvailablity' 
                                WHERE schooltbl_id = '$id'";
    $query = mysqli_query($con,$sql);

    if($query){
        $inserttime = "INSERT INTO timelogtbl (user_id, log_action, log_date, log_time) 
        values ('$webID', 'Edited School, id: $id, name: $school_name',  NOW(), NOW())";
        $query1= mysqli_query($con,$inserttime);
        $query2 = mysqli_insert_id($con);
        if ($query1){
            $data = array(
                'editSchoolStatus'=>'true',
                'message' => 'Updated Successfully' 
            );
            echo json_encode($data);
            return;
        } else {
            $data = array(
            'editSchoolStatus'=>'false',
        );
            echo json_encode($data);
        }
    }
    else
    {
        $data = array(
            'editSchoolStatus'=>'false',
        );
        echo json_encode($data);
    }
}

// Delete View Schhols
if(isset($_POST['deleteview'])){
    $id = $_POST['id'];
    $sql = "SELECT * FROM schoolsvw WHERE school_id = '$id' LIMIT 1";
    $query = mysqli_query($con,$sql);
    $row = mysqli_fetch_assoc($query);
    echo json_encode($row);
}

//Deleting the Issuances with the update of status to inactive
if(isset($_POST['delete'])) {
    $id = $_POST['id'];
    $webID = $_POST['webID'];
    $school_id = $_POST['school_id'];
    $school_name = $_POST['school_name'];

    $sql = "UPDATE schoolstbl SET 	school_status = 'inactive' WHERE schooltbl_id = '$id'";
    $query = mysqli_query($con,$sql);

    if($query){
        $inserttime = "INSERT INTO timelogtbl (user_id, log_action, log_date, log_time) 
        values ('$webID', 'Deleted School, id: $school_id, name: $school_name',  NOW(), NOW())";
        $query1= mysqli_query($con,$inserttime);
        $query2 = mysqli_insert_id($con);
        if ($query1){
            $data = array(
                'deleteSchoolStatus'=>'true',
                'message' => 'Delete Successfully' 
            );
            echo json_encode($data);
            return;
        } else {
            $data = array(
            'deleteSchoolStatus'=>'false',
        );
            echo json_encode($data);
        }
    }
    else
    {
        $data = array(
            'deleteSchoolStatus'=>'false',
            'messageError' => 'Delete Error' 
        );
        echo json_encode($data);
    }
}
?>