<?php session_start();

if(!isset($_SESSION['user'])) {
  header('Location: home.php');
}

 ?>
  <?php

    $connect = mysqli_connect("localhost","root","")
    or die( DATABASE_CONNECT_ERROR . mysqli_error($connect) );
    mysqli_select_db($connect, "my_db")
    or die( DATABASE_CONNECT_ERROR . mysqli_error($connect) );
//$connect = mysqli_connect("localhost", "root", "", "my_db");
 $query = "SELECT * FROM registration WHERE id = ".$_SESSION['user'][1];
 $result = mysqli_query($connect, $query);
 ?>


 <!DOCTYPE html>
 <html>
      <head>
           <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">
    <link rel="shortcut icon" href=" imgs/favicon.ico"/>
    <link href="https://use.fontawesome.com/releases/v5.0.2/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/profile.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title><?php if(isset($_SESSION['user'])) { echo $_SESSION['user'][2];} ?></title>
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

      </head>
      <body>
      <nav class="navbar navbar-expand-md">

      <a class="navbar-brand" href="#" >
        <img src="imgs/Logo.png" id="logo" width="70" height="70">
      </a>


      <form class="form-inline my-2 my-lg-0" id="nav-form">
        <h3 style="color: maroon;">Welcome </h3>
        <a href="user_profile.php" style="color: black; font-size: 15px; margin: 8px; font-style: italic; "><h6 > My Profile</h6><?php if(isset($_SESSION['user'])) { echo $_SESSION['user'][2];} ?> </a>

        <!-- <a href="user_profile.php" style="color: black; font-size: 18px; margin: 8px; font-style: italic; " > <?php if(isset($_SESSION['user'])) { echo $_SESSION['user'][2];} ?> </a>
         -->
            <a href="logout.php"><button type="button" class="btn btn-link" id="nav-btn" ><i class="fas fa-sign-in-alt"></i> Logout</button></a>

      </form>




          <!-- <input class="form-control mr-sm-2" type="text" placeholder="Search for Food">
          <button class="btn btn-primary my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button> -->
        </form>
        <form class="form-inline my-2 my-lg-0" id="nav-right-form">
            <a href="user_home.php"><button type="button" class="btn btn-link" id="nav-btn" data-toggle="modal" data-target="#contactModal"><i class="fas fa-home"></i> Home</button></a>
            <!-- <button type="button" class="btn btn-link" id="nav-btn" data-toggle="modal" data-target="#contactModal"><i class="fas fa-envelope"></i> Inbox</button> -->
            <a href="search.php"><button type="button" class="btn btn-link" id="nav-btn" data-toggle="modal" data-target="#contactModal"><i class="fas fa-search"></i> Search For Blood</button></a>
            <a href="donatee.php"><button type="button" class="btn btn-link" id="nav-btn" data-toggle="modal" data-target="#contactModal"><i class="fas fa-angle-double-down"></i> Donate</button></a>
            <a href="requestedBlood.php"><button type="button" class="btn btn-link" id="nav-btn" data-toggle="modal" data-target="#contactModal"><i class="fas fa-angle-double-up"></i> Request</button></a>
            <a href="contact.php"><button type="button" class="btn btn-link" id="nav-btn" data-toggle="modal" data-target="#contactModal"><i class="far fa-envelope"></i> Contact</button></a>
            <a href="activity.php"><button type="button" class="btn btn-link" id="nav-btn" data-toggle="modal" data-target="#contactModal"><i class="fas fa-align-center"></i> Activity</button></a>
            <!-- <button type="button" class="btn btn-link" id="nav-btn" data-toggle="modal" data-target="#contactModal"><i class="fas fa-comment"></i> Schedule</button>
          <button type="button" class="btn btn-link" id="nav-btn" data-toggle="modal" data-target="#contactModal"><i class="fas fa-bell"></i> Alerts</button>
           --><!-- <a href="search.php"><button type="button" class="btn btn-link" id="nav-btn" data-toggle="modal" data-target="#contactModal"><i class="fas fa-bell"></i> Blood Seeker</button></a> -->

        </form>
    </nav>

            <br /><br />
           <div class="container" style="width:700px;">
           <h1 align="center">My Profile</h1>
                <h4 align="center">Update Profile</h4>
                <br />

                     <br />
                     <div id="donor_table">
                          <table class="table table-bordered">
                               <tr>

                                    <th width="70%">My Info</th>
                                    <th width="15%">Update</th>
                                    <th width="15%">View</th>


                               </tr>
                               <?php
                               while($row = mysqli_fetch_array($result))
                               {
                               ?>
                               <tr>

                                    <td><?php echo $row["name"]; ?></td>
                                    <td><button  name="edit"  class="btn btn-info btn-sm edit_data" id="<?php echo $row["id"]; ?>">Update Info</button></td>
                                    <td><button  name="view"  class="btn btn-primary btn-sm view_data" id="<?php echo $row["id"]; ?>">View</button></td>
                                    <!-- <td><input type="button" name="edit" value="Update Info" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-sm edit_data" /></td> -->
                                    <!-- <td><input type="button" name="view" value="view" id="<?php echo $row["id"]; ?>" class="btn btn-primary view_data" /></td> -->

                               </tr>
                               <?php
                               }
                               ?>
                          </table>
                     </div>
                </div>
           </div>

 <div id="dataModal" class="modal fade">
      <div class="modal-dialog">
           <div class="modal-content">
                <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                     <h4 class="modal-title">My Profile</h4>
                </div>
                <div class="modal-body" id="employee_detail">
                </div>
                <div class="modal-footer">
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
           </div>
      </div>
 </div>
 <div id="add_data_Modal" class="modal fade">
      <div class="modal-dialog">
           <div class="modal-content">
                <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                     <h4 class="modal-title">Update Info</h4>
                </div>
                <div class="modal-body">
                     <form method="post" id="insert_form">
                          <label>First Name</label>
                          <input type="text" name="name" id="name" class="form-control" />
                          <br />
                          <label>Last Name</label>
                          <input type="text" name="lastName" id="lastName" class="form-control">
                          <br />
                          <label>Email</label>
                          <input type="email" name="inputEmail" id="inputEmail" class="form-control" />
                          <br />
                          <label>Age</label>
                          <input type="text" name="Age" id="Age" class="form-control" />
                          <br />
                          <label>CNIC</label>
                          <input type="text" name="cnic" id="cnic" class="form-control" />
                          <br />
                          <label>Password</label>
                          <input type="text" name="pass" id="pass" class="form-control" />
                          <br />
                          <label>Confirm Your Password</label>
                          <input type="text" name="confirmpass" id="confirmpass" class="form-control" />
                          <br />
                          <label>Select Gender</label>
                          <select name="gender" id="gender" class="form-control">
                               <option value="Male">Male</option>
                               <option value="Female">Female</option>
                          </select>
                          <br />
                          <label>Select Country</label>
                           <select name="country" id="country" class="form-control">
                                    <option value="null">Select Country</option>
                                    <option value="UK " >UK</option>
                                    <option value="USA">USA</option>
                                    <option value="India">India</option>
                                    <option value="Iran ">Iran</option>
                                    <option value="Malaysia">Malaysia</option>
                                    <option value="Norway">Norway</option>
                                    <option value="Oman">Oman</option>
                                    <option value="Pakistan" >Pakistan</option>
                                    <option value="Philippines">Philippines</option>
                                    <option value="Switzerland">Switzerland</option>
                                    <option value="Ukraine">Ukraine</option>
                                    <option value="United Arab Emirates">United Arab Emirates</option>
                                </select>
                          <br />
                          <label>City</label>
                          <input type="text" name="city" id="city" class="form-control" />
                          <br />
                          <label>Town</label>
                          <input type="text" name="town" id="town" class="form-control" />
                          <br />
                          <label>Contact Number</label>
                          <input type="text" name="phone" id="phone" class="form-control" />
                          <br />
                          <label>Diseases</label>
                          <input type="text" name="Known_Alergies" id="Known_Alergies" class="form-control" />
                          <br />
                          <label>Chronic Disease</label>
                          <input type="text" name="chronic_diseases" id="chronic_diseases" class="form-control" />
                          <br />
                          <input type="hidden" name="id" id="id" />
                          <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success" />
                     </form>
                </div>
                <div class="modal-footer">
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
           </div>
      </div>
 </div>


 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</body>
</html>


 <script>
 $(document).ready(function(){
      $('#add').click(function(){
           $('#insert').val("Insert");
           $('#insert_form')[0].reset();
      });
      $(document).on('click', '.edit_data', function(){
           var id = $(this).attr("id");
           $.ajax({
                url:"user_fetch.php",
                method:"POST",
                data:{id:id},
                dataType:"json",
                success:function(data){
                     $('#name').val(data.name);
                     $('#lastName').val(data.lastName);
                     $('#inputEmail').val(data.inputEmail);
                     $('#Age').val(data.Age);
                     $('#cnic').val(data.cnic);
                     $('#pass').val(data.pass);
                     $('#confirmpass').val(data.confirmpass);
                     $('#gender').val(data.gender);
                     $('#country').val(data.country);
                     $('#city').val(data.city);
                     $('#town').val(data.town);
                     $('#phone').val(data.phone);
                     $('#Known_Alergies').val(data.Known_Alergies);
                     $('#chronic_diseases').val(data.chronic_diseases);
                     $('#id').val(data.id);
                     $('#insert').val("Update");
                     $('#add_data_Modal').modal('show');
                }
           });
      });
      $('#insert_form').on('click', "#insert", function(event){
           event.preventDefault();
           if($('#name').val() == "")
           {
                alert("Name is required");
           }
           else if($('#lastName').val() == '')
           {
                alert("Address is required");
           }
           else if($('#inputEmail').val() == '')
           {
                alert("contact is required");
           }
           else if($('#Age').val() == '')
           {
                alert("Blood Group is required");
           }
           else if($('#cnic').val() == '')
           {
                alert("Gender is required");
           }
           else if($('#pass').val() == '')
           {
                alert("Blood Units is required");
           }
           else if($('#confirmpass').val() == '')
           {
                alert("Date is required");
           }
           else if($('#gender').val() == '')
           {
                alert("Date is required");
           }
           else if($('#country').val() == '')
           {
                alert("Date is required");
           }
           else if($('#city').val() == '')
           {
                alert("Date is required");
           }
           else if($('#town').val() == '')
           {
                alert("Date is required");
           }
           else if($('#phone').val() == '')
           {
                alert("Date is required");
           }
           else if($('#Known_Alergies').val() == '')
           {
                alert("Date is required");
           }
           else if($('#chronic_diseases').val() == '')
           {
                alert("Date is required");
           }
           else
           {
                $.ajax({
                     url:"user_insert.php",
                     method:"POST",
                     data:$('#insert_form').serialize(),
                     beforeSend:function(){
                          $('#insert').val("Inserting");
                     },
                     success:function(data){
                          $('#insert_form')[0].reset();
                          $('#add_data_Modal').modal('hide');
                          $('#donor_table').html(data);
                     }
                });
           }
      });
      $(document).on('click', '.view_data', function(){
           var id = $(this).attr("id");
           if(id != '')
           {
                $.ajax({
                     url:"user_select.php",
                     method:"POST",
                     data:{id:id},
                     success:function(data){
                          $('#employee_detail').html(data);
                          $('#dataModal').modal('show');
                     }
                });
           }
      });
      $(document).on('click', '.btn_delete', function(){
           var id=$(this).attr("id");
           if(confirm("Are you sure you want to delete this?"))
           {
                $.ajax({
                     url:"user_delete.php",
                     method:"POST",
                     data:{id:id},
                     dataType:"text",
                     success:function(data){

                     }
                });
           }
      });
 });
 </script>