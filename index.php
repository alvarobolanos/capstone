<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
		integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	
	<!-- Style Override -->
	<link rel="stylesheet" href="style.css">

	<title>Trivia Night</title>
</head>

<body>
	<!-- Connect to database -->
	<?php include ("db_connect.php"); ?>
	
	<!-- Header -->
	<?php include ("inc_header.html"); ?>
	
	<!-- Main -->
	<main class="container">

		<h1>Let's Play Trivia!</h1>
		<h2>Select your game.</h2>
		
		<section class="container">
			<div class="row">	
				<!-- Populate Game Cards. -->
				<?php
				if ($mysqli -> connect_errno) {
					echo "Failed to connect to Database" . $mysqli -> connect_error;
					exit();
				}
				if ($result = $mysqli -> query("SELECT * FROM games")) {
					$counter = 1;
					while ($row = $result -> fetch_assoc()) {
						echo '<div class="col-md-4" >';
							echo '<div class="card mb-4 shadow-sm">';
								echo '<img src="" class="card-img-top" alt="">';
								echo '<div class="card-body">';
									echo '<img src="' . $row["image_url"] . '" class="card-img-top">';
									echo '<h5 class="card-title">' . $row["title"] . '</h5>';
									echo '<p class="card-text text-muted">' . $row["description"]. '</p>';
									echo '<form action="game.php" method="POST">';
										echo '<button class="btn btn-primary" type="submit" name="game_id" value="' . $row["id"]. '" value>Play</button>';
									echo '</form>';
								echo '</div>';
							echo '</div>';
						echo '</div>';
						if ($counter%3 == 0) {
							echo '<br>';
						}
						++$counter;
					}
					mysqli_free_result($result);
				}
				$mysqli->close();
				?>
			</div>
		</section>
	</main>
	
<form action="" method="post"></form>

	<!-- Footer -->
	<?php include ("inc_footer.html"); ?>

	<!-- Optional JavaScript -->

	<script src="index.js"></script>

	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
		integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
	</script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
		integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
	</script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
		integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
	</script>
</body>

</html>