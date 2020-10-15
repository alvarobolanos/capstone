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
			$username = $_POST['username'];
			$q_counter = $_POST['q_counter'];
		}
	?>
	
	<!-- Header -->
	<?php include ("inc_header.html"); ?>
	
	<!-- Main -->
	<main class="container">

		<section class="container">
		<?php
			// Extracting the correct answers
			if ($mysqli -> connect_errno) {
				echo "Failed to connect to Database" . $mysqli -> connect_error;
				exit();
			}
			if ($result = $mysqli -> query("SELECT correct_answer FROM capstone.qanda WHERE game_id=1")) {
				while($row = $result -> fetch_assoc()) {
					$answers_array[] = $row;
				}
			}
			mysqli_free_result($result);
			$mysqli->close();
			
			// pre_r($answers_array);
			// $correct_answers = json_encode($answers_array);
			// echo $correct_answers;
			
			// Scoring System

			$score = 0;
			for ($i = 0; $i < $q_counter; $i++) {
				// echo $answers_array[$i]['correct_answer'];
				// echo $_POST['answer_' . $i];
				if ($answers_array[$i]['correct_answer'] == $_POST['answer_' . ($i+1)]) {
					$score++;
				}
			}

			$final_score = (($score * 100)/$q_counter);
			echo 'You correctly answered ' . $score . ' out of ' . $q_counter . '. ';
			echo "Here's your score " . $username . ": ";
			printf("%.2f", $final_score);
			echo '%'
		?>

		<script>		// Here's a similar approach to last's page to compare using javascript as a last resort.
			var correct_answers = <?php echo $correct_answers; ?>;

			while (i < correct_answers.length) {
					console.log(correct_answers[i].question);
					console.log(correct_answers[i].correct_answer);
					++i;
				}

		</script>

		</section>
	</main>

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