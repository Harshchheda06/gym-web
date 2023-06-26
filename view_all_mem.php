<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script> -->
<?php
require_once("website_body.html");

$servername = "localhost";
$username = "root";
$password = "";
$database = "myprojj";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn)
    die("Connection failed: " . mysqli_connect_error());

$sql = "SELECT u.*, m.j_date, m.e_date
        FROM users u
        INNER JOIN memberships m ON u.email = m.email
        ORDER BY m.e_date ";
$result = mysqli_query($conn, $sql);
?>

<table class="table table-striped" style="color: white;">
    <tr>
        <th>fname</th>
        <th>lname</th>
        <th>dob</th>
        <th>email</th>
        <th>phone</th>
        <th>gender</th>
        <th>joining date</th>
        <th>expiration date</th>
    </tr>

    <?php
    while ($row = mysqli_fetch_assoc($result)) {
        $expirationDate = strtotime($row['e_date']);
        $today = strtotime(date("Y-m-d"));

        echo "<tr";
        if ($expirationDate < $today) {
            echo " style='background-color: red;'";
        }
        echo ">";
        echo "<td>" . $row['fname'] . "</td>";
        echo "<td>" . $row['lname'] . "</td>";
        echo "<td>" . $row['dob'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['ph'] . "</td>";
        echo "<td>" . $row['gender'] . "</td>";
        echo "<td>" . $row['j_date'] . "</td>";
        echo "<td>" . $row['e_date'] . "</td>";
        echo "</tr>";
    }
    ?>
</table>
