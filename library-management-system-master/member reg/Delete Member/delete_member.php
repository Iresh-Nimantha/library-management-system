<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "library_system";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $member_id = $_POST['memberId'];

    $checkSql = "SELECT * FROM member WHERE member_id = '$member_id'";
    $checkResult = $conn->query($checkSql);

    if ($checkResult->num_rows > 0) {
        $deleteSql = "DELETE FROM member WHERE member_id = '$member_id'";
        if ($conn->query($deleteSql) === TRUE) {
            die("Member deleted successfully");
        } else {
            die("Error deleting member: " . $conn->error);
        }
    } else {
        die("Invalid user or user already deleted");
    }
}
?>
