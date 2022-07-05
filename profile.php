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
        <title>Profile</title>
        <link href="CSS/Styling.css?v=<?php echo time();?>" type="text/CSS" rel="stylesheet">
    </head>

    <div class="ProfileBody">
    <body>
        <h1 id="UserName"> <?php echo $row[0];?></h1>
        <table>
            <tr>
               <td>Username:</td>
               <td class="profileInfo" ><?php echo $row[1];?></td>
            </tr>

            <tr>
               <td>Email:</td>
               <td class="profileInfo"><?php echo $row[2];?></td>
            </tr>

             <tr>
                <td>Address:</td>
                <td class="profileInfo"><?php echo $row[3];?></td>
             </tr>

             <tr>
               <td>Telephone Number:</td>
               <td class="profileInfo"><?php echo $row[4];?></td>
            </tr>
        </table>

            <div class="navigationBar" id="profileNavigationBar">
              <a class="active" href="#profile">Profile</a>
              <a href="editProfile.php">Edit Profile</a>

              <a href= 'javascript:chooseHomePage("<?=$row[6]?>");'>Homepage</a>
              <script>
                function chooseHomePage(type)
                {
                    if (type =="user")

                    {
                        window.location.href = "userhomepage.php";
                    } 

                    else if (type =="admin")

                    {
                    
                       window.location.href = "adminhomepage.php";
   
                    }
                }
              </script>
              
            
              <a href="Login.php">Logout</a>
            </div>

        
    </body>
    </div>
</html>