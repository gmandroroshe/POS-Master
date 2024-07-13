<?php
include 'db.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Fetch form data
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $category = $_POST['category'];
    $supplier = $_POST['supplier'];
    $purchase_price = $_POST['purchase_price'];
    $selling_price = $_POST['selling_price'];
    $quantity = $_POST['quantity'];

    // SQL query to insert data into products table
    $sql = "INSERT INTO products (product_id, product_name, category, supplier, purchase_price, selling_price, quantity)
            VALUES ('$product_id', '$product_name', '$category', '$supplier', '$purchase_price', '$selling_price', '$quantity')";

    // Execute query
    if ($conn->query($sql) === TRUE) {
        echo "New product added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close connection
    $conn->close();
}
?>
