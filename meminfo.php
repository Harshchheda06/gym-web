<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link href="home.css" rel="stylesheet"> -->
    <link href="meminfo.css" rel="stylesheet">
</head>

<body>
    <span><img id="logo" src="OIP.jpg" alt=""></span>
    <span class="head">
        <strong class="wel"> Welcome to H9 Fitness</strong>
    </span>
    <!-- <input class="search" type="search" placeholder="search"> -->
    <ul class="nav">
        <li><a class="active" href="home.html">Home</a></li>
        <li><a href="#news">News</a></li>
        <li><a href="#contact">Contact</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#">Blog</a></li>
        <li><a href="meminfo.php">My Info</a></li>
        <input class="search" type="search" placeholder="search">
    </ul>

    <h1>Members Details</h1>
    <!-- <table>
        <tr>
            <th>name</th>
        </tr>
    </table> -->
    <?php echo isset($_SESSION['username']) ?search_mem():"lol" ;
    


    function search_mem()
    {   
        $space= "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
        $email = $_SESSION['username'];
        // echo $email;
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "myprojj";

        $conn = mysqli_connect($servername, $username, $password, $database);

        if (!$conn)
            die("connection failed:" . mysqli_connect_error());
        $sql = "SELECT * FROM users JOIN memberships ON users.email = memberships.email WHERE users.email = '$email' ";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        echo "<h2>Name: " . $space.$row['fname'] . " " . $row['lname'] . "<br><br>Email: " .$space   . $row['email'] . "<br><br>Joining Date: " .$space. $row['j_date'] . "<br><br>Membership Expiry Date: " .$space. $row['e_date'] . "<br><br>Phone NO: " .$space. $row['ph'] . "<br><br>Membership Duration: " .$space. $row['membership_duration'] . "</h2>";


    
    }
    ?>
</body>

</html>