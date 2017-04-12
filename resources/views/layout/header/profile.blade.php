<li class="dropdown pull-right">
	<a class="dropdown-toggle" data-toggle="dropdown" href="#">
		{{ $user_name }}
		<strong class="caret"></strong>
	</a>
	<ul class="dropdown-menu signin-form">
		<li class="text-center">
			<img src="assets/images/avatar.png">
			<h4>{{ $fullname }}</h4>
		</li>
		<li role="separator" class="divider"></li> 
		<li class="profile-sub">
	        <a href="/home">
	          My Dashboard
	        </a>
        </li>
		<li class="profile-sub">
			<a href="#">
				My Profile
			</a>
		</li>
		<li role="separator" class="divider"></li>            				
		<li class="profile-sub">
			<a href="/logout">
				Sign out
			</a>
		</li>
	</ul>
</li>
