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

//Edit Item
if(isset($_POST['update'])){
    $id = $_POST['id'];
    $item_id = $_POST['id'];
    $itemName = $_POST['item_name'];
    $itemDescription = $_POST['item_description'];
    $itemPrice = $_POST['item_price'];
    $itemCategory   = $_POST['item_category'];
    $itemQuantity = $_POST['item_quantity'];
    $itemQuality = $_POST['item_quality'];
    $itemLocation = $_POST['item_location'];

    $sql = "UPDATE tbl_items SET item_id = '$item_id', 
                    item_name = '$itemName',
                    item_description = '$itemDescription',
                    item_location = '$itemLocation',
                    item_category = '$itemCategory',
                    item_quality = '$itemQuality',
                    item_price = '$itemPrice',
                    item_quantity = '$itemQuantity' 
                    WHERE item_id = '$id'";
    $query = mysqli_query(mysql: $con,query: $sql);

    if($query){
        $data = array(
            'editItemStatus'=>'true',
            'message' => 'Updated Successfully' 
        );
        echo json_encode($data);
        return;
    }
    else
    {
        $data = array(
            'editItemStatus'=>'false',
        );
        echo json_encode($data);
    }
}


// Delete View Items
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

    $sql = "UPDATE tbl_items SET item_status = 'inactive' WHERE item_id = '$id'";
    $query = mysqli_query($con,$sql);

    if($query){
        $data = array(
            'deleteItemStatus'=>'true',
            'message' => 'Delete Successfully' 
        );
        echo json_encode($data);
        return;
    }
    else
    {
        $data = array(
            'deleteItemStatus'=>'false',
            'messageError' => 'Delete Error' 
        );
        echo json_encode($data);
    }
}
?>