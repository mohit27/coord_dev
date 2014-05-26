<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Import extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		
		$this->load->model('Consultant_model');
	}

	function index()
	{
		// Check if logged in
		if($this->session->userdata('logged_in'))
		{
			$session_data = $this->session->userdata('logged_in');
			$consultant_id = $session_data['consultant_id'];
			
			$data['user'] = $this->Consultant_model->get_consultant_profile($consultant_id);	

			// Display page
			$this->load->view('common/header.php');
			$this->load->view('consultant/title.php', $data);
			$this->load->view('consultant/import/select.php', $data);
			$this->load->view('common/bootstrap.php');
			$this->load->view('common/footer.php');
		}
		else
		{
			// If no session, redirect to login page
			redirect('home', 'refresh');
		}		
	}
	
	/**
	 * Index Page for this controller.
	 */
	public function contacts()
	{
		// DEBUG
		//var_dump($_POST);
		
		if($this->session->userdata('logged_in'))
		{
			$session_data = $this->session->userdata('logged_in');
			$consultant_id = $session_data['consultant_id'];
			
			$data['user'] = $this->Consultant_model->get_consultant_profile($consultant_id);	

			if(array_key_exists('upload', $_POST))
			{
				echo "doing upload<br>\n";
			
				// Import was requested
				$config['upload_path'] = './uploads/';
				$config['allowed_types'] = 'csv|txt';
				$config['max_size'] = '1048576';
				$config['max_width'] = '4096';
				$config['max_height'] = '768';
				
				$this->load->library('upload', $config);
				
				$this->load->view('common/header.php');
				$this->load->view('consultant/title.php', $data);

				if(! $this->upload->do_upload())
				{
					// Upload failed
					echo "upload failed: ".$this->upload->display_errors()."<br>\n";
					
					$data['error'] = array('error' => $this->upload->display_errors());
					$this->load->view('consultant/import/contacts.php', $data);
				}
				else
				{
					// Upload successful
					$updata = $this->upload->data();

					// Now try to convert the saved file to $csv_data array
					$this->load->library('csvreader');
					$csv_data = $this->csvreader->parse_file($updata['full_path']);

					$data['csvData'] = $csv_data['content'];
					$data['csvKeys'] = $csv_data['keys'];
					
					$this->Consultant_model->import_clients($consultant_id, $data);
					
					$this->load->view('consultant/import/contacts_success', $data);
				}
				$this->load->view('common/bootstrap.php');
				$this->load->view('common/footer.php');
			}
			else
			{
				// Initial value, import start form
				$this->load->view('common/header.php');
				$this->load->view('consultant/title.php', $data);
				$this->load->view('consultant/import/contacts.php', $data);
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
