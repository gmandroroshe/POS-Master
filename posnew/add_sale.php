<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product = $_POST['product'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $total = $quantity * $price;

    $sql = "INSERT INTO sales (product, quantity, price, total) VALUES ('$product', '$quantity', '$price', '$total')";

    if ($conn->query($sql) === TRUE) {
        echo "New sale added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
