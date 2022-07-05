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

$s = "select * from usertable ORDER BY name";
$result = mysqli_query($connect,$s);
?>

<html>
    <head>
        <title>User List</title>
        <link href="CSS/Styling.css?v=<?php echo time();?>" type="text/CSS" rel="stylesheet">
    </head>

    <div class="userListBody">
    <body>
        <table>
            <tr>
                <th class="UserListHeader">Name</th>
                <th class="UserListHeader">Username</th>
                <th class="UserListHeader">Email</th>
                <th class="UserListHeader">Type</th>
                <th colspan="2" class="UserListHeader">Operations</th>
            </tr>    

            <?php
                while($rows=mysqli_fetch_assoc($result))
                {
            ?>
            <tr>
                <td class="UserListInfo"><?php echo $rows['name'];?></td>
                <td class="UserListInfo"><?php echo $rows['username'];?></td>
                <td class="UserListInfo"><?php echo $rows['email'];?></td>
                <td class="UserListInfo"><?php echo $rows['type'];?></td>
                <td> <a class="UserListInfo" href='viewUser.php?viewedUserName=<?php echo $rows['username']?>'> View User</a></td>
                

                <td><?php if ($rows['type'] == "user") {echo "<a class='UserListInfo' href=\"editUser.php?viewedUserName=".$rows['username']."\"'> Edit User</a>";}
                          else if($rows['type'] == "admin") {echo "<a class='UserListInfo' href=''> Edit User</a>";}?></td>       
            </tr>
            <?php
                }
            ?>
        </table>

        <div class="navigationBar"  id="commonNavigationBar">
              <a href="adminhomepage.php">Homepage</a>
              <a href= 'Login.php'>Logout</a>
      </div>
    </body>
    </div>
</html>