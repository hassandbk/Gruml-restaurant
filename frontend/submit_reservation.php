<?php

include('config/constants.php');



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Extract data needed to update the database
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $person = $_POST['person'];
    $reservation_date = $_POST['reservation-date'];
    $reservation_time = $_POST['reservation-time'];
    $message = $_POST['message'];
    $seating_preference = $_POST['seating-preference'];
    $reservation_type = $_POST['reservation-type'];
    $additional_notes = $_POST['additional-notes'];
    $pre_order_info = $_POST['pre-order-info'];
    $terms_accepted = isset($_POST['checkbox']) ? 1 : 0;

    // Construct SQL query to insert the reservation's information into reservations table
    $sql = "INSERT INTO reservations (name, phone, person, reservation_date, reservation_time, message, seating_preference, reservation_type, additional_notes, pre_order_info, terms_accepted)
            VALUES ('$name', '$phone', '$person', '$reservation_date', '$reservation_time', '$message', '$seating_preference', '$reservation_type', '$additional_notes', '$pre_order_info', '$terms_accepted')";

    // Execute the SQL query
    $result = mysqli_query($conn, $sql);

    // Check if the update was successful
    if ($result) {
        echo "<script>alert('Reservation successful!');window.location.href='index.php';</script>";
    } else {
        echo "<script>alert('Reservation failed! Please try again later.');console.error('Error: " . mysqli_error($conn) . "');</script>";
    }
}
