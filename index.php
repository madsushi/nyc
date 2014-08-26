<html lang="en">

<!-- oh god what is this I am not good at computers -->

  <head>
    
    <?php

      // Include Boostrap settings
      require "script/bootstrap.php";

      // Configure favicons
      require "script/favicon.php";

      // Include SQL accounts
      require "data/sql.data";
      require "script/sql.php";
      $sqltestquery = mysqli_query($sqlcon, "select * from polish");
      
    ?>
    
    <title>Nail Your Colors!</title>

  </head>

  
  <!-- neck goes here -->


  <body>

    <?php require "script/navbar.php"; ?>


      <?php require "script/analyticstracking.php"; ?>
      

    <div class="container">
      <div class="row">
        <div class="center-block">
          <table class="table table-hover table-bordered table-striped">
              <thead>
                  <tr>
                      <th>Brand</th>
                      <th>Name</th>
                      <th>ID #</th>
                      <th>Finish</th>
                      <th>Color</th>
                  </tr>
              </thead>
              <tbody>

                    <?php

                      while ($sqltestrow = mysqli_fetch_assoc($sqltestquery)) {

                        if($sqltestrow["polish_glitter_type"] !== ""){

                          $glitter = " (" . $sqltestrow["polish_glitter_type"] .")";

                        } else {

                          $glitter = "";

                        }

                        echo "<tr>";
                        echo "<td>" . $sqltestrow["polish_brand"] . "</td>";
                        echo "<td>" . $sqltestrow["polish_name"] . "</td>";
                        echo "<td>" . $sqltestrow["polish_number"] . "</td>";
                        echo "<td>" . $sqltestrow["polish_finish"] . $glitter . "</td>";
                        echo "<td>" . $sqltestrow["polish_color_tone"] . " " . $sqltestrow["polish_color_mod"] . " " . $sqltestrow["polish_primary_color"] . "/" . $sqltestrow["polish_secondary_color"] . "</td>";
                        echo "</tr>";

                      }

                    ?>

              </tbody>
          </table>
        </div>
      </div>
    </div>


    <!-- jQuery and Bootstrap -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>   

  </body>

</html>