<?php include('config/constants.php'); ?>
<?php
date_default_timezone_set('Africa/Nairobi');

if (!isset($_SESSION['user'])) //If user session is not set
{
    //User is not logged in
    //Redirect to login page with message

    $_SESSION['no-login-message'] = "<div class='error'>Please login to access Admin Panel</div>";
    header('location:' . SITEURL . 'login.php');
}

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
    <title>Grilli - Amazing & Delicious Food</title>
    <meta name="title" content="Grilli - Amazing & Delicious Food">
    <meta name="description" content="This is a Restaurant html template made by codewithsadee">

    <link rel="canonical" href="https://tailwindcomponents.com/component/multistep-form-with-tailwindcss-and-alpinejs" itemprop="URL">
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/crypto-js.min.js"></script>

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>




    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <!--
    - custom css link
  -->
    <link rel="stylesheet" href="./assets/css/style.css">


</head>


<body id="top">
    <!--
    - #PRELOADER
  -->

    <div class="preload" data-preaload>
        <div class="circle"></div>
        <p class="text">Grilli</p>
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
                                Restaurant St, Delicious City, London 9578, UK
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

                            <span class="span">+1 123 456 7890</span>
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
                                <h3><?php echo $username; ?><br /><span>Website Designer</span></h3>
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


    <!--
    - #HEADER
  -->

    <header class="header" data-header>
        <div class="container">

            <a href="#" class="logo col-lg-6 hero-nav">
                <img src="./assets/images/logo.svg" width="160" height="50" alt="Grilli - Home">
            </a>

            <nav class="navbar" data-navbar>

                <button class="close-btn" aria-label="close menu" data-nav-toggler>
                    <ion-icon name="close-outline" aria-hidden="true"></ion-icon>
                </button>

                <a href="#" class="logo hero-nav">
                    <img src="./assets/images/logo.svg" width="160" height="50" alt="Grilli - Home">
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
                        <a href="#" class="navbar-link hover-underline">
                            <div class="separator"></div>

                            <span class="span">Our Chefs</span>
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
                        Restaurant St, Delicious City, <br>
                        London 9578, UK
                    </address>

                    <p class="body-4 navbar-text">Open: 9.30 am - 2.30pm</p>

                    <a href="mailto:booking@grilli.com" class="body-4 sidebar-link">booking@grilli.com</a>

                    <div class="separator"></div>

                    <p class="contact-label">Booking Request</p>

                    <a href="tel:+88123123456" class="body-1 contact-number hover-underline">
                        +88-123-123456
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


    <main>
        <article>



            <!--
        - #Registration/edit profile
      -->

            <section class="section text-center">
                <div class="container ">

                    <p class="section-subtitle label-2">Edit Profile</p>

                    <h2 class="headline-1 section-title">Modify your Account</h2>

                    <p class="section-text">
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry lorem Ipsum has been the industrys
                        standard dummy text ever.
                    </p>

                    <div x-data="app()">
                        <div class="max-w-3xl mx-auto items-center ">

                            <div x-show.transition="step === 'complete'">
                                <div class="bg-white rounded-lg p-10 flex items-center shadow justify-between">
                                    <div>
                                        <svg class="mb-4 h-20 w-20 text-green-500 mx-auto" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                        </svg>

                                        <h2 class="text-2xl mb-4 text-gray-800 text-center font-bold">Registration Success</h2>

                                        <div class="text-gray-600 mb-8">
                                            Thank you. We have sent you an email to <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="7612131b193612131b195802130502">[email&#160;protected]</a>. Please
                                            click the link in the message to activate your account.
                                        </div>
                                        <button onclick="window.location.href = 'index.php';" class="w-40 block mx-auto focus:outline-none py-2 px-5 rounded-lg shadow-sm text-center text-gray-600 bg-white hover:bg-gray-100 font-medium border">Back
                                            to home</button>

                                    </div>
                                </div>
                            </div>

                            <div x-show.transition="step != 'complete'">
                                <!-- Top Navigation -->
                                <div class="border-b-2 py-4">
                                    <div class="section-subtitle label-2" x-text="`Step: ${step} of 4`"></div>
                                    <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                                        <div class="label-2">
                                            <div x-show="step === 1">
                                                <p> Your Profile</p>
                                            </div>

                                            <div x-show="step === 2">
                                                <p>Address Details</p>
                                            </div>

                                            <div x-show="step === 3">
                                                <p>Account Information </p>
                                            </div>
                                            <div x-show="step === 4">
                                                <p>Review Information </p>
                                            </div>
                                        </div>

                                        <div class="flex items-center md:w-64">
                                            <div class="w-full bg-white rounded-full mr-2">
                                                <div class="rounded-full bg-green-500 text-xs leading-none h-2 text-center text-white" :style="'width: '+ parseInt(step / 4 * 100) +'%'"></div>
                                            </div>
                                            <div x-text="parseInt(step / 4 * 100) +'%'"></div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Top Navigation -->

                                <!-- Step Content -->
                                <div class="py-10">
                                    <div x-show.transition.in="step === 1">
                                        <div class="mb-5 text-center">
                                            <div class="mx-auto w-32 h-32 mb-2 border rounded-full relative bg-gray-100 mb-4 shadow-inset">
                                                <img id="image" class="object-cover w-full h-32 rounded-full" :src="image" />
                                            </div>

                                            <label for="fileInput" type="button" class="cursor-pointer inine-flex justify-between items-center focus:outline-none border py-2 px-4 rounded-lg shadow-sm text-left text-gray-600 bg-white hover:bg-gray-100 font-medium">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="inline-flex flex-shrink-0 w-6 h-6 -mt-1 mr-1" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <rect x="0" y="0" width="24" height="24" stroke="none"></rect>
                                                    <path d="M5 7h1a2 2 0 0 0 2 -2a1 1 0 0 1 1 -1h6a1 1 0 0 1 1 1a2 2 0 0 0 2 2h1a2 2 0 0 1 2 2v9a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-9a2 2 0 0 1 2 -2" />
                                                    <circle cx="12" cy="13" r="3" />
                                                </svg>
                                                Browse Photo
                                            </label>

                                            <div class="mx-auto w-48 text-gray-500 text-xs text-center mt-1">Click to add profile
                                                picture</div>

                                            <input name="photo" id="fileInput" accept="image/*" class="hidden" type="file" @change="let file = document.getElementById('fileInput').files[0];
								var reader = new FileReader();
								reader.onload = (e) => image = e.target.result;
								reader.readAsDataURL(file);">

                                        </div>

                                        <div class="mb-5">
                                            <label for="fullName" class="font-bold mb-1 text-gray-700 block">Full Name</label>
                                            <input type="text" x-model="fullName" name="name" class="input-field" :placeholder="fullName === '' ? '<?php echo $name; ?>' : ''">
                                        </div>

                                        <div class="mb-5">
                                            <label for="email" class="font-bold mb-1 text-gray-700 block">Email</label>
                                            <input type="email" x-model="email" name="email" class="input-field">
                                        </div>
                                        <div class="mb-5">
                                            <label for="phoneNumber" class="font-bold mb-1 text-gray-700 block">Phone Number</label>
                                            <input type="tel" x-model="phoneNumber" name="phone" class="input-field" :placeholder="phoneNumber === '' ? '<?php echo $phone; ?>' : ''">
                                        </div>

                                    </div>
                                    <!-- Step 2: Address Details -->
                                    <div x-show.transition.in="step === 2">
                                        <div class="mb-5">
                                            <label for="address" class="font-bold mb-1 text-gray-700 block">Address</label>
                                            <input type="text" x-model="address" id="address" name="add1" class="input-field" :placeholder="address === '' ? '<?php echo $add1; ?>' : ''">
                                        </div>

                                        <div class="mb-5">
                                            <label for="city" class="font-bold mb-1 text-gray-700 block">City</label>
                                            <input type="text" x-model="city" id="city" name="city" class="input-field" :placeholder="city === '' ? '<?php echo $city; ?>' : ''">
                                        </div>
                                    </div>
                                    <!-- Step 3: Account Information -->
                                    <div x-show.transition.in="step === 3">
                                        <!-- Username -->
                                        <div class="mb-5">
                                            <label for="username" class="font-bold mb-1 text-gray-700 block">Username</label>
                                            <input type="text" x-model="username" name="username" class="input-field" :placeholder="username === '' ? '<?php echo $username; ?>' : ''" id="username">
                                        </div>
                                        <!-- Old Password -->
                                        <div class="mb-5" id="old-password-section">
                                            <label for="oldPassword" class="font-bold mb-1 text-gray-700 block">Old Password</label>
                                            <input type="password" x-model="oldPassword" name="oldPassword" class="input-field" placeholder="Enter your old password..." id="oldPassword">
                                            <button @click="checkOldPassword" class="block mt-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                                Check Old Password
                                            </button>
                                        </div>


                                        <!-- New Password Fields -->
                                        <div id="new-password-section" style="display: none;">
                                            <div class="mb-5">
                                                <label for="password" class="font-bold mb-1 text-gray-700 block">New Password</label>
                                                <input :type="togglePassword ? 'text' : 'password'" @keydown="checkPasswordStrength()" @input="checkPasswordStrength()" x-model="password" name="password" class="input-field" placeholder="Your strong password..." id="password">
                                                <div class="flex items-center mt-4 h-3">
                                                    <div class="w-2/3 flex justify-between h-2">
                                                        <div :class="{ 'bg-red-400': passwordStrengthText == 'Too weak' ||  passwordStrengthText == 'Could be stronger' || passwordStrengthText == 'Strong password' }" class="h-2 rounded-full mr-1 w-1/3 bg-gray-300"></div>
                                                        <div :class="{ 'bg-orange-400': passwordStrengthText == 'Could be stronger' || passwordStrengthText == 'Strong password' }" class="h-2 rounded-full mr-1 w-1/3 bg-gray-300"></div>
                                                        <div :class="{ 'bg-green-400': passwordStrengthText == 'Strong password' }" class="h-2 rounded-full w-1/3 bg-gray-300"></div>
                                                    </div>
                                                    <div x-text="passwordStrengthText" class="text-gray-500 font-medium text-sm ml-3 leading-none"></div>
                                                </div>
                                            </div>

                                            <div class="mb-5">
                                                <label for="confirmPassword" class="font-bold mb-1 text-gray-700 block">Confirm New Password</label>
                                                <input :type="togglePassword ? 'text' : 'password'" @keydown="checkPasswordConfirmation()" @input="checkPasswordConfirmation()" x-model="confirmPassword" name="confirmPassword" class="input-field" placeholder="Re-enter your password..." id="confirmPassword">
                                                <div x-text="passwordConfirmationText" class="text-gray-500 font-medium text-sm mt-1"></div>
                                            </div>
                                        </div>


                                    </div>


                                    <!-- Step 4: Review Information -->
                                    <div x-show.transition.in="step === 4">
                                        <div class="mb-5">
                                            <div class="font-bold mb-1 text-gray-700 block">Review Information</div>
                                            <table class="w-full">
                                                <tbody>
                                                    <tr>
                                                        <td class="font-semibold py-2">Full Name:</td>
                                                        <td class="py-2"><span x-text="fullName === '' ? '<?php echo $name; ?>' : fullName"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="font-semibold py-2">Email:</td>
                                                        <td class="py-2"><span x-text="email === '' ? '<?php echo $email; ?>' : email"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="font-semibold py-2">Phone Number:</td>
                                                        <td class="py-2"><span x-text="phoneNumber === '' ? '<?php echo $phone; ?>' : phoneNumber"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="font-semibold py-2">Address:</td>
                                                        <td class="py-2"><span x-text="address === '' ? '<?php echo $add1; ?>' : address"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="font-semibold py-2">City:</td>
                                                        <td class="py-2"><span x-text="city === '' ? '<?php echo $city; ?>' : city"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="font-semibold py-2">Username:</td>
                                                        <td class="py-2"><span x-text="username === '' ? '<?php echo $username; ?>' : username"></span></td>
                                                    </tr>
                                                    <!-- Add more review information fields as needed -->
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                </div>
                                <!-- / Step Content -->
                            </div>
                        </div>

                        <!-- Bottom Navigation -->
                        <div x-show="step != 'complete'">
                            <div class="max-w-3xl mx-auto px-4">
                                <div class="flex justify-between">
                                    <div class="w-1/2">
                                        <button x-show="step > 1" @click="step--" class="py-2 px-4 btn btn-primary btn-tertiary">Previous</button>
                                    </div>

                                    <div class="w-1/2">
                                        <button x-show="step < 4" @click="step++" class="btn py-2 px-4 btn-primary">Next</button>

                                        <!-- <button @click="step = 'complete'" x-show="step === 4" class="btn btn-primary btn-confirm ">Complete</button> -->
                                        <button id="completeButton" x-show="step === 4" class="btn btn-primary btn-confirm" @click="completeRegistration">Complete</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>



                </div>
            </section>


            <!--
        - #TESTIMONIALS
      -->

            <section class="section testi text-center has-bg-image" style="background-image: url('./assets/images/testimonial-bg.jpg')" aria-label="testimonials">
                <div class="container">

                    <div class="quote">”</div>

                    <p class="headline-2 testi-text">
                        I wanted to thank you for inviting me down for that amazing dinner the other night. The food was
                        extraordinary.
                    </p>

                    <div class="wrapper">
                        <div class="separator"></div>
                        <div class="separator"></div>
                        <div class="separator"></div>
                    </div>

                    <div class="profile">
                        <img src="./assets/images/testi-avatar.jpg" width="100" height="100" loading="lazy" alt="Sam Jhonson" class="img">

                        <p class="label-2 profile-name">Sam Jhonson</p>
                    </div>

                </div>
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
            <script>
                function app() {
                    // Define variables to store user inputs
                    let fullName = '<?php echo $name; ?>';
                    let email = '<?php echo $email; ?>';
                    let address = '<?php echo $add1; ?>';
                    let city = '<?php echo $city; ?>';
                    let username = '<?php echo $username; ?>';
                    let phoneNumber = '<?php echo $phone; ?>';
                    let oldPassword = '';
                    return {
                        step: 1,
                        fullName,
                        email,
                        phoneNumber,
                        address,
                        city,
                        username,
                        passwordStrengthText: '',
                        passwordConfirmationText: '',
                        togglePassword: false,
                        image: 'data:image/jpeg;base64,/9j/4AAQSkZJRgABAQEAAAAAAAD/4QBCRXhpZgAATU0AKgAAAAgAAYdpAAQAAAABAAAAGgAAAAAAAkAAAAMAAAABAAAAAEABAAEAAAABAAAAAAAAAAAAAP/bAEMACwkJBwkJBwkJCQkLCQkJCQkJCwkLCwwLCwsMDRAMEQ4NDgwSGRIlGh0lHRkfHCkpFiU3NTYaKjI+LSkwGTshE//bAEMBBwgICwkLFQsLFSwdGR0sLCwsLCwsLCwsLCwsLCwsLCwsLCwsLCwsLCwsLCwsLCwsLCwsLCwsLCwsLCwsLCwsLP/AABEIAdoB2gMBIgACEQEDEQH/xAAfAAABBQEBAQEBAQAAAAAAAAAAAQIDBAUGBwgJCgv/xAC1EAACAQMDAgQDBQUEBAAAAX0BAgMABBEFEiExQQYTUWEHInEUMoGRoQgjQrHBFVLR8CQzYnKCCQoWFxgZGiUmJygpKjQ1Njc4OTpDREVGR0hJSlNUVVZXWFlaY2RlZmdoaWpzdHV2d3h5eoOEhYaHiImKkpOUlZaXmJmaoqOkpaanqKmqsrO0tba3uLm6wsPExcbHyMnK0tPU1dbX2Nna4eLj5OXm5+jp6vHy8/T19vf4+fr/xAAfAQADAQEBAQEBAQEBAAAAAAAAAQIDBAUGBwgJCgv/xAC1EQACAQIEBAMEBwUEBAABAncAAQIDEQQFITEGEkFRB2FxEyIygQgUQpGhscEJIzNS8BVictEKFiQ04SXxFxgZGiYnKCkqNTY3ODk6Q0RFRkdISUpTVFVWV1hZWmNkZWZnaGlqc3R1dnd4eXqCg4SFhoeIiYqSk5SVlpeYmZqio6Slpqeoqaqys7S1tre4ubrCw8TFxsfIycrS09TV1tfY2dri4+Tl5ufo6ery8/T19vf4+fr/2gAMAwEAAhEDEQA/APTmZsnmk3N60N1NJTELub1o3N60lFAC7m9aNzetJRQAu5vWjc3rSUUALub1o3N60lFAC7m9aNzetJRQAu5vWjc3rSUUALub1o3N60lFAC7m9aNzetJRQAu5vWjc3rSUUALub1o3N60lFAC7m9aNzetJRQAu5vWjc3rSUUALub1o3N60lFAC7m9aNzetJRQAu5vWjc3rSUUALub1o3N60lFAC7m9aNzetJRQAu5vWjc3rSUUALub1o3N60lFAC7m9aNzetJRQAu5vWjc3rSUUALub1o3N60lJQA7c3rSbm9aSigBdzetG4+tJRQAZPrRuPrSUUALub1/lRub1pKSgBdzUbm9aSigBdzetG5vX+VJSUALub1/lUu5qhqXj1oAG6mkpW6mkoAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooASiiigAooooAKSiigAooo+lACUZoooAKKKSgAo/rRSUALUlRVJz60AObqaSlbqaSgAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACkoooAKKKKACiikoAKSlooASiiigA+lHpRQaACkoooATmilpPegBP/ANdS5HrUdSfL7UAObqaSlbqaSgAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKSiigAooooAKKKKAEooooASij60UAFFFHpQAUmaKPxoAKSlpPWgA/wAmk/pS/Sk47dqADpUvPvUXrUn4H8qAHt1NJSt1NJQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFISFBJIAHUk4FAC0VTlv4EyEBc+3C/nVSS9uX6MEHonX8zQBrEqvLEAe5A/nUTXVqvWVfwyf5VjFmY5Ykn3JP86SmBrG/tB3c/RTTf7QtvST8hWXRQBqi/te+8f8AAc09by0b/loB/vAiseigDeV43+66t9CDTq5/p04+lTJdXMfSQkej/MP1oA2qKoR6gpwJUK/7Scj8utXEkjkG5GDD2P8AMUgH0UUUAFFFJQAUUUUAFFFJQAtJRRQAUlFFABR2oo+lAB1pKKP60AFFFFACUHjNH/66KAEpaSj/APVQAc0/I9KZUufpQA5uppKVuppKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACimsyopZiAo5JNZlxePLlI8rH0J/ib60AWp72KLKph3/wDHR9TWdLNNMcuxPoOij6Co6KYBRRRQAUUUUAFFFFABRRRQAUUUUAFKruhDIxUjuDikooA0IL/os4/4Gv8AUVfBVgCpBB6Ecg1gVLBcSwH5eUP3lPQ/SgDaoqOKaOZdyH/eB6qfepKQBRRRQAlFFFABSUUUAFFFFABRRSf5NABxR6e1FJQAcUUUnP6UALSf5/GjvRz+FAB06d6KT6UGgA96kyf8mo//ANdP59P1oAlbqaSlbqaSgAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACmu6RqzucKvJNKSACScADJJ7Csi6uDO2BkRqflHr7mgBLi5edu4QH5V/qagoopgFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFACUUUUAPjkkiYOhwR+RHoa14J0nTI4YffX0NYtPileJ1dDyOoPQj0NAG7SUyKVJkDr36juD6U+kAUhoooAKKKKACij/JpKACj/PNFFABScUelFACUdqP8mj+dABn9KMjij60d+tACf5FH5Uf59qOOlACfhUn40zmn4oAlbqaSlbqaSgAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKhuJhDEz/xfdQerGgCpfXGT5CHgf6w+/8AdqhQSSSScknJPqTRTAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACkoooAKKKKACiiigCe2nMEnP+rbhx6e9bHoQevT3zXP1p2M+9DE33k5X/AHf/AK1AF2koNFIAoopKAFpKKPSgApPX0pf8mkoAKKTPP1paAE+lFFIT/ntQAelHAoz0oz/hQAd6T155oooAKk2+wqLPt/8AWqTj1P5GgCZuppKVuppKACiiigAooooAKKKKACiiigAooooAKKKKACiiigArJvpd8uwH5Y+P+BHrWnK4jjkc/wAKkj69qwiSSSepJJ+ppgFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABSUUUAFFFFABRRSUAFFFFABT4pDFIkg/hPPuO4plFAG8CGAYchgCD7HmlqpYy74dp6xnH4HkVapALSUUUAH+NFFJQAc0f5+tHFJQAUUUepoAP/r0nP/1sUH1ozQAUnOaPwo9OlAAcd6T60tJQAHn+lSZPotR/55qTJ/yKAJm6mkpW6mkoAKKKKACiiigAooooAKKKKACiiigAooooAKKKKAKWoPiNE/vtk/RazKt6g2Zgv9xB+Z5qpTAKKKKACiiigAooooAKKKKA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',
                        password: '',
                        confirmPassword: '',
                        oldPassword,

                        checkPasswordStrength() {
                            var strongRegex = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})");
                            var mediumRegex = new RegExp(
                                "^(((?=.*[a-z])(?=.*[A-Z]))|((?=.*[a-z])(?=.*[0-9]))|((?=.*[A-Z])(?=.*[0-9])))(?=.{6,})"
                            );

                            let value = this.password;

                            if (strongRegex.test(value)) {
                                this.passwordStrengthText = "Strong password";
                            } else if (mediumRegex.test(value)) {
                                this.passwordStrengthText = "Could be stronger";
                            } else {
                                this.passwordStrengthText = "Too weak";
                            }
                        },

                        checkPasswordConfirmation() {
                            let password = this.password;
                            let confirmPassword = this.confirmPassword;

                            if (password === confirmPassword) {
                                this.passwordConfirmationText = "Passwords match";
                            } else {
                                this.passwordConfirmationText = "Passwords do not match";
                            }
                        },
                        checkOldPassword() {
                            let oldPassword = document.getElementById('oldPassword').value;

                            // MD5 hash the input old password
                            let oldPasswordHashed = CryptoJS.MD5(oldPassword).toString();

                            // Compare the MD5 hashed input old password with the stored MD5 hashed password
                            if (oldPasswordHashed === '<?php echo $password; ?>') {
                                // If old password matches, show the new password fields
                                document.getElementById('old-password-section').style.display = 'none';
                                document.getElementById('new-password-section').style.display = 'block';
                            } else {
                                alert('Old password is incorrect');
                            }
                        },


                        completeRegistration() {
                            // Extract data needed to update the database
                            let formData = new FormData();
                            formData.append('fullName', this.fullName);
                            formData.append('email', this.email);
                            formData.append('phoneNumber', this.phoneNumber);
                            formData.append('address', this.address);
                            formData.append('city', this.city);
                            formData.append('username', this.username);
                            formData.append('password', this.password);
                            formData.append('photo', document.getElementById('fileInput').files[0]); // Add image file to form data

                            // Send an AJAX request to update the database
                            fetch('update_database.php', {
                                    method: 'POST',
                                    body: formData, // Send the form data
                                })
                                .then(response => {
                                    if (response.ok) {
                                        alert('Information successfully updated');
                                        // Database update successful, proceed to the last step
                                        this.step = 'complete';
                                    } else {
                                        // Handle errors
                                        console.error('Error updating database');
                                    }
                                })
                                .catch(error => {
                                    console.error('Error:', error);
                                });
                        }

                    };
                }
            </script>
            <!--
    - ionicon link
  -->
            <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
            <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>