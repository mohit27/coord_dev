<form action="/consultant/clients/view/0" method="post">

	<?php
		if(isset($_GET['grouping']))
		{
			$grouping = $_GET['grouping'];
		}
		else
		{
			$grouping = 'Clients';
		}
	?>

	<input type="hidden" name="previous_client" value="0">
	<input type="hidden" name="grouping" value="<?php echo $grouping; ?>">
	<input type="hidden" name="pref_imp_metric" value="<?php echo $user['pref_imp_metric']; ?>">

	<div class="panel">
		<a href="/consultant/clients">Contacts</a> > <a href="/consultant/clients/add">Add New Contact</a>

		<div class="container-fluid sub-panel-edit">
			
			<div class="accordion" id="accordion2">

				<!-- Contact Information -->
				<div class="accordion-group">
					<div class="accordion-heading" style="background-color: #CCCCCC;">
						<div class="row-fluid">
							<div class="span12">
								<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseContact">
									<h2 class="sub-panel" style="color: #FFFFFF;">Add New Contact</h2>
								</a>
							</div>
						</div>
					</div>

					<div id="collapseContact" class="accordion-body collapse in">
					<div class="accordion-inner">
				
						<div class="row-fluid">
							<div class="span12">
								<h2 class="sub-panel-edit">Add New Contact</h2>					
							</div>
						</div>
		
						<div class="row-fluid" style="border-top: 1px solid #CCCCCC;">
							<div class="span12">
								<div style="float: left;">
									<label class="sub-panel-record-field-edit" for="firstname">First Name</label>
									<input class="sub-panel-record-field-edit" id="firstname" type="text" value="" maxlength="255" name="firstname" autocomplete="off">
								</div>
								<div style="float: left;">
									<label class="sub-panel-record-field-edit" for="surname">Last Name</label>
									<input class="sub-panel-record-field-edit" id="surname" type="text" value="" maxlength="255" name="surname" autocomplete="off">
								</div>
							</div>
						</div>
						<div class="row-fluid" style="border-top: 1px solid #CCCCCC;">
							<div class="span4">
								<div class="sub-panel-record-field-edit">
									<label class="sub-panel-record-field-edit" style="float: left; width: 100px;" for="address1">Address</label>
									<input class="sub-panel-record-field-edit" id="address1" type="text" value="" maxlength="255" name="address1" autocomplete="off">
								</div>
								<div class="sub-panel-record-field-edit">
									<label class="sub-panel-record-field-edit" style="float: left; width: 100px;" for="address2">Address</label>
									<input class="sub-panel-record-field-edit" id="address2" type="text" value="" maxlength="255" name="address2" autocomplete="off">
								</div>
								<div class="sub-panel-record-field-edit">
									<label class="sub-panel-record-field-edit" style="float: left; width: 100px;" for="town">Town/City</label>
									<input class="sub-panel-record-field-edit" id="town" type="text" value="" maxlength="255" name="town" autocomplete="off">
								</div>
								<div class="sub-panel-record-field-edit">
									<label class="sub-panel-record-field-edit" style="float: left; width: 100px;" for="county">County</label>
									<input class="sub-panel-record-field-edit" id="county" type="text" value="" maxlength="255" name="county" autocomplete="off">
								</div>
								<div class="sub-panel-record-field-edit">
									<label class="sub-panel-record-field-edit" style="float: left; width: 100px;" for="postcode">Postcode</label>
									<input class="sub-panel-record-field-edit" id="postcode" type="text" value="" maxlength="255" name="postcode" autocomplete="off">
								</div>
								<div class="sub-panel-record-field-edit">
									<label class="sub-panel-record-field-edit" style="float: left; width: 100px;" for="country">Country</label>
									<input class="sub-panel-record-field-edit" id="country" type="text" value="" maxlength="255" name="country" autocomplete="off">
								</div>
							</div>
							<div class="span4">
								<div class="sub-panel-record-field-edit">
									<label class="sub-panel-record-field-edit" style="float: left; width: 110px;" for="telephone1">Home Telephone</label>
									<input class="sub-panel-record-field-edit" id="telephone1" type="text" value="" maxlength="255" name="telephone1" autocomplete="off">
								</div>
								<div class="sub-panel-record-field-edit">
									<label class="sub-panel-record-field-edit" style="float: left; width: 110px;" for="telephone2">Mobile Telephone</label>
									<input class="sub-panel-record-field-edit" id="telephone2" type="text" value="" maxlength="255" name="telephone2" autocomplete="off">
								</div>
								<div class="sub-panel-record-field-edit">
									<label class="sub-panel-record-field-edit" style="float: left; width: 110px;" for="email1">Main Email</label>
									<input class="sub-panel-record-field-edit" id="email1" type="text" value="" maxlength="255" name="email1" autocomplete="off">
								</div>
								<div class="sub-panel-record-field-edit">
									<label class="sub-panel-record-field-edit" style="float: left; width: 110px;" for="email2">Back Email</label>
									<input class="sub-panel-record-field-edit" id="email2" type="text" value="" maxlength="255" name="email2" autocomplete="off">
								</div>
								<div class="sub-panel-record-field-edit">
									<label class="sub-panel-record-field-edit" style="float: left; width: 110px;" for="gender">Gender</label>
									<select id="gender" name="gender" style="width: 100px" autocomplete="off">
										<option selected>NotSet</option>
										<option >Female</option>
										<option >Male</option>
									</select>
								</div>
								<div class="sub-panel-record-field-edit">
									<label class="sub-panel-record-field-edit" style="float: left; width: 40px;" for="date_of_birth">DOB</label>
									<select class="sub-panel-record-field-edit" style="width: 50px;" id="day_dob" name="day_dob" type="text" value="" maxlength="2" name="day_dob" autocomplete="off">
										<?php 
										for($day=1;$day<=31;$day++)
										{
											echo "<option value=\"$day\">$day</option>\n";
										} 
										?>
									</select>
									<select class="sub-panel-record-field-edit" style="width: 50px;" id="month_dob" name="month_dob" type="text" value="" maxlength="2" name="month_dob" autocomplete="off">
										<?php 
											for($month=1;$month<=12;$month++)
											{
												echo "<option value=\"$month\">$month</option>\n";
											}
										?>
									</select>
									<select class="sub-panel-record-field-edit" style="width: 60px;" id="year_dob" name="year_dob" type="text" value="" maxlength="4" name="year_dob" autocomplete="off">
										<?php 
											$now = getdate();
											for($idx=1;$idx<=100;$idx++){
												$year = $now['year'] - $idx;
												echo "<option value=\"$year\">$year</option>";
											} 
										?>
									</select>
								</div>
							</div>
							<div class="span4">
								<div class="sub-panel-record-field-edit">
									<label class="sub-panel-record-field-edit" style="float: left; width: 110px;" for="height">Height
									<?php
										if($user['pref_imp_metric']=='metric')
										{
											echo '(cm)';
										}
										else
										{
											echo '(in)';
										}
									?>
									</label>
									<input class="sub-panel-record-field-edit" id="height" type="text" value="" maxlength="255" name="height" autocomplete="off">
								</div>
								<div class="sub-panel-record-field-edit">
									<label class="sub-panel-record-field-edit" style="float: left; width: 110px;" for="waist">Waist
									<?php
										if($user['pref_imp_metric']=='metric')
										{
											echo '(cm)';
										}
										else
										{
											echo '(in)';
										}
									?>
									</label>
									<input class="sub-panel-record-field-edit" id="waist" type="text" value="" maxlength="255" name="waist" autocomplete="off">
								</div>
								<div class="sub-panel-record-field-edit">
									<label class="sub-panel-record-field-edit" style="float: left; width: 110px;" for="weight">Start weight
									<?php
										if($user['pref_imp_metric']=='metric')
										{
											echo '(kg)';
										}
										else
										{
											echo '(lb)';
										}
									?>
									</label>
									<input class="sub-panel-record-field-edit" id="start_weight" type="text" value="" maxlength="255" name="start_weight" autocomplete="off">
								</div>
							</div>
						</div>
					</div>
				</div>


				<!-- Medical PRF Information -->
				<div class="accordion-group">
					<div class="accordion-heading" style="background-color: #CCCCCC;">
						<div class="row-fluid">
							<div class="span12">
								<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseMedical">
									<h2 class="sub-panel" style="color: #FFFFFF;">Medical Information</h2>
								</a>
							</div>
						</div>
					</div>
					<div id="collapseMedical" class="accordion-body collapse in">
						<div class="accordion-inner">
							<div class="row-fluid">
								<div class="span4">
									<div class="sub-panel-record-field-edit">
										<h4 style="background-color: #E42C1A; color: #FFFFFF; padding: 5px">STOP - CONTRADICTED</h4><br>
										<h5 style="background-color: #EB674E; color: #FFFFFF; padding: 5px">If any of the following apply, a client must not use any Cambridge Step.</h5><br>
										<div style="color: #E42C1A; padding: 5px;">
											<input class="sub-panel-record-field-edit" id="alcoholic" type="checkbox" name="alcoholic" autocomplete="off" style="width: 20px;">Alcoholic<br>
											
											<input class="sub-panel-record-field-edit" id="anti_obesity_medication" type="checkbox" name="anti_obesity_medication" autocomplete="off" style="width: 20px;">Anti-obesity medication<br>
											
											<input class="sub-panel-record-field-edit" id="bmi_below_30" type="checkbox" value="" name="bmi_below_30" autocomplete="off" style="width: 20px;">BMI below 20<br>
											
											<input class="sub-panel-record-field-edit" id="cancer_and_treatment" type="checkbox" name="cancer_and_treatment" autocomplete="off" style="width: 20px;" style="width: 20px;">Cancer and having treatment<br>
											
											<input class="sub-panel-record-field-edit" id="heart_or_stroke" type="checkbox" name="heart_or_stroke" autocomplete="off" style="width: 20px;">Heart attack or stroke (within the last three months)<br>
											
											<input class="sub-panel-record-field-edit" id="maoi_medication" type="checkbox" name="maoi_medication" autocomplete="off" style="width: 20px;">MAOI medication (monoamine oxidase inhibitors)<br>
											
											<input class="sub-panel-record-field-edit" id="pregnant" type="checkbox" name="pregnant" autocomplete="off" style="width: 20px;">Pregnant, breastfeeding or given birth in the last three months<br>
											
											<input class="sub-panel-record-field-edit" id="substance_misuse" type="checkbox" name="substance_misuse" autocomplete="off" style="width: 20px;">Substance misuser<br>
											
											<input class="sub-panel-record-field-edit" id="younger_than_14" type="checkbox" name="younger_than_14" autocomplete="off" style="width: 20px;">Younger than 14 years<br>
										</div>
										
										<h4 style="background-color: #FF7B2F; color: #FFFFFF; padding: 5px">ACTION - GP signature required</h4><br>
										<h5 style="background-color: #FFAD79; color: #FFFFFF; padding: 5px">Once you have GPs signature the Step is dependent on the condition, see below.Step 2 and above is suitable for:</h5>

										<div style="color: #FF7B2F; padding: 5px;">
											<h5>Step 2 and above is suitable for:</h5>
											<input class="sub-panel-record-field-edit" id="diabetes-insipidus" type="checkbox" name="diabetes-insipidus" autocomplete="off" style="width: 20px;">Diabetes insipidus<br>
											
											<input class="sub-panel-record-field-edit" id="psoriasis_medication" type="checkbox" name="psoriasis_medication" autocomplete="off" style="width: 20px;">Psoriasis treated with tablet or injection<br>
											
											<input class="sub-panel-record-field-edit" id="rheumatoid_medication" type="checkbox" name="rheumatoid_medication" autocomplete="off" style="width: 20px;">Rheumatoid arthritis treated with medication<br>
											
											<h5>Step 3 and above is suitable for:</h5>
											<input class="sub-panel-record-field-edit" id="angina" type="checkbox" name="angina" autocomplete="off" style="width: 20px;">Angina<br>
											
											<input class="sub-panel-record-field-edit" id="female_bmi50" type="checkbox" name="female_bmi50" autocomplete="off" style="width: 20px;">Female with BMI 50 and above<br>
											
											<h5>Step 4 and above is suitable for:</h5>
											<input class="sub-panel-record-field-edit" id="arrhythmia" type="checkbox" name="arrhythmia" autocomplete="off" style="width: 20px;">Arrhythmia<br>
											
											<input class="sub-panel-record-field-edit" id="male_bmi50" type="checkbox" name="male_bmi50" autocomplete="off" style="width: 20px;">Male with BMI 50 and above<br>
										</div>
									</div>
								</div>
								<div class="span4">
									<div class="sub-panel-record-field-edit">
										<h5 style="background-color: #FFAD79; color: #FFFFFF; padding: 5px">Complete a Medical Enquiry Form online (MEF) for advice on a suitable Step for:</h5>
										<div style="color: #FF7B2F; padding: 5px;">
											<input class="sub-panel-record-field-edit" id="adolescent" type="checkbox" name="adolescent" autocomplete="off" style="width: 20px;">Adolescent (14 up to 18 years)<br>

											<input class="sub-panel-record-field-edit" id="bmi60" type="checkbox" name="bmi60" autocomplete="off" style="width: 20px;">BMI 60 and above<br>

											<input class="sub-panel-record-field-edit" id="diabetes" type="checkbox" name="diabetes" autocomplete="off" style="width: 20px;">Diabetes: Type 1 and 2<br>

											<input class="sub-panel-record-field-edit" id="epilepsy" type="checkbox" name="epilepsy" autocomplete="off" style="width: 20px;">Epilepsy<br>

											<input class="sub-panel-record-field-edit" id="gastric_surgery" type="checkbox" name="gastric_surgery" autocomplete="off" style="width: 20px;">Gastric surgical procedures<br>

											<input class="sub-panel-record-field-edit" id="heart_conditions" type="checkbox" name="heart_conditions" autocomplete="off" style="width: 20px;">Heart conditions<br>

											<input class="sub-panel-record-field-edit" id="kidney_disease" type="checkbox" name="kidney_disease" autocomplete="off" style="width: 20px;">Kidney disease/failure<br>

											<input class="sub-panel-record-field-edit" id="mental_health_disorder" type="checkbox" name="mental_health_disorder" autocomplete="off" style="width: 20px;">Mental health disorders (including eating disorders)<br>

											<input class="sub-panel-record-field-edit" id="porphyria" type="checkbox" name="porphyria" autocomplete="off" style="width: 20px;">Porphyria<br>

										</div>
										
										<h4 style="background-color: #FFA942; color: #FFFFFF; padding: 5px">CAUTION<br> - SEND A MONITORING LETTER</h4><br>
										<h5 style="background-color: #FFCA88; color: #FFFFFF; padding: 5px">A monitoring letter must be sent to GP, and then the Step is dependent on the condition, see below.</h5><br>

										<div style="color: #FFA942; padding: 5px;">
											<h5>Any Step is suitable for:</h5>
											<input class="sub-panel-record-field-edit" id="diet_controlled_diabetes" type="checkbox" name="diet_controlled_diabetes" autocomplete="off" style="width: 20px;">Diet controlled diabetes<br>

											<input class="sub-panel-record-field-edit" id="diuretics" type="checkbox" name="diuretics" autocomplete="off" style="width: 20px;">Diuretics<br>

											<input class="sub-panel-record-field-edit" id="hypertension" type="checkbox" name="hypertension" autocomplete="off" style="width: 20px;">Hypertension<br>

											<input class="sub-panel-record-field-edit" id="lipid_medication" type="checkbox" name="lipid_medication" autocomplete="off" style="width: 20px;">Lipid medication<br>

											<input class="sub-panel-record-field-edit" id="thyroid_medication" type="checkbox" name="thyroid_medication" autocomplete="off" style="width: 20px;">Thyroid medication<br>
											
											<h5>Step 2 and above is suitable for:</h5>
											<input class="sub-panel-record-field-edit" id="gout" type="checkbox" name="gout" autocomplete="off" style="width: 20px;">Gout<br>

											<input class="sub-panel-record-field-edit" id="female_bmi40" type="checkbox" name="female_bmi40" autocomplete="off" style="width: 20px;">Female with BMI 40-49.9<br>

											<h5>Step 3 and above is suitable for:</h5>
											<input class="sub-panel-record-field-edit" id="male_bmi40" type="checkbox" name="male_bmi40" autocomplete="off" style="width: 20px;">Male with BMI 40-49.9<br>

											<h5>Step 4 and above is suitable for:</h5>
											<input class="sub-panel-record-field-edit" id="fertility_medication" type="checkbox" name="fertility_medication" autocomplete="off" style="width: 20px;">Fertility medication<br>
										</div>
									</div>
								</div>
								<div class="span4">
									<div class="sub-panel-record-field-edit">
										<h4 style="background-color: #008164; color: #FFFFFF; padding: 5px;">NO GP SIGNATURE OR MONITORING LETTER IS NEEDED</h4><br>
										<h5 style="background-color: #50AD98; color: #FFFFFF; padding: 5px;">No GP signature or monitoring letter is required, but the Step is dependent on the condition, see below.</h5><br>
										<div style="color: #008164; padding: 5px;">

											<h5>Step 2 and above is suitable for:</h5><br>
											<input class="sub-panel-record-field-edit" id="anaemia" type="checkbox" name="anaemia" autocomplete="off" style="width: 20px;">Anaemia<br>

											<input class="sub-panel-record-field-edit" id="antibiotic_medication" type="checkbox" name="antibiotic_medication" autocomplete="off" style="width: 20px;">Antibiotic medication<br>

											<input class="sub-panel-record-field-edit" id="constipation" type="checkbox" name="constipation" autocomplete="off" style="width: 20px;">Constipation<br>

											<input class="sub-panel-record-field-edit" id="crohns_disease" type="checkbox" name="crohns_disease" autocomplete="off" style="width: 20px;">Crohn's disease<br>

											<input class="sub-panel-record-field-edit" id="diverticular_disease" type="checkbox" name="diverticular_disease" autocomplete="off" style="width: 20px;">Diverticular disease<br>

											<input class="sub-panel-record-field-edit" id="gall_stones" type="checkbox" name="gall_stones" autocomplete="off" style="width: 20px;">Gall stones<br>

											<input class="sub-panel-record-field-edit" id="pain_relief" type="checkbox" name="pain_relief" autocomplete="off" style="width: 20px;">Pain relief (moderate to strong)<br>

											<input class="sub-panel-record-field-edit" id="ulcerative_colitis" type="checkbox" name="ulcerative_colitis" autocomplete="off" style="width: 20px;">Ulcerative Colitis<br>

											<input class="sub-panel-record-field-edit" id="vertigo" type="checkbox" name="vertigo" autocomplete="off" style="width: 20px;">Vertigo<br>

											<h5>Step 3 and above is suitable for:</h5><br>
											<input class="sub-panel-record-field-edit" id="champix" type="checkbox" name="champix" autocomplete="off" style="width: 20px;">Champix<br>

											<input class="sub-panel-record-field-edit" id="gastric_ulcer" type="checkbox" name="gastric_ulcer" autocomplete="off" style="width: 20px;">Gastric ulcer<br>

											<input class="sub-panel-record-field-edit" id="kidney_stones" type="checkbox" name="kidney_stones" autocomplete="off" style="width: 20px;">Kidney stones<br>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

			<div class="row-fluid" style="border-top: 1px solid #CCCCCC;">
				<div class="span12">
					<div class="sub-panel-record-field-edit">
						<input class="btn" type="reset" name="cancel" value="Cancel">
						<input class="btn" type="submit" name="add" value="Add">
					</div>
				</div>
			</div>
		</div>
	</div>
</form>