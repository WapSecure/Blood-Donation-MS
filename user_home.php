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
 $connect = mysqli_connect("localhost", "root", "", "my_db");  
 $query = "SELECT  * FROM registration ORDER BY id DESC";  
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

     <header id="home-section" >
        <div class="text-content">
            <div class="row-fluid">
                <img src="imgs/Logo.png">
            </div>
            <br>
            <div class="row-fluid">
                <h1>Donate Blood<br>Save Life</h1>
            </div>
            <div class="row-fluid">
                <p>Be A Hero,<br>  SAVE LIVES IN YOUR AREA.</p>
            </div>
            <br>
            <div class="row-fluid">
                <a href="donatee.php"><button class="btn btn-danger btn-sm" id="build1" data-toggle="modal" data-target="#mydonateModal">Donate Now</button></a>
                <a href="requestedBlood.php"><button class="btn btn-success btn-sm" id="build1" data-toggle="modal" data-target="#myreqModal">Request Now</button></a>
            </div>
        </div>
    </header>








<div style="background-color: rgba(0, 0, 0, 0.1);">
    <h2 style="color: maroon;">Recent Donors</h2>

        <div class="row" >
                   <?php 
$status=0;
$sql = "SELECT * from tblblooddonars where status=:status order by rand() limit 6";
$query = $dbh -> prepare($sql);
$query->bindParam(':status',$status,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{ ?>



<div class="card" style="width: 13rem;  margin: 10px; margin-bottom: 10px; padding-left: 10px; padding-right: 5px;">
  <a href="requestedBlood.php"><img class="card-img-top" src="images/boss_man.png" alt="Card image cap"></a>
  <div class="card-block">
    <h4 class="card-title"><a href="requestedBlood.php"><?php echo htmlentities($result->FullName);?></a></h4>
    <p class="card-text"><b>  Gender :</b> <?php echo htmlentities($result->Gender);?></p>
    <p class="card-text"><b>Blood Group :</b> <?php echo htmlentities($result->BloodGroup);?></p>
  </div>
</div>

           

            <?php }} ?>
          
 



        </div>
</div>

<!-- REQUEST BLOOD SECTION -->

<div style="background-color: rgba(0, 0, 0, 0.1);">
    <h2 style="color: maroon;">Recent Blood Requests</h2>

        <div class="row" >
                   <?php 
$status=0;
$sql = "SELECT * from reqblood where status=:status order by rand() limit 6";
$query = $dbh -> prepare($sql);
$query->bindParam(':status',$status,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{ ?>



<div class="card" style="width: 13rem;  margin: 10px; margin-bottom: 10px; padding-left: 10px; padding-right: 5px;">
  <a href="requestedBlood.php"><img class="card-img-top" src="images/boss_man.png" alt="Card image cap"></a>
  <div class="card-block">
    <h4 class="card-title"><a href="requestedBlood.php"><?php echo htmlentities($result->fullname);?></a></h4>
    <p class="card-text"><b>  Gender :</b> <?php echo htmlentities($result->gender);?></p>
    <p class="card-text"><b>Blood Group :</b> <?php echo htmlentities($result->bloodgroup);?></p>
  </div>
</div>

           

            <?php }} ?>
          
 



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