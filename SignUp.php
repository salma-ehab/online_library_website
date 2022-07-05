<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Sign Up</title>
  <link href="CSS/Styling.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css">

</head>

<div class = signUpBody>
<body>

      <div class="signupForm">
      <form action="signUpForm.php" method="post">
    
        <label for="name"><strong>Name:</strong> </label>
        <input type="text" placeholder="Enter your Name" id="name" name="name" required><br>
      
        <label for="uname"><strong>Username:</strong> </label>
        <input type="text" placeholder="Enter your Username" id="uname" name="uname" required><br>

        <label for="address"><strong>Address:</strong> </label>
        <input type="text" placeholder="Enter your Address" id="address" name="address" required><br>

        <label for="Tnumber"><strong>Telephone Number:</strong> </label>
        <input type="text" placeholder="Enter your Telephone number in this format xxx-xxxx-xxxx" id="Tnumber" name="Tnumber" required onchange="confirmTelephoneNumber()"><br>
      
        <label for="email"><strong>Email:</strong> </label>
        <input type="email"  placeholder=" Enter your Email Address" id="email" name="email" required><br>
      
        <label for="password"><strong>Password:</strong> </label>
        <input type="password" placeholder="Enter your Password" id="password" name="password" required onchange="checkPassword()"><br> 

        <label for="cPassword"><strong>Confirm Passowrd:</strong> </label>
        <input type="password" placeholder="Confirm your Password" id="cPassword" name="cPassword" required onchange="confirmPassword()"><br> 
      
          <button id ="btn1" type="submit" onclick="disableEnableSignUp()">Sign Up</button>
      </form>
      <button id ="btn2" onclick="goLogIn()">Log In</button>
      <div>
      
      <script src="JS/neededFunctions.js"></script>
</body>
</div>
</html>
