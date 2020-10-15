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

          // if delete button is pressed 
          if(isset($_GET['delete'])) {
            $id = $_GET['delete'];
            $del_sql = "delete from `posts` where `id` = '$id'";
            if($conn->query($del_sql)) {
              echo '<div class="alert alert-success" role="alert">Post deleted! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
            }
          }


          $sql = "SELECT * FROM `posts`";
          $result = mysqli_query($conn, $sql);

          if (mysqli_num_rows($result) > 0) {
            //output data of each row
            while($row = mysqli_fetch_assoc($result)) {
              $b = substr($row['body'],0,300).".... ";
              $t = $row['id'];

              echo "<h1>".$row['title']."</h1><a href='/blog/index.php?delete= $t'><button class='btn btn-danger'>Delete</button></a><br><p>".$b."<a href= 'post.php?show= $t'>Read More</a></p><br>";

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
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
    </html>
