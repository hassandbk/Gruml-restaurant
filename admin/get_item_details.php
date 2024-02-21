<?php
// Establish database connection (assuming you already have this)
include('../frontend/config/constants.php');

// Fetch item details based on the order ID passed via GET parameter
$order_id = $_GET["item_id"];

// Perform database query to fetch item details
$query = "SELECT * FROM order_manager WHERE order_id = $order_id";
$result = mysqli_query($conn, $query);

// Check if the query was successful
if ($result) {
    // Fetch the details as an associative array
    $orderDetails = mysqli_fetch_assoc($result);

    // Encode the fetched details as JSON and return
    echo json_encode($orderDetails);
} else {
    // If query fails, return an error message
    echo json_encode(array("error" => "Failed to fetch order details."));
}

// Close database connection
mysqli_close($conn);
