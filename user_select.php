<?php
 if(isset($_POST["id"]))
 {
      $output = '';

         $connect = mysqli_connect("localhost","root","")
         or die( DATABASE_CONNECT_ERROR . mysqli_error($connect) );
         mysqli_select_db($connect, "my_db")
         or die( DATABASE_CONNECT_ERROR . mysqli_error($connect) );
     // $connect = mysqli_connect("localhost", "root", "", "my_db");

      $query = "SELECT  * FROM registration WHERE id = '".$_POST["id"]."'";
      $result = mysqli_query($connect, $query);
      $output .= '
      <div class="table-responsive">
           <table class="table ">';
      while($row = mysqli_fetch_array($result))
      {
           $output .= '

                <tr>
                     <td width="30%"><label>First Name</label></td>
                     <td width="70%">'.$row["name"].'</td>
                </tr>
                <tr>
                     <td width="30%"><label>Last Name</label></td>
                     <td width="70%">'.$row["lastName"].'</td>
                </tr>
                <tr>
                     <td width="30%"><label>Email</label></td>
                     <td width="70%">'.$row["inputEmail"].'</td>
                </tr>
                <tr>
                     <td width="30%"><label>Age</label></td>
                     <td width="70%">'.$row["Age"].' </td>
                </tr>
                <tr>
                     <td width="30%"><label>CNIC</label></td>
                     <td width="70%">'.$row["cnic"].' </td>
                </tr>
                <tr>
                     <td width="30%"><label>Password</label></td>
                     <td width="70%">'.$row["pass"].' </td>
                </tr>
                <tr>
                     <td width="30%"><label>Confirm Pass</label></td>
                     <td width="70%">'.$row["confirmpass"].' </td>
                </tr>
                <tr>
                     <td width="30%"><label>Gender</label></td>
                     <td width="70%">'.$row["gender"].' </td>
                </tr>
                <tr>
                     <td width="30%"><label>Country</label></td>
                     <td width="70%">'.$row["country"].' </td>
                </tr>
                <tr>
                     <td width="30%"><label>City</label></td>
                     <td width="70%">'.$row["city"].' </td>
                </tr>
                <tr>
                     <td width="30%"><label>Town</label></td>
                     <td width="70%">'.$row["town"].' </td>
                </tr>
                <tr>
                     <td width="30%"><label>Contact Number</label></td>
                     <td width="70%">'.$row["phone"].' </td>
                </tr>
                <tr>
                     <td width="30%"><label>Known Disease</label></td>
                     <td width="70%">'.$row["Known_Alergies"].' </td>
                </tr>
                <tr>
                     <td width="30%"><label>Chronic Disease</label></td>
                     <td width="70%">'.$row["chronic_diseases"].' </td>
                </tr>
           ';
      }
      $output .= '
           </table>
      </div>
      ';
      echo $output;
 }
 ?>