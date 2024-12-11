<?php
require 'db.php';
$id = $_POST['id'];
$new_email = $_POST['email'];

$sql = "UPDATE registrations SET email = :email WHERE id = :id";
$stmt = $conn->prepare($sql);
$stmt->execute([':email' => $new_email, ':id' => $id]);
echo "Update successful";
?>
