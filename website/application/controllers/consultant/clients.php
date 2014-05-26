<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Clients extends CI_Controller {

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
		$this->load->library('pagination');
		
		if($this->session->userdata('logged_in'))
		{
			$session_data = $this->session->userdata('logged_in');
			$consultant_id = $session_data['consultant_id'];
			
//			echo "ConsultantId: ".$consultant_id."<br>\n";

//			var_dump($_GET);
			
			$cfg['base_url'] = "http://localhost:8080/consultant/home/clients/";
			$cfg['total_rows'] = $this->Consultant_model->get_consultant_clients_num_rows(1);
			$cfg['per_page'] = 10;
			$cfg['num_links'] = 20;
			$cfg['uri_segment'] = 4;

			if(!array_key_exists('group', $_GET))
			{
				$tabs['group'] = 'All';
			}
			else
			{
				$tabs['group'] = $_GET['group'];
			}
			
			if(!array_key_exists('content', $_GET))
			{
				$tabs['content'] = 'All';
			}
			else
			{
				$tabs['content'] = $_GET['content'];
			}
			
			$this->pagination->initialize($cfg);

			// Load the consultant and games data from the database
			$data['tabs'] = $tabs;
			$data['user'] = $this->Consultant_model->get_consultant_profile($consultant_id);	
			$data['query'] = $this->Consultant_model->get_consultant_clients($consultant_id, $cfg['per_page'], intval($this->uri->segment(4)), $tabs);	

//			var_dump($data);

			// Construct the page
			$this->load->view('common/header.php');
			$this->load->view('consultant/title.php', $data);
			$this->load->view('consultant/clients/clients.php', $data);
			$this->load->view('common/bootstrap.php');
			$this->load->view('common/footer.php');
		}
		else
		{
			// If no session, redirect to login page
			redirect('home', 'refresh');
		}
	}
	
	public function view($client_id)
	{
		// DEBUG
		// var_dump($_POST);
		
		if($this->session->userdata('logged_in'))
		{
			$session_data = $this->session->userdata('logged_in');
			$consultant_id = $session_data['consultant_id'];
			
//			echo "ConsultantId: ".$consultant_id."<br>\n";
			
			if(isset($_POST['submit']))
			{
//				echo "SUBMIT<br>";
				$this->Consultant_model->update_client($consultant_id, $client_id, $_POST);	
				$this->Consultant_model->update_medical($consultant_id, $_POST);	
			}
			else if(isset($_POST['add']))
			{
//				echo "ADD<br>";
				$client_id = intval($this->Consultant_model->add_client($consultant_id, $_POST));
				$this->Consultant_model->add_medical($consultant_id, $client_id, $_POST);	
			}
			
			$data['user'] = $this->Consultant_model->get_consultant_profile($consultant_id);	
			$data['query'] = $this->Consultant_model->get_client($consultant_id, $client_id);	
			$data['medical'] = $this->Consultant_model->get_medical($consultant_id, $client_id);	

			$this->load->view('common/header.php');
			$this->load->view('consultant/title.php', $data);
			$this->load->view('consultant/clients/client_view.php', $data);
			$this->load->view('common/bootstrap.php');
			$this->load->view('common/footer.php');
		}
		else
		{
			// If no session, redirect to login page
			redirect('home', 'refresh');
		}
	}
	
	public function edit($client_id)
	{
		if($this->session->userdata('logged_in'))
		{
			$session_data = $this->session->userdata('logged_in');
			$consultant_id = $session_data['consultant_id'];
			
//			echo "ConsultantId: ".$consultant_id."<br>\n";
			
			$data['user'] = $this->Consultant_model->get_consultant_profile($consultant_id);	
			$data['query'] = $this->Consultant_model->get_client($consultant_id, $client_id);	
			$data['medical'] = $this->Consultant_model->get_medical($consultant_id, $client_id);	

			$this->load->view('common/header.php');
			$this->load->view('consultant/title.php', $data);
			$this->load->view('consultant/clients/client_edit.php', $data);
			$this->load->view('common/bootstrap.php');
			$this->load->view('common/footer.php');
		}
		else
		{
			// If no session, redirect to login page
			redirect('home', 'refresh');
		}
	}

	public function meeting_view($client_id)
	{
		// DEBUG
//		var_dump($_POST);
		
		if($this->session->userdata('logged_in'))
		{
			$session_data = $this->session->userdata('logged_in');
			$consultant_id = $session_data['consultant_id'];
			
//			echo "ConsultantId: ".$consultant_id."<br>\n";

			$data['user'] = $this->Consultant_model->get_consultant_profile($consultant_id);	
			$data['query'] = $this->Consultant_model->get_client($consultant_id, $client_id);	

//			var_dump($data);
			
			if(isset($_POST['enter']))
			{
				echo "ENTER<br>";
				$this->Consultant_model->add_client_meeting_record($consultant_id, $client_id, $data, $_POST);
			}
			
			$data['measurements'] = $this->Consultant_model->get_client_measurement_records($consultant_id, $client_id);
			
//			var_dump($data);
			
			$this->load->view('common/header.php');
			$this->load->view('consultant/title.php', $data);
			$this->load->view('consultant/clients/client_meeting_view.php', $data);
			$this->load->view('common/bootstrap.php');
			$this->load->view('common/footer.php');
		}
		else
		{
			// If no session, redirect to login page
			redirect('home', 'refresh');
		}
	}
	
	public function meeting_enter($client_id)
	{
		if($this->session->userdata('logged_in'))
		{
			$session_data = $this->session->userdata('logged_in');
			$consultant_id = $session_data['consultant_id'];
			
//			echo "ConsultantId: ".$consultant_id."<br>\n";
	
			$data['user'] = $this->Consultant_model->get_consultant_profile($consultant_id);	
			$data['query'] = $this->Consultant_model->get_client($consultant_id, $client_id);	

//			var_dump($data);
			
			$this->load->view('common/header.php');
			$this->load->view('consultant/title.php', $data);
			$this->load->view('consultant/clients/client_meeting_enter.php', $data);
			$this->load->view('common/bootstrap.php');
			$this->load->view('common/footer.php');
		}
		else
		{
			// If no session, redirect to login page
			redirect('home', 'refresh');
		}
	}
	
	public function add()
	{
		if($this->session->userdata('logged_in'))
		{
			$session_data = $this->session->userdata('logged_in');
			$consultant_id = $session_data['consultant_id'];
			
//			echo "ConsultantId: ".$consultant_id."<br>\n";
			
			$data['user'] = $this->Consultant_model->get_consultant_profile($consultant_id);	

			$this->load->view('common/header.php');
			$this->load->view('consultant/title.php', $data);
			$this->load->view('consultant/clients/client_add.php', $data);
			$this->load->view('common/bootstrap.php');
			$this->load->view('common/footer.php');
		}
		else
		{
			// If no session, redirect to login page
			redirect('home', 'refresh');
		}
	}

	public function export()
	{
		if($this->session->userdata('logged_in'))
		{
			$session_data = $this->session->userdata('logged_in');
			$consultant_id = $session_data['consultant_id'];
			
//			echo "ConsultantId: ".$consultant_id."<br>\n";
			
			$data['user'] = $this->Consultant_model->get_consultant_profile($consultant_id);	

			if(!array_key_exists('group', $_GET))
			{
				$tabs['group'] = 'All';
			}
			else
			{
				$tabs['group'] = $_GET['group'];
			}
			
			if(!array_key_exists('content', $_GET))
			{
				$tabs['content'] = 'All';
			}
			else
			{
				$tabs['content'] = $_GET['content'];
			}
			
			// Load the consultant and games data from the database
			$data['tabs'] = $tabs;

			$export_data = "";
			$result = $this->Consultant_model->export_consultant_clients($consultant_id, $export_data);

			if($result)
			{
				$this->load->helper('download');
			
				$result = force_download("contacts".$consultant_id.".csv",$export_data);
			}

			if($result)
			{
				// Construct the page
				$this->load->view('common/header.php');
				$this->load->view('consultant/title.php', $data);
				$this->load->view('consultant/export/success.php', $data);
				$this->load->view('common/bootstrap.php');
				$this->load->view('common/footer.php');
			}
			else
			{
				// Construct the page
				$this->load->view('common/header.php');
				$this->load->view('consultant/title.php', $data);
				$this->load->view('consultant/export/failed.php', $data);
				$this->load->view('common/bootstrap.php');
				$this->load->view('common/footer.php');
			}
		}
		else
		{
			// If no session, redirect to login page
			redirect('home', 'refresh');
		}
	}


}
