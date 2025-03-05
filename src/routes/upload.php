<?php
//require './src/config/database.php';

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

$uploadDir = __DIR__ . "/../images/"; // Ensure it points to your actual "images" directory
$targetFilePath = $uploadDir . basename($_FILES["image"]["name"]);

if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0777, true); // Create the directory if it doesn't exist
}

if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {
    echo "File moved successfully to: " . $targetFilePath . "<br>";

    // Store the relative path instead of absolute
    $relativeFilePath = "images/" . basename($_FILES["image"]["name"]);

    try {
        $pdo = new PDO("mysql:host=localhost;dbname=hbc_software", "root", "");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->prepare("INSERT INTO images (image_path) VALUES (:image_path)");
        $stmt->bindParam(":image_path", $relativeFilePath);

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

?>
