<?php
include 'db.php';

$sql = "SELECT SUM(total) AS total_sales FROM sales";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo $row['total_sales'];
} else {
    echo "0";
}

$conn->close();
?>
