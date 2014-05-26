	<div class="panel">
		<div class="container-fluid">
			<div class="row-fluid">
				<div class="span12">
					<h2 class="sub-panel">Status Panel</h2>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span4" style="border-style: solid; border-color: #CCCCCC; border-width: 1px;">
					<h4 class="sub-panel" style="color: #FFFFFF; background-color: #CCCCCC; padding: 5px;">Contacts</h4>
					<?php
						$total_contacts = 0;
						foreach($contacts as $entry)
						{
							$total_contacts += $entry->count;
						}
					?>
					<div style="padding: 5px">
						<h4>You have <?php echo $total_contacts; ?> total contacts of which:</h4>
						<ul>
						<?php			
							foreach($contacts as $entry)
							{
								if($entry->count==1)
								{
									echo "<li><h5>".$entry->count." is a ".$entry->grouping."</h5></li>\n";
								}
								else
								{
									echo "<li><h5>".$entry->count." are ".$entry->grouping."</h5></li>\n";
								}
							}
						?>
						</ul>
					</div>
				</div>
				<div class="span4" style="border-style: solid; border-color: #CCCCCC; border-width: 1px;">
					<h4 class="sub-panel" style="color: #FFFFFF; background-color: #CCCCCC; padding: 5px;">Appointments</h4>
					<div style="padding: 5px">
						Information about our contacts
					</div>
				</div>
				<div class="span4" style="border-style: solid; border-color: #CCCCCC; border-width: 1px;">
					<h4 class="sub-panel" style="color: #FFFFFF; background-color: #CCCCCC; padding: 5px;">Stock</h4>
					<div style="padding: 5px">
						Information about our contacts
					</div>
				</div>
			</div>
		</div>
	</div>
