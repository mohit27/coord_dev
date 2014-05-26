<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct()
	{
		parent::__construct();		
	}

	/**
	 * Index Page for this controller.
	 */
	public function index()
	{
	
		$sql = "SELECT * FROM game_instance WHERE organiser_id = ? LIMIT ?, ?";
		$query = $this->db->query($sql, array(1, 1, 10));

		$data = $query->result();

		foreach($data as $row)
		{
			var_dump($row);

			echo $row->game_instance_id;
/*
			foreach($row as $key => $value)
			{
				echo "key:".$key." ".$value."<br>\r\n";
			}
*/			
		}
		
		echo "<br>\nHello<br>\n";

		$goofy = array("a" => "AA", "b" => "BB", "c" => "CC");
		
		var_dump($goofy);
		
	}
		
}
