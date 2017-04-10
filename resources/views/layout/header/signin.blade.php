<li class="dropdown pull-right">
	<a class="dropdown-toggle"
	   data-toggle="dropdown"
	   href="#"
	   id="signin-dropdown">
		Login
		<strong class="caret"></strong>
	</a>
	<ul class="dropdown-menu signin-form">
		<li>								
			<form role="form" id="signin-form" method="POST">
				<div class="form-group">
					<label for="signin-uname">Username</label>
					<input type="text"
						class="form-control"
						name="signin_uname" 
						id="signin-uname"
						placeholder="Username"
						required>
					<label for="signin-pword">Password</label>
					<input type="password"
						class="form-control"
						name="signin_pword" 
						id="signin-pword"
						placeholder="Password"
						required>
				</div>
				<div class="text-center">
					<button type="submit" name="signin_submit" class="btn btn-success">Sign in</button>
					<span>or</span>
					<a href="register" class="btn btn-link">Register</a>										
				</div>
				<div id="signin-msg-holder"></div>
			</form>
		</li>
	</ul>
</li>
