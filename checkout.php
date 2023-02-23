<?php
if (isset($_GET['cake']) and !empty($_GET['cake'])) {
    $cake_name = $_GET['cake'];
} else {
    $cake_name = 'Angel Cake with Berries and Icing'; // default
}

$connection = mysqli_connect('localhost', 'dconroy', '123abc', 'cake_shop');
if (mysqli_connect_errno()) {
    die('Connection failed: ' . mysqli_connect_error());
}

$cake = mysqli_fetch_assoc(mysqli_query($connection, "SELECT * FROM cakes WHERE name = '$cake_name'"));

echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Checkout</title>

    <link rel="stylesheet" href="styles.css">
';
include 'favicon.html';
echo '</head>
<body>
';
include 'header.html';
echo '    <main>
        <h2>Checkout</h2>
    
        <div class="checkout">
            <section class="cake-info">
                <a href="https://', $cake['image_source'], '">
                    <img src="images/', $cake['image_name'],
                    '" alt="(link to cake image source)" width="240" height="', $cake['image_height'], '">
                </a>
                <div class="cake-name">', $cake['name'], '</div>
                Ingredients: ', $cake['ingredients'], '
                <div class="cake-price">€', $cake['price'], '</div>
            </section>
      
                <section class="order-form">
                <section>
                    <h3>Promotion</h3>
                    <p>
                        Join our Loyalty Club and earn 150 points to get a <strong>free Super Duper Cake!</strong>
                        <br>Your ', $cake['name'], ' will earn you ', ceil($cake['price']), ' points!
                        <br>NOTE: You must first <a href="loyalty.php">sign up for our Loyalty Club</a>
                        before you can earn points and get a free Super Duper Cake.
                    </p>
                </section>
        
                <form action="thankyou.php" method="post">
                    <input type="hidden" name="cake" value="', $cake['name'], '">
        
                    <section>
                        <h3>Payment Details</h3>
                        <p>Please enter your payment details below.</p>
                        <!-- Nothing is done with these payment details on the backend -->
                        <div class="payment-details">
                            <label for="card_number">
                                Card Number<br>
                                <input type="tel" id="card_number" name="card_number" pattern="^\d{8,19}$" required>
                            </label>
                            <div class="expiry-and-csc">
                                <label for="expiry">
                                    Expiry (MM/YY)<br>
                                    <input type="text" id="expiry" name="expiry" placeholder="MM/YY" pattern="^(0[1-9]|1[0-2])\/\d{2}$" required>
                                </label>
                                <label for="csc">
                                    Security Code<br>
                                    <input type="tel" id="csc" name="csc" pattern="^\d{3,4}$" required>
                                </label>
                            </div>
                            <label for="cardholder_name">
                                Cardholder Name<br>
                                <input type="text" id="cardholder_name" name="cardholder_name" required>
                            </label>
                        </div>
                    </section>
          
                    <section>
                        <h3>Contact Details</h3>
                        <p>
                            Please enter your email address below. To earn loyalty points, enter the same email address
                            you used to sign up for our Loyalty Club. (If in doubt, contact us at (01) 234 5678.)
                        </p>
                        <div class="contact-details">
                            <label for="email">
                                Email Address (required)<br>
                                <input type="email" id="email" name="email" required>
                            </label>
                            <label for="mobile">
                                Mobile Number (include if you wish to be texted as soon as your cake is ready for collection)<br>
                                <input type="tel" id="mobile" name="mobile">
                            </label>
                        </div>
                    </section>
          
                    <p>Once ordered, your cake will be ready for collection either today or tomorrow.</p>
          
                    <button type="submit">Make Payment</button>
                </form>
            </section>
        </div>
    </main>
';
include 'footer.html';
echo '</body>
</html>
';
mysqli_close($connection);
?>
