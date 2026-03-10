function showPopup(msg){
  const p=document.querySelector(".popup");
  if(!p) return;
  p.textContent=msg;
  p.classList.add("show");
  setTimeout(()=>p.classList.remove("show"),2000);
}

function viewProduct(code){
  window.location.href="/aiza-collections-final/pages/product.php?code="+code;
}

function addToCart(e,btn){
e.preventDefault();
e.stopPropagation();

const code = btn.dataset.code;

askSize("cart", code);
}

function addToWishlist(e,btn){
e.preventDefault();
e.stopPropagation();

const code = btn.dataset.code;

askSize("wishlist", code);
}
function addCurrentProductToCart(btn){

const code = btn.dataset.code;

const sizeBtn = document.querySelector(".sizes button.selected");

if(!sizeBtn){
showPopup("Please select a size");
return;
}

const size = sizeBtn.textContent;

fetch("/aiza-collections-final/pages/list-handler.php",{
method:"POST",
headers:{'Content-Type':'application/x-www-form-urlencoded'},
body:`product_code=${code}&size=${size}&action=add_cart`
})
.then(()=>showPopup("✔ Added to cart"));

}
function addCurrentProductToWishlist(btn){

const code = btn.dataset.code;

const sizeBtn = document.querySelector(".sizes button.selected");

if(!sizeBtn){
showPopup("Please select a size");
return;
}

const size = sizeBtn.textContent;

fetch("/aiza-collections-final/pages/list-handler.php",{
method:"POST",
headers:{'Content-Type':'application/x-www-form-urlencoded'},
body:`product_code=${code}&size=${size}&action=add_wishlist`
})
.then(()=>showPopup("♡ Added to wishlist"));

}

function setMainImage(src){

const img = document.getElementById("prod-img");
if(!img) return;

img.src = src;

if(typeof productImages !== "undefined"){
currentImage = productImages.indexOf(src);
}

}

let simIndex=0;
function scrollSimilar(dir){
  const track=document.getElementById("similarTrack");
  if(!track) return;
  const cardWidth=track.children[0].offsetWidth+24;
  simIndex+=dir;
  simIndex=Math.max(0,Math.min(simIndex,track.children.length-4));
  track.style.transform=`translateX(-${simIndex*cardWidth}px)`;
}
function showAuthMessage(msg){
const box=document.createElement("div");
box.className="popup show";
box.innerText=msg;
document.body.appendChild(box);

setTimeout(()=>{
box.remove();
},2000);
}
function askSize(action, code){

const overlay=document.createElement("div");
overlay.className="confirm-overlay";

overlay.innerHTML=`
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

overlay.querySelector(".confirm-cancel").onclick=()=>{
overlay.remove();
};

overlay.querySelectorAll(".size-options button").forEach(btn=>{

btn.onclick=()=>{

const size = btn.dataset.size;

fetch("/aiza-collections-final/pages/list-handler.php",{
method:"POST",
headers:{'Content-Type':'application/x-www-form-urlencoded'},
body:`product_code=${code}&size=${size}&action=${action==="cart"?"add_cart":"add_wishlist"}`
})
.then(()=>{

showPopup(
action==="cart"
? "✔ Added to cart"
: "♡ Added to wishlist"
);

overlay.remove();

});

};

});

}
document.addEventListener("DOMContentLoaded",function(){

document.querySelectorAll(".sizes button").forEach(btn=>{
btn.addEventListener("click",function(){

document.querySelectorAll(".sizes button")
.forEach(b=>b.classList.remove("selected"));

this.classList.add("selected");

});

});

});

function confirmAction(message, form) {

const overlay = document.createElement("div");
overlay.className = "confirm-overlay";

overlay.innerHTML = `
<div class="confirm-box">
<p>${message}</p>

<div class="confirm-actions">
<button type="button" class="btn confirm-yes">Yes</button>
<button type="button" class="confirm-cancel">No</button>
</div>

</div>
`;

document.body.appendChild(overlay);

overlay.querySelector(".confirm-cancel").onclick = () => {
overlay.remove();
};

overlay.querySelector(".confirm-yes").onclick = () => {
overlay.remove();
form.submit();   // THIS is what actually submits the form
};

}

document.addEventListener("DOMContentLoaded", function () {

const icon = document.getElementById("accountIcon");
const menu = document.getElementById("accountMenu");

if (!icon || !menu) return;

icon.addEventListener("click", function (e) {
    e.stopPropagation();
    menu.classList.toggle("active");
});

document.addEventListener("click", function () {
    menu.classList.remove("active");
});

const mobileMenu = document.getElementById("mobile-menu");
const mainNav = document.getElementById("main-nav");

if (mobileMenu && mainNav) {
    mobileMenu.addEventListener("click", function(e) {
        e.stopPropagation();
        mobileMenu.classList.toggle("active");
        mainNav.classList.toggle("active");
        document.body.classList.toggle("menu-open");
    });

    document.addEventListener("click", function(e) {
        if (!mainNav.contains(e.target) && !mobileMenu.contains(e.target)) {
            mobileMenu.classList.remove("active");
            mainNav.classList.remove("active");
            document.body.classList.remove("menu-open");
        }
    });

    // Close menu when clicking on a link
    const navLinks = mainNav.querySelectorAll("a");
    navLinks.forEach(link => {
        link.addEventListener("click", () => {
            mobileMenu.classList.remove("active");
            mainNav.classList.remove("active");
            document.body.classList.remove("menu-open");
        });
    });
}

});
function togglePassword(id, icon){

const input = document.getElementById(id);

if(input.type === "password"){
input.type = "text";
icon.textContent = "🙈";
}
else{
input.type = "password";
icon.textContent = "👁";
}
}
/* Home page slider */
let currentSlide = 0;

const slides = document.querySelector(".slides");
const totalSlides = document.querySelectorAll(".slide").length;
const dots = document.querySelectorAll(".dot");

function showSlide(index){

if(index >= totalSlides){
currentSlide = 0;
}
else if(index < 0){
currentSlide = totalSlides - 1;
}
else{
currentSlide = index;
}

slides.style.transform = "translateX(-" + (currentSlide * 100) + "%)";

dots.forEach(dot => dot.classList.remove("active"));
dots[currentSlide].classList.add("active");
}

function nextSlide(){
showSlide(currentSlide + 1);
}

function prevSlide(){
showSlide(currentSlide - 1);
}

/* auto slide */

setInterval(()=>{
nextSlide();
},5000);


/* mobile swipe */

let startX = 0;

if(slides){

slides.addEventListener("touchstart",(e)=>{
startX = e.touches[0].clientX;
});

slides.addEventListener("touchend",(e)=>{
let endX = e.changedTouches[0].clientX;

if(startX - endX > 50){
nextSlide();
}

if(endX - startX > 50){
prevSlide();
}

});

}
/* PRODUCT IMAGE SLIDER */

let currentImage = 0;

function changeImage(direction){

if(typeof productImages === "undefined") return;
if(productImages.length === 0) return;

currentImage += direction;

if(currentImage < 0){
currentImage = productImages.length - 1;
}

if(currentImage >= productImages.length){
currentImage = 0;
}

const img = document.getElementById("prod-img");
if(!img) return;

/* fade out */

img.classList.add("fade-out");

setTimeout(()=>{

img.src = productImages[currentImage];

/* fade in */

img.classList.remove("fade-out");

},180);

}
document.addEventListener("keydown",(e)=>{

if(e.key === "ArrowRight"){
changeImage(1);
}

if(e.key === "ArrowLeft"){
changeImage(-1);
}

});