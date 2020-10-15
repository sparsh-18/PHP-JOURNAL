<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Daily Journal</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/styles.css">
  <nav class="navbar navbar-default">
    <div class="container">
      <div class="navbar-header">
        <p class="navbar-brand">DAILY JOURNAL</p>
      </div>
        <ul class="nav navbar-nav navbar-right">
          <!-- 6 -->
          <li id="home"><a href="index.php">HOME</a></li>
          <!-- <li id="about"><a href="#">ABOUT US</a></li>
          <li id="contact"><a href="#">CONTACT US</a></li> -->
          <li id="contact"><a href="compose.php">COMPOSE</a></li>
        </ul>
    </div>
  </nav>

  <body>
    <div class="container">

      <?php
          $servername = "localhost";
          $username = "root";
          $pass = "";
          $dbname = "blogdb";
          $conn = new mysqli($servername,$username,$pass,$dbname);
          if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
          }
          $sql = "SELECT * FROM `posts`";
          $result = mysqli_query($conn, $sql);

          if (mysqli_num_rows($result) > 0) {
            //output data of each row
            while($row = mysqli_fetch_assoc($result)) {
              $b = substr($row['body'],0,300).".... ";
              $t = $row['id'];

              echo "<h1>".$row['title']."</h1><br><p>".$b."<a href= 'post.php?show= $t'>Read More</a></p><br>";

            }
          } else {
            echo "0 results";
          }
          $conn->close();
       ?>


    </div>
    <div class="footer-padding"></div>
      <div class="footer">
        <p style="padding-top:2%">Made with ❤️ by Sparsh</p>
      </div>
    </div>
    </body>
    </html>
