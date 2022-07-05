<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Forgot Password</title>
  <link href="CSS/Styling.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />>
</head>

<div class = signUpBody>
<body>

      <div class="signupForm">
      <form action="resetPassword.php" method="post">
      
        <label for="email"><strong>Email:</strong> </label>
        <input type="email"  placeholder=" Enter your Email Address" id="email" name="email" required><br>

        <label for="password"><strong>Password:</strong> </label>
        <input type="password" placeholder="Enter your new Password" id="password" name="password" required onchange="checkPassword()"><br> 

        <label for="cPassword"><strong>Confirm Passowrd:</strong> </label>
        <input type="password" placeholder="Confirm your Password" id="cPassword" name="cPassword" required onchange="confirmPassword()"><br> 
      
        <button id ="continueButton" type="submit" onclick="disableEnableSignUp()">Continue</button>
      </form>
      <div>

      <script src="JS/neededFunctions.js"></script>
</body>
</div>
</html>
