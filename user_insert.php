<?php

    $connect = mysqli_connect("localhost","root","")
    or die( DATABASE_CONNECT_ERROR . mysqli_error($connect) );
    mysqli_select_db($connect, "my_db")
    or die( DATABASE_CONNECT_ERROR . mysqli_error($connect) );

 //$connect = mysqli_connect("localhost", "root", "", "my_db");
 if(!empty($_POST))
 {
      $output = '';
      $message = '';
      $name = mysqli_real_escape_string($connect, $_POST["name"]);
      $lastName = mysqli_real_escape_string($connect, $_POST["lastName"]);
      $inputEmail = mysqli_real_escape_string($connect, $_POST["inputEmail"]);
      $Age = mysqli_real_escape_string($connect, $_POST["Age"]);
      $cnic = mysqli_real_escape_string($connect, $_POST["cnic"]);
      $pass = mysqli_real_escape_string($connect, $_POST["pass"]);
      $confirmpass = mysqli_real_escape_string($connect, $_POST["confirmpass"]);
      $gender = mysqli_real_escape_string($connect, $_POST["gender"]);
      $country = mysqli_real_escape_string($connect, $_POST["country"]);
      $city = mysqli_real_escape_string($connect, $_POST["city"]);
      $town = mysqli_real_escape_string($connect, $_POST["town"]);
      $phone = mysqli_real_escape_string($connect, $_POST["phone"]);
      $Known_Alergies = mysqli_real_escape_string($connect, $_POST["Known_Alergies"]);
      $chronic_diseases = mysqli_real_escape_string($connect, $_POST["chronic_diseases"]);
      if($_POST["id"] != '')
      {
           $query = "
           UPDATE registration
           SET name='$name',
           lastName='$lastName',
           inputEmail='$inputEmail',
           Age = '$Age',
           cnic = '$cnic',
           pass = '$pass',
           confirmpass = '$confirmpass' ,
           gender = '$gender'  ,
           country = '$country',
           city = '$city'  ,
           town = '$town'  ,
           phone = '$phone' ,
           Known_Alergies = '$Known_Alergies',
           chronic_diseases = '$chronic_diseases'
           WHERE id='".$_POST["id"]."'";
           $message = 'Data Updated';
      }
      else
      {
           $query = "
           INSERT INTO registration(name, lastName, inputEmail, Age, cnic, pass, confirmpass, gender, country, city, town, phone, Known_Alergies, chronic_diseases)
           VALUES('$name', '$lastName', '$inputEmail', '$Age', '$cnic', '$pass', '$confirmpass', '$gender', '$country', '$city', '$town', '$phone', '$Known_Alergies', '$chronic_diseases');
           ";
           $message = 'Data Inserted';
      }
      if(mysqli_query($connect, $query))
      {
           $output .= '<label class="text-success">' . $message . '</label>';
           $select_query = "SELECT * FROM registration WHERE id = ".$_POST['id'];
           $result = mysqli_query($connect, $select_query);
           $output .= '
                <table class="table table-bordered">
                     <tr>

                          <th width="70%">My Info</th>
                          <th width="15%">Update</th>
                          <th width="15%">View</th>
                          <
                     </tr>
           ';
           while($row = mysqli_fetch_array($result))
           {
                $output .= '
                     <tr>

                          <td>' . $row["name"] . '</td>
                          <td><input type="button" name="edit" value="update" id="'.$row["id"] .'" class="btn btn-info btn-sm edit_data" /></td>
                          <td><input type="button" name="view" value="view" id="' . $row["id"] . '" class="btn btn-primary btn-sm view_data" /></td>

                     </tr>
                ';
           }
           $output .= '</table>';
      }
      echo $output;
 }
 ?>