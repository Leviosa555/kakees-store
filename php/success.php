<?php
require 'db.php';

// Fetch all users from the 'registrations' table
$query = "SELECT * FROM registrations";
$stmt = $conn->query($query);
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Get query parameters (if any)
$name = isset($_GET['name']) ? htmlspecialchars($_GET['name']) : '';
$email = isset($_GET['email']) ? htmlspecialchars($_GET['email']) : '';
$phone = isset($_GET['phone']) ? htmlspecialchars($_GET['phone']) : '';
$cake_type = isset($_GET['cake_type']) ? htmlspecialchars($_GET['cake_type']) : '';
$description = isset($_GET['description']) ? htmlspecialchars($_GET['description']) : '';
$delivery_date = isset($_GET['delivery_date']) ? htmlspecialchars($_GET['delivery_date']) : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Successful</title>
    <link rel="stylesheet" href="../css/success.css">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Pacifico&display=swap" rel="stylesheet">
</head>
<body>

<header>
    <h1 class="site-title">Kake'es Store</h1>
    <nav>
        <ul>
            <li><a href="../index.html">Home</a></li>
            <li><a href="../about.html">About</a></li>
            <li><a href="../cakes.html">Cakes</a></li>
            <li><a href="../contact.html">Contact</a></li>
        </ul>
    </nav>
</header>

<section class="hero">
    <h2>Registration Successful!</h2>
    <p>Thank you for registering. Here are your submitted details:</p>
</section>

<section class="registration-details">
    <p><strong>Full Name:</strong> <?php echo $name; ?></p>
    <p><strong>Email:</strong> <?php echo $email; ?></p>
    <p><strong>Phone:</strong> <?php echo $phone; ?></p>
    <p><strong>Type of Cake:</strong> <?php echo $cake_type; ?></p>
    <p><strong>Description:</strong> <?php echo $description; ?></p>
    <p><strong>Delivery Date:</strong> <?php echo $delivery_date; ?></p>
</section>

<!-- Registered Users Section -->
<section class="registered-users">
    <h2>Registered Users</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Cake Type</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($users as $user): ?>
        <tr>
            <td><?php echo htmlspecialchars($user['id']); ?></td>
            <td><?php echo htmlspecialchars($user['name']); ?></td>
            <td><?php echo htmlspecialchars($user['email']); ?></td>
            <td><?php echo htmlspecialchars($user['phone']); ?></td>
            <td><?php echo htmlspecialchars($user['cake_type']); ?></td>
            <td>
                <a href="edit_user.php?id=<?php echo $user['id']; ?>">Edit</a> | 
                <a href="delete_user.php?id=<?php echo $user['id']; ?>">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</section>

<!-- Centered Back to Home Button -->
<div class="back-button-container">
    <a href="../index.html" class="btn">Back to Home</a>
</div>

<footer>
    <p>&copy; 2024 Kake'es Store | Designed with ❤️</p>
</footer>

</body>
</html>
