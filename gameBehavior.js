      // Moved this declartion up so I can use it in the fuctions
			var questionRotation = 1;
			var highestQuestion = 1;
      // Function to hide all questions after they've been put into the page.
			function hideAllQuestions(){};
			// Function to display each question after hitting the submit button (currently no checks in place)
			function displayOneQuestion(){};
			//Function to display all data so the submit button will work lol.
			function displayAll(){};
			// Function to hide the previous question when moving through the quiz.
			function hidePrevious(){};
			// Add a function to display previous question buttons
			function displayPreviousButton(){};
			// Function to 	display previous question
			function previousQuestion(){};
			// function that gathers all input buttons, and adds click listeners to create the next question button.
			function checkAnswered(){};

			// Builds the page for quiz format.
			hideAllQuestions();



			// Add the event listener to the window, so it starts to listen after load.
			window.addEventListener("load", function(){
				checkAnswered();
			});


			// function that gathers all input buttons, and adds click listeners to create the next question button.
			function checkAnswered(){}{
				var inputs = document.getElementsByTagName("input");
				for (i = 0; i < inputs.length; i++) {
					inputs[i].addEventListener("click", function(){
						if(document.getElementsByClassName("btn btn-lg btn-outline-primary active") != null && document.getElementById("submit").style.display == 'none'){
							document.getElementById("next").style.display = 'block';
							console.log("displayed button");
						}
					});
				}
			};



			// Hides the previous question button, so it can be only applied if there is a question before.
			function displayPrevious(){
				if(questionRotation == 2){
					document.getElementById("previous").style.display = 'none';
				}
					var previousQuestionID = "q_" + (questionRotation - 1);
					var currentQuestionID = "q_" + questionRotation;
					document.getElementById("next").style.display = 'block';
					document.getElementById(currentQuestionID).style.display = 'none';
					document.getElementById(previousQuestionID).style.display = 'block';
          if(document.getElementById("submit").style.display == 'block'){
            document.getElementById("submit").style.display = 'none';
            document.getElementById("next").style.display = 'block';
          }
					questionRotation--;
				};


			function displayPreviousButton(){
				if(questionRotation = 1) {
					document.getElementById("previous").style.display = 'none';
					document.getElementById("next").style.display = 'block';
					return;
				}
				if(document.getElementById("previous").style.display == 'none'){
				document.getElementById("previous").style.display = 'block';
				document.getElementById("next").style.display = 'block';
			}
			};

			function hidePrevious(){
				var previousQuestionID = "q_" + (questionRotation);
				if(document.getElementById(previousQuestionID) == null) {
					return;
				}
				document.getElementById(previousQuestionID).style.display = 'none';
			};

			function displayALL(){
				for(var x = 0; x < questions.length; x++){
					var questionID = "q_" + (x + 1);
					if (document.getElementById(questionID) == null){
						return;
					}
					document.getElementById(questionID).style.display = 'block';
				}
			};

			function displayOneQuestion(){
				// call function to hide previous question when moving forward.
				hidePrevious();
				// Variable used to identify current question
					var questionID = "q_" + (questionRotation + 1);
				// Variable used to check if the next question exists
					var nextQuestionID = "q_" + (questionRotation + 2);
					// If the next question doesnt' exist, it will display
					if(document.getElementById(nextQuestionID) == null) {
						document.getElementById("submit").style.display = 'block';
						document.getElementById("next").style.display = 'none';
					}
					// if anything above the first question it will display a previous question button.
					if(questionRotation => 1){
						document.getElementById("previous").style.display = 'block';
					}
					// displays the question as block.
					document.getElementById(questionID).style.display = 'block';

					// If the highestQuestion is bigger than the current, display the next button since we've already answered it.
					if(highestQuestion > questionRotation && document.getElementById("submit").style.display != 'block'){
						document.getElementById("next").style.display = 'block';
						console.log("display");
					}
					// If the highestQuestion is lower than the current, do not display the next button for the question hasn't been answered.
					// Also update the highestQuestion to the current.
					if(highestQuestion <= questionRotation){
						highestQuestion = questionRotation;
						document.getElementById("next").style.display = 'none';
						console.log(highestQuestion);
						console.log("hide")
					}
					questionRotation++;
				};

			function hideAllQuestions(){
				// For every question run the loop once
				for(var x = 0; x <= questions.length; x++){
					// Create a variable to grab the ID of the questions
					var currentQuestion = "q_" + (x + 1);
					// If the ID doesn't exist, end the function.
					if (document.getElementById(currentQuestion) == null){
						return;
					}
					// Set the current question to display style "none".
					document.getElementById(currentQuestion).style.display = 'none';
					document.getElementById("q_1").style.display = 'block';
					document.getElementById("previous").style.display = 'none';
					document.getElementById("submit").style.display = 'none';
					document.getElementById("next").style.display = 'none';
				}
			};
