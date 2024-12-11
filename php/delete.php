<?php
require 'db.php';
$id = $_GET['id'];

$sql = "DELETE FROM registrations WHERE id = :id";
$stmt = $conn->prepare($sql);
$stmt->execute([':id' => $id]);

echo "Record deleted";
?>
