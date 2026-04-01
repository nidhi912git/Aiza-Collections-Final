/* ===============================
POPUP SYSTEM
================================ */

function showPopup(message) {
  const popup = document.querySelector(".popup");
  if (!popup) return;

  popup.textContent = message;
  popup.classList.add("show");

  setTimeout(() => {
    popup.classList.remove("show");
  }, 2500);
}

/* ===============================
PRODUCT VIEW
================================ */

function viewProduct(code) {
  window.location.href =
    "/aiza-collections-final/pages/product.php?code=" + code;
}

/* ===============================
ADD TO CART / WISHLIST
================================ */

function addToCart(e, btn) {
  e.preventDefault();
  e.stopPropagation();

  const code = btn.dataset.code;
  askSize("cart", code);
}

function addToWishlist(e, btn) {
  e.preventDefault();
  e.stopPropagation();

  const code = btn.dataset.code;
  askSize("wishlist", code);
}

/* ===============================
CURRENT PRODUCT PAGE
================================ */
function addCurrentProductToCart(btn) {
  const code = btn.dataset.code;
  const sizeBtn = document.querySelector(".sizes button.selected");

  if (!sizeBtn) {
    showPopup("Please select a size");
    return;
  }

  const size = sizeBtn.dataset.size;
  const qty = parseInt(document.getElementById("qty").innerText) || 1;

  btn.classList.add("loading");

  fetch("/aiza-collections-final/pages/list-handler.php", {
    method: "POST",
    headers: { "Content-Type": "application/x-www-form-urlencoded" },
    body: `product_code=${encodeURIComponent(code)}&size=${encodeURIComponent(size)}&qty=${qty}&action=add_cart`,
  })
    .then((res) => res.text())
    .then((data) => {
      if (data.trim() === "added_cart") {
        showPopup("✔ Added to cart");
        updateCartCounter(1);
      } else {
        showPopup(data);
      }
    })
    .finally(() => {
      btn.classList.remove("loading");
    });
}
function addCurrentProductToWishlist(btn) {
  const code = btn.dataset.code;
  const sizeBtn = document.querySelector(".sizes button.selected");

  if (!sizeBtn) {
    showPopup("Please select a size");
    return;
  }

  const size = sizeBtn.dataset.size;

  fetch("/aiza-collections-final/pages/list-handler.php", {
    method: "POST",
    headers: { "Content-Type": "application/x-www-form-urlencoded" },
    body: `product_code=${encodeURIComponent(code)}&size=${encodeURIComponent(size)}&action=add_wishlist`,
  })
    .then((res) => res.text())
    .then((data) => {
      if (data.trim() === "added_wishlist") {
        showPopup("♡ Added to wishlist");
      } else {
        showPopup(data);
      }
    });
}

function increaseQty() {
  const sizeBtn = document.querySelector(".sizes button.selected");

  if (!sizeBtn) {
    showPopup("Please select a size first");
    return;
  }

  let qtyEl = document.getElementById("qty");
  let qty = parseInt(qtyEl.innerText) || 1;

  const stock = parseInt(sizeBtn.dataset.stock) || 0;

  if (qty >= stock) {
    showPopup("Maximum stock reached");
    return;
  }

  qtyEl.innerText = qty + 1;
}

function decreaseQty() {
  const sizeBtn = document.querySelector(".sizes button.selected");

  if (!sizeBtn) {
    showPopup("Please select a size first");
    return;
  }

  let qtyEl = document.getElementById("qty");
  let qty = parseInt(qtyEl.innerText) || 1;

  if (qty > 1) {
    qtyEl.innerText = qty - 1;
  }
}
/* ===============================
SIZE MODAL
================================ */

function askSize(action, code) {
  const overlay = document.createElement("div");
  overlay.className = "confirm-overlay";

  overlay.innerHTML = `
    <div class="confirm-box">

        <h3>Select Size</h3>

        <div class="size-options">
            <button data-size="S">S</button>
            <button data-size="M">M</button>
            <button data-size="L">L</button>
            <button data-size="XL">XL</button>
            <button data-size="XXL">XXL</button>
        </div>

        <div class="confirm-actions">
            <button class="confirm-cancel">Cancel</button>
        </div>

    </div>
  `;

  document.body.appendChild(overlay);

  overlay.querySelector(".confirm-cancel").onclick = () => overlay.remove();

  overlay.querySelectorAll(".size-options button").forEach((btn) => {
    btn.onclick = () => {
      const size = btn.dataset.size;

      fetch("/aiza-collections-final/pages/list-handler.php", {
  method: "POST",
  headers: { "Content-Type": "application/x-www-form-urlencoded" },
  body: `product_code=${encodeURIComponent(code)}&size=${encodeURIComponent(size)}&action=${action === "cart" ? "add_cart" : "add_wishlist"}`,
})
  .then((res) => res.text())
  .then((data) => {

    if (data.trim() === "added_cart") {
      showPopup("✔ Added to cart");
      updateCartCounter(1);
    } else if (data.trim() === "added_wishlist") {
      showPopup("♡ Added to wishlist");
    } else {
      showPopup(data);
    }

    overlay.remove();
  });
}
}
)
}

/* ===============================
SIZE SELECTOR
================================ */

document.addEventListener("DOMContentLoaded", function () {
  const sizeButtons = document.querySelectorAll(".sizes button");
  const cartBtn = document.querySelector(".add-cart-btn");

  sizeButtons.forEach((btn) => {
    btn.addEventListener("click", function () {
      // remove previous selection
      sizeButtons.forEach((b) => b.classList.remove("selected"));

      // add selected class
      this.classList.add("selected");

      // 🔥 update selected size in Add to Cart
      if (cartBtn) {
        cartBtn.dataset.size = this.dataset.size;
      }

            // ===============================
      // 🔥 STOCK UPDATE BASED ON SIZE
      // ===============================

      const stock = parseInt(this.dataset.stock) || 0;
      const badge = document.getElementById("stockBadge");

      if (badge) {

        badge.style.display = "inline-flex";

        let text = "";
        let className = "stock-badge";

        if (stock <= 0) {
          text = "Out of Stock";
          className += " out-stock";

          if (cartBtn) cartBtn.disabled = true;

        } else if (stock <= 5) {
          text = "Hurry!";
          className += " low-stock";

          if (cartBtn) cartBtn.disabled = false;

        } else if (stock <= 15) {
          text = "In Stock";
          className += " medium-stock";

          if (cartBtn) cartBtn.disabled = false;

        } else {
          text = "In Stock";
          className += " high-stock";

          if (cartBtn) cartBtn.disabled = false;
        }

        badge.className = className;
        badge.innerHTML = `<span>${text}</span><strong>${stock}</strong>`;
      }

      // 🔁 OPTIONAL: reset quantity when size changes
      const qtyEl = document.getElementById("qty");
      if (qtyEl) qtyEl.innerText = 1;
    });
  });
});

/* ===============================
PRODUCT IMAGE SLIDER
================================ */

let currentImage = 0;

function changeImage(direction) {
  if (typeof productImages === "undefined") return;
  if (productImages.length === 0) return;

  currentImage += direction;

  if (currentImage < 0) {
    currentImage = productImages.length - 1;
  }

  if (currentImage >= productImages.length) {
    currentImage = 0;
  }

  const img = document.getElementById("prod-img");
  if (!img) return;

  img.classList.add("fade-out");

  setTimeout(() => {
    img.src = productImages[currentImage];
    img.classList.remove("fade-out");
  }, 180);
}

document.addEventListener("keydown", (e) => {
  if (e.key === "ArrowRight") changeImage(1);
  if (e.key === "ArrowLeft") changeImage(-1);
});

/* ===============================
SIMILAR PRODUCTS CAROUSEL
================================ */

let simIndex = 0;

function scrollSimilar(dir) {
  const track = document.getElementById("similarTrack");
  if (!track || !track.children.length) return;

  const visibleCards = 4; // how many cards visible at once
  const totalCards = track.children.length;

  simIndex += dir;

  // 👉 LOOP FORWARD
  if (simIndex > totalCards - visibleCards) {
    simIndex = 0;
  }

  // 👉 LOOP BACKWARD
  if (simIndex < 0) {
    simIndex = totalCards - visibleCards;
  }

  const cardWidth = track.children[0].offsetWidth + 24;

  track.style.transform = `translateX(-${simIndex * cardWidth}px)`;
}
/* ===============================
ACCOUNT DROPDOWN
================================ */

document.addEventListener("DOMContentLoaded", function () {
  const icon = document.getElementById("accountIcon");
  const menu = document.getElementById("accountMenu");

  if (!icon || !menu) return;

  icon.addEventListener("click", (e) => {
    e.stopPropagation();
    menu.classList.toggle("active");
  });

  document.addEventListener("click", () => {
    menu.classList.remove("active");
  });
});

/* ===============================
MOBILE MENU
================================ */

document.addEventListener("DOMContentLoaded", function () {
  const mobileMenu = document.getElementById("mobile-menu");
  const mainNav = document.getElementById("main-nav");

  if (!mobileMenu || !mainNav) return;

  mobileMenu.addEventListener("click", (e) => {
    e.stopPropagation();

    mobileMenu.classList.toggle("active");
    mainNav.classList.toggle("active");

    document.body.classList.toggle("menu-open");
  });

  document.addEventListener("click", (e) => {
    if (!mainNav.contains(e.target) && !mobileMenu.contains(e.target)) {
      mobileMenu.classList.remove("active");
      mainNav.classList.remove("active");
      document.body.classList.remove("menu-open");
    }
  });
});

/* ===============================
PASSWORD TOGGLE
================================ */

function togglePassword(id, icon) {
  const input = document.getElementById(id);

  if (input.type === "password") {
    input.type = "text";
    icon.textContent = "🙈";
  } else {
    input.type = "password";
    icon.textContent = "👁";
  }
}

/* ===============================
HOME PAGE SLIDER
================================ */

let currentSlide = 0;

const slides = document.querySelector(".slides");
const slideList = document.querySelectorAll(".slide");
const dots = document.querySelectorAll(".dot");

let totalSlides = slideList.length;

function showSlide(index) {
  if (!slides) return;

  if (index >= totalSlides) {
    currentSlide = 0;
  } else if (index < 0) {
    currentSlide = totalSlides - 1;
  } else {
    currentSlide = index;
  }

  slides.style.transform = "translateX(-" + currentSlide * 100 + "%)";

  dots.forEach((dot) => dot.classList.remove("active"));
  if (dots[currentSlide]) dots[currentSlide].classList.add("active");
}

function nextSlide() {
  showSlide(currentSlide + 1);
}
function prevSlide() {
  showSlide(currentSlide - 1);
}

let sliderInterval;

function startSlider() {
  sliderInterval = setInterval(() => nextSlide(), 5000);
}

function stopSlider() {
  clearInterval(sliderInterval);
}

if (slides) {
  startSlider();

  slides.addEventListener("mouseenter", stopSlider);
  slides.addEventListener("mouseleave", startSlider);
}

/* ===============================
MOBILE SWIPE
================================ */

let startX = 0;

if (slides) {
  slides.addEventListener("touchstart", (e) => {
    startX = e.touches[0].clientX;
  });

  slides.addEventListener("touchend", (e) => {
    let endX = e.changedTouches[0].clientX;

    if (startX - endX > 50) nextSlide();
    if (endX - startX > 50) prevSlide();
  });
}

/* ===============================
ABOUT PAGE REVIEW SLIDER
================================ */

let reviewIndex = 0;
let reviewInterval;

const reviewSlides = document.querySelectorAll(".review-slide");
const reviewSlider = document.querySelector(".review-slider");

function showReview(index) {
  reviewSlides.forEach((slide) => slide.classList.remove("active"));

  reviewIndex = index;

  if (reviewIndex >= reviewSlides.length) reviewIndex = 0;
  if (reviewIndex < 0) reviewIndex = reviewSlides.length - 1;

  if (reviewSlides[reviewIndex])
    reviewSlides[reviewIndex].classList.add("active");
}

function nextReview() {
  showReview(reviewIndex + 1);
}
function prevReview() {
  showReview(reviewIndex - 1);
}

function startReviewSlider() {
  reviewInterval = setInterval(() => nextReview(), 4000);
}

function stopReviewSlider() {
  clearInterval(reviewInterval);
}

if (reviewSlider) {
  startReviewSlider();

  reviewSlider.addEventListener("mouseenter", stopReviewSlider);
  reviewSlider.addEventListener("mouseleave", startReviewSlider);
}

/* ===============================
ADMIN CONFIRM MODAL
================================ */

function confirmAction(message, form) {
  const overlay = document.createElement("div");
  overlay.className = "confirm-overlay";

  overlay.innerHTML = `
    <div class="confirm-box">
        <p>${message}</p>
        <div class="confirm-actions">
            <button class="btn confirm-ok">Yes</button>
            <button class="btn confirm-cancel">Cancel</button>
        </div>
    </div>
  `;

  document.body.appendChild(overlay);

  // ✅ YES button → submit form
  overlay.querySelector(".confirm-ok").onclick = function () {
    overlay.remove();
    form.submit(); // 🔥 THIS is the key fix
  };

  // ❌ Cancel button
  overlay.querySelector(".confirm-cancel").onclick = function () {
    overlay.remove();
  };
}

/* ===============================
ADMIN DROPDOWN
================================ */

document.addEventListener("DOMContentLoaded", function () {
  document.querySelectorAll(".custom-dropdown").forEach((drop) => {
    const selected = drop.querySelector(".dropdown-selected");
    const menu = drop.querySelector(".dropdown-menu");
    const input = drop.querySelector("input");

    if (!selected || !menu) return;

    selected.addEventListener("click", () => {
      menu.style.display = menu.style.display === "block" ? "none" : "block";
    });

    menu.querySelectorAll(".dropdown-item").forEach((item) => {
      item.addEventListener("click", () => {
        selected.textContent = item.textContent;

        if (input) {
          input.value = item.textContent;
        }

        menu.style.display = "none";
      });
    });
  });
});

/* ===============================
CART COUNTER LIVE UPDATE
================================ */

function updateCartCounter(amount) {
  const counters = document.querySelectorAll("[data-cart-count]");

  counters.forEach((counter) => {
    let current = parseInt(counter.textContent) || 0;
    counter.textContent = current + amount;
  });
}

/* ===============================
ADMIN STATUS UPDATE AJAX
================================ */

document.querySelectorAll(".update-status-btn").forEach((btn) => {
  btn.addEventListener("click", function (e) {
    e.preventDefault();

    const form = this.closest("form");
    if (!form) return;

    const data = new FormData(form);

    fetch(form.action, {
      method: "POST",
      body: data,
    })
      .then((res) => res.text())

      .then(() => {
        showPopup("Order status updated");

        /* update visible status instantly */

        const statusInput = form.querySelector("#statusInput");
        const statusText = document.querySelector(
          ".order-info p strong + span",
        );

        if (statusInput && statusText) {
          statusText.textContent = statusInput.value;
        }
      })

      .catch(() => {
        showPopup("Error updating status");
      });
  });
});

document.querySelectorAll(".confirm-form").forEach((form) => {
  form.addEventListener("submit", function (e) {
    e.preventDefault();

    const type = form.dataset.type;

    let message =
      type === "delete"
        ? "Are you sure you want to delete this product? This cannot be undone."
        : "Are you sure you want to feature this product?";

    confirmAction(message, form);
  });
});
