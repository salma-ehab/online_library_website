<?php
session_start();
$connect = mysqli_connect('localhost','root','');
mysqli_select_db($connect,'librarydb');

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
              <a href= 'index.php'>Logout</a>
      </div>
    </body>
    </div>
</html>