<html>
<head>
	<title>Search</title>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
		<!-- Latest compiled and minified CSS -->

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="../assets/css/search.css">

<script src="../assets/js/search.js"></script>


	
</head>
<body>
	<div class="container-fluid">
		<div id="bar">
			<img src="../assets/images/logo.png">
			<div id="head-right">			
				<p class="welcome">Welcome <?= $this->session->userdata('username') ?> !</p>
				<ul class="links">
					<li><a href="/mains/home">Home</a></li>
					<li><a href="/mains/add_new_book">Add Book and  Review</a></li>
					<li><a href="/mains/logout"> Logout</a></li>
				<ul>	
			</div>				
		</div>	
	
		<div id="main">		
			<div id="searchBook">
				<h4>Search a Book : <input type="text" class="form-signin" name="search" id="search" /></h4><hr>
				<div id="finalResult"></div>
			</div>	
		</div>
	</div>
</body>
</html>