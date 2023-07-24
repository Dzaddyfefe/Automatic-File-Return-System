<?php

// Include the database connection file.
require_once './includes/config.php';

// Check if the form has been submitted.
if (isset($_POST['submit'])) {

    // Get the form data.
    $pin = $_POST['pin'];
    $password = $_POST['password'];

    // Check if the user exists in the database.
    $sql = "SELECT * FROM users WHERE pin = '$pin' AND password = '$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {

        // The user exists, so log them in.
        session_start();
        $_SESSION['user_id'] = mysqli_fetch_assoc($result)['pin'];
        echo"<script>alert('Logged in successfully')</script>";
        header('Location: home.php');
    } else {

        // The user does not exist, so show an error message.
        echo "<script>alert('The user does not exist.')</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login to Automatic Return System</title>
	<link rel="stylesheet" href="style.css">
<style type="text/css">
	body {
  font-family: sans-serif;
  margin: 0;
  padding: 0;
  background-color: #fff;
}

header {
  background-color: lightgray;
  color: #fff;
  padding: 20px;
  height: 80px;
}

h1 {
  font-size: 3em;
}

main {
  margin: 0 auto;
  width: 400px;
}

form {
  margin-top: 40px;
  margin-bottom: 100px;
}

.form-group {
  margin-bottom: 10px;
}

label {
  font-weight: bold;
}

input {
  width: 100%;
  padding: 10px;
  border: 1px solid #ccc;
}

.btn {
  background-color: #000;
  color: #fff;
  padding: 10px 20px;
  border: none;
  cursor: pointer;
}

.btn-primary {
  background-color: #007bff;
}

footer {
  background-color: #000;
  color: #fff;
  padding: 20px;
  bottom: 0;
}

a {
  color: #007bff;
  text-decoration: none;
}

a:hover {
  text-decoration: underline;
}

</style>
</head>
<body>
<header>
	<a href="index.html"><img src="tax_wizard1.png" style="height:100px;"></a>
</header>
<main>
<form action="" method="post">
<div class="form-group">
	<label for="username">PIN</label>
	<input type="text" name="pin" id="pin" placeholder="PIN" required>
</div>
<div class="form-group">
	<label for="password">Password</label>
	<input type="password" name="password" id="password" placeholder="Password" required>
</div>
	<input type="submit" name="submit" value="Login" class="btn btn-primary">
	<a href="forgot_pass.html">Forgot your password?</a>
</form>
</main>
<footer>
	<p>Don't have an account? <a href="register.php">Register</a></p>
</footer>
</body>
</html>
