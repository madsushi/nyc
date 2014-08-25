<html>

<!-- oh god what is this I am not good at computers -->

	<head>
    <!-- Include SQL accounts -->
    <?php include_once("data/sql.data") ?>
    <?php include_once("script/sql.php");

    	$sqltestquery = mysqli_query($sqlcon, "select * from polish");
    	

    ?>
    <!-- Configure favicons -->
		<link rel="apple-touch-icon" sizes="57x57" href="/apple-touch-icon-57x57.png">
		<link rel="apple-touch-icon" sizes="60x60" href="/apple-touch-icon-60x60.png">
		<link rel="icon" type="image/png" href="/favicon-16x16.png" sizes="16x16">
		<link rel="icon" type="image/png" href="/favicon-32x32.png" sizes="32x32">
		<meta name="msapplication-TileColor" content="#00aba9">
    
    <title>Nail Your Colors!</title>
	</head>

	<body bgcolor="black">
		<p style="color:white">
		<?php include_once("script/analyticstracking.php") ?>
		
		Hello world!

		<br><br>

		<?php

			while ($sqltestrow = mysqli_fetch_assoc($sqltestquery)) {

				echo $sqltestrow["polish_brand"] . " - " . $sqltestrow["polish_name"] . " - " . $sqltestrow["polish_number"] . " - " . $sqltestrow["polish_primary_color"] . "<br>";

			}

		?>
		</p>
	</body>
  
</html>

