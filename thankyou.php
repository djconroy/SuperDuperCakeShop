<?php
if (!isset($_POST['cake']) or empty($_POST['cake'])) {
    die('Error: purchase item details not received');
}
if (!isset($_POST['card_number']) or empty($_POST['card_number'])) {
    die('Error: card number not received');
}
if (!isset($_POST['expiry']) or empty($_POST['expiry'])) {
    die('Error: expiry date not received');
}
if (!isset($_POST['csc']) or empty($_POST['csc'])) {
    die('Error: security code not received');
}
if (!isset($_POST['cardholder_name']) or empty($_POST['cardholder_name'])) {
    die('Error: cardholder name not received');
}
if (!isset($_POST['email']) or empty($_POST['email'])) {
    die('Error: email address not received');
}

$connection = mysqli_connect('localhost', 'dconroy', '123abc', 'cake_shop');
if (mysqli_connect_errno()) {
    die('Connection failed: ' . mysqli_connect_error());
}

$cake = mysqli_fetch_assoc(mysqli_query($connection, "SELECT * FROM cakes WHERE name = '" . $_POST['cake'] . "'"));

$result = mysqli_query($connection, "SELECT * FROM members WHERE email = '" . $_POST['email'] . "'");
$customer_is_a_member = mysqli_num_rows($result) === 1;

if ($customer_is_a_member) {
    $member = mysqli_fetch_assoc($result);
    $prev_points = $member['points'];
    $curr_points = $prev_points + ceil($cake['price']);
    $send_voucher = floor($prev_points / 150) < floor($curr_points / 150);
  
    $query = "UPDATE members SET points = '$curr_points' WHERE email = '" . $_POST['email'] . "'";
    if (!mysqli_query($connection, $query)) {
        die('Error updating loyalty points: ' . mysqli_error($connection));
    }
}

echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  
    <title>Thank You</title>

    <link rel="stylesheet" href="styles.css">
';
include 'favicon.html';
echo '</head>
<body>
';
include 'header.html';
echo '    <div class="centered-620px-width-band">
        <main>
            <h2>Thank You!</h2>
            <p>
                Your payment has been successfully processed. <!-- not implemented -->
                We have emailed you a receipt. <!-- not implemented -->
                Find below the details of your purchase.
            </p>
            <p>
                Cake Bought: ', $cake['name'], '
                <br>Amount Paid: €', $cake['price'], '
            </p>
            ';
if ((isset($_POST['mobile']) and !empty($_POST['mobile']))
    or ($customer_is_a_member and !empty($member['mobile']))) {
    echo '<p>We will text you as soon as your cake is ready for collection (either today or tomorrow).</p>
            ';
}
if ($customer_is_a_member) {
    echo '<p>
                You now have ', $curr_points, ' loyalty points.
                <br>';
    if ($send_voucher) {
        echo 'Congratulations, you have earned over ', ($curr_points - ($curr_points % 150)),
        ' loyalty points!
                <br>We have emailed you a voucher for a <strong>free Super Duper Cake!</strong> <!-- not implemented -->
            </p>';
    } else {
        echo 'Earn ', 150 - ($curr_points % 150),
        ' more points to get a <strong>free Super Duper Cake!</strong>
            </p>';
    }
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
