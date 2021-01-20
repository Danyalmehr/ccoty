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
    <script src="js/fetch.js"></script>



        <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link type="text/css" href="css/theme.css" rel="stylesheet">
        <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
        <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>

    <title>Dashboard</title>

</head>

<style>

</style>

<body onLoad="run_first()">
    <?php include("include/nav-admin.inc") ?>

    <div class="container">

     <?php
     $data = $_GET["id"];

     ////////////////////////////////////////////////////ADD BRAND///////////////////////////////////////////////////

     if ($data == "addbrand") {
     ?>
      <center> <h2>Create Brand</h2><center><br>
        <div class="form-group col-md-12 border">


      <div style="margin-top:30px;" class="row d-flex justify-content-center">
            <form class="add_data" action="" method="post" id="add_brand" name="add_brand">

              <table class="data_table table table-bordered" id="dynamic_field">
                  <tr>
                    <td><input onkeyup="check()" name="brand_name[]" id="brand_name[]" type="text" class="inp brand_name is-invalid form-control name_list" placeholder="Brand Name" required></td>
                    <td><input name="brand_desc[]" id="brand_desc" type="text" class="form-control name_list" placeholder="About Brand"></td>
                    <td><button disabled class="more btn btn-primary mb-2" type="button" name="add" id="add">Add more</button></td>
                </tr>
            </table>
            <div hidden id="loader">
              <img  class="loader" src="images/loader.gif" alt="Loading...">
            </div>
            <button disabled class="submit btn btn-primary mb-2" type="submit" id="insert_brand" name="submit">Insert</button>

            </form>

            <div class="hidden result">

              <table id="result">
                <th>Result for notes</th>
                <tr>
                  <td></td>
                </tr>
              </table>
            <button onclick="ok()" class="ok btn btn-primary mb-2" type="button" id="ok_note" name="submit">ok</button>
          </div>
          </div>


      <?php }

  ////////////////////////////////////////////////////ADD FRAGRANCE///////////////////////////////////////////////////
      elseif ($data == "addfragrance") {
        $fetchqry2 = "SELECT brand_id, brand_name
                        FROM brand";
       $result2=mysqli_query($conn,$fetchqry2);
       $num2=mysqli_num_rows($result2);?>
        <center> <h2>Create Fragrance</h2><center><br>
        <div class="form-group col-md-12 border">
            <form class="" action="" method="post" id="add_fragrance" name="add_fragrance" enctype='multipart/form-data'>


              <div style="margin-top:30px;" class="col-md-6">

              <table class="table table-bordered">
                <tbody>




                  <tr>
                    <td>
                      <select name="selected_brand" class="form-control name_list" id="selected_brand" required>
                         <option value="" disabled selected hidden>Please Choose Brand... *</option>
                        <?php  while ($row2=mysqli_fetch_array($result2))
                        {
                          $brand_id = $row2['brand_id'];
                          $brand_name = $row2['brand_name'];
                          ?>
                          <option value="<?= $brand_id ?>"><?= $brand_name ?></option>
                        <?php
                      }
                      ?>
                    </select>

                  </tr>
                  <tr >
                    <td><input name="fragrance_name" id="fragrance_name" type="text" class="form-control" placeholder="Fragrance Name *" required></td>
                  </tr>
                  <tr >
                    <td>
                      <select onchange="check()" name="fragrance_gender" id="fragrance_gender" type="text" class="form-control name_list">
                      <option selected value="Female">Female</option>
                      <option value="Male">Male</option>
                      <option value="Unisex">Unisex</option>
                    </select>
                  </td>
                  </tr>
                  <tr >
                    <td><input name="fragrance_category" id="fragrance_category" type="text" class="form-control" placeholder="Fragrance Category *" required></td>
                </tr>
                <tr >
                  <td><input name="fragrance_description" id="fragrance_description" type="text" class="form-control" placeholder="fragrance Description" required></td>
              </tr>
                <tr >
                    <td id="note">

                      <input id="note_name" class="search form-control name_list" type="text" name="note[]" value="" placeholder="Note *">

                      <div id="result" class="d-flex justify-content-center">
                        <div hidden id="loader">
                          <img  class="loader" id="loader" src="images/loader.gif" alt="Loading...">
                        </div>
                      </div>

                    </td>
                  </tr>
                  <tr scope="row" >
                    <th class="col-md-4 add note_placement btn btn-info mb-2" type="button" name="note" id="add_top_note">Top Note</th>
                    <th class="col-md-4 add note_placement btn btn-danger mb-2" type="button" name="heart" id="add_heart_note">Heart Note</th>
                    <th class="col-md-4 add note_placement btn btn-primary mb-2" type="button" name="base" id="add_base_note">Base Note</th>
                </tr>
                <tr>
                  <td id="top_note" ><label>Top note: *</label>  </td>
                </tr>

                <tr>
                  <td id="heart_note"> <label>Heart note: *</label>
                  </tr>

                  <tr>
                  <td id="base_note"> <label>Base note: *</label>
                </tr>
            </tbody>
          </table>
          </div>
          <div style="margin-top:30px; padding:10px;" class="col-md-6 border">
            <div class="image-upload-one">
              <div class="center">
                <div class="form-input">
                  <label for="file-ip-1">
                    <img id="file-ip-1-preview" src="images/blank.png">
                  </label>
                  <input type="file"  name="file" id="file" onchange="showPreviewOne(event);" required></input>
                </div>
                <button type="button" class="btn btn-danger btn-sm glyphicon glyphicon-repeat" onclick="myImgRemoveFunctionOne()"></button>
              </div>
            </div>
      </div>
      <div style="margin-top:10px;" class="row col-md-12 d-flex justify-content-center">
        <div hidden id="insertloader">
          <img  class="loader" src="images/loader.gif" alt="Loading...">
        </div>
        <button class="btn btn-primary mb-2" type="submit" id="insert" name="submit">Insert</button>
      </div>
            </form>
          </div>

        <?php
      }
      ////////////////////////////////////////////////////ADD NOTES///////////////////////////////////////////////////

      else {
        ?>

         <center> <h2>Create Note</h2><center><br>
           <div class="form-group col-md-12 border">


         <div style="margin-top:30px;" class="row d-flex justify-content-center">

           <div class="form-group">
               <form class="add_data" action="" method="post" id="note_form" name="add_data">

                 <table class="data_table table table-bordered" id="note_table">
                     <tr>
                       <td><input onkeyup="check()" name="note[]" id="note" type="text" class="inp is-invalid note_name form-control name_list" placeholder="Note" required></td>

                       <td>
                         <select onchange="check()" name="note_category[]" id="note_category" type="text" class="note_category form-control name_list">
                         <option value="" selected hidden>fragrance Category...</option>
                         <option value="Fruit">Fruit</option>
                         <option value="Flower">Flower</option>
                         <option value="Wood">Wood</option>
                         <option value="Plant">Plant</option>
                         <option value="Other">Other</option>
                       </select>
                     </td>
                       <td><button disabled class="more btn btn-primary mb-2" type="button" name="add" id="add_note">Add more</button></td>
                   </tr>
               </table>
               <div hidden id="loader">
                 <img  class="loader" src="images/loader.gif" alt="Loading...">
               </div>
               <button disabled class="submit btn btn-primary mb-2" type="submit" id="insert_note" name="submit">Insert</button>
               </form>

               <div class="hidden result">

                 <table id="result">
                   <th>Result for notes</th>
                   <tr>
                     <td class='danger'></td>
                   </tr>
                 </table>
               <button onclick="ok()" class="ok btn btn-primary mb-2" type="button" id="ok_note" name="submit">ok</button>
             </div>
             </div>

         <?php
       }
       ?>
     </div>
     </div>
        </div>
      </div>

      <script>
      $(document).ready(function(){

          $("#ok_note").click(function(event){
            $('.newRow').remove();
            $('.inp').addClass("is-invalid");
            $('.add_data').prop("hidden", false);
            $('.submit').prop("hidden", false);


            $('.submit').prop("disabled", true);
            $('.more').prop("disabled", true);

            $('.result').addClass("hidden");
          });
          });

      </script>
</body>
</html>
