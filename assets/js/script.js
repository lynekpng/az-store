const jsonUrl = "../js/products.json";

fetch(jsonUrl)
  .then((response) => {
    if (!response.ok) {
      throw new Error("La requête a échoué");
    }
    return response.json();
  })
  .then((data) => {
    data.forEach((product) => {
      const card = document.createElement("div");
      card.classList.add("card");

      card.innerHTML = `
            <img src="../img/shoe_one.png" alt="${product.product}">
            <div class="shoesDisplay">
              <div class="rowShoes">
                <h2>${product.product}</h2>
                <p>${product.price} €</p>
              </div>
            <button onclick="addToCart('${product.id}', '${product.product}', '${product.price}')">Add to cart</button>
            </div>
          `;
      document.querySelector(".articles").appendChild(card);
    });
  })
  .catch((error) => {
    console.error("Erreur lors de la récupération du JSON :", error);
  });

function addToCart(id, product, price) {
  let cart = JSON.parse(localStorage.getItem("cart")) || [];
  const existingProduct = cart.find((item) => item.id === id);
  if (existingProduct) {
    existingProduct.quantity++;
  } else {
    cart.push({ id, product, price, quantity: 1 });
  }
  localStorage.setItem("cart", JSON.stringify(cart));
  updateCart();
}




// Sélection du formulaire
const checkoutForm = document.querySelector('form');

// Ajout d'un écouteur d'événement pour la soumission du formulaire
checkoutForm.addEventListener('submit', function (event) {
  // Empêcher la soumission par défaut du formulaire
  event.preventDefault();

  // Fonction pour afficher la notification toast
  function showToast() {
    let audio = new Audio('../sound/pop-39222.mp3');
    audio.play();
    let toastBox = document.getElementById('toastBox');
    toastBox.style.visibility = 'visible';

    let toast = document.createElement('div');
    toast.classList.add('toast', 'show');

    let paragraph = document.createElement('p');
    paragraph.textContent = 'Thank you for your order !';
    paragraph.style.textAlign = 'center';
    paragraph.id = 'toastBoxP';
    toast.appendChild(paragraph);

    toastBox.appendChild(toast);

    // Supprimer la notification après 5 secondes
    setTimeout(() => {
      toast.classList.remove('show');
      setTimeout(() => {
        toastBox.removeChild(toast);
      }, 5000); // Attendre la fin de la transition pour retirer l'élément du DOM
    }, 5000);
  }

  // Appel de la fonction showToast pour afficher la notification
  showToast();

  setTimeout(() => {
    checkoutForm.submit();
  }, 5000);

  setTimeout(() => {
    window.location.href = "../php/index.php";
  }, 5000);
});


