<?php
include "../../database/connection.php";

//Add Item
if(isset($_POST['add'])){

    $itemName = $_POST['item_name'];
    $itemDescription = $_POST['item_description'];
    $itemPrice = $_POST['item_price'];
    $itemCategory   = $_POST['item_category'];
    $itemQuantity = $_POST['item_quantity'];
    $itemQuality = $_POST['item_quality'];
    $itemLocation = $_POST['item_location'];
    
    $sql = "INSERT INTO tbl_items (item_name, item_description, item_location, item_category, item_quality, item_price, item_quantity, item_image, item_status)
            VALUES ('$itemName', '$itemDescription', '$itemLocation', '$itemCategory', '$itemQuality', '$itemPrice', '$itemQuantity', 'defaultfunko.jpg', 'active')";
    $query= mysqli_query($con,$sql);
    $lastId = mysqli_insert_id($con);

    if($query){
            $data = array
            (
                'addItemStatus'=>'true',
                'message' => 'Added Successfully' 
            );
            echo json_encode($data);
            return;
    }
    else
    {
        $data = array(
            'addItemStatus'=>'false',
        );
        echo json_encode(value: $data);
    } 
}

// View Item
if(isset($_POST['view']))
{
    $id = $_POST['id'];
    $sql = "SELECT * FROM tbl_items WHERE item_id = '$id' LIMIT 1";
    $query = mysqli_query(mysql: $con,query: $sql);
    $row = mysqli_fetch_assoc(result: $query);
    echo json_encode(value: $row);
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
    $sql = "SELECT * FROM tbl_items WHERE item_id = '$id' LIMIT 1";
    $query = mysqli_query(mysql: $con,query: $sql);
    $row = mysqli_fetch_assoc(result: $query);
    echo json_encode(value: $row);
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