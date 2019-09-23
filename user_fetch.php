  <?php
 //fetch.php
    $connect = mysqli_connect("localhost","root","")
    or die( DATABASE_CONNECT_ERROR . mysqli_error($connect) );
    mysqli_select_db($connect, "my_db")
    or die( DATABASE_CONNECT_ERROR . mysqli_error($connect) );
// $connect = mysqli_connect("localhost", "root", "", "my_db");
 if(isset($_POST["id"]))
 {
      $query = "SELECT * FROM registration WHERE id = '".$_POST["id"]."'";
      $result = mysqli_query($connect, $query);
      $row = mysqli_fetch_array($result);
      echo json_encode($row);
 }
 ?>