<?php
include "../../database/connection.php";

$output = array();
$sql = "SELECT * FROM tbl_items";

// Get the total number of rows
$totalQuery = mysqli_query($con, $sql);
$total_all_rows = mysqli_num_rows($totalQuery);

// Data Table columns
$columns = array(
    0 => 'item_id',
    1 => 'item_name',
    2 => 'item_description',
    3 => 'item_location',
    4 => 'item_category',
    5 => 'item_quality',
    6 => 'item_price',
    7 => 'item_quantity',
);

// Search
if (isset($_POST['search']['value']) && $_POST['search']['value'] != '') {
    $search_value = mysqli_real_escape_string($con, $_POST['search']['value']); // Sanitize input
    $sql .= " WHERE item_id LIKE '%" . $search_value . "%'";
    $sql .= " OR item_name LIKE '%" . $search_value . "%'";
    $sql .= " OR item_description LIKE '%" . $search_value . "%'";
    $sql .= " OR item_location LIKE '%" . $search_value . "%'";
    $sql .= " OR item_category LIKE '%" . $search_value . "%'";
    $sql .= " OR item_quality LIKE '%" . $search_value . "%'";
    $sql .= " OR item_price LIKE '%" . $search_value . "%'";
    $sql .= " OR item_quantity LIKE '%" . $search_value . "%'";
}

// Order
if (isset($_POST['order'])) {
    $column_index = intval($_POST['order'][0]['column']); // Ensure column index is an integer
    $order_dir = $_POST['order'][0]['dir'] === 'asc' ? 'ASC' : 'DESC'; // Validate order direction

    // Check if the column index exists in the $columns array
    if (isset($columns[$column_index])) {
        $column_name = $columns[$column_index]; // Fetch column name from the array
        $sql .= " ORDER BY $column_name $order_dir";
    } else {
        $sql .= " ORDER BY item_id ASC"; // Default ordering
    }
} else {
    $sql .= " ORDER BY item_id ASC"; // Default ordering
}


// Limit
if (isset($_POST['length']) && $_POST['length'] != -1) {
    $start = intval($_POST['start']);
    $length = intval($_POST['length']);
    $sql .= " LIMIT " . $start . ", " . $length;
}

// Fetch data
$query = mysqli_query($con, $sql);
$count_rows = mysqli_num_rows($query);

$data = array();
while ($row = mysqli_fetch_assoc($query)) {
    $sub_array = array();
    $sub_array[] = '<a href="javascript:void();" data-id="' . $row['item_id'] . '" class="btn btn-info btn-sm edititembtn"><i class="fas fa-edit"></i></a>  
                    <a href="javascript:void();" data-id="' . $row['item_id'] . '" class="btn btn-danger btn-sm deleteitembtn"><i class="fas fa-trash"></i></a>';
    $sub_array[] = $row['item_id']; // Keep for actions
    $sub_array[] = $row['item_name'];
    $sub_array[] = $row['item_description'];
    $sub_array[] = $row['item_location'];
    $sub_array[] = $row['item_category'];
    $sub_array[] = $row['item_quality'];
    $sub_array[] = $row['item_price'];
    $sub_array[] = $row['item_quantity'];
    $data[] = $sub_array;
}

// Output
$output = array(
    'draw' => intval($_POST['draw']),
    'recordsTotal' => $total_all_rows,
    'recordsFiltered' => $total_all_rows,
    'data' => $data,
);

echo json_encode($output);