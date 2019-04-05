<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
if(isset($_SESSION['logged_in'])){
	if($_SESSION['logged_in']==1)
		header('Location:admin.php');
	elseif ($_SESSION['logged_in']==2)
		header('Location:main.php');
	elseif ($_SESSION['logged_in']==3)
		header('Location:client.php');
	elseif ($_SESSION['logged_in']==4)
		header('Location:judge.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Legal Case Management System</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<style type="text/css">
    body{
    	padding-top: 70px;
		background-color:#dfe6e9;
		background-image: url(home.jpg);
	
    background-size:    90% 170%;                      /* <------ */
    background-repeat:   no-repeat;
    background-position: center center; 

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
               <a class="navbar-brand" href="#">Legal Case Management System </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbarCollapse">
               <ul class="nav navbar-nav">
                  <li class="active"><a href="#" >Login</a></li>
                 <!-- <li><a href="visitor.php" >Visitors</a></li> -->
               </ul>
            </div>
         </div>
      </nav>l
</nav>
<div class="container">
	<div class="jumbotron" style=" background-image: linear-gradient(to right, #81ecec ,#6c5ce7 )">
		<h3 style='text-align: center' >Welcome</h3>
	</div>
	<div class="control-label col-xs-8">
	<form method="POST" class='form-horizontal' action="login.php" style="background-color: #dfe6e9;padding:40px">
	<div class='form-group'>
	<label class="control-label col-xs-4">Username/ID: </label><div class="col-xs-8"><input class="form-control" type = "text" name = "username"><br />
	</div></div><div class='form-group'>
	<label class="control-label col-xs-4">Password: </label><div class="col-xs-8"><input class="form-control" type = "password" name = "password"><br />
	</div></div><div class='form-group'>
	<label class="control-label col-xs-4">Type:</label> <div class="col-xs-8">
	<select class="form-control" name="login_type">
	<option value="admin">Admin</option>
	<option value="lawyer">Lawyer</option>
	<option value="client">Client</option>
	<option value="judge">Judge</option>
	</select><br />
	</div>
	</div>
	<div class = "control-label col-xs-4"></div>
<div class = "control-label col-xs-4"><h4>
<?php 
if(isset($_SESSION['a'])){
	unset($_SESSION['a']);
	echo "Login Failed!!!";
}
	?>
</h4></div>
<div class = "control-label col-xs-4"></div>
<div class = "control-label col-xs-4">
                     <br />
                     <button type="submit" formaction="login.php" class="btn btn-primary">Login</button>
                     </div>
	</form>
	</div>
	</div>
</body>
</html>