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
            <h1>Checkout</h1>
            <div id="cart">
                <h2>Shopping Cart</h2>
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
                    <h2>Shipping Information</h2>
                    <form action="checkout.php" method="post">
                        <label for="first-name">First Name</label>
                        <input type="text" id="first-name" name="first-name" required><br>
                        
                        <label for="last-name">Last Name</label>
                        <input type="text" id="last-name" name="last-name" required><br>
                        
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" required><br>
                        
                        <label for="address">Address</label>
                        <input type="text" id="address" name="address" required><br>
                        
                        <label for="city">City</label>
                        <input type="text" id="city" name="city" required>
                        
                        <label for="zip-code">Zip Code</label>
                        <input type="text" id="zip-code" name="zip-code" required>
                        
                        <label for="country">Country</label>
                        <input type="text" id="country" name="country" required>
                        
                        <button type="submit" name="submit-order">Submit Order</button>
                    </form>
                </div>
            
            
            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit-order'])) {
                $_SESSION['cart'] = [];

                echo '<div id="thank-you-message">';
                echo '<h2>Thank you for your order!</h2>';
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
