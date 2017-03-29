<?php

class book extends CI_Model
 {
 	public function register_user($data)
 	{
 		$query="INSERT INTO users (name,alias,email,password,created_at,updated_at)
 				VALUES (?,?,?,?,NOW(),NOW())";
 		$values=array($data['name'],$data['alias'],$data['em'],$data['pd'],$data['cpd']);
 		return $this->db->query($query,$values);
 	}

 	public function login_user($data)
 	{
 		$query="SELECT * FROM users where email=? and password=?";
 		$values=array($data['em'],$data['pd']);
 		return $this->db->query($query,$values)->row_array();
 	}
 	// Search BOOK
 	function searchBook($search){
 		$query="SELECT Id,title FROM books where title LIKE ?";
 		$values= "%".$search."%";
 		return $this->db->query($query,$values)->result_array();

		// $this->db->select("Id,title");
		// $whereCondition = array('title' =>$search);
		// $this->db->where($whereCondition);
		// $this->db->from('books');
		// $query = $this->db->get();
		// return $query->result();
	}

 	
 	public function add_author($data)
 	{
 		$query="INSERT INTO authors (author,created_at,updated_at)
 				VALUES (?,NOW(),NOW())";
 		$values=array($data['newauthor']);
 		$this->db->query($query,$values);
 		$authorid = $this->db->insert_id();
 		return $authorid;
 	}

 	public function delete_book_review($reviewid)
 	{
 		$query="DELETE from reviews where  Id =?";
 		$values=$reviewid;
 		return $this->db->query($query,$values);
 	}

 	public function add_book($data)
 	{ 		
 		$query="INSERT INTO books(title,rating,created_at,updated_at,category_Id)
 				Values (?,?,NOW(),NOW(),?)";
 		$values=array($data['title'],$data['rating'],$data['category']);
 		$this->db->query($query,$values);
 		$bookid = $this->db->insert_id();
 		return $bookid;
  	}

  	public function add_book_new_author($bookid,$authorid)
 	{
 		$query="INSERT INTO books_has_authors (book_id,author_id)
 				VALUES (?,?)";
 		$values=array($bookid,$authorid);
 		$this->db->query($query,$values);

 	}

 	public function add_bookauthors($data,$bookid)
 	{
 		$subquery ="SELECT id from authors where author=?";
 		$subvalue=array($data['author']);
 		$authorid=$this->db->query($subquery,$subvalue)->row_array();

 		// $subquery ="SELECT id from books where title=?";
 		// $subvalue=array($data['title']);
 		// $bookid=$this->db->query($subquery,$subvalue)->row_array();


 		$query="INSERT INTO books_has_authors (book_id,author_id)
 				VALUES (?,?)";
 		$values=array($bookid,$authorid['id']);
 		$this->db->query($query,$values);

 	}

 	public function get_book_id($data)
 	{
 		$subquery ="SELECT id from books where title=?";
 		$subvalue=array($data['title']);
 		return $this->db->query($subquery,$subvalue)->row_array();
 	}

 	public function show_authors()
 	{
 		$query="SELECT * FROM authors";
 		return $this->db->query($query)->result_array();
 	}

 	 	public function show_categories()
 	{
 		$query="SELECT * FROM categories";
 		return $this->db->query($query)->result_array();
 	}
 	

 	public function add_reviews($data, $bookid)
 	{	
 		// var_dump($data);
			// 	die();

 		$query="INSERT INTO reviews (review,created_at,updated_at,book_id,user_id)
 				VALUES (?,NOW(),NOW(),?,?)";
 		$values=array($data['review'],$bookid,$data['userid']);
		return $this->db->query($query,$values);
 	}

 	public function show_books_recent($categoryid)
 	{
 		$query	= "SELECT * from books 
 					left join books_has_authors
 					on books.id=books_has_authors.book_Id
 					left join authors
 					on  books_has_authors.author_Id=authors.id
 					where category_id= $categoryid 
 					order by 'books.created_at' DESC
 			 		  LIMIT 3 ";
 		return $this->db->query($query)->result_array();
 	}

 	public function show_books_recent_reviews($categoryid)
 	{

 		$query="SELECT reviews.book_Id, users.name, users.id,reviews.review ,reviews.created_at 				
 			   from reviews 	
 			   left join books
 			   on reviews.book_id=books.id		  
 			   left join users
 			   on reviews.user_id=users.id
 			   where books.category_id= $categoryid 
 			   order by 'reviews.created_at' DESC
 			 		 "; 			  
 			   
 		return $this->db->query($query)->result_array();

 	
 	}

 		// public function show_books_recent_reviews($booksidarray)
 		// {
 		// 	foreach ($booksidarray as $bookid) {
 		// 	$query="SELECT  from books
 		// 	   left join reviews
 		// 	   on reviews.book_id=$booksidarray.['Id']
 		// 	   left join users
 		// 	   on reviews.user_id=users.id";
 		// 	}
 		// 	return $this->db->query($query)->result_array();	
 			
 	
 		// }


 	public function get_book_review($id)
 	{
 		$query="SELECT reviews.id,books.id as book_id,books.title,authors.author,books.rating, users.name, users.id as user_id ,reviews.review ,reviews.created_at
 				 from books
					LEft JOIN books_has_authors ON books.id = books_has_authors.book_id
					LEFT JOIN authors ON books_has_authors.author_id = authors.id
					LEFT JOIN reviews  on reviews.book_id=books.id
					left join users on reviews.user_id=users.id
					WHERE books.id = $id";
 			   
 		return $this->db->query($query)->result_array();
 	}

 	public function show_books_categories()
 	{
 		$query="SELECT * from categories";
 			   
 		return $this->db->query($query)->result_array();
 	}

 	public function show_books_older($categoryid)
 	{

 		$query="SELECT * from books 
 				where category_Id= $categoryid
 				LIMIT 3,1000";
 		return $this->db->query($query)->result_array();
 	}

 	public function get_user($id)
 	{   
 		$query="SELECT  books.id, users.name ,users.alias, users.email, count(reviews.review)as reviews, books.title
 				from users 
 				left join reviews
 				on users.id=reviews.user_id
 				left join books
 				on books.id=reviews.book_id
 				where users.id= ?";
 		$values=array($id);
 		return $this->db->query($query,$values)->result_array();


 	}

 	public function get_books($id)
 	{	
 		$query="SELECT books.title ,books.id
 				from books
 				left join reviews
 				on books.id=reviews.book_id
 				where reviews.user_id=?
 				group by reviews.book_Id";
 				$values=array($id);
 		return $this->db->query($query,$values)->result_array();
 	}

 	public function add_a_review($data,$id1,$id2)
 	{
 		$query="INSERT INTO reviews (review,created_at,updated_at,book_id,user_id)
 				VALUES (?,NOW(),NOW(),?,?)";
 		$values=array($data['review'],$id1,$id2);
 		$this->db->query($query,$values);
 	}

}

?>