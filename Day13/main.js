function closeSidebar() {
    document.getElementsByClassName('sidebar')[0].style.display = "none";
}

function showSidebar() {
    document.getElementsByClassName('sidebar')[0].style.display = "block";
}

function showCart() {
    document.getElementsByClassName('cart-page')[0].classList.toggle('cart-display');
}

let images = document.getElementsByClassName('imgs');

for (let i = 0; i < images.length; i++) {
    images[i].addEventListener('click', () => {
        let mainImage = document.getElementsByClassName('main-image')[0];
        mainImage.innerHTML = `<img src="./images/image-product-${i + 1}.jpg" alt="mainImage" height="500px">`;
        for (let j = 0; j < images.length; j++) {
            if (i !== j) {
                images[j].style.opacity = 1;
                images[j].style.border = "0px solid orange";
            } else {
                images[j].style.opacity = 0.5;
                images[j].style.border = "2px solid orange";
                images[j].style.borderRadius = "10px";
            }
        }
    });
}

let count = document.getElementById('item-count');

function decrement() {
    let val = count.innerText;
    if (parseInt(val) >= 1) {
        count.innerText = parseInt(val) - 1;
    }
}

function increment() {
    let val = count.innerText;
    if (parseInt(val) < 23) {
        count.innerText = parseInt(val) + 1;
    }
}

function addCart() {
    document.getElementById('no-procuct').style.display = "none";
    let count = document.getElementById('item-count').innerText;
    document.getElementsByClassName('cart-product')[0].style.display = "flex";
    let pricePerItem = 125.00;
    let totalAmount = pricePerItem * count;
    let amountElement = document.getElementsByClassName('total-amount')[0];
    amountElement.innerText = `$125.00 X ${count} = $${totalAmount.toFixed(2)}`;
    document.getElementsByClassName('cart-page')[0].classList.toggle('cart-display');
}

function deleteCart(){
    document.getElementsByClassName('cart-product')[0].style.display = "none";
    document.getElementById('no-procuct').style.display = "block";
}


var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("slide");
  if (n > x.length) {slideIndex = 1}
  if (n < 1) {slideIndex = x.length} ;
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  x[slideIndex-1].style.display = "block";
}