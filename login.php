<!DOCTYPE html>
<html>
  <head>
    <title></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
    body {
      background-color: #ffffe6;
    }
    .back {
      background-color: white;
    }
    .x {
      text-decoration: none;
      color: white;
      background-color: #6666ff;
      padding: 15px;
      border-radius: 8px;
    }
    .x:hover {
      background-color: lightgreen;
    }



      .f {border: 3px solid #f1f1f1;}

      input[type=email], input[type=password] {
      width: 100%;
      padding: 12px 20px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
      box-sizing: border-box;
      }

      .b1 {
      background-color: #4CAF50;
      color: white;
      padding: 14px 20px;
      margin: 8px 0;
      border: none;
      cursor: pointer;
      width: 60%;
      }

      .b1:hover {
      opacity: 0.8;
      }

      .cancelbtn {
      width: auto;
      padding: 10px 18px;
      background-color: #f44336;
      border: none;
      cursor: pointer;
      }
      .cancelbtn:hover {
        opacity: 0.8;
      }

      .container {
      padding: 16px;
      }
    </style>
  </head>
  <body>
    <table width = "100%" height = "640" align = "center" border = "0">
      <tr>
        <th width = "15%" height = "10%" style="background-color: #ffffe6;"><a href="index.php"><img src="images/logo.png" width = "120" height = "60"></a></th>
        <th width = "20%" height = "10%">

        </th>
        <th width = "35%" height = "10%">

        </th>
        <th width = "20%" height = "10%" align = "">
          <div>
            <a href="index.php" class="x" style="margin-right: 65px; visibility: hidden;">About</a>
            <a href="login.php" align = "center" style="text-decoration: none; color: black;">Log In</a>
          </div>
        </th>
        <th width = "10%" height = "10%"><a class="x" href="" target="if1" style="visibility: hidden">Sign Up</a></th>
      </tr>
      <tr>
          <th height = "5%" colspan="5" style="background-color: #bf8040; color: white; border: 1px solid black;" align ="center">Welcome to our page! (Click on the logo to return to the homepage)</th>
      </tr>
      <tr>
        <th width = "20%" height = "85%" colspan="1"></th>
        <th width = "60%" height = "85%" colspan = "2">
          <h2>Login Form</h2>
          <form class="f" action="loginserver.php" method="post">
            <div class="container">
              <p align="left"><b>Email</b></p>
              <input type="email" placeholder="Enter Email" name="email" required>

              <p align="left"><b>Password</b></p>
              <input type="password" placeholder="Enter Password" name="psw" required>

              <button type="submit" class="b1" name="submit">Login</button>
            </div>

            <div class="container" style="background-color:#f1f1f1">
              <button type="reset" class="cancelbtn">Cancel</button>
            </div>
          </form>
        </th>
        <th width = "20%" height = "85%" colspan="2"></th>
      </tr>
    </table>
  </body>
</html>
