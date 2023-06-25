<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   
    <link href="search.css" rel="stylesheet">
</head>
<body>
    <span><img id="logo" src="OIP.jpg" alt=""></span>
    <span class="head">
        <strong class="wel"> Welcome to H9 Fitness</strong>
    </span>
   
    <ul class="nav">
        <li><a class="active" href="admin_home.php">Home</a></li>
        <li><a href="#news">News</a></li>
        <li><a href="#contact">Contact</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#">Blog</a></li>
        <li><a href="meminfo.php">My Info</a></li>
        <form id="searchForm" action="project.php" method="post">
            <input class="search" name="search" type="search" placeholder="search a member">
            <input type="hidden" value="search_mem" name="function">
         
        </form>
    </ul>
<?php
$func=$_POST['function'];
if($func=='search_mem')
search_mem();
function search_mem()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "myprojj";

    $conn = mysqli_connect($servername, $username, $password, $database);

    if (!$conn)
        die("connection failed:" . mysqli_connect_error());
    // echo "successful connection<br>";    
    $search = $_POST["search"];
    $sql="SELECT * FROM users JOIN memberships ON users.email = memberships.email WHERE users.email = '$search'";
    $result = mysqli_query($conn, $sql);
    // if(mysqli_num_rows($result)>0){
        $row = mysqli_fetch_assoc($result);
            echo "Name :    "   .    $row['fname']    . " ".$row['lname']. "<br><br>Email:     ".$row['email']."<br><br>Joining Date:    ".$row['j_date']. "<br><br>Membership Expiry Date:    ".$row['e_date']. "<br><br>Phone NO:    ".$row['ph'].    "<br><br>Membership Duration:     "   .$row['membership_duration'] ;
        // }

    // }

}
?>
</body>
</html>