<!-- debutAjout de fonction pour garder la session active ainsi que le contenu du panier -->
<?php
// Démarre ou restaure une session
session_start();

// Si le panier n'existe pas encore dans la session, initialisez-le
if (!isset($_SESSION['panier'])) {
    $_SESSION['panier'] = [];
}

// Exemple d'ajout d'un article au panier
if (isset($_POST['add_to_cart'])) {
    $article = $_POST['article']; // Exemple d'article à ajouter au panier
    $_SESSION['panier'][] = $article;
}

// Pour afficher le panier
if (isset($_SESSION['panier'])) {
    foreach ($_SESSION['panier'] as $article) {
        // Afficher les détails de l'article
    }
}
if (!empty($_SESSION['panier'])): ?>
    <ul>
        <?php foreach ($_SESSION['panier'] as $article): ?>
            <li><?php echo htmlspecialchars($article); ?></li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>Your cart is empty.</p>
<?php endif; 
?>



<!-- fin Ajout de fonction pour garder la session active ainsi que le contenu du panier -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
</head>
<body>
    <header>
        <h3>AZ[store]</h3>
        <nav>
            <a href="index.php">Home</a>
            <a href="#about">About</a>
            <a href="#product">Product</a>
            <a href="#contact">Contact</a>
        </nav>
    </header>

    <h1 class="">Shopping Cart</h1>
    <div class="body">
        <div class="container">
            <h3 class="heading">Products</h3>
            <div class="result"></div>
        </div>
        <div class="cart">
            <div class="cart-header">
                <h3>CART</h3>
                <p class="noOfItems"><?php echo count($_SESSION['panier']); ?> items</p>
            </div>
            <hr noshade="true" size="1px" />
            <div class="cart-items">
                <?php if (!empty($_SESSION['panier'])): ?>
                    <ul>
                        <?php foreach ($_SESSION['panier'] as $article): ?>
                            <li><?php echo $article; ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php else: ?>
                    <p>Your cart is empty.</p>
                <?php endif; ?>
            </div>
            <hr noshade="true" size="1px" />
            <div class="cart-footer cart-header">
                <h4>Total</h4>
                <!-- Calcul du total à partir des articles dans le panier -->
                <p class="total">$0</p>
            </div>
            <a href="checkout.php">PROCEED TO CHECKOUT</a>
        </div>
    </div>

    <script src="/assets/js/shopping cart.js"></script>
</body>
</html>

<!-- 

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Shopping Cart</title>
</head>

<body>
    <header>
        <h3>AZ[store]</h3>
        <nav>
            <a href="index.php">Home</a>
            <a href="#about">About</a>
            <a href="#product">Product</a>
            <a href="#contact">Contact</a>
    </header>
    <h1 class="">Shopping Cart</h1>
    <div class="body">
        <div class="container">
            <h3 class="heading">Products</h3>
            <div class="result"></div>
        </div>
        <div class="cart">
            <div class="cart-header">
                <h3>CART</h3>
                <p class="noOfItems">0 items</p>
            </div>
            <hr noshade="true" size="1px" />
            <div class="cart-items"></div>
            <hr noshade="true" size="1px" />
            <div class="cart-footer cart-header">
                <h4>Total</h4>
                <p class="total">$0</p>
            </div>
            <a href="checkout.php">PROCEED TO CHECKOUT</a>
        </div>
    </div>

    <script src="/assets/js/shopping cart.js"></script>
</body>

</html> -->