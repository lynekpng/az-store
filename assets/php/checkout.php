<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/main.css">
    <title>Checkout - AZ-Store</title>
</head>
<body>
    <header>
        <h3>AZ[store]</h3>
        <nav>
            <a href="index.php#home">Home</a>
            <a href="index.php#about">About</a>
            <a href="index.php#product">Product</a>
            <a href="index.php#contact">Contact</a>
        </nav>
        <div>
            <a href="checkout.php"><i class="fa-solid fa-cart-shopping" style="color: #ffffff;"></i></a>
            <a href="#login">Login</a>
        </div>
    </header>
    <hr>
    <main>
        <div class="container">
            <div id="cart">
                <h3>Shopping Cart</h3>
                <ul id="cart-items">
                    <?php
                    session_start();
                    if (!empty($_SESSION['cart'])) {
                        foreach ($_SESSION['cart'] as $item) {
                            echo "<li>{$item['name']} - \${$item['price']}</li>";
                        }
                    } else {
                        echo "<li>Your cart is empty.</li>";
                    }
                    ?>
                </ul>
            </div>
                <div id="checkout-form">
                    <h3>Shipping Information</h3>
                    <form action="checkout.php" method="post">
                        <input type="text" id="full-name" name="full-name" placeholder="Full name" required><br>
                        
                        <input type="email" id="email" name="email" placeholder="Your e-mail"  required><br>
                        
                        <input type="text" id="address" name="address" placeholder="Adress" required><br>
                        
                        <input type="text" id="city" name="city" placeholder="City" required>
                        
                        <input type="text" id="zip-code" name="zip-code" placeholder="Zip code" required><br>

                        <input type="text" id="country" name="country" placeholder="Country" required><br>
                        
                        <button class= "submit-order" type="submit" name="submit-order">Submit Order</button>
                    </form>
                </div>
            
            
            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit-order'])) {
                $_SESSION['cart'] = [];

                echo '<div id="thank-you-message">';
                echo '<h3>Thank you for your order!</h3>';
                echo '</div>';
            }
            ?>
        </div>
    </main>
    <hr>
    <footer>
        <a href="index.php#home">Home</a>
        <a href="index.php#about">About</a>
        <a href="index.php#product">Product</a>
        <a href="index.php#contact">Contact</a>
    </footer>
</body>
</html>
