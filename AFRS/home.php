<?php
include("./includes/config.php");
session_start();
// Check if the user is logged in.
if (!isset($_SESSION['user_id'])) {

    // The user is not logged in, so redirect them to the login page.
    header('Location: login.php');
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Automatic File Returns</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
 <style>

  	table {
    width: 100%;
    border-collapse: collapse;
}

th, td {
    border: 1px solid black;
    padding: 10px;
}

th {
    text-align: left;
}

 	header {
  background-color:lightgray;
  color: #fff;
  padding: 20px;
  height: 120px;
}
footer {
  background-color: red;
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
<h1>Automatic File Returns</h1>

<table class="table table-striped">
    <thead>
        <tr>
            <th>File Name</th>
            <th>File Type</th>
            <th>Date Created</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    	<?php
       // Get the list of automatic file returns.
$sql = "SELECT * FROM `file_returns`";
$result = mysqli_query($conn, $sql);

// Populate the table with the data.
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row['file_name'] . "</td>";
    echo "<td>" . $row['file_type'] . "</td>";
    echo "<td>" . $row['date_created'] . "</td>";
    echo "<td><a class='btn btn-warning border-0 px-2 py-2 m-1 w-50' href='view_return.php?id=". $row['id'] . "'>View</a>  <a class='btn btn-success border-0 px-2 py-2 m-1 w-50' href='edit_return.php?id=" . $row['id'] . "'>Edit</a>  <a class='btn btn-danger border-0 px-2 py-2 m-1 w-50' href='delete.php?id=" . $row['id'] . "'>Delete</a></td>";
    echo "</tr>";
}
?>
    </tbody>
</table>

<a href="create.php">Create New File Return</a>
<footer>
<p style="text-align: center;">Copyright &copy; 2023 Tax Wizard</p>
</footer>
<script type="text/javascript">
    const toggle = document.getElementById('toggleDark');
const body= document.querySelector('body');

toggle.addEventListener('click',function(){
    this.classList.toggle('bxs-moon');
    if(this.classList.toggle('bx-sun')){
        body.style.background='white';
        body.style.transition='2s';
    }else{
        body.style.background='black';
        body.style.color='white';
        footer.style.background='white';
        footer.style.coloe='black';
        body.style.transition='2s';
    }
})
</script>
</body>
</html>
