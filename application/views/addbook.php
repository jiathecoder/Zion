<html>
<head>
	<title>Add Book and Review</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="../../assets/css/addbook.css">
	
</head>
<body>
	<div class='container-fluid'>
		<div id="bar">
				<img src="../assets/images/logo.png">		
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
		<h3>Add a New Book Title and a Review</h3>
		<div id="main">
			<form action="addbook" method="post" class="form-signin" >
					<div class="errors" ><?= $this->session->flashdata('errors') ;?></div>
						<ul>
				   			<li>	<label  for="booktitle"  class="title">Book Title</label>
				    				<input type="text" class="form-control" name="newbook" required>
				  			</li>		  		
		   					<li>  <label for="category"  class="title">Category</label>
		   			   	 		<select type="text" name="category" class="info" >
				   				 	<option value="" ><p > Select Category </p></option>
				   				 		<?php foreach ($result1 as $row) { ?>
				    						<option  value="<?=$row['Id']?>" required><?=$row['category']?></option>
				    			   		<?php } ?>
		    					</select>
		  					</li>		  			
		   					<li>		
		   						<label for="author"  class="title">Author</label>
		   						<select type="text" name="author" >
		   							<option value="" class="title"> Select Author </option>
		   								<?php foreach ($result as $row) { ?>					
											<option value="<?=$row['author']?>" required><?=$row['author']?></option>
							
										<?php } ?>
		    					</select>
		    				</li> 			  		
				  		   	<li>		
				  		   		<label for="Author"  class="title"> New Author</label>
				    			<input type="text" class="form-control" name="newauthor" >
				    		</li>
		    				<li>		
		    					<label for="rating"  class="title">Rating:</label>
		    					<select type="text" name='rating'  >
				    				<option value=""> Select Rating </option>
									<option value=1 required> 1 </option>
									<option value=2> 2 </option>
									<option value=3> 3 </option>
									<option value=1> 4 </option>
									<option value=2> 5 </option>					
								</select>
							</li>		  		
		  		  		 	<li>		
		  		  		 		<label for="review"  class="title">Review:</label>
		    					<textarea type="text"class="form-control" name='review' required maxlength="100"></textarea>	<br>
		  					</li>  	  		

		  					<button class="btn btn-lg btn-success center-block" type="submit">Add Book </button>
			</form>
		</div>
	</div>
</body>
</html>