<?php include('../frontend/config/constants.php');
//include('login-check.php');

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
<?php

if (isset($_SESSION['add'])) {
	echo $_SESSION['add'];
	unset($_SESSION['add']); //Removing Session message
}
if (isset($_SESSION['delete'])) {
	echo $_SESSION['delete'];
	unset($_SESSION['delete']);
}
if (isset($_SESSION['update'])) {
	echo $_SESSION['update'];
	unset($_SESSION['update']);
}
if (isset($_SESSION['user-not-found'])) {
	echo $_SESSION['user-not-found'];
	unset($_SESSION['user-not-found']);
}
if (isset($_SESSION['pwd-not-match'])) {
	echo $_SESSION['pwd-not-match'];
	unset($_SESSION['pwd-not-match']);
}
if (isset($_SESSION['change-pwd'])) {
	echo $_SESSION['change-pwd'];
	unset($_SESSION['change-pwd']);
}
?>
<?php include('./partials/head.php'); ?>


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
					<h1>Admin Panel</h1>
					<ul class="breadcrumb">
						<li>
							<a href="index.php">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right'></i></li>
						<li>
							<a class="active" href="manage-admin.php">Admin Panel</a>
						</li>
					</ul>
				</div>

			</div>

			<!-- Table --->
			<div>
				<br>
				<a href="add-admin.php" class="button-8" role="button">Add Admin</a>
			</div>

			<div class="table-data">
				<div class="order">
					<div class="head">


					</div>
					<table>
						<thead>
							<tr>
								<th>Full Name</th>
								<th>Username</th>
								<th>Actions</th>
							</tr>
						</thead>

						<?php

						$sql = "SELECT * FROM tbl_admin";
						$res = mysqli_query($conn, $sql);

						if ($res == TRUE) {
							$count = mysqli_num_rows($res);

							if ($count > 0) {
								while ($rows = mysqli_fetch_assoc($res)) {
									$id = $rows['id'];
									$full_name = $rows['full_name'];
									$username = $rows['username'];
						?>
									<tbody>
										<tr>
											<td><?php echo $full_name; ?></td>
											<td><?php echo $username; ?></td>
											<td>
												<a href="<?php echo SITEURL; ?>update-password.php?id=<?php echo $id; ?>" class="button-5" role="button">Change Password</a>
												<a href="<?php echo SITEURL; ?>update-admin.php?id=<?php echo $id; ?>" class="button-6" role="button">Update</a>
												<a href="<?php echo SITEURL; ?>delete-admin.php?id=<?php echo $id; ?>" class="button-7" role="button">Delete</a>

											</td>
										</tr>

							<?php

								}
							}
						}

							?>

									</tbody>
					</table>
				</div>

			</div>




			<!-- Table ---->



		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->


	<script src="script-admin.js"></script>


</body>

</html>