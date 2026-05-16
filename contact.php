<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "central_hospital";

$userMessage = "";
$isError = false;

$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
    $userMessage = "Connection failed: " . $conn->connect_error;
    $isError = true;
} else {
    $conn->query("CREATE DATABASE IF NOT EXISTS $dbname");
    $conn->select_db($dbname);

    $table_sql = "CREATE TABLE IF NOT EXISTS messages (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        first_name VARCHAR(50) NOT NULL,
        last_name VARCHAR(50) NOT NULL,
        email VARCHAR(100) NOT NULL,
        phone VARCHAR(20),
        reason VARCHAR(50) NOT NULL,
        message TEXT NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";

    if (!$conn->query($table_sql)) {
        $userMessage = "Error creating table: " . $conn->error;
        $isError = true;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && !$isError) {
        $fname = $_POST['fname'] ?? '';
        $lname = $_POST['lname'] ?? '';
        $email = $_POST['email'] ?? '';
        $phone = $_POST['phone'] ?? '';
        $reason = $_POST['contact_reason'] ?? '';
        $message = $_POST['message'] ?? '';

        if (!empty($fname) && !empty($lname) && !empty($email) && !empty($reason) && !empty($message)) {
            $stmt = $conn->prepare("INSERT INTO messages (first_name, last_name, email, phone, reason, message) VALUES (?, ?, ?, ?, ?, ?)");
            
            if (!$stmt) {
                $userMessage = "Prepare failed: " . $conn->error;
                $isError = true;
            } else {
                $stmt->bind_param("ssssss", $fname, $lname, $email, $phone, $reason, $message);
                if ($stmt->execute()) {
                    $userMessage = "Message has been sent!";
                    $isError = false;
                } else {
                    $userMessage = "Error: " . $stmt->error;
                    $isError = true;
                }
                $stmt->close();
            }
        } else {
            $userMessage = "Error: Please fill in all required fields.";
            $isError = true;
        }
    } elseif ($_SERVER["REQUEST_METHOD"] != "POST" && !$isError) {
        $userMessage = "Error: Invalid request. Please submit the form.";
        $isError = true;
    }
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Submitting...</title>
</head>
<body>
    <script>
        alert("<?php echo addslashes($userMessage); ?>");
        window.location.href = 'SendUsAMessage.html';
    </script>
</body>
</html>