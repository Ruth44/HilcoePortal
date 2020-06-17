  <?php

      $connection=new PDO("mysql:host=localhost;dbname=hilcoeapp","Ruth","87654321");
     

      if(isset($_POST['btnasstea'])){
          $name=$_FILES['myfile']['name'];
          $type=$_FILES['myfile']['type'];
          $coursecode=$_POST['CourseCode'];
          $namee=$_POST['fileName'];
          $data= file_get_contents($_FILES['myfile']['tmp_name']);
          $stmt= $connection->prepare("INSERT INTO assignment VALUES ('',?,?,?,?)");
          $stmt->bindParam(1,$coursecode);
          $stmt->bindParam(2,$namee);
          $stmt->bindParam(3,$type);
          $stmt->bindParam(4,$data);
          $stmt->execute();
          header("Location: ../Pages/assignment.php");
      }
      else header("Location: ../Pages/assignment.php?status=unsuccessful");
       ?>