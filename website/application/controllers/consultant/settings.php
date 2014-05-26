<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Settings extends CI_Controller {

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
			$this->load->view('consultant/settings/settings.php', $data);
			$this->load->view('common/bootstrap.php');
			$this->load->view('common/footer.php');
		}
		else
		{
			// If no session, redirect to login page
			redirect('home', 'refresh');
		}
	}
	
	public function mydetails_view()
	{
		if($this->session->userdata('logged_in'))
		{
			$session_data = $this->session->userdata('logged_in');
			$consultant_id = $session_data['consultant_id'];
			
//			echo "ConsultantId: ".$consultant_id."<br>\n";
			
			var_dump($_POST);
			
			if(isset($_POST['submit']))
			{
				$this->Consultant_model->update_consultant_profile($consultant_id, $_POST);	
			}
		
			$data['user'] = $this->Consultant_model->get_consultant_profile($consultant_id);	
			
			$this->load->view('common/header.php');
			$this->load->view('consultant/title.php', $data);
			$this->load->view('consultant/settings/mydetails_view.php', $data);
			$this->load->view('common/bootstrap.php');
			$this->load->view('common/footer.php');
		}
		else
		{
			// If no session, redirect to login page
			redirect('home', 'refresh');
		}
	}
	
	public function mydetails_edit()
	{
		if($this->session->userdata('logged_in'))
		{
			$session_data = $this->session->userdata('logged_in');
			$consultant_id = $session_data['consultant_id'];
			
//			echo "ConsultantId: ".$consultant_id."<br>\n";
			
			$data['user'] = $this->Consultant_model->get_consultant_profile($consultant_id);	
			
			$this->load->view('common/header.php');
			$this->load->view('consultant/title.php', $data);
			$this->load->view('consultant/settings/mydetails_edit.php', $data);
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
