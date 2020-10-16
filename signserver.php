<!DOCTYPE html>
<html>
  <head>
    <title></title>
  </head>
  <body>
    <br>
    <?php
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $password = $_POST['psw'];
    $email = $_POST['email'];
    if (!empty($fname) || !empty($password) || !empty($lname) || !empty($email)) {
        $host = "localhost";
        $dbUsername = "root";
        $dbPassword = "";
        $dbname = "projectdb";
        //create connection
        $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
        if (mysqli_connect_error()) {
         die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
        } else {
         $SELECT = "SELECT email From user Where email = ? Limit 1";
         $INSERT = "INSERT Into user (fname, lname, email, password) values(?, ?, ?, ?)";
         //Prepare statement
         $stmt = $conn->prepare($SELECT);
         $stmt->bind_param("s", $email);
         $stmt->execute();
         $stmt->bind_result($email);
         $stmt->store_result();
         $rnum = $stmt->num_rows;
         if ($rnum==0) {
          $stmt->close();
          $stmt = $conn->prepare($INSERT);
          $stmt->bind_param("ssss", $fname, $lname, $email, $password);
          $stmt->execute();
          echo "You have registered sucessfully";
          echo "<br><br>"."Kindly login with the Email-Id  ".$email." and created password.";
          echo "<br>"."Thank you.";
         } else {
          echo "Someone already register using this email";
         }
         $stmt->close();
         $conn->close();
        }
    } else {
     echo "All field are required";
     die();
    }
    ?>
  </body>
</html>
