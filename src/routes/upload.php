<?php
//require './src/config/database.php'; // Database connection file

class Database {
    private $host = "localhost";
    private $db_name = "hbc_software";
    private $username = "root";
    private $password = "";
    public $conn;

    public function getConnection() {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }
        return $this->conn;
    }
}

if (isset($_POST['submit'])) {
    $targetDir = "uploads/"; // Folder to store images
    $fileName = basename($_FILES["image"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    echo "Received file: " . $fileName . "<br>";

    // Allow only certain file types
    $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];
    if (in_array(strtolower($fileType), $allowedTypes)) {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {
            echo "File moved successfully to: " . $targetFilePath . "<br>";

            // Store the file path in the database
            try {
                $pdo = new PDO("mysql:host=localhost;dbname=your_database", "your_username", "your_password");
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $stmt = $pdo->prepare("INSERT INTO images (image_path) VALUES (:image_path)");
                $stmt->bindParam(":image_path", $targetFilePath);

                if ($stmt->execute()) {
                    echo "Image path stored in database successfully!";
                } else {
                    echo "Failed to insert into database.";
                }
            } catch (PDOException $e) {
                echo "Database error: " . $e->getMessage();
            }
        } else {
            echo "Error moving uploaded file.";
        }
    } else {
        echo "Invalid file format.";
    }
} else {
    echo "No file received.";
}
?>
