
<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
    <script src="js/jQuery.tabable-required-focus.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="js/check.js"></script>
    <script src="js/add.js"></script>
    <script src="js/form-validation.js"></script>


        <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link type="text/css" href="css/theme.css" rel="stylesheet">
        <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
        <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>

    <title>EDIT</title>

</head>

<style>

</style>

<body onLoad="run_first()">
    <?php include("include/nav-admin.inc") ?>

    <div class="container">
      <div class="d-flex justify-content-center ">
        <center> <h2>Edit fragrance</h2><center><br>

     <?php
     $data = $_GET["id"];
     if ($data == "editFragrance") {
            $fragrances = "SELECT *
                FROM fragrance
                ";
      					$result = mysqli_query($conn,$fragrances);
                $num=mysqli_num_rows($result);

        if ($num < 1) {
          echo "No fragrance available!";
        }
        else {
       ?>
       <div class="table-responsive">
       <table class="" id="" >
       <tr>
                 <th> Fragrance name </th>
                 <th> Category </th>
                 <th> Image </th>
                 <th> Fragrance Description </th>
             </tr>
             <?php

         while($row = mysqli_fetch_array($result))
         {?>
           <tr><form action= method=post>
                 <input type=hidden name='fragrance_id' value=<?=" '".htmlspecialchars($row['fragrance_id'], ENT_QUOTES)."' "?>>
                  <tr>
                            <td><input class='form-control name_list' type=text name=fname value=<?=" '".htmlspecialchars($row['fragrance_name'], ENT_QUOTES)."' "?>></td>
                            <td><input class='form-control name_list' type=text name=lname value=<?=" '".htmlspecialchars($row['category'], ENT_QUOTES)."' "?>></td>
                            <td><input class='form-control name_list' type=email name=email value=<?=" '".htmlspecialchars($row['image'], ENT_QUOTES)."' "?>></td>
                            <td><input class='form-control name_list'type=text name=password value=<?=" '".htmlspecialchars($row['fragrance_description'], ENT_QUOTES)."' "?>></td>
                            <td><button class='delete' type=submit name=update onclick='return ask2()'><span class='glyphicon glyphicon-wrench logo-small'></span></button></td>
                            <td><button class='delete'type=submit name=delete onclick='return ask()'><span class='glyphicon glyphicon-trash logo-small'></span></button></td>
                       </tr>
                    </form></tr>
                    <?php

         }
                 ?>

   <?php }
    } ?>
  </table>
</div>

   <?php
   $data = $_GET["id"];
   if ($data == "editNote") {
   ?>
      <p>nt</p>

   <?php } ?>

   <?php
   $data = $_GET["id"];
   if ($data == "editBrand") {
   ?>
      <p>eb</p>

  <?php } ?>
   </div>
 </div>

</body>
</html>
