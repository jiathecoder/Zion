<html>
<head>
	<title>User Profile</title>
			<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="../../assets/css/user.css">
	
</head>
<body>
	<div class="container-fluid">
		<div id="bar">
			<img src="../../assets/images/logo.png">
		
			<div id="head-right">
					<p class="welcome">Welcome <?= $this->session->userdata('username') ?> !</p>
				<ul class="links">
					<li><a href="/mains/home">Home</a></li>
					<li><a href="/mains/booksearch">Search a Book</a></li>
					<li><a href="/mains/add_new_book">Add Book and  Review</a></li>
					<li><a href="/mains/logout"> Logout</a></li>
				<ul>
			</div>	
		</div>
	
	
		<div id="main">		
			<?php foreach ($result1 as $row) { ?>	
			 <h3>Booklover <?=$row['alias'] ?>'s Profile</h3><hr>
				<p>Name : <?=$row['name'] ?></p>
				<p>Alias : <?=$row['alias'] ?> </p>
				<p>Email : <?=$row['email'] ?></p>
				<p>Total Reviews : <?=$row['reviews'] ?></p>
			<?php } ?>
		</div>	

		<div id="main-right">
			<h3>Posted reviews on following books</h3><hr>
			<?php foreach ($result2 as $row) { ?>
				<p><a href="/mains/book_review/<?=$row['id'] ?>"> <?=$row['title'] ?></a><p>	
			<?php } ?>	
		</div>
	</div>
</body>
</html>