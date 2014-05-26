
	<div class="panel">
		<a href="/consultant/home/clients">Contacts</a> >
		
		<div class="container-fluid" style="border-color: #CCCCCC; border-style: solid;">
		
			<div class="row-fluid">
				<div class="span12">
						<h2 class="sub-panel">Successfully imported contact data</h2>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span12" style="border-top: 1px solid #CCCCCC; margin-top: 5px; padding-top: 5px">
					<div>
						<table cellpadding="0" cellspacing="0" width="100%">
							<tr>
								<td>Name</td>
								<td>Town</td>
								<td>County</td>
								<td>Email</td>
								<td>Telephone</td>
							</tr>

							<?php foreach($csvData as $row){?>
								<tr>
									<td><?php echo $row['firstname']." ".$row['surname']; ?></td>
									<td><?php echo $row['town']; ?></td>
									<td><?php echo $row['county']; ?></td>
									<td><?php echo $row['email1']; ?></td>
									<td><?php echo $row['telephone1']; ?></td>
								</tr>
							<?php }?>
						</table>
					</div>
				</div>
			</div>
			
			<div class="row-fluid">
				<div class="span12" style="border-top: 1px solid #CCCCCC; padding-top: 5px; padding-top: 5px">
					<div class="sub-panel-record-field-edit">
						<a class="btn" value="< Continue" href="/consultant/home/clients">< Continue</a>
					</div>					
				</div>
			</div>
		</div>
	</div>
