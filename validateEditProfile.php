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

$newName = $_POST['name'];
$newUsername = $_POST['uname'];
$newEmail = $_POST['email'];
$newAddress = $_POST['address'];
$newTelephone = $_POST['Tnumber'];
$nextLocation= $_GET["nextLocation"];

if ($nextLocation == 1)
{
    $prevUsername = $_SESSION['uname'];
}

else if ($nextLocation == 0)
{
    $prevUsername = $_GET['userName'];
}

$prevUsernameQuery = "select * from usertable where username = '$prevUsername'";
$resultPrevUsername = mysqli_query($connect,$prevUsernameQuery);
$row =  mysqli_fetch_row($resultPrevUsername);

if ($newUsername != $prevUsername)
{
    $newUsernameQuery = "select * from usertable where username = '$newUsername'";
    $resultNewUsername = mysqli_query($connect,$newUsernameQuery);
    $numNewUsername = mysqli_num_rows($resultNewUsername);

    if ($numNewUsername != 0)
    {
        echo("<script >alert('The new username already exists')</script>");
        if ($nextLocation == 1)
        {
            echo("<script>window.location.href = 'editProfile.php';</script>");
        }

        else if ($nextLocation == 0)
        {
            echo("<script>window.location.href = 'editUser.php?viewedUserName=$prevUsername';</script>");
        }
        
    }

    else if ($nextLocation == 1)
    {
        $_SESSION["uname"] = $newUsername;
    }
}

if ($row[2] != $newEmail)
{
    $newEmailQuery = "select * from usertable where email = '$newEmail'";
    $resultNewEmail = mysqli_query($connect,$newEmailQuery);
    $numNewEmail = mysqli_num_rows($resultNewEmail);

    if ($numNewEmail != 0)
    {
        echo("<script >alert('The new email already exists')</script>");
        if ($nextLocation == 1)
        {
            echo("<script>window.location.href = 'editProfile.php';</script>");
        }

        else if ($nextLocation == 0)
        {
            echo("<script>window.location.href = 'editUser.php?viewedUserName=$prevUsername';</script>");
        }
    }
}

$sign = "UPDATE usertable SET name='$newName', username='$newUsername', email='$newEmail', address = '$newAddress', telephone ='$newTelephone' WHERE username='$prevUsername'";
mysqli_query($connect,$sign);

if ($nextLocation == 1)
{
    header('location:profile.php');
}

else if ($nextLocation == 0)
{
    header('location:userList.php?viewedUserName=$prevUsername');
}
?>
