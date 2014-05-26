
	<div class="panel">
		<a href="/consultant/clients">Contacts</a> > <a href="/consultant/clients/view/<?php echo $query[0]->client_id;?>">View</a>
		<div class="container-fluid sub-panel-edit">
			<div class="accordion" id="accordion2">

				<!-- Contact Information -->
				<div class="accordion-group">
					<div class="accordion-heading" style="background-color: #CCCCCC;">
						<div class="row-fluid">
							<div class="span12">
								<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseContact">
									<h2 class="sub-panel" style="color: #FFFFFF;">Appointment With: <?php echo $query[0]->firstname; ?>&nbsp;<?php echo $query[0]->surname; ?></h2>
								</a>
							</div>
						</div>
					</div>
					<div id="collapseContact" class="accordion-body collapse in">
						<div class="accordion-inner">
							<div class="row-fluid">
								<div class="span12">
									<h2 class="sub-panel" style="width: 200px;"><?php echo $query[0]->firstname; ?>&nbsp;<?php echo $query[0]->surname; ?></h2>
								</div>
							</div>

							<form  action="/consultant/clients/meeting_view/<?php echo $query[0]->client_id; ?>" method="post">
							
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
										<div class="sub-panel-record-field">
											<label class="sub-panel-record-field"> Mobile Phone </label>
											<span class="sub-panel-record-field"><?php echo $query[0]->telephone1; ?></span>
										</div>
										<div class="sub-panel-record-field">
											<label class="sub-panel-record-field"> Home Phone </label>
											<span class="sub-panel-record-field"><?php echo $query[0]->telephone2; ?></span>
										</div>
									</div>
									<div class="span4">
										<div class="sub-panel-record-field-edit">
											<label class="sub-panel-record-field-edit" style="float: left; width: 110px;" for="weight">Weight
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
											<input class="sub-panel-record-field-edit" id="weight" type="text" value="" maxlength="255" name="weight" autocomplete="off">
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
											<label class="sub-panel-record-field-edit" style="float: left; width: 110px;" for="thigh">Thigh
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
											<input class="sub-panel-record-field-edit" id="thigh" type="text" value="" maxlength="255" name="thigh" autocomplete="off">
										</div>
										<div class="sub-panel-record-field-edit">
											<label class="sub-panel-record-field-edit" style="float: left; width: 110px;" for="arm">Arm
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
											<input class="sub-panel-record-field-edit" id="arm" type="text" value="" maxlength="255" name="arm" autocomplete="off">
										</div>
									</div>
									<div class="span4">
										<div class="sub-panel-record-field-edit">
											<label class="sub-panel-record-field-edit" style="float: left; width: 110px;" for="arm">Notes</label>
											<textarea class="sub-panel-record-field-edit" rows="8" style="height: 170px;" id="notes" maxlength="255" name="notes"></textarea>
										</div>
									</div>
								</div>		
								<div class="row-fluid" style="border-top: 1px solid #CCCCCC; padding-top: 5px;">
									<div class="span12">
										<input class="btn" style="float: right; width: 60px;" type="reset" name="cancel" value="Cancel">
										<input class="btn" style="float: right; width: 60px;" type="submit" name="enter" value="Enter">
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
