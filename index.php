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
          <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
          <script src="js/fetch.js"></script>



      <title>Coty</title>

  	<style>

  	</style>
  </head>
  <body onLoad="run_first()">
  	<?php include("include/banner.inc") ?>
      <?php include("include/nav.inc")?>

      <div id="result" class="d-flex justify-content-center ">
        <div class="initial info">
          <h2>Search for a specific Note, Fragrance or Brand</h2>
        </div>
         <div hidden id="loader">
           <img  class="loader" src="images/loader.gif" alt="Loading...">
         </div>
      </div>



</body>
</html>


<script type="text/javascript">



</script>
