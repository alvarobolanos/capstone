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
			<div class="container">
				<div class="row">
					<form action="summary.php" method="POST">
					<?php
						if ($result = $mysqli -> query("SELECT * FROM qanda WHERE game_id = $id;")) {
							$q_counter = 0;
							while($row = $result -> fetch_assoc()) { ?>
								<div id="q_<?php echo ($q_counter+1); ?>">
									<h2>Question <?php echo ($q_counter+1) ?></h2>
									<p class="text-muted"><?php echo $row["question"] ?></p>
									<div class="btn-group btn-group-toggle form-group" role="group" data-toggle="buttons">
										<label class="btn btn-lg btn-outline-primary">
											<input type="radio" name="answer_<?php echo($q_counter) ?>" value="<?php echo $row["answer_1"] ?>" autocomplete="off" required><?php echo $row["answer_1"] ?>
										</label>
										<label class="btn btn-lg btn-outline-primary">
											<input type="radio" name="answer_<?php echo($q_counter) ?>" value="<?php echo $row["answer_2"] ?>" autocomplete="off" required><?php echo $row["answer_2"] ?>
										</label>
										<label class="btn btn-lg btn-outline-primary">
											<input type="radio" name="answer_<?php echo($q_counter) ?>" value="<?php echo $row["answer_3"] ?>" autocomplete="off" required><?php echo $row["answer_3"] ?>
										</label>
										<label class="btn btn-lg btn-outline-primary">
										<input type="radio" name="answer_<?php echo($q_counter) ?>" value="<?php echo $row["answer_4"] ?>" autocomplete="off" required><?php echo $row["answer_4"] ?>
										</label>
									</div>
								</div>
							<?php
							++$q_counter;
							}
						} ?>
						<input type="hidden" name="id" value="<?php echo $id ?>">
						<input type="hidden" name="username" value="<?php echo $username ?>">
						<input type="hidden" name="title" value="<?php echo $title ?>">
						<input type="hidden" name="q_counter" value="<?php echo ($q_counter-1) ?>">
						</br>
						<div class="row">
							<div class="col">
								<button id="previous" type="button" class="btn btn-primary" onclick="displayPrevious();">Previous Question</button>
							</div>
 							<div class="col">
								<button id="next" type="button" class="btn btn-primary" onclick="displayOneQuestion();">Next Question</button>
							 </div>
							<div class="col text-right">
								<button id="submit" type="submit" class="btn btn-primary">Submit</button>
							</div>
						</div>
					</form>
				</div>

			</div>
			
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
		<!-- Go Back Home -->
		<?php include ("inc_gobackhome.html"); ?>	
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
							<ul>
								<li>You will be presented with a series of questions.</li>
								<li>Your job is to answer as many questions correctly as you can.</li>
								<li>The quicker you answer the questions, the higher you will score.</li>
								<li>Note however that there is no time limit.</li>
								<li>In the end you will be presented with a score based on the correctly answered questions.</li>
							</ul>
						</div>
					</div>
					<div class="modal-footer">
						<button id="startTimer" type="startTimer" class="btn btn-secondary" data-dismiss="modal">Start the Timer</button>
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
	
	<script>
		// $(document).ready(function(){
		// 	$("#rulesModal").modal('show');
		// });
	</script>
	<!-- <script>
		$(document).ready(function(){
			$("#startTimer").click(function({

			}));
		});
	</script> -->

	<script>var questions = <?php echo $questions; ?>;</script>
	<script type="text/javascript" src="gameBehavior.js"></script>
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