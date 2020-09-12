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
	
	<!-- Jumbotron -->
	<div class="jumbotron text-center">
		<h1>Game Name</h1>
	</div>

	<!-- Main -->
	<main class="container">

		<!-- Questions Pane -->
		<section>
			<h2>Question #</h2>
			<span class="text-muted">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Delectus, consequatur? A consequatur quas ipsum non labore explicabo, esse alias facilis doloribus dolorem laborum ipsa soluta fugiat corrupti sunt reprehenderit fugit?</span>
		</section>
		
		<!-- Answers Pane -->
		<section class="container">
				<form action="" method="POST">
					<div class="btn-group d-flex btn-group-toggle" role="group" data-toggle="buttons">
						<label class="btn btn-lg btn-block btn-primary">
							<input type="radio" name="options" id="option1"> Answer 1
						</label>
						<label class="btn btn-lg btn-block btn-primary">
							<input type="radio" name="options" id="option2"> Answer 2
						</label>
						<label class="btn btn-lg btn-block btn-primary">
							<input type="radio" name="options" id="option3"> Answer 3
						</label>
						<label class="btn btn-lg btn-block btn-primary">
							<input type="radio" name="options" id="option4"> Answer 4
						</label>
						<input type="hidden" name="">
						<input type="submit" value="">
				</form>
			</div>


		</section>

		<!-- Name Modal -->
			<div class="modal fade" id="rulesModal" tabindex="-1" role="dialog" aria-labelledby="Rules Modal" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Rules</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<div class="container">
								<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Similique odit provident, est consequatur labore hic rerum unde officia itaque, error quae reiciendis iusto, accusantium nemo. Aperiam placeat deleniti optio commodi?
								</p>
							</div>
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn btn-primary">Got it!</button>
						</div>
					</div>
				</div>
			</div>

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