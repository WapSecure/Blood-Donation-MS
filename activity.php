<?php session_start();

if(!isset($_SESSION['user'])) {
  header('Location: home.php');
}

 ?>

 <?php
error_reporting(0);
include('includes/config.php');
?>
  <?php
    $connect = mysqli_connect("localhost","root","")
    or die( DATABASE_CONNECT_ERROR . mysqli_error($connect) );
    mysqli_select_db($connect, "my_db")
    or die( DATABASE_CONNECT_ERROR . mysqli_error($connect) );
 //$connect = mysqli_connect("localhost", "root", "", "my_db");
 $query = "SELECT  * FROM registration WHERE id = ".$_SESSION['user'][1];
 $result = mysqli_query($connect, $query);
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">
    <link rel="shortcut icon" href=" imgs/favicon.ico"/>
    <link href="https://use.fontawesome.com/releases/v5.0.2/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/user_home.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>Login Via <?php if(isset($_SESSION['user'])) { echo $_SESSION['user'][2];} ?></title>

    <style>
    .navbar-toggler {
        z-index: 1;
    }

    @media (max-width: 576px) {
        nav > .container {
            width: 100%;
        }
    }
    </style>
        <style>
    .errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
    </style>


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
<div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <h1 class="mt-4 mb-3">Contact</h1>

        <ol class="breadcrumb" >
            <li class="breadcrumb-item">
                <a href="user_home.php">Home</a>
            </li>
            <li class="breadcrumb-item">Activity</li>
        </ol>


</div>


<div class="container">
                <br />
                <br />
                <br />
                <div class="table-responsive">
                     <h3 align="left">Donated Blood</h3><br />
                     <div id="live_data"></div>
                </div>
           </div>



<div class="container">
                <br />
                <br />
                <br />
                <div class="table-responsive">
                     <h3 align="left" >My Blood Request</h3><br />
                     <div id="livee_data"></div>
                </div>
           </div>
</div>



<div class="container">
                <br />
                <br />
                <br />
                <div class="table-responsive">
                     <h3 align="left" >Message</h3><br />
                     <div id="contact_data"></div>
                </div>
           </div>
</div>
<!-- SOCIAL LINKS SECTION -->
    <section class="social-section container-fluid">
        <div class="row">
            <div class="col-lg-1 col-sm-6">

            </div>
            <div class="col-5">
                <img src=" imgs/Logo.png" width="60" height="60">
            </div>
            <div class="col-5">
                <div class="row">
                    <div class="col-6">

                    </div>
                    <div class="col-2">
                        <a href=""><i class="fab fa-facebook-f" id="soc"></i></a>
                    </div>
                    <div class="col-2">
                        <a href=""><i class="fab fa-twitter" id="soc"></i></a>
                    </div>
                    <div class="col-2">
                        <a href=""><i class="fab fa-google-plus-g" id="soc"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-1">

            </div>
        </div>
    </section>

<!-- FOOTER SECTION -->

    <footer class="footer text-center">
        <div class="container">
            <span><i class="far fa-copyright"></i> Blood Bank Management System</span>
        </div>
    </footer>



    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>


<script>
$(document).ready(function(){
      function fetch_data()
      {
           $.ajax({
                url:"donateData.php",
                method:"POST",
                success:function(data){
                     $('#live_data').html(data);
                }
           });
      }
      fetch_data();
    });

$(document).on('click', '.btn_delete', function(){
           var id=$(this).data("id3");
           // if(confirm("Are you sure you want to delete this?"))
           {
                $.ajax({
                     url:"userdonordelete.php",
                     method:"POST",
                     data:{id:id},
                     dataType:"text",
                     success:function(data){
                          alert(data);
                          fetch_data();
                     }
                });
           }
      });
  </script>


<script >
$(document).ready(function(){
      function fetch_data()
      {
           $.ajax({
                url:"requestData.php",
                method:"POST",
                dataType: "text",

                success:function(data){
                     $('#livee_data').html(data);
                }
           });
      }
      fetch_data();
    });

$(document).on('click', '.btn_delete', function(){
           var id=$(this).data("id3");
           // if(confirm("Are you sure you want to delete this?"))
           {
                $.ajax({
                     url:"userreqdelete.php",
                     method:"POST",
                     data:{id:id},
                     dataType:"text",
                     success:function(data){
                          // alert(data);
                          fetch_data();
                     }
                });
           }
      });




</script>


<script type="text/javascript">
  $(document).ready(function(){
      function fetch_data()
      {
           $.ajax({
                url:"contactData.php",
                method:"POST",
                dataType: "text",

                success:function(data){
                     $('#contact_data').html(data);
                }
           });
      }
      fetch_data();
    });
</script>

