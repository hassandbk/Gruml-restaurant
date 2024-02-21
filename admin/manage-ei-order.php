<?php include('../frontend/config/constants.php'); ?>
<?php //include('login-check.php');
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

// Pagination variables
$limit = 10; // Number of records per page
$page = isset($_GET['page']) ? $_GET['page'] : 1; // Current page number

// Calculate offset for SQL query
$offset = ($page - 1) * $limit;

//Getting Eat in order data from database
$sql = "SELECT * FROM tbl_eipay ORDER BY id DESC LIMIT $limit OFFSET $offset";

//Execute Query
$res = mysqli_query($conn, $sql);
//Count the Rows
$count = mysqli_num_rows($res);
$sn = ($page - 1) * $limit + 1; //Create a Serial Number and set its initial value

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
			<li class="active">
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
					<h1>Eat In Orders</h1>
					<ul class="breadcrumb">
						<li>
							<a href="index.php">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right'></i></li>
						<li>
							<a class="active" href="manage-online-order.php">Eat In Orders</a>
						</li>
					</ul>
				</div>
			</div>

			<br>
			<!-- Pagination links -->
			<div class='pagination'>
				<?php if ($page > 1) : ?>
					<a href='?page=<?php echo ($page - 1); ?>'>&laquo; Previous</a>
				<?php endif; ?>
				<?php for ($i = 1; $i <= ceil($count / $limit); $i++) : ?>
					<?php if ($i == $page) : ?>
						<span class='current'><?php echo $i; ?></span>
					<?php else : ?>
						<a href='?page=<?php echo $i; ?>'><?php echo $i; ?></a>
					<?php endif; ?>
				<?php endfor; ?>
				<?php if ($page < ceil($count / $limit)) : ?>
					<a href='?page=<?php echo ($page + 1); ?>'>Next &raquo;</a>
				<?php endif; ?>
			</div>

			<div class="table-data">
				<div class="order">
					<div class="head">
					</div>

					<table class="">
						<tr>
							<th>S.N.</th>
							<th>Table ID</th>
							<th>Amount</th>
							<th>Transaction ID</th>
							<th>Order Date</th>
							<th>Payment Status</th>
							<th>Order Status</th>
							<th>Actions</th>
						</tr>

						<?php
						if ($count > 0) {
							//Order Available
							while ($row = mysqli_fetch_assoc($res)) {
								//Get all the order details
								$id = $row['id'];
								$table_id = $row['table_id'];
								$amount = $row['amount'];
								$tran_id = $row['tran_id'];
								$order_date = $row['order_date'];
								$payment_status = $row['payment_status'];
								$order_status = $row['order_status'];
						?>

								<tr>
									<td><?php echo $sn++; ?>. </td>
									<td><?php echo $table_id; ?></td>
									<td><?php echo $amount; ?></td>
									<td><?php echo $tran_id; ?></td>
									<td><?php echo $order_date; ?></td>
									<td><span class="status process"><?php echo $payment_status; ?></span></td>
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
									<td>
										<a href="<?php echo SITEURL; ?>update-ei-order.php?id=<?php echo $id; ?>" class="button-5" role="button">Update</a>
										<a href="<?php echo SITEURL; ?>delete-ei-order.php?id=<?php echo $id; ?>" class="button-7" role="button">Delete</a>

									</td>
								</tr>

						<?php

							}
						} else {
							//Order not Available
							echo "<tr><td colspan='7' class='error'>Orders not Available</td></tr>";
						}
						?>




					</table>

				</div>

			</div>
			<!-- Pagination links -->
			<div class='pagination'>
				<?php if ($page > 1) : ?>
					<a href='?page=<?php echo ($page - 1); ?>'>&laquo; Previous</a>
				<?php endif; ?>
				<?php for ($i = 1; $i <= ceil($count / $limit); $i++) : ?>
					<?php if ($i == $page) : ?>
						<span class='current'><?php echo $i; ?></span>
					<?php else : ?>
						<a href='?page=<?php echo $i; ?>'><?php echo $i; ?></a>
					<?php endif; ?>
				<?php endfor; ?>
				<?php if ($page < ceil($count / $limit)) : ?>
					<a href='?page=<?php echo ($page + 1); ?>'>Next &raquo;</a>
				<?php endif; ?>
			</div>





		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->


	<script src="script-admin.js"></script>
</body>

</html>