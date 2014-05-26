<?php

class Consultant_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		
		$this->load->database();
	}

	public function get_consultant_profile($consultant_id)
	{
		log_message('info', "START:[consultant_model.php]get_consultant_profile() User_Id:".$consultant_id);

		$query = $this->db->get_where('consultant', array('consultant_id' => $consultant_id));
		
		log_message('info', "END:[consultant_model.php]get_consultant_profile()");		
		return $query->row_array();
	}
	
	public function consultant_check($username)
	{
		log_message('info', "START:[consultant_model.php]consultant_check() Username:".$username);

		$query = $this->db->get_where('consultant', array('user' => $username));
		$num_rows = $query->num_rows();
		
		log_message('info', "END:[consultant_model.php]consultant_check()");
		
		return $num_rows;
	}
	
	public function add_consultant($data)
	{
		log_message('info', "START:[consultant_model.php]add_consultant()");

		$sql = "INSERT INTO consultant (user, firstname, surname, password, email1) VALUES (?, ?, ?, ?, ?)";

		$query = $this->db->query($sql, array($data['username'], $data['firstname'], $data['surname'], $data['password'], $data['email']));

		if($query)
		{
			$sql = "SELECT consultant_id FROM consultant WHERE consultant_id = (SELECT MAX(consultant_id) FROM consultant)";
			$query = $this->db->query($sql);
			$obj = $query->result();
			$id = $obj[0]->consultant_id;
		}
		else
		{
			$id = 0;
		}
		
		log_message('info', "END:[consultant_model.php]add_consultant() ConsultantId:".$id);
		
		return $id;
	}
	
	public function update_consultant_profile($consultant_id, $data)
	{
		log_message('info', "START:[consultant_model.php]update_consultant_profile() OrganiserId:".$consultant_id);

		$sql = "UPDATE consultant SET firstname=?, surname=?, address1=?, address2=?, town=?, county=?, postcode=?, country=?, email1=?, email2=?, telephone1=?, telephone2=?, pref_imp_metric=? WHERE consultant_id = ?";
		$query = $this->db->query($sql, array($data['firstname'], $data['surname'], $data['address1'], $data['address2'], $data['town'], $data['county'], $data['postcode'], $data['country'], $data['email1'], $data['email2'], $data['telephone1'], $data['telephone2'], $data['pref_imp_metric'], $consultant_id));

		log_message('info', "END:[consultant_model.php]update_consultant_profile()");		
	}

	public function get_consultant_clients_num_rows($consultant_id)
	{
		log_message('info', "START:[consultant_model.php]get_consultant_clients_num_rows() Consultant_Id:".$consultant_id);

		$query = $this->db->get_where('client', array('consultant_id' => $consultant_id));
		
		$num_rows = $query->num_rows();
	
		log_message('info', "END:[consultant_model.php]get_consultant_clients_num_rows()");
		
		return $num_rows;
	}
	
	public function get_consultant_clients($consultant_id, $limit, $offset, $tabs)
	{
		log_message('info', "START:[consultant_model.php]get_consultant_clients() User_Id:".$consultant_id." Offset:".$offset." Limit:".$limit);

		// Create the search parameter for user group tab
		if($tabs['group'] == 'All')
		{
			$group_pattern = '';
		}
		else
		{
			$group_pattern = " AND grouping = '".$tabs['group']."'";
		}
		
		// Create the search parameter for numeric/alphabet tab
		if($tabs['content'] == 'All')
		{
			$content_pattern = '';
		}
		elseif($tabs['content'] == '123')
		{
			$content_pattern = " AND (firstname REGEXP '^[0-9]' OR surname REGEXP '^[0-9]')";
		}
		else
		{
			$content_pattern = " AND (firstname REGEXP '^".$tabs['content']."' OR surname REGEXP '^".$tabs['content']."')";
		}
		
		$sql = "SELECT * FROM client WHERE consultant_id = ?".$group_pattern.$content_pattern." LIMIT ?, ?";
		
		$query = $this->db->query($sql, array($consultant_id, $offset, $limit));

		$data = $query->result();

		log_message('info', "END:[consultant_model.php]get_consultant_clients()");
		
		return $data;		
	}

	public function get_client($consultant_id, $client_id)
	{
		log_message('info', "START:[consultant_model.php]get_client() ConsultantId:".$consultant_id." ClientId:".$client_id);

		$sql = "SELECT * FROM client WHERE consultant_id = ? AND client_id = ?";
		$query = $this->db->query($sql, array($consultant_id, $client_id));

		$data = $query->result();

		log_message('info', "END:[consultant_model.php]get_client()");
		
		return $data;		
	}
	
	public function update_client($consultant_id, $client_id, $data)
	{
		log_message('info', "START:[consultant_model.php]update_client() ConsultantId:".$consultant_id." ClientId:".$client_id);
					
		$sql = "UPDATE client SET firstname=?, surname=?, address1=?, address2=?, town=?, county=?, postcode=?, country=?, email1=?, email2=?, telephone1=?, telephone2=?, previous_client=?, gender=?, date_of_birth=?, height=?, waist=?, start_weight=?, grouping=? WHERE consultant_id = ? AND client_id = ?";

		// Convert individual fields to dob
		$date_of_birth = $data['year_dob']."-".$data['month_dob']."-".$data['day_dob'];
		
		$query = $this->db->query($sql, array($data['firstname'], $data['surname'], $data['address1'], $data['address2'], $data['town'], $data['county'], $data['postcode'], $data['country'], $data['email1'], $data['email2'], $data['telephone1'], $data['telephone2'], $data['previous_client'], $data['gender'], $date_of_birth, $data['height'], $data['waist'], $data['start_weight'], $data['grouping'], $consultant_id, $client_id));

		log_message('info', "END:[consultant_model.php]update_client()");		
	}

	public function add_client($consultant_id, $data)
	{
		log_message('info', "START:[consultant_model.php]add_client() ConsultantId:".$consultant_id);

		$sql = "INSERT INTO client (consultant_id, firstname, surname, address1, address2, town, county, postcode, country, email1, email2, telephone1, telephone2, previous_client, gender, date_of_birth, height, waist, start_weight, grouping) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

		// Convert individual fields to dob
		$date_of_birth = $data['year_dob']."-".$data['month_dob']."-".$data['day_dob'];
		
		// Translate metric / imperial measurements
		
		if($data['pref_imp_metric']=='imperial')
		{
			$height = (int)($data['height'] * 2.54);
			$waist = (int)($data['waist'] * 2.54);
			$start_weight = (int)($data['start_weight'] / 2.205);
		}
		else
		{
			$height = (int)$data['height'];
			$waist = (int)$data['waist'];
			$start_weight = (int)$data['start_weight'];
		}

		$query = $this->db->query($sql, array($consultant_id, $data['firstname'], $data['surname'], $data['address1'], $data['address2'], $data['town'], $data['county'], $data['postcode'], $data['country'], $data['email1'], $data['email2'], $data['telephone1'], $data['telephone2'], $data['previous_client'], $data['gender'], $date_of_birth, $height, $waist, $start_weight, $data['grouping']));

		if($query)
		{
			$sql = "SELECT client_id FROM client WHERE consultant_id=? AND client_id = (SELECT MAX(client_id) FROM client)";
			$query = $this->db->query($sql, array($consultant_id));
			$obj = $query->result();
			$id = $obj[0]->client_id;
		}
		else
		{
			$id = "-1";
		}
		
		log_message('info', "END:[consultant_model.php]add_client()");	

		return $id;
	}

	public function import_clients($consultant_id, $data)
	{
		log_message('info', "START:[consultant_model.php]import_clients() ConsultantId:".$consultant_id);
		
		foreach($data['csvData'] as $row)
		{
			$db_row = array();
	
			foreach($row as $key => $value)
			{
				// Filter parameters to only ones we know about
				switch($key)
				{
				case 'firstname':
				case 'surname':
				case 'address1':
				case 'address2':
				case 'town':
				case 'county':
				case 'postcode':
				case 'country':
				case 'email1':
				case 'email2':
				case 'telephone1':
				case 'telephone2':
				case 'previous_client':
				case 'gender':
				case 'date_of_birth':
				case 'age':
				case 'height':
				case 'waist':
				case 'start_weight':
				case 'bmi':
				case 'doctor_name':
				case 'doctor_address1':
				case 'doctor_address2':
				case 'doctor_town':
				case 'doctor_county':
				case 'doctor_postcode':
				case 'doctor_country':
				case 'grouping':
					$db_row[$key] = $value;
					break;
				}
			}
			
			if(strlen($db_row['grouping'])==0)
			{
				$db_row['grouping'] = 'Clients';
			}

			if(strlen($db_row['gender'])==0)
			{
				$db_row['gender'] = 'not_set';
			}

			if(strlen($db_row['bmi'])==0)
			{
				$db_row['bmi'] = '0';
			}

			$db_row['previous_client'] = '0';

			// Add the client row
			$client_id = $this->add_client($consultant_id, $db_row);
			
			// Add the medical record, only if the client was successful
			if(intval($client_id)>0)
			{
				$this->add_default_medical($consultant_id, $client_id);
			}
		}
	
		log_message('info', "END:[consultant_model.php]import_clients()");		
	}

	public function export_consultant_clients($consultant_id, &$export_data)
	{
		log_message('info', "START:[consultant_model.php]export_consultant_clients() User_Id:".$consultant_id);

		$sql = "SELECT * FROM client WHERE consultant_id = ?";
		
		$query = $this->db->query($sql, array($consultant_id));

		$data = $query->result();
		
		$header_flag = false;	
		foreach($data as $row)
		{
			if(!$header_flag)
			{
				// Write the header row in the CSV data
				$first_entry = true;
				foreach($row as $key => $value)
				{
					if($first_entry)
					{
						$export_data .= "\"".$key."\"";
						$first_entry = false;
					}
					else
					{
						$export_data .= ",\"".$key."\"";
					}
				}
				$export_data .= "\n";
				
				$header_flag = true;
			}
			
			// Write a data row to the CSV data
			$first_entry = true;
			foreach($row as $key => $value)
			{
				if($first_entry)
				{
					$export_data .= "\"".$value."\"";
					$first_entry = false;
				}
				else
				{
					$export_data .= ",\"".$value."\"";
				}
			}
			$export_data .= "\n";
		}
		
		log_message('info', "END:[consultant_model.php]export_consultant_clients()");
		
		return true;		
	}

	
	public function get_medical($consultant_id, $client_id)
	{
		log_message('info', "START:[consultant_model.php]get_medical() ConsultantId:".$consultant_id." ClientId:".$client_id);

		$sql = "SELECT * FROM medical WHERE client_id = ? AND consultant_id = ?";
		$query = $this->db->query($sql, array($client_id, $consultant_id));

		$data = $query->result();

		log_message('info', "END:[consultant_model.php]get_medical()");
		
		return $data;		
	}

	public function update_medical($consultant_id, $data)
	{
		log_message('info', "START:[consultant_model.php]update_medical() ConsultantId:".$consultant_id);
					
		$sql = "UPDATE medical SET alcoholic=?, anti_obesity_medication=?, cancer_and_treatment=?, heart_or_stroke=?, maoi_medication=?, pregnant=?, substance_misuse=?, younger_than_14=?, diabetes_insipidus=?, psoriasis_medication=?, rheumatoid_medication=?, angina=?, female_bmi50=?, arrhythmia=?, male_bmi50=?, adolescent=?, bmi60=?, diabetes=?, epilepsy=?, gastric_surgery=?, heart_conditions=?, kidney_disease=?, mental_health_disorder=?, porphyria=?, diet_controlled_diabetes=?, diuretics=?, hypertension=?, lipid_medication=?, thyroid_medication=?, gout=?, female_bmi40=?, male_bmi40=?, fertility_medication=?, anaemia=?, antibiotic_medication=?, constipation=?, crohns_disease=?, diverticular_disease=?, gall_stones=?, pain_relief=?, ulcerative_colitis=?, vertigo=?, champix=?, gastric_ulcer=?, kidney_stones=? WHERE consultant_id = ? AND medical_id = ?";

		if(isset($data['alcoholic']))
			$alcoholic = true;
		else
			$alcoholic = false;
			
		if(isset($data['anti_obesity_medication']))
			$anti_obesity_medication = true;
		else
			$anti_obesity_medication = false;
			
		if(isset($data['cancer_and_treatment']))
			$cancer_and_treatment = true;
		else
			$cancer_and_treatment = false;
			
		if(isset($data['heart_or_stroke']))
			$heart_or_stroke = true;
		else
			$heart_or_stroke = false;
			
		if(isset($data['maoi_medication']))
			$maoi_medication = true;
		else
			$maoi_medication = false;
			
		if(isset($data['pregnant']))
			$pregnant = true;
		else
			$pregnant = false;
			
		if(isset($data['substance_misuse']))
			$substance_misuse = true;
		else
			$substance_misuse = false;
			
		if(isset($data['younger_than_14']))
			$younger_than_14 = true;
		else
			$younger_than_14 = false;
			
		if(isset($data['diabetes_insipidus']))
			$diabetes_insipidus = true;
		else
			$diabetes_insipidus = false;
			
		if(isset($data['psoriasis_medication']))
			$psoriasis_medication = true;
		else
			$psoriasis_medication = false;
			
		if(isset($data['rheumatoid_medication']))
			$rheumatoid_medication = true;
		else
			$rheumatoid_medication = false;
			
		if(isset($data['angina']))
			$angina = true;
		else
			$angina = false;
			
		if(isset($data['female_bmi50']))
			$female_bmi50 = true;
		else
			$female_bmi50 = false;
			
		if(isset($data['arrhythmia']))
			$arrhythmia = true;
		else
			$arrhythmia = false;
			
		if(isset($data['male_bmi50']))
			$male_bmi50 = true;
		else
			$male_bmi50 = false;
			
		if(isset($data['adolescent']))
			$adolescent = true;
		else
			$adolescent = false;
			
		if(isset($data['bmi60']))
			$bmi60 = true;
		else
			$bmi60 = false;
			
		if(isset($data['diabetes']))
			$diabetes = true;
		else
			$diabetes = false;
			
		if(isset($data['epilepsy']))
			$epilepsy = true;
		else
			$epilepsy = false;
			
		if(isset($data['gastric_surgery']))
			$gastric_surgery = true;
		else
			$gastric_surgery = false;
			
		if(isset($data['heart_conditions']))
			$heart_conditions = true;
		else
			$heart_conditions = false;
			
		if(isset($data['kidney_disease']))
			$kidney_disease = true;
		else
			$kidney_disease = false;
			
		if(isset($data['mental_health_disorder']))
			$mental_health_disorder = true;
		else
			$mental_health_disorder = false;
			
		if(isset($data['porphyria']))
			$porphyria = true;
		else
			$porphyria = false;
			
		if(isset($data['diet_controlled_diabetes']))
			$diet_controlled_diabetes = true;
		else
			$diet_controlled_diabetes = false;
			
		if(isset($data['diuretics']))
			$diuretics = true;
		else
			$diuretics = false;
			
		if(isset($data['hypertension']))
			$hypertension = true;
		else
			$hypertension = false;
			
		if(isset($data['lipid_medication']))
			$lipid_medication = true;
		else
			$lipid_medication = false;
			
		if(isset($data['thyroid_medication']))
			$thyroid_medication = true;
		else
			$thyroid_medication = false;
			
		if(isset($data['gout']))
			$gout = true;
		else
			$gout = false;
			
		if(isset($data['female_bmi40']))
			$female_bmi40 = true;
		else
			$female_bmi40 = false;
			
		if(isset($data['male_bmi40']))
			$male_bmi40 = true;
		else
			$male_bmi40 = false;
			
		if(isset($data['fertility_medication']))
			$fertility_medication = true;
		else
			$fertility_medication = false;
			
		if(isset($data['anaemia']))
			$anaemia = true;
		else
			$anaemia = false;
			
		if(isset($data['antibiotic_medication']))
			$antibiotic_medication = true;
		else
			$antibiotic_medication = false;
			
		if(isset($data['constipation']))
			$constipation = true;
		else
			$constipation = false;
			
		if(isset($data['crohns_disease']))
			$crohns_disease = true;
		else
			$crohns_disease = false;
			
		if(isset($data['diverticular_disease']))
			$diverticular_disease = true;
		else
			$diverticular_disease = false;
			
		if(isset($data['gall_stones']))
			$gall_stones = true;
		else
			$gall_stones = false;
			
		if(isset($data['pain_relief']))
			$pain_relief = true;
		else
			$pain_relief = false;
			
		if(isset($data['ulcerative_colitis']))
			$ulcerative_colitis = true;
		else
			$ulcerative_colitis = false;
			
		if(isset($data['vertigo']))
			$vertigo = true;
		else
			$vertigo = false;
			
		if(isset($data['champix']))
			$champix = true;
		else
			$champix = false;
			
		if(isset($data['gastric_ulcer']))
			$gastric_ulcer = true;
		else
			$gastric_ulcer = false;
			
		if(isset($data['kidney_stones']))
			$kidney_stones = true;
		else
			$kidney_stones = false;
			
		$query = $this->db->query($sql, array($alcoholic, $anti_obesity_medication, $cancer_and_treatment, $heart_or_stroke, $maoi_medication, $pregnant, $substance_misuse, $younger_than_14, $diabetes_insipidus, $psoriasis_medication, $rheumatoid_medication, $angina, $female_bmi50, $arrhythmia, $male_bmi50, $adolescent, $bmi60, $diabetes, $epilepsy, $gastric_surgery, $heart_conditions, $kidney_disease, $mental_health_disorder, $porphyria, $diet_controlled_diabetes, $diuretics, $hypertension, $lipid_medication, $thyroid_medication, $gout, $female_bmi40, $male_bmi40, $fertility_medication, $anaemia, $antibiotic_medication, $constipation, $crohns_disease, $diverticular_disease, $gall_stones, $pain_relief, $ulcerative_colitis, $vertigo, $champix, $gastric_ulcer, $kidney_stones, $consultant_id, $data['medical_id'] ));

		log_message('info', "END:[consultant_model.php]update_medical()");		
	}

	public function add_medical($consultant_id, $client_id, $data)
	{
		log_message('info', "START:[consultant_model.php]add_medical() ConsultantId:".$consultant_id." ClientId:".$client_id);

		$sql = "INSERT INTO medical (`consultant_id`,`client_id`,`alcoholic`,`anti_obesity_medication`,`cancer_and_treatment`,`heart_or_stroke`,`maoi_medication`,`pregnant`,`substance_misuse`,`younger_than_14`,`diabetes_insipidus`,`psoriasis_medication`,`rheumatoid_medication`,`angina`,`female_bmi50`,`arrhythmia`,`male_bmi50`,`adolescent`,`bmi60`,`diabetes`,`epilepsy`,`gastric_surgery`,`heart_conditions`,`kidney_disease`,`mental_health_disorder`,`porphyria`,`diet_controlled_diabetes`,`diuretics`,`hypertension`,`lipid_medication`,`thyroid_medication`,`gout`,`female_bmi40`,`male_bmi40`,`fertility_medication`,`anaemia`,`antibiotic_medication`,`constipation`,`crohns_disease`,`diverticular_disease`,`gall_stones`,`pain_relief`,`ulcerative_colitis`,`vertigo`,`champix`,`gastric_ulcer`,`kidney_stones`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
		
		if(isset($data['alcoholic']))
			$alcoholic = true;
		else
			$alcoholic = false;
			
		if(isset($data['anti_obesity_medication']))
			$anti_obesity_medication = true;
		else
			$anti_obesity_medication = false;
			
		if(isset($data['cancer_and_treatment']))
			$cancer_and_treatment = true;
		else
			$cancer_and_treatment = false;
			
		if(isset($data['heart_or_stroke']))
			$heart_or_stroke = true;
		else
			$heart_or_stroke = false;
			
		if(isset($data['maoi_medication']))
			$maoi_medication = true;
		else
			$maoi_medication = false;
			
		if(isset($data['pregnant']))
			$pregnant = true;
		else
			$pregnant = false;
			
		if(isset($data['substance_misuse']))
			$substance_misuse = true;
		else
			$substance_misuse = false;
			
		if(isset($data['younger_than_14']))
			$younger_than_14 = true;
		else
			$younger_than_14 = false;
			
		if(isset($data['diabetes_insipidus']))
			$diabetes_insipidus = true;
		else
			$diabetes_insipidus = false;
			
		if(isset($data['psoriasis_medication']))
			$psoriasis_medication = true;
		else
			$psoriasis_medication = false;
			
		if(isset($data['rheumatoid_medication']))
			$rheumatoid_medication = true;
		else
			$rheumatoid_medication = false;
			
		if(isset($data['angina']))
			$angina = true;
		else
			$angina = false;
			
		if(isset($data['female_bmi50']))
			$female_bmi50 = true;
		else
			$female_bmi50 = false;
			
		if(isset($data['arrhythmia']))
			$arrhythmia = true;
		else
			$arrhythmia = false;
			
		if(isset($data['male_bmi50']))
			$male_bmi50 = true;
		else
			$male_bmi50 = false;
			
		if(isset($data['adolescent']))
			$adolescent = true;
		else
			$adolescent = false;
			
		if(isset($data['bmi60']))
			$bmi60 = true;
		else
			$bmi60 = false;
			
		if(isset($data['diabetes']))
			$diabetes = true;
		else
			$diabetes = false;
			
		if(isset($data['epilepsy']))
			$epilepsy = true;
		else
			$epilepsy = false;
			
		if(isset($data['gastric_surgery']))
			$gastric_surgery = true;
		else
			$gastric_surgery = false;
			
		if(isset($data['heart_conditions']))
			$heart_conditions = true;
		else
			$heart_conditions = false;
			
		if(isset($data['kidney_disease']))
			$kidney_disease = true;
		else
			$kidney_disease = false;
			
		if(isset($data['mental_health_disorder']))
			$mental_health_disorder = true;
		else
			$mental_health_disorder = false;
			
		if(isset($data['porphyria']))
			$porphyria = true;
		else
			$porphyria = false;
			
		if(isset($data['diet_controlled_diabetes']))
			$diet_controlled_diabetes = true;
		else
			$diet_controlled_diabetes = false;
			
		if(isset($data['diuretics']))
			$diuretics = true;
		else
			$diuretics = false;
			
		if(isset($data['hypertension']))
			$hypertension = true;
		else
			$hypertension = false;
			
		if(isset($data['lipid_medication']))
			$lipid_medication = true;
		else
			$lipid_medication = false;
			
		if(isset($data['thyroid_medication']))
			$thyroid_medication = true;
		else
			$thyroid_medication = false;
			
		if(isset($data['gout']))
			$gout = true;
		else
			$gout = false;
			
		if(isset($data['female_bmi40']))
			$female_bmi40 = true;
		else
			$female_bmi40 = false;
			
		if(isset($data['male_bmi40']))
			$male_bmi40 = true;
		else
			$male_bmi40 = false;
			
		if(isset($data['fertility_medication']))
			$fertility_medication = true;
		else
			$fertility_medication = false;
			
		if(isset($data['anaemia']))
			$anaemia = true;
		else
			$anaemia = false;
			
		if(isset($data['antibiotic_medication']))
			$antibiotic_medication = true;
		else
			$antibiotic_medication = false;
			
		if(isset($data['constipation']))
			$constipation = true;
		else
			$constipation = false;
			
		if(isset($data['crohns_disease']))
			$crohns_disease = true;
		else
			$crohns_disease = false;
			
		if(isset($data['diverticular_disease']))
			$diverticular_disease = true;
		else
			$diverticular_disease = false;
			
		if(isset($data['gall_stones']))
			$gall_stones = true;
		else
			$gall_stones = false;
			
		if(isset($data['pain_relief']))
			$pain_relief = true;
		else
			$pain_relief = false;
			
		if(isset($data['ulcerative_colitis']))
			$ulcerative_colitis = true;
		else
			$ulcerative_colitis = false;
			
		if(isset($data['vertigo']))
			$vertigo = true;
		else
			$vertigo = false;
			
		if(isset($data['champix']))
			$champix = true;
		else
			$champix = false;
			
		if(isset($data['gastric_ulcer']))
			$gastric_ulcer = true;
		else
			$gastric_ulcer = false;
			
		if(isset($data['kidney_stones']))
			$kidney_stones = true;
		else
			$kidney_stones = false;

		$query = $this->db->query($sql, array($consultant_id, $client_id, $alcoholic, $anti_obesity_medication, $cancer_and_treatment, $heart_or_stroke, $maoi_medication, $pregnant, $substance_misuse, $younger_than_14, $diabetes_insipidus, $psoriasis_medication, $rheumatoid_medication, $angina, $female_bmi50, $arrhythmia, $male_bmi50, $adolescent, $bmi60, $diabetes, $epilepsy, $gastric_surgery, $heart_conditions, $kidney_disease, $mental_health_disorder, $porphyria, $diet_controlled_diabetes, $diuretics, $hypertension, $lipid_medication, $thyroid_medication, $gout, $female_bmi40, $male_bmi40, $fertility_medication, $anaemia, $antibiotic_medication, $constipation, $crohns_disease, $diverticular_disease, $gall_stones, $pain_relief, $ulcerative_colitis, $vertigo, $champix, $gastric_ulcer, $kidney_stones));

		if($query)
		{
			$sql = "SELECT medical_id FROM medical WHERE consultant_id=? AND medical_id = (SELECT MAX(medical_id) FROM medical)";
			$query = $this->db->query($sql, array($consultant_id));
			$obj = $query->result();
			$id = $obj[0]->medical_id;
		}
		else
		{
			$id = "-1";
		}
		
		log_message('info', "END:[consultant_model.php]add_medical()");		
	}

	public function add_default_medical($consultant_id, $client_id)
	{
		log_message('info', "START:[consultant_model.php]add_default_medical() ConsultantId:".$consultant_id." ClientId:".$client_id);

		$sql = "INSERT INTO medical (`consultant_id`,`client_id`,`alcoholic`,`anti_obesity_medication`,`cancer_and_treatment`,`heart_or_stroke`,`maoi_medication`,`pregnant`,`substance_misuse`,`younger_than_14`,`diabetes_insipidus`,`psoriasis_medication`,`rheumatoid_medication`,`angina`,`female_bmi50`,`arrhythmia`,`male_bmi50`,`adolescent`,`bmi60`,`diabetes`,`epilepsy`,`gastric_surgery`,`heart_conditions`,`kidney_disease`,`mental_health_disorder`,`porphyria`,`diet_controlled_diabetes`,`diuretics`,`hypertension`,`lipid_medication`,`thyroid_medication`,`gout`,`female_bmi40`,`male_bmi40`,`fertility_medication`,`anaemia`,`antibiotic_medication`,`constipation`,`crohns_disease`,`diverticular_disease`,`gall_stones`,`pain_relief`,`ulcerative_colitis`,`vertigo`,`champix`,`gastric_ulcer`,`kidney_stones`) VALUES  (?, ?, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0')";
		
		$query = $this->db->query($sql, array($consultant_id, $client_id));

		if($query)
		{
			$sql = "SELECT medical_id FROM medical WHERE consultant_id=? AND medical_id = (SELECT MAX(medical_id) FROM medical)";
			$query = $this->db->query($sql, array($consultant_id));
			$obj = $query->result();
			$id = $obj[0]->medical_id;
		}
		else
		{
			$id = "-1";
		}
		
		log_message('info', "END:[consultant_model.php]add_default_medical()");		
	}
	
	function login($username, $password)
	{
		$this -> db -> select('consultant_id, user, password');
		$this -> db -> from('consultant');
		$this -> db -> where('user', $username);
		$this -> db -> where('password', $password);
		$this -> db -> limit(1);

		$query = $this -> db -> get();
 
		if($query -> num_rows() == 1)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}
	
	function get_contact_status($consultant_id)
	{
		log_message('info', "START:[consultant_model.php]get_contact_status() User_Id:".$consultant_id);

		$sql = "SELECT grouping, COUNT(*) AS `count` FROM client WHERE consultant_id = ? GROUP BY grouping";
		
		$query = $this->db->query($sql, array($consultant_id));

		$data = $query->result();

		return $data;
	}
	
	public function add_client_measurement_record($consultant_id, $client_id, $data, $post)
	{
		log_message('info', "START:[consultant_model.php]add_client_measurement_record() ConsultantId:".$consultant_id." ClientId:".$client_id);

		$sql = "INSERT INTO measurements (consultant_id, client_id, time, weight, waist, thigh, arm, stomach, neck, chest, notes) VALUES (?, ?, NOW(), ?, ?, ?, ?, ?, ?, ?, ?)";

		// Translate metric / imperial measurements
		
		var_dump($data);
		
		if($data['user']['pref_imp_metric']=='imperial')
		{
			$weight = (int)($post['weight'] / 2.205);
			$waist = (int)($post['waist'] * 2.54);
			$thigh = (int)($post['thigh'] * 2.54);
			$arm = (int)($post['arm'] * 2.54);
			$stomach = (int)($post['stomach'] * 2.54);
			$neck = (int)($post['neck'] * 2.54);
			$chest = (int)($post['chest'] * 2.54);
		}
		else
		{
			$weight = (int)$post['weight'];
			$waist = (int)$post['waist'];
			$thigh = (int)$post['thigh'];
			$arm = (int)$post['arm'];
			$stomach = (int)$post['stomach'];
			$neck = (int)$post['neck'];
			$chest = (int)$post['chest'];
		}

		$query = $this->db->query($sql, array($consultant_id, $client_id, $weight, $waist, $thigh, $arm, $stomach, $neck, $chest, $post['notes']));

		if($query)
		{
			$sql = "SELECT weight_id FROM measurements WHERE consultant_id=? AND client_id=? AND weight_id = (SELECT MAX(weight_id) FROM weight)";
			$query = $this->db->query($sql, array($consultant_id, $client_id));
			$obj = $query->result();
			$id = $obj[0]->weight_id;
		}
		else
		{
			$id = "-1";
		}
		
		log_message('info', "END:[consultant_model.php]add_client_measurement_record()");	

		return $id;
	}

	public function get_client_measurement_records($consultant_id, $client_id)
	{
		log_message('info', "START:[consultant_model.php]get_client_measurement_records() ConsultantId:".$consultant_id." ClientId:".$client_id);

		$sql = "SELECT * FROM measurements WHERE consultant_id = ? AND client_id = ? ORDER BY time";
		
		$query = $this->db->query($sql, array($consultant_id, $client_id));

		$data = $query->result();

		log_message('info', "END:[consultant_model.php]get_client_measurement_records()");

		return $data;
	}
}