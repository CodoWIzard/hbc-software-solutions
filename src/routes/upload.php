<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["image"])) {
    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "hbc_software";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // File properties
        $image = $_FILES["image"];
        $filename = basename($image["name"]);
        $targetDir = "\hbc-software-solutions\src\assets\images";  // Folder where images will be stored
        $targetFile = $targetDir . $filename;
        $description = $_POST["description"];

        // Move uploaded file to server directory
        if (move_uploaded_file($image["tmp_name"], $targetFile)) {
            // Save filename and description in the database
            $stmt = $conn->prepare("INSERT INTO images (filename, description) VALUES (:filename, :description)");
            $stmt->bindParam(":filename", $filename);
            $stmt->bindParam(":description", $description);
            $stmt->execute();

            echo "Image uploaded successfully.";
        } else {
            echo "Error uploading file.";
        }
    } catch (PDOException $e) {
        echo "Database error: " . $e->getMessage();
    }

    // Close connection
    $conn = null;
}
?>
