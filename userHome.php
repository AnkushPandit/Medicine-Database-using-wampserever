<?php
session_start();
error_reporting(0);
include("connection.php");
$temp = $_SESSION['user'];
$query = "SELECT * FROM user WHERE fname='$temp'";
$data = mysqli_query($conn, $query);
$result = mysqli_fetch_assoc($data);
if($temp == true)
{

}
else
{
  header('location:login.php');
}
?>

<html>
  <head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title></title>
    <style>
    body {
      background-color: #ffffe6;
    }
    .back {
      background-color: white;
      background-image: url(images/map.jpg);
      background-size: 100% 100%;
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
    .i {
      padding: 6px;
      width: 50%;
      font-size: 15px;
    }
    .b {
      padding: 6px 6px;
      background: #ddd;
      font-size: 15px;
      border: none;
      cursor: pointer;
    }
    .b:hover {
      background: #ccc;
    }

    .dropdown {
      position: relative;
      display: inline-block;
    }

  .dropbtn {
      background-color: #00b33c;
      color: white;
      padding: 16px 50px;
      font-size: 16px;
      border: none;
      border-radius: 10px;
      cursor: pointer;
    }


    .dropdown-content {
      display: none;
      position: absolute;
      background-color: white;
      min-width: 160px;
      box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
      z-index: 1;
    }

    .dropdown-content button {
      color: black;
      padding: 12px 16px;
      display: block;
      font-size: 15px;
      border: none;
      background-color: inherit;
      min-width: 160px;
  }


    .dropdown-content button:hover {background-color: #f1f1f1}

    .dropdown:hover .dropdown-content {
      display: block;
    }

    .dropdown:hover .dropbtn {
      background-color: #3e8e41;
    }
    </style>
  </head>
  <body>
    <table width = "100%" height = "750" align = "center" border = "0">
      <tr>
        <th width = "15%" height = "10%" style="background-color: #ffffe6;"><a href="userHome.php"><img src="images/logo.png" width = "120" height = "60"></a></th>
        <th width = "20%" height = "10%">
          <div class="dropdown">
            <button class="dropbtn">Browse</button>
              <div class="dropdown-content">
                <form action="browseserver.php" method="get" target="if1">
                     <button value="cardio" type="submit" name="temp">Cardio</button>
                     <button value="Contraceptive" type="submit" name="temp">Contraceptive</button>
                     <button value="Dermato" type="submit" name="temp">Dermato</button>
                     <button value="Eye" type="submit" name="temp">Eye</button>
                     <button value="Gastro" type="submit" name="temp">Gastro</button>
                     <button value="Nerve" type="submit" name="temp">Nerve</button>
                     <button value="Nutrition" type="submit" name="temp">Nutrition</button>
                     <button value="Vitamin" type="submit" name="temp">Vitamin</button>
                </form>
              </div>
          </div>
        </th>
        <th width = "35%" height = "10%">
          <div>
            <form action="searchserver.php" method="get" target="if1">
              <input class="i" type="text" placeholder="Search.." name="search">
              <button class="b" type="submit"><i class="fa fa-search"></i></button>
            </form>
          </div>
        </th>
        <th width = "20%" height = "10%" align = "">
          <div>
            <a href="about.php" class="x" style="margin-right: 65px;" target="if1">About</a>
            <a href="logout.php" align = "center" style="text-decoration: none; color: black;">Logout</a>
          </div>
        </th>
        <th width = "10%" height = "10%">
          <?php
            echo "Welcome ".$temp;
          ?>


        </th>
      </tr>
      <tr>
          <th height = "5%" colspan="5" style="background-color: #bf8040; color: white; border: 1px solid black;" align ="center">Welcome to our page!</th>
      </tr>
      <tr>
        <th width = "15%" height = "75%" colspan="1">
          <table border="0" height= "300" align="center">
			<tr>
              <th><a class="x" href="Cart.php" >Cart</a></th>
            </tr>
			<tr>
              <th><a class="x" href="orders.php" >Orders</a></th>
            </tr>
            <tr>
              <th><a class="x" href="vision.php" target="if1">Vision</a></th>
            </tr>
            <tr>
              <th><a class="x" href="">Terms of Service</a></th>
            </tr>
            <tr>
              <th><a class="x" href="help.php" target="if1">Help Center</a></th>
            </tr>
            <tr>
              <th><a class="x" href="contact.php" target="if1">Contact Us</a></th>
            </tr>
          </table>
        </th>
        <th class="back" width = "85%" height = "75%" colspan="4">
        <iframe src="" width="100%" height="100%" name="if1" style=""></iframe>
        </th>
      </tr>
      <tr>
        <th colspan="5" align = "right" style=""><a class="x" href="feedback.php" target="if1">Feedback</a></th>
      </tr>
    </table>
  </body>
</html>



