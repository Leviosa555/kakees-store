<?php
require 'db.php';

if (isset($_GET['id'])) {
    $user_id = $_GET['id'];

    // Fetch user data from the database
    $query = "SELECT * FROM registrations WHERE id = :id";
    $stmt = $conn->prepare($query);
    $stmt->execute([':id' => $user_id]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $phone = htmlspecialchars($_POST['phone']);
        $cake_type = htmlspecialchars($_POST['cake_type']);
        $description = htmlspecialchars($_POST['description']);
        $delivery_date = htmlspecialchars($_POST['delivery_date']);

        // Update the user details
        $update_query = "UPDATE registrations SET name = :name, email = :email, phone = :phone, 
                        cake_type = :cake_type, description = :description, delivery_date = :delivery_date 
                        WHERE id = :id";
        $stmt = $conn->prepare($update_query);
        $stmt->execute([
            ':name' => $name,
            ':email' => $email,
            ':phone' => $phone,
            ':cake_type' => $cake_type,
            ':description' => $description,
            ':delivery_date' => $delivery_date,
            ':id' => $user_id
        ]);

        header("Location: success.php?name=$name&email=$email&phone=$phone&cake_type=$cake_type&description=$description&delivery_date=$delivery_date");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link rel="stylesheet" href="../css/success.css">
</head>
<body>

<h2>Edit User Details</h2>

<form method="POST">
    <label for="name">Full Name:</label>
    <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($user['name']); ?>" required>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>

    <label for="phone">Phone:</label>
    <input type="text" id="phone" name="phone" value="<?php echo htmlspecialchars($user['phone']); ?>" required>

    <label for="cake_type">Type of Cake:</label>
    <input type="text" id="cake_type" name="cake_type" value="<?php echo htmlspecialchars($user['cake_type']); ?>" required>

    <label for="description">Description:</label>
    <textarea id="description" name="description"><?php echo htmlspecialchars($user['description']); ?></textarea>

    <label for="delivery_date">Delivery Date:</label>
    <input type="date" id="delivery_date" name="delivery_date" value="<?php echo htmlspecialchars($user['delivery_date']); ?>" required>

    <button type="submit">Update</button>
</form>

</body>
</html>
