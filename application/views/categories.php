<html>
<head>
	<title>Home</title>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
		<!-- Latest compiled and minified CSS -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.js"></script> -->

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="../assets/css/categories.css">



</head>
<body>
	<div class="container-fluid">
		<div id="bar">
			<img src="../assets/images/logo.png">
			
			<div id="head-right">			
				<p class="welcome">Welcome <?= $this->session->userdata('username') ?> !</p>
				<ul class="links">
					<li><a href="/mains/booksearch">Search a Book</a></li>
					<li><a href="/mains/add_new_book">Add Book and  Review</a></li>
					<li><a href="/mains/logout"> Logout</a></li>
				<ul>	
			</div>	
		</div>			
		
		<div id="main">					
			<h3>  CATEGORIES</h3><hr>				
				<?php 			
					 foreach ($result as $row) { ?>										
						<li><a href="/mains/show_books_reviews/<?= $row['Id'] ?>">	<?= $row['category'] ?> </a></li>				
				<?php }?> 							
		</div>
	</div>
</body>
</html>