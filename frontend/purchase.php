<?php include('config/constants.php'); ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CSS -->
    <link href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" rel="stylesheet">
    <link href="./css/payment.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="../images/logo.png">

</head>

<body class="bg-light1">


    <?php
    date_default_timezone_set('Africa/Nairobi');
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['purchase'])) {
            $cur_random_value = $_POST['tran_id'];
            $amount = $_POST['amount'];
            $username = $_POST['username'];
            $cus_name = $_POST['cus_name'];
            $cus_email = $_POST['cus_email'];
            $cus_add1 = $_POST['cus_add1'];
            $cus_city = $_POST['cus_city'];
            $cus_phone = $_POST['cus_phone'];
            $order_date = date("Y-m-d h:i:sa");





            $query1 = "INSERT INTO `order_manager`(`username`,`cus_name`, `cus_email`, `cus_add1`, `cus_city`, `cus_phone`, `payment_status`, `order_date`,`total_amount`,`transaction_id`,`order_status`) VALUES ('$_POST[username]','$_POST[cus_name]','$_POST[cus_email]','$_POST[cus_add1]','$_POST[cus_city]','$_POST[cus_phone]','$_POST[payment_status]','$order_date','$_POST[amount]','$_POST[tran_id]','Pending')";
            if (mysqli_query($conn, $query1)) {
                $Order_Id = mysqli_insert_id($conn);
                $query2 = "INSERT INTO `online_orders_new`(`order_id`, `Item_Name`, `Price`, `Quantity`) VALUES (?,?,?,?)";
                $stmt = mysqli_prepare($conn, $query2);

                if ($stmt) {
                    mysqli_stmt_bind_param($stmt, "isii", $Order_Id, $Item_Name, $Price, $Quantity);

                    foreach ($_SESSION['cart'] as $key => $values) {
                        $Item_Name = $values['Item_Name'];
                        $Price = $values['Price'];
                        $Quantity = $values['Quantity'];
                        $Id = $values['Id'];

                        mysqli_stmt_execute($stmt);




                        $update_quantity_query = "UPDATE `tbl_food` SET
                                stock = CASE
                                    WHEN stock >= $Quantity THEN stock - $Quantity
                                    ELSE stock
                                END
                                WHERE title = '$Item_Name'";

                        $res_update_quantity_query = mysqli_query($conn, $update_quantity_query);

                        if ($res_update_quantity_query && mysqli_affected_rows($conn) > 0) {
                            // Stock updated successfully
                        } else {
                            // Out of stock, show alert and redirect
                            echo "<script>alert('Sorry, the item $Item_Name is out of stock.')</script>";
                            echo "<script>window.location.href = 'mycart.php';</script>";
                        }
                    }

                    // unset($_SESSION['cart']);

    ?>


                    <div class="container">
                        <div class="card box1 shadow-sm p-md-5 p-md-5 p-4">

                            <div class="card box1 shadow-sm p-md-5 p-md-5 p-4">
                                <div class="nav nav-tabs justify-content-center mb-3" id="myTabs" role="tablist">
                                    <a class="nav-link active" id="order-details-tab" data-bs-toggle="tab" href="#order-details" role="tab" aria-controls="order-details" aria-selected="true">Order Details</a>
                                    <a class="nav-link" id="reservation-details-tab" data-bs-toggle="tab" href="#reservation-details" role="tab" aria-controls="reservation-details" aria-selected="false">Reservation Details</a>
                                    <a class="nav-link" id="payment-details-tab" data-bs-toggle="tab" href="#payment-details" role="tab" aria-controls="payment-details" aria-selected="false">Payment Details</a>
                                    <a class="nav-link" id="customer-information-tab" data-bs-toggle="tab" href="#customer-information" role="tab" aria-controls="customer-information" aria-selected="false">Customer Information</a>

                                </div>

                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="order-details" role="tabpanel" aria-labelledby="order-details-tab">
                                        <!-- Order Details Tab Content -->
                                        <div class="d-flex flex-column">
                                            <div class="d-flex align-items-center justify-content-between text">
                                                <span><strong class="label-Info" style="color: #e7e170;">Order ID:</strong></span>
                                                <span><?php echo $Order_Id; ?></span>
                                            </div>
                                            <!-- Fetch and display other order details from the database -->
                                            <?php
                                            // Fetch additional order details from the database based on $Order_Id
                                            $query_order_details = "SELECT * FROM online_orders_new WHERE order_id = $Order_Id";
                                            $result_order_details = mysqli_query($conn, $query_order_details);

                                            if (mysqli_num_rows($result_order_details) > 0) {
                                                while ($row_order_details = mysqli_fetch_assoc($result_order_details)) {
                                                    echo '<div class="d-flex align-items-center justify-content-between text">';
                                                    echo '<span><strong class="label-order">Item Name:</strong></span>';
                                                    echo '<span>' . $row_order_details['Item_Name'] . '</span>';
                                                    echo '</div>';
                                                    echo '<div class="d-flex align-items-center justify-content-between text">';
                                                    echo '<span><strong class="label-Info">Price:</strong></span>';
                                                    echo '<span>$' . $row_order_details['Price'] . '</span>';
                                                    echo '</div>';
                                                    echo '<div class="d-flex align-items-center justify-content-between text">';
                                                    echo '<span><strong class="label-Info">Quantity:</strong></span>';
                                                    echo '<span>' . $row_order_details['Quantity'] . '</span>';
                                                    echo '</div>';
                                                }
                                            } else {
                                                echo '<div class="d-flex align-items-center justify-content-between text">';
                                                echo '<span>No additional details found.</span>';
                                                echo '</div>';
                                            }
                                            ?>
                                        </div>

                                    </div>
                                    <div class="tab-pane fade" id="reservation-details" role="tabpanel" aria-labelledby="reservation-details-tab">
                                        <!-- Reservation Details Tab Content -->
                                        <div class="d-flex flex-column">
                                            <div class="d-flex align-items-center justify-content-between text"> <span>Reservation
                                                    ID:</span> <span>RES789012</span> </div>
                                            <div class="d-flex align-items-center justify-content-between text"> <span>Date and Time of
                                                    Reservation:</span> <span>22 July 2018, 7:00 PM</span> </div>
                                            <div class="d-flex align-items-center justify-content-between text"> <span>Number of
                                                    Guests:</span> <span>4</span> </div>
                                            <div class="d-flex align-items-center justify-content-between text"> <span>Special Requests
                                                    or Notes:</span> <span>N/A</span> </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="payment-details" role="tabpanel" aria-labelledby="payment-details-tab">

                                        <!-- Payment Details Tab Content -->
                                        <div class="d-flex flex-column">
                                            <?php
                                            // Compute total amount
                                            $total_amount = 0;
                                            foreach ($_SESSION['cart'] as $key => $values) {
                                                $total_amount += $values['Price'] * $values['Quantity'];
                                            }
                                            ?>
                                            <div class="d-flex align-items-center justify-content-between text">
                                                <span class="label-Info">Total Amount:</span>
                                                <span>$<?php echo number_format($total_amount, 2); ?></span>
                                            </div>
                                            <?php
                                            // Compute taxes (assuming tax rate is 10%)
                                            $tax_rate = 0.10;
                                            $taxes = $total_amount * $tax_rate;
                                            ?>
                                            <div class="d-flex align-items-center justify-content-between text">
                                                <span class="label-Info">Taxes (10%):</span>
                                                <span>$<?php echo number_format($taxes, 2); ?></span>
                                            </div>
                                            <?php
                                            // Compute grand total
                                            $grand_total = $total_amount + $taxes;
                                            ?>
                                            <div class="d-flex align-items-center justify-content-between text">
                                                <span class="label-Info">Grand Total:</span>
                                                <span>UGX <?php echo number_format($grand_total, 2); ?></span>
                                            </div>

                                            <div class="d-flex align-items-center justify-content-between text">
                                                <span class="label-Info">Payment Status:</span>
                                                <span>Paid</span>
                                            </div>
                                        </div>

                                    </div>


                                    <div class="tab-pane fade" id="customer-information" role="tabpanel" aria-labelledby="customer-information-tab">
                                        <!-- Customer Information Tab Content -->

                                        <div class="d-flex flex-column">
                                            <?php
                                            // Fetch customer information from the database based on the order ID
                                            $query_customer_info = "SELECT * FROM order_manager WHERE order_id = $Order_Id"; // Assuming `order_id` is the column name for the order ID
                                            $result_customer_info = mysqli_query($conn, $query_customer_info);

                                            if (mysqli_num_rows($result_customer_info) > 0) {
                                                $row_customer_info = mysqli_fetch_assoc($result_customer_info);
                                            ?>
                                                <div class="d-flex align-items-center justify-content-between text">
                                                    <span class="label-Info">Customer Name:</span>
                                                    <span><?php echo $row_customer_info['cus_name']; ?></span>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-between text">
                                                    <span class="label-Info">Contact Information:</span>
                                                    <span><?php echo $row_customer_info['cus_phone']; ?></span>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-between text">
                                                    <span class="label-Info">Email:</span>
                                                    <span><?php echo $row_customer_info['cus_email']; ?></span>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-between text">
                                                    <span class="label-Info">Address:</span>
                                                    <span><?php echo $row_customer_info['cus_add1'] . ', ' . $row_customer_info['cus_city']; ?></span>
                                                </div>
                                            <?php } else { ?>
                                                <div class="d-flex align-items-center justify-content-between text">
                                                    <span>No customer information found.</span>
                                                </div>
                                            <?php } ?>
                                        </div>



                                    </div>

                                </div>

                                <div class="d-flex flex-column">
                                    <div class="d-flex align-items-center justify-content-between text">
                                        <span class="label-order">Order Date:</span>
                                        <span><?php echo $row_customer_info['order_date']; ?></span>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between text">
                                        <span class="label-order">Expected Delivery Time:</span>
                                        <span id="expected-delivery-time"></span>
                                    </div>

                                    <div class="d-flex align-items-center justify-content-between text">
                                        <span class="label-order">Order Status:</span>
                                        <span><?php echo $row_customer_info['order_status']; ?></span>
                                    </div>
                                </div>



                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <div class="card box1 shadow-sm">
                                <div class="d-flex align-items-center justify-content-between p-md-5 p-4"> <span class="h5 fw-bold m-0">Payment
                                        methods</span>

                                </div>
                                <div class="d-flex justify-content-center">
                                    <ul class="nav nav-tabs mb-3 px-md-4 px-2">
                                        <li class="nav-item"> <a class="nav-link px-2 active" aria-current="page" href="#credit-card-tab" data-bs-toggle="tab">Credit Card</a> </li>
                                        <li class="nav-item"> <a class="nav-link px-2" href="#mobile-payment-tab" data-bs-toggle="tab">Mobile
                                                Payment</a> </li>

                                    </ul>
                                </div>
                                <div class="tab-content px-md-5 px-4 mb-4">
                                    <div class="tab-pane fade show active" id="credit-card-tab" role="tabpanel" aria-labelledby="credit-card-tab">
                                        <form action="success-onlpmt.php" method="POST">
                                            <input type="hidden" name="amount_original" value="<?php echo number_format($grand_total, 2); ?>">
                                            <input type="hidden" name="pay_status" value="Successful">
                                            <input type="hidden" name="pay_time" value="<?php echo date("Y-m-d H:i:s"); ?>">
                                            <input type="hidden" name="cus_name" value="<?php echo $cus_name; ?>">
                                            <input type="hidden" name="cus_email" value="<?php echo $cus_email; ?>">
                                            <input type="hidden" name="cus_add1" value="<?php echo $cus_add1; ?>">
                                            <input type="hidden" name="cus_city" value="<?php echo $cus_city; ?>">
                                            <input type="hidden" name="cus_phone" value="<?php echo $cus_phone; ?>">
                                            <input type="hidden" name="mer_txnid" value="<?php echo $cur_random_value; ?>">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="d-flex flex-column ps-md-5 px-md-0 px-4 mb-4">
                                                        <span>Credit Card<span class="ps-1">Number</span></span>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control css-input" value="" placeholder="1234 5678 9012 3456">
                                                            <span class="input-group-text fas fa-credit-card"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="d-flex flex-column pe-md-5 px-md-0 px-4 mb-4">
                                                        <span>Cardholder Name</span>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control css-input" value="" placeholder="John Doe">
                                                            <span class="input-group-text far fa-user"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>



                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="d-flex flex-column ps-md-5 px-md-0 px-4 mb-4">
                                                        <span>Expiration<span class="ps-1">Date</span></span>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control css-input" value="09/32">
                                                            <span class="input-group-text fas fa-calendar-alt"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="d-flex flex-column pe-md-5 px-md-0 px-4 mb-4">
                                                        <span>Code CVV</span>
                                                        <div class="input-group">
                                                            <input type="password" class="form-control css-input" value="">
                                                            <span class="input-group-text fas fa-lock"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="d-flex flex-column ps-md-5 px-md-0 px-4 mb-4">
                                                        <label for="card_type_select">Card Type</label>
                                                        <select class="form-select" id="card_type_select" name="card_type_select">
                                                            <option value="visa">Visa</option>
                                                            <option value="mastercard">Mastercard</option>
                                                            <option value="amex">American Express</option>
                                                            <option value="discover">Discover</option>
                                                            <option value="diners_club">Diners Club</option>
                                                            <!-- Add more card types as needed -->
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="d-flex flex-column ps-md-5 px-md-0 px-4 mb-4">
                                                        <label for="bank_name_select">Bank Name</label>
                                                        <select class="form-select" id="bank_name_select" name="bank_name_select">
                                                            <option value="stanbic">Stanbic Bank</option>
                                                            <option value="barclays">Barclays Bank</option>
                                                            <option value="standard_chartered">Standard Chartered Bank</option>
                                                            <option value="dfcu">dfcu Bank</option>
                                                            <option value="absa">Absa Bank</option>
                                                            <option value="equity">Equity Bank</option>
                                                            <!-- Add more bank names as needed -->
                                                        </select>
                                                    </div>
                                                </div>
                                                <!-- Hidden input field to store combined card type and bank name -->
                                                <input type="hidden" id="card_type" name="card_type">
                                            </div>





                                            <div class="row">
                                                <div class="col-12 px-md-5 px-4 mt-3">
                                                    <button type="submit" class="btn btn-primary w-100">Pay UGX <?php echo number_format($grand_total, 2); ?></button>
                                                </div>

                                            </div>


                                        </form>
                                    </div>
                                    <div class="tab-pane fade" id="mobile-payment-tab" role="tabpanel" aria-labelledby="mobile-payment-tab">
                                        <form action="success-onlpmt.php" method="POST">
                                            <input type="hidden" name="amount_original" value="<?php echo number_format($grand_total, 2); ?>">
                                            <input type="hidden" name="pay_status" value="Successful">
                                            <input type="hidden" name="pay_time" value="<?php echo date("Y-m-d H:i:s"); ?>">
                                            <input type="hidden" name="cus_name" value="<?php echo $cus_name; ?>">
                                            <input type="hidden" name="cus_email" value="<?php echo $cus_email; ?>">
                                            <input type="hidden" name="cus_add1" value="<?php echo $cus_add1; ?>">
                                            <input type="hidden" name="cus_city" value="<?php echo $cus_city; ?>">
                                            <input type="hidden" name="cus_phone" value="<?php echo $cus_phone; ?>">
                                            <input type="hidden" name="mer_txnid" value="<?php echo $cur_random_value; ?>">

                                            <div class="d-flex justify-content-center">
                                                <div class="image-container">
                                                    <img src="./img/mtn.png" alt="MTN" class="mobile-money-image">
                                                    <div>
                                                        <input type="radio" name="card_type" id="mtn" value="MTN-UG" class="form-check-input">
                                                        <label for="mtn">MTN</label>
                                                    </div>
                                                </div>
                                                <div class="image-container">
                                                    <img src="./img/Airtel.png" alt="Airtel" class="mobile-money-image">
                                                    <div>
                                                        <input class="form-check-input" type="radio" name="card_type" id="airtel" value="ARTEL-UG">
                                                        <label for="airtel">Airtel</label>
                                                    </div>
                                                </div>
                                            </div>




                                            <!-- Add more mobile money options here if needed -->
                                            <div class="col-12 px-md-5 px-4 mt-3">
                                                <button type="submit" class="btn btn-primary w-100">Proceed with Mobile Payment</button>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    </div>


    <?php

                } else {
                    echo "<script>
                alert('SQL Query Prepare Error');
                window.location.href='mycart.php';
                </script>";
                }
            } else {
                echo "<script>
            alert('SQL Error');
            window.location.href='mycart.php';
            </script>";
            }
        }
    }

    ?>
    <script>
        // Calculate expected delivery time
        var now = new Date();
        var deliveryTime = new Date(now.getTime() + 30 * 60000); // Assuming delivery time is 30 minutes from the current time

        // Update the display every second
        setInterval(function() {
            var currentTime = new Date();
            var timeDiff = deliveryTime - currentTime;

            // Calculate remaining time in minutes and seconds
            var minutes = Math.floor((timeDiff % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((timeDiff % (1000 * 60)) / 1000);

            // Format minutes and seconds
            var formattedTime = minutes + "m " + seconds + "s";

            // Display the countdown
            document.getElementById("expected-delivery-time").textContent = formattedTime;

            // If the countdown is finished, display 'Delivered'
            if (timeDiff <= 0) {
                document.getElementById("expected-delivery-time").textContent = "Delivered";
            }
        }, 1000); // Update every second
    </script>

    <script>
        // JavaScript to combine selected card type and bank name
        document.addEventListener('DOMContentLoaded', function() {
            var cardTypeSelect = document.getElementById('card_type_select');
            var bankNameSelect = document.getElementById('bank_name_select');
            var hiddenInput = document.getElementById('card_type');

            // Event listener for form submission
            document.querySelector('form').addEventListener('submit', function() {
                // Combine selected card type and bank name
                var cardType = cardTypeSelect.value;
                var bankName = bankNameSelect.value;
                hiddenInput.value = cardType + '_' + bankName;
            });
        });
    </script>
    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>



</body>



</html>