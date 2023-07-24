<!DOCTYPE html>
<html>
<head>
    <title>Delete File Return</title>
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
<h1 class="text-center">Delete File Return</h1>

<?php

// Include the database connection file.
require_once './includes/config.php';

// Get the ID of the file return to delete.
$id = $_GET['id'];

// Check if the user is sure they want to delete the file return.
if (isset($_POST['confirm'])) {

    // Delete the file return from the database.
    $sql = "DELETE FROM `file_returns` WHERE id = $id";
    mysqli_query($conn, $sql);

    // Redirect the user to the index page.
    header('Location: home.php');
} else {

    // Show a confirmation message.
    echo '<p>Are you sure you want to delete this file return?</p>';
    echo '<a href="delete.php?id=' . $id . '&confirm=1" class="btn btn-danger" style="margin-left:3px;">Yes</a> | <a href="home.php" class="btn btn-success" style="margin-left:3px">No</a>';
}

?>
<br>
<a class="btn btn-primary pd-3 mt-3" href="home.php" style="margin-left:3px;">Back</a>
<footer>
<p style="text-align: center;">Copyright &copy; 2023 Tax Wizard</p>
</footer>
</body>
</html>
