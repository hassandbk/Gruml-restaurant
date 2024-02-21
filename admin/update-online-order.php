<?php include('../frontend/config/constants.php');
//include('login-check.php');

$ei_order_notif = "SELECT order_status from tbl_eipay
					WHERE order_status='Pending' OR order_status='Processing'";

$res_ei_order_notif = mysqli_query($conn, $ei_order_notif);

$row_ei_order_notif = mysqli_num_rows($res_ei_order_notif);

$online_order_notif = "SELECT order_status from order_manager
					WHERE order_status='Pending'OR order_status='Processing' ";

$res_online_order_notif = mysqli_query($conn, $online_order_notif);

$row_online_order_notif = mysqli_num_rows($res_online_order_notif);

$stock_notif = "SELECT stock FROM tbl_food
				WHERE stock<50";

$res_stock_notif = mysqli_query($conn, $stock_notif);
$row_stock_notif = mysqli_num_rows($res_stock_notif);


// Count the number of new reservations
$reservations_notif = "SELECT status FROM reservations WHERE status = 'new'";
$res_reservations_notif = mysqli_query($conn, $reservations_notif);
$row_reservations_notif = mysqli_num_rows($res_reservations_notif);

//Message Notification
$message_notif = "SELECT message_status FROM message
				 WHERE message_status = 'unread'";
$res_message_notif = mysqli_query($conn, $message_notif);
$row_message_notif = mysqli_num_rows($res_message_notif);

?>
<?php include('./partials/head.php'); ?>
</head>

<body>

	<section id="sidebar">
		<a href="index.php" class="brand">
			<img src="../images/logo.png" width="80px" alt="">
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
			<li>
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
					<span class="text">Eat In Orders&nbsp;&nbsp;&nbsp;

					</span>
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
			<li class="">
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




	<section id="content">
		<!-- NAVBAR -->
		<?php include('./partials/navbar.php'); ?>
		<!-- NAVBAR -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Update Online Order</h1>
					<ul class="breadcrumb">
						<li>
							<a href="index.php">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right'></i></li>
						<li>
							<a class="active" href="manage-ei-order.php">Eat In Orders</a>
						</li>
					</ul>
				</div>
			</div>

			<br>

			<?php

			$id = $_GET['id'];
			$sql = "SELECT * FROM order_manager WHERE order_id=$id";
			$res = mysqli_query($conn, $sql);

			if ($res == true) {
				$count = mysqli_num_rows($res);
				if ($count == 1) {
					$row = mysqli_fetch_assoc($res);

					$order_id = $row['order_id'];
					$cus_name = $row['cus_name'];
					$cus_email = $row['cus_email'];
					$cus_add1 = $row['cus_add1'];
					$cus_phone = $row['cus_phone'];
					$payment_status = $row['payment_status'];
					$order_status = $row['order_status'];
				} else {
					header('location:' . SITEURL . 'manage-online-order.php');
				}
			}


			?>
			<div class="table-data">
				<div class="order">
					<div class="head">

						<form action="" method="POST">


							<table class="rtable">

								<tr>
									<td>Customer Name</td>
									<td>
										<input type="text" name="cus_name" value="<?php echo $cus_name; ?>" id="ip2">
									</td>
								</tr>
								<tr>
									<td>Email</td>
									<td>
										<input type="text" name="cus_email" value="<?php echo $cus_email; ?>" id="ip2">
									</td>
								</tr>
								<tr>
									<td>Address</td>
									<td>
										<input type="text" name="cus_add1" value="<?php echo $cus_add1; ?>" id="ip2">
									</td>
								</tr>

								<tr>
									<td>Phone</td>
									<td>
										<input type="text" name="cus_phone" value="<?php echo $cus_phone; ?>" id="ip2">
									</td>
								</tr>
								<tr>
									<td>Order Status</td>
									<td>
										<select name="order_status">
											<option <?php if ($order_status == "Pending") {
														echo "selected";
													} ?> value="Pending">Pending</option>
											<option <?php if ($order_status == "Processing") {
														echo "selected";
													} ?> value="Processing">Processing</option>
											<option <?php if ($order_status == "Delivered") {
														echo "selected";
													} ?> value="Delivered">Delivered</option>
											<option <?php if ($order_status == "Cancelled") {
														echo "selected";
													} ?> value="Cancelled">Cancelled</option>
										</select>
									</td>
								</tr>

								<tr>
									<td colspan="2">
										<input type="hidden" name="order_id" value="<?php echo $order_id; ?>">
										<input type="submit" name="submit" value="Update" class="button-8" role="button">
									</td>
								</tr>

							</table>



						</form>
					</div>
				</div>
			</div>
			</div>

			<?php

			if (isset($_POST['submit'])) {


				$order_id = $_POST['order_id'];
				$cus_name = $_POST['cus_name'];
				$cus_email = $_POST['cus_email'];
				$cus_add1 = $_POST['cus_add1'];
				$cus_phone = $_POST['cus_phone'];
				$order_status = $_POST['order_status'];


				$sql = "UPDATE order_manager SET
     order_id = '$order_id',
     cus_name = '$cus_name',
     cus_email = '$cus_email',
     cus_add1 = '$cus_add1',
     cus_phone = '$cus_phone',
     order_status = '$order_status'
     WHERE order_id='$order_id'
     ";

				$res = mysqli_query($conn, $sql);

				if ($res == true) {

					$_SESSION['update'] = "<div class='success'>Order Updated Successfully</div>";
					header('location:' . SITEURL . 'manage-online-order.php');
				} else {
					$_SESSION['update'] = "<div class='error'>Failed to Update Order</div>";
					header('location:' . SITEURL . 'manage-online-order.php');
				}
			}
			?>


		</main>
	</section>
	<script src="script-admin.js"></script>
</body>

</html>