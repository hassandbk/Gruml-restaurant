<?php
include('config/constants.php');

// Check if the request method is POST and if the user session is set
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['user'])) {
    // Extract data needed to update the database
    $fullName = $_POST['fullName'];
    $email = $_POST['email'];
    $phoneNumber = $_POST['phoneNumber'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    // Handle image upload if image data is present
    $imagePath = '';
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
        $targetPath = './assets/images/uploads/';
        $filename = uniqid() . '-' . basename($_FILES['photo']['name']);
        $targetFilePath = $targetPath . $filename;
        if (move_uploaded_file($_FILES['photo']['tmp_name'], $targetFilePath)) {
            // Image uploaded successfully, set the image path
            $imagePath = mysqli_real_escape_string($conn, $targetFilePath);
        }
    }

    // Construct your SQL query to update the user's information including image path if provided
    $update_query = "UPDATE tbl_users SET name = '$fullName', email = '$email', phone = '$phoneNumber', add1 = '$address', city = '$city', username = '$username', password = '$password'";
    if ($imagePath !== '') {
        $update_query .= ", image = '$imagePath'";
    }
    $update_query .= " WHERE username = '" . $_SESSION['user'] . "'";

    // Execute the SQL query
    $result = mysqli_query($conn, $update_query);

    // Check if the update was successful
    if ($result) {
        // Database update successful, send a JSON response
        echo json_encode(array('success' => true));
    } else {
        // Database update failed, send a JSON response with error message
        echo json_encode(array('success' => false, 'message' => 'Error updating database'));
    }
} else {
    // If the request method is not POST or user session is not set, return an error
    echo json_encode(array('success' => false, 'message' => 'Invalid request'));
}
