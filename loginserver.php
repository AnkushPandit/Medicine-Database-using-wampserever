<!DOCTYPE html>
<html>
  <head>
    <title></title>
  </head>
  <body>
    <br>
    <?php
      session_start();
      $email = $_POST['email'];
      $pass = $_POST['psw'];
      $con = mysqli_connect("localhost", "root", "", "projectdb");
      if(mysqli_connect_error())
      {
        echo "unable to connect.......".mysqli_connect_error();
      }
      else {
      $sql = "SELECT * FROM user WHERE email = '$email' AND password = '$pass'";
      $res = mysqli_query($con, $sql);
      $var = mysqli_fetch_assoc($res);
      $row=mysqli_num_rows($res);


      if($row > 0)
      {
        $_SESSION['user'] = $var['fname'];
        $_SESSION['email'] = $var['email'];
        header("refresh:3; url = userHome.php");
      }
      else {
        echo "Invalid Credentials";
        header("refresh:2; url = login.php");
      }
    }
     ?>
  </body>
</html>
