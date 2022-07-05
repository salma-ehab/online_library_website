<?php
session_start();

$cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
$cleardb_server = $cleardb_url["host"];
$cleardb_username = $cleardb_url["user"];
$cleardb_password = $cleardb_url["pass"];
$cleardb_db = substr($cleardb_url["path"],1);
$active_group = 'default';
$query_builder = TRUE;
$connect = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);
mysqli_select_db($connect,'heroku_1d9bb2bfffaebd9');

$username = $_SESSION['uname'];
$s = "select * from usertable where username = '$username'";
$result = mysqli_query($connect,$s);
$row =  mysqli_fetch_row($result);
?>

<html>
    <head>
        <title>Edit Profile</title>
        <link href="CSS/Styling.css?v=<?php echo time();?>" type="text/CSS" rel="stylesheet">
    </head>

    <div class="EditProfileBody">
    <body>
    <div class="editProfile">
      <form action="validateEditProfile.php?nextLocation=1" method="post">
    
        <label for="name"><strong>Name:</strong> </label>
        <input type="text" value="<?php echo $row[0];?>" id="name" name="name" required><br>
      
        <label for="uname"><strong>Username:</strong> </label>
        <input type="text" value="<?php echo $row[1];?>" id="uname" name="uname" required><br>

        <label for="email"><strong>Email:</strong> </label>
        <input type="email"  value="<?php echo $row[2];?>" id="email" name="email" required><br>

        <label for="address"><strong>Address:</strong> </label>
        <input type="text" value="<?php echo $row[3];?>" id="address" name="address" required><br>

        <label for="Tnumber"><strong>Telephone Number:</strong> </label>
        <input type="text" value="<?php echo $row[4];?>" id="Tnumber" name="Tnumber" required onchange="confirmTelephoneNumber()"><br>
      
        <button id ="editBtn" type="submit" onclick="disableEnableSignUp()">Edit</button>
      </form>
      <div>
      
      <script src="JS/neededFunctions.js"></script>
    </body>
    </div>
</html>