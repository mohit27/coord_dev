
	<div class="panel">
		<a href="/consultant/clients">Contacts</a> > <a href="/consultant/clients/view/<?php echo $query[0]->client_id;?>">View</a>
		
		<div class="container-fluid sub-panel-edit">
			<div style="padding-top: 10px; padding-bottom: 10px">
				<a class="btn" href="/consultant/clients/add/?grouping=Contacts"><i class="icon-plus-sign"></i> Add New Contact</a>&nbsp;
				<a class="btn" href="/consultant/clients/add/?grouping=Clients"><i class="icon-plus-sign"></i> Add New Client</a>&nbsp;
				<a class="btn" href="/consultant/clients/add/?grouping=Consultants"><i class="icon-plus-sign"></i> Add New Consultant</a>
			</div>

			<div class="accordion" id="accordion2">

				<!-- Contact Information -->
				<div class="accordion-group">
					<div class="accordion-heading" style="background-color: #CCCCCC;">
						<div class="row-fluid">
							<div class="span12">
								<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseContact">
									<h2 class="sub-panel" style="color: #FFFFFF;"><?php echo $query[0]->firstname; ?>&nbsp;<?php echo $query[0]->surname; ?></h2>
								</a>
							</div>
						</div>
					</div>
					<div id="collapseContact" class="accordion-body collapse in">
						<div class="accordion-inner">
							<div class="row-fluid">
								<div class="span12">
									<h2 class="sub-panel" style="width: 200px;"><?php echo $query[0]->firstname; ?>&nbsp;<?php echo $query[0]->surname; ?></h2><a class="sub-panel" href="/consultant/clients/edit/<?php echo $query[0]->client_id;?>">Edit Record&nbsp;<i class="icon-pencil"></i></a>
								</div>
							</div>

							<div class="row-fluid" style="border-top: 1px solid #CCCCCC;">
								<div class="span4">
									<div class="sub-panel-record-field">
										<label class="sub-panel-record-field"> Address </label>
										<span class="sub-panel-record-field">
											<?php echo $query[0]->address1; ?><br>
											<?php echo $query[0]->address2; ?><br>
											<?php echo $query[0]->town; ?><br>
											<?php echo $query[0]->county; ?><br>
											<?php echo $query[0]->postcode; ?><br>
											<?php echo $query[0]->country; ?>
										</span>
									</div>
								</div>
								<div class="span4">
									<div class="sub-panel-record-field">
										<label class="sub-panel-record-field"> Mobile Phone </label>
										<span class="sub-panel-record-field"><?php echo $query[0]->telephone1; ?></span>
									</div>
									<div class="sub-panel-record-field">
										<label class="sub-panel-record-field"> Home Phone </label>
										<span class="sub-panel-record-field"><?php echo $query[0]->telephone2; ?></span>
									</div>
									<div class="sub-panel-record-field first">
										<a href="mailto:<?php echo $query[0]->email1; ?>"><?php echo $query[0]->email1; ?></a>
									</div>

									<div class="sub-panel-record-field first">
										<label class="sub-panel-record-field"> Gender </label>
										<span class="sub-panel-record-field"><?php echo $query[0]->gender; ?></span>
									</div>

									<div class="sub-panel-record-field first">
										<label class="sub-panel-record-field"> Date Of Birth </label>
										<span class="sub-panel-record-field">
											<?php 
												sscanf($query[0]->date_of_birth,"%d-%d-%d", $year_dob, $month_dob, $day_dob);
												echo $day_dob."/".$month_dob."/".$year_dob;
											?>
										</span>
									</div>
									
									<div class="sub-panel-record-field first">
										<label class="sub-panel-record-field"> Age </label>
										<span class="sub-panel-record-field">
											<?php
											$dob_date = new DateTime($year_dob."-".$month_dob."-".$day_dob);
											$now = getdate();
											$now_date = new DateTime($now['year']."-".$now['mon']."-".$now['mday']);
											$interval = $now_date->diff($dob_date);
											echo $interval->y; 
											?>
										</span>
									</div>						
								</div>
								<div class="span4">
									<div class="sub-panel-record-field first">
										<label class="sub-panel-record-field"> Height </label><br>
									</div>
									<div class="sub-panel-record-field first">
										<span class="sub-panel-record-field" style="width: 80px; float: left;"><?php echo $query[0]->height; ?> cm</span>
										<span class="sub-panel-record-field" style="width: 80px; float: left;"><?php printf("%d", $query[0]->height/2.54); ?> in</span>
									</div>
									<div class="sub-panel-record-field first">
										<label class="sub-panel-record-field"> Waist </label><br>
									</div>
									<div class="sub-panel-record-field first">
										<span class="sub-panel-record-field" style="width: 80px; float: left;"><?php echo $query[0]->waist; ?> cm</span>
										<span class="sub-panel-record-field" style="width: 80px; float: left;"><?php printf("%d", $query[0]->waist/2.54); ?> in</span>
									</div>
									<div class="sub-panel-record-field first">
										<label class="sub-panel-record-field"> Start Weight </label><br>
									</div>
									<div class="sub-panel-record-field first">
										<span class="sub-panel-record-field" style="width: 80px; float: left;"><?php echo $query[0]->start_weight; ?> kg</span>
										<span class="sub-panel-record-field" style="width: 80px; float: left;"><?php printf("%d", $query[0]->start_weight*2.205); ?> lb</span>
									</div>						
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
									<h2 class="sub-panel" style="color: #FFFFFF">Medical Information</h2>
								</a>
							</div>
						</div>
					</div>
					<div id="collapseMedical" class="accordion-body collapse">
						<div class="accordion-inner">
							<div class="row-fluid">
								<div class="span4">
									<div class="sub-panel-record-field-edit">
										<h4 style="background-color: #E42C1A; color: #FFFFFF; padding: 5px">STOP - CONTRADICTED</h4><br>
										<h5 style="background-color: #EB674E; color: #FFFFFF; padding: 5px">If any of the following apply, a client must not use any Cambridge Step.</h5><br>
										<div style="color: #E42C1A; padding: 5px;">
											<span class="sub-panel-record_field">
												<?php if($medical[0]->alcoholic){ ?>
												<i class="icon-ok-sign"></i>&nbsp;Alcoholic<br>
												<?php }else{ ?>
												<i class="icon-remove-sign"></i>&nbsp;Alcoholic<br>
												<?php } ?>
											</span>
											
											<span class="sub-panel-record_field">
												<?php if($medical[0]->anti_obesity_medication){ ?>
												<i class="icon-ok-sign"></i>&nbsp;Anti-obesity medication<br>
												<?php }else{ ?>
												<i class="icon-remove-sign"></i>&nbsp;Anti-obesity medication<br>
												<?php } ?>
											</span>
											
											<span class="sub-panel-record_field">
												<i class="icon-remove-sign"></i>&nbsp;TODO: BMI below 20<br>
											</span>
																	
											<span class="sub-panel-record_field">
												<?php if($medical[0]->cancer_and_treatment){ ?>
												<i class="icon-ok-sign"></i>&nbsp;Cancer and having treatment<br>
												<?php }else{ ?>
												<i class="icon-remove-sign"></i>&nbsp;Cancer and having treatment<br>
												<?php } ?>
											</span>
											
											<span class="sub-panel-record_field">
												<?php if($medical[0]->heart_or_stroke){ ?>
												<i class="icon-ok-sign"></i>&nbsp;Heart attack or stroke (within the last three months)<br>
												<?php }else{ ?>
												<i class="icon-remove-sign"></i>&nbsp;Heart attack or stroke (within the last three months)<br>
												<?php } ?>
											</span>
											
											<span class="sub-panel-record_field">
												<?php if($medical[0]->maoi_medication){ ?>
												<i class="icon-ok-sign"></i>&nbsp;MAOI medication (monoamine oxidase inhibitors)<br>
												<?php }else{ ?>
												<i class="icon-remove-sign"></i>&nbsp;MAOI medication (monoamine oxidase inhibitors)<br>
												<?php } ?>
											</span>
											
											<span class="sub-panel-record_field">
												<?php if($medical[0]->pregnant){ ?>
												<i class="icon-ok-sign"></i>&nbsp;Pregnant, breastfeeding or given birth in the last three months<br>
												<?php }else{ ?>
												<i class="icon-remove-sign"></i>&nbsp;Pregnant, breastfeeding or given birth in the last three months<br>
												<?php } ?>
											</span>
											
											<span class="sub-panel-record_field">
												<?php if($medical[0]->substance_misuse){ ?>
												<i class="icon-ok-sign"></i>&nbsp;Substance misuser<br>
												<?php }else{ ?>
												<i class="icon-remove-sign"></i>&nbsp;Substance misuser<br>
												<?php } ?>
											</span>
											
											<span class="sub-panel-record_field">
												<?php if($medical[0]->younger_than_14){ ?>
												<i class="icon-ok-sign"></i>&nbsp;Younger than 14 years<br>
												<?php }else{ ?>
												<i class="icon-remove-sign"></i>&nbsp;Younger than 14 years<br>
												<?php } ?>
											</span>
										</div>
										
										<h4 style="background-color: #FF7B2F; color: #FFFFFF; padding: 5px">ACTION - GP signature required</h4><br>
										<h5 style="background-color: #FFAD79; color: #FFFFFF; padding: 5px">Once you have GPs signature the Step is dependent on the condition, see below.Step 2 and above is suitable for:</h5>
										
										<div style="color: #FF7B2F; padding: 5px;">
											<h5>Step 2 and above is suitable for:</h5>

											<span class="sub-panel-record_field">
												<?php if($medical[0]->diabetes_insipidus){ ?>
												<i class="icon-ok-sign"></i>&nbsp;Diabetes insipidus<br>
												<?php }else{ ?>
												<i class="icon-remove-sign"></i>&nbsp;Diabetes insipidus<br>
												<?php } ?>
											</span>
											
											<span class="sub-panel-record_field">
												<?php if($medical[0]->psoriasis_medication){ ?>
												<i class="icon-ok-sign"></i>&nbsp;Psoriasis treated with tablet or injection<br>
												<?php }else{ ?>
												<i class="icon-remove-sign"></i>&nbsp;Psoriasis treated with tablet or injection<br>
												<?php } ?>
											</span>
											
											<span class="sub-panel-record_field">
												<?php if($medical[0]->rheumatoid_medication){ ?>
												<i class="icon-ok-sign"></i>&nbsp;Rheumatoid arthritis treated with medication<br>
												<?php }else{ ?>
												<i class="icon-remove-sign"></i>&nbsp;Rheumatoid arthritis treated with medication<br>
												<?php } ?>
											</span>
																	
											<h5>Step 3 and above is suitable for:</h5>
											
											<span class="sub-panel-record_field">
												<?php if($medical[0]->rheumatoid_medication){ ?>
												<i class="icon-ok-sign"></i>&nbsp;Rheumatoid arthritis treated with medication<br>
												<?php }else{ ?>
												<i class="icon-remove-sign"></i>&nbsp;Rheumatoid arthritis treated with medication<br>
												<?php } ?>
											</span>
																	
											<span class="sub-panel-record_field">
												<?php if($medical[0]->angina){ ?>
												<i class="icon-ok-sign"></i>&nbsp;Angina<br>
												<?php }else{ ?>
												<i class="icon-remove-sign"></i>&nbsp;Angina<br>
												<?php } ?>
											</span>
																	
											<span class="sub-panel-record_field">
												<?php if($medical[0]->female_bmi50){ ?>
												<i class="icon-ok-sign"></i>&nbsp;Female with BMI 50 and above<br>
												<?php }else{ ?>
												<i class="icon-remove-sign"></i>&nbsp;Female with BMI 50 and above<br>
												<?php } ?>
											</span>
																	
											<h5>Step 4 and above is suitable for:</h5>

											<span class="sub-panel-record_field">
												<?php if($medical[0]->arrhythmia){ ?>
												<i class="icon-ok-sign"></i>&nbsp;Arrhythmia<br>
												<?php }else{ ?>
												<i class="icon-remove-sign"></i>&nbsp;Arrhythmia<br>
												<?php } ?>
											</span>
											
											<span class="sub-panel-record_field">
												<?php if($medical[0]->male_bmi50){ ?>
												<i class="icon-ok-sign"></i>&nbsp;Male with BMI 50 and above<br>
												<?php }else{ ?>
												<i class="icon-remove-sign"></i>&nbsp;Male with BMI 50 and above<br>
												<?php } ?>
											</span>	
										</div>
									</div>
								</div>
								<div class="span4">
									<div class="sub-panel-record-field-edit">
										<h4>Complete a Medical Enquiry Form online (MEF) for advice on a suitable Step for:</h4><br>
										<div style="color: #FF7B2F; padding: 5px;">
										
											<span class="sub-panel-record_field">
												<?php if($medical[0]->adolescent){ ?>
												<i class="icon-ok-sign"></i>&nbsp;Adolescent (14 up to 18 years)<br>
												<?php }else{ ?>
												<i class="icon-remove-sign"></i>&nbsp;Adolescent (14 up to 18 years)<br>
												<?php } ?>
											</span>						

											<span class="sub-panel-record_field">
												<?php if($medical[0]->bmi60){ ?>
												<i class="icon-ok-sign"></i>&nbsp;BMI 60 and above<br>
												<?php }else{ ?>
												<i class="icon-remove-sign"></i>&nbsp;BMI 60 and above<br>
												<?php } ?>
											</span>						
											
											<span class="sub-panel-record_field">
												<?php if($medical[0]->diabetes){ ?>
												<i class="icon-ok-sign"></i>&nbsp;Diabetes: Type 1 and 2<br>
												<?php }else{ ?>
												<i class="icon-remove-sign"></i>&nbsp;Diabetes: Type 1 and 2<br>
												<?php } ?>
											</span>						
											
											<span class="sub-panel-record_field">
												<?php if($medical[0]->epilepsy){ ?>
												<i class="icon-ok-sign"></i>&nbsp;Epilepsy<br>
												<?php }else{ ?>
												<i class="icon-remove-sign"></i>&nbsp;Epilepsy<br>
												<?php } ?>
											</span>						
											
											<span class="sub-panel-record_field">
												<?php if($medical[0]->gastric_surgery){ ?>
												<i class="icon-ok-sign"></i>&nbsp;Gastric surgical procedures<br>
												<?php }else{ ?>
												<i class="icon-remove-sign"></i>&nbsp;Gastric surgical procedures<br>
												<?php } ?>
											</span>						
											
											<span class="sub-panel-record_field">
												<?php if($medical[0]->heart_conditions){ ?>
												<i class="icon-ok-sign"></i>&nbsp;Heart conditions<br>
												<?php }else{ ?>
												<i class="icon-remove-sign"></i>&nbsp;Heart conditions<br>
												<?php } ?>
											</span>						

											<span class="sub-panel-record_field">
												<?php if($medical[0]->kidney_disease){ ?>
												<i class="icon-ok-sign"></i>&nbsp;Kidney disease/failure<br>
												<?php }else{ ?>
												<i class="icon-remove-sign"></i>&nbsp;Kidney disease/failure<br>
												<?php } ?>
											</span>						

											<span class="sub-panel-record_field">
												<?php if($medical[0]->mental_health_disorder){ ?>
												<i class="icon-ok-sign"></i>&nbsp;Mental health disorders (including eating disorders)<br>
												<?php }else{ ?>
												<i class="icon-remove-sign"></i>&nbsp;Mental health disorders (including eating disorders)<br>
												<?php } ?>
											</span>						

											<span class="sub-panel-record_field">
												<?php if($medical[0]->porphyria){ ?>
												<i class="icon-ok-sign"></i>&nbsp;Porphyria<br>
												<?php }else{ ?>
												<i class="icon-remove-sign"></i>&nbsp;Porphyria<br>
												<?php } ?>
											</span>						
										</div>
										
										<h4 style="background-color: #FFA942; color: #FFFFFF; padding: 5px">CAUTION<br> - SEND A MONITORING LETTER</h4><br>
										<h4 style="background-color: #FFCA88; color: #FFFFFF; padding: 5px">A monitoring letter must be sent to GP, and then the Step is dependent on the condition, see below.</h4><br>

										<div style="color: #FFA942; padding: 5px;">
											<h5>Any Step is suitable for:</h5>
											<span class="sub-panel-record_field">
												<?php if($medical[0]->diet_controlled_diabetes){ ?>
												<i class="icon-ok-sign"></i>&nbsp;Diet controlled diabetes<br>
												<?php }else{ ?>
												<i class="icon-remove-sign"></i>&nbsp;Diet controlled diabetes<br>
												<?php } ?>
											</span>						
											
											<span class="sub-panel-record_field">
												<?php if($medical[0]->diuretics){ ?>
												<i class="icon-ok-sign"></i>&nbsp;Diuretics<br>
												<?php }else{ ?>
												<i class="icon-remove-sign"></i>&nbsp;Diuretics<br>
												<?php } ?>
											</span>						
											
											<span class="sub-panel-record_field">
												<?php if($medical[0]->hypertension){ ?>
												<i class="icon-ok-sign"></i>&nbsp;Hypertension<br>
												<?php }else{ ?>
												<i class="icon-remove-sign"></i>&nbsp;Hypertension<br>
												<?php } ?>
											</span>						
											
											<span class="sub-panel-record_field">
												<?php if($medical[0]->lipid_medication){ ?>
												<i class="icon-ok-sign"></i>&nbsp;Lipid medication<br>
												<?php }else{ ?>
												<i class="icon-remove-sign"></i>&nbsp;Lipid medication<br>
												<?php } ?>
											</span>						
											
											<span class="sub-panel-record_field">
												<?php if($medical[0]->thyroid_medication){ ?>
												<i class="icon-ok-sign"></i>&nbsp;Thyroid medication<br>
												<?php }else{ ?>
												<i class="icon-remove-sign"></i>&nbsp;Thyroid medication<br>
												<?php } ?>
											</span>						

											<h5>Step 2 and above is suitable for:</h5>

											<span class="sub-panel-record_field">
												<?php if($medical[0]->gout){ ?>
												<i class="icon-ok-sign"></i>&nbsp;Gout<br>
												<?php }else{ ?>
												<i class="icon-remove-sign"></i>&nbsp;Gout<br>
												<?php } ?>
											</span>						

											<span class="sub-panel-record_field">
												<?php if($medical[0]->female_bmi40){ ?>
												<i class="icon-ok-sign"></i>&nbsp;Female with BMI 40-49.9<br>
												<?php }else{ ?>
												<i class="icon-remove-sign"></i>&nbsp;Female with BMI 40-49.9<br>
												<?php } ?>
											</span>						

											<h5>Step 3 and above is suitable for:</h5>

											<span class="sub-panel-record_field">
												<?php if($medical[0]->male_bmi40){ ?>
												<i class="icon-ok-sign"></i>&nbsp;Male with BMI 40-49.9<br>
												<?php }else{ ?>
												<i class="icon-remove-sign"></i>&nbsp;Male with BMI 40-49.9<br>
												<?php } ?>
											</span>						

											<h5>Step 4 and above is suitable for:</h5>

											<span class="sub-panel-record_field">
												<?php if($medical[0]->fertility_medication){ ?>
												<i class="icon-ok-sign"></i>&nbsp;Fertility medication<br>
												<?php }else{ ?>
												<i class="icon-remove-sign"></i>&nbsp;Fertility medication<br>
												<?php } ?>
											</span>		
										</div>
									</div>
								</div>
								<div class="span4">
									<div class="sub-panel-record-field-edit">
										<h4 style="background-color: #008164; color: #FFFFFF; padding: 5px;">NO GP SIGNATURE OR MONITORING LETTER IS NEEDED</h4><br>
										<h4 style="background-color: #50AD98; color: #FFFFFF; padding: 5px;">No GP signature or monitoring letter is required, but the Step is dependent on the condition, see below.</h4><br>
										<div style="color: #008164; padding: 5px;">
											<h5>Step 2 and above is suitable for:</h5><br>

											<span class="sub-panel-record_field">
												<?php if($medical[0]->anaemia){ ?>
												<i class="icon-ok-sign"></i>&nbsp;Anaemia<br>
												<?php }else{ ?>
												<i class="icon-remove-sign"></i>&nbsp;Anaemia<br>
												<?php } ?>
											</span>						

											<span class="sub-panel-record_field">
												<?php if($medical[0]->antibiotic_medication){ ?>
												<i class="icon-ok-sign"></i>&nbsp;Antibiotic medication<br>
												<?php }else{ ?>
												<i class="icon-remove-sign"></i>&nbsp;Antibiotic medication<br>
												<?php } ?>
											</span>						

											<span class="sub-panel-record_field">
												<?php if($medical[0]->constipation){ ?>
												<i class="icon-ok-sign"></i>&nbsp;Constipation<br>
												<?php }else{ ?>
												<i class="icon-remove-sign"></i>&nbsp;Constipation<br>
												<?php } ?>
											</span>						

											<span class="sub-panel-record_field">
												<?php if($medical[0]->crohns_disease){ ?>
												<i class="icon-ok-sign"></i>&nbsp;Crohn's disease<br>
												<?php }else{ ?>
												<i class="icon-remove-sign"></i>&nbsp;Crohn's disease<br>
												<?php } ?>
											</span>						

											<span class="sub-panel-record_field">
												<?php if($medical[0]->diverticular_disease){ ?>
												<i class="icon-ok-sign"></i>&nbsp;Diverticular disease<br>
												<?php }else{ ?>
												<i class="icon-remove-sign"></i>&nbsp;Diverticular disease<br>
												<?php } ?>
											</span>						

											<span class="sub-panel-record_field">
												<?php if($medical[0]->gall_stones){ ?>
												<i class="icon-ok-sign"></i>&nbsp;Gall stones<br>
												<?php }else{ ?>
												<i class="icon-remove-sign"></i>&nbsp;Gall stones<br>
												<?php } ?>
											</span>						

											<span class="sub-panel-record_field">
												<?php if($medical[0]->pain_relief){ ?>
												<i class="icon-ok-sign"></i>&nbsp;Pain relief (moderate to strong)<br>
												<?php }else{ ?>
												<i class="icon-remove-sign"></i>&nbsp;Pain relief (moderate to strong)<br>
												<?php } ?>
											</span>						

											<span class="sub-panel-record_field">
												<?php if($medical[0]->ulcerative_colitis){ ?>
												<i class="icon-ok-sign"></i>&nbsp;Ulcerative Colitis<br>
												<?php }else{ ?>
												<i class="icon-remove-sign"></i>&nbsp;Ulcerative Colitis<br>
												<?php } ?>
											</span>						

											<span class="sub-panel-record_field">
												<?php if($medical[0]->vertigo){ ?>
												<i class="icon-ok-sign"></i>&nbsp;Vertigo<br>
												<?php }else{ ?>
												<i class="icon-remove-sign"></i>&nbsp;Vertigo<br>
												<?php } ?>
											</span>						

											<h5>Step 3 and above is suitable for:</h5><br>

											<span class="sub-panel-record_field">
												<?php if($medical[0]->champix){ ?>
												<i class="icon-ok-sign"></i>&nbsp;Champix<br>
												<?php }else{ ?>
												<i class="icon-remove-sign"></i>&nbsp;Champix<br>
												<?php } ?>
											</span>						

											<span class="sub-panel-record_field">
												<?php if($medical[0]->gastric_ulcer){ ?>
												<i class="icon-ok-sign"></i>&nbsp;Gastric ulcer<br>
												<?php }else{ ?>
												<i class="icon-remove-sign"></i>&nbsp;Gastric ulcer<br>
												<?php } ?>
											</span>						

											<span class="sub-panel-record_field">
												<?php if($medical[0]->kidney_stones){ ?>
												<i class="icon-ok-sign"></i>&nbsp;Kidney stones<br>
												<?php }else{ ?>
												<i class="icon-remove-sign"></i>&nbsp;Kidney stones<br>
												<?php } ?>
											</span>						
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="accordion-group">
						<div class="accordion-heading" style="background-color: #CCCCCC;">
							<div class="row-fluid">
								<div class="span12">
									<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseWeightRecord">
										<h2 class="sub-panel" style="color: #FFFFFF">Weight Record</h2>
									</a>
								</div>
							</div>
						</div>
						<div id="collapseWeightRecord" class="accordion-body collapse">
							<div class="accordion-inner">
							<div class="row-fluid">
								<div class="span12">
									<h2 class="sub-panel" style="width: 200px;"><?php echo $query[0]->firstname; ?>&nbsp;<?php echo $query[0]->surname; ?></h2><a class="sub-panel" href="/consultant/clients/edit/<?php echo $query[0]->client_id;?>">Edit Record&nbsp;<i class="icon-pencil"></i></a>
								</div>
							</div>

							<div class="row-fluid" style="border-top: 1px solid #CCCCCC;">
								<div class="span4">
									<div class="sub-panel-record-field">
										<label class="sub-panel-record-field"> Address </label>
										<span class="sub-panel-record-field">
											<?php echo $query[0]->address1; ?><br>
											<?php echo $query[0]->address2; ?><br>
											<?php echo $query[0]->town; ?><br>
											<?php echo $query[0]->county; ?><br>
											<?php echo $query[0]->postcode; ?><br>
											<?php echo $query[0]->country; ?>
										</span>
									</div>
								</div>
								<div class="span4">
									<div class="sub-panel-record-field">
										<label class="sub-panel-record-field"> Mobile Phone </label>
										<span class="sub-panel-record-field"><?php echo $query[0]->telephone1; ?></span>
									</div>
									<div class="sub-panel-record-field">
										<label class="sub-panel-record-field"> Home Phone </label>
										<span class="sub-panel-record-field"><?php echo $query[0]->telephone2; ?></span>
									</div>
									<div class="sub-panel-record-field first">
										<a href="mailto:<?php echo $query[0]->email1; ?>"><?php echo $query[0]->email1; ?></a>
									</div>

									<div class="sub-panel-record-field first">
										<label class="sub-panel-record-field"> Gender </label>
										<span class="sub-panel-record-field"><?php echo $query[0]->gender; ?></span>
									</div>

									<div class="sub-panel-record-field first">
										<label class="sub-panel-record-field"> Date Of Birth </label>
										<span class="sub-panel-record-field">
											<?php 
												sscanf($query[0]->date_of_birth,"%d-%d-%d", $year_dob, $month_dob, $day_dob);
												echo $day_dob."/".$month_dob."/".$year_dob;
											?>
										</span>
									</div>
									
									<div class="sub-panel-record-field first">
										<label class="sub-panel-record-field"> Age </label>
										<span class="sub-panel-record-field">
											<?php
											$dob_date = new DateTime($year_dob."-".$month_dob."-".$day_dob);
											$now = getdate();
											$now_date = new DateTime($now['year']."-".$now['mon']."-".$now['mday']);
											$interval = $now_date->diff($dob_date);
											echo $interval->y; 
											?>
										</span>
									</div>						
								</div>
								<div class="span4">
									<div class="sub-panel-record-field first">
										<label class="sub-panel-record-field"> Height </label><br>
									</div>
									<div class="sub-panel-record-field first">
										<span class="sub-panel-record-field" style="width: 80px; float: left;"><?php echo $query[0]->height; ?> cm</span>
										<span class="sub-panel-record-field" style="width: 80px; float: left;"><?php printf("%d", $query[0]->height/2.54); ?> in</span>
									</div>
									<div class="sub-panel-record-field first">
										<label class="sub-panel-record-field"> Waist </label><br>
									</div>
									<div class="sub-panel-record-field first">
										<span class="sub-panel-record-field" style="width: 80px; float: left;"><?php echo $query[0]->waist; ?> cm</span>
										<span class="sub-panel-record-field" style="width: 80px; float: left;"><?php printf("%d", $query[0]->waist/2.54); ?> in</span>
									</div>
									<div class="sub-panel-record-field first">
										<label class="sub-panel-record-field"> Start Weight </label><br>
									</div>
									<div class="sub-panel-record-field first">
										<span class="sub-panel-record-field" style="width: 80px; float: left;"><?php echo $query[0]->start_weight; ?> kg</span>
										<span class="sub-panel-record-field" style="width: 80px; float: left;"><?php printf("%d", $query[0]->start_weight*2.205); ?> lb</span>
									</div>						
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
