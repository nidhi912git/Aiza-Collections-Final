function showPopup(msg){
  const p=document.querySelector(".popup");
  if(!p) return;
  p.textContent=msg;
  p.classList.add("show");
  setTimeout(()=>p.classList.remove("show"),2000);
}

function viewProduct(code){
  window.location.href="/aiza-collections/pages/product.php?code="+code;
}

function addToCart(e,btn){
  e.preventDefault();
  e.stopPropagation();
  const code=btn.dataset.code;
  fetch("/aiza-collections/pages/cart.php",{
    method:"POST",
    headers:{'Content-Type':'application/x-www-form-urlencoded'},
    body:`product_code=${code}&action=add`
  }).then(()=>showPopup("✔ Added to cart"));
}

function addToWishlist(e,btn){
  e.preventDefault();
  e.stopPropagation();
  const code=btn.dataset.code;
  fetch("/aiza-collections/pages/wishlist.php",{
    method:"POST",
    headers:{'Content-Type':'application/x-www-form-urlencoded'},
    body:`product_code=${code}`
  }).then(()=>showPopup("♡ Added to wishlist"));
}

function increaseQty(){
  const q=document.getElementById("qty");
  q.textContent=parseInt(q.textContent)+1;
}
function decreaseQty(){
  const q=document.getElementById("qty");
  if(parseInt(q.textContent)>1) q.textContent=parseInt(q.textContent)-1;
}

function addCurrentProductToCart(btn){
  fetch("/aiza-collections/pages/cart.php",{
    method:"POST",
    headers:{'Content-Type':'application/x-www-form-urlencoded'},
    body:`product_code=${btn.dataset.code}&action=add`
  }).then(()=>showPopup("✔ Added to cart"));
}

function addCurrentProductToWishlist(btn){
  fetch("/aiza-collections/pages/wishlist.php",{
    method:"POST",
    headers:{'Content-Type':'application/x-www-form-urlencoded'},
    body:`product_code=${btn.dataset.code}`
  }).then(()=>showPopup("♡ Added to wishlist"));
}

function setMainImage(src){
  document.getElementById("prod-img").src=src;
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