<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		
		$this->load->model('Consultant_model');
	}

	/**
	 * Index Page for this controller.
	 */
	public function index()
	{
		if($this->session->userdata('logged_in'))
		{
			$session_data = $this->session->userdata('logged_in');
			$consultant_id = $session_data['consultant_id'];

//			echo "ConsultantId: ".$consultant_id."<br>\n";

			$data['user'] = $this->Consultant_model->get_consultant_profile($consultant_id);	
			
			$data['contacts'] = $this->Consultant_model->get_contact_status($consultant_id);
			
//			var_dump($data);
			
			$this->load->view('common/header.php');
			$this->load->view('consultant/title.php', $data);
			$this->load->view('consultant/home/default.php', $data);
			$this->load->view('common/bootstrap.php');
			$this->load->view('common/footer.php');
		}
		else
		{
			// If no session, redirect to login page
			redirect('home', 'refresh');
		}
	}
	
	public function logout()
	{
		$this->session->unset_userdata('logged_in');
		session_destroy();
		redirect('home', 'refresh');
	}
	
	function register()
	{
		log_message('info', "START:[home.php]register()");
			
		if($_POST)
		{
			$username = $this->input->post('username', true);
			$email = $this->input->post('email', true);
			$firstname = $this->input->post('firstname', true);
			$surname = $this->input->post('surname', true);
			$password = $this->input->post('password', true);

			log_message('debug', "consultant_check: ".$username);
			
			// Check if user already exists
			if($this->Consultant_model->consultant_check($username))
			{
				// ...if so redirect to the signup page, with
				// warning that username already registered
				log_message('info', "END:[home.php]register(): Already registered, redirect to register page");
				redirect('/welcome/register_failed');
			}
			
			log_message('info', 'Register user:'.$username.' password:'.$password);
			
			if($result = $this->Consultant_model->add_consultant($_POST))
			{
				log_message('debug', "INFO:successfully registered");

				$sess_array = array(
					'consultant_id' => $result,
					'user' => $username
					);
				$this->session->set_userdata('logged_in', $sess_array);
				
				// Redirect to our protected pages
				redirect('/consultant/home/register_success');
			}
			else
			{
				$this->session->set_flashdata('error', 'Register failed.');

				log_message('error', 'END:[home.php]register(): Register failed, redirect to /');
				
				redirect('/');
			}
		}
		
		log_message('error', 'END:[auth.php]register(): No POST data in request, redirect /');
		
		redirect('/');
	}

	public function register_success()
	{
		if($this->session->userdata('logged_in'))
		{
			$session_data = $this->session->userdata('logged_in');
			$consultant_id = $session_data['consultant_id'];

			$data['user'] = $this->Consultant_model->get_consultant_profile($consultant_id);	

			// Construct the page
			$this->load->view('common/header.php');
			$this->load->view('consultant/title.php', $data);
			$this->load->view('consultant/home/register_success.php', $data);
			$this->load->view('common/bootstrap.php');
			$this->load->view('common/footer.php');
		}
		else
		{
			// If no session, redirect to login page
			redirect('/', 'refresh');
		}
	}
	
	public function reports()
	{
		$this->load->library('pagination');
		
		if($this->session->userdata('logged_in'))
		{
			$session_data = $this->session->userdata('logged_in');
			$consultant_id = $session_data['consultant_id'];
			
//			echo "ConsultantId: ".$consultant_id."<br>\n";
			
			$cfg['base_url'] = "http://localhost:8080/consultant/home/reports/";
			$cfg['total_rows'] = 0;
			$cfg['per_page'] = 5;
			$cfg['num_links'] = 20;
			$cfg['uri_segment'] = 4;

			$this->pagination->initialize($cfg);

			$data['user'] = $this->Consultant_model->get_consultant_profile($consultant_id);	

			$this->load->view('common/header.php');
			$this->load->view('consultant/title.php', $data['user']);
			$this->load->view('consultant/home/reports.php');
			$this->load->view('common/bootstrap.php');
			$this->load->view('common/footer.php');
		}
		else
		{
			// If no session, redirect to login page
			redirect('home', 'refresh');
		}
	}

}
