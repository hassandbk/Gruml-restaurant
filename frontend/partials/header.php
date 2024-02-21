<?php include('config/constants.php'); ?>
<?php
date_default_timezone_set('Africa/Nairobi');

if (isset($_SESSION['user'])) {
  $username = $_SESSION['user'];

  $fetch_user = "SELECT * FROM tbl_users WHERE username = '$username'";

  $res_fetch_user = mysqli_query($conn, $fetch_user);

  while ($rows = mysqli_fetch_assoc($res_fetch_user)) {
    $id = $rows['id'];
    $name = $rows['name'];
    $email = $rows['email'];
    $add1 = $rows['add1'];
    $city = $rows['city'];
    $phone = $rows['phone'];
    $username = $rows['username'];
    $password = $rows['password'];
    $profileImage = $rows['image'];
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!--
    - primary meta tags
  -->
  <title>GrumL Restaurant - Delicious Food in Mengo, Uganda</title>
  <meta name="title" content="GrumL Restaurant - Delicious Food in Mengo, Uganda">
  <meta name="description" content="Discover delicious food at GrumL Restaurant, located in Mengo along Balintuma Road near Ndejje University, Uganda. Enjoy a delightful culinary experience with our carefully crafted menu and welcoming ambiance.">


  <!--
    - favicon
  -->
  <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml">


  <!--
    - google font link
  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;700&family=Forum&display=swap" rel="stylesheet">


  <!-- Icon Font Stylesheet -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

  <!-- Libraries Stylesheet -->
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

  <!-- Customized Bootstrap Stylesheet -->
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <!-- Template Stylesheet -->
  <link href="css/style.css" rel="stylesheet">
  <!--
    - custom css link
  -->
  <link rel="stylesheet" href="./assets/css/style.css">

  <!-- Include jQuery -->
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

  <!-- Your custom JavaScript -->
  <!-- Inside your head tag -->
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Function to toggle sections and maintain scroll position
      function toggleSection(sectionId) {
        const section = document.getElementById(sectionId);
        const currentScrollPosition = window.scrollY;

        // Hide all containers except the one with the given sectionId
        document.querySelectorAll('.order-container, .password-container').forEach(container => {
          if (container.id !== sectionId) {
            container.classList.remove('show');
          }
        });

        // Show the container with the given sectionId
        if (section) {
          section.classList.add('show');
        }

        // Scroll back to the captured scroll position after showing the section
        window.scrollTo({
          top: currentScrollPosition
        });
      }

      // Check the URL hash and toggle the corresponding section
      const initialSectionId = location.hash.slice(1);
      if (initialSectionId) {
        toggleSection(initialSectionId);
      }

      // Event listeners for clicking links to toggle sections
      document.querySelectorAll('.profile-nav a').forEach(link => {
        link.addEventListener('click', function(event) {
          event.preventDefault();
          const sectionId = this.getAttribute('href').slice(1);
          toggleSection(sectionId);
        });
      });
    });
  </script>

</head>



<body id="top">
  <!--
    - #PRELOADER
  -->

  <div class="preload" data-preaload>
    <div class="circle"></div>
    <p class="text">GrumL</p>
  </div>

  <!--
    - #TOP BAR
  -->

  <div class="topbar">
    <div class="row justify-content-center">
      <div class="col-md-10">
        <!-- This column will take up 9/12 (3/4) of the row -->
        <div class="container">
          <div class="container">
            <address class="topbar-item">
              <div class="icon">
                <ion-icon name="location-outline" aria-hidden="true"></ion-icon>
              </div>

              <span class="span">
                Balintuma Road, Mengo, Uganda
              </span>
            </address>

            <div class="separator"></div>

            <div class="topbar-item item-2">
              <div class="icon">
                <ion-icon name="time-outline" aria-hidden="true"></ion-icon>
              </div>

              <span class="span">Daily : 8.00 am to 10.00 pm</span>
            </div>

            <a href="tel:+11234567890" class="topbar-item link">
              <div class="icon">
                <ion-icon name="call-outline" aria-hidden="true"></ion-icon>
              </div>


              <span class="span">+256 123 456 7890</span>
            </a>

            <div class="separator"></div>

            <a href="mailto:booking@restaurant.com" class="topbar-item link">
              <div class="icon">
                <ion-icon name="mail-outline" aria-hidden="true"></ion-icon>
              </div>

              <span class="span">booking@restaurant.com</span>
            </a>

          </div>
        </div>
      </div>
      <div class="col-md-2">

        <div class="container  py-4">

          <?php
          $count = 0;
          if (isset($_SESSION['cart'])) {
            $count = count($_SESSION['cart']);
          }
          if (isset($_SESSION['user'])) {
            $username = $_SESSION['user'];

          ?>

            <div class="action">
              <div class="profile" onclick="menuToggle();">
                <?php if (!empty($profileImage)) : ?>
                  <img src="<?php echo $profileImage; ?>" />
                <?php else : ?>
                  <img src="./assets/avatar.jpg" />
                <?php endif; ?>
              </div>
              <div class="menu">
                <h3><?php echo $username; ?><br /><span><?php echo $name; ?></span></h3>
                <ul>
                  <li>
                    <img src="./assets/icons/user.png" /><a href="myaccount.php">My profile</a>
                  </li>
                  <li>
                    <img src="./assets/icons/edit.png" /><a href="edit-profile.php">Edit profile</a>
                  </li>
                  <li>
                    <img src="./assets/icons/envelope.png" /><a href="#">Inbox</a>
                  </li>

                  <li>
                    <img src="./assets/icons/log-out.png" /><a href="logout.php">Logout</a>
                  </li>
                </ul>
              </div>
            </div>
        </div>
        <a href="mycart.php" class="btn py-2 px-4"><i class="fas fa-shopping-cart"></i><span> Cart
            <?php echo $count; ?></span></a>
      <?php
          } else {
      ?>
        <a href="login-signup.php?login=true&page=<?php echo urlencode($_SERVER['REQUEST_URI']); ?>" class="btn py-2 px-4">Login</a>
      <?php } ?>
      </div>
    </div>
  </div>
  </div>

  <!--
    - #HEADER
  -->

  <header class="header" data-header>
    <div class="container">

      <a href="#" class="logo col-lg-6 hero-nav">
        <img src="./assets/images/logo.png" width="100" height="50" alt="GrumL - Home">
      </a>

      <nav class="navbar" data-navbar>

        <button class="close-btn" aria-label="close menu" data-nav-toggler>
          <ion-icon name="close-outline" aria-hidden="true"></ion-icon>
        </button>

        <a href="#" class="logo hero-nav">
          <img src="./assets/images/logo.png" width="160" height="50" alt="GrumL - Home">
        </a>

        <ul class="navbar-list">

          <li class="navbar-item">
            <a href="index.php" class="navbar-link hover-underline active">
              <div class="separator"></div>

              <span class="span">Home</span>
            </a>
          </li>

          <li class="navbar-item">
            <a href="special-dishes.php" class="navbar-link hover-underline">
              <div class="separator"></div>

              <span class="span">Menus</span>
            </a>
          </li>

          <li class="navbar-item">
            <a href="about.php" class="navbar-link hover-underline">
              <div class="separator"></div>

              <span class="span">About Us</span>
            </a>
          </li>

          <li class="navbar-item">
            <a href="our-team.php" class="navbar-link hover-underline">
              <div class="separator"></div>

              <span class="span">Our Team</span>
            </a>
          </li>

          <li class="navbar-item">
            <a href="contact.php" class="navbar-link hover-underline">
              <div class="separator"></div>

              <span class="span">Contact</span>
            </a>
          </li>

        </ul>

        <div class="text-center">
          <p class="headline-1 navbar-title">Visit Us</p>

          <address class="body-4">
            Balintuma Road, Mengo, <br>
            Uganda
          </address>

          <p class="body-4 navbar-text">Open: 9.30 am - 2.30pm</p>

          <a href="mailto:booking@GrumL.com" class="body-4 sidebar-link">booking@GrumL.com</a>

          <div class="separator"></div>

          <p class="contact-label">Booking Request</p>


          <a href="tel:+256123456789" class="body-1 contact-number hover-underline">
            +256 123 456 789
          </a>
        </div>

      </nav>
      <button class="nav-open-btn" aria-label="open menu" data-nav-toggler>
        <span class="line line-1"></span>
        <span class="line line-2"></span>
        <span class="line line-3"></span>
      </button>
      <div class="overlay" data-nav-toggler data-overlay></div>
    </div>
  </header>