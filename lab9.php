


<?php
  $dbconn = new PDO('mysql:host=localhost;dbname=websyslab9','user','itws');

  try {
  if(isset($dbconn)) {
    echo 'Connected!';
  }

  }
  catch (Exception $e) {
    $err[] = $e->getMessage();
  }
/*
  //ex1
  $sql = 'ALTER TABLE :table ADD' formInput.columnname, ect
  $q1 = $dbconn->prepare($sql);
  $q1->execute(array(':table' => formInput.table));

*/

//ex2
  $sql2 = 'SELECT * FROM grades WHERE id = :id';
  $q2 = $dbconn->prepare($sql2);
  $q2->execute(array(':id' => 1));


  $result = $q2->fetchAll()[0]['grade'];
  

 


//ex3
 // $sql3 = 'DELETE FROM customers WHERE id = 4';
  //$customers1 = $dbconn->query($sql3);
?>

<!doctype html>
<html>
  <head>
    <title>Konami Calculator</title>
    <link rel=stylesheet href="calculator.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&family=Raleway&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@700&display=swap" rel="stylesheet">
  </head>
  <body>
    <h1>Konami Calculator</h1>





      <pre id="result">
  
      </pre>
      <form method="post" action="lab9.php">
        <input type="text" name="op1" id="name" value="" />
        <input type="text" name="op2" id="name" value="" />
        <br/>       
        <input type="submit" name="add" value="Add" />
      </form>
    <div id = "results">hi</div>

    <script type="text/javascript"> 
      var x =  "<?php echo"$result"?>";
      document.getElementById("results").innerHTML = x;
   </script>
  </body>
</html>

