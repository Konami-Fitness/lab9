<?php

$servername = "localhost";
$username = "user";
$password = "itws";

// Create connection
try {
  $dbconn = new PDO('mysql:host=localhost;dbname=websyslab9',$username,$password);
  $dbconn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";
} catch (PDOException $e){
  echo "Connection failed: " . $e->getMessage();
}

/*
$sql = "CREATE TABLE grades(id int AUTO_INCREMENT, crn int, rin int, grade int(3) NOT NULL,
    PRIMARY KEY(id), FOREIGN KEY (crn) REFERENCES courses(crn) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (rin) REFERENCES students(rin) ON DELETE CASCADE ON UPDATE CASCADE)";

if (($result = $dbconn->query($sql)) !== FALSE) {
  echo "Table created successfully";
} else {
  echo "Error creating table: ";
}*/

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tn = $_POST['tablename'];
    $cn = $_POST['columnname'];
    $ct = $_POST['columntype'];
    $nn = $_POST['notnull'];
    $ai = $_POST['auto-inc'];

  }
    $err = Array();


function alterTable($tn,$cn,$ct,$nn,$ai, $dbconn) {
 if($nn == 'y') {
    $nn = 'NOT NULL';
  } else {
    $nn = '';
  }

  if($ai == 'y') {
    $ai = 'AUTO_INCREMENT';
  } else {
    $ai = '';
  }
 $sql2 = 'ALTER TABLE ' . $tn .' '. $cn . ' '.  $nn . ' '. $ai;

//ex2
 
  $q2 = $dbconn->query($sql2);


  }




  

 try {
    if (isset($_POST['addCol']) && $_POST['addCol'] == 'add column') {
      alterTable($tn,$cn,$ct,$nn,$ai, $dbconn);
    }


  }
  catch (Exception $e) {
    $err[] = $e->getMessage();
  }


//ex3
 // $sql3 = 'DELETE FROM customers WHERE id = 4';
  //$customers1 = $dbconn->query($sql3);
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
    <div class="calcbox">
      <pre id="result">
  	  
  	  
  	  </pre>
      <br>
  	  <form method="post" action="main.php">
  	    <input type="text" name="tablename" id="name" value="" />
  	    <input type="text" name="columnname" id="name" value="" />
        <input type="text" name="columntype" id="name" value="" />
        <input type="text" name="notnull" id="name" value="" />
        <input type="text" name="auto-inc" id="name" value="" />

        <input type="submit" name="addCol" value="add column" />	
  			</div>
  	  </form>
    </div>
	</body>
</html>