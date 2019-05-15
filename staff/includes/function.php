<?php
	// include 'dbh.php';
	// include 'user.php';

	
		// if (isset($_POST['createTest'])) {
		// 	$testname = $_POST['test_name'];
		// 	$start_date = $_POST['start_date'];
		// 	$end_date = $_POST['end_date'];
		// 	$release_result = $_POST['release_result'];
		// 	$mark = $_POST['test_mark'];
		// 	$currentYear = date('Y');

		// 	if (empty($testname) || empty($start_date) || empty($end_date) || empty($release_result) || empty($mark)) {
		// 		$errorMessage = 'All field is requried';
		// 	}
		// 	else{
		// 		$stmt = "SELECT * FROM test_tb where year = '$currentYear'";
		// 		$result = $this->connect()->query($stmt);
		// 		if ($result->num_rows > 0 ) {
		// 			$errorMessage = 'Test has been Create for this Year';
		// 		}
		// 		else{
		// 			$stmt = "INSERT INTO test_tb(testName,startDate,endDate,mark,releaseResult,year)values('$testname','$start_date','$end_date','$mark','$release_result','$currentYear')";
		// 			$result = $this->connect()->query($stmt);
		// 			if ($result) {
		// 				$successMessage = "New Test Create Successfully";
		// 			}
		// 			else
		// 				$errorMessage = "Error Occure!!! Pleasen Try Again";
		// 		}
		// 	}
		// }

?>