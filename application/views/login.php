<html>
<head>
	<title>Welcome</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="./assets/css/login.css">
	
</head>
<body>
	<div class="container-fluid">	
	 	<div id="bar">	 	
 			<img src="../assets/images/logo.png">

	 	</div>
	 	
		<div id="quote">
      		<p class="say">You know you have read a good book when you turn the last page and feel a little as if you have lost a friend.</p>
			<p class="author"> Paul Sweeney</p>
      	</div> 	

      	<div id="logbox">
      		<form class="form-signin" action="/login" method="post">
           	
	        	<p class="form-signin-heading">Log In</p>
	        	<div class="errors" ><?= $this->session->flashdata('login_errors') ;?></div>
	        	<label for="inputEmail" class="sr-only">Email address</label>
	      	  	<input type="email" name='email' class="form-control" placeholder="Email" required autofocus>
	       		<label for="inputPassword" class="sr-only">Password</label>
	       		<input type="password"  name='pwd' class="form-control width:70%" placeholder="Password" required>      
	       		<button class="btn btn-lg btn-success center-block" type="submit"><p> Done !<p></button>    

       		 </form>

       		 <p class="register"> <a href="/reg">Sign Up</a></p>

       	</div>

            

    </div> <!-- /container -->
</body>
</html>