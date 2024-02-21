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

<body>



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
			<li class="active">
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
					<h1>Add Admin</h1>
					<ul class="breadcrumb">
						<li>
							<a href="index.php">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right'></i></li>
						<li>
							<a class="active" href="manage-admin.php">Admin Panel</a>
						</li>
						<li>
							<a class="active" href="add-admin.php">Add Admin</a>
						</li>
					</ul>
					<?php

					if (isset($_SESSION['add'])) {
						echo $_SESSION['add'];
						unset($_SESSION['add']);
					}
					?>
				</div>
			</div>
			<br>
			<div class="table-data">
				<div class="order">
					<div class="head">

						<form action="" method="POST">
							<table class="rtable-center">
								<tr>
									<td>Full Name</td>
									<td><input type="text" name="full_name" id="ip2" required></td>

								</tr>
								<tr>
									<td>Username</td>
									<td><input type="text" name="username" id="ip2" required></td>
								</tr>
								<tr>
									<td>Password</td>
									<td><input type="password" name="password" id="ip2" required></td>
								</tr>
								<tr>
									<td colspan="2">
										<input type="submit" name="submit" value="Add Admin" class="button-8" role="button">
									</td>
								</tr>

							</table>

						</form>
					</div>
				</div>
			</div>
		</main>
	</section>
	<script src="script-admin.js"></script>
</body>

</html>

<?php
if (isset($_POST['submit'])) {
	$full_name = $_POST['full_name'];
	$username = $_POST['username'];
	$password = md5($_POST['password']); //md5 encryption

	$check_duplicate = "SELECT username FROM tbl_admin
						WHERE username = '$username'";
	$res_check_duplicate = mysqli_query($conn, $check_duplicate);

	$rows_check_duplicate = mysqli_num_rows($res_check_duplicate);
	if ($rows_check_duplicate > 0) {
		echo "<script>
                alert('Username already exists! Try a different username.');
                window.location.href='add-admin.php';
                </script>";
	} else {
		$sql = "INSERT INTO tbl_admin SET
        full_name='$full_name',
        username='$username',
        password='$password'
    	";
	}

	$res = mysqli_query($conn, $sql) or die(mysqli_error($conn));

	if ($res == true) {

		$_SESSION['add'] = "<div class='success'>Admin Added Successfully</div>";
		header("location:" . SITEURL . 'manage-admin.php');
	} else {
		$_SESSION['add'] = "<div class='error'>Failed to Add Admin</div>";
		header("location:" . SITEURL . 'add-admin.php');
	}
}

?>