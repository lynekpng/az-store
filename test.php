<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="assets/css/main.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Bungee+Outline&family=Jacquard+24&family=Oswald:wght@200..700&family=Pixelify+Sans:wght@400..700&display=swap');
    </style>
    <title>AZ-Store</title>
    <script src="assets/js/script.js" defer></script>
    <script src="assets/js/scriptCart.js" defer></script>
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
            <a href=""><i class="fa-solid fa-cart-shopping" style="color: #ffffff;"></i></a>
            <a href="#login">Login</a>
        </div>
    </header>
    <hr>
    <main>
        <div class="slogan">
            <section>
                <h2>SHOE THE <br>RIGHT <span class="mot_bleu"> ONE </span>.</h2>
                <button>See our store</button>
            </section>
            <div>
                <p class="nike">Nike</p>
                <img src="assets/img/shoe_one.png" alt="shoe one">
            </div>
        </div>
        <hr>
        <section class="products">
            <h3>Our last products</h3>
        </section>
        <section class="articles">
            <!-- Inclure le fichier shopping_cart.php -->
            <?php include 'shopping_cart.php'; ?>

            <!-- Formulaire pour ajouter un élément au panier -->
            <form method="post" action="">
                <label for="item">Ajouter un élément :</label>
                <input type="text" name="item" id="item" required>
                <button type="submit">Ajouter</button>
            </form>

            <!-- Formulaire pour supprimer un élément du panier -->
            <form method="post" action="">
                <label for="remove_item">Supprimer un élément :</label>
                <input type="text" name="remove_item" id="remove_item" required>
                <button type="submit">Supprimer</button>
            </form>

            <h2>Contenu actuel du panier :</h2>
            <?php displayCart(); ?>
        </section>
        <section class="about">
            <img src="assets/img/shoe_two.png" alt="shoe two">
            <h2>WE PROVIDE YOU <br> THE  <span class="mot_bleu">BEST </span>QUALITY.</h2>
            <p>
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Officiis accusantium, omnis deserunt sequi labore animi 
                saepe recusandae,
            </p>
        </section>
        <div class="people">
            <section>
                <img src="assets/img/image-emily.jpg" alt="image-emily">
                <h4>Emily from xyz</h4>
                <p>
                    "Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate, 
                    reprehenderit hic. Minima ratione, sunt veniam ea ullam, perferendis 
                    quia eius minus esse animi officiis assumenda nobis, explicabo consectetur 
                    molestiae praesentium?"
                </p>
            </section>
            <section>
                <img src="assets/img/image-thomas.jpg" alt="image-thomas">
                <h4>Thomas from corporate</h4>
                <p>
                    "Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate, 
                    reprehenderit hic. Minima ratione, sunt veniam ea ullam, perferendis 
                    quia eius minus esse animi officiis assumenda nobis, explicabo consectetur 
                    molestiae praesentium?"
                </p>
            </section>
            <section>
                <img src="assets/img/image-jennie.jpg" alt="image-jennie">
                <h4>Jennie from Nike</h4>
                <p>
                    "Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate, 
                    reprehenderit hic. Minima ratione, sunt veniam ea ullam, perferendis 
                    quia eius minus esse animi officiis assumenda nobis, explicabo consectetur 
                    molestiae praesentium?"
                </p>
            </section>
        </div>
    </main>
    <hr>
    <footer>
        <a href="#home">Home</a>
        <a href="#about">About</a>
        <a href="#product">Product</a>
        <a href="#contact">Contact</a>
    </footer>
</body>
</html>
