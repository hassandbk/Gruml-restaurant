<?php include('partials/header.php'); ?>

<main>
  <article>

    <!--
        - #SPECIAL DISH
      -->
    <section class="section testi text-center has-bg-image" style="background-image: url('./assets/images/hero-slider-2.jpg')" aria-label="testimonials">
      <div class="container-xxl py-5">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">

            </div>

            <div class="col-lg-9 table-responsive">
              <table class="table" id="cart_table" style="color:beige">
                <thead class="text-center">
                  <tr>
                    <th scope="col">S.N.</th>
                    <th scope="col">Item Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Sub Total</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody class="text-center">
                  <?php

                  $item_price = 0;
                  $total_amount = 0;

                  if (isset($_SESSION['cart'])) {

                    foreach ($_SESSION['cart'] as $key => $value) {
                      $item_price = $value['Price'] * $value['Quantity'];
                      $total_amount = $total_amount + $item_price;



                      $sn = $key + 1;


                      echo "

            <tr>
                <td>$sn</td>
                <td>$value[Item_Name]</td>
                <td>$value[Price]<input type='hidden' class='iprice' value='$value[Price]'></td>
                <td>

                    <form action='manage-cart.php' method='POST'>
                    <input class='text-center iquantity quantityInput' name='Mod_Quantity' onchange='this.form.submit();' type='number' value='$value[Quantity]' min = '1' max = '20'>
                    <input type='hidden' name='Item_Name' value='$value[Item_Name]'>
                    </form>
                </td>
                <td class='itotal'></td>
                <td>
                    <form action='manage-cart.php' method='POST'>
                <button name='Remove_Item' class='btn btn-danger btn-sm'>REMOVE</button>
                    <input type='hidden' name='Item_Name' value='$value[Item_Name]'>
                    </form>
                </td>
        </tr>

                ";
                    }
                  }

                  ?>

                </tbody>
              </table>
            </div>




            <div class="col-lg-3">
              <div class="border rounded">
                <h4 class="text-center">Total</h4>
                <h2 class="text-center" id="gtotal"></h2>


                <br>

                <?php
                if (isset($_SESSION['user'])) {
                  $username = $_SESSION['user'];

                  $fetch_user = "SELECT * FROM tbl_users WHERE username = '$username'";
                  $res_fetch_user = mysqli_query($conn, $fetch_user);
                  while ($rows = mysqli_fetch_assoc($res_fetch_user)) {
                    $username = $rows['username'];
                    $cus_name = $rows['name'];
                    $cus_email = $rows['email'];
                    $cus_add1 = $rows['add1'];
                    $cus_city = $rows['city'];
                    $cus_phone = $rows['phone'];
                  }

                  if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {


                ?>

                    <?php
                    error_reporting(0);
                    date_default_timezone_set('Africa/Nairobi');

                    function rand_string($length)
                    {
                      $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
                      $size = strlen($chars);
                      $str = ""; // Initialize the variable
                      for ($i = 0; $i < $length; $i++) {
                        $str .= $chars[rand(0, $size - 1)];
                      }
                      return $str;
                    }

                    $cur_random_value = rand_string(10);
                    ?>



                    <form action="purchase.php" method="POST">
                      <div class="form-group">
                        <input type="hidden" name="amount" value="<?php echo $total_amount; ?>" class="form-control">
                      </div>
                      <div class="form-group">
                        <input type="hidden" name="tran_id" value="ONL-PAY-<?php echo "$cur_random_value"; ?>" class="form-control">
                      </div>
                      <div class="form-group">
                        <h4 class="text-center">Delivery Address</h4>
                      </div>
                      <div class="form-group">
                        <label><?php echo $cus_name; ?></label>
                        <input type="hidden" name="cus_name" value="<?php echo $cus_name; ?>" class="form-control" required>
                      </div>
                      <div class="form-group">
                        <label><?php echo $cus_email; ?></label>
                        <input type="hidden" name="cus_email" value="<?php echo $cus_email; ?>" class="form-control" required>
                      </div>
                      <div class="form-group">
                        <label><?php echo $cus_add1; ?></label>
                        <input type="hidden" name="cus_add1" value="<?php echo $cus_add1; ?>" class="form-control" required>
                      </div>
                      <div class="form-group">
                        <label><?php echo $cus_city; ?></label>
                        <input type="hidden" name="cus_city" value="<?php echo $cus_city; ?>" class="form-control" required>
                      </div>
                      <div class="form-group">
                        <label><?php echo $cus_phone ?></label>
                        <input type="hidden" name="cus_phone" value="<?php echo $cus_phone; ?>" class="form-control" min='1' required>
                      </div>
                      <div class="form-group">

                        <input type="hidden" name="payment_status" value="pending" class="form-control">
                      </div>
                      <div class="form-group">

                        <input type="hidden" name="username" value="<?php echo $username; ?>" class="form-control">
                      </div>

                      <br>

                      <a href="edit-profile.php" class="btn-primary btn-secondary"> Change Shipping Address</a>
                      <br>
                      <br>

                      <div class="checkbox-wrapper">
                        <input class="checkbox-input" type="radio" name="pay_mode" value="amrpay" id="flexRadioDefault1" required>
                        <label for="flexRadioDefault1">
                          Confirm Details to proceed
                        </label>
                      </div>

                      <br>

                      <!-- Creating Session Variables --->
                      <?php

                      $_SESSION['amount'] = $total_amount;
                      ?>

                      <!-- Creating Session Variables --->



                      <div class="d-flex justify-content-center">
                        <button class="btn btn-primary btn-lg" name="purchase">Checkout</button>
                      </div>

                    </form>
                  <?php



                  }
                } else {
                  echo "Please login to place order";
                  ?>
                  <a href="login.php">Login</a>
                <?php


                }
                ?>


              </div>
            </div>
          </div>
        </div>
      </div>
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
    <script>
      var gt = 0;
      var iprice = document.getElementsByClassName('iprice');
      var iquantity = document.getElementsByClassName('iquantity');
      var itotal = document.getElementsByClassName('itotal');
      var igtotal = document.getElementById('gtotal');

      function subTotal() {
        gt = 0;
        for (i = 0; i < iprice.length; i++) {
          itotal[i].innerText = (iprice[i].value) * (iquantity[i].value);

          gt = gt + (iprice[i].value) * (iquantity[i].value);
        }
        gtotal.innerText = gt;
      }

      subTotal();
    </script>
    <!--
    - ionicon link
  -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <!-- Sweet Alert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </body>

    </html>