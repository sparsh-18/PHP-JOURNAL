<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Daily Journal</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/styles.css">
  <script src="//cdn.ckeditor.com/4.14.1/full/ckeditor.js"></script>
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

  <?php
  if($_SERVER['REQUEST_METHOD'] == "POST"){
        $title = $_POST['postTitle'];
        $body = $_POST['postBody'];

        $servername = "localhost";
        $username = "root";
        $pass = "";
        $dbname = "blogdb";
        $conn = new mysqli($servername,$username,$pass,$dbname);
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }

        $sql = "INSERT INTO `posts` (`title`, `body`) VALUES ('$title','$body')";
        if(mysqli_query($conn, $sql)){

          echo '<div class="alert alert-success" role="alert">Sucessfully uploaded! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';

        }
        else {
          echo '<div class="alert alert-danger" role="alert">Error cannot upload!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
        }
          $conn->close();
    }

   ?>

  <body>
    <div class="container">

      <h1>Compose</h1>

        <form class="" action="/blog/compose.php" method="POST">

          <div class="form-group">
            <label>Title</label>
            <input class="form-control" type="text" name="postTitle" value="" required>
            <label>Post</label>
            <textarea class="form-control" name="postBody" rows="5" cols="30" required></textarea>
            <script>
                CKEDITOR.replace( 'postBody' );
            </script>

          </div>
          <button class = "btn btn-primary" type="submit" name="button">Publish</button>
        </form>

    </div>
    <div class="footer-padding"></div>
      <div class="footer"  style="position:fixed">
        <p >Made with ❤️ by Sparsh</p>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
    </html>
