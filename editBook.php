<?php
session_start();
$connect = mysqli_connect('localhost','root','');
mysqli_select_db($connect,'librarydb');

$bookTitle = $_GET['selectedBookTitle'];
$s = "select * from bookstable where title = '$bookTitle'";
$result = mysqli_query($connect,$s);
$row =  mysqli_fetch_row($result);
?>


<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Edit Book</title>
  <link href="CSS/Styling.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css">
</head>

<div class = addBooksBody>
<body>
      <div class="addBookForm">
      <form action="editBookValidation.php?prevBookTitle=<?php echo $bookTitle?>" method="post">
    
        <label for="title"><strong>Title:</strong> </label>
        <input type="text" value="<?php echo $row[0];?>" id="title" name="title" required><br>

        <label for="author"><strong>Author:</strong> </label>
        <input type="text" value="<?php echo $row[1];?>" id="author" name="author" required><br>

        <label for="price"><strong>Price:</strong> </label>
        <input type="text" value="<?php echo $row[2];?>" id="price" name="price" required onchange="validatePrice()"><br>
      
        <label for="totalBooks"><strong>Number of Total Books:</strong> </label>
        <input type="text"  value="<?php echo $row[3];?>" id="totalBooks" name="totalBooks" required onchange="validateTotalBooks()"><br>
      
        <label for="description"><strong>Description:</strong> </label>
        <textarea id="description" name="description" required><?php echo $row[4];?></textarea> <br>

        <label for="genre"><strong>Genre:</strong> </label>
        <select id="genre" name="genre" size=3 required>
            <option value="Fantasy">Fantasy</option>
            <option value="Thriller">Thriller</option>
            <option value="Children">Children</option>
            <option value="Horror">Horror</option>
            <option value="Comics">Comics</option>
        </select>

        <label id="starsLabel" for="stars"><strong>Number of Stars:</strong> </label>
        <select id="stars" name="stars" size=3 required>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
        <br> 
          <button id ="editBtn2" type="submit" onclick="disableEnableAddBooks()">Edit</button>
      </form>
      <div>
      
      <script>
        (function()
        {
            var sel = document.getElementById('genre');
            for (var i = 0; i< sel.options.length;i++)
               {
                  if(sel.options[i].text == "<?=$row[5]?>")
                  {
                      sel.options[i].selected=true;
                      break;
                  }
               }
        }());</script>

       <script>
        (function()
        {
            var sel = document.getElementById('stars');
            for (var i = 0; i< sel.options.length;i++)
               {
                  if(sel.options[i].text == "<?=$row[6]?>")
                  {
                      sel.options[i].selected=true;
                      break;
                  }
               }
        }());</script>
      <script src="JS/neededFunctions.js"></script>
</body>
</div>
</html>
