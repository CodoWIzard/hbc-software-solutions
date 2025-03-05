<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hbc_software";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Fetch images
    $stmt = $conn->query("SELECT * FROM images");
    $images = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Database error: " . $e->getMessage());
}

// Close connection
$conn = null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Image Gallery</title>
</head>
<body>
    <h2>Uploaded Images</h2>
    <?php foreach ($images as $image): ?>
        <div>
            <img src="/src/assets/images/berryblast.png<?= htmlspecialchars($image['filename']) ?>" width="200" alt="Image">
            <p><?= htmlspecialchars($image['description']) ?></p>
        </div>
    <?php endforeach; ?>
</body>
</html>
