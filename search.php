<?php
require_once("website_body.html");
?>



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
    // $sql = "SELECT u.*, m.j_date, m.e_date
    //     FROM users u
    //     INNER JOIN memberships m ON u.email = m.email
    //     where email='$search'";
         $result = mysqli_query($conn, $sql); ?>
<!-- //    $result = mysqli_query($conn, $sql);
//     // if(mysqli_num_rows($result)>0){
//         $row = mysqli_fetch_assoc($result);
//             echo "Name :    "   .    $row['fname']    . " ".$row['lname']. "<br><br>Email:     ".$row['email']."<br><br>Joining Date:    ".$row['j_date']. "<br><br>Membership Expiry Date:    ".$row['e_date']. "<br><br>Phone NO:    ".$row['ph'].    "<br><br>Membership Duration:     "   .$row['membership_duration'] ;
        // }

    // } -->

<!-- } -->

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
 $row = mysqli_fetch_assoc($result) ;
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

</body>
</html>