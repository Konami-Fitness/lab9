<?php

$servernameDB = "localhost";
$usernameDB = "shane";
$passwordDB = "itws";
$nameDB = "GradebookDB";

try {
  // Create connection
  $conn = new PDO("mysql:host=$servernameDB;dbname=GradebookDB", $usernameDB, $passwordDB);
  // Check connection
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // echo "Connected successfully";


//   $sql = "INSERT INTO courses VALUES(40377, 'CSCI', 1200, 'Data Structures', 1, 2020);
// INSERT INTO courses VALUES(41336, 'CSCI', 2300, 'Intro to Algorithms', 1, 2020);
// INSERT INTO courses VALUES(40331, 'CSCI', 4380, 'Database Systems', 2, 2020);
// INSERT INTO courses VALUES(43532, 'PSYC', 4730, 'Positive Psychology', 1, 2020);";
$sample_crn = 11111;
$sample_prefix = "'ITWS'";
$sample_number = 1111;
$sample_title = "'Example Course'";
$sample_section = 1;
$sample_year = 2020;
$sql = "INSERT INTO courses VALUES(" . $sample_crn . "," .
                                       $sample_prefix . "," .
                                       $sample_number . "," .
                                       $sample_title . "," .
                                       $sample_section . "," .
                                       $sample_year . ")";
echo $sql;
  $conn->exec($sql);
  echo "INSERT_ successful";
} 

catch(PDOException $e) {
  echo "<br> Something failed";
  echo "<br>" . $e->getMessage();
}

$conn = null;
?>

<!doctype html>
<html>
	<head>
		<title>Konami Grade Book</title>
		<link rel=stylesheet href="lab9.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&family=Raleway&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@700&display=swap" rel="stylesheet">
	</head>
	<body>
		<h1>Konami Grade Book</h1>
	</body>
</html>