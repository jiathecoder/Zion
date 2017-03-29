<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mains extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		 // $this->output->enable_profiler();
	}

	public function index()
	{
		// echo "Welcome to CodeIgniter. The default Controller is Main.php";
		$this->load->view('login');
	}

	//Search Book

	public function search_a_Book(){
		
		$search=  $this->input->post('search');
		$this->load->model('book');
		$result = $this->book->searchBook($search);
		echo json_encode ($result);
	}

	public function reg()
	{
		
		$this->load->view('register');
	}

	public function register()
	{
		$data['name']=$this->input->post('name');
		$data['alias']=$this->input->post('alias');
		$data['em']=$this->input->post('email');
		$data['pd']=$this->input->post('pwd');
		$data['cpd']=$this->input->post('cnfpwd');

		$this->load->library('form_validation');
		$this->form_validation->set_rules('name','Name','required|trim|alpha');
		$this->form_validation->set_rules('alias','Alias','required|trim|alpha');
		$this->form_validation->set_rules('email','Email','required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('pwd','Password','trim|required|min_length[8]|max_length[25]|matches[cnfpwd]');
		$this->form_validation->set_rules('cnfpwd','Password Confirmation','required');
		

		if ($this->form_validation->run() == FALSE)
		{

			$this->session->set_flashdata('registration_errors', validation_errors());
			// 	var_dump(validation_errors());
			// die();
			// $this->load->view('register');
			 redirect('/mains/reg');
		}
		else
		{
			$this->load->model('book');
			$result=$this->book->register_user($data);
			if($result)
			{
				$this->session->set_flashdata('login_errors','Successfully Registered');
				redirect('/');
			}
		}
		
	}

	public function login()
	{
		$data['em']=$this->input->post('email');
		$data['pd']=$this->input->post('pwd');


		$this->load->library('form_validation');
		$this->form_validation->set_rules('pwd', 'Password', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');

		if ($this->form_validation->run() == FALSE)
		{
			validation_errors();
			$this->session->set_flashdata('login_errors',validation_errors());
			redirect('/');
		}
		else
		{
			$this->load->model('book');
			$result=$this->book->login_user($data);		
			$this->session->set_userdata('currentuserid',$result['Id']);
			$currentuserid=$this->session->userdata('currentuserid');
			$this->session->set_userdata('username',$result['name']);
			$username=$this->session->userdata('username');
			// $username=$this->session->userdata('username');
			// var_dump($currentuser);
			// die();
			if($result && $result['password']==$data['pd'])
			{	
			
				// $this->show_books_reviews();
				$this->show_categories();

				
			}
			else
			{	$message="Password doesnt match";
				$this->session->set_flashdata('login_errors',$message);
				redirect('/');
			}	
		}
	}

	public function booksearch()
	{
		// echo "Welcome to CodeIgniter. The default Controller is Main.php";
		$this->load->view('searchbook');
	}
	public function addbook()
	{	

		$data['title']=$this->input->post('newbook');
		$data['category']=$this->input->post('category');
		$data['author']=$this->input->post('author');
		$data['newauthor']=$this->input->post('newauthor');
		$data['review']=$this->input->post('review');
		$data['rating']=$this->input->post('rating');
		$data['userid'] = $this->session->userdata('currentuserid');

		// var_dump($data);
		// 		die();

		if($this->input->post('newauthor'))
			{  
				$this->load->library('form_validation');
					$this->form_validation->set_rules('newbook', 'title', 'required');
					$this->form_validation->set_rules('review', 'review', 'required');	
					$this->form_validation->set_rules('category', 'category', 'required');
					$this->form_validation->set_rules('newauthor', 'newauthor', 'required');
					$this->form_validation->set_rules('rating', 'rating', 'required');

					if ($this->form_validation->run() == FALSE)
						{
							validation_errors();
							$this->session->set_flashdata('errors',validation_errors());
							redirect('../views/addbook.php');
						}

					else
					{
				
						$this->load->model('book');
						$authorid=$this->book->add_author($data);

						$bookid = $this->book->add_book($data);
						$this->book->add_book_new_author($bookid,$authorid);
						$this->book->add_reviews($data, $bookid);
						$this->book_review($bookid);	
					}
				
			}			
	

		else
		{	
			$this->load->library('form_validation');
					$this->form_validation->set_rules('newbook', 'title', 'required');
					$this->form_validation->set_rules('review', 'review', 'required');	
					$this->form_validation->set_rules('category', 'category', 'required');
					$this->form_validation->set_rules('author', 'newauthor', 'required');
					$this->form_validation->set_rules('rating', 'rating', 'required');

					if ($this->form_validation->run() == FALSE)
						{
							validation_errors();
							$this->session->set_flashdata('errors',validation_errors());
							redirect('/mains/add_new_book');
						}
					else
					{

						$this->load->model('book');
						$bookid=$this->book->add_book($data);
						$this->book->add_bookauthors($data, $bookid);
						$this->book->add_reviews($data, $bookid);
						$result=$this->book->get_book_id($data);
						$this->book_review($bookid);		
					}
		}

		
	}

	public function deletereview($reviewid,$bookid)//single book review
	{
		$this->load->model('book');
		$this->book->delete_book_review($reviewid);	

		// var_dump($result);
		// die();
		$this->book_review($bookid);

	}




	public function book_review($bookid)//single book review
	{
		$this->load->model('book');
		$result=$this->book->get_book_review($bookid);		
		// var_dump($result);
		// die();
		$this->load->view('addreview',array('result' => $result));

	}
	
	public function show_books_reviews($categoryid)
	{
		$this->load->model('book');
		$books=$this->book->show_books_recent($categoryid);	
		$reviews=$this->book->show_books_recent_reviews($categoryid);

		$result2=$this->book->show_books_older($categoryid);
		// 
		$this->load->view('bookshome',array('books' => $books,'reviews' => $reviews,'result2' => $result2));

	}

	public function show_categories()
	{
		$this->load->model('book');
		$result=$this->book->show_books_categories();	
		
		$this->load->view('categories',array('result' => $result));

	}

	public function add_new_book()
	{	
		$this->load->model('book');
		$result=$this->book->show_authors();
		$result1=$this->book->show_categories();
		$this->load->view('addbook',array('result' => $result ,'result1' => $result1 ));
	}


	public function add_review_only($id1,$id2)
	{	
		$data['review']=$this->input->post('review');		

		$this->load->model('book');
		$this->book->add_a_review($data,$id1,$id2);
		$this->book_review($id1);
		// $this->load->view('addreview',array('result1' => $result1));


	}

	public function user($id)
	{
		$this->load->model('book');
		$result1=$this->book->get_user($id);
		$result2=$this->book->get_books($id);
		// var_dump($result1);
		// var_dump($result2);
		// die();
		
		$this->load->view('usersreview' , array('result1'=> $result1,'result2' => $result2));

	}



	public function home()
	{
		$this->show_categories();
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('/');
	}


}

//end of main controller