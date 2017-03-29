<html>
<head>
	<title>Add a Review</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
			<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="../../../assets/css/addreview.css">
		

</head>
<body>
	<div class="container-fluid">
		<div id="bar">
			<img class="logo" src="../../../assets/images/logo.png">
		
			<div id="head-right">
					<p class="welcome">Welcome <?= $this->session->userdata('username') ?> !</p>
				<ul>
					<li><a href="/mains/home">Home</a></li>
					<li><a href="/mains/booksearch">Search a Book</a></li>
					<li><a href="/mains/add_new_book">Add Book and  Review</a></li>
					<li><a href="/mains/logout"> Logout</a></li>
				<ul>
			</div>
		</div>
					
		<div id="main">
			<h3>Book : <?= $result[0]['title'] ?></h3>
			<h3>Author : <?= $result[0]['author'] ?></h3>
			<h3>Rating : 
			<?php
			    for($x=1;$x<= 5;$x++) {       
			   		if($x<= $result[0]['rating']){
			       	 echo '<img src="../../../assets/images/stars/starsharp.png" />';
			  		}
			  		else{
			  			echo '<img src="../../../assets/images/stars/emptystar.png" />';
			  		}
			    }				   
			?></h3>			
			<hr>

			<h3>Reviews :</h3>
			<?php  foreach ($result as $row) {  	
				if	($row['review'] == NULL) { ?>
					<p> No reviews available</p>
				<?php } else { ?>
				<p> <a href="/mains/user/<?= $row['user_id']?>"><?= $row['name'] ?></a> says : <?= $row['review'] ?> <span>on <? $datedislay= strtotime($row['created_at']) ?> <?= date("j F Y",$datedislay ); ?></span>
				<?php if($row['user_id'] == $this->session->userdata('currentuserid')){ ?>
					<a class="delete" href="/mains/deletereview/<?= $row['id']?>/<?= $result[0]['book_id']?>"> Delete this review</a></p>
					<?php } ?>
				<?php } ?>
			<?php } ?>
		</div>
		<div id="main-right">
			<form action="/mains/add_review_only/<?= $result[0]['book_id']?>/<?=$this->session->userdata('currentuserid')?>" method="post">
				<h2>Add a Review</h2>
				<div class="form-group">
	   				<label for="review"></label>
	    			<textarea class="form-control" name='review' placeholder="Review(100 char)" required maxlength="100"></textarea>	
  				</div>				
				<button class="btn btn-lg btn-success center-block" type="submit">Add Review</button>
			</form>
		</div>	
	</div>
</body>
</html>