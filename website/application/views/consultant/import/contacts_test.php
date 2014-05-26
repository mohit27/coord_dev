
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
								<?php foreach($csvKeys as $key){?>
									<td width = "10%"><?php echo $key; ?></td>
								<?php }?>
							</tr>

							<?php foreach($csvData as $field){?>
								<tr>
									<?php foreach($field as $value){?>
										<td><?php echo $value; ?></td>
									<?php }?>
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
