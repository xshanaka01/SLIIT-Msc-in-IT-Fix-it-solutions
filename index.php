<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Help Desk System</title>
  <link href="assets/css/googlefont.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="assets/css/bootstrap4.4.1.min.css">
  <link rel="stylesheet" href="assets/css/login.css">
</head>
<body>
  <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
    <div class="container">
      <div class="card login-card">
        <div class="row no-gutters">
          <div class="col-md-5">
            <img src="assets/images/login.jpg" alt="" class="login-card-img">
          </div>
          <div class="col-md-7">
            <div class="card-body">
              <div class="brand-wrapper">
                <img src="assets/images/logo.png" alt="logo" class="logo">
              </div>
              <p class="login-card-description">Sign into your account</p>
              <form action="login.php" method="post">
                  <div class="form-group">
                    <label  class="sr-only">User Name</label>
                    <input type="text" name="username" id="username" class="form-control" placeholder="User Name">
                  </div>
                  <div class="form-group mb-4">
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="***********">
                  </div>
				<!--===============user login error msg ==============================================================-->                            
					<center>
						<div style="color: red; ">                   
                            <?php
                            if(isset($_SESSION['loging_invalid']) )
                            {
                                echo ($_SESSION['loging_invalid']);
                                 unset($_SESSION['loging_invalid']); 
                            }                                                        
                            ?>
						</div>
					</center>
				<!--===============================================================================================-->		  			 
				<button class="btn btn-block login-btn mb-4" name="submit">	Login</button>	  				  				  				  
                </form>
                 <a href="#!" class="forgot-password-link" style="color:white">Forgot password?</a>
				<a></a>
				<p></p>
                <p class="login-card-footer-text" style="color:white">Don't have an account? <a href="#!" class="text-reset">Register here</a></p> 
                <nav class="login-card-footer-nav">
                  <a href="#!"></a>
                  <a href="#!">© 2021, FixIT Solutions. All Rights Reserved.</a>
                </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <script src="/jquery-3.4.1.min.js"></script>
  <script src="/popper.min.js"></script>
  <script src="/bootstrap.min.js"></script>
</body>
</html>
