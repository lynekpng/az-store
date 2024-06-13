document.addEventListener("DOMContentLoaded", function () {
    displayCart();
    updateCartCount();
});

function addToCart(product) {
    let cart = JSON.parse(sessionStorage.getItem('cart')) || [];
    cart.push(product);
    sessionStorage.setItem('cart', JSON.stringify(cart));
    displayCart();
    updateCartCount();
}

function displayCart() {
    let cart = JSON.parse(sessionStorage.getItem('cart')) || [];
    let cartList = document.getElementById('cart');
    cartList.innerHTML = '';
    cart.forEach((item, index) => {
        let li = document.createElement('li');
        li.textContent = item;
        li.appendChild(createRemoveButton(index));
        cartList.appendChild(li);
    });
}

function createRemoveButton(index) {
    let button = document.createElement('button');
    button.textContent = 'Remove';
    button.onclick = function () {
        removeFromCart(index);
    };
    return button;
}

function removeFromCart(index) {
    let cart = JSON.parse(sessionStorage.getItem('cart')) || [];
    cart.splice(index, 1);
    sessionStorage.setItem('cart', JSON.stringify(cart));
    displayCart();
    updateCartCount();
}

function updateCartCount() {
    let cart = JSON.parse(sessionStorage.getItem('cart')) || [];
    document.getElementById('cart-count').textContent = cart.length;
}
