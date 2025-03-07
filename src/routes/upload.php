<?php

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

$uploadDir = realpath(__DIR__ . "/../assets/images/") . "/";
$fileName = basename($_FILES["image"]["name"]);
$targetFilePath = $uploadDir . $fileName;


if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}


if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {
    echo "File moved successfully to: " . $targetFilePath . "<br>";


    $relativeFilePath = "assets/images/" . $fileName;

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
