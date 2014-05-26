
<form action="/consultant/import/contacts" method="post" enctype="multipart/form-data">

	<div class="panel">
		<a href="/consultant/home/clients">Contacts</a> >
		
		<div class="container-fluid" style="border-color: #CCCCCC; border-style: solid;">
		
			<div class="row-fluid">
				<div class="span12">
						<h2 class="sub-panel">Step 1. Download our contacts template file</h2>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span12" style="border-top: 1px solid #CCCCCC; margin-top: 5px; padding-top: 5px">
					<div>
						Start by downloading our contacts CSV (Comma Separated Values) template file. This file has the correct column headings CPA needs to import your contact data.
					</div>
					<div>
						<a href="/templates/contacts.csv">Download template file</a>
					</div>
				</div>
			</div>
			
			<div class="row-fluid">
				<div class="span12">
					<h2 class="sub-panel">Step 2. Copy your contacts into the template</h2>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span12" style="border-top: 1px solid #CCCCCC; margin-top: 5px; padding-top: 5px">
					<div>
						Export your contacts from your old system as a comma separated list. Using Excel or another spreadsheet editor, copy and paste your contacts from the exported file into the CPA template. Make sure the contact data you copy matches the column headings provided in the template.
					</div>
					<div>
						IMPORTANT: Do not change the column headings in the template file. These need to be unchanged for the import to work in the next step.
					</div>
				</div>
			</div>

			<div class="row-fluid">
				<div class="span12">
					<h2 class="sub-panel">Step 3. Import the updated template file</h2>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span12" style="border-top: 1px solid #CCCCCC; margin-top: 5px; padding-top: 5px;">
					<div>
						Choose a file to import
					</div>
					<div>
					    <input type="file" name="userfile" class="filestyle" data-classButton="btn">
					</div>
					<div>
						The file you import must be a CSV (Comma Separated Values) file. The name of your file should end with either .csv or .txt. 
					</div>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span12" style="border-top: 1px solid #CCCCCC; padding-top: 5px; padding-top: 5px">
					<div class="sub-panel-record-field-edit">
						<input class="btn" type="reset" name="cancel" value="Cancel">
						<input class="btn" type="submit" name="upload" value="Upload">
					</div>					
				</div>
			</div>
		</div>
	</div>
</form>