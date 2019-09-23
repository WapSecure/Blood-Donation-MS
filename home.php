<?php
$connect = mysqli_connect("localhost","root","")
    or die( DATABASE_CONNECT_ERROR . mysqli_error($connect) );
mysqli_select_db($connect, "my_db")
    or die( DATABASE_CONNECT_ERROR . mysqli_error($connect) );



//<!-- LOGIN PHP -->

//<?php

	$connect = mysqli_connect("localhost","root","")
	or die( DATABASE_CONNECT_ERROR . mysqli_error($connect) );
	mysqli_select_db($connect, "my_db")
	or die( DATABASE_CONNECT_ERROR . mysqli_error($connect) );

	//$conn=mysqli_connect("localhost","root","" , "my_db") or die(mysqli_error());
	//$db=mysqli_select_db('my_db', $conn) or die(mysqli_error());

if (isset($_POST['signin'])) {

	$inputEmail = $_POST['username'];
	$pass = $_POST['pass'];
	
		//echo "Email: ".$inputEmail;
		//echo "<br>Pass: ".$pass;
	
	
	if ($inputEmail=='') {
	  echo "<script>alert('Enter Your Email')</script>";
	}

	if ($pass=='') {
		echo "<script>alert('Enter Your Password')</script>";
	
	} else {
		$query="SELECT * FROM `registration` where inputEmail='$inputEmail' AND pass='$pass'";
		$run=(mysqli_query($connect, $query)) or die(mysqli_error());
		$row = mysqli_fetch_array($run);


		if(mysqli_num_rows($run)>0){
		session_start();


		$_SESSION['user'] = array($inputEmail, $row["id"], $row['username']);

		// echo "<script>alert('Successfully Logged In')</script>";
		echo "<script>window.open('user_home.php','_self')</script>";
		}else{
			// echo "<script>alert('Username or password is invalid')</script>";
		}

	}
}

	//-- end of login PHP


//$conn=mysqli_connect("localhost","root","","my_db") or die(mysqli_error());
//$db=mysqli_select_db('my_db', $conn) or die(mysqli_error());

if (isset($_POST['submit'])) {

  $name=$_POST['name'];
  $lastName=$_POST['lastName'];
  $inputEmail=$_POST['inputEmail'];
  $Age=$_POST['Age'];
  $cnic=$_POST['cnic'];
  $pass=$_POST['pass'];
  $confirmpass=$_POST['confirmpass'];
  $gender=$_POST['gender'];
  $country=$_POST['country'];
  $city=$_POST['city'];
  $town=$_POST['town'];
  $phone=$_POST['phone'];
  $Known_Alergies=$_POST['Known_Alergies'];
  $chronic_diseases=$_POST['chronic_diseases'];




if ($name=='') {
    echo "<script>alert('Enter Your Name')</script>";
}

if ($inputEmail=='') {
    echo "<script>alert('Enter Your Email')</script>";
}

if ($pass=='') {
    echo "<script>alert('Enter Your Password')</script>";
}

if ($confirmpass=='') {
    echo "<script>alert('COnfirm Your Password')</script>";
}

if ($gender=='') {
    echo "<script>alert('Select Your Gener')</script>";
}

if ($country=='') {
    echo "<script>alert('Select your country')</script>";
}


else {
$query="insert into registration(username,lastName,inputEmail,Age,cnic, pass,confirmpass,gender,country,city,town,phone,Known_Alergies,chronic_diseases) values ('$name', '$lastName' ,'$inputEmail', '$Age' ,  '$cnic', '$pass', '$confirmpass', '$gender', '$country', '$city', '$town', '$phone', '$Known_Alergies', '$chronic_diseases')";

if (mysqli_query($connect, $query)) {
// echo "<script>alert('you are successfully registerd')</script>";
echo "<script>window.open('home.php','_self')</script>";
}
}
}
?>

<!-- DONATE NOW MODAL -->

<?php

    $connect = mysqli_connect("localhost","root","")
    or die( DATABASE_CONNECT_ERROR . mysqli_error($connect) );
    mysqli_select_db($connect, "my_db")
    or die( DATABASE_CONNECT_ERROR . mysqli_error($connect) );

//$conn=mysqli_connect("localhost","root","" , "my_db") or die(mysqli_error());
//$db=mysqli_select_db('my_db', $conn) or die(mysqli_error());
if(isset($_POST['donateNow'])) {

$name=$_POST['useremail'];
$pass=$_POST['pass'];
//die("r");

if ($name=='') {
  echo "<script>alert('Enter Your Email')</script>";
}

if ($pass=='') {
  echo "<script>alert('Enter Your Password')</script>";
}

else {
$query="SELECT * FROM `registration` where inputEmail='$name' AND pass='$pass'";
$run=(mysqli_query($connect, $query)) or die(mysqli_error());
$row = mysqli_fetch_array($run);


if(mysqli_num_rows($run)>0){
session_start();


$_SESSION['user'] = array($name, $row["id"], $row['username']);


// echo "<script>alert('Successfully Logged In')</script>";
echo "<script>window.open('donatee.php','_self')</script>";
}

else{
    // echo "<script>alert('Username or password is invalid')</script>";
}

}
}
?>

<!-- REQUEST NOW BLOOD -->

<?php

    $connect = mysqli_connect("localhost","root","")
    or die( DATABASE_CONNECT_ERROR . mysqli_error($connect) );
    mysqli_select_db($connect, "my_db")
    or die( DATABASE_CONNECT_ERROR . mysqli_error($connect) );

//$conn=mysqli_connect("localhost","root","" , "my_db") or die(mysqli_error());
//$db=mysqli_select_db('my_db', $conn) or die(mysqli_error());
if (isset($_POST['requestBlood'])) {

$name=$_POST['useremail'];
$pass=$_POST['pass'];



if ($name=='') {
  echo "<script>alert('Enter Your Email')</script>";
}

if ($pass=='') {
  echo "<script>alert('Enter Your Password')</script>";
}

else {
$query="SELECT * FROM `registration` where inputEmail='$name' AND pass='$pass'";
$run=(mysqli_query($connect, $query)) or die(mysqli_error());
$row = mysqli_fetch_array($run);


if(mysqli_num_rows($run)>0){
session_start();


$_SESSION['user'] = array($name, $row["id"], $row['username']);


// echo "<script>alert('Successfully Logged In')</script>";
echo "<script>window.open('requestedBlood.php','_self')</script>";
}

else{
    // echo "<script>alert('Username or password is invalid')</script>";
}

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
    <link rel="stylesheet" href="css/home.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>Online Blood Bank</title>
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
        <a class="navbar-brand" href="#">
            <img src="imgs/Logo.png" id="logo" width="75" height="35">
        </a>
        <form class="form-inline my-2 my-lg-0" id="nav-form">
            <button type="button" class="btn btn-link" id="nav-btn" data-toggle="modal" data-target="#myModal"><i class="fas fa-sign-in-alt"></i> Log In</button>
            <button type="button" class="btn btn-link" id="nav-btn" data-toggle="modal" data-target="#myRegModal"><i class="fas fa-user-plus"></i> Register</button>

            <!-- <input class="form-control mr-sm-2" type="text" placeholder="Search for Food">
            <button class="btn btn-primary my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button> -->
        </form>
        <form class="form-inline my-2 my-lg-0" id="nav-right-form">
            <button type="button" class="btn btn-link" id="nav-btn" data-toggle="modal" data-target="#contactModal"><i class="fas fa-comment"></i> Contact Us</button>

        </form>
    </nav>


    <header id="home-section">
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
                <button class="btn btn-danger btn-md" id="build1" data-toggle="modal" data-target="#mydonateModal"><strong>Donate Now</strong></button>
                <button class="btn btn-success btn-md" id="build1" data-toggle="modal" data-target="#myreqModal"><strong>Request Now</strong></button>
            </div>
        </div>
    </header>


<!-- LOGIN MODAL -->
    <div class="container text-center">
        <div class="modal fade" id="myModal" role="dialog" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h3 class="modal-title">Log In</h3>
                    </div>
                    <div class="modal-body">
                        <form class="form-signin" action="home.php" method="POST" >
                            <div class="form-group">
                                <label class="sr">Username</label>
                                <input name="username" placeholder="E-Mail Address" class="form-control"  type="text" required autofocus>
                            </div>
                            <div class="form-group">
                                <label class="sr">Password</label>
                                <input name="pass" placeholder="Password" class="form-control"  type="password" required autofocus>
                            </div>
                            <div class="form-group text-center" id="check">
                                <input type="checkbox" value="remember-me"> Remember me
                            </div>
                            <div class="form-group text-center">
                                <button class="btn btn-lg btn-danger btn-block" name="signin" type="submit"> Log In
                                    <i class="fas fa-sign-in-alt"></i>
                                </button>
                                </div>
                                </form>
                                <!-- <form action="admin.html">
                                <button type="button" class="btn btn-lg btn-danger btn-block" data-toggle="modal" data-target="#adminModal" data-dismiss="modal"><i class="fas fa-user"></i> Admin Panel</button>
                                </form> -->


                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- DONATE BUTTON MODAL -->
<div class="container text-center">
        <div class="modal fade" id="mydonateModal" role="dialog" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h3 class="modal-title">You Have To Login First</h3>
                    </div>
                    <div class="modal-body">
                        <form class="form-signin" action="home.php" method="post" >
                            <div class="form-group">
                                <label class="sr">Username</label>
                                <input name="useremail" placeholder="E-Mail Address" class="form-control"  type="text" required autofocus>
                            </div>
                            <div class="form-group">
                                <label class="sr">Password</label>
                                <input name="pass" placeholder="Password" class="form-control"  type="password" required autofocus>
                            </div>
                            <div class="form-group text-center" id="check">
                                <input type="checkbox" value="remember-me"> Remember me
                            </div>
                            <div class="form-group text-center">
                                <button class="btn btn-lg btn-danger btn-block" name="donateNow" type="submit"> Log In
                                    <i class="fas fa-sign-in-alt"></i>
                                </button>
                                </div>
                                <div class="form-group text-center">
                                <button class="btn btn-lg btn-danger btn-block" name="donateNowReg"  data-toggle="modal" data-target="#myRegModal"  type="submit"> Register
                                    <i class="fas fa-paper-plane"></i>
                                </button>
                                </div>
                                </form>



                    </div>
                </div>
            </div>
        </div>
    </div>


<!-- REQUEST BUTTON MODAL -->
<div class="container text-center">
        <div class="modal fade" id="myreqModal" role="dialog" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h3 class="modal-title">You Have To Login First</h3>
                    </div>
                    <div class="modal-body">
                        <form class="form-signin" action="home.php" method="POST" >
                            <div class="form-group">
                                <label class="sr">Username</label>
                                <input name="useremail" placeholder="E-Mail Address" class="form-control"  type="text" required autofocus>
                            </div>
                            <div class="form-group">
                                <label class="sr">Password</label>
                                <input name="pass" placeholder="Password" class="form-control"  type="password" required autofocus>
                            </div>
                            <div class="form-group text-center" id="check">
                                <input type="checkbox" value="remember-me"> Remember me
                            </div>
                            <div class="form-group text-center">
                                <button class="btn btn-lg btn-danger btn-block" name="requestBlood" type="submit"> Log In
                                    <i class="fas fa-sign-in-alt"></i>
                                </button>
                                </div>
                                <div class="form-group text-center">
                                <button class="btn btn-lg btn-danger btn-block" name="requestBlood"  data-toggle="modal" data-target="#myRegModal"  type="submit"> Register
                                    <i class="fas fa-paper-plane"></i>
                                </button>
                                </div>
                                </form>



                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- REGISTRATION FORM MODAL -->

<script language='javascript' type='text/javascript'>
function check(input) {
if (input.value != document.getElementById('passwordID').value) {
input.setCustomValidity('Password Must be Matching.');
} else {
// input is valid -- reset the error message
input.setCustomValidity('');
}
}
</script>





    <div class="container">
        <div class="modal fade" id="myRegModal" role="dialog" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h3 class="modal-title">Register</h3>
                    </div>
                    <div class="modal-body">
                        <form class="form-signin" action="home.php" method="POST" >
                            <fieldset>
                                <div class="row form-group">
                                    <div class="col-sm-6"><label class="sr">First Name</label>
                                    <input name="name" placeholder="First Name" class="form-control" type="text" required autofocus> </div>
                                    <div class="col-sm-6"><label class="sr">Last Name</label>
                                    <input name="lastName" placeholder="Last Name" class="form-control" type="text" required autofocus></div>
                                </div>
                                <div class="row form-group">
                                        <div class="col-sm-6"><label class="sr">Email</label>
                                    <input name="inputEmail" placeholder="E-Mail Address" class="form-control"  type="text" required autofocus></div>
                                    <div class="col-sm-6"><label class="sr">Contact Number</label>
                                    <input type="text" id="phone" name="phone" class="form-control" placeholder="Contact Number" required autofocus></div>

                                </div>

                                <div class="row form-group">
                                    <div class="col-sm-6">
                                    <label class="sr">Password</label>
                                    <input name="pass" placeholder="Password" id="passwordID" class="form-control"  type="password"  required autofocus></div>
                                    <div class="col-sm-6">
                                    <label class="sr">Confirm You Password</label>
                                    <input name="confirmpass" placeholder="Confirm Password" class="form-control" type="password"  maxlength="15" minlength="8" oninput="check(this)" required autofocus>
                                </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-sm-6"><label class="sr">Age</label>
                                    <input name="Age" placeholder="Enter Your Age" class="form-control"  type="text"> </div>
                                    <div class="col-sm-6"><label class="sr">CNIC</label>
                                    <input name="cnic" placeholder="Enter Your CNIC" class="form-control"  type="text"></div>
                                </div>

                                <div class="row form-group">
                                    <div class="col-sm-6"><label class="sr">City</label>
                                    <input type="text" name="city" id="city" class="form-control" placeholder="City"> </div>
                                    <div class="col-sm-6"><label class="sr">Town</label>
                                    <input type="text" name="town" id="town" class="form-control" placeholder="Town"></div>
                                </div>

                               <div class="row-fluid form-group">
                                   <label class="sr">Gender</label>

                                 <select class="form-control" id="sel1" name="gender">
                                    <option>Select Gender</option>
                                    <option>Male</option>
                                    <option>Female</option>
                                    <option>Other</option>
                                  </select>
                                </div>



                               <div class="row-fluid form-group">

                                    <label class="sr">Country</label>

                                <select name="country" class="form-control">
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
                                </div>



                               <div class="row form-group">
                                   <div class="col-sm-6">
                                       <label class="sr">Enter Disease</label>
                                    <input type="text" name="chronic_diseases" id="Chronic_Diseases" class="form-control" placeholder="Chronic Diseases">
                                   </div>
                                   <div class="col-sm-6">
                                       <label class="sr">Enter Allergies</label>
                                    <input type="text" name="Known_Allergies" id="alergy" class="form-control" placeholder="Known Alergies">
                                   </div>
                               </div>






                                <div class="row-fluid"><div class="form-group">
                                    <button type="submit" class="btn btn-danger btn-lg btn-block text-center" name="submit" id="sform-s">Register
                                        <i class="fas fa-paper-plane"></i>
                                    </button>
                                </div></div>

                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


<!-- ADMIN LOGIN MODAL -->
<div class="container text-center">
        <div class="modal fade" id="adminModal" role="dialog" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h3 class="modal-title">Admin Log In</h3>
                    </div>
                    <div class="modal-body">
                        <form class="form-signin" action="home.php" method="post">
                            <div class="form-group">
                                <label class="sr">Username</label>
                                <input name="adminuser" placeholder="E-Mail Address" class="form-control"  type="text">
                            </div>
                            <div class="form-group">
                                <label class="sr">Password</label>
                                <input name="password" placeholder="Password" class="form-control"  type="password">
                            </div>
                            <div class="form-group text-center" id="check">
                                <input type="checkbox" value="remember-me"> Remember me
                            </div>
                            <div class="form-group text-center">
                                <button class="btn btn-lg btn-danger btn-block" name="adminlogin" type="submit"> Log In
                                    <i class="fas fa-sign-in-alt"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- CONTACT US MODAL -->
<div class="container text-center" >
    <div class="modal fade" id="contactModal" role="dialog" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title">Contact Us</h3>

                </div>

                <div class="modal-body">
                    <form class="form-signin" action="home.php" method="post">
                        <div class="form-group">

                            <label class="sr">Full Name</label>
                            <input name="fullname" placeholder="Full Name" class="form-control"  type="text">
                        </div>
                        <div class="form-group">
                            <label class="sr">Contact Number</label>
                            <input name="contactno" placeholder="Contact Number" class="form-control"  type="text">
                        </div>
                        <div class="form-group">
                            <label class="sr">Email</label>
                            <input name="email" placeholder="E-Mail Address" class="form-control"  type="text">
                        </div>
                        <div class="form-group">
                            <label class="sr">Message</label>
                            <textarea class="form-control" rows="5" id="inputcomment" name="message" placeholder="Comments"></textarea>
                        </div>

                        <div class="form-group text-center">
                            <button class="btn btn-lg btn-danger btn-block" type="submit" name="send"> Submit
                                <i class="fas fa-check"></i>
                            </button>
                           <!--  <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php }
        else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
                            -->

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php

error_reporting(0);
include('includes/config.php');
if(isset($_POST['send']))
  {
$name=$_POST['fullname'];
$email=$_POST['email'];
$contactno=$_POST['contactno'];
$message=$_POST['message'];
$date=date('Y-m-d');
$sql="INSERT INTO  tblcontactusquery(name,EmailId,ContactNumber,Message,PostingDate) VALUES(:name,:email,:contactno,:message,:date)";
$query = $dbh->prepare($sql);
$query->bindParam(':name',$name,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':contactno',$contactno,PDO::PARAM_STR);
$query->bindParam(':message',$message,PDO::PARAM_STR);
$query->bindParam(':date',$date,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="Message Sent. We will contact you shortly";
}
else
{
$error="Something went wrong. Please try again";
}

}
?>


<!-- SLOGAN SECTION -->
    <section class="slogan-section">
        <div class="text-center">
            <div class="p-5">
                <h1 class="display-5" id="gold-h1"><strong>Join Us Now</strong></h1>
                <div class="underline"></div>
                <h4>To Save Lifes.</h4>
            </div>
        </div>
    </section>

<!-- Carousal SECTION -->
    <section class="template-section text-center image-fluid">
        <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="4000">
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
                <li data-target="#myCarousel" data-slide-to="3"></li>
                <li data-target="#myCarousel" data-slide-to="4"></li>
                <li data-target="#myCarousel" data-slide-to="5"></li>
                <li data-target="#myCarousel" data-slide-to="6"></li>
                <li data-target="#myCarousel" data-slide-to="7"></li>
                <li data-target="#myCarousel" data-slide-to="8"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="first-slide" src="imgs/img8.jpeg" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="second-slide" src="imgs/img2.jpeg" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="third-slide" src="imgs/img3.jpeg" alt="Third slide">
                </div>
                <div class="carousel-item">
                    <img class="fourth-slide" src="imgs/img4.jpeg" alt="Fourth slide">
                </div>
                <div class="carousel-item">
                    <img class="fifth-slide" src="imgs/img5.jpg" alt="Fifth slide">
                </div>
                <div class="carousel-item">
                    <img class="third-slide" src="imgs/img6.jpeg" alt="Sixth slide">
                </div>
                <div class="carousel-item">
                    <img class="third-slide" src="imgs/img7.jpeg" alt="Seventh slide">
                </div>
                <div class="carousel-item">
                    <img class="third-slide" src="imgs/img9.jpeg" alt="Eight slide">
                </div>
                <div class="carousel-item">
                    <img class="third-slide" src="imgs/img1.jpeg" alt="Ninth slide">
                </div>
                <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
    </section>

<!-- SOCIAL LINKS SECTION -->
    <section class="social-section container-fluid">
        <div class="row">
            <div class="col-lg-1 col-sm-6">

            </div>
            <div class="col-5">
                <img src=" imgs/Logo.png" width="150" height="70">
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
            <span><i class="far fa-copyright"></i>Online Blood Bank</span>
        </div>
    </footer>







    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>









<!-- CONTACT US PHP -->


<?php

    $connect = mysqli_connect("localhost","root","")
    or die( DATABASE_CONNECT_ERROR . mysqli_error($connect) );
    mysqli_select_db($connect, "my_db")
    or die( DATABASE_CONNECT_ERROR . mysqli_error($connect) );

    //$conn=mysqli_connectt("localhost","root","" , "my_db") or die(mysqli_error());
   //$db=mysqli_select_db('my_db', $conn) or die(mysqli_error());
if (isset($_POST['go'])) {

    $email=$_POST['email'];
    $comments=$_POST['comments'];

if ($email=='') {
    echo "<script>alert('Enter Your Email')</script>";
}

if ($comments=='') {
    echo "<script>alert('Enter Your Comments')</script>";
}


else {
$query="insert into contact(email,comments) values ('$email','$comments')";

if (mysqli_query($connect, $query)) {
// echo "<script>alert('Thanks For Your Feedback')</script>";
}
}
}
?>



<!-- ADMIN LOGIN PHP -->


<?php

    $connect = mysqli_connect("localhost","root","")
    or die( DATABASE_CONNECT_ERROR . mysqli_error($connect) );
    mysqli_select_db($connect, "my_db")
    or die( DATABASE_CONNECT_ERROR . mysqli_error($connect) );

//$conn=mysqli_connect("localhost","root","" , "my_db") or die(mysqli_error());
//$db=mysqli_select_db('my_db', $conn) or die(mysqli_error());
if (isset($_POST['adminlogin'])) {

  $adminuser=$_POST['adminuser'];
  $password=$_POST['password'];


if ($adminuser=='') {
  echo "<script>alert('Enter Your Username')</script>";
}

if ($password=='') {
  echo "<script>alert('Enter Your Password')</script>";
}

else {
$query="SELECT * FROM `admin` where adminuser='$adminuser' AND password='$password'";
$run=(mysqli_query($connect, $query)) or die(mysqli_error());

if(mysqli_num_rows($run)>0){


session_start();


$_SESSION['user'] = array($inputEmail, $row["id"], $row['name']);


// echo "<script>alert('Successfully Logged In')</script>";
echo "<script>window.open('admin/index.php','_self')</script>";
}
else{
    // echo "<script>alert('Username or password is invalid')</script>";
}


}


}


?>