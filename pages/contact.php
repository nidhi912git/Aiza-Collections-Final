<?php
$page_id = "contact-page";
include "../includes/config.php";
include "../includes/header.php";
?>

<!-- CONTACT HERO -->
<section class="contact-hero">
  <div class="contact-hero-content">
    <h1>Let’s Talk Fashion</h1>
    <p>Questions, custom orders, or store visits — we’re here for you.</p>
  </div>
</section>

<!-- CONTACT INFO -->
<section class="contact-info-section">
  <h2 class="section-title">Contact Information</h2>

  <div class="contact-cards">

    <div class="contact-card">
      <img src="/aiza-collections-final/assets/icons/phone.png" class="contact-icon" alt="">
      <h3>Phone</h3>
      <p>
        +91 86182 60912<br>
        +91 63618 47110
      </p>
    </div>

    <div class="contact-card">
      <img src="/aiza-collections-final/assets/icons/location.png" class="contact-icon" alt="">
      <h3>Visit Us</h3>
      <p>
        298, Veera Pillai Street,<br>
        Near Commercial Street,<br>
        Tasker Town, Shivaji Nagar,<br>
        Bengaluru – 560001
      </p>
    </div>

    <div class="contact-card">
      <img src="/aiza-collections-final/assets/icons/email.png" class="contact-icon" alt="">
      <h3>Email</h3>
      <p>aizacollections14@gmail.com</p>
    </div>

    <div class="contact-card">
      <img src="/aiza-collections-final/assets/icons/clock.png" class="contact-icon" alt="">
      <h3>Working Hours</h3>
      <p>
        Mon – Sun<br>
        11:00 AM – 10:00 PM
      </p>
    </div>

  </div>
</section>

<!-- VISIT STORE -->
<section class="visit-store">
  <img src="/aiza-collections-final/assets/store-front.jpg" alt="Aiza Collections Store">

  <div class="visit-text">
    <h2>Visit Our Store</h2>
    <p>Experience our collections in person and find your perfect fit.</p>
    <p> Come visit us in-person to have the best shopping experience and get your best fits. we are located in Veera Pillai Street, near the famous Commercial Street of Bengaluru</p>
    <p> Find the link to the google maps below to ease locating us</p>
    <a href="https://maps.google.com/?q=298, Veera Pillai Street" class="btn map-btn" target="_blank">
      Open in Google Maps
     </a>
  </div>
</section>

<!-- FAQ -->
<section class="contact-faq">
  <h2 class="section-title">Frequently Asked Questions</h2>

  <div class="faq-grid">

    <div class="faq-card">
      <div class="faq-front">
        Do you offer custom tailoring?
      </div>
      <div class="faq-back">
        Yes, we provide custom tailoring for all products.
        Please contact us for measurements and details.
      </div>
    </div>

    <div class="faq-card">
      <div class="faq-front">
        What is your return policy?
      </div>
      <div class="faq-back">
        Returns are accepted within 7 days for unused items
        with original tags.
      </div>
    </div>

    <div class="faq-card">
      <div class="faq-front">
        Do you ship internationally?
      </div>
      <div class="faq-back">
        Currently, we ship only within India.
        International shipping is coming soon.
      </div>
    </div>

    <div class="faq-card">
      <div class="faq-front">
        How long does delivery take?
      </div>
      <div class="faq-back">
        Delivery usually takes 5–7 business days
        depending on location.
      </div>
    </div>

  </div>
</section>

<hr>

<!-- CONTACT FORM -->
<section class="contact-form-section">
  <h2 class="section-title">Get in Touch</h2>

  <form class="contact-form"
        onsubmit="showPopup('Thank you for the message'); this.reset(); return false;">

    <div class="form-row">
      <input type="text" placeholder="First Name" required>
      <input type="text" placeholder="Last Name" required>
    </div>

    <div class="form-row">
      <input type="email" placeholder="Email" required>
      <input type="tel"
             placeholder="Phone (10 digits)"
             required
             inputmode="numeric"
             pattern="[0-9]{10}"
             minlength="10"
             maxlength="10"
             title="Please enter a 10-digit phone number">
    </div>

    <input type="text" placeholder="Subject" required>
    <textarea rows="5" placeholder="Your Message" required></textarea>

    <button type="submit">Send Message</button>
  </form>
</section>

<?php include "../includes/footer.php"; ?>