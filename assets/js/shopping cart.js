let cart = JSON.parse(localStorage.getItem("cart")) || [];

document.addEventListener("DOMContentLoaded", () => {
  updateCart();
});

function updateCart() {
  const cartItems = document.querySelector(".cart-items");
  const totalItemsHTML = document.querySelector(".noOfItems");
  const totalAmountHTML = document.querySelector(".total");

  let totalItems = 0;
  let totalPrice = 0;

  const cartHTML = cart.map((item) => {
    totalItems += item.quantity;
    totalPrice += item.price * item.quantity;

    return `
      <div class="cart-item">
        <h3>${item.product}</h3>
        <div class="cart-detail">
          <div class="mid">
            <button onclick="decreaseQuantity(${item.id})">-</button>
            <p>${item.quantity}</p>
            <button onclick="increaseQuantity(${item.id})">+</button>
          </div>
          <p>$${item.price}</p>
          <button onclick="removeItem(${item.id})" class="cart-product" id="${item.id}">Delete</button>
        </div>
      </div>
    `;
  }).join("");

  cartItems.innerHTML = cartHTML;
  totalItemsHTML.textContent = `${totalItems} items`;
  totalAmountHTML.textContent = `$${cartTotal}`;

  localStorage.setItem("cart", JSON.stringify(cart));
}

function increaseQuantity(id) {
  const product = cart.find((item) => item.id === id);
  if (product) {
    product.quantity++;
    updateCart();
  }
}

function decreaseQuantity(id) {
  const product = cart.find((item) => item.id === id);
  if (product && product.quantity > 1) {
    product.quantity--;
    updateCart();
  }
}

function removeItem(id) {
  cart = cart.filter((item) => item.id !== id);
  updateCart();
}

function addToCart(id, product, price, image_url) {
  const existingProduct = cart.find((item) => item.id === id);
  if (existingProduct) {
    existingProduct.quantity++;
  } else {
    cart.push({ id, product, price, image_url, quantity: 1 });
  }
  updateCart();
}
