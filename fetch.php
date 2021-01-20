<?php

  include_once('include/database.php');

  $conn  = db_connect();



if (isset($_POST["search"])) {
$search = $_POST["search"];

  $fetchqry = "SELECT count(fragrance.fragrance_id) as countOfFragrances, fragrance.fragrance_name, fragrance.image, fragrance.fragrance_id,
  fragrance.category, brand.brand_name
                  FROM fragrance
                  INNER JOIN fragrance_note ON fragrance.fragrance_id = fragrance_note.fragrance_id_fk
                  INNER JOIN notes ON notes.note_id = fragrance_note.note_id_fk
                  INNER JOIN brand ON brand.brand_id = fragrance.brand_id_fk
                  WHERE note LIKE '%".$search."%' OR fragrance_name LIKE '%".$search."%' OR brand_name LIKE '%".$search."%' OR category LIKE '%".$search."%'
                  group by fragrance_name
                   ";

     $result3=mysqli_query($conn,$fetchqry);
     $row3=mysqli_fetch_array($result3);
     $num3=mysqli_num_rows($result3);

     $perfumes = array();
     $brands = array();
     $fragrance_id = array();
     $image = array();
     $category = array();



     foreach ($result3 as $query) {
         array_push($fragrance_id, $query['fragrance_id']);
         array_push($perfumes, $query['fragrance_name']);
         array_push($brands, $query['brand_name']);
         array_push($image, $query['image']);
         array_push($category, $query['category']);
       }
      $number=$row3['countOfFragrances'];
     if ($num3 > 0 ) {
       ?>
       <!DOCTYPE html>
       <html>
       <head>
         <meta name="viewport" content="width=device-width, initial-scale=1">

       </head>
       <body>
       <div class="container">
         <div class="row">
       <?php

     for ($i=0; $i < $num3 ; $i++) {
       $fetchqry2 = "SELECT notes.note, fragrance_note.note_placement
                       FROM notes
                       INNER JOIN fragrance_note ON notes.note_id = fragrance_note.note_id_fk
                       INNER JOIN fragrance ON fragrance.fragrance_id = fragrance_note.fragrance_id_fk
                       WHERE fragrance_id = $fragrance_id[$i]
                        ";
          $result2=mysqli_query($conn,$fetchqry2);
          $row2=mysqli_fetch_array($result2);
          $num2=mysqli_num_rows($result2);

          $notes = array();
          $note_placement = array();

          foreach ($result2 as $query) {
           array_push($notes, $query['note']);
           array_push($note_placement, $query['note_placement']);
         }
         ?>
         <div class="col-lg-3 col-md-4 col-6" style="margin-bottom: 50px;">



              <div class="card">
                <p class="brand"><?= $brands[$i] ?></p>
                <p class="fragrance"><?= $perfumes[$i] ?></p>
                <p class="category"><?= $category[$i] ?></p>

               <center> <img class="card-img" src="images/<?= $image[$i] ?>" alt="Card image">

              <table class="table table-responsive">
                <tr>
                 <h6 class="note_placement" scope="row"> <strong> Top  Note</strong></h6>
         <?php
         for ($x=0; $x < $num2 ; $x++) {
          if ($note_placement[$x] == 'Top') {
          ?>
          <p class="notes" style=""> <?="$notes[$x]"?></p>
        <?php }

     }
     ?>
              </tr>
                 </table>
                 <table class="table table-responsive justify-content-end">

                 <tr>
                  <h6 class="note_placement"> <strong> Heart Note </strong></h6>
                 <?php
                 for ($x=0; $x < $num2 ; $x++) {

                if ($note_placement[$x] == 'Heart') {
                  ?>
                  <p class="notes"> <?="$notes[$x] "?></p>
                  <?php
                }
             } ?>
           </tr>
         </table>
         <table class="note_placement" class="table table-responsive">

           <tr>
             <h6 class="note_placement"> <strong> Base Note </strong></h6>
             <?php
             for ($x=0; $x < $num2 ; $x++) {

            if ($note_placement[$x] == 'Base') {
              ?>
              <p class="notes"> <?="$notes[$x] "?></p>
              <?php
            }
         } ?>
             </tr>
           </table>
         </div>
       </div>

          <?php
       }
     }
     else {
       echo 'Nothing was found';
     }

    }

    elseif (isset($_POST["note"])) {
    $search = $_POST["note"];
    $fetchqry = "SELECT *
                   FROM notes
                   WHERE note LIKE '%".$search."%'
                    ";

      $result3=mysqli_query($conn,$fetchqry);
      $row3=mysqli_fetch_array($result3);
      $num3=mysqli_num_rows($result3);
      $notes = array();
      foreach ($result3 as $query) {
          array_push($notes, $query['note']);
        }

      if ($num3<1) {
        echo "nothing was found";
      }

      else {

        for ($i=0; $i < $num3 ; $i++) {
          ?>
           <ul class="nav">
            <li class="nav-item">
              <a class="nav-link active" href="#" id="button"><?="$notes[$i]"?></a>
            </li>
          </ul>
           <?php
        }
      }

    }
    else {
    echo "data not found";
    }



  ?>
</body>
</html>
