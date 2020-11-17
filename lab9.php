<?php

$servername = "localhost";
$username = "user";
$password = "itws";

// Create connection
try {
  $dbconn = new PDO('mysql:host=localhost;dbname=Gradebookdb',$username,$password);
  $dbconn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";
} catch (PDOException $e){
  echo "Connection failed: " . $e->getMessage();
}

//Create database
// $sql = "CREATE TABLE grades(id int AUTO_INCREMENT, crn int, rin int, grade int(3) NOT NULL,
//     PRIMARY KEY(id), FOREIGN KEY (crn) REFERENCES courses(crn) ON DELETE CASCADE ON UPDATE CASCADE,
//     FOREIGN KEY (rin) REFERENCES students(rin) ON DELETE CASCADE ON UPDATE CASCADE)";

// if (($result = $dbconn->query($sql)) !== FALSE) {
//   echo "Table created successfully";
// } else {
//   echo "Error creating table: ";
// }
//----------------------------------------------------------------------//

  // if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['insCourse']) {
  //   $o1 = $_POST['op1'];
  //   $o2 = $_POST['op2'];
  //   $o3 = $_POST['op3'];
  //   $o4 = $_POST['op4'];
  //   $o5 = $_POST['op5'];
  //   $o6 = $_POST['op6'];
  // }

  // if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['insGrade']) {
  //   $g1 = $_POST['gp1'];
  //   $g2 = $_POST['gp2'];
  //   $g3 = $_POST['gp3'];
  //   $g4 = $_POST['gp4'];

  // }
  $err = Array();

  function insertGrade($g1,$g2,$g3,$g4,$dbconn) {
    $sql = 'INSERT INTO grades VALUES(' .
    $g1 . ',' .
    $g2 . ',' .
    $g3 . ',' .
    $g4 . ')';
    $result = $dbconn->query($sql);
  }

  function insertCourse($o1,$o2,$o3,$o4,$o5,$o6,$dbconn) {
    $sql = 'INSERT INTO courses VALUES(' . 
    $o1 . ',' .
    $o2 . ',' .
    $o3 . ',' .
    $o4 . ',' .
    $o5 . ',' .
    $o6 . ')';
    $result = $dbconn->query($sql);
  }

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
    echo $tn;
    echo $nn;
    echo $ai;
    $sql2 = 'ALTER TABLE ' . $tn . ' ADD '. $cn . ' '. $ct . ' ' . $nn . ' '. $ai;

    $q2 = $dbconn->query($sql2);
  }

  try {
    if (isset($_POST['insCourse']) && $_POST['insCourse'] == 'Insert Course') {
      $o1 = $_POST['op1'];
      $o2 = $_POST['op2'];
      $o3 = $_POST['op3'];
      $o4 = $_POST['op4'];
      $o5 = $_POST['op5'];
      $o6 = $_POST['op6'];
      insertCourse($o1,$o2,$o3,$o4,$o5,$o6,$dbconn);
      }

    if (isset($_POST['insGrade']) && $_POST['insGrade'] == 'Insert Grade') {
      $g1 = $_POST['gp1'];
      $g2 = $_POST['gp2'];
      $g3 = $_POST['gp3'];
      $g4 = $_POST['gp4'];
      insertGrade($g1,$g2,$g3,$g4,$dbconn);
      }

    if (isset($_POST['addCol']) && $_POST['addCol'] == 'add column') {
      $tn = $_POST['tablename'];
      $cn = $_POST['columnname'];
      $ct = $_POST['columntype'];
      $nn = $_POST['notnull'];
      $ai = $_POST['auto-inc'];
      alterTable($tn,$cn,$ct,$nn,$ai, $dbconn);
    }

  }
  catch (PDOException $e) {
    echo $e->getMessage();
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
      <h2>Insert Courses</h2>
      <form method="post" action="lab9.php" id="Courses_Insert">
        <label for="crn">CRN:</label><br>
        <input type="text" name="op1" id="crn" value="" /><br>
        <label for="prefix">Prefix:</label><br>
        <input type="text" name="op2" id="prefix" value="" /><br>
        <label for="number">Number:</label><br>
        <input type="text" name="op3" id="number" value="" /><br>
        <label for="title">Title:</label><br>
        <input type="text" name="op4" id="title" value="" /><br>
        <label for="section">Section:</label><br>
        <input type="text" name="op5" id="section" value="" /><br>
        <label for="year">Year:</label><br>
        <input type="text" name="op6" id="year" value="" /><br>
        <input type="submit" name="insCourse" value="Insert Course"/>
        <br/>
      </form>

      <h2>Insert Grades</h2>
      <form method="post" action="lab9.php" id="Grades_Insert">
        <label for="id">Id:</label><br>
        <input type="text" name="gp1" id="id" value="" /><br>
        <label for="crn">CRN:</label><br>
        <input type="text" name="gp2" id="crn" value="" /><br>
        <label for="rin">RIN:</label><br>
        <input type="text" name="gp3" id="rin" value="" /><br>
        <label for="grade">Grade:</label><br>
        <input type="text" name="gp4" id="grade" value="" /><br>
        <input type="submit" name="insGrade" value="Insert Grade"/>
        <br/>
      </form>

      <form method="post" action="lab9.php">
        <input type="text" name="tablename" id="name" value="" />
        <input type="text" name="columnname" id="name" value="" />
        <input type="text" name="columntype" id="name" value="" />
        <input type="text" name="notnull" id="name" value="" />
        <input type="text" name="auto-inc" id="name" value="" />
        <input type="submit" name="addCol" value="add column" />  
      </form>

    </div>
  </body>
</html>