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
    <p>Come visit us in-person to have the best shopping experience and get your best fits. We are located in Veera Pillai Street, near the famous Commercial Street of Bengaluru.</p>
    <p>Find the Google Maps link below to easily locate us.</p>

    <a href="https://maps.app.goo.gl/4hTgSLNoQsnjKgsT6" target="_blank" class="btn map-btn">
      Open in Google Maps
    </a>
  </div>
</section>

<!-- FAQ -->
<section class="contact-faq">
  <h2 class="section-title">Frequently Asked Questions</h2>

  <div class="faq-grid">

    <div class="faq-card">
      <div class="faq-front">Do you offer custom tailoring?</div>
      <div class="faq-back">
        Yes, we provide custom tailoring for all products.
        Please contact us for measurements and details.
      </div>
    </div>

    <div class="faq-card">
      <div class="faq-front">What is your return policy?</div>
      <div class="faq-back">
        Returns are accepted within 7 days for unused items
        with original tags.
      </div>
    </div>

    <div class="faq-card">
      <div class="faq-front">Do you ship internationally?</div>
      <div class="faq-back">
        Currently, we ship only within India.
        International shipping is coming soon.
      </div>
    </div>

    <div class="faq-card">
      <div class="faq-front">How long does delivery take?</div>
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

  <div id="form-success-message" style="display: none; background-color: #d4edda; color: #155724; padding: 15px; margin-bottom: 20px; border: 1px solid #c3e6cb; border-radius: 5px; text-align: center; font-weight: 500;">
    Thank you for the message
  </div>

  <form class="contact-form" onsubmit="event.preventDefault(); return handleFormSubmit(this)">

    <!-- NAME -->
    <div class="form-row">
      <input type="text"
        placeholder="First Name"
        pattern="[A-Za-z]{2,}"
        title="Minimum 2 letters"
        required>

      <input type="text"
        placeholder="Last Name"
        pattern="[A-Za-z]{2,}"
        title="Minimum 2 letters"
        required>
    </div>

    <!-- EMAIL + PHONE -->
    <div class="form-row">
      <input type="email"
        placeholder="Email"
        pattern="^[^@\s]+@[^@\s]+\.[^@\s]+$"
        required>

      <input type="tel"
        placeholder="Phone (10 digits)"
        pattern="[6-9][0-9]{9}"
        maxlength="10"
        required>
    </div>

    <!-- SUBJECT -->
    <input type="text"
      placeholder="Subject"
      minlength="5"
      maxlength="100"
      required>

    <!-- MESSAGE -->
    <textarea rows="5"
      placeholder="Your Message"
      minlength="10"
      maxlength="500"
      required></textarea>

    <button type="submit">Send Message</button>
  </form>
</section>

<?php include "../includes/footer.php"; ?>

<script>
  function handleFormSubmit(form) {

    const inputs = form.querySelectorAll("input, textarea");

    for (let i of inputs) {
      if (i.value.trim() === "") {
        alert("Fields cannot be empty or spaces only");
        return false;
      }
    }

    const phone = form.querySelector('input[type="tel"]').value;

    // ❌ block repeated digits like 8888888888
    if (/^(\d)\1{9}$/.test(phone) || !/^[6-9]\d{9}$/.test(phone)) {
      alert("Invalid phone number");
      return false;
    }

    // ❌ block sequences like 1234567890
    if (/1234567890|0987654321/.test(phone)) {
      alert("Invalid phone number");
      return false;
    }

    document.getElementById('form-success-message').style.display = 'block';
    form.reset();

    return false;
  }
</script>