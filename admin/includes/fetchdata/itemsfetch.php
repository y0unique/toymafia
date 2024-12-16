<?php
include "../../database/connection.php";

$output = array();

// Get draw value (for DataTables compatibility)
$draw = isset($_GET['draw']) ? intval($_GET['draw']) : 1;

// Define columns for sorting
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

// Initial query to get total records
$sql = "SELECT * FROM tbl_items";
$totalQuery = mysqli_query($con, $sql);
$total_all_rows = mysqli_num_rows($totalQuery);

// Search filtering
if (isset($_GET['search'])) {
    $search_value = mysqli_real_escape_string($con, $_GET['search']);
    $sql .= " WHERE item_id LIKE '%" . $search_value . "%'";
    $sql .= " OR item_name LIKE '%" . $search_value . "%'";
    $sql .= " OR item_description LIKE '%" . $search_value . "%'";
    $sql .= " OR item_location LIKE '%" . $search_value . "%'";
    $sql .= " OR item_category LIKE '%" . $search_value . "%'";
    $sql .= " OR item_quality LIKE '%" . $search_value . "%'";
    $sql .= " OR item_price LIKE '%" . $search_value . "%'";
    $sql .= " OR item_quantity LIKE '%" . $search_value . "%'";
}

// Sorting (ORDER BY)
if (isset($_GET['order_column']) && isset($_GET['order_dir'])) {
    $column_name = $columns[$_GET['order_column']];
    $order = $_GET['order_dir'];
    $sql .= " ORDER BY " . $column_name . " " . $order;
} else {
    $sql .= " ORDER BY item_id ASC";
}

// Pagination (LIMIT)
if (isset($_GET['start']) && isset($_GET['length'])) {
    $start = $_GET['start'];
    $length = $_GET['length'];
    $sql .= " LIMIT $start, $length";
}

// Fetching data from database
$query = mysqli_query($con, $sql);
$count_rows = mysqli_num_rows($query);
$data = array();

while ($row = mysqli_fetch_assoc($query)) {
    $actions = '<button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editItemModal" onclick="editItem(' . $row['item_id'] . ')">Edit</button>';
    $actions .= '<button type="button" class="btn btn-danger btn-sm" onclick="deleteItem(' . $row['item_id'] . ')">Delete</button>';

    $data[] = array(
        'item_id' => $row['item_id'],
        'item_name' => $row['item_name'],
        'item_description' => $row['item_description'],
        'item_location' => $row['item_location'],
        'item_category' => $row['item_category'],
        'item_quality' => $row['item_quality'],
        'item_price' => $row['item_price'],
        'item_quantity' => $row['item_quantity'],
        'actions' => $actions  // Make sure 'actions' is part of the returned data
    );
}

// Output data in JSON format
echo json_encode(array(
    'draw' => $draw,
    'recordsTotal' => $count_rows,
    'recordsFiltered' => $total_all_rows,
    'data' => $data,
));
?>
