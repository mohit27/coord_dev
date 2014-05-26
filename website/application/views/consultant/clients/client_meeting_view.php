	<script type="text/javascript">
		window.onload = function () {
		var chart = new CanvasJS.Chart("chartContainer",
		{
				title:{
					text: "Measurements"
				},
				animationEnabled: true,
				zoomEnabled: true,
				legend: {
					horizontalAlign: "right",
					verticalAlign: "center"
					},
				data: [
					{
						type: "line",
						showInLegend: true,
						legendText: "Weight",
						toolTipContent: "{x}<br/><strong>{y}</strong> kg",
						axisYType: "primary",
						dataPoints: [
							<?php
								foreach($measurements as $row)
								{
									sscanf($row->time,"%d-%d-%d", $year, $month, $day);
									echo "{ x: new Date(".$year.", ".$month.", ".$day."), y: ".$row->weight." },\n";
								}
							?>
						]
					},
					{
						type: "line",
						showInLegend: true,
						legendText: "Waist",
						toolTipContent: "{x}<br/><strong>{y}</strong> cm",
						axisYType: "secondary",
						dataPoints: [
							<?php
								foreach($measurements as $row)
								{
									sscanf($row->time,"%d-%d-%d", $year, $month, $day);
									echo "{ x: new Date(".$year.", ".$month.", ".$day."), y: ".$row->waist." },\n";
								}
							?>
						]
					},
					{
						type: "line",
						showInLegend: true,
						legendText: "Thigh",
						toolTipContent: "{x}<br/><strong>{y}</strong> cm",
						dataPoints: [
							<?php
								foreach($measurements as $row)
								{
									sscanf($row->time,"%d-%d-%d", $year, $month, $day);
									echo "{ x: new Date(".$year.", ".$month.", ".$day."), y: ".$row->thigh." },\n";
								}
							?>
						]
					},
					{
						type: "line",
						showInLegend: true,
						legendText: "Arm",
						toolTipContent: "{x}<br/><strong>{y}</strong> cm",
						dataPoints: [
							<?php
								foreach($measurements as $row)
								{
									sscanf($row->time,"%d-%d-%d", $year, $month, $day);
									echo "{ x: new Date(".$year.", ".$month.", ".$day."), y: ".$row->arm." },\n";
								}
							?>
						]
					},
					{
						type: "line",
						showInLegend: true,
						legendText: "Stomach",
						toolTipContent: "{x}<br/><strong>{y}</strong> cm",
						dataPoints: [
							<?php
								foreach($measurements as $row)
								{
									sscanf($row->time,"%d-%d-%d", $year, $month, $day);
									echo "{ x: new Date(".$year.", ".$month.", ".$day."), y: ".$row->stomach." },\n";
								}
							?>
						]
					},
					{
						type: "line",
						showInLegend: true,
						legendText: "Neck",
						toolTipContent: "{x}<br/><strong>{y}</strong> cm",
						dataPoints: [
							<?php
								foreach($measurements as $row)
								{
									sscanf($row->time,"%d-%d-%d", $year, $month, $day);
									echo "{ x: new Date(".$year.", ".$month.", ".$day."), y: ".$row->neck." },\n";
								}
							?>
						]
					},
					{
						type: "line",
						showInLegend: true,
						legendText: "Chest",
						toolTipContent: "{x}<br/><strong>{y}</strong> cm",
						dataPoints: [
							<?php
								foreach($measurements as $row)
								{
									sscanf($row->time,"%d-%d-%d", $year, $month, $day);
									echo "{ x: new Date(".$year.", ".$month.", ".$day."), y: ".$row->chest." },\n";
								}
							?>
						]
					}
				]
			});

			chart.render();
		}
	</script>
	<?php
//		var_dump($measurements);
	?>
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

							<div class="row-fluid" style="border-top: 1px solid #CCCCCC;">
								<!-- Client Id Information -->
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
								<div class="span8">
									<!-- Graph Of Weight Loss -->
									<div id="chartContainer" style="height: 300px; width: 100%;"></div>									
								</div>
								<div class="span4">
									<!-- Table of Weight Loss Data -->
								</div>
							</div>		
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
