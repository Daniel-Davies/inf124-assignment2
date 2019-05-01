<?php
$servername = "localhost";
$user = "root";
$pass = "Danio123";
$dbname = "inf124";

// Create connection
$conn = new mysqli($servername, $user, $pass, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$pid = $_POST['product-id'];
$img = $_POST['product-img'];
$p_name = $_POST['product-name'];
$quantity = $_POST['quantity'];
$first_name = $_POST['first-name'];
$last_name = $_POST['last-name'];
$suffix = $_POST['suffix'];
$address = $_POST['shipping-address'];
$card = $_POST['credit-card-number'];
$shipping = $_POST['delivery-method'];
$last4card = substr($card, -4);

$sql = "INSERT INTO orders (img, p_name, p_id, quantity, first_name, last_name, suffix, address, card, shipping)
VALUES ('$img', '$p_name', '$pid', $quantity, '$first_name', '$last_name', '$suffix', '$address', '$last4card', '$shipping')";

if ($conn->query($sql) === TRUE) {

    $template = file_get_contents('confirmation.html', FILE_USE_INCLUDE_PATH);

    $page = str_replace('{$first_name}',$first_name,$template);
    $page = str_replace('{$last_name}',$last_name,$page);
    $page = str_replace('{$p_name}',$p_name,$page);
    $page = str_replace('{$pid}',$pid,$page);
    $page = str_replace('{$img}',$img,$page);
    $page = str_replace('{$quantity}',$quantity,$page);
    $page = str_replace('{$suffix}',$suffix,$page);
    $page = str_replace('{$address}',$address,$page);
    $page = str_replace('{$last4card}',$last4card,$page);
    $page = str_replace('{$shipping}',$shipping,$page);

    echo $page;
} else {
    echo "Your insert has failed:" . $sql . "<br>" . $conn->error;
}

$conn->close();
?>