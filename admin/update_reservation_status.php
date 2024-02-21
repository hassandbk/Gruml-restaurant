<?php
include('../frontend/config/constants.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id']) && isset($_POST['status'])) {
    $reservationId = $_POST['id'];
    $status = $_POST['status'];

    // Update reservation status in the database
    $query = "UPDATE reservations SET status = '$status' WHERE id = $reservationId";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "Reservation status updated successfully!";
    } else {
        echo "Failed to update reservation status.";
    }
} else {
    echo "Invalid request.";
}
