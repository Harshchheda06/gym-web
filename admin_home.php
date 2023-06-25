<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link href="home.css" rel="stylesheet"> -->
    <link href="admin_home.css" rel="stylesheet">
</head>
<body>
    <span><img id="logo" src="OIP.jpg" alt=""></span>
    <span class="head">
        <strong class="wel"> Welcome to H9 Fitness</strong>
    </span>
    <!-- <input class="search" type="search" placeholder="search"> -->
    <ul class="nav">
        <li><a class="active" href="admin_home.php">Home</a></li>
        <li><a href="#news">News</a></li>
        <li><a href="#contact">Contact</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#">Blog</a></li>
        <li><a href="meminfo.php">My Info</a></li>
        <form id="searchForm" action="search.php" method="post">
            <input class="search" name="search" type="search" placeholder="search a member">
            <input type="hidden" value="search_mem" name="function">
         
        </form>
    </ul>

    <div class="adminpage" style="text-align: center;"><h1>ADMIN PAGE</h1></div>

   
          
<div id="memberships">
    
    <h2>ADD A NEW MEMBERSHIP</h2>
   <div class="nform">
    <form action="project.php" method="post">
      Email: <input type="email"  name="email" ><br><br>
       Joining date: <input type="date" name="jdate"><br><br>
       Membership Duration: <select name="memdur">
        <option value='1 Year'>1 Year</option>
        <option value='1 Month'>1 Month</option>
        <option value='3 Months'>3 Month</option>
        <option value='6 Months'>6 Months</option>
        </select>
        <br><br>
       <input type="hidden" value="add_mem" name="function">
       <input id="submit" type="submit">
    </form>
   </div>
   <br>
   <h1>RENEW MEMBERSHIP</h1>
   <div class="nform">
    <form action="project.php" method="post">
      Email: <input type="email"  name="email" ><br><br>
       Joining date: <input type="date" name="jdate"><br><br>
       Membership Duration: <select name="memdur">
        <option value='1 Year'>1 Year</option>
        <option value='1 Month'>1 Month</option>
        <option value='3 Months'>3 Month</option>
        <option value='6 Months'>6 Months</option>
        </select>
        <br><br>
       <input type="hidden" value="renew_mem" name="function">
       <input id="submit" type="submit">
    </form>
   </div>
   
</div>
</body>
</html>