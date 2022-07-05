<?php
session_start();
$connect = mysqli_connect('localhost','root','');
mysqli_select_db($connect,'librarydb');

$username= $_GET["viewedUserName"];
$s = "select * from usertable where username = '$username'";
$result = mysqli_query($connect,$s);
$row =  mysqli_fetch_row($result);

$s1 = "select * from borrowed  where uname='$username' && actualReturnDate ='0000-00-00' order by expectedReturnDate";
$result1 = mysqli_query($connect,$s1);
?>

<html>
    <head>
        <title>View Profile</title>
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

            <tr>
               <td>Type:</td>
               <td class="profileInfo"><?php echo $row[6];?></td>
            </tr>
            </table>

            <table id="borrowedBookList">
            <?php
                 if  (mysqli_num_rows($result1)>0)
                 {
                  echo '<tr>
                  <th id="bookTitle1">Borrowed Book Title</th>
                  <th id="returnDate1">Return Deadline</th>
                  </tr>'; 
                 }
            ?>

            <?php
                while($rows=mysqli_fetch_assoc($result1))
                {
            ?>
            <tr>
                <td class="userInfo" id="bookTitle2"><?php echo $rows['bookTitle'];?></td> 

                <td class="userInfo" id="returnDate2"><?php if ($rows['actualReturnDate'] =='0000-00-00'&& date("Y-m-d")>$rows['expectedReturnDate']) {echo "<label id='warning'>".$rows['expectedReturnDate']."</label>";}
                else if ($rows['actualReturnDate'] =='0000-00-00' && date("Y-m-d")<$rows['expectedReturnDate']) {echo "<label>".$rows['expectedReturnDate']."</label>";}?></td>                           
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