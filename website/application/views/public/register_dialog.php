    <!-- Modal Register Form -->
    <div class="modal hide fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Register with Coord</h3>
        </div>
        <form action="/consultant/home/register" class="form-horizontal" method="post">
            <div class="modal-body">
                <div class="control-group">
					<label class="control-label" for="name">Username</label>
					<div class="controls">
						<a href="#" rel="popover" title="Username" data-content="Enter a username you will use to sign in" data-original-title="Username"><input type="text" id="username" placeholder="Username" name="username" ></a>
					</div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="email">Email</label>
                    <div class="controls">
                        <a href="#" rel="popover" title="Email" data-content="Enter your email address" data-original-title="Email"><input type="text" id="email" placeholder="Email" name="email"></a>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="name">Firstname</label>
                    <div class="controls">
                        <a href="#" rel="popover" title="Firstname" data-content="Enter your firstame" data-original-title="Firstname"><input type="text" id="firstname" placeholder="Firstname" name="firstname"></a>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="name">Surname</label>
                    <div class="controls">
                        <a href="#" rel="popover" title="Surname" data-content="Enter your family name" data-original-title="Surname"><input type="text" id="surname" placeholder="Surname" name="surname"></a>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="password">Password</label>
                    <div class="controls">
                        <a href="#" rel="popover" title="Password" data-content="Enter a password" data-original-title="Password"><input type="text" id="password" placeholder="Password" name="password"></a>
                    </div>
                </div>

                <input type="hidden" id="password" placeholder="Password">

            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                <button type="submit" class="btn btn-primary">Register</button>
            </div>
        </form>
    </div>
