<?php
  include_once('include/database.php');
  $conn  = db_connect();

if (isset($_POST["brand_name"])) {
  $num = count($_POST["brand_name"]);

  if ($num > 0)
  {
    for ($i=0; $i < $num; $i++)
    {
        if(trim($_POST["brand_name"][$i]) != '')
        {
          $brand_name = mysqli_real_escape_string($conn, $_POST['brand_name'][$i]);
          $brand_desc = mysqli_real_escape_string($conn, $_POST['brand_desc'][$i]);


          $check="SELECT * FROM brand WHERE brand_name = '$brand_name'";
          $rs = mysqli_query($conn,$check);
          $data = mysqli_fetch_array($rs, MYSQLI_NUM);

          if ($data[0] > 1) {
              echo ("<li style='background-color:#ff9C9E;'> $brand_name already exist</li> <br>");
            }

            else {
                  $qry = "INSERT INTO `brand`(`brand_name`, `brand_desc`) VALUES ('$brand_name', '$brand_desc')";
                  mysqli_query($conn,$qry);
                  echo ("<li style='background-color:#ADFFB4;'> $brand_name was Inserted </li> <br>");

            }
        }
    }
  }
  elseif ($num = 0){
    echo false;
  }
}

elseif (isset($_POST["note"]) && isset($_POST["note_category"])) {


  $num = count($_POST["note"]);

  if ($num > 0)
  {
    for ($i=0; $i < $num ; $i++) {

      if(trim($_POST["note"][$i]) != '')
      {
        $note_name = mysqli_real_escape_string($conn, $_POST['note'][$i]);
        $note_category = mysqli_real_escape_string($conn, $_POST['note_category'][$i]);

        $check="SELECT * FROM notes WHERE note = '$note_name'";
        $rs = mysqli_query($conn,$check);
        $data = mysqli_fetch_array($rs, MYSQLI_NUM);

        if ($data[0] > 1) {
            echo ("<li style='background-color:#ff9C9E;'> $note_name already exist</li> <br>");
          }

        else {

          $qry = "INSERT INTO `notes`(`note`, `note_category`) VALUES ('$note_name', '$note_category')";
          mysqli_query($conn,$qry);
          echo ("<li style='background-color:#ADFFB4;'> $note_name was Inserted </li> <br>");
        }
      }
    }
    }
  }



  elseif (!empty($_POST["fragrance_name"]) && !empty($_POST["fragrance_category"]) && !empty($_POST["selected_brand"]) && !empty($_POST["top_note"]) && !empty($_POST["heart_note"]) && !empty($_POST["base_note"])) {

    if (isset($_POST["fragrance_name"]) && isset($_POST["fragrance_category"]) && isset($_POST["selected_brand"])) {
      // code...
      $fragrance_name = mysqli_real_escape_string($conn, $_POST['fragrance_name']);
      $fragrance_category = mysqli_real_escape_string($conn, $_POST['fragrance_category']);
      $selected_brand = mysqli_real_escape_string($conn, $_POST['selected_brand']);
      $fragrance_description = mysqli_real_escape_string($conn, $_POST['fragrance_description']);
      $fragrance_gender = mysqli_real_escape_string($conn, $_POST['fragrance_gender']);




      $filename = $_FILES['file']['name'];

      /* Location */
      $location = "images/".$filename;
      $uploadOk = true;
      $imageFileType = pathinfo($location,PATHINFO_EXTENSION);

      /* Valid Extensions */
      $valid_extensions = array("jpg","jpeg","png");
      /* Check file extension */
      if( !in_array(strtolower($imageFileType),$valid_extensions) ) {
         $uploadOk = false;
      }

    if($uploadOk == false){
       echo false;
    }
    else{
       /* Upload file */
       if(move_uploaded_file($_FILES['file']['tmp_name'],$location)){
         $qry6 = "INSERT INTO `fragrance`(`fragrance_name`, `category`, `image`, `fragrance_description`, `fragrance_gender`, `brand_id_fk`) VALUES ('$fragrance_name', '$fragrance_category', '".$filename."', '$fragrance_description', '$fragrance_gender', '$selected_brand')";
         mysqli_query($conn, $qry6);
         $last_id = mysqli_insert_id($conn);
         $num1 = count($_POST["top_note"]);
         $num2 = count($_POST["heart_note"]);
         $num3 = count($_POST["base_note"]);
         $sum = $num1 + $num2 + $num3;

         if ($sum > 0) {

           if (isset($_POST["top_note"]) && $num1 > 0) {
             for ($i=0; $i < $num1; $i++)
              {
                $top_note = mysqli_real_escape_string($conn, $_POST['top_note'][$i]);

                $fetchqry1 = "SELECT note_id
                                FROM notes
                                WHERE note = '$top_note'";
               $result1=mysqli_query($conn,$fetchqry1);

               while ($row1=mysqli_fetch_array($result1)) {
                 $note_id_top = $row1['note_id'];
                 $qry1 = "INSERT INTO `fragrance_note`(`note_id_fk`, `note_placement`, `fragrance_id_fk`) VALUES ('$note_id_top', 'Top', '$last_id')";
                 mysqli_query($conn,$qry1);
               }
             }
           }

           if (isset($_POST["heart_note"])) {
              for ($i=0; $i < $num2; $i++)
              {
                $heart_note= mysqli_real_escape_string($conn, $_POST['heart_note'][$i]);

                $fetchqry1 = "SELECT note_id
                                FROM notes
                                WHERE note = '$heart_note'";
               $result1=mysqli_query($conn,$fetchqry1);
               $num1=mysqli_num_rows($result1);


               while ($row1=mysqli_fetch_array($result1)) {
                 $note_id = $row1['note_id'];
                 $qry1 = "INSERT INTO `fragrance_note`(`note_id_fk`, `note_placement`, `fragrance_id_fk`) VALUES ('$note_id', 'Heart', '$last_id')";
                 mysqli_query($conn,$qry1);
               }
             }
           }

           if (isset($_POST["base_note"])) {
              for ($i=0; $i < $num3; $i++)
              {
                $base_note= mysqli_real_escape_string($conn, $_POST['base_note'][$i]);
                $fetchqry2 = "SELECT note_id
                                FROM notes
                                WHERE note = '$base_note'";
               $result2=mysqli_query($conn,$fetchqry2);
               $num2=mysqli_num_rows($result2);


               while ($row2=mysqli_fetch_array($result2)) {
                 $note_id = $row2['note_id'];
                 $qry2 = "INSERT INTO `fragrance_note`(`note_id_fk`, `note_placement`, `fragrance_id_fk`) VALUES ('$note_id', 'Base', '$last_id')";
                 mysqli_query($conn,$qry2);
               }
              }
            }
         }

         echo "$fragrance_name was created!";
       }
       else{
          echo false;
       }
    }
  }
}
else {
  echo "'something went wrong'";
};

?>
