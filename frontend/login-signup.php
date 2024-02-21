<?php
include('config/constants.php');

$error_message = ""; // Initialize error message variable

if (isset($_POST['submit'])) {
    //Preventing From SQL Injection
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, md5($_POST['password']));

    // Check if the user is an admin
    $admin_sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";
    $admin_res = mysqli_query($conn, $admin_sql);
    $admin_count = mysqli_num_rows($admin_res);

    if ($admin_count == 1) {
        //Admin found, login success
        $_SESSION['login'] = "<div class='success'>Admin Login Successful</div>";
        $_SESSION['user-admin'] = $username;
        header('location: ../admin/index.php'); // Redirect to admin dashboard
        exit(); // Stop further execution
    }

    // Check if the user is a normal user
    $user_sql = "SELECT * FROM tbl_users WHERE username='$username' AND password='$password'";
    $user_res = mysqli_query($conn, $user_sql);
    $user_count = mysqli_num_rows($user_res);

    if ($user_count == 1) {
        //User found, login success
        $_SESSION['login'] = "<div class='success'>User Login Successful</div>";
        $_SESSION['user'] = $username;
        header('location: ../frontend/index.php'); // Redirect to admin dashboard
        exit(); // Stop further execution
    } else {
        // Set error message
        $error_message = "Incorrect username or password. Please try again.";
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- 
    - primary meta tags
  -->
    <title>Grilli - Amazing & Delicious Food</title>
    <meta name="title" content="Grilli - Amazing & Delicious Food">
    <meta name="description" content="This is a Restaurant html template made by codewithsadee">


    <!-- 
    - favicon
  -->
    <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml">


    <link rel="stylesheet" type="text/css" href="./css/loginModal.css">
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
</head>

<body>

    <!-- The Modal -->
    <div id="myModal" class="modal">
        <!-- Modal content -->
        <div class="modal-content">
            <span class="close">&times;</span>
            <a href="index.php"><button class="btn solid" href="index.php"> home </button><a>
                    <div class="container">

                        <div class="forms-container">
                            <div class="signin-signup">

                                <form action="" class="sign-in-form" method="POST" name="form1">
                                    <h2 class="title">Sign In</h2>

                                    <div class="input-field">
                                        <i class="fas fa-user"></i>
                                        <input type="text" placeholder="Username" name="username" required />
                                    </div>
                                    <div class="input-field">
                                        <i class="fas fa-lock"></i>
                                        <input input type="password" name="password" placeholder="Password" required />
                                    </div>
                                    <!-- Display error message -->
                                    <?php if (!empty($error_message)) : ?>
                                        <p class="error-message"><?php echo $error_message; ?></p>
                                    <?php endif; ?>
                                    <input type="submit" name="submit" value="login" class="btn solid" />

                                    <p class="social-text">Or Sign in with social platforms</p>
                                    <div class="social-media">
                                        <div class="main">
                                            <div class="up">
                                                <button class="card1">
                                                    <svg class="instagram" fill-rule="nonzero" height="30px" width="30px" viewBox="0,0,256,256" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
                                                        <g style="mix-blend-mode: normal" text-anchor="none" font-size="none" font-weight="none" font-family="none" stroke-dashoffset="0" stroke-dasharray="" stroke-miterlimit="10" stroke-linejoin="miter" stroke-linecap="butt" stroke-width="1" stroke="none" fill-rule="nonzero">
                                                            <g transform="scale(8,8)">
                                                                <path d="M11.46875,5c-3.55078,0 -6.46875,2.91406 -6.46875,6.46875v9.0625c0,3.55078 2.91406,6.46875 6.46875,6.46875h9.0625c3.55078,0 6.46875,-2.91406 6.46875,-6.46875v-9.0625c0,-3.55078 -2.91406,-6.46875 -6.46875,-6.46875zM11.46875,7h9.0625c2.47266,0 4.46875,1.99609 4.46875,4.46875v9.0625c0,2.47266 -1.99609,4.46875 -4.46875,4.46875h-9.0625c-2.47266,0 -4.46875,-1.99609 -4.46875,-4.46875v-9.0625c0,-2.47266 1.99609,-4.46875 4.46875,-4.46875zM21.90625,9.1875c-0.50391,0 -0.90625,0.40234 -0.90625,0.90625c0,0.50391 0.40234,0.90625 0.90625,0.90625c0.50391,0 0.90625,-0.40234 0.90625,-0.90625c0,-0.50391 -0.40234,-0.90625 -0.90625,-0.90625zM16,10c-3.30078,0 -6,2.69922 -6,6c0,3.30078 2.69922,6 6,6c3.30078,0 6,-2.69922 6,-6c0,-3.30078 -2.69922,-6 -6,-6zM16,12c2.22266,0 4,1.77734 4,4c0,2.22266 -1.77734,4 -4,4c-2.22266,0 -4,-1.77734 -4,-4c0,-2.22266 1.77734,-4 4,-4z"></path>
                                                            </g>
                                                        </g>
                                                    </svg>
                                                </button>
                                                <button class="card2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" height="24" class="facebook" width="24">
                                                        <path d="M9.19795 21.5H13.198V13.4901H16.8021L17.198 9.50977H13.198V7.5C13.198 6.94772 13.6457 6.5 14.198 6.5H17.198V2.5H14.198C11.4365 2.5 9.19795 4.73858 9.19795 7.5V9.50977H7.19795L6.80206 13.4901H9.19795V21.5Z"></path>
                                                    </svg>
                                                </button>
                                            </div>
                                            <div class="down">
                                                <button class="card3">
                                                    <svg width="30" height="30" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="whatsapp">
                                                        <path d="M19.001 4.908A9.817 9.817 0 0 0 11.992 2C6.534 2 2.085 6.448 2.08 11.908c0 1.748.458 3.45 1.321 4.956L2 22l5.255-1.377a9.916 9.916 0 0 0 4.737 1.206h.005c5.46 0 9.908-4.448 9.913-9.913A9.872 9.872 0 0 0 19 4.908h.001ZM11.992 20.15A8.216 8.216 0 0 1 7.797 19l-.3-.18-3.117.818.833-3.041-.196-.314a8.2 8.2 0 0 1-1.258-4.381c0-4.533 3.696-8.23 8.239-8.23a8.2 8.2 0 0 1 5.825 2.413 8.196 8.196 0 0 1 2.41 5.825c-.006 4.55-3.702 8.24-8.24 8.24Zm4.52-6.167c-.247-.124-1.463-.723-1.692-.808-.228-.08-.394-.123-.556.124-.166.246-.641.808-.784.969-.143.166-.29.185-.537.062-.247-.125-1.045-.385-1.99-1.23-.738-.657-1.232-1.47-1.38-1.716-.142-.247-.013-.38.11-.504.11-.11.247-.29.37-.432.126-.143.167-.248.248-.413.082-.167.043-.31-.018-.433-.063-.124-.557-1.345-.765-1.838-.2-.486-.404-.419-.557-.425-.142-.009-.309-.009-.475-.009a.911.911 0 0 0-.661.31c-.228.247-.864.845-.864 2.067 0 1.22.888 2.395 1.013 2.56.122.167 1.742 2.666 4.229 3.74.587.257 1.05.408 1.41.523.595.19 1.13.162 1.558.1.475-.072 1.464-.6 1.673-1.178.205-.58.205-1.075.142-1.18-.061-.104-.227-.165-.475-.29Z"></path>
                                                    </svg>
                                                </button>
                                                <button class="card4">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" height="24" class="gmail" width="24">
                                                        <path d="M6 12C6 15.3137 8.68629 18 12 18C14.6124 18 16.8349 16.3304 17.6586 14H12V10H21.8047V14H21.8C20.8734 18.5645 16.8379 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C15.445 2 18.4831 3.742 20.2815 6.39318L17.0039 8.68815C15.9296 7.06812 14.0895 6 12 6C8.68629 6 6 8.68629 6 12Z"></path>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <form action="" class="sign-up-form">
                                    <h2 class="title">Sign Up</h2>

                                    <div class="input-field">
                                        <i class="fas fa-user"></i>
                                        <input type="text" placeholder="Username" />
                                    </div>
                                    <div class="input-field">
                                        <i class="fas fa-envelope"></i>
                                        <input type="email" placeholder="Email" />
                                    </div>
                                    <div class="input-field">
                                        <i class="fas fa-lock"></i>
                                        <input type="password" placeholder="Password" />
                                    </div>
                                    <input type="submit" value="Sign Up" class="btn solid" />


                                    <p class="social-text">Or Sign up with social platforms</p>
                                    <div class="social-media">
                                        <div class="main">
                                            <div class="up">
                                                <button class="card1">
                                                    <svg class="instagram" fill-rule="nonzero" height="30px" width="30px" viewBox="0,0,256,256" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
                                                        <g style="mix-blend-mode: normal" text-anchor="none" font-size="none" font-weight="none" font-family="none" stroke-dashoffset="0" stroke-dasharray="" stroke-miterlimit="10" stroke-linejoin="miter" stroke-linecap="butt" stroke-width="1" stroke="none" fill-rule="nonzero">
                                                            <g transform="scale(8,8)">
                                                                <path d="M11.46875,5c-3.55078,0 -6.46875,2.91406 -6.46875,6.46875v9.0625c0,3.55078 2.91406,6.46875 6.46875,6.46875h9.0625c3.55078,0 6.46875,-2.91406 6.46875,-6.46875v-9.0625c0,-3.55078 -2.91406,-6.46875 -6.46875,-6.46875zM11.46875,7h9.0625c2.47266,0 4.46875,1.99609 4.46875,4.46875v9.0625c0,2.47266 -1.99609,4.46875 -4.46875,4.46875h-9.0625c-2.47266,0 -4.46875,-1.99609 -4.46875,-4.46875v-9.0625c0,-2.47266 1.99609,-4.46875 4.46875,-4.46875zM21.90625,9.1875c-0.50391,0 -0.90625,0.40234 -0.90625,0.90625c0,0.50391 0.40234,0.90625 0.90625,0.90625c0.50391,0 0.90625,-0.40234 0.90625,-0.90625c0,-0.50391 -0.40234,-0.90625 -0.90625,-0.90625zM16,10c-3.30078,0 -6,2.69922 -6,6c0,3.30078 2.69922,6 6,6c3.30078,0 6,-2.69922 6,-6c0,-3.30078 -2.69922,-6 -6,-6zM16,12c2.22266,0 4,1.77734 4,4c0,2.22266 -1.77734,4 -4,4c-2.22266,0 -4,-1.77734 -4,-4c0,-2.22266 1.77734,-4 4,-4z"></path>
                                                            </g>
                                                        </g>
                                                    </svg>
                                                </button>
                                                <button class="card2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" height="24" class="facebook" width="24">
                                                        <path d="M9.19795 21.5H13.198V13.4901H16.8021L17.198 9.50977H13.198V7.5C13.198 6.94772 13.6457 6.5 14.198 6.5H17.198V2.5H14.198C11.4365 2.5 9.19795 4.73858 9.19795 7.5V9.50977H7.19795L6.80206 13.4901H9.19795V21.5Z"></path>
                                                    </svg>
                                                </button>
                                            </div>
                                            <div class="down">
                                                <button class="card3">
                                                    <svg width="30" height="30" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="whatsapp">
                                                        <path d="M19.001 4.908A9.817 9.817 0 0 0 11.992 2C6.534 2 2.085 6.448 2.08 11.908c0 1.748.458 3.45 1.321 4.956L2 22l5.255-1.377a9.916 9.916 0 0 0 4.737 1.206h.005c5.46 0 9.908-4.448 9.913-9.913A9.872 9.872 0 0 0 19 4.908h.001ZM11.992 20.15A8.216 8.216 0 0 1 7.797 19l-.3-.18-3.117.818.833-3.041-.196-.314a8.2 8.2 0 0 1-1.258-4.381c0-4.533 3.696-8.23 8.239-8.23a8.2 8.2 0 0 1 5.825 2.413 8.196 8.196 0 0 1 2.41 5.825c-.006 4.55-3.702 8.24-8.24 8.24Zm4.52-6.167c-.247-.124-1.463-.723-1.692-.808-.228-.08-.394-.123-.556.124-.166.246-.641.808-.784.969-.143.166-.29.185-.537.062-.247-.125-1.045-.385-1.99-1.23-.738-.657-1.232-1.47-1.38-1.716-.142-.247-.013-.38.11-.504.11-.11.247-.29.37-.432.126-.143.167-.248.248-.413.082-.167.043-.31-.018-.433-.063-.124-.557-1.345-.765-1.838-.2-.486-.404-.419-.557-.425-.142-.009-.309-.009-.475-.009a.911.911 0 0 0-.661.31c-.228.247-.864.845-.864 2.067 0 1.22.888 2.395 1.013 2.56.122.167 1.742 2.666 4.229 3.74.587.257 1.05.408 1.41.523.595.19 1.13.162 1.558.1.475-.072 1.464-.6 1.673-1.178.205-.58.205-1.075.142-1.18-.061-.104-.227-.165-.475-.29Z"></path>
                                                    </svg>
                                                </button>
                                                <button class="card4">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" height="24" class="gmail" width="24">
                                                        <path d="M6 12C6 15.3137 8.68629 18 12 18C14.6124 18 16.8349 16.3304 17.6586 14H12V10H21.8047V14H21.8C20.8734 18.5645 16.8379 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C15.445 2 18.4831 3.742 20.2815 6.39318L17.0039 8.68815C15.9296 7.06812 14.0895 6 12 6C8.68629 6 6 8.68629 6 12Z"></path>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="panels-container">
                            <div class="panel left-panel">
                                <div class="content">
                                    <h3>New to our establishment?</h3>
                                    <p>Experience the unique offerings of our venue by creating an account.</p>
                                    <button class="btn transparent" id="sign-up-btn">Sign Up</button>
                                </div>
                                <img src="./img/log.svg" class="image" alt="">
                            </div>
                            <div class="panel right-panel">
                                <div class="content">
                                    <h3>Already a patron?</h3>
                                    <p>Access your account to continue enjoying our exceptional services.</p>
                                    <button class="btn transparent" id="sign-in-btn">Sign In</button>
                                </div>
                                <img src="./img/register.svg" class="image" alt="">
                            </div>
                        </div>
                    </div>
        </div>
    </div>

    <!-- Your scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        // Function to open modal
        function openModal() {
            var modal = document.getElementById("myModal");
            modal.style.display = "block";
            setTimeout(function() {
                modal.querySelector('.modal-content').classList.add('show');
            }, 50); // Delay the animation to allow the modal to appear before starting the transition
        }

        // Function to close modal and redirect to previous page or default page
        function closeModalAndRedirect() {
            var modal = document.getElementById("myModal");
            modal.querySelector('.modal-content').classList.remove('show');
            setTimeout(function() {
                modal.style.display = "none";
                // Redirect to previous page or default page
                var previousPage = decodeURIComponent(window.location.search.split('page=')[1]);
                if (previousPage) {
                    window.location.href = previousPage;
                } else {
                    // Redirect to default page if previous page is not defined
                    window.location.href = 'index.php';
                }
            }, 500); // Slow transition effect, wait for 0.5 seconds before hiding the modal
        }

        // Call openModal function when the page loads
        window.onload = function() {
            openModal();
        }

        // Rest of your code
        document.addEventListener('DOMContentLoaded', function() {
            // Get the modal
            var modal = document.getElementById("myModal");

            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];

            // When the user clicks on <span> (x), close the modal with animation
            span.onclick = function() {
                closeModalAndRedirect();
            }

            // When the user clicks anywhere outside of the modal, close it with animation
            window.onclick = function(event) {
                if (event.target == modal) {
                    closeModalAndRedirect();
                }
            }

            const sign_in_btn = document.querySelector("#sign-in-btn");
            const sign_up_btn = document.querySelector("#sign-up-btn");
            const container = document.querySelector(".container");

            sign_up_btn.addEventListener('click', () => {
                container.classList.add("sign-up-mode");
            });

            sign_in_btn.addEventListener('click', () => {
                container.classList.remove("sign-up-mode");
            });

            // Check if modal should be opened
            var loginParam = window.location.href.split('?')[1];
            if (loginParam === 'login=true') {
                openModal();
            }
        });
    </script>


</body>

</html>