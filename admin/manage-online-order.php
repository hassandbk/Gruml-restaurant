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
			<li class="active">
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
					<h1>Online Orders</h1>
					<ul class="breadcrumb">
						<li>
							<a href="index.php">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right'></i></li>
						<li>
							<a class="active" href="manage-online-order.php">Online Orders</a>
						</li>
					</ul>
				</div>

			</div>
			<br />

			<?php
			// Pagination variables
			$limit = 10; // Number of records per page
			$page = isset($_GET['page']) ? $_GET['page'] : 1; // Current page number

			// Query to fetch total number of orders
			$total_query = "SELECT COUNT(*) AS total FROM `order_manager`";
			$total_result = mysqli_query($conn, $total_query);
			$total_fetch = mysqli_fetch_assoc($total_result);
			$total_orders = $total_fetch['total'];

			// Calculate total pages
			$total_pages = ceil($total_orders / $limit);

			// Calculate offset for SQL query
			$offset = ($page - 1) * $limit;

			$query = "SELECT * FROM `order_manager` ORDER BY order_id DESC LIMIT $limit OFFSET $offset";
			$user_result = mysqli_query($conn, $query);
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
									<th>Order ID</th>
									<th>Trasaction Id</th>
									<th>Phone</th>
									<th>Payment Status</th>
									<th>Order Status</th>
									<th>Total</th>
									<th>Order</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php while ($user_fetch = mysqli_fetch_assoc($user_result)) : ?>
									<!-- Display order details -->
									<tr>
										<td><?php echo $user_fetch['order_id']; ?></td>
										<td><?php echo $user_fetch['transaction_id']; ?></td>
										<td><?php echo $user_fetch['cus_phone']; ?></td>
										<td>
											<?php
											$payment_status = $user_fetch['payment_status'];
											if ($payment_status == "successful") {
												echo "<span class='status process'>$payment_status</span>";
											} else if ($payment_status == "Processing") {
												echo "<span class='status pending'>$payment_status</span>";
											}
											?>
										</td>
										<td>
											<?php
											$order_status = $user_fetch['order_status'];
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
											<br><br>
											<span>
												<a href="<?php echo SITEURL; ?>update-online-order.php?id=<?php echo $user_fetch['order_id']; ?>" class="button-8" role="button">Update</a>
											</span>
										</td>
										<td><?php echo $user_fetch['total_amount']; ?></td>
										<td>
											<table class='tbl-full'>
												<thead>
													<tr>
														<th>Item Name</th>
														<th>Price</th>
														<th>Quantity</th>
													</tr>
												</thead>
												<tbody>
													<?php
													$order_id = $user_fetch['order_id'];
													$order_query = "SELECT * FROM `online_orders_new` WHERE `order_id`='$order_id' ORDER BY order_id DESC";
													$order_result = mysqli_query($conn, $order_query);
													while ($order_fetch = mysqli_fetch_assoc($order_result)) : ?>
														<tr>
															<td><?php echo $order_fetch['Item_Name']; ?></td>
															<td><?php echo $order_fetch['Price']; ?></td>
															<td><?php echo $order_fetch['Quantity']; ?></td>
														</tr>
													<?php endwhile; ?>
												</tbody>
											</table>
										</td>
										<td>
											<span>
												<a href="#" class="button-7 delete-btn" data-order-id="<?php echo $user_fetch['order_id']; ?>" role="button">Delete</a>

											</span>
											<span>
												<span>
													<a href="#" class="button-6" role="button" data-item-id="<?php echo $user_fetch['order_id']; ?>">Details</a>
												</span>

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

			<!-- Modal -->
			<div id="orderModal" class="modal">
				<div class="modal-content">
					<span class="close">&times;</span>
					<div id="orderDetails"></div>
				</div>
			</div>

		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->

	<script>
		// Get the modal
		var modal = document.getElementById("orderModal");

		// Get the <span> element that closes the modal
		var span = document.getElementsByClassName("close")[0];

		// When the user clicks the button, open the modal
		function openModal(orderId) {
			// You can fetch more details about the order using AJAX here
			// For demonstration, let's just display the order ID
			document.getElementById("orderDetails").innerHTML = "<h2>Order Details for Order ID: " + orderId + "</h2>";
			modal.style.display = "block";
		}

		// When the user clicks on <span> (x), close the modal
		span.onclick = function() {
			modal.style.display = "none";
		}

		// When the user clicks anywhere outside of the modal, close it
		window.onclick = function(event) {
			if (event.target == modal) {
				modal.style.display = "none";
			}
		}




		document.addEventListener("DOMContentLoaded", function() {
			// Get the modal
			var modal = document.getElementById("orderModal");

			// Get the <span> element that closes the modal
			var span = document.getElementsByClassName("close")[0];

			// When the user clicks on the button, open the modal
			var buttons = document.querySelectorAll(".button-6");
			buttons.forEach(function(button) {
				button.addEventListener("click", function() {
					var itemId = this.getAttribute("data-item-id");
					// Make AJAX request to fetch details based on item ID
					var xhr = new XMLHttpRequest();
					xhr.onreadystatechange = function() {
						if (xhr.readyState === XMLHttpRequest.DONE) {
							if (xhr.status === 200) {
								var response = JSON.parse(xhr.responseText);
								// Update modal content with retrieved details
								var orderDetailsElement = document.getElementById("orderDetails");
								orderDetailsElement.innerHTML = "<p><strong>Order ID:</strong> " + response.order_id + "</p>" +
									"<p><strong>Username:</strong> " + response.username + "</p>" +
									"<p><strong>Customer Name:</strong> " + response.cus_name + "</p>" +
									"<p><strong>Customer Email:</strong> " + response.cus_email + "</p>" +
									"<p><strong>Customer Address:</strong> " + response.cus_add1 + "</p>" +
									"<p><strong>Customer City:</strong> " + response.cus_city + "</p>" +
									"<p><strong>Customer Phone:</strong> " + response.cus_phone + "</p>" +
									"<p><strong>Payment Status:</strong> " + response.payment_status + "</p>" +
									"<p><strong>Order Date:</strong> " + response.order_date + "</p>" +
									"<p><strong>Total Amount:</strong> " + response.total_amount + "</p>" +
									"<p><strong>Transaction ID:</strong> " + response.transaction_id + "</p>" +
									"<p><strong>Order Status:</strong> " + response.order_status + "</p>";
								// Display the modal
								modal.style.display = "block";
							} else {
								console.error("Error fetching order details:", xhr.status);
							}
						}
					};
					xhr.open("GET", "get_item_details.php?item_id=" + itemId, true);
					xhr.send();
				});
			});

			// When the user clicks on <span> (x), close the modal
			span.addEventListener("click", function() {
				modal.style.display = "none";
			});

			// When the user clicks anywhere outside of the modal, close it
			window.addEventListener("click", function(event) {
				if (event.target === modal) {
					modal.style.display = "none";
				}
			});
		});






		document.addEventListener("DOMContentLoaded", function() {
			// Get all delete buttons
			var deleteButtons = document.querySelectorAll(".delete-btn");

			// Add click event listener to each delete button
			deleteButtons.forEach(function(button) {
				button.addEventListener("click", function(event) {
					event.preventDefault(); // Prevent default link behavior

					var orderId = this.getAttribute("data-order-id");
					var confirmation = confirm("Are you sure you want to delete this order?");

					if (confirmation) {
						// Send AJAX request to delete the record
						var xhr = new XMLHttpRequest();
						xhr.onreadystatechange = function() {
							if (xhr.readyState === XMLHttpRequest.DONE) {
								if (xhr.status === 200) {
									// Reload the page after successful deletion
									window.location.reload();
								} else {
									console.error("Error deleting order:", xhr.status);
								}
							}
						};
						xhr.open("GET", "delete_order.php?order_id=" + orderId, true);
						xhr.send();
					}
				});
			});
		});
	</script>



	<script src="script-admin.js"></script>
</body>

</html>