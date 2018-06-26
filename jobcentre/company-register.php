<?php
session_start();
if(isset($_SESSION['id_user'])) {
  header("Location: user/dashboard.php");
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Job Centre</title>

    <!-- Bootstrap -->
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

  <!--NAVIGATION BAR-->
    <header>
    <nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">JobCentre</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
           <ul class="nav navbar-nav navbar-right">            
           <?php
           if(isset($_SESSION['id_user']) && empty($_SESSION['companyLogged'])){
             ?>
           <li><a href="user/dashboard.php">Dashboard</a></li>
           <li><a href="logout.php">Logout</a></li>
           <?php 
           }else if(isset($_SESSION['id_user']) && isset($_SESSION['companyLogged'])) {
           ?>
           <li><a href="company/dashboard.php">Dashboard</a></li>
           <li><a href="logout.php">Logout</a></li>
         <?php  } else { ?>
            <li><a href="company.php">Company</a></li>
            <li><a href="register.php">Register</a></li>
            <li><a href="login.php">Login</a></li>
            <?php } ?> 
            
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
    </header>


 <section> 
<div class="container">
  <div class="row">
    <div class="col-md-4 col-md-offset-4 well">
      <h2 class="text-center">Company Register</h2>
    <form method="post" action="addcompany.php">
     <div class="form-group">
      <label for="companyname">Company Name</label>
      <input type="text" class="form-control" id="companyname" name="companyname" placeholder="Company Name" required="">
      </div>
      <div class="form-group">
      <label for="headofficecity">Head Office City</label>
      <input type="text" class="form-control" id="headofficecity" name="headofficecity" placeholder="Head Office City" required="">
      </div>
      <div class="form-group">
      <label for="contactno">Contact Number</label>
      <input type="text" class="form-control" id="contactno" name="contactno" placeholder="Contact Number" required="">
      </div>
      <div class="form-group">
      <label for="website">Website</label>
      <input type="text" class="form-control" id="website" name="website" placeholder="Website" >
      </div>
      <div class="form-group">
      <label for="companytype">Company Type</label>
      <input type="text" class="form-control" id="companytype" name="companytype" placeholder="Company Type" >
      </div>
      <div class="form-group">
      <label for="email">Company Email address</label>
      <input type="email" class="form-control" id="email" name="email" placeholder="Company Email Address" required="">
      </div>
      <div class="form-group">
      <label for="password">Password</label>
      <input type="password" class="form-control" id="password" name="password" placeholder="Password" required="">
      </div>
        <div class="text-center">
       <button type="submit" class="btn btn-success">Submit</button>
       </div> 
       <?php 
       if(isset($_SESSION['registerError'])){
        ?>       
       <div class="text-center">
         <p>Email already exists! Choose a different email!</p>
       </div> 
       <?php
       unset($_SESSION['registerError']);} 
       ?>
       </form>       
      </div>          
      </div>        
    </div>    
  </div>
</section>




    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </body>
</html>