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
	<?php include ("db_connect.php"); 
		if (isset($_POST)) {
			$id = $_POST['id'];
			$title = $_POST['title'];
			$username = $_POST['username'];
			$q_counter = $_POST['q_counter'];
		}
	?>
	
	<!-- Header -->
	<?php include ("inc_header.html"); ?>
	
	<!-- Jumbotron -->
	<div class="jumbotron text-center">
		<h1><?php echo $title; ?></h1>
	</div>

	<!-- Main -->
	<main class="container">

		<section class="container">

		<?php
			// Extracting the correct answers
			if ($mysqli -> connect_errno) {
				echo "Failed to connect to Database" . $mysqli -> connect_error;
				exit();
			}
			if ($result = $mysqli -> query("SELECT question, correct_answer FROM qanda WHERE game_id = $id")) {
				while($row = $result -> fetch_assoc()) {
					$answers_array[] = $row;
				}
			}
			
			mysqli_free_result($result);
			$mysqli->close();
			
			// Printing the answers_array
			// pre_r($answers_array);

			// Encoding the answers_array to json
			// $correct_answers = json_encode($answers_array);
			
			// Scoring System

			$score = 0;
			for ($i = 0; $i <= $q_counter; $i++) {
				if ($answers_array[$i]['correct_answer'] == $_POST['answer_' . ($i)]) {
					$score++;
				}
			}

			// Calculating the score as a percentage.
			$final_score = (($score * 100)/($q_counter+1));
		?>
		
		<div class="container text-center">
			<h1><?php printf("%.2f", $final_score) ?> %</h1>
	
			<h4 class="text-muted">You scored <?php echo $score ?> correct answers out of <?php echo ($q_counter+1) ?>.</h4>
			<p>Thank you for playing <?php echo $username ?>.</p>
	
			<form action="game.php" method="post">
				<input type="hidden" name="id" value="<?php echo $id ?>">
				<input type="hidden" name="title" value="<?php echo $title ?>">
				<input type="hidden" name="username" value="<?php echo $username ?>">
				<input type="hidden" name="final_score" value="<?php echo $final_score ?>">
				<button type="submit" class="btn btn-success btn-lg">Check the Top Scores</button>
			</form>
		</div>
		<hr/>
		<div class="accordion" id="accordionExample">
			<div class="card">
				<div class="card-header" id="headingOne">
					<h2 class="mb-0">
						<button class="btn btn-link btn-block text-left text-decoration-none" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne"> Check out the full summary.
						</button>
					</h2>
				</div>

				<div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
					<div class="card-body">
						<table class="table table-striped">
							<thead>
							<tbody>
								<tr>
									<th scope="col">Question</th>
									<!-- <th scope="col">Correct Answer</th> -->
									<th scope="col">Your Answer</th>
									<th scope="col">Mark</th>
								</tr>
								<tr>
									<?php for ($i = 0; $i <= $q_counter; $i++) {?>
									<td><?php echo $answers_array[$i]['question'] ?></td>
									<!-- <td><?php echo $answers_array[$i]['correct_answer'] ?></td> -->
									<td><?php echo $_POST['answer_' . ($i)] ?></td>
									<td class="text-center"><?php echo ($answers_array[$i]['correct_answer'] === $_POST['answer_' . ($i)]?'✅':'❌') ?></td>
								</tr>
									<?php 
									}
									?>
							<tbody>
							</thead>
						</table>
					</div>
				</div>
			</div>
		</div>


		</section>
	</main>

	<!-- Footer -->
	<?php include ("inc_footer.html"); ?>

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
	// echo 'Get';
	// pre_r($_GET);
	// echo 'Post';
	// pre_r($_POST);
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