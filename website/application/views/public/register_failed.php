	<div class="panel" style="padding-top: 60px;">
		<div class="container-fluid">
			<div class="row-fluid">
				<div class="span12">
					<h2 class="sub-panel">Registration Failed</h2>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span12" style="border-style: solid; border-color: #CCCCCC; border-width: 1px;">
					<h4 class="sub-panel" style="color: #FFFFFF; background-color: #CCCCCC; padding: 5px;">Try Again</h4>
					<div style="padding: 5px">
						<form action="/consultant/home/register" class="form-horizontal" method="post">
							<div class="control-group">
								<label class="control-label" for="name">Username</label>
								<div class="controls">
									<input type="text" id="username" placeholder="Username" name="username">
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="email">Email</label>
								<div class="controls">
									<input type="text" id="email" placeholder="Email" name="email">
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="name">Firstname</label>
								<div class="controls">
									<input type="text" id="firstname" placeholder="Firstname" name="firstname">
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="name">Surname</label>
								<div class="controls">
									<input type="text" id="surname" placeholder="Surname" name="surname">
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="password">Password</label>
								<div class="controls">
									<input type="text" id="password" placeholder="Password" name="password">
								</div>
							</div>

							<input type="hidden" id="password" placeholder="Password">
						</div>
					
						<div style="height: 270px; width: 270px;">
							<a class="btn" href="/">Cancel</a>
							<button type="submit" class="btn btn-primary">Register</button>
						</div>					
					</form>
				</div>
			</div>
		</div>
	</div>
