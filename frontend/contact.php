<?php include('partials/header.php'); ?>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['submit_message'])) {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $message_status = 'unread';
    $date = date("Y-m-d h:i:sa");

    $send_message = "INSERT INTO `message`(`name`, `phone`, `subject`, `message`, `message_status`, `date`) VALUES ('$name','$phone','$subject','$message','$message_status','$date')";
    $res_send_message = mysqli_query($conn, $send_message);

    if ($res_send_message == true) {
      echo '<script>alert("Message sent successfully!"); window.location.href = window.location.href;</script>';
    } else {
      echo '<script>alert("Message sending failed!"); window.location.href = window.location.href;</script>';
    }
  }
}
?>
<section class="section testi text-center has-bg-image" style="background-image: url('./assets/images/testimonial-bg.jpg')" aria-label="testimonials">
  <!-- Contact Start -->
  <div class="container-xxl py-5">
    <div class="container">
      <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
        <h1 class="section-title ff-secondary text-center text-primary fw-normal">Contact Us</h1>
        <h3 class="mb-5">Contact For Any Query</h3>
      </div>
      <p class="form-text text-center">
        For inquiries, call <a href="tel:+256123456789" class="link">+256 123 456 789</a> or fill out our order form.
      </p>

      <div class="row g-4">

        <div class="col-md-6 wow fadeIn" data-wow-delay="0.1s">

          <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d1080.8500810535368!2d32.55579231600393!3d0.3098785740643393!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e1!3m2!1sen!2sug!4v1707478044288!5m2!1sen!2sug" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="col-md-6">
          <div class="wow fadeInUp" data-wow-delay="0.2s">
            <form action="" method="POST" class="form-left">



              <div class="row">
                <div class="col-md-6">
                  <input type="text" name="name" id="name" placeholder="Your Name" autocomplete="off" class="input-field form-control" required>
                </div>
                <div class="col-md-6">
                  <input type="tel" name="phone" id="email" placeholder="Phone Number" autocomplete="off" class="input-field form-control" required>
                </div>
              </div>

              <label for="subject">Subject</label>
              <input type="text" id="subject" name="subject" placeholder="Subject" class="input-field form-control" required>

              <textarea id="message" name="message" placeholder="Leave a message here" autocomplete="off" class="input-field form-control" required></textarea>

              <button type="submit" class="btn btn-secondary" name="submit_message">
                <span class="text text-1">Submit Enquiry</span>
                <span class="text text-2" aria-hidden="true">Submit Enquiry</span>
              </button>

            </form>



          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Contact End -->

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

</body>

</html>