<?php include('partials/header.php'); ?>

<?php
$payment_status_query = "UPDATE order_manager
                   SET payment_status = 'successful'
                   WHERE EXISTS ( SELECT NULL
                   FROM aamarpay
                   WHERE aamarpay.transaction_id = order_manager.transaction_id )";

$payment_status_query_result = mysqli_query($conn, $payment_status_query);

?>

<style>
    .order-container,
    .password-container {
        display: none;
        transition: opacity 0.8s ease-in-out, visibility 0.8s ease-in-out;
        /* Increase transition time */
        opacity: 0;
        visibility: hidden;
    }

    .order-container.show,
    .password-container.show {
        display: block;
        opacity: 1;
        visibility: visible;
    }
</style>




<section class="section testi text-center has-bg-image" style="background-image: url('./assets/images/testimonial-bg.jpg')" aria-label="testimonials">
    <!-- My account Start -->
    <div class="container-xxl py-5" style="margin-bottom: 200px;">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h1 class="section-title ff-secondary text-center text-primary fw-normal">My Account</h1>
                <h3 class="mb-5">Contact For Any Query</h3>
            </div>
            <p class="form-text text-center">
                Enquiry <a href="tel:+88123123456" class="link">+88-123-123456</a> or fill out the order form
            </p>
            <div class="row g-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="profile-nav col-md-3">
                            <div class="panel">
                                <div class="user-heading round">
                                    <a href="myaccount.php">
                                        <?php if (!empty($profileImage)) : ?>
                                            <img src="<?php echo $profileImage; ?>" />
                                        <?php else : ?>
                                            <img src="./assets/avatar.jpg" />
                                        <?php endif; ?>
                                    </a>
                                    <h1><?php echo $name; ?></h1>
                                </div>

                                <ul>
                                    <li><a href="edit-profile.php"> <i class="fa fa-edit"></i> Edit profile</a></li>
                                    <!-- Inside your <ul> with class "profile-nav" -->
                                    <li><a href="#section1"> <i class="fa fa-truck"></i> View Orders</a></li>
                                    <li><a href="#section2"> <i class="fa fa-cog"></i> Change Password</a></li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>
                                            <h2 class="text-left">Name </h2>
                                        </td>
                                        <td>
                                            <p><?php echo $name; ?></p>
                                        </td>
                                        <td>
                                            <h2 class="text-left">Email </h2>
                                        </td>
                                        <td>
                                            <p><?php echo $email; ?></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h2 class="text-left">Address</h2>
                                        </td>
                                        <td>
                                            <p><?php echo $add1; ?></p>
                                        </td>
                                        <td>
                                            <h2 class="text-left">City </h2>
                                        </td>
                                        <td>
                                            <p><?php echo $city; ?></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h2 class="text-left">Phone </h2>
                                        </td>
                                        <td>
                                            <p><?php echo $phone; ?></p>
                                        </td>
                                        <td>
                                            <h2 class="text-left">Username </h2>
                                        </td>
                                        <td>
                                            <p><?php echo $username; ?></p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>






                <div id="section1" class="container order-container">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="panel">

                                <div class="table-data">
                                    <div class="order">
                                        <div class="head">
                                        </div>
                                        <table class="">
                                            <thead>
                                                <tr>
                                                    <th>Order ID</th>
                                                    <th>Payment Status</th>
                                                    <th>Order Status</th>
                                                    <th>Total</th>
                                                    <th>Order</th>

                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php

                                                $query = "SELECT * FROM `order_manager` WHERE username='$username' ORDER BY order_id DESC";
                                                $user_result = mysqli_query($conn, $query);

                                                if (mysqli_num_rows($user_result) == 0) {
                                                    echo "<tr><td colspan='5'>No orders yet</td></tr>";
                                                } else {
                                                    while ($user_fetch = mysqli_fetch_assoc($user_result)) {
                                                        $order_id = $user_fetch['order_id'];
                                                        $cus_name = $user_fetch['cus_name'];
                                                        $cus_email = $user_fetch['cus_email'];
                                                        $cus_add1 = $user_fetch['cus_add1'];
                                                        $cus_phone = $user_fetch['cus_phone'];
                                                        $payment_status = $user_fetch['payment_status'];
                                                        $order_status = $user_fetch['order_status'];
                                                        $total_amount = $user_fetch['total_amount'];
                                                ?>

                                                        <tr>
                                                            <td><?php echo $order_id; ?></td>



                                                            <td>
                                                                <?php
                                                                if ($payment_status == "successful") {
                                                                    echo "<span class='status completed'>$payment_status</span>";
                                                                } else if ($payment_status == "Processing") {
                                                                    echo "<span class='status pending'>$payment_status</span>";
                                                                }

                                                                ?>
                                                            </td>
                                                            <td>
                                                                <?php
                                                                if ($order_status == "Pending") {
                                                                    echo "<span class='status process'>$order_status</span>";
                                                                } else if ($order_status == "Processing") {
                                                                    echo "<span class='status pending'>$order_status</span>";
                                                                } else if ($order_status == "Delivered") {
                                                                    echo "<span class='status completed'>$order_status</span>";
                                                                } else if ($order_status == "Cancelled") {
                                                                    echo "<span class='status cancelled'>$order_status</span>";
                                                                }

                                                                ?>


                                                            </td>


                                                            <td><?php echo $total_amount; ?></td>
                                                    <?php
                                                        echo "
                            <td>
                                <table class=''>
                                <thead>
                                    <tr>
                                        <th>Item Name</th>
                                        <th>Price</th>
                                        <th>Quantity</th>


                                    </tr>
                                </thead>
                                <tbody>
                                ";

                                                        $order_query = "SELECT * FROM `online_orders_new` WHERE `order_id`='$user_fetch[order_id]' ORDER BY order_id DESC ";
                                                        $order_result = mysqli_query($conn, $order_query);

                                                        while ($order_fetch = mysqli_fetch_assoc($order_result)) {
                                                            echo "
                                        <tr>
                                            <td>$order_fetch[Item_Name]</td>
                                            <td>$order_fetch[Price]</td>
                                            <td>$order_fetch[Quantity]</td>

                                        </tr>



                                    ";
                                                        }

                                                        echo "
                                </tbody>
                                </table>
                            </td>
                        </tr>

                        ";
                                                    }
                                                }
                                                    ?>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>


                <div id="section2" class="container password-container">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div>

                                <div class="table-data">
                                    <div class="order">
                                        <div class="head">

                                            <form action="" method="POST">
                                                <table class="tbl-30">
                                                    <tr>
                                                        <td>Current Password</td>
                                                        <td>
                                                            <input type="password" name="current_password" id="ip2">
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>New Password</td>
                                                        <td>
                                                            <input type="password" name="new_password" id="ip2">
                                                        </td>

                                                    </tr>

                                                    <tr>
                                                        <td>Confirm Password</td>
                                                        <td>
                                                            <input type="password" name="confirm_password" id="ip2">
                                                        </td>

                                                    </tr>

                                                    <tr>
                                                        <td colspan="2">
                                                            <input type="hidden" name="username" value="<?php echo $username; ?>">
                                                            <input type="submit" name="submit" value="Change Password" class="button-8" role="button">
                                                        </td>
                                                    </tr>

                                                </table>

                                            </form>

                                        </div>
                                    </div>
                                </div>

                                <?php
                                //Check whether the submit button is clicked or not
                                if (isset($_POST['submit'])) {
                                    // echo "Clicked";

                                    //1. Get the data from form

                                    $username = $_POST['username'];
                                    $current_password = md5($_POST['current_password']);
                                    $new_password = md5($_POST['new_password']);
                                    $confirm_password = md5($_POST['confirm_password']);

                                    $update_password = "SELECT * FROM tbl_users WHERE username='$username' AND password='$current_password'";



                                    $res_update_password = mysqli_query($conn, $update_password);

                                    if ($res_update_password == true) {
                                        $count = mysqli_num_rows($res_update_password);

                                        if ($count == 1) {

                                            if ($new_password == $confirm_password) {

                                                $sql2_update_password = "UPDATE tbl_users SET
                        password = '$new_password'
                        WHERE username='$username'
                    ";

                                                $res2_update_password = mysqli_query($conn, $sql2_update_password);
                                                if ($res2_update_password == true) {
                                                    $_SESSION['change-pwd'] = "<div class='success'>Password Changed Successfully.</div>";
                                                    header('location:' . SITEURL . 'myaccount.php');
                                                } else {
                                                    $_SESSION['pwd-not-match'] = "<div class='error'>Failed to Change Password. Try Again Please.</div>";

                                                    header('location:' . SITEURL . 'myaccount.php');
                                                }
                                            } else {
                                                $_SESSION['pwd-not-match'] = "<div class='error'>Passwords Did Not Match. Try Again Please.</div>";

                                                header('location:' . SITEURL . 'myaccount.php');
                                            }
                                        } else {
                                            $_SESSION['user-not-found'] = "<div class='error'>User Not Found</div>";
                                            header('location:' . SITEURL . 'myaccount.php');
                                        }
                                    }
                                }

                                ?>
                            </div>
                        </div>
                    </div>

                </div>















            </div>
        </div>
        <!-- My Account End -->

</section>

<?php include('partials/footer.php'); ?>


<!--
- #BACK TO TOP
-->

<a href="#top" class="back-top-btn active" aria-label="back to top" data-back-top-btn>
    <ion-icon name="chevron-up" aria-hidden="true"></ion-icon>
</a>





<!--
- custom js link
-->
<script src="./assets/js/script.js"></script>
<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="lib/wow/wow.min.js"></script>
<script src="lib/easing/easing.min.js"></script>
<script src="lib/waypoints/waypoints.min.js"></script>
<script src="lib/counterup/counterup.min.js"></script>
<script src="lib/owlcarousel/owl.carousel.min.js"></script>
<script src="lib/tempusdominus/js/moment.min.js"></script>
<script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
<script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

<!-- Template Javascript -->
<script src="js/main.js"></script>

<!--
- ionicon link
-->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>