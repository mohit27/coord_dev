<form action="/consultant/settings/mydetails_view" method="post">

	<div class="panel">
		<a href="/consultant/home">Home</a>

		<div class="container-fluid sub-panel-edit">
		
			<div class="accordion" id="accordion2">

				<!-- Contact Information -->
				<div class="accordion-group">
					<div class="accordion-heading" style="background-color: #CCCCCC;">
						<div class="row-fluid">
							<div class="span12">
								<a class="sub-panel" style="width: 200px;">
									<h2 class="sub-panel" style="color: #FFFFFF;">Edit <?php echo $user['firstname']; ?>&nbsp;<?php echo $user['surname']; ?></h2>
								</a>
							</div>
						</div>
					</div>

					<div id="collapseContact" class="accordion-body collapse in">
					<div class="accordion-inner">
				
						<div class="row-fluid">
							<div class="span8">
								<h2 class="sub-panel-edit"><?php echo $user['firstname']; ?>&nbsp;<?php echo $user['surname']; ?></h2>	
							</div>
						</div>
						<div class="row-fluid" style="border-top: 1px solid #CCCCCC;">
							<div class="span8">
								<div style="float: left; padding-right: 10px;">
									<label class="sub-panel-record-field-edit" for="firstname">First Name</label>
									<input class="sub-panel-record-field-edit" id="firstname" type="text" value="<?php echo $user['firstname']; ?>" maxlength="255" name="firstname" autocomplete="off">
								</div>
								<div style="float: left;">
									<label class="sub-panel-record-field-edit" for="surname">Last Name</label>
									<input class="sub-panel-record-field-edit" id="surname" type="text" value="<?php echo $user['surname']; ?>" maxlength="255" name="surname" autocomplete="off">
								</div>
							</div>
						</div>
						<div class="row-fluid" style="border-top: 1px solid #CCCCCC;">
							<div class="span4">
								<div class="sub-panel-record-field-edit">
									<label class="sub-panel-record-field-edit" style="float: left; width: 100px;" for="address1">Address</label>
									<input class="sub-panel-record-field-edit" id="address1" type="text" value="<?php echo $user['address1']; ?>" maxlength="255" name="address1" autocomplete="off">
								</div>
								<div class="sub-panel-record-field-edit">
									<label class="sub-panel-record-field-edit" style="float: left; width: 100px;" for="address2">Address</label>
									<input class="sub-panel-record-field-edit" id="address2" type="text" value="<?php echo $user['address2']; ?>" maxlength="255" name="address2" autocomplete="off">
								</div>
								<div class="sub-panel-record-field-edit">
									<label class="sub-panel-record-field-edit" style="float: left; width: 100px;" for="town">Town/City</label>
									<input class="sub-panel-record-field-edit" id="town" type="text" value="<?php echo $user['town']; ?>" maxlength="255" name="town" autocomplete="off">
								</div>
								<div class="sub-panel-record-field-edit">
									<label class="sub-panel-record-field-edit" style="float: left; width: 100px;" for="county">County</label>
									<input class="sub-panel-record-field-edit" id="county" type="text" value="<?php echo $user['county']; ?>" maxlength="255" name="county" autocomplete="off">
								</div>
								<div class="sub-panel-record-field-edit">
									<label class="sub-panel-record-field-edit" style="float: left; width: 100px;" for="postcode">Postcode</label>
									<input class="sub-panel-record-field-edit" id="postcode" type="text" value="<?php echo $user['postcode']; ?>" maxlength="255" name="postcode" autocomplete="off">
								</div>
								<div class="sub-panel-record-field-edit">
									<label class="sub-panel-record-field-edit" style="float: left; width: 100px;" for="country">Country</label>
									<input class="sub-panel-record-field-edit" id="country" type="text" value="<?php echo $user['country']; ?>" maxlength="255" name="country" autocomplete="off">
								</div>
							</div>
							<div class="span4">
								<div class="sub-panel-record-field-edit">
									<label class="sub-panel-record-field-edit" style="float: left; width: 110px;" for="telephone1">Home Telephone</label>
									<input class="sub-panel-record-field-edit" id="telephone1" type="text" value="<?php echo $user['telephone1']; ?>" maxlength="255" name="telephone1" autocomplete="off">
								</div>
								<div class="sub-panel-record-field-edit">
									<label class="sub-panel-record-field-edit" style="float: left; width: 110px;" for="telephone2">Mobile Telephone</label>
									<input class="sub-panel-record-field-edit" id="telephone2" type="text" value="<?php echo $user['telephone2']; ?>" maxlength="255" name="telephone2" autocomplete="off">
								</div>
								<div class="sub-panel-record-field-edit">
									<label class="sub-panel-record-field-edit" style="float: left; width: 110px;" for="email1">Main Email</label>
									<input class="sub-panel-record-field-edit" id="email1" type="text" value="<?php echo $user['email1']; ?>" maxlength="255" name="email1" autocomplete="off">
								</div>
								<div class="sub-panel-record-field-edit">
									<label class="sub-panel-record-field-edit" style="float: left; width: 110px;" for="email2">Back Email</label>
									<input class="sub-panel-record-field-edit" id="email2" type="text" value="<?php echo $user['email2']; ?>" maxlength="255" name="email2" autocomplete="off">
								</div>
							</div>
							<div class="span4">

								<label class="sub-panel-record-field-edit" style="float: left; width: 110px;" for="grouping">Imperial/Metric</label>
								<select class="sub-panel-record-field-edit" id="pref_imp_metric" name="pref_imp_metric" style="width: 100px" autocomplete="off">
									<option <?php if($user['pref_imp_metric'] == "metric") echo "selected"; ?> >Metric</option>
									<option <?php if($user['pref_imp_metric'] == "imperial") echo "selected"; ?>>Imperial</option>
								</select>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="row-fluid" style="border-top: 1px solid #CCCCCC;">
				<div class="span12">
					<div class="sub-panel-record-field-edit">
						<input class="btn" type="reset" name="cancel" value="Cancel">
						<input class="btn" type="submit" name="submit" value="Submit">
					</div>
				</div>
		</div>
	</div>
</form>
