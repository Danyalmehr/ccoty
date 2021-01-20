<?php
session_start();
//must appear BEFORE the <html> tag
include_once('include/database.php');
$conn  = db_connect();


if (empty($_SESSION['name'])) {
  $name = "";
}else {
  $name = $_SESSION['name'];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/main.css">

</head>
<body>

  <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #1e273a; color:#ffffff;">
    <a class="navbar-brand" style="color:#ffffff;" href="#">Coty</a>
    <button class="navbar-toggler navbar-dark" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse"  id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" style="color:#ffffff;" href="index.php">Home <span class="sr-only">(current)</span></a>
        </li>
      </ul>
    </div>
    <form method="GET" class="mx-2 my-auto w-100">
      <div class="search input-group">
      <br>  <input class="form-control mr-sm-2" id="search" name="search" type="text" placeholder="Search..." aria-label="Search">
 </div>
    </form>
  </nav>


</body>
</html>
