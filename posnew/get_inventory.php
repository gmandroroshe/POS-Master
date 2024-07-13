<?php
include 'db.php';

// SQL query to fetch all products
$sql = "SELECT * FROM products";
$result = $conn->query($sql);

$products = [];

// Check if there are rows in the result set
if ($result->num_rows > 0) {
    // Fetch associative array of products
    while($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
}

// Output JSON encoded array of products
echo json_encode($products);

// Close connection
$conn->close();
?>
