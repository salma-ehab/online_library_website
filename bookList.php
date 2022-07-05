<?php
session_start();
$connect = mysqli_connect('localhost','root','');
mysqli_select_db($connect,'librarydb');

$s = "select * from bookstable ORDER BY total";
$result = mysqli_query($connect,$s);
?>

<html>
    <head>
        <title>Book List</title>
        <link href="CSS/Styling.css?v=<?php echo time();?>" type="text/CSS" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

    <div class="userBookListBody">
    <body>
        <table>
            <tr>
                <th class="userBookListHeader">Title</th>
                <th class="userBookListHeader">Author</th>
                <th class="userBookListHeaderDes">Description</th>
                <th class="userBookListHeader">Genre</th>
                <th class="userBookListHeader">Price</th>
                <th class="userBookListHeader">Stars</th>
                <th class="userBookListHeader">Stock</th>
                <th class="userBookListHeader">Operations</th>
            </tr>    

            <?php
                while($rows=mysqli_fetch_assoc($result))
                {
            ?>
            <tr>
                <td class="userBookListInfo"><?php echo $rows['title'];?></td>
                <td class="userBookListInfo"><?php echo $rows['author'];?></td>
                <td class="userBookListInfoDes"><?php echo $rows['description'];?></td>
                <td class="userBookListInfo"><?php echo $rows['genre'];?></td>
                <td class="userBookListInfo"><?php echo $rows['price'];?></td>
                <td class="userBookListInfo"><?php 
               for ($i = 0;$i<$rows['stars'];$i++)
               {
                echo '<span class="fa fa-star checked"></span>';
               }

               for ($i = 0;$i<5-$rows['stars'];$i++)
               {
                echo '<span class="fa fa-star"></span>';
               }?></td>

                <td class="userBookListInfo"><?php if ($rows['total'] == 0) {echo "<label id='warning'>Out of Stock</label>";}
                else if ($rows['total']> 0) {echo "<label>".$rows['total']."</label>";}?></td>                           
               <td> <a class="userBookListInfo" href='editBook.php?selectedBookTitle=<?php echo $rows['title']?>'>Edit Book</a></td>
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