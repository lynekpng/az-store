let cart = [];

document.addEventListener("DOMContentLoaded", () => {
  cart = JSON.parse(localStorage.getItem("cart")) || [];
  updateCart();
});

function updateCart() {
  const cartHTML = cart.map(
    (item) => `<div class="cart-item">
                    <h3>${item.product}</h3>
                    <div class="cart-detail">
                        <div class="mid">
                            <button onclick="decrItem(${item.id})">-</button>
                            <p>${item.quantity}</p>
                            <button onclick="incrItem(${item.id})">+</button>
                        </div>
                        <p>$${item.price}</p>
                        <button onclick="deleteItem(${item.id})" class="cart-product" id=${item.id}>D</button>
                    </div>
                </div>`
  );

  const cartItems = document.querySelector(".cart-items");
  cartItems.innerHTML = cartHTML.join("");
  getTotal();
}

function addToCart(id) {
  const product = cart.find((item) => item.id === id);
  if (product) {
    product.quantity += 1;
  } else {
    cart.push({ ...product, quantity: 1 });
  }
  localStorage.setItem("cart", JSON.stringify(cart));
  updateCart();
}

function incrItem(id) {
  const product = cart.find((item) => item.id === id);
  if (product) product.quantity += 1;
  localStorage.setItem("cart", JSON.stringify(cart));
  updateCart();
}

function decrItem(id) {
  const product = cart.find((item) => item.id === id);
  if (product && product.quantity > 1) product.quantity -= 1;
  localStorage.setItem("cart", JSON.stringify(cart));
  updateCart();
}

function deleteItem(id) {
  cart = cart.filter((item) => item.id !== id);
  localStorage.setItem("cart", JSON.stringify(cart));
  updateCart();
}

function getTotal() {
  let totalItem = 0,
    cartTotal = 0;
  cart.forEach((cartItem) => {
    cartTotal += cartItem.price * cartItem.quantity;
    totalItem += cartItem.quantity;
  });
  document.querySelector(".noOfItems").innerHTML = `${totalItem} items`;
  document.querySelector(".total").innerHTML = `$${cartTotal}`;
}
