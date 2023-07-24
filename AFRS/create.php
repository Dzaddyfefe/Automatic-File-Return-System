<?php

// Include the database connection file.
require_once './includes/config.php';

// Check if the form has been submitted.
if (isset($_POST['submit'])) {

    // Get the form data.
    $file = $_FILES['file'];
    $file_name = $file['name'];
    $file_type = $_POST['file_type'];

    // Validate the form data.
    if ($file_name == "" || $file_type == "") {
        echo "<script>alert('Please fill out all of the fields.')</script>";
    } else {

        // Upload the file to the server.
        $file_path = 'Admin/uploads/' . $file_name;
        move_uploaded_file($file['tmp_name'], $file_path);

        // Create a new file return in the database.
        $sql = "INSERT INTO `file_returns` (file_name, file_type, file_path) VALUES ('$file_name', '$file_type', '$file_path')";
        mysqli_query($conn, $sql);
        echo"<script>alert('New file return created successfully')</script>";
        // Redirect the user to the index page.
        header('Location: home.php');
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create New File Return</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<style type="text/css">
body {
    background-color: #f5f5f5;
}

h1 {
    text-align: center;
    font-size: 24px;
    font-weight: bold;
}

form {
    width: 500px;
    margin: 0 auto;
}

.form-control {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
}

.btn {
    width: 100px;
    margin-top: 10px;
}

.btn-primary {
    background-color: #007bff;
    color: white;
}

    header {
  background-color:lightgray;
  color: #fff;
  padding: 20px;
  height: 120px;
}
footer {
  background-color: #000;
  color: #fff;
  padding: 20px;
  margin-top:12%;
}
</style>
</head>
<body>
    <header>
    <div style="display: flex;">
        <a href="home.php"><img src="tax_wizard1.png" style="height:100px;"></a>
        <i class='bx bx-sun' id="toggleDark" style="margin-left:65%; font-size:30px;color: black;"></i>
        <a href="logout.php"><i class='bx bx-log-out' style="font-size:30px;margin-left:20px;"></i></a>
</div>
</header>

<h1 style="text-align:center;">Create New File Return</h1>

<form action="create.php" method="post" enctype="multipart/form-data" class="w-50 m-auto">
    <div class="mb-3">
        <label for="file">File</label>
        <input type="file" name="file" id="file" class="form-control">
    </div>
    <div class="mb-3">
        <label for="file_type">File Type</label>
        <select name="file_type" id="file_type" class="form-control">
            <option value="csv">CSV</option>
            <option value="pdf">PDF</option>
            <option value="xlsx">XLSX</option>
        </select>
    </div>
    <div style="display:flex;">
    <input type="submit" name="submit" value="Create" class="btn btn-primary mt-3">
    <a style="margin-left:80%;margin-top: 30px;" href="home.php">Back</a>
</div>
</form>
<footer>
<p style="text-align: center;">Copyright &copy; 2023 Tax Wizard</p>
</footer>
</body>
</html>
