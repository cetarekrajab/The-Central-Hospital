<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
header('Content-Type: text/plain');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "central_hospital";

$conn = new mysqli($servername, $username, $password);
if ($conn->connect_error) {
    die("Connection failed: ". $conn->connect_error);
}

$conn->query("CREATE DATABASE IF NOT EXISTS $dbname");
$conn->select_db($dbname);

$sql = "CREATE TABLE IF NOT EXISTS appointments (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    patient_name VARCHAR(100) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    email VARCHAR(100) NOT NULL,
    blood_type VARCHAR(5) NOT NULL,
    department VARCHAR(100) NOT NULL,
    appointment_date VARCHAR(50) NOT NULL,
    appointment_time VARCHAR(50) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
$conn->query($sql);

$raw_data = file_get_contents('php://input');
$data = $_POST;

if (empty($data)) {
    $contentType = $_SERVER['CONTENT_TYPE'] ?? $_SERVER['HTTP_CONTENT_TYPE'] ?? '';

    if (stripos($contentType, 'application/json') !== false) {
        $json = json_decode($raw_data, true);
        if (is_array($json)) {
            $data = $json;
        }
    }
}

if (empty($data) && !empty($raw_data)) {
    parse_str($raw_data, $parsed);
    if (is_array($parsed) && count($parsed) > 0) {
        $data = $parsed;
    }
}

$patient_name = $data['patient-name'] ?? $data['patient_name'] ?? '';
$phone        = $data['patient-phone'] ?? $data['patient_phone'] ?? '';
$email        = $data['patient-email'] ?? $data['patient_email'] ?? '';
$blood_type   = $data['blood-type'] ?? $data['blood_type'] ?? '';
$department   = $data['department'] ?? '';
$date         = $data['appointment_date'] ?? $data['appointment-date'] ?? $data['date'] ?? '';
$time         = $data['appointment_time'] ?? $data['appointment-time'] ?? $data['time'] ?? '';

if ($patient_name && $phone && $email && $blood_type && $department && $date && $time) {
    $stmt = $conn->prepare("INSERT INTO appointments (patient_name, phone, email, blood_type, department, appointment_date, appointment_time) VALUES (?, ?, ?, ?, ?, ?, ?)");
    if (!$stmt) {
        echo "Prepare failed: ". $conn->error;
        $conn->close();
        exit;
    }

    $stmt->bind_param("sssssss", $patient_name, $phone, $email, $blood_type, $department, $date, $time);

    if ($stmt->execute()) {
        echo "Appointment booked successfully!";
    } else {
        echo "Error: ". $stmt->error;
    }

    $stmt->close();
} else {
    echo "Error: Missing form data.\n";
    echo "Received fields:\n";
    echo "patient_name: ". ($patient_name !== '' ? $patient_name : '[empty]'). "\n";
    echo "phone: ". ($phone !== '' ? $phone : '[empty]'). "\n";
    echo "email: ". ($email !== '' ? $email : '[empty]'). "\n";
    echo "blood_type: ". ($blood_type !== '' ? $blood_type : '[empty]'). "\n";
    echo "department: ". ($department !== '' ? $department : '[empty]'). "\n";
    echo "date: ". ($date !== '' ? $date : '[empty]'). "\n";
    echo "time: ". ($time !== '' ? $time : '[empty]'). "\n";
    echo "\nIf this is a browser form submit, ensure your <form> has method=\"post\" and the inputs are named correctly.";
}

$conn->close();
?>