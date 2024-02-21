<?php include('../frontend/config/constants.php'); ?>
<?php //include('login-check.php');
?>
<?php
$payment_status_query = "UPDATE order_manager
                   SET payment_status = 'successful'
                   WHERE EXISTS ( SELECT NULL
                   FROM aamarpay
                   WHERE aamarpay.transaction_id = order_manager.transaction_id )";

$payment_status_query_result = mysqli_query($conn, $payment_status_query);

?>
<?php
$ei_order_notif = "SELECT order_status from tbl_eipay
					WHERE order_status='Pending' OR order_status='Processing'";

$res_ei_order_notif = mysqli_query($conn, $ei_order_notif);

$row_ei_order_notif = mysqli_num_rows($res_ei_order_notif);

$online_order_notif = "SELECT order_status from order_manager
					WHERE order_status='Pending'OR order_status='Processing' ";

$res_online_order_notif = mysqli_query($conn, $online_order_notif);

$row_online_order_notif = mysqli_num_rows($res_online_order_notif);



// Count the number of stock
$stock_notif = "SELECT stock FROM tbl_food
				WHERE stock<50";

$res_stock_notif = mysqli_query($conn, $stock_notif);
$row_stock_notif = mysqli_num_rows($res_stock_notif);




// Count the number of new reservations
$reservations_notif = "SELECT status FROM reservations WHERE status = 'new'";
$res_reservations_notif = mysqli_query($conn, $reservations_notif);
$row_reservations_notif = mysqli_num_rows($res_reservations_notif);



// Message Notification
$message_notif = "SELECT message_status FROM message
				 WHERE message_status = 'unread'";
$res_message_notif = mysqli_query($conn, $message_notif);
$row_message_notif = mysqli_num_rows($res_message_notif);
?>

<?php include('./partials/head.php'); ?>
<style>
    /* Modal Styles */
    .modal {
        display: none;
        /* Hidden by default */
        position: fixed;
        /* Stay in place */
        z-index: 1000;
        /* Sit on top of everything */
        left: 0;
        top: 0;
        width: 100%;
        /* Full width */
        height: 100%;
        /* Full height */
        overflow: auto;
        /* Enable scroll if needed */
        background-color: rgba(0, 0, 0, 0.4);
        /* Black with opacity */
    }

    /* Modal Content Styles */
    .modal-content {
        background-color: #fefefe;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
        /* Could be more or less, depending on screen size */
        max-width: 500px;
        /* Limit maximum width */
    }

    /* Close Button Styles */
    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }
</style>

<body>


    <!-- SIDEBAR -->
    <section id="sidebar">
        <a href="index.php" class="brand">
            <img src="../images/logo.gif" width="80px" alt="">
        </a>
        <ul class="side-menu top">
            <li>
                <a href="index.php">
                    <i class='bx bxs-dashboard'></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="manage-admin.php">
                    <i class='bx bxs-group'></i>
                    <span class="text">Admin Panel</span>
                </a>
            </li>
            <li class="">
                <a href="manage-online-order.php">
                    <i class='bx bxs-cart'></i>
                    <span class="text">Online Orders&nbsp;</span>
                    <?php
                    if ($row_online_order_notif > 0) {
                    ?>
                        <span class="num-ei"><?php echo $row_online_order_notif; ?></span>
                    <?php
                    } else {
                    ?>
                        <span class=""> </span>
                    <?php
                    }
                    ?>
                </a>
            </li>
            <li>
                <a href="manage-ei-order.php">
                    <i class='bx bx-qr-scan'></i>
                    <span class="text">Eat In Orders&nbsp;&nbsp;&nbsp;</span>
                    <?php
                    if ($row_ei_order_notif > 0) {
                    ?>
                        <span class="num-ei"><?php echo $row_ei_order_notif; ?></span>
                    <?php
                    } else {
                    ?>
                        <span class=""> </span>
                    <?php
                    }
                    ?>

                </a>
            </li>
            <li>
                <a href="manage-category.php">
                    <i class='bx bxs-category'></i>
                    <span class="text">Category</span>
                </a>
            </li>
            <li>
                <a href="manage-food.php">
                    <i class='bx bxs-food-menu'></i>
                    <span class="text">Food Menu</span>
                </a>
            </li>
            <li class="">
                <a href="inventory.php">
                    <i class='bx bxs-box'></i>
                    <span class="text">Inventory</span>
                </a>
            </li>
            <li class="active">
                <a href="reservations.php">
                    <i class='bx bxs-box'></i>
                    <span class="text">Reservations</span>
                    <?php if ($row_reservations_notif > 0) : ?>
                        <span class="num-ei"><?php echo $row_reservations_notif; ?></span>
                    <?php else : ?>
                        <span class=""></span>
                    <?php endif; ?>
                </a>
            </li>
        </ul>
        <ul class="side-menu">
            <li>
                <a href="#">
                    <i class='bx bxs-cog'></i>
                    <span class="text">Settings</span>
                </a>
            </li>
            <li>
                <a href="logout.php" class="logout">
                    <i class='bx bxs-log-out-circle'></i>
                    <span class="text">Logout</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- SIDEBAR -->



    <!-- CONTENT -->
    <section id="content">

        <!-- NAVBAR -->
        <?php include('./partials/navbar.php'); ?>
        <!-- NAVBAR -->


        <!-- MAIN -->
        <main>
            <div class="head-title">
                <div class="left">
                    <h1>Online Reservations</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="index.php">Dashboard</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a class="active" href="reservations.php">Online Reservations</a>
                        </li>
                    </ul>
                </div>

            </div>
            <br />

            <?php
            // Pagination variables (assuming they remain the same for reservations)
            $limit = 10; // Number of records per page
            $page = isset($_GET['page']) ? $_GET['page'] : 1; // Current page number

            // Query to fetch total number of reservations
            $total_query = "SELECT COUNT(*) AS total FROM `reservations`";
            $total_result = mysqli_query($conn, $total_query);
            $total_fetch = mysqli_fetch_assoc($total_result);
            $total_reservations = $total_fetch['total'];

            // Calculate total pages
            $total_pages = ceil($total_reservations / $limit);

            // Calculate offset for SQL query
            $offset = ($page - 1) * $limit;

            // Modify the main query to select from `reservations` and adapt column names
            $query = "SELECT * FROM `reservations` ORDER BY id DESC LIMIT $limit OFFSET $offset";
            $user_result = mysqli_query($conn, $query);

            // ... rest of the code remains the same, but you'll need to modify the table headers, data display logic, and action buttons to match the columns in `reservations`
            ?>

            <!-- Pagination links at the top -->
            <div class='pagination'>
                <?php if ($page > 1) : ?>
                    <a href='?page=<?php echo ($page - 1); ?>'>&laquo; Previous</a>
                <?php endif; ?>
                <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
                    <?php if ($i == $page) : ?>
                        <span class='current'><?php echo $i; ?></span>
                    <?php else : ?>
                        <a href='?page=<?php echo $i; ?>'><?php echo $i; ?></a>
                    <?php endif; ?>
                <?php endfor; ?>
                <?php if ($page < $total_pages) : ?>
                    <a href='?page=<?php echo ($page + 1); ?>'>Next &raquo;</a>
                <?php endif; ?>
            </div>

            <div class="table-data">
                <div class="order">
                    <div class="head">
                        <!-- Table -->
                        <table class="">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Reservation Date</th>
                                    <th>Reservation Time</th>
                                    <th>Seating Preference</th>
                                    <th>Reservation Type</th>
                                    <th>Pre-order Info</th>
                                    <th>Created At</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($user_fetch = mysqli_fetch_assoc($user_result)) : ?>
                                    <tr>
                                        <td><?php echo $user_fetch['id']; ?></td>
                                        <td><?php echo $user_fetch['name']; ?></td>
                                        <td><?php echo $user_fetch['phone']; ?></td>
                                        <td><?php echo $user_fetch['reservation_date']; ?></td>
                                        <td><?php echo $user_fetch['reservation_time']; ?></td>
                                        <td><?php echo $user_fetch['seating_preference']; ?></td>
                                        <td><?php echo $user_fetch['reservation_type']; ?></td>
                                        <td><?php echo $user_fetch['pre_order_info']; ?></td>
                                        <td><?php echo $user_fetch['created_at']; ?></td>
                                        <td>
                                            <?php
                                            $status = $user_fetch['status'];
                                            // Adapt logic for displaying reservation statuses based on your table
                                            if ($status == "new") {
                                                echo "<span class='status process'>$status</span>";
                                            } else if ($status == "updated") {
                                                echo "<span class='status completed'>$status</span>";
                                            } else if ($status == "cancelled") {
                                                echo "<span class='status cancelled'>$status</span>";
                                            }
                                            ?>
                                            <br><br>
                                            <span>
                                                <button class="button-8 update-btn" data-reservation-id="<?php echo $user_fetch['id']; ?>">Update</button>
                                            </span>




                                        </td>
                                        <td>
                                            <span>
                                                <a href="#" class="button-6" role="button" data-reservation-id="<?php echo $user_fetch['id']; ?>">Details</a>
                                            </span>
                                            <span>
                                                <a href="#" role="button" class="button-7 delete-btn" delete-reservation-id="<?php echo $user_fetch['id']; ?>">Delete</a>
                                            </span>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Pagination links at the bottom -->
            <div class='pagination'>
                <?php if ($page > 1) : ?>
                    <a href='?page=<?php echo ($page - 1); ?>'>&laquo; Previous</a>
                <?php endif; ?>
                <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
                    <?php if ($i == $page) : ?>
                        <span class='current'><?php echo $i; ?></span>
                    <?php else : ?>
                        <a href='?page=<?php echo $i; ?>'><?php echo $i; ?></a>
                    <?php endif; ?>
                <?php endfor; ?>
                <?php if ($page < $total_pages) : ?>
                    <a href='?page=<?php echo ($page + 1); ?>'>Next &raquo;</a>
                <?php endif; ?>
            </div>

            <main>
                <div id="reservationModal" class="modal">
                    <div class="modal-content">
                        <span class="close">&times;</span>
                        <div id="reservationDetails">
                            <h2>Reservation Details</h2>
                            <div class="data-container">
                            </div>
                        </div>
                    </div>
                </div>
            </main>

            <div id="updateStatusModal" class="modal">
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <h2>Update Reservation Status</h2>
                    <form id="updateStatusForm">
                        <input type="hidden" id="reservationId">
                        <label for="status">New Status:</label>
                        <select id="status" name="status">
                            <option value="new">New</option>
                            <option value="updated">Updated</option>
                            <option value="cancelled">Cancelled</option>
                        </select>
                        <button type="submit" class="button-8">Update</button>
                    </form>
                </div>
            </div>

            <!-- Delete Confirmation Modal -->
            <div id="deleteConfirmationModal" class="modal">
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <h2>Delete Reservation</h2>
                    <p>Are you sure you want to delete this reservation?</p>
                    <div class="button-container">
                        <button id="confirmDeleteBtn" class="button-8">Yes, Delete</button>
                        <button class="button-7 close-modal">Cancel</button>
                    </div>
                </div>
            </div>

            <script>
                // Get the modal
                var modal = document.getElementById("reservationModal");

                // Get the <span> element that closes the modal
                var span = document.getElementsByClassName("close")[0];

                // When the user clicks on the button, open the modal
                var buttons = document.querySelectorAll('.button-6');
                buttons.forEach(function(button) {
                    button.addEventListener('click', function() {
                        var reservationId = this.getAttribute('data-reservation-id');
                        fetchReservationDetails(reservationId);
                        modal.style.display = "block";
                    });
                });

                // When the user clicks on <span> (x), close the modal
                span.onclick = function() {
                    modal.style.display = "none";
                };

                // When the user clicks anywhere outside of the modal, close it
                window.onclick = function(event) {
                    if (event.target == modal) {
                        modal.style.display = "none";
                    }
                };

                // Function to fetch reservation details and display them in the modal
                function fetchReservationDetails(reservationId) {
                    // Fetch reservation details using AJAX
                    fetch('get_reservation_details.php?id=' + reservationId)
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Network response was not ok');
                            }
                            return response.json(); // Assuming the response is in JSON format
                        })
                        .then(data => {
                            // Populate the modal content with the received data
                            var dataContainer = document.querySelector('.data-container');
                            dataContainer.innerHTML = `
                <p><strong>Reservation ID:</strong> ${data.id}</p>
                <p><strong>Name:</strong> ${data.name}</p>
                <p><strong>Phone:</strong> ${data.phone}</p>
                <p><strong>Persons:</strong> ${data.person}</p>
                <p><strong>Reservation Date:</strong> ${data.reservation_date}</p>
                <p><strong>Reservation Time:</strong> ${data.reservation_time}</p>
                <p><strong>Seating Preference:</strong> ${data.seating_preference}</p>
                <p><strong>Reservation Type:</strong> ${data.reservation_type}</p>
                  <p><strong>Message:</strong> ${data.message}</p>
                  <p><strong>Additional notes:</strong> ${data.additional_notes}</p>
                <p><strong>Pre-order Info: </strong>${data.pre_order_info}</p>
                <p><strong>Terms accepted:</strong> ${data.terms_accepted}</p>
                <p><strong>Created At:</strong> ${data.created_at}</p>
                 <p><strong>Status:</strong> ${data.status}</p>
                <!-- You can add more details here as needed -->
            `;
                        })
                        .catch(error => {
                            console.error('There was a problem with the fetch operation:', error);
                        });
                }








                // Get the modal
                var updateStatusModal = document.getElementById("updateStatusModal");

                // Get the <span> element that closes the modal
                var closeBtn = updateStatusModal.querySelector(".close");

                // Get all update buttons
                var updateButtons = document.querySelectorAll('.update-btn');

                // When the user clicks on <span> (x), close the modal
                closeBtn.onclick = function() {
                    updateStatusModal.style.display = "none";
                };

                // When the user clicks anywhere outside of the modal, close it
                window.onclick = function(event) {
                    if (event.target == updateStatusModal) {
                        updateStatusModal.style.display = "none";
                    }
                };

                // Function to open modal and populate reservation ID
                updateButtons.forEach(function(button) {
                    button.addEventListener('click', function() {
                        var reservationId = this.getAttribute('data-reservation-id');
                        document.getElementById("reservationId").value = reservationId;
                        updateStatusModal.style.display = "block";
                    });
                });

                // Handle form submission
                var updateStatusForm = document.getElementById("updateStatusForm");
                updateStatusForm.addEventListener("submit", function(event) {
                    event.preventDefault();
                    var reservationId = document.getElementById("reservationId").value;
                    var status = document.getElementById("status").value;

                    // AJAX request to update status
                    var xhr = new XMLHttpRequest();
                    xhr.open("POST", "update_reservation_status.php", true);
                    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                    xhr.onreadystatechange = function() {
                        if (xhr.readyState == 4 && xhr.status == 200) {
                            // Handle response, maybe close modal or show success message
                            updateStatusModal.style.display = "none";
                            console.log(xhr.responseText);
                        }
                    };
                    xhr.send("id=" + reservationId + "&status=" + status);
                });





                document.addEventListener("DOMContentLoaded", function() {
                    const deleteButtons = document.querySelectorAll('.delete-btn');
                    const modal = document.getElementById('deleteConfirmationModal');
                    const confirmDeleteBtn = document.getElementById('confirmDeleteBtn');
                    const closeButtons = document.querySelectorAll('.close-modal');

                    let deleteReservationId;

                    deleteButtons.forEach(button => {
                        button.addEventListener('click', function(e) {
                            e.preventDefault();
                            deleteReservationId = this.getAttribute('delete-reservation-id');
                            modal.style.display = 'block';
                        });
                    });

                    confirmDeleteBtn.addEventListener('click', function() {
                        // Send an AJAX request to delete the record
                        // AJAX request
                        fetch('delete_reservation.php?id=' + deleteReservationId, {
                                method: 'POST',
                            })
                            .then(response => {
                                if (response.ok) {
                                    // If deletion is successful, reload the page
                                    location.reload();
                                }
                            })
                            .catch(error => console.error('Error:', error));
                    });

                    closeButtons.forEach(button => {
                        button.addEventListener('click', function() {
                            modal.style.display = 'none';
                        });
                    });

                    // Close the modal if the user clicks outside of it
                    window.addEventListener('click', function(e) {
                        if (e.target === modal) {
                            modal.style.display = 'none';
                        }
                    });
                });
            </script>
        </main>
        <!-- MAIN -->
    </section>
    <!-- CONTENT -->





    <script src="script-admin.js"></script>
</body>

</html>