<div class="sidebar" data-color="rose" data-background-color="white" data-image="{{asset('adminDesign/img/sidebar-1.jpg')}}">
	<div class="logo">
		<a href="" class="simple-text logo-mini">CT</a><a href="{{ url('/admin') }}" class="simple-text logo-normal">Developer</a>
	</div>
	<div class="sidebar-wrapper">
		<div class="user">
			<div class="photo"><img src="/Uploads/Admin_Profile/{{Auth::guard('admin')->user()->avatar}}" /></div>
			<div class="user-info">
				<a data-toggle="collapse" href="#collapseExample" class="username">
					<span>
						@if(Auth::guard('admin')->check())
	                        {{Auth::guard('admin')->user()->name}}
	                    @endif
						<b class="caret"></b>
					</span>
				</a>
				<div class="collapse" id="collapseExample">
					<ul class="nav">
						<li class="nav-item">
							<a class="nav-link" href="#"><i class="material-icons">person</i><p> My Profile </p></a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#"><i class="material-icons">create</i><p> Edit Profile </p></a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<ul class="nav">
			<li class="nav-item active ">
				<a class="nav-link" href="{{ url('/admin') }}"><i class="material-icons">dashboard</i><p> Dashboard </p></a>
			</li>
			<li class="nav-item ">
				<a class="nav-link" href="{{ url('/admin/category') }}"><i class="material-icons">apps</i><p> Category </p></a></li>
			</li>
			<li class="nav-item ">
				<a class="nav-link" href="{{ url('/admin/exam') }}"><i class="material-icons">assignment</i><p> Exams </p></a></li>
			</li>
			<li class="nav-item ">
				<a class="nav-link" href="{{ url('/admin/course') }}"><i class="material-icons">layers</i><p> Courses </p></a></li>
			</li>
			<li class="nav-item ">
				<a class="nav-link" href="{{ url('/admin/college') }}"><i class="material-icons">layers</i><p> Colleges </p></a></li>
			</li>
		</ul>
	</div>	
</div>