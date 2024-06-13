<?php
require 'connection.php';

$error_message = "";
$success_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $book_id = $_POST["book_id"];
    $book_name = $_POST["book_name"];
    $book_category_id = $_POST["book_category_id"];

    // Book ID format
    if (!preg_match("/^B\d{3}$/", $book_id)) {
        $error_message = "Book ID should be in the format B001.";
    } else {
        
        $sql = "INSERT INTO book (book_id, book_name, category_id) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);

        if ($stmt === false) {
            
            $error_message = "Error: " . $conn->error;
        } else {
            
            $stmt->bind_param("sss", $book_id, $book_name, $book_category_id);

            
            if ($stmt->execute()) {
                $success_message = "<b>$book_name book registered successfully!";
            } else {
                
                if ($conn->errno == 1062) { 
                    $sql_fetch_book_name = "SELECT book_name FROM book WHERE book_id = ?";
                    $stmt_fetch_book_name = $conn->prepare($sql_fetch_book_name);
                    $stmt_fetch_book_name->bind_param("s", $book_id);
                    $stmt_fetch_book_name->execute();
                    $stmt_fetch_book_name->bind_result($registered_book_name);
                    $stmt_fetch_book_name->fetch();
                    $stmt_fetch_book_name->close();

                    $error_message = "This book ( $registered_book_name ) is already registered under this ID - $book_id.";
                } else {
                    $error_message = "Error: " . $stmt->error;
                }
            }

            $stmt->close();
        }
    }
}


$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Registration</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding: 20px;
        }
        .form-container {
            max-width: 500px;
            margin: auto;
        }
    </style>
</head>
<body>
<div class="container mt-4 form-container">
    <h2 class="text-center">Register a New Book</h2>
    <br>
    <?php

    if ($error_message) {
        echo " 
        <div class='alert alert-danger'>       
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
        </button>
        $error_message
        </div>";
    }


    if ($success_message) {
        echo "
        <div class='alert alert-success'>
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
        </button>
        $success_message
        </div>";
    }
    ?>
    <form method="post" action="process.php" class="mt-4">
        <div class="form-group">
            <label for="book_id">Book ID:</label>
            <input type="text" id="book_id" name="book_id" class="form-control" required pattern="B\d{3}" title="Book ID should be in the format B001">
        </div>
        <div class="form-group">
            <label for="book_name">Book Name:</label>
            <input type="text" id="book_name" name="book_name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="book_category">Book Category:</label>
            <select id="book_category" name="book_category" class="form-control" required>
                <option value="C001">Sci-fi</option>
                <option value="C002">Adventure</option>
            </select>
        </div>

        <input type="hidden" id="book_category_id" name="book_category_id">
        <button type="submit" class="btn btn-primary btn-block">Register Book</button>
    </form>
    <br>
    <div class="d-inline">
        <button class="btn btn-info btn-block" onclick="showDatabaseDetails()">Show Database Details</button>
        <br>
        <form method="post" action="book_registration_index.php" class="d-inline">
            <button type="submit" class="btn btn btn-dark btn-block">Back to Book Registration</button>
        </form>
    </div>
    <script>
        document.getElementById('book_category').addEventListener('change', function() {
            var selectedOption = this.options[this.selectedIndex];
            document.getElementById('book_category_id').value = selectedOption.value;
        });


        document.getElementById('book_category').dispatchEvent(new Event('change'));

        function showDatabaseDetails() {

            window.location.href = 'database_details.php';
        }
    </script>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
