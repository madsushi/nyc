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

      $query_catch = array();

      $querybuilder = "select * from polish where polish_id<>''";

      if(isset($_GET['brand'])){
        $filter_brand = mysqli_real_escape_string($sqlcon, htmlspecialchars($_GET['brand']));
        $querybuilder = $querybuilder . " and polish_brand='" . $filter_brand . "'";
        $query_catch['brand'] = $filter_brand;
        $query_color['brand'] = $filter_brand;
        $query_finish['brand'] = $filter_brand;
      }

      if(isset($_GET['color'])){
        $filter_color = mysqli_real_escape_string($sqlcon, htmlspecialchars($_GET['color']));
        $querybuilder = $querybuilder . " and polish_primary_color='" . $filter_color . "'";
        $query_catch['color'] = $filter_color;
        $query_brand['color'] = $filter_color;
        $query_finish['color'] = $filter_color;
      }

      if(isset($_GET['finish'])){
        $filter_finish = mysqli_real_escape_string($sqlcon, htmlspecialchars($_GET['finish']));
        $querybuilder = $querybuilder . " and polish_finish='" . $filter_finish . "'";
        $query_catch['finish'] = $filter_finish;
        $query_brand['finish'] = $filter_finish;
        $query_color['finish'] = $filter_finish;
      }

      $querybuilder = $querybuilder . " ORDER BY polish_number ASC";
      $sqltestquery = mysqli_query($sqlcon, $querybuilder);

      $query_state = "?";
      foreach ($query_catch as $k => $v) {
        $query_state = $query_state . "&" . $k . "=" . $v;
      }
      
    ?>
    
    <title>Nail Your Colors!</title>

  </head>

  
  <!-- neck goes here -->


  <body>

    <?php require "script/navbar.php"; ?>


      <?php require "script/analyticstracking.php"; ?>
      

    <div class="container">
      
      <div class="col-md-2">

        Filter:<br>
        <form action="/" method="get" style="margin: 0;">
          <select name="brand">
            <option value='Zoya'>Zoya</option>
            <option value='Orly'>Orly</option>
          </select><br>
          <select name="color">
            <option value='Red'>Red</option>
            <option value='Blue'>Blue</option>
          </select><br>
          <select name="finish">
            <option value='Creme'>Creme</option>
            <option value='Metallic'>Metallica</option>
          </select><br>
          <INPUT type="submit" class="btn-success" value="Search!">
        </form>          

      </div>

      <div class="row col-md-8">
        <!-- <div class="center-block"> -->

          <table class="table table-hover table-bordered table-striped">
              <thead>
                  <tr>
                      <th>Swatch</th>
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

                        if($sqltestrow["polish_secondary_color"] !== ""){

                          $secondary_color = " (" . $sqltestrow["polish_secondary_color"] .")";

                        } else {

                          $secondary_color = "";

                        }


                        echo "<tr>";
                        echo "<td>" . "<img src='image/swatch/" . $sqltestrow["polish_brand"] . "/" . $sqltestrow["polish_number"] . ".png'></td>";
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
        <!-- </div> -->
      </div>
    </div>


    <!-- jQuery and Bootstrap -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>   

  </body>

</html>