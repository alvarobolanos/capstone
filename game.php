<!doctype html>

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

	<!-- Style Override -->
	<link rel="stylesheet" href="style.css">

	<title>Trivia Night</title>
</head>

<body>
	<!-- Header -->
	<?php include ("inc_header.html"); ?>
	
	<!-- Jumbotron -->
	<div class="jumbotron text-center">
		<h1>Game Name</h1>
	</div>

	<!-- Main -->
	<main class="container">
		<div class="row">
			<!-- Game Pane -->
			<section class="col-md-6">
				<h2>Game Description</h2>
				<p class="text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos facilis nostrum
					sint minus aliquam assumenda harum illum! Aliquid velit ipsum voluptatem laboriosam, nisi quod et
					aut a earum illo dolores.
				</p>
				<button class="btn btn-primary btn-large btn-block" data-toggle="modal"
					data-target="#nameModal">Play</button>

				<!-- Name Modal -->
				<div class="modal fade" id="nameModal" tabindex="-1" role="dialog" aria-labelledby="Name Modal" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Welcome</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form action="question.php" method="POST">
									<div class="container">
										<div class="form-group">
											<label for="username">Name</label>
											<input type="text" class="form-control" id="username" name="username" aria-describedby="nameHelp"
												placeholder="Enter your name">
											<small id="nameHelp" class="form-text text-muted">We'll display it along your top score.</small>
										</div>
									</div>
								</form>
							</div>
							<div class="modal-footer">
								<button type="submit" class="btn btn-primary">Let's do this!</button>
							</div>
						</div>
					</div>
				</div>

			</section>

			<!-- Separator -->
			<div class="col-md-1"></div>
			
			<!-- Top Scores Pane -->
			<aside class="col-md-5 bg-light">
				<h3>Top Scores 🏆</h3>
				<table class="table table-striped">
					<thead>
					<tbody>
						<tr>
							<th scope="col">#</th>
							<th scope="col">Name</th>
							<th scope="col">Score</th>
						</tr>
						<tr>
							<th scope="row">1</th>
							<td>John S.</td>
							<td>100%</td>
						</tr>
						<tr>
							<th scope="row">2</th>
							<td>John S.</td>
							<td>97%</td>
						</tr>
						<tr>
							<th scope="row">3</th>
							<td>Kat</td>
							<td>93%</td>
						</tr>
					</tbody>
					</thead>
				</table>
			</aside>
		</div>

	</div>

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
	<?php 
	echo 'Get';
	pre_r($_GET);
	echo 'Post';
	pre_r($_POST);
	?>
</body>

</html>

<?php 

function pre_r($array) {
	echo '<pre>';
	print_r($array);
	echo '</pre>';
}
?>