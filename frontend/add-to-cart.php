<?php include('config/constants.php'); ?>

<?php


if (empty($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

array_push($_SESSION['cart'], $_GET['food_id']);

?>
<?php include('partials/header.php'); ?>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar & Hero Start -->
        <div class="container position-relative p-0">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0">
                <a href="<?php echo SITEURL; ?>" class="navbar-brand p-0">

                    <img src="../images/logo.png" alt="Logo">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0 pe-4">
                        <a href="index.php" class="nav-item nav-link">Home</a>
                        <a href="about.php" class="nav-item nav-link">About</a>
                        <a href="categories.php" class="nav-item nav-link">Categories</a>
                        <a href="menu.php" class="nav-item nav-link ">Menu</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                            <div class="dropdown-menu m-0">

                                <a href="team.php" class="dropdown-item">Our Team</a>
                                <a href="testimonial.php" class="dropdown-item">Testimonial</a>
                            </div>
                        </div>
                        <a href="contact.php" class="nav-item nav-link">Contact</a>
                    </div>
                    <a href="<?php echo SITEURL; ?>cart.php" class="btn btn-primary py-2 px-4"><i class="fas fa-shopping-cart"></i><span> Cart</span></a>
                </div>
            </nav>

            <div class="container-xxl py-5 bg-dark hero-header mb-5">
                <div class="container text-center my-5 pt-5 pb-4">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Cart</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Pages</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Cart</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->


        <div class="card" style="max-width: 500px;">
            <div class="row no-gutters justify-content-center">
                <div class="col-md-4">
                    <img src="../images/Cart-add-icon.png" class="card-img" alt="...">
                </div>
                <div class="col-md-12">
                    <div class="card-body">
                        <h5 class="card-title text-center">Item Added to Cart!</h5>
                        <a href="<?php echo SITEURL; ?>menu.php" class="btn btn-primary btn-lg btn-block">Continue</a>
                        <a href="<?php echo SITEURL; ?>cart.php" class="btn btn-primary btn-lg btn-block"><i class="fas fa-shopping-cart"></i><span> View Cart</span></a>
                        <a href="<?php echo SITEURL; ?>cart.php" class="btn btn-primary btn-lg btn-block">Checkout</a>
                    </div>
                </div>
            </div>
        </div>




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