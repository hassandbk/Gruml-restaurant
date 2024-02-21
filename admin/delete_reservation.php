<?php

// Include the database connection
include('../frontend/config/constants.php');

// Check if the ID parameter is provided
if (isset($_GET['id'])) {
    // Sanitize the ID input
    $reservation_id = mysqli_real_escape_string($conn, $_GET['id']);

    // SQL query to delete the record
    $sql = "DELETE FROM reservations WHERE id = $reservation_id";

    // Execute the query
    if (mysqli_query($conn, $sql)) {
        // If deletion is successful, return success message
        echo json_encode(array("success" => true));
    } else {
        // If deletion fails, return error message
        echo json_encode(array("success" => false, "error" => "Error deleting record: " . mysqli_error($conn)));
    }
} else {
    // If ID parameter is not provided, return error message
    echo json_encode(array("success" => false, "error" => "ID parameter not provided"));
}
