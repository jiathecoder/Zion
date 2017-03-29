<html>
<head>
	<title>Books</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
		<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="../../assets/css/bookshome.css">
	
</head>
<body>
		<div class='container-fluid'>
			<div id="bar">
				<img class="logo" src="../../assets/images/logo.png">
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
			<h4>Recent Book Reviews:</h4><hr>
				<?php 
					if($books == NULL){ ?>
					<p>No Books reviewed yet</p>

				<?php }?>
					<?php

				 foreach ($books as $book) { ?>				
					<p>Book   : <a href="/mains/book_review/<?= $book['book_Id']?>"<h2> <?= $book['title'] ?></h2></a><br></p>
					<p>Author :<?= $book['author']?></p>
					<p>Rating :
					<?php
			    		for($x=1;$x<= 5;$x++) {       
			   				if($x<= $book['rating']){
			       			 echo '<img src="/assets/images/stars/starsharp.png" />';
			  				}
			  				else{
			  					echo '<img src="/assets/images/stars/emptystar.png" />';
			  				}
			        
			    		}
					?></p>
				
					<p>Reviews :</p>
					<div id="reviews">
				  		 <?php 
					 		foreach ($reviews as $review) { 
					 			if($book['book_Id'] == $review['book_Id']) {?> 
								<p> <a href="/mains/user/<?= $review['id']?>"><?= $review['name'] ?></a> says : <?= $review['review'] ?> <span> on <? $datedislay= strtotime($review['created_at']) ?> <?= date("j F Y",$datedislay ); ?><span></p>
								
								<?php }  ?>
				
							<?php }  ?>
							<hr>
					</div>	
					<?php }  ?>	
				
		</div>
		<div id="main-right">
			<h4>Other Books with Reviews</h4>
			<hr>
				<?php 
				 foreach ($result2 as $row) { ?> 	
				
				<p><a href="/mains/book_review/<?= $row['Id'] ?>"?>	<?= $row['title'] ?> </a></p>
				
				<?php }  ?>
		</div>

	</div>
</body>
</html>