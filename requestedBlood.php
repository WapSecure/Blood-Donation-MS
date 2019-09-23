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
 $query = "SELECT * FROM registration WHERE id = ".$_SESSION['user'][1];
 $result = mysqli_query($connect, $query);
 ?>

<?php
error_reporting(0);
include('includes/config.php');
if(isset($_POST['submit']))
  {
$id = $_SESSION['user'][1];
$fullname=$_POST['fullname'];
$location=$_POST['location'];
$contact=$_POST['contact'];
$bloodgroup=$_POST['bloodgroup'];
$bloodunits=$_POST['bloodunits'];
$gender=$_POST['gender'];
// $address=$_POST['address'];
// $message=$_POST['message'];
$status=1;
$date = date('Y-m-d');
$sql="INSERT INTO  reqblood(fullname,location,contact,bloodgroup,gender,bloodunits,date,status,reg_id) VALUES('$fullname','$location','$contact','$bloodgroup','$gender', '$bloodunits', '$date', '$status', '$id')";
$query = $dbh->prepare($sql);
$query->bindParam(':fullname',$fullname,PDO::PARAM_STR);
$query->bindParam(':location',$location,PDO::PARAM_STR);
$query->bindParam(':contact',$contact,PDO::PARAM_STR);
$query->bindParam(':bloodgroup',$bloodgroup,PDO::PARAM_STR);
$query->bindParam(':gender',$gender,PDO::PARAM_STR);
$query->bindParam(':bloodunits',$bloodunits,PDO::PARAM_STR);
// $query->bindParam(':address',$address,PDO::PARAM_STR);
// $query->bindParam(':message',$message,PDO::PARAM_STR);
$query->bindParam(':status',$status,PDO::PARAM_STR);

$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="Your info submitted successfully";
}
else
{
$error="Something went wrong. Please try again";
}

}
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
                    <h1 class="mt-4 mb-3">Request For <small>Blood</small></h1>

        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="user_home.php">Home</a>
            </li>
            <li class="breadcrumb-item">Request Blood</li>
        </ol>
            <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php }
        else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>

      <form class="form-submission" action="requestedBlood.php" method="POST">
        <h2 class="form-submission-heading">Request For Blood</h2>
        <label for="fullname" class="sr">Full Name</label>
        <input type="text" id="fullname" name="fullname" class="form-control" placeholder="Full Name" required autofocus>
        <br>
        <label for="contact" class="sr">Contact</label>
        <input type="location" id="contact" name="contact" class="form-control" placeholder="Contact Number" required autofocus >
        <br>
        <label for="gender" class="sr"> Gender </label>
          <select id="gender" name="gender" class="form-control">

              <option value="Male">Male</option>
              <option value="Female">Female</option>

            </select>
            <br>


        <label for="bloodgroup" class="sr">Blood Group</label>
            <select id="bloodgroup" name="bloodgroup" class="form-control">
                    <?php $sql = "SELECT * from  tblbloodgroup ";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>
<option value="<?php echo htmlentities($result->BloodGroup);?>"><?php echo htmlentities($result->BloodGroup);?></option>
<?php }} ?>
</select>

<br>


        <label for="bloodunits" class="sr">Blood Units</label>
            <select id="bloodunits" name="bloodunits" class="form-control">
				<?php for($i=1; $i<=100; $i++){ echo "<option>".$i."</option>"; } ?>
			</select>
			
			
        <br>
        <label for="location" class="sr">Address</label>
        <input type="text" id="location" name="location" class="form-control" placeholder="address" required autofocus>
        <br>


        <button class="btn btn-lg btn-danger btn-block" type="submit" name="submit">Submit</button>
        </form>

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
            <span><i class="far fa-copyright"></i> Online Blood Bank Management System</span>
        </div>
    </footer>



    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>

