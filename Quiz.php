<!-- Example from pages 362=364 -->

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title></title>
</head>
<body>
	<?php
		// associative array of the questions and answers
		$StateCapitals = array(
			"Connecticut" => "Hartford",
			"Maine" => "Augusta",
			"Massachusetts" => "Boston",
			"New Hampshire" => "Concord"
			"Rhode Island" => "Providence",
			"Vermont" => "Montpelier");

		// Determain if the submitt button was clicked
		if(isset($_POST["submit"])) {
			// Create an array out of the array of the user submit data
			$Answers = $_POST["answers"];
			if(is_aray($Answers)) {
				// We check $Answers and it IS and array
				foreach($Answers as $State => $Response) {
					$Response = stripslashes($Response);
					// Check this response to see if it was left empty
					if(strlen($Response) > 0) {
						// We have an attempt at an answer
						if(strcasecmp($StateCapitals[$State], $Response) == 0) {
							echo "<p>Correct! The capital of $State is " . $StateCapitals[$State] . ".</p>\n";
						}
						else {
							// We have an incorrect answer
							echo "<p>Sorry, the capital of $State is not $Response.</p>\n";
						}
					}
					else {
						// This answer was left empty
						echo "<p>You did not enter a value for the capital of $State</p>\n";
					}
				} // end of foreach loop
			}
			echo "<p><a href='Quiz.php'>Try Again?</a></p>\n";
		}
		else {
			echo "<form action='Quiz.php' method='
			POST'>\n";
			foreach($StateCapitals as $State => $Response) {
				echo "The capital of each $State is: <input type='text' name='answers[" . $State . "]' /><br/>\n";
			} // End of foreach loop
			echo "<input type='submit' name='submit' value='Check Answers' />";
			echo "<input type='reset' name='reset' value='Reset Form' />\n";
			echo "</form>\n";
		}

	?>
</body>
</html>