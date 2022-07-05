<html>
    <head>
        <title> Log in</title>
        <link href="CSS/Styling.css?v=<?php echo time();?>" type="text/CSS" rel="stylesheet">
    </head>

    <div class="logInBody">
    <body>
        <h1> LogIn</h1>
        <br><br>
        
        <div class="inputForm">
        <form action="validation.php" method="post">
            <table>
              <tr>
                <td>Username:</td>
                <td><input type="text" name="uname" placeholder="Enter Username" required="required"></td>
              </tr>

              <tr>
                <td>Password:</td>
                <td><input type="password" name="password" placeholder="Enter Password" required="required"></td>
              </tr>

              <tr>
                <td></td>
                <td><input id="submit" type="submit" value="Log In"></td>
              </tr>

              <tr>
                <td></td>
                <td><a href="forgetPassword.php">Forgot Password?</a> </td>
              </tr>

              <tr>
                <td>Don't have an account?</td>
                <td><a href="SignUp.php">Create New</a> </td>
              </tr>
            </table>
          </form>
          </div>

  </body>
  </div>
</html>