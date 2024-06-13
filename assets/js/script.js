
const jsonUrl = '../js/products.json';


  fetch(jsonUrl)
    .then(response => {
      if (!response.ok) {
        throw new Error('La requête a échoué');
      }
      return response.json();
    })
    .then(data => {
      data.forEach(product => {
  
        const card = document.createElement('div');
        card.classList.add('card');
  
  
        card.innerHTML = `
              <img src="../img/shoe_one.png" alt="${product.product}">
              <div class="shoesDisplay">
                <div class="rowShoes">
                  <h2>${product.product}</h2>
                  <p>${product.price} €</p>
                </div>
                <button onclick="addToCart('${product.id}', '${product.product}', ${product.price}, '${product.image_url}')">Add to cart</button>
              </div>
            `;
        document.querySelector('.articles').appendChild(card);
      });
    })
    .catch(error => {
      console.error('Erreur lors de la récupération du JSON :', error);
    });
  
    function addToCart(id, product, price, image_url) {
      let cart = JSON.parse(localStorage.getItem('cart')) || [];
      const existingProduct = cart.find(item => item.id === id);
      if (existingProduct) {
        existingProduct.quantity += 1;
      } else {
        cart.push({ id, product, price, image_url, quantity: 1 });
      }
      localStorage.setItem('cart', JSON.stringify(cart));
      updateCart() ;
    }