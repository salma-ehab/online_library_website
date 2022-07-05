<?php
session_start();
$connect = mysqli_connect('localhost','root','');
mysqli_select_db($connect,'librarydb');

$searchTitle = $_POST['search'];
$s = "select * from bookstable where title='$searchTitle'";
$result = mysqli_query($connect,$s);

$username = $_SESSION['uname'];
$s1 = "select * from usertable where username = '$username'";
$result1 = mysqli_query($connect,$s1);
$row1 =  mysqli_fetch_row($result1);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Search</title>
  <link href="CSS/Styling.css?v=<?php echo time();?>" type="text/CSS" rel="stylesheet">
</head>

<div class="searchBody">
<body>
      <table>
           <?php
                 if  (mysqli_num_rows($result)>0)
                 {
                   echo("<script>window.location.href= 'bookDetails.php?bookSearched=$searchTitle';</script>");
                 }

                 else
                 {
                    echo'<tr>
                    <td class="searchResults">No Books Found</td>
                    </tr>';  
                 }
            ?>
      </table>

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
              <a href="index.php">Logout</a>
            </div>
</body>
</div>
</html>