<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  
    <title>Join Our Loyalty Club</title>
  
    <link rel="stylesheet" href="styles.css">
  
    <style>#loyalty { display: none; }</style>
  
<?php include 'favicon.html'; ?>
</head>
<body>
    <?php include 'header.html'; ?>
    <div class="centered-620px-width-band">
        <main id="sign-up">
            <h2>Sign Up for Our Loyalty Club!</h2>
            <p>
                As a member of our Loyalty Club, you will earn points with every Super Duper Cake you buy.
                <br>For every 150 points you earn, you will receive a voucher for a <strong>free Super Duper Cake!</strong>
                <br>Each euro spent earns you 1 point.
            </p>
            <form action="welcome.php" method="post">
                <h3>Member Details</h3>
                <p>Please enter your details below.</p>
                <div class="member-details">
                    <label for="name">
                        Name (required)<br>
                        <input type="text" id="name" name="name" required>
                    </label>
                    <label for="email">
                        Email Address (required)<br>
                        <input type="email" id="email" name="email" required>
                    </label>
                    <label for="mobile">
                        Mobile Number (optional)<br>
                        <input type="tel" id="mobile" name="mobile">
                    </label>
                </div>
                <p>
                    NOTE: To earn points when buying a Super Duper Cake on our website, you must
                    provide the same email address you used to sign up for our Loyalty Club.
                </p>
                <button type="submit">Join Our Loyalty Club!</button>
            </form>
        </main>
    </div>
<?php include 'footer.html'; ?>
</body>
</html>
