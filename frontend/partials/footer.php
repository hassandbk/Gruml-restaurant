<!--
        - #RESERVATION
      -->

<section class="reservation">
    <div class="container">

        <div class="form reservation-form bg-black-10">

            <form action="../frontend/submit_reservation.php" method="post" class="form-left">


                <h2 class="headline-1 text-center">Online Reservation</h2>

                <p class="form-text text-center">
                    For booking requests, call <a href="tel:+256123456789" class="link">+256 123 456 789</a> or fill out our order form.
                </p>

                <div class="input-wrapper">
                    <input type="text" name="name" placeholder="Your Name" autocomplete="off" class="input-field" required>

                    <input type="tel" name="phone" placeholder="Phone Number" autocomplete="off" class="input-field" required>
                </div>

                <div class="input-wrapper">

                    <div class="icon-wrapper">
                        <ion-icon name="person-outline" aria-hidden="true"></ion-icon>

                        <select name="person" class="input-field" required>
                            <option value="1-person">1 Person</option>
                            <option value="2-person">2 Person</option>
                            <option value="3-person">3 Person</option>
                            <option value="4-person">4 Person</option>
                            <option value="5-person">5 Person</option>
                            <option value="6-person">6 Person</option>
                            <option value="7-person">7 Person</option>
                        </select>

                        <ion-icon name="chevron-down" aria-hidden="true"></ion-icon>
                    </div>

                    <div class="icon-wrapper">
                        <ion-icon name="calendar-clear-outline" aria-hidden="true"></ion-icon>

                        <input type="date" name="reservation-date" class="input-field" required>

                        <ion-icon name="chevron-down" aria-hidden="true"></ion-icon>
                    </div>

                    <div class="icon-wrapper">
                        <ion-icon name="time-outline" aria-hidden="true"></ion-icon>

                        <select name="reservation-time" class="input-field" required>
                            <option value="08:00am">08 : 00 am</option>
                            <option value="09:00am">09 : 00 am</option>
                            <option value="10:00am">10 : 00 am</option>
                            <option value="11:00am">11 : 00 am</option>
                            <option value="12:00am">12 : 00 am</option>
                            <option value="01:00pm">01 : 00 pm</option>
                            <option value="02:00pm">02 : 00 pm</option>
                            <option value="03:00pm">03 : 00 pm</option>
                            <option value="04:00pm">04 : 00 pm</option>
                            <option value="05:00pm">05 : 00 pm</option>
                            <option value="06:00pm">06 : 00 pm</option>
                            <option value="07:00pm">07 : 00 pm</option>
                            <option value="08:00pm">08 : 00 pm</option>
                            <option value="09:00pm">09 : 00 pm</option>
                            <option value="10:00pm">10 : 00 pm</option>
                        </select>

                        <ion-icon name="chevron-down" aria-hidden="true"></ion-icon>
                    </div>

                </div>

                <textarea name="message" placeholder="Message" autocomplete="off" class="input-field"></textarea>

                <div class="input-wrapper">
                    <select name="seating-preference" class="input-field" required>
                        <option value="Indoor">Indoor</option>
                        <option value="Outdoor">Outdoor</option>
                        <option value="Near Window">Near Window</option>
                        <option value="Near Bar">Near Bar</option>
                        <option value="Near Fireplace">Near Fireplace</option>
                        <option value="Booth">Booth</option>
                        <option value="Patio">Patio</option>
                        <option value="High Top">High Top</option>
                        <option value="Private Room">Private Room</option>
                        <!-- Add more options as needed -->
                    </select>

                    <select name="reservation-type" class="input-field" required>
                        <option value="Lunch">Lunch</option>
                        <option value="Dinner">Dinner</option>
                        <option value="Special Event">Special Event</option>
                        <option value="Brunch">Brunch</option>
                        <option value="Happy Hour">Happy Hour</option>
                        <option value="Business Meeting">Business Meeting</option>
                        <!-- Add more options as needed -->
                    </select>


                </div>

                <!-- Additional Notes -->
                <textarea name="additional-notes" placeholder="Additional Notes" autocomplete="off" class="input-field"></textarea>

                <!-- Pre-order Information -->
                <textarea name="pre-order-info" placeholder="Pre-order Information" autocomplete="off" class="input-field"></textarea>

                <div class="checkbox-wrapper">
                    <input type="checkbox" id="confirmChkB" name="checkbox" class="checkbox-input" required>
                    <label for="confirmChkB">I confirm acceptance of terms and conditions.</label>
                </div>
                <button type="submit" class="btn btn-secondary" id="confirm-check" disabled>
                    <span class="text text-1">Reserve</span>
                    <span class="text text-2" aria-hidden="true">Reserve</span>
                </button>

            </form>





            <div class="form-right text-center" style="background-image: url('./assets/images/form-pattern.png')">

                <h2 class="headline-1 text-center">Contact Us</h2>

                <p class="contact-label">Booking Request</p>

                <a href="tel:+256123456789" class="body-1 contact-number hover-underline">+256 123 456 789</a>


                <div class="separator"></div>

                <p class="contact-label">Location</p>

                <address class="body-4">
                    Balintuma Road, Mengo, <br>
                    Next to Ndejje University, Uganda
                </address>

                <p class="contact-label">Lunch Time</p>

                <p class="body-4">
                    Monday to Sunday <br>
                    11.00 am - 2.30pm
                </p>

                <p class="contact-label">Dinner Time</p>

                <p class="body-4">
                    Monday to Sunday <br>
                    05.00 pm - 10.00pm
                </p>

            </div>

        </div>

    </div>
</section>
<!--
        - #FEATURES
      -->

<section class="section features text-center" aria-label="features">
    <div class="container">

        <p class="section-subtitle label-2">Why Choose Us</p>

        <h2 class="headline-1 section-title">Our Strength</h2>

        <ul class="grid-list">

            <li class="feature-item">
                <div class="feature-card">

                    <div class="card-icon">
                        <img src="./assets/images/features-icon-1.png" width="100" height="80" loading="lazy" alt="icon">
                    </div>

                    <h3 class="title-2 card-title">Hygienic Food</h3>
                    <p class="label-1 card-text">Experience our commitment to cleanliness and freshness.</p>


                </div>
            </li>

            <li class="feature-item">
                <div class="feature-card">

                    <div class="card-icon">
                        <img src="./assets/images/features-icon-2.png" width="100" height="80" loading="lazy" alt="icon">
                    </div>

                    <h3 class="title-2 card-title">Fresh Environment</h3>
                    <p class="label-1 card-text">Immerse yourself in a rejuvenating atmosphere where every moment is a breath of fresh air.</p>


                </div>
            </li>

            <li class="feature-item">
                <div class="feature-card">

                    <div class="card-icon">
                        <img src="./assets/images/features-icon-3.png" width="100" height="80" loading="lazy" alt="icon">
                    </div>

                    <h3 class="title-2 card-title">Skilled Chefs</h3>
                    <p class="label-1 card-text">Experience culinary mastery with our team of talented chefs.</p>


                </div>
            </li>

            <li class="feature-item">
                <div class="feature-card">

                    <div class="card-icon">
                        <img src="./assets/images/features-icon-4.png" width="100" height="80" loading="lazy" alt="icon">
                    </div>

                    <h3 class="title-2 card-title">Event & Party</h3>
                    <p class="label-1 card-text">Host memorable events and unforgettable parties with us.</p>


                </div>
            </li>

        </ul>

        <img src="./assets/images/shape-7.png" width="208" height="178" loading="lazy" alt="shape" class="shape shape-1">

        <img src="./assets/images/shape-8.png" width="120" height="115" loading="lazy" alt="shape" class="shape shape-2">

    </div>
</section>
<!--
        - #EVENT
      -->

<section class="section event bg-black-10" aria-label="event">
    <div class="container">

        <h1 class="section-subtitle label-2 text-center">Recent Updates</h1>

        <!-- <h2 class="headline-1 section-title">Upcoming Event</h2> -->

        <ul class="grid-list">

            <li>
                <div class="event-card has-before hover:shine">

                    <div class="card-banner img-holder" style="--width: 350; --height: 450;">
                        <img src="./assets/images/event-1.jpg" width="350" height="450" loading="lazy" alt="Flavour so good you’ll try to eat with your eyes." class="img-cover">

                        <time class="publish-date label-2" datetime="2023-09-15">15/09/2023</time>
                    </div>

                    <div class="card-content">
                        <p class="card-subtitle label-2 text-center">Food, Flavour</p>

                        <h3 class="card-title title-2 text-center">
                            Flavour so good you’ll try to eat with your eyes.
                        </h3>
                    </div>

                </div>
            </li>

            <li>
                <div class="event-card has-before hover:shine">

                    <div class="card-banner img-holder" style="--width: 350; --height: 450;">
                        <img src="./assets/images/event-2.jpg" width="350" height="450" loading="lazy" alt="Flavour so good you’ll try to eat with your eyes." class="img-cover">

                        <time class="publish-date label-2" datetime="2023-09-08">08/09/2023</time>
                    </div>

                    <div class="card-content">
                        <p class="card-subtitle label-2 text-center">Healthy Food</p>

                        <h3 class="card-title title-2 text-center">
                            Flavour so good you’ll try to eat with your eyes.
                        </h3>
                    </div>

                </div>
            </li>

            <li>
                <div class="event-card has-before hover:shine">

                    <div class="card-banner img-holder" style="--width: 350; --height: 450;">
                        <img src="./assets/images/event-3.jpg" width="350" height="450" loading="lazy" alt="Flavour so good you’ll try to eat with your eyes." class="img-cover">

                        <time class="publish-date label-2" datetime="2023-09-03">03/09/2023</time>
                    </div>

                    <div class="card-content">
                        <p class="card-subtitle label-2 text-center">Recipie</p>

                        <h3 class="card-title title-2 text-center">
                            Flavour so good you’ll try to eat with your eyes.
                        </h3>
                    </div>

                </div>
            </li>

        </ul>

        <a href="testimonial.php" class="btn btn-primary">
            <span class="text text-1">View Our Blog</span>

            <span class="text text-2" aria-hidden="true">View Our Blog</span>
        </a>

    </div>
</section>

</article>
</main>

<!--
    - #FOOTER
  -->

<footer class="footer section has-bg-image text-center" style="background-image: url('./assets/images/footer-bg.jpg')">
    <div class="container">

        <div class="footer-top grid-list">

            <div class="footer-brand has-before has-after">

                <a href="#" class="logo">
                    <img src="./assets/images/logo.png" width="160" height="50" loading="lazy" alt="GrimL home">
                </a>

                <address class="body-4">
                    Balintuma Road, Mengo, Next to Ndejje University, Uganda
                </address>


                <a href="mailto:booking@griml.com" class="body-4 contact-link">booking@griml.com</a>

                <a href="tel:+256123456789" class="body-4 contact-link">Booking Inquiry: +256 123 456 789</a>


                <p class="body-4">
                    Open : 09:00 am - 01:00 pm
                </p>

                <div class="wrapper">
                    <div class="separator"></div>
                    <div class="separator"></div>
                    <div class="separator"></div>
                </div>

                <p class="title-1">Get News & Offers</p>

                <p class="label-1">
                    Subscribe us & Get <span class="span">25% Off.</span>
                </p>

                <form action="" class="input-wrapper">
                    <div class="icon-wrapper">
                        <ion-icon name="mail-outline" aria-hidden="true"></ion-icon>

                        <input type="email" name="email_address" placeholder="Your email" autocomplete="off" class="input-field">
                    </div>

                    <button type="submit" class="btn btn-secondary">
                        <span class="text text-1">Subscribe</span>

                        <span class="text text-2" aria-hidden="true">Subscribe</span>
                    </button>
                </form>

            </div>

            <ul class="footer-list">

                <li>
                    <a href="#" class="label-2 footer-link hover-underline">Home</a>
                </li>

                <li>
                    <a href="#" class="label-2 footer-link hover-underline">Menus</a>
                </li>

                <li>
                    <a href="#" class="label-2 footer-link hover-underline">About Us</a>
                </li>

                <li>
                    <a href="#" class="label-2 footer-link hover-underline">Our Chefs</a>
                </li>

                <li>
                    <a href="contact.php" class="label-2 footer-link hover-underline">Contact</a>
                </li>

            </ul>

            <ul class="footer-list">

                <li>
                    <a href="#" class="label-2 footer-link hover-underline">Facebook</a>
                </li>

                <li>
                    <a href="#" class="label-2 footer-link hover-underline">Instagram</a>
                </li>

                <li>
                    <a href="#" class="label-2 footer-link hover-underline">Twitter</a>
                </li>

                <li>
                    <a href="#" class="label-2 footer-link hover-underline">Youtube</a>
                </li>

                <li>
                    <a href="#" class="label-2 footer-link hover-underline">Google Map</a>
                </li>

            </ul>

        </div>

        <div class="footer-bottom">

            <p class="copyright">
                &copy; 2023 griml. All Rights Reserved | Crafted by <a href="" target="_blank" class="link">griml Restuarant</a>
            </p>

        </div>

    </div>
</footer>
<script>
    // Function to check if all required fields are filled
    function checkFields() {
        const requiredFields = document.querySelectorAll('.input-field[required]');
        let allFilled = true;
        requiredFields.forEach(field => {
            if (!field.value.trim()) {
                allFilled = false;
            }
        });
        return allFilled;
    }

    // Function to enable/disable reserve button based on checkbox and required fields
    function toggleButton() {
        const reserveButton = document.getElementById('confirm-check');
        const checkBox = document.getElementById('confirmChkB');

        reserveButton.disabled = !checkBox.checked || !checkFields();
    }

    // Event listener for checkbox
    document.getElementById('confirmChkB').addEventListener('change', toggleButton);

    // Event listener for input fields
    document.querySelectorAll('.input-field').forEach(field => {
        field.addEventListener('input', toggleButton);
    });
</script>