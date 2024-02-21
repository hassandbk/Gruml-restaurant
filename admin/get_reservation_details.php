<?php
include('../frontend/config/constants.php');
$reservationId = $_GET['id'];

// Query to fetch reservation details based on $reservationId
$query = "SELECT * FROM `reservations` WHERE id = $reservationId";
$result = mysqli_query($conn, $query);

if ($result) {
    $reservationData = mysqli_fetch_assoc($result);
    echo json_encode($reservationData);
} else {
    echo json_encode(array('error' => 'Unable to fetch reservation details'));
}
