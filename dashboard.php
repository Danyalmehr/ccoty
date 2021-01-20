<?php
/*if(!isset($_SERVER['HTTP_REFERER'])){
    // redirect them to your desired location
    header('location: index.php');
    exit;
}
elseif ($_SESSION['usertype'] == '') {
    // code...
    header('location: index.php');
    exit;
  }
*/
  include_once('include/database.php');

  //make the database connection
  $conn  = db_connect();




  ?>

  <!DOCTYPE html>
  <html lang="en">
  <head><meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="css/main.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>



          <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
          <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
          <link type="text/css" href="css/theme.css" rel="stylesheet">
          <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
          <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>



      <title>Coty</title>

  	<style>

  	</style>
  </head>
  <body onLoad="run_first()">
    <?php include("include/banner.inc") ?>
      <?php include("include/nav-admin.inc") ?>

      <div class="container">
                   <center> <h2>Admin Dashboard</h2><center><br>
                  <div class="dashboard row col-md-12 d-flex justify-content-center border">

                  <div class="container-menu">
                    <a  style="text-decoration: none;" href="add.php?id=addbrand">
                    <img src="images/tiffany.jpg" alt="Avatar" class="image">
                    <div class="overlay">
                      <div class="text">Create Brand</div>
                    </div>
                    </a>
                  </div>

                    <div class="container-menu">
                      <a style="text-decoration: none;" href="add.php?id=addnote">
                      <img src="images/notes.jpeg" alt="Avatar" class="image">
                      <div class="overlay">
                        <div class="text">Create Note</div>
                      </div>
                      </a>
                  </div>

                  <div class="container-menu">
                    <a  style="text-decoration: none;" href="add.php?id=addfragrance">
                    <img src="images/mj-perfect.jpg" alt="Avatar" class="image">
                    <div class="overlay">
                      <div class="text">Create Fragrance</div>
                    </div>
                    </a>
                </div>

                <div class="container-menu">
                  <a  style="text-decoration: none;" href="add.php?id=edit">
                  <img src="images/burberry_her.jpg" alt="Avatar" class="image">
                  <div class="overlay">
                    <div class="text">Edit</div>
                  </div>
                  </a>
              </div>
                </div>
              </div>

              </center>

  </body>
  </html>
