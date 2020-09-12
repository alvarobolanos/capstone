<!doctype html>

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
	<!-- Header -->
	<?php include ("inc_header.html"); ?>
	
	<!-- Main -->
	<main class="container">

		<h1>Let's Play Trivia!</h1>
		<h2>Select your game.</h2>
		
		<!-- Game cards -->
		<section class="container">
			<div class="row">
				<div class="col-md-4" >
					<div class="card mb-4 shadow-sm">
						<img src="" class="card-img-top" alt="">
							<div class="card-body">
								<h5 class="card-title">The game's title</h5>
								<p class="card-text text-muted">The games' description</p>
								<form action="/game.php" method="GET">
									<input type="hidden" name="">
									<input type="submit" value="">
								</form>
								<a href="game.php" class="btn btn-primary">Play</a>
							</div>
					</div>
				</div>

				<div class="col-md-4" >
					<div class="card mb-4 shadow-sm">
						<img src="" class="card-img-top" alt="">
							<div class="card-body">
								<h5 class="card-title">The game's title</h5>
								<p class="card-text text-muted">The games' description</p>
								<a href="game.php" class="btn btn-primary">Play</a>
							</div>
					</div>
				</div>
				
				<div class="col-md-4" >
					<div class="card mb-4 shadow-sm">
						<img src="" class="card-img-top" alt="">
							<div class="card-body">
								<h5 class="card-title ">The game's title</h5>
								<p class="card-text text-muted">The games' description</p>
								<a href="game.php" class="btn btn-primary">Play</a>
							</div>
					</div>
				</div>

			</div>

		</section>
		
	</main>
	
	<!-- Footer -->
	<?php include ("inc_footer.html"); ?>

	<!-- Optional JavaScript -->
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

</html>