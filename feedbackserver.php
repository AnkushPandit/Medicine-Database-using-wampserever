
    <?php
      session_start();
      include("connection.php");
      error_reporting(0);
      $value= $_GET['feedback'];
      if($value == NULL)
      {
        echo "Please enter something into the feedback field.";
      }
      else
      {
        $var = $_SESSION['email'];

        $sql = "INSERT INTO feedback (email, feed) VALUES ('$var', '$value')";
        $res = mysqli_query($conn, $sql);

        if($res)
        {
          echo "<br>"."Thank you ".$_SESSION['user']." for your valuable feedback.";
        }
        else
        {
          echo "Server Busy"."<br>"."Please try again later.";
        }
      }

     ?>

