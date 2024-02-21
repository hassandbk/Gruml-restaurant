<?php include('partials/header.php'); ?>

<main>
  <article>

    <!--
        - #SPECIAL DISH
      -->
    <section class="section testi text-center has-bg-image" style="background-image: url('./assets/images/Restaurant-Menu-Card.jpg')" aria-label="testimonials">

      <div class="container-xxl py-5">
        <div class="container">
          <div class="row g-2 align-items-center">
            <div class="col-lg-6">
              <div class="row g-3">
                <div class="col-6 text-start">
                  <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.1s" src="../images/menus/menu1.jpg">

                </div>
                <div class="col-6 text-start">
                  <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.3s" src="../images/menus/menu2.jpg" style="margin-top: 25%;">
                </div>
                <div class="col-6 text-end">
                  <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.5s" src="../images/menus/menu3.jpg">
                </div>
                <div class="col-6 text-end">
                  <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.7s" src="../images/menus/menu4.jpg">
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="container text-center my-3 pt-1 pb-1">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Enjoy Our<br>Delicious Meal</h1>

              </div>

              <div class="row g-4 mb-4">
                <div class="col-sm-6">
                  <div class="d-flex align-items-center border-start border-5 border-primary px-3">
                    <h1 class="flex-shrink-0 display-5 text-primary mb-0" data-toggle="counter-up">32</h1>
                    <div class="ps-4">
                      <p class="mb-0">Todays specials</p>
                      <h3 class="text-uppercase mb-0">Menus</h3>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="d-flex align-items-center border-start border-5 border-primary px-3">
                    <h1 class="flex-shrink-0 display-5 text-primary mb-0" data-toggle="counter-up">10</h1>
                    <div class="ps-4">
                      <p class="mb-0">Popular</p>
                      <h6 class="text-uppercase mb-0">Categories</h6>
                    </div>
                  </div>
                </div>
              </div>
              <a href="<?php echo SITEURL; ?>special-dishes.php" class="btn btn-primary py-sm-3 px-sm-5 me-3 animated slideInLeft" style="display: inline-block">Discover Specials</a>
              <a href="<?php echo SITEURL; ?>categories.php" class="btn btn-primary py-sm-3 px-sm-5 me-3 animated slideInLeft" style="display: inline-block">Browse Categories</a>
              <div class="hero-header">

                <img class="img-fluid" src="./assets/images/menu.png" alt="" style="display: inline-block">

              </div>


            </div>
          </div>
        </div>
      </div>

    </section>





    <!--
        - #MENU
      -->

    <section class="section menu" aria-label="menu-label" id="menu">
      <!-- Menu Start -->

      <div class="container">
        <div class="row">


          <?php
          $sql = "SELECT * FROM tbl_food WHERE active='Yes'";
          $res = mysqli_query($conn, $sql);
          $count = mysqli_num_rows($res);

          if ($count > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
              //Get the Values
              $id = $row['id'];
              $title = $row['title'];
              $price = $row['price'];
              $image_name = $row['image_name'];


          ?>
              <div class="col-lg-3">
                <div class="card">
                  <img src="<?php echo SITEURL; ?>../images/food/<?php echo $image_name; ?>" class="card-img-top" alt="...">
                  <div class="card-body text-center">
                    <form action="manage-cart.php" method="POST">
                      <h5 class="card-title"><?php echo $title; ?></h5>
                      <p class="card-text"><?php echo $price; ?></p>
                      <button type="submit" name="Add_To_Cart" class="btn btn-primary btn-sm">Add To Cart</button>
                      <input type="hidden" name="Item_Name" value="<?php echo $title; ?>">
                      <input type="hidden" name="Price" value="<?php echo $price; ?>">
                      <input type="hidden" name="Id" value="<?php echo $id; ?>">
                    </form>
                  </div>
                </div>
              </div>

          <?php

            }
          } else {
            //Categories are not available
            echo "Categories not found";
          }



          ?>



        </div>
      </div>

      <!--Menu Ends -->

    </section>

    <!--
    Menu List
    -->
    <?php include('partials/menuList.php'); ?>






    <!--
        - #TESTIMONIALS
      -->

    <section class="section testi text-center has-bg-image" style="background-image: url('./assets/images/testimonial-bg.jpg')" aria-label="testimonials">
      <div class="container">

        <!-- Testimonial Start -->
        <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
          <div class="container">
            <div class="text-center">

              <h2 class="section-subtitle text-center ">Testimonial</h2>
              <h1 class="mb-5">Our Clients Say!!!</h1>
            </div>
            <div class="owl-carousel testimonial-carousel">
              <div class="testimonial-item bg-transparent border rounded p-4">
                <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                <p>First of all, I love their interior design.Their services was so nice & amazing .And also i like
                  their food so much</p>
                <div class="d-flex align-items-center">
                  <img class="img-fluid flex-shrink-0 rounded-circle" src="../images/avatar1.jpeg" style="width: 50px; height: 50px;">
                  <div class="ps-3">
                    <h5 class="mb-1">Rasel Hossain</h5>
                    <small>Student</small>
                  </div>
                </div>
              </div>
              <div class="testimonial-item bg-transparent border rounded p-4">
                <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                <p>I was quite amazed by their unique concept. Hats off to Robo cafe and their whole team.</p>
                <div class="d-flex align-items-center">
                  <img class="img-fluid flex-shrink-0 rounded-circle" src="../images/avatar1.jpeg" style="width: 50px; height: 50px;">
                  <div class="ps-3">
                    <h5 class="mb-1">Ashraf Alam</h5>
                    <small>Businessman</small>
                  </div>
                </div>
              </div>
              <div class="testimonial-item bg-transparent border rounded p-4">
                <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                <p>Nice environment also provide healthy and tasty food.Like it very much</p>
                <div class="d-flex align-items-center">
                  <img class="img-fluid flex-shrink-0 rounded-circle" src="../images/avatar1.jpeg" style="width: 50px; height: 50px;">
                  <div class="ps-3">
                    <h5 class="mb-1">Sumon Mollah</h5>
                    <small>Teacher</small>
                  </div>
                </div>
              </div>
              <div class="testimonial-item bg-transparent border rounded p-4">
                <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                <p>WOW!! Exceptional concept of Robo Cafe.Food quality is good, keep it up.</p>
                <div class="d-flex align-items-center">
                  <img class="img-fluid flex-shrink-0 rounded-circle" src="../images/avatar1.jpeg" style="width: 50px; height: 50px;">
                  <div class="ps-3">
                    <h5 class="mb-1">Labony Haque</h5>
                    <small>Student</small>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Testimonial End -->

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
    <!-- Sweet Alert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </body>

    </html>