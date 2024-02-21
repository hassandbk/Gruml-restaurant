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
<!DOCTYPE html>
<html lang="en">

<?php include('./partials/head.php'); ?>

<body>


	<!-- SIDEBAR -->
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
			<li class="">
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
				<a href="manager-category.php">
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
			<li class="active">
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
					<h1>Update Inventory</h1>
					<ul class="breadcrumb">
						<li>
							<a href="index.php">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right'></i></li>
						<li>
							<a class="active" href="inventory.php">Update Inventory</a>
						</li>
					</ul>
				</div>

			</div>

			<?php
			$id = $_GET['id'];
			$sql = "SELECT * FROM tbl_food WHERE id=$id";
			$res = mysqli_query($conn, $sql);

			if ($res == true) {
				$count = mysqli_num_rows($res);

				if ($count == 1) {
					$row = mysqli_fetch_assoc($res);
					$Item_Name = $row['title'];
					$stock = $row['stock'];
				} else {
					header('location:' . SITEURL . 'inventory.php');
				}
			}

			?>
			<div class="table-data">
				<div class="order">
					<div class="head">

						<form action="" method="POST">


							<table class="rtable">
								<tr>
									<td>Item Name</td>
									<td>
										<input type="text" name="Item_Name" value="<?php echo $Item_Name; ?>" id="ip2">
									</td>
								</tr>
								<tr>
									<td>Available Stock</td>
									<td>
										<input type="text" name="stock" value="<?php echo $stock; ?>" id="ip2">
									</td>
								</tr>

								<tr>
									<td colspan="2">
										<input type="hidden" name="id" value="<?php echo $id; ?>">
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
			//Check whether the Submit button is clicked or not

			if (isset($_POST['submit'])) {

				$id = $_POST['id'];
				$Item_Name = $_POST['Item_Name'];
				$stock = $_POST['stock'];

				//Creating SQL Query to update admin

				$sql = "UPDATE tbl_food SET
     title = '$Item_Name',
     stock = '$stock'
     WHERE id='$id'
     ";

				$res = mysqli_query($conn, $sql);
				if ($res == true) {

					$_SESSION['update'] = "<div class='success'>Stock Updated Successfully</div>";

					header('location:' . SITEURL . 'inventory.php');
				} else {

					$_SESSION['update'] = "<div class='error'>Failed to Update Stock</div>";

					header('location:' . SITEURL . 'inventory.php');
				}
			}
			?>







		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->


	<script src="script-admin.js"></script>
</body>

</html>