<?php
$page_id = "about-page";
include "../includes/config.php";
include "../includes/header.php";
?>

<!-- REVIEW SLIDESHOW -->
<section class="review-slider-section">

<div class="review-slider">

<button class="review-btn prev" onclick="prevReview()">❮</button>

<div class="review-slides">

<img src="/aiza-collections-final/assets/reviews/review1.png" class="review-slide active">
<img src="/aiza-collections-final/assets/reviews/review2.png" class="review-slide">
<img src="/aiza-collections-final/assets/reviews/review3.png" class="review-slide">
<img src="/aiza-collections-final/assets/reviews/review4.png" class="review-slide">

</div>

<button class="review-btn next" onclick="nextReview()">❯</button>

</div>

</section>

<div class="about-divider"></div>

<!-- ABOUT INTRO -->
<section>
  <h2 class="section-title">About Aiza Collections</h2>
  <p style="max-width:700px; margin:0 auto; text-align:center;">
    Celebrating the timeless beauty of Indian traditional wear since 2010.
    Rooted in tradition and inspired by timeless craftsmanship.
    Our ethnic wear blends rich heritage with modern elegance,
    creating pieces that feel both classic and fresh.
    Designed to make every occasion feel meaningful and beautiful.
  </p>
</section>

<div class="about-divider"></div>

<!-- VALUES SECTION -->
<section>
  <h2 class="section-title">Our Values</h2>

  <div class="flip-grid">

    <div class="flip-card">
      <div class="flip-front">
        Quality
      </div>
      <div class="flip-back">
        Crafted with premium fabrics and careful attention to detail.
        Every piece is made to feel beautiful, durable, and timeless.
      </div>
    </div>

    <div class="flip-card">
      <div class="flip-front">
        Inclusivity
      </div>
      <div class="flip-back">
        Designed to celebrate every body and every identity.
        Our styles are made so everyone feels confident and represented.
      </div>
    </div>

    <div class="flip-card">
      <div class="flip-front">
        Authenticity
      </div>
      <div class="flip-back">
        Rooted in tradition and true craftsmanship.
        Each design reflects culture, heritage, and honest artistry.
      </div>
    </div>

    <div class="flip-card">
      <div class="flip-front">
        Excellence
      </div>
      <div class="flip-back">
        Driven by precision, passion, and purpose.
        We strive for excellence in every stitch, finish, and experience.
      </div>
    </div>

  </div>
</section>

<?php include "../includes/footer.php"; ?>