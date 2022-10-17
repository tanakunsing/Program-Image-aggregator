<?php 

class contr {
     public $cc;

   public function connect (){

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "intl";

    // Create connection
     $this->cc = new mysqli($servername, $username, $password, $dbname);
    // Check connection
   
    if ($this->cc->connect_error) {
      die("Connection failed: " . $this->cc->connect_error);
  }

  }

  public function insert ($nm1,$nmare, $urim,$ty,$pro,$conn){

    $sql = "INSERT INTO tlform (Nm, details, im,ty,pro)
    VALUES ('$nm1', '$nmare', '$urim','$ty','$pro')";
     
     if (mysqli_query($conn, $sql) ) {
          
       echo "New record created successfully";
 
       header("Location: index.php");
     } else {
        
       echo "Error: " . $sql . "<br>" . mysqli_error($conn);
     }
 
     mysqli_close($conn);

  }
   
}
?>