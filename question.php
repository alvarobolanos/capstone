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
		}
	?>
	<!-- Header -->
	<?php include ("inc_header.html"); ?>
	
	<!-- Jumbotron -->
	<div class="jumbotron text-center">
		<h1><?php echo $title ?></h1>
	</div>

	<!-- Main -->
	<main class="container">
	<!-- Question and Answers Pane -->
		<h2>Get ready <?php echo $username?>!</h2>
		<section class="container">
			<?php
				if ($mysqli -> connect_errno) {
					echo "Failed to connect to Database" . $mysqli -> connect_error;
					exit();
				}; 
			?>
			<section>
				<form action="summary.php" method="POST">
				<?php
					if ($result = $mysqli -> query("SELECT * FROM qanda WHERE game_id = $id")) {
						$q_counter = 1;
						while($row = $result -> fetch_assoc()) { 
							echo '<div id="q_' . $q_counter .'">';
								echo '<h2>Question ' . $q_counter . '</h2>';
								echo '<p class="text-muted">' . $row["question"]. '</p>';
									echo '<div class="btn-group btn-group-toggle form-group" role="group" data-toggle="buttons">';
										echo '<label class="btn btn-lg btn-outline-primary">';
										echo '<input type="radio" name="answer_' . $q_counter . '" value="'; echo $row["answer_1"]; echo '" autocomplete="off" required>' . $row["answer_1"];
											echo '</label>';
										echo '<label class="btn btn-lg btn-outline-primary">';
											echo '<input type="radio" name="answer_' . $q_counter . '" value="'; echo $row["answer_2"]; echo '" autocomplete="off">' . $row["answer_2"];
											echo '</label>';
										echo '<label class="btn btn-lg btn-outline-primary">';
											echo '<input type="radio" name="answer_' . $q_counter . '" value="'; echo $row["answer_3"]; echo '" autocomplete="off">' . $row["answer_3"];
										echo '</label>';
										echo '<label class="btn btn-lg btn-outline-primary">';
											echo '<input type="radio" name="answer_' . $q_counter . '" value="'; echo $row["answer_4"]; echo '" autocomplete="off">' . $row["answer_4"];
										echo '</label>';
								echo '</div>';
							echo '</div>';
						++$q_counter;
						}
					}
				?>
					<input type="hidden" name="id" value="<?php echo $id ?>">
					<input type="hidden" name="username" value="<?php echo $username ?>">
					<input type="hidden" name="q_counter" value="<?php echo ($q_counter-1) ?>">
					</br>
					<button type="submit" class="btn btn-primary">Submit</button>
				</form>

			</section>
			<?php
				if ($result = $mysqli -> query("SELECT * FROM qanda WHERE game_id = $id")) {
					$counter = 0;
					$json_array = array();
					while ($row = $result -> fetch_assoc()) {
						$json_array[] = $row;
						++$counter;
					}
				}

			// pre_r($json_array);
			$questions = json_encode($json_array);
			// echo $questions;
			$mysqli->close();
			?>
			
			<script>
				var questions = <?php echo $questions; ?>;
				var i = 0;
				while (i < questions.length) {
					console.log(questions[i].question);
					console.log(questions[i].answer_1);
					console.log(questions[i].answer_2);
					console.log(questions[i].answer_3);
					console.log(questions[i].answer_4);
					++i;
				}

			</script>

		</section>

		<!-- Rules Modal -->
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
	
	<!-- <?php 
	echo 'Get';
	pre_r($_GET);
	echo 'Post';
	pre_r($_POST);
	?> -->
</body>

</html>

<?php 

function pre_r($array) {
	echo '<pre>';
	print_r($array);
	echo '</pre>';
}
?>