<?php
session_start();
$connect = mysqli_connect('localhost','root','');
mysqli_select_db($connect,'librarydb');

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
              
            
              <a href="index.php">Logout</a>
            </div>

        
    </body>
    </div>
</html>