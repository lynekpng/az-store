
let cart = JSON.parse(localStorage.getItem("cart")) || [];
document.addEventListener("DOMContentLoaded", () => {
  updateCart();
});

function updateCart() {
  const cartHTML = cart.map(
    (item) => `<div class="cart-item">
                    <h3>${item.product}</h3>
                    <div class="cart-detail">
                        <div class="mid">
                            <button onclick="decreaseQuantity('${item.id}')">-</button>
                            <p>${item.quantity}</p>
                            <button onclick="increaseQuantity('${item.id}')">+</button>
                        </div>
                        <p>${item.price} €</p>
                        <button onclick="removeItem('${item.id}')" class="cart-product">D</button>
                    </div>
                </div>`
  );

  const cartItems = document.querySelector(".cart-items");
  cartItems.innerHTML = cartHTML.join("");
  getTotal();
}

function increaseQuantity(id) {
  let product = cart.find((item) => item.id === id);
  if (product) {
    product.quantity++;
    localStorage.setItem("cart", JSON.stringify(cart));
    updateCart();
  }
}

function decreaseQuantity(id) {
  let product = cart.find((item) => item.id === id);
  if (product && product.quantity > 1) {
    product.quantity--;
    localStorage.setItem("cart", JSON.stringify(cart));
    updateCart();
  } else if (product) {
    removeItem(id) ;
  }
}

function removeItem(id) {
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
  document.querySelector(".total").innerHTML = `${cartTotal.toFixed(2)} €`;
}