<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
require("check_login.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8"><?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
require("check_login.php");
require("config.php");
	$id = $_SESSION['username'];
if(isset($_POST['date'])){
	$date = $_POST['date'];
	$hours = $_POST['hours'];
	$client = $_POST['client_id'];
	$case = $_POST['case_id'];
	$rate = $_POST['rate'];
	$pass = $_POST['id'];
	$sql = "INSERT INTO CASE_TRANSACTIONS (lawyer_id,case_id,client_id,start_date,billable_hours,id,rate) VALUES ('$id','$case','$client','$date','$hours','$pass','$rate') ";
	$value = mysqli_query($conn,$sql);
  echo mysqli_error($mysqli).mysqli_errno($mysqli);

}
?>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Legally Right | <?php echo $id ;?></title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<style type="text/css">
    body{
    	padding-top: 70px;
    }
</style>
</head>
<body>
<nav id="myNavbar" class="navbar navbar-default navbar-inverse navbar-fixed-top" role="navigation">
         <!-- Brand and toggle get grouped for better mobile display -->
         <div class="container-fluid">
            <div class="navbar-header">
               <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbarCollapse">
               <span class="sr-only">Toggle navigation</span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               </button>
               <a class="navbar-brand" href="#">Legally Right | <?php echo $id ;?></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbarCollapse">
               <ul class="nav navbar-nav">
                  <li><a href="main.php" >Home</a></li>
                  <li><a href="client_register" >Register Your Client</a></li>
                  <li><a href="update_password.php">Change Password</a></li>
                  <li><a href="update_case.php" >Update Case History</a></li>
                  <li class="active"><a href="#" >Enter Billing Details</a></li>
                  <li><a href="set_hearing.php">Enter Hearing Date</a></li>
               </ul>
               <ul class="nav navbar-nav navbar-right">
                <li><a href="logout.php">Logout</a></li>
            </ul>
            </div>
         </div>
      </nav>
</nav>
  <!-- <div class="container">
	<div class="jumbotron">
		<h3>Enter your billing details</h3>
	</div>
	<div class="control-label col-xs-8">
			<form method="POST" class='form-horizontal' action="<?php $_PHP_SELF ?>">
                  <div class='form-group'>
<label class="control-label col-xs-4">Client ID:</label><div class="col-xs-8"> <input  class="form-control"  type = 'text' name = 'client_id'><br />
</div></div><div class='form-group'>
<label class="control-label col-xs-4">Case ID: </label><div class="col-xs-8"><input  class="form-control"  type = 'text' name = 'case_id'><br />
</div></div><div class='form-group'>
<label class="control-label col-xs-4">Start Date :</label><div class="col-xs-8"> <input class="form-control" type = 'date' name = 'date'><br />
</div></div><div class='form-group'>
<label class="control-label col-xs-4">Billable Hours :</label><div class="col-xs-8"> <input type = 'number'  class="form-control"  step='any' name = 'hours'><br />
</div></div><div class='form-group'>
<?php
$pass = '';
$alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
    for ($i = 0; $i < 12; $i++) {
        $n = rand(0,60);
        $pass = $pass.$alphabet[$n];
    }
?>
<input type = 'hidden' name = 'id' value ='<?php echo $pass?>'>
<label class="control-label col-xs-4">Rate (Rs./hour) :</label><div class="col-xs-8"> <input type = 'number'  class="form-control" step='any' name = 'rate'><br />
</div></div>
<div class = "control-label col-xs-5"></div>
	<div class = "control-label col-xs-2">
	<button type="submit" formaction="<?php $_PHP_SELF ?>" class="btn btn-primary">Submit</button>		
	</div>
</form> -->
</body>
</html>
<title>Legally Right | Admin</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<style type="text/css">
    body{
    	padding-top: 70px;
    }
</style>
</head>
<body>
<nav id="myNavbar" class="navbar navbar-default navbar-inverse navbar-fixed-top" role="navigation">
         <!-- Brand and toggle get grouped for better mobile display -->
         <div class="container-fluid">
            <div class="navbar-header">
               <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbarCollapse">
               <span class="sr-only">Toggle navigation</span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               </button>
               <a class="navbar-brand" href="#">Legally Right | Admin</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbarCollapse">
               <ul class="nav navbar-nav">
                  <li class="active"><a href="#" >Insert Lawyer</a></li>
                  <li><a href="admin_view.php" >View Lawyers</a></li>
                  <li><a href="admin_delete.php" >Delete Lawyers</a></li>
                  <li><a href="admin_update.php" >Change Password</a></li>
               </ul>
               <ul class="nav navbar-nav navbar-right">
                <li><a href="logout.php">Logout</a></li>
            </ul>
            </div>
         </div>
      </nav>>
</nav>
<div class="container">
	<div class="jumbotron">
		<h3>Register your Lawyer</h3>
	</div>
	<div class="control-label col-xs-8">
			<form method="POST" class='form-horizontal' action="insert.php">
                  <div class='form-group'>
                     <label class="control-label col-xs-4">Username:</label><div class="col-xs-8"><input class="form-control" type = 'text' name = 'id'></div>
                   <h5>
                    <?php 
                      if(isset($_SESSION['p'])){
                     unset($_SESSION['p']);
                     echo "Username Exists";
                     }
                     ?>
                     </h5>
                  </div>
                  <div class='form-group'>
                     <label class="control-label col-xs-4">Name:</label><div class="col-xs-8"><input class="form-control" type = 'text' name = 'name'><br />
                  </div></div>
                  <div class='form-group'>
                     <label class="control-label col-xs-4">Password:</label><div class="col-xs-8"><input class="form-control"  type = 'password' name = 'password'><br />
                  </div></div>
                  <div class='form-group'>
                     <label class="control-label col-xs-4">Email-id:</label><div class="col-xs-8"><input class="form-control"  type = 'text' name = 'email_id'><br />
                  </div></div>
                  <div class='form-group'>
                     <label class="control-label col-xs-4">License no:</label><div class="col-xs-8"><input class="form-control"  type = 'text' name = 'license_no'><br />
                  </div></div>
                  <div class='form-group'>
                        <div class="control-label col-xs-4"><label>Date of Joining:</label></div><div class="col-xs-8"><input class="form-control"  type = 'date' name = 'doj'><br /></div>
                     </div>
                  <div class='form-group'>
                     <label class="control-label col-xs-4">Type:</label>
                     <div class="col-xs-8">
                     <select name = 'employment' class="form-control">
                        <option value = 'immigration'>Immigration Lawyer</option>
                        <option value = 'family'>Family and Divorce Lawyer</option>
                        <option value = 'government'>Government Lawyer</option>
                        <option value = 'corporate'>Corporate Lawyer</option>
                        <option value = 'paralegal'>Paralegal</option>
                        <option value = 'domestic'>Domestic Lawyer</option>
                        <option value = 'estate'>Real Estate Law Attorney</option>
                     </select></div>
                     <br />
                     <div class = "control-label col-xs-4"></div>
                     <div class = "control-label col-xs-4">
                     <br />
                     <?php
                     if(isset($_SESSION['b'])){
                        unset($_SESSION['b']);
                        echo "Enter Valid details";
                     } 
                     elseif(isset($_SESSION['a'])){
                        unset($_SESSION['a']);
                        echo "Submission Successful!!!";
                     }
                     ?>
                     <button type="submit" formaction="insert.php" class="btn btn-primary">Submit</button>
               </form>
               </div>
               <br />
	</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-xs-12">
			<footer>
				<p>&amp;copy; Legally Right</p>
			</footer>
		</div>
	</div>
</div>
</body>
</html>                                		