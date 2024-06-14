<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/main.css">
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
            <button class="store-button">
            <a href="checkout.php">PROCEED TO CHECKOUT</a>
            </button>
        </div>
    </div>

    <script src="/assets/js/shopping_cart.js"></script>
</body>

</html>