<?php
session_start();
if(!isset($_SESSION['user'])) {
  header('Location: home.php');
}
    $connect = mysqli_connect("localhost","root","")
    or die( DATABASE_CONNECT_ERROR . mysqli_error($connect) );
    mysqli_select_db($connect, "my_db")
    or die( DATABASE_CONNECT_ERROR . mysqli_error($connect) );
 //$connect = mysqli_connect("localhost", "root", "", "my_db");
 $output = '';
 $sql = "SELECT * FROM tblcontactusquery y WHERE y.reg_id =".$_SESSION['user'][1];
 $result = mysqli_query($connect, $sql);
 $output .= '
      <div class="table-responsive">
           <table class="table table-hover" style="color:black; text-align:auto;"> ';

 if(mysqli_num_rows($result) > 0)
 {
      while($row = mysqli_fetch_array($result))
      {
          if($row["status"]==1)
            {
              $status = "read";
            }
            else
              {$status = "pending";
          }
           $output .= '


              <tr class= "font-weight-bold  table-sm border " >
                     <td class=""> Full Name </td>
                     <td class="fullname" data-id1="'.$row["id"].'" contenteditable>'.$row["name"].'</td>
                  </tr>
                  <tr class="table-sm">
                     <td> Message </td>
                     <td class="location" data-id2="'.$row["id"].'" contenteditable>'.$row["Message"].'</td>
                  </tr>

                  <tr class="table-sm bg-danger">
                    <td> Status </td>
                     <td class="status" data-id2="'.$row["id"].'" contenteditable>'.$status.'</td>
                   </tr>
                   <tr class="">
                    <td> </td>
                    <td> </td>
                   </tr>
           ';
      }
      $output .= '

      ';
 }
 else
 {
      $output .= '<tr>
                          <td colspan="4">Data not Found</td>
                     </tr>';
 }
 $output .= '</table>
      </div>';
 echo $output;
 ?>