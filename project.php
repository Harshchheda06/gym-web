<?php

// echo $_POST['name'];

// $servername="localhost";
// $username="root";
// $password="";

// $conn=mysqli_connect($servername,$username,$password);

// if(!$conn)
// die("connection failed:".mysqli_connect_error());
// echo "successful<br>";

// $sql="CREATE DATABASE myprojj";
// if(mysqli_query($conn,$sql)){
//     echo 'databse created ';}
// else 
// echo 'error';


// myqli_close($conn);

$func = $_POST['function'];

if ($func == 'signin') {
    signin();
} elseif ($func == 'adlogin')
    Adlogin();
elseif ($func == 'loginch')
    loginch();
elseif ($func == 'renew_mem')
    renew_mem();
    elseif($func=='search_mem'){
        
        search_mem();
    }
else {
    add_mem();

}


function Adlogin()
{

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "myprojj";

    $conn = mysqli_connect($servername, $username, $password, $database);

    if (!$conn)
        die("connection failed:" . mysqli_connect_error());
    echo "successful connection<br>";

    $adname = $_POST['adname'];
    $pass = $_POST['pw'];


    $sqll11 = "SELECT password FROM admin WHERE ad_name='$adname'  ";
    if (mysqli_query($conn, $sqll11))
        echo "query worked";
    else
        echo "" . mysqli_error($conn);

    $result = mysqli_query($conn, $sqll11);
    $row = mysqli_fetch_assoc($result);
    $storedpw = $row['password'];
    if ($pass == $storedpw) {
        echo "welcome";
        header("Location: admin_home.html");
        exit();

    } else

        // echo $result;
        // echo $storedpw;
        echo "password incorrect";
}

function signin()
{

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "myprojj";

    $conn = mysqli_connect($servername, $username, $password, $database);

    if (!$conn)
        die("connection failed:" . mysqli_connect_error());
    echo "successful<br>";

    $fn = $_POST['fname'];
    $pass = $_POST['pass'];
    $ln = $_POST['lname'];
    $dob = $_POST['date'];
    $email = $_POST['email'];
    $ph = $_POST['ph'];
    // $gen=$_POST['gender'];
    $qual = $_POST['qual'];

    $sql = "INSERT INTO users (fname,lname,pass,dob,email,ph,gender,qual) values('$fn','$ln','$pass','$dob','$email','$ph','male','$qual')";


    if (mysqli_query($conn, $sql)) {
        echo "data inserted";
        header("Location: vltsignin.html");
        exit();
    } else
        echo "" . mysqli_error($conn);
}

// $sql = "CREATE TABLE users
// (fname varchar(5),lname varchar(10), pass varchar(20),dob date,email varchar(40),ph varchar(15),gender varchar(10),qual varchar(30))";

// if (mysqli_query($conn, $sql))
//     echo "table created ";
// else
//     echo 'error';

//    mysqli_close($conn);
// $sql="select * from users"


function loginch()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "myprojj";

    $conn = mysqli_connect($servername, $username, $password, $database);

    if (!$conn)
        die("connection failed:" . mysqli_connect_error());
    echo "successful<br>";

    $emailadd = $_POST['emailadd'];
    $p = $_POST['password'];

    $sqll = "SELECT pass FROM users WHERE email='$emailadd' ";
    if (mysqli_query($conn, $sqll))
        echo "data inserted";
    else
        echo "" . mysqli_error($conn);

    $result = mysqli_query($conn, $sqll);
    $row = mysqli_fetch_assoc($result);
    $storedpw = $row['pass'];
    // echo $storedpw;
    if ($p == $storedpw) {
        session_start();
        $_SESSION['username'] = $emailadd;
        header("Location: home.html");
        exit();
    } else
        echo "password incorrect";

}

function add_mem(){

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "myprojj";

    $conn = mysqli_connect($servername, $username, $password, $database);

    if (!$conn)
        die("connection failed:" . mysqli_connect_error());
    echo "successful connection<br>";

    $email=$_POST['email'];
    $jdate=$_POST['jdate'];
    $memdur=$_POST['memdur'];

    // $sql="INSERT INTO users ('j_date','membership_duration') VALUES ($jdate,$memdur) WHERE email=$email";
    $sql = "INSERT INTO memberships (email, `membership_duration`,j_date) VALUES ('$email','$memdur','$jdate') ";

    if (mysqli_query($conn, $sql))
    {
        echo "data inserted";

    }
    else
        echo "" . mysqli_error($conn);
}


function renew_mem()
{

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "myprojj";

    $conn = mysqli_connect($servername, $username, $password, $database);

    if (!$conn)
        die("connection failed:" . mysqli_connect_error());
    echo "successful connection<br>";

    $email = $_POST['email'];
    $jdate = $_POST['jdate'];
    $memdur = $_POST['memdur'];

    // $sql="INSERT INTO users ('j_date','membership_duration') VALUES ($jdate,$memdur) WHERE email=$email";
    $sql1 = "DELETE FROM memberships where email='$email'";
    $sql2 = "INSERT INTO memberships (email, `membership_duration`,j_date) VALUES ('$email','$memdur','$jdate')";
    mysqli_query($conn, $sql1);
    mysqli_query($conn, $sql2);
}

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
    if(mysqli_num_rows($result)>0){
        while( $row = mysqli_fetch_assoc($result)){
            echo "".$row['fname']. " ".$row['lname']. " ".$row['email'];
        }

    }

}
?>