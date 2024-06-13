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
    <button class="btn btn-info btn-block" onclick="showDatabaseDetails()">Show Database Details</button>

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
