<?php

$servername = "localhost";
$username = "user";
$password = "itws";

// Create connection
try {
  $dbconn = new PDO('mysql:host=localhost;dbname=test2',$username,$password);
  $dbconn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";
} catch (PDOException $e){
  echo "Connection failed: " . $e->getMessage();
}


// $dbconn = new mysqli($servername, $username, $password);
// Check connection

// if ($dbconn->connect_error) {
//   die("Connection failed: " . $dbconn->connect_error);
// }

// Create database
$sql = "CREATE TABLE grades(id int AUTO_INCREMENT, crn int, rin int, grade int(3) NOT NULL,
    PRIMARY KEY(id), FOREIGN KEY (crn) REFERENCES courses(crn) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (rin) REFERENCES students(rin) ON DELETE CASCADE ON UPDATE CASCADE)";

if (($result = $dbconn->query($sql)) !== FALSE) {
  echo "Table created successfully";
} else {
  echo "Error creating table: ";
}


// interface operations {
//   public function operate();
//   public function getEquation();
// }
//
// abstract class Operation1 {
//   protected $operand_1;
//   public function __construct($o1) {
// 		if (strcmp($o1, 'pi') == 0) {
// 			$o1 = pi();
// 		} else if (strcmp($o1, 'e') == 0) {
// 			$o1 = exp(1);
// 		}
//     if (!is_numeric($o1)) {
//       throw new Exception('Non-numeric operand.');
//     }
//     $this->operand_1 = $o1;
//   }
// }
//
// class Square extends Operation1 implements operations {
//   public function operate() {
//       return pow($this->operand_1, 2);
//   }
//   public function getEquation() {
//     return $this->operand_1 . '^2 = ' . $this->operate();
//   }
// }



//Some debugs - uncomment these to see what is happening...
// echo '$_POST print_r=>',print_r($_POST);
// echo "<br>",'$_POST vardump=>',var_dump($_POST);
// echo '<br/>$_POST is ', (isset($_POST) ? 'set' : 'NOT set'), "<br/>";
// echo "<br/>---";


// Check to make sure that POST was received
// upon initial load, the page will be sent back via the initial GET at which time
// the $_POST array will not have values - trying to access it will give undefined message

  if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $o1 = $_POST['op1'];
    $o2 = $_POST['op2'];
  }
  $err = Array();


// Instantiate an object for each operation based on the values returned on the form
// For example, check to make sure that $_POST is set and then check its value and
// instantiate its object
//
// The Add is done below.  Go ahead and finish the remiannig functions.
// Then tell me if there is a way to do this without the ifs
// We might cover such a way on Tuesday...

  try {
    if (isset($_POST['add']) && $_POST['add'] == 'Add') {
      $op = new Addition($o1, $o2);
    }
  }
  catch (Exception $e) {
    $err[] = $e->getMessage();
  }
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
  	  <?php
  	    if (isset($op)) {
  	      try {
  	        echo $op->getEquation();
  	      }
  	      catch (Exception $e) {
  	        $err[] = $e->getMessage();
  	      }
  	    }

  	    foreach($err as $error) {
  	        echo $error . "\n";
  	    }
  	  ?>
  	  </pre>
      <br>
  	  <form method="post" action="lab9.php">
  	    <input type="text" name="op1" id="name" value="" />
  	    <input type="text" name="op2" id="name" value="" />
  	    <br/>
  	    <!-- Only one of these will be set with their respective value at a time -->
  			<div class="left">
          <p>1 Input</p>
  				<div class="leftrow">
  					<input type="submit" name="add" value="Add" />
  					<input type="submit" name="sub" value="Subtract" />
  					<input type="submit" name="mult" value="Multiply" />
  				</div>
  				<div class="leftrow">
  					<input type="submit" name="divi" value="Divide" />
  					<input type="submit" name="expo" value="Exponent" />
            <input type="submit" name="square" value="Square" />
  				</div>
  			</div>
  			<div class="right">
          <p>2 Inputs</p>
  				<div class="rightrow">
  					<input type="submit" name="sqrt" value="Sqrt" />
  					<input type="submit" name="log10" value="Log10" />
            <input type="submit" name="ln" value="Ln" />
  				</div>
  				<div class="rightrow">
  					<input type="submit" name="tenexp" value="10^x" />
  					<input type="submit" name="eexp" value="e^x" />
            <input type="submit" name="sin" value="Sin" />
  				</div>
  				<div class="rightrow">
  					<input type="submit" name="cos" value="Cos" />
  					<input type="submit" name="tan" value="Tan" />
  				</div>
  			</div>
  	  </form>
    </div>
	</body>
</html>
