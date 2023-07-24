<?php
include("../includes/config.php");
?>
<!DOCTYPE html>
<html>
<head>
<title>Admin Dashboard</title>
<link rel="stylesheet" href="style.css">
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="script.js" defer></script>
<style type="text/css">
nav{
  width: 100%;
}
.dashboard{
	display: flex;
}
.card {
  margin-bottom: 20px;
  display: flex;
  margin: auto;
  height: 100px;
  width: 200px;
  align-items: center;
  background-color: #f5f5f5;
  padding: 20px;
  object-fit: contain;
}

.card h2 {
  font-size: 1.5em;
}

.card ul {
  list-style-type: none;
  padding: 0;
  margin: 0;
}

.card ul li {
  margin-bottom: 10px;
}

footer {
  background-color: #000;
  color: #fff;
  padding: 20px;
  margin-top:12%;
}
/************************** for sidebar ***********************************/

  /* The sidebar menu */
  .sidebar {
      height: 100%; /* 100% Full-height */
      width: 0; /* 0 width - change this with JavaScript */
      position: fixed; /* Stay in place */
      z-index: 1; /* Stay on top */
      top: 0;
      left: 0;
      background-color: lightgray; /* lightgray*/
      overflow-x: hidden; /* Disable horizontal scroll */
      padding-top: 60px; /* Place content 60px from the top */
      transition: 0.5s; /* 0.5 second transition effect to slide in the sidebar */
    }
    
    /* The sidebar links */
    .sidebar a {
      padding: 8px 8px 8px 32px;
      text-decoration: none;
      font-size: 22px;
      color: black;
      display: block;
      transition: 0.3s;
    }
    
    .sidebar .side-header{
          margin-left: 30px;
          margin-bottom: 8px;
          color: #fff;
      }

    /* When you mouse over the navigation links, change their color */
    .sidebar a:hover {
      background-color: red;
    }
    
    /* Position and style the close button (top right corner) */
    .sidebar .closebtn {
      position: absolute;
      top: 0;
      right: 2px;
      font-size: 34px;
      margin-left: 50px;
    }
    .sidebar .closebtn:hover{
    	background-color: red;
    } 
    
    /* The button used to open the sidebar */
    .openbtn {
      font-size: 20px;
      cursor: pointer;
      padding: 10px 15px;
      border: none;
      color: #fff;
      background-color:black;
    }
    
    .openbtn:hover {
      color: red;
    }
    
    /* Style page content - use this if you want to push the page content to the right when you open the side navigation */
    #main {
      transition: margin-left .5s; /* If you want a transition effect */
      padding: 20px;
    }
    
    /* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
    @media screen and (max-height: 450px) {
      .sidebar {padding-top: 15px;}
      .sidebar a {font-size: 18px;}

</style>
</head>
<body>
	<nav  class="navbar navbar-expand-lg navbar-light px-5" style="background-color: lightgray;">    
    <a class="navbar-brand ml-5" href="index.php">
        <img src="tax_wizard1.png" style="object-fit: contain;margin: auto; width: 70%;height: 100px;">
    </a>
    <a href="login.html" style="margin-left:auto; font-size: 20px;font-weight: bolder; color: black;">Logout</a>
      
</nav>
<div class="sidebar" id="mySidebar">
<hr style="border:1px solid; background-color:#8a7b6d; border-color:#3B3131;">
    <a  href="javascript:void(0)" class="closebtn" onclick="closeNav()"><i class='bx bx-exit'></i></a>
    <a href="index.php" ><i class=""></i> Dashboard</a>
    <a href="tax_returns.html" ><i class=""></i>Tax Returns</a>
    <a href="reports.html"><i class=""></i>Reports</a>
    <a href="settings.html" ><i class=""></i> Settings</a>
</div>
<button class="openbtn" onclick="openNav()"><i class="bx bx-menu"></i></button>
<br>
<main>
<div class="dashboard">
<div class="card">
<h2>Users</h2>
<ul>
<?php
                       
                       $sql="SELECT * from `users`";
                       $result=$conn-> query($sql);
                       $count=0;
                       if ($result-> num_rows > 0){
                           while ($row=$result-> fetch_assoc()) {
                   
                               $count=$count+1;
                           }
                       }
                       echo "<h5>$count</h5>"; 
                   ?>
</ul>
</div>
<div class="card">
<h2>Tax Returns</h2>
<ul>
<?php
                       
                       $sql="SELECT * from `file_returns`";
                       $result=$conn-> query($sql);
                       $count=0;
                       if ($result-> num_rows > 0){
                           while ($row=$result-> fetch_assoc()) {
                   
                               $count=$count+1;
                           }
                       }
                       echo "<h5>$count</h5>"; 
                   ?>
</ul>
</div>
<div class="card">
<h2>Reports</h2>
<ul>
<h5>0</h5>
</ul>
</div>
</div><br><br>
</main>
<footer>
<p style="text-align: center;">Copyright &copy; 2023 Tax Wizard</p>
</footer>
</body>
</html>

