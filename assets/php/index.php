<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/assets/css/main.css">
    <title>AZ-Store</title>
    <script defer src="/assets/js/script.js" ></script>
</head>
<body>
    <header>
        <h3>AZ[store]</h3>
        <nav>
            <a href="#home">Home</a>
            <a href="#about">About</a>
            <a href="#product">Product</a>
            <a href="#contact">Contact</a>
        </nav>
        <div>
            <a href="/assets/php/shopping-cart.php"><i class="fa-solid fa-cart-shopping" style="color: #ffffff;"></i></a>
            <a href="#login">Login</a>
        </div>
    </header>
    <hr class ="horizontal-lign">
    <main>
        <div class="banner">
            <section class="slogan">
                <h2>SHOE THE <br>RIGHT <span class="mot_bleu"> ONE</span>.</h2>
                <button class="store-button">See our store</button>
            </section>
            <div>
                <p class="nike">Nike</p>
                <img src="../img/shoe_one.png" alt="shoe one">
            </div>
        </div>
        <hr class= "horizontal-lign">
        <section class="products">
            <h3><span class="mot_bleu"> Our </span> last products</h3>
        </section>
        <section class="articles">
            
        </section>
        <section class="about">
            <img src="../img/shoe_two.png" alt="shoe two">
            <h2>WE PROVIDE YOU <br> THE  <span class="mot_bleu">BEST </span>QUALITY.</h2>
            <p>
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Officiis accusantium, omnis deserunt sequi labore animi 
                saepe recusandae,
            </p>
        </section>
        <div class="people">
            <section>
                <img src="../img/image-emily.jpg" alt="image-emily">
                <h4>Emily from xyz</h4>
                <p class="testimonies">
                    "Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate, 
                    reprehenderit hic. Minima ratione, sunt veniam ea ullam, perferendis 
                    quia eius minus esse animi officiis assumenda nobis, explicabo consectetur 
                    molestiae praesentium?"
                </p>
            </section>
            <section>
                <img src="../img/image-thomas.jpg" alt="image-thomas">
                <h4>Thomas from corporate</h4>
                <p class="testimonies">
                    "Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate, 
                    reprehenderit hic. Minima ratione, sunt veniam ea ullam, perferendis 
                    quia eius minus esse animi officiis assumenda nobis, explicabo consectetur 
                    molestiae praesentium?"
                </p>
            </section>
            <section>
                <img src="../img/image-jennie.jpg" alt="image-jennie">
                <h4>Jennie from Nike</h4>
                <p class="testimonies">
                    "Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate, 
                    reprehenderit hic. Minima ratione, sunt veniam ea ullam, perferendis 
                    quia eius minus esse animi officiis assumenda nobis, explicabo consectetur 
                    molestiae praesentium?"
                </p>
            </section>
        </div>
    </main>
    <hr class = "horizontal-lign">
    <footer>
        <a href="#home">Home</a>
        <a href="#about">About</a>
        <a href="#product">Product</a>
        <a href="#contact">Contact</a>
    </footer>
</body>
</html>

<?php

session_start(); 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "az_store";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("La connexion a échoué: " . $conn->connect_error);
        }

        
        foreach ($_SESSION['cart'] as $product) {
            $product_name = $product['product'];
            $quantity = $product['quantity'];
            $customer_name = $product['customer_name'];
            $price = $product['price'];

            $order_number = uniqid();

            $sql = "INSERT INTO commandes (order_number, product, quantity, customer_name) 
                    VALUES ('$order_number', '$product_name', '$quantity', '$customer_name')";

            if ($conn->query($sql) === TRUE) {
                echo "Nouvelle commande enregistrée avec succès<br>";
                header("Location: confirmation.php");
                exit;
            } else {
                echo "Erreur: " . $sql . "<br>" . $conn->error . "<br>";
            }
        }
        $conn->close();

        unset($_SESSION['cart']);
    } else {
        echo "Le panier est vide";
    }
}

?>