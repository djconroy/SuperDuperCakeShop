<?php
if (!isset($_POST['email']) or empty($_POST['email'])) {
    die('Error: email address not received');
}
if (!isset($_POST['name']) or empty($_POST['name'])) {
    die('Error: name not received');
}

$connection = mysqli_connect('localhost', 'dconroy', '123abc', 'cake_shop');
if (mysqli_connect_errno()) {
    die('Connection failed: ' . mysqli_connect_error());
}

$result = mysqli_query($connection, "SELECT * FROM members WHERE email = '" . $_POST['email'] . "'");
$already_a_member = mysqli_num_rows($result) === 1;

if ($already_a_member) {
    $member = mysqli_fetch_assoc($result);
} else {
    // Record new member in database
    if (!isset($_POST['mobile']) or empty($_POST['mobile'])) {
        $query = "INSERT INTO members (name, email) VALUES ('" . $_POST['name'] . "', '" . $_POST['email'] . "')";
    } else {
        $query = "INSERT INTO members (name, email, mobile) VALUES ('" . $_POST['name'] . "', '" . $_POST['email'] . "', '" . $_POST['mobile'] . "')";
    }
    if (!mysqli_query($connection, $query)) {
        die('Error: ' . mysqli_error($connection));
    }
}

echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  
    <title>', $already_a_member ? 'You are already a Member of Our Loyalty Club' : 'Welcome to Our Loyalty Club',
    '</title>
  
    <link rel="stylesheet" href="styles.css">
  
    <style>#loyalty { display: none; }</style>
';
include 'favicon.html';
echo '</head>
<body>
';
include 'header.html';
echo '    <div class="centered-620px-width-band">
        <main>
            ';
if ($already_a_member) {
    echo '<h2>You are already a Member of Our Loyalty Club!</h2>
            <h3>Loyalty Club Membership Details</h3>
            <p>
                Name: ', $member['name'],
                '<br>Loyalty Points: ', $member['points'],
                '<br>Email Address: ', $member['email'],
                '<br>Mobile Number: ', empty($member['mobile']) ? 'not provided' : $member['mobile'], '
            </p>
            <p>
                Earn ', 150 - ($member['points'] % 150),
                ' more loyalty points to get a <strong>free Super Duper Cake!</strong>
                <br>Check out <a href="index.php#selection">our selection of Super Duper Cakes</a>.
            </p>';
} else { // new member
    echo '<h2>Welcome to Our Loyalty Club, ', $_POST['name'], '!</h2>
            <p>
                Now you can earn points whenever you buy one of our Super Duper Cakes.
                <br>Earn 150 points to get a <strong>free Super Duper Cake!</strong>
                <br>Check out <a href="index.php#selection">our selection of Super Duper Cakes</a>.
            </p>';
}
echo '
        </main>
    </div>
';
include 'footer.html';
echo '</body>
</html>
';
mysqli_close($connection);
?>
