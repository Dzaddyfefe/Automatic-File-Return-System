<!DOCTYPE html>
<html>
<head>
    <title>Edit File Return</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <style>
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
<h1 class="text-center">Edit File Return</h1>

<?php

// Include the database connection file.
require_once './includes/config.php';

// Get the ID of the file return to edit.
$id = $_GET['id'];

// Get the file return from the database.
$sql = "SELECT * FROM `file_returns` WHERE id = $id";
$results = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($results);

// Create a form to edit the file return.
echo '<form action="edit.php?id=' . $id . '" method="post">';
echo '<input type="hidden" name="id" value="' . $id . '">';
echo '<h2>File Name</h2>';
echo '<input type="text" name="file_name" value="' . $row['file_name'] . '">';
echo '<h2>File Type</h2>';
echo '<input type="text" name="file_type" value="' . $row['file_type'] . '">';
echo '<br><input type="submit" value="Save" class="bg-success">';
echo '</form>';

?>
<a class="btn btn-primary pd-3 mt-3" href="home.php">Back</a>
<footer>
<p style="text-align: center;">Copyright &copy; 2023 Tax Wizard</p>
</footer>
</body>
</html>
