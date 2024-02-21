<?php
include('../frontend/config/constants.php');

if (isset($_GET['order_id'])) {
    $orderId = $_GET['order_id'];
    // Perform deletion query
    $deleteQuery = "DELETE FROM order_manager WHERE order_id = $orderId";
    $deleteResult = mysqli_query($conn, $deleteQuery);

    if ($deleteResult) {
        // Deletion successful
        echo "Order deleted successfully";
        exit;
    } else {
        // Deletion failed
        echo "Error deleting order";
        exit;
    }
} else {
    // No order ID provided
    echo "Order ID not specified";
    exit;
}
