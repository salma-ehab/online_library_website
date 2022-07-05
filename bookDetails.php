<?php
session_start();
$connect = mysqli_connect('localhost','root','');
mysqli_select_db($connect,'librarydb');

$bookTitle= $_GET["bookSearched"];
$s = "select * from bookstable where title LIKE '$bookTitle'";
$result = mysqli_query($connect,$s);
$row =  mysqli_fetch_row($result);

$username = $_SESSION['uname'];
$s1 = "select * from usertable where username = '$username'";
$result1 = mysqli_query($connect,$s1);
$row1 =  mysqli_fetch_row($result1);
?>

<html>
    <head>
        <title>Book Details</title>
        <link href="CSS/Styling.css?v=<?php echo time();?>" type="text/CSS" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

    <div class="BookDetailsBody">
    <body>
        <h1> <?php echo $row[0];?>
        <label id="borrowBooks">

               <?php 
               if ($row1[6]== "user") {echo "<a class='userBookListInfo' id='borrowBook' href=\"borrowBooks.php?selectedBookTitle=".$row['0']."\"'>Borrow Book</a>";}?>
               </label> </h1>
        
               <label class="booksInfoHeader">Author:</label>
               <label class="booksInfo" id="bookInfo1"><?php echo $row[1];?></label>
               <br><br><br>

               <label class="booksInfoHeader">Genre:</label>
               <label class="booksInfo" id="bookInfo2"><?php echo $row[5];?></label>
               <br><br><br>

               <label class="booksInfoHeader">Description:</label>
               <table>
               <tr>
                  <td class="booksInfoDes" ><?php echo $row[4];?></label> </td>
               </tr>
               </table>
               <br>
        
               <label class="booksInfoHeader">Stars:</label>
               <label class="booksInfo" id="bookInfo3"><?php 
               for ($i = 0;$i<$row[6];$i++)
               {
                echo '<span class="fa fa-star checked"></span>';
               }

               for ($i = 0;$i<5-$row[6];$i++)
               {
                echo '<span class="fa fa-star"></span>';
               }
               ?></label>
               <br><br><br>

               <label class="booksInfoHeader">Price:</label>
               <label class="booksInfo" id="bookInfo4"><?php echo $row[2];?></label>
               <br><br><br>
        
               <label class="booksInfoHeader">Number of Availabe Books:</label>
               <label class="booksInfo"  id="bookInfo5"><?php echo $row[3];?></label>
               <br><br><br>

              <div class="navigationBar" id="commonNavigationBar">
              <a href= 'javascript:chooseHomePage("<?=$row1[6]?>");'>Homepage</a>
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