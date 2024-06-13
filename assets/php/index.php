<?php

include 'index.html';
include 'main.css';
include 'script.js';
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Az Store</title>
    <link rel="stylesheet" href="../css/main.css">
    <script src="../js/script.js" defer></script>
</head>
<body>
<?php
session_start(); 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "az_store";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifie si le panier est défini en session
    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        // Connexion à la base de données
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("La connexion a échoué: " . $conn->connect_error);
        }

        
        foreach ($_SESSION['cart'] as $product) {
            $product_name = $product['product'];
            $quantity = $product['quantity'];
            $customer_name = $product['customer_name'];
            // Ajoute le prix si disponible dans ton panier
            // $price = $product['price'];

            // Génère un numéro de commande unique pour chaque produit/commande
            $order_number = uniqid();

            $sql = "INSERT INTO commandes (order_number, product, quantity, customer_name) 
                    VALUES ('$order_number', '$product_name', '$quantity', '$customer_name')";

            if ($conn->query($sql) === TRUE) {
                echo "Nouvelle commande enregistrée avec succès<br>";
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



</body>
</html>