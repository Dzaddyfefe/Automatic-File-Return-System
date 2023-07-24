<?php

// Include the database connection file.
require_once './includes/config.php';

// Check if the form has been submitted.
if (isset($_POST['submit'])) {

    // Get the form data.
    $first_name = $_POST['fname'];
    $last_name = $_POST['lname'];
    $pin = $_POST['pin'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    // Check if the password and confirm password match.
    if ($password !== $cpassword) {
        echo "<script>alert('The passwords do not much')</script>";
    } else {

        // Check if the user already exists in the database.
        $sql = "SELECT * FROM `users` WHERE pin = '$pin' or email='$email'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            echo "<script>alert('This user already exists')</script>";
        } else {

            // Insert the user into the database.
            $sql = "INSERT INTO `users` (f_name, l_name, pin, address, email, password) VALUES ('$first_name', '$last_name', '$pin', '$address', '$email', '$password')";
            mysqli_query($conn, $sql);

            // Redirect the user to the login page.
            echo "<script>alert('Registered successfully')</script>";
            header('Location: login.php');
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Register for Automatic Return System</title>
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
  margin-top: 20px;
  margin-bottom: 20px;
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
  <label>First Name</label>
  <input type="text" name="fname"  placeholder="First name">
</div>
<div class="form-group">
  <label>Last Name</label>
  <input type="text" name="lname"  placeholder="Last name"required>
</div>
<div class="form-group">
  <label>Address</label>
  <input  name="address"  placeholder="address"required>
</div>
<div class="form-group">
	<label>PIN</label>
	<input  name="pin" id="pin" placeholder="PIN"required>
</div>
<div class="form-group">
	<label>Password</label>
	<input type="password" name="password"  placeholder="Password"required>
</div>
<div class="form-group">
	<label>Confirm Password</label>
	<input type="password" name="cpassword"  placeholder="Confirm Password"required>
</div>
<div class="form-group">
	<label> Email</label>
	<input type="email" name="email"  placeholder="Email"required>
</div>
	<input type="submit" value="Register" class="btn btn-primary" name="submit">
</form>
</main>
<footer>
	<p>Already have an account? <a href="login.php">Login</a></p>
</footer>
</body>
</html>
