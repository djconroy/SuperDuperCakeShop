<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  
    <title>Super Duper Cake Shop</title>
  
    <link rel="stylesheet" href="styles.css">
  
    <meta name="theme-color" content="#ff388a">
    <meta name="keywords" content="Cake, Cakes, Cake Shop, Super Duper">
    <meta name="description" content="Super Duper Cake Shop, located in Dublin, sells a variety of cakes snd has a loyalty club">
  
    <style>#home { display: none; }</style>
  
<?php include 'favicon.html'; ?>
</head>
<body>
<?php include 'header.html'; ?>
    <main>
        <h2 id="selection">Our Selection of Super Duper Cakes</h2>
    
        <form action="checkout.php" method="get">
            <div class="cakes">
                <?php
                $connection = mysqli_connect('localhost', 'dconroy', '123abc', 'cake_shop');
                if (mysqli_connect_errno()) {
                    die('Connection failed: ' . mysqli_connect_error());
                }
                $cakes = mysqli_query($connection, 'SELECT * FROM cakes ORDER BY order_in_list');
        
                while ($cake = mysqli_fetch_array($cakes)) {
                    // Cake card div inspired by https://uiverse.io/detail/alexruix/moody-goose-93
                    echo '
                <div class="cake-card">
                    <a href="https://', $cake['image_source'], '">
                        <img src="images/', $cake['image_name'],
                        '" alt="(link to cake image source)" width="240" height="', $cake['image_height'], '">
                    </a>
                    <div class="cake-name">', $cake['name'], '</div>
                    Ingredients: ', $cake['ingredients'], '
                    <div class="cake-card-footer">
                        <span class="cake-price">€', $cake['price'], '</span>
                        <button type="submit" name="cake" value="', $cake['name'], '">Buy</button>
                    </div>
                </div>';
                }
                mysqli_close($connection);
                ?>
            </div>
        </form>
    </main>
<?php include 'footer.html'; ?>
</body>
</html>
