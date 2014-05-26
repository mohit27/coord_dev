	<div class="panel">
		<a href="/consultant/home">Home</a> >

			<div class="row-fluid">
				<div class="span12">
					<h2 class="sub-panel" style="width: 200px;"><?php echo $user['firstname']; ?>&nbsp;<?php echo $user['surname']; ?></h2><a class="sub-panel" href="/consultant/settings/mydetails_edit">Edit My Details&nbsp;<i class="icon-pencil"></i></a>
				</div>
			</div>
				
			<div class="row-fluid" style="border-top: 1px solid #CCCCCC;">
				<div class="span4">
					<div class="sub-panel-record-field">
						<label class="sub-panel-record-field"> Address </label>
						<span class="sub-panel-record-field">
							<?php echo $user['address1']; ?><br>
							<?php echo $user['address2']; ?><br>
							<?php echo $user['town']; ?><br>
							<?php echo $user['county']; ?><br>
							<?php echo $user['postcode']; ?><br>
							<?php echo $user['country']; ?>
						</span>
					</div>
				</div>
				<div class="span4">
					<div class="sub-panel-record-field">
						<label class="sub-panel-record-field"> Mobile Phone </label>
						<span class="sub-panel-record-field"><?php echo $user['telephone1']; ?></span>
					</div>
					<div class="sub-panel-record-field">
						<label class="sub-panel-record-field"> Home Phone </label>
						<span class="sub-panel-record-field"><?php echo $user['telephone2']; ?></span>
					</div>
					<div class="sub-panel-record-field first">
						<a href="mailto:<?php echo $user['email1']; ?>"><?php echo $user['email1']; ?></a>
					</div>

				</div>
				<div class="span4">
					<div class="sub-panel-record-field">
						<label class="sub-panel-record-field"> Metric/Imperial Preference</label>
						<?php if($user['pref_imp_metric']=="metric"){ ?>
							<span class="sub-panel-record-field">Metric&nbsp;</span>
						<?php }else{ ?>
							<span class="sub-panel-record-field">Imperial&nbsp;</span>
						<?php } ?>
					</div>

				</div>
				
			</div>
		</div><!--span8-->
	</div><!--container-->
				
