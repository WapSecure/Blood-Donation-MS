<?php  
$message = '';
 $connect = mysqli_connect("localhost", "root", "", "my_db");  
 $sql = "DELETE FROM registration WHERE id = '".$_POST["id"]."'"; 
   
 if(mysqli_query($connect, $sql)) 

 {  
      $message = 'Data Updated';  
 } 
  
 ?>