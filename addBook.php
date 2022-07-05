<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Add Books</title>
  <link href="CSS/Styling.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css">
</head>

<div class = addBooksBody>
<body>

      <div class="addBookForm">
      <form action="addBooksDB.php" method="post">
    
        <label for="title"><strong>Title:</strong> </label>
        <input type="text" placeholder="Enter the book's title" id="title" name="title" required><br>

        <label for="author"><strong>Author:</strong> </label>
        <input type="text" placeholder="Enter the book's author" id="author" name="author" required><br>

        <label for="price"><strong>Price:</strong> </label>
        <input type="text" placeholder="Enter the book's price" id="price" name="price" required onchange="validatePrice()"><br>
      
        <label for="totalBooks"><strong>Number of Total Books:</strong> </label>
        <input type="text"  placeholder=" Enter the number of books in the stock" id="totalBooks" name="totalBooks" required onchange="validateTotalBooks()"><br>
      
        <label for="description"><strong>Description:</strong> </label>
        <textarea id="description" name="description" placeholder=" Enter the book's description" required></textarea> <br>

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
          <button id ="addBooksBtn" type="submit" onclick="disableEnableAddBooks()">Add</button>
      </form>
      <button id ="homePageBtn" onclick="goAdminHomepage()">Homepage</button>
      <div>
      
      <script src="JS/neededFunctions.js"></script>
</body>
</div>
</html>
