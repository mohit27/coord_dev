<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class VerifyLogin extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('consultant_model','',TRUE);
	}
	
	/**
	 * Index Page for this controller.
	 *
	 */
	public function index()
	{
		//This method will have the credentials validation
		$this->load->library('form_validation');

		$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');

		if($this->form_validation->run() == FALSE)
		{
			//Field validation failed.  Failed login page displayed
			$this->load->view('common/header.php');
			$this->load->view('public/title.php');
			$this->load->view('public/login_failed.php');
			$this->load->view('common/bootstrap.php');
			$this->load->view('common/footer.php');
		}
		else
		{
			//Go to private area
			redirect('consultant/home', 'refresh');
		}		
	}
	
	function check_database($password)
	{

		//Field validation succeeded.  Validate against database
		$username = $this->input->post('username');

		//query the database
		$result = $this->consultant_model->login($username, $password);
	 
		if($result)
		{
			$sess_array = array();
			foreach($result as $row)
			{
				$sess_array = array(
					'consultant_id' => $row->consultant_id,
					'user' => $row->user
					);
				$this->session->set_userdata('logged_in', $sess_array);
			}
			return TRUE;
		}
		else
		{
			$this->form_validation->set_message('check_database', 'Invalid username or password');
			return false;
		}

		return FALSE;
	}
}
