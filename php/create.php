<?php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize inputs to prevent XSS
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $cake_type = htmlspecialchars($_POST['cake_type']);
    $description = htmlspecialchars($_POST['description']);
    $delivery_date = htmlspecialchars($_POST['delivery_date']);

    try {
        // SQL query to insert data into the database
        $sql = "INSERT INTO registrations (name, email, phone, cake_type, description, delivery_date) 
                VALUES (:name, :email, :phone, :cake_type, :description, :delivery_date)";
        
        // Prepare and execute the statement
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            ':name' => $name,
            ':email' => $email,
            ':phone' => $phone,
            ':cake_type' => $cake_type,
            ':description' => $description,
            ':delivery_date' => $delivery_date
        ]);

        // Redirect to success page with query parameters
        header("Location: success.php?name=$name&email=$email&phone=$phone&cake_type=$cake_type&description=$description&delivery_date=$delivery_date");
        exit();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
