<?php
require 'db.php';
$sql = "SELECT * FROM registrations";
$stmt = $conn->query($sql);
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($results as $row) {
    echo $row['name'] . ' - ' . $row['email'] . ' - ' . $row['cake_type'] . '<br>';
}
?>
