<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="img/web_logo.svg"/>
    <link rel="stylesheet" type="text/css" href="style/style.css"/>
    <title>Puppuccino Palace</title>
</head>
<body>

<?php
session_start();
include './connection.php';

$owner_id = isset($_GET['owner_id']) ? $_GET['owner_id'] : null;

if ($owner_id) {
    // query to get the owner details
    $query = "SELECT * FROM owners WHERE id = $owner_id";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        // fetch the owner data
        $owner = mysqli_fetch_assoc($result);
    } else {
        echo "<p>Owner not found.</p>";
    }
}

$conn->close();
?>

<!-- Owner Details Container -->
<div class="owner-details">
    <?php if (isset($owner)): ?>
        <!-- Owner's Name as the Main Title -->
        <h1><?php echo htmlspecialchars($owner['name']); ?></h1>
        <p><strong>Phone:</strong> <?php echo htmlspecialchars($owner['phone']); ?></p>
        <p><strong>Address:</strong> <?php echo htmlspecialchars($owner['address']); ?></p>
        <p><strong>Email:</strong> <a href="mailto:<?php echo htmlspecialchars($owner['email']); ?>" class="email-link">
            <?php echo htmlspecialchars($owner['email']); ?>
        </a></p>
    <?php endif; ?>
</div>

</body>
</html>
