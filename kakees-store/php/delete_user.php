<?php
require 'db.php';

if (isset($_GET['id'])) {
    $user_id = $_GET['id'];

    // Delete user from the database
    $query = "DELETE FROM registrations WHERE id = :id";
    $stmt = $conn->prepare($query);
    $stmt->execute([':id' => $user_id]);

    header("Location: success.php");

    exit();
}
?>
