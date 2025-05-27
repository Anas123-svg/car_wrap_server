<aside class="app-sidebar sticky" id="sidebar">

	<!-- Start::main-sidebar-header -->
	<div class="main-sidebar-header">
		<a href="{{url('index')}}" class="header-logo">
			<img src="{{asset('build/assets/images/brand/desktop-logo.png')}}" alt="logo" class="desktop-logo">
			<img src="{{asset('build/assets/images/brand/toggle-logo.png')}}" alt="logo" class="toggle-logo">
			<img src="{{asset('build/assets/images/brand/desktop-dark.png')}}" alt="logo" class="desktop-dark">
			<img src="{{asset('build/assets/images/brand/toggle-dark.png')}}" alt="logo" class="toggle-dark">
		</a>
	</div>
	<!-- End::main-sidebar-header -->

	<!-- Start::main-sidebar -->
	<div class="main-sidebar" id="sidebar-scroll">

		<!-- Start::nav -->
		<nav class="main-menu-container nav nav-pills flex-column sub-open">
			<div class="slide-left" id="slide-left">
				<svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24">
					<path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"></path>
				</svg>
			</div>
			<ul class="main-menu">
				<!-- Start::slide__category -->
				<li class="slide__category"><span class="category-name">Main</span></li>
				<!-- End::slide__category -->

				<!-- Start::slide -->
				<li class="slide">
					<a href="{{url('index')}}" class="side-menu__item">
						<svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" height="24px"
							viewBox="0 0 24 24" width="24px" fill="#000000">
							<path d="M0 0h24v24H0V0z" fill="none" />
							<path d="M12 5.69l5 4.5V18h-2v-6H9v6H7v-7.81l5-4.5M12 3L2 12h3v8h6v-6h2v6h6v-8h3L12 3z" />
						</svg>
						<span class="side-menu__label">Dashboard</span>
					</a>
				</li>
				<li class="slide">
					<a href="{{ url('driver_page') }}" class="side-menu__item">
						<svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" height="24px"
							viewBox="0 0 24 24" width="24px" fill="#000000">
							<path d="M0 0h24v24H0V0z" fill="none" />
							<path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5s-3 1.34-3 
            3 1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 
            5s-3 1.34-3 3 1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 
            3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 
            0c-.29 0-.62.02-.97.05 1.16.84 1.97 2.01 
            1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z" />
						</svg>
						<span class="side-menu__label">Drivers</span>
					</a>
				</li>
				<li class="slide">
					<a href="{{ url('campaigns') }}" class="side-menu__item">
						<svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" height="24px"
							viewBox="0 0 24 24" width="24px" fill="#000000">
							<path d="M0 0h24v24H0V0z" fill="none"></path>
							<path
								d="M11 7h6v2h-6zm0 4h6v2h-6zm0 4h6v2h-6zM7 7h2v2H7zm0 4h2v2H7zm0 4h2v2H7zM20.1 3H3.9c-.5 0-.9.4-.9.9v16.2c0 .4.4.9.9.9h16.2c.4 0 .9-.5.9-.9V3.9c0-.5-.5-.9-.9-.9zM19 19H5V5h14v14z">
							</path>
						</svg>
						<span class="side-menu__label">Campaigns</span>
					</a>
				</li>
				<li class="slide">
					<a href="{{ url('admin') }}" class="side-menu__item">
						<svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" height="24" width="24"
							fill="#000000" viewBox="0 0 24 24">
							<path d="M0 0h24v24H0V0z" fill="none" />
							<path
								d="M12 12c2.7 0 5-2.3 5-5s-2.3-5-5-5-5 2.3-5 5 2.3 5 5 5zm0 2c-3.3 0-10 1.7-10 5v3h12.1c-.1-.3-.1-.7-.1-1 0-.3 0-.7.1-1H4v-.2c.3-.9 4-2.8 8-2.8.6 0 1.2.1 1.8.2.6-.6 1.2-1.1 2-1.5-1.3-.5-2.7-.7-3.8-.7zm10 4v1h-1.1c-.1.3-.2.6-.4.8l.8.8-.7.7-.8-.8c-.2.2-.5.3-.8.4V21h-1v-1.1c-.3-.1-.6-.2-.8-.4l-.8.8-.7-.7.8-.8c-.2-.2-.3-.5-.4-.8H15v-1h1.1c.1-.3.2-.6.4-.8l-.8-.8.7-.7.8.8c.2-.2.5-.3.8-.4V15h1v1.1c.3.1.6.2.8.4l.8-.8.7.7-.8.8c.2.2.3.5.4.8H22z" />
						</svg>
						<span class="side-menu__label">Admins</span>
					</a>
				</li>
				<li class="slide">
					<a href="{{ route('admin.settings') }}" class="side-menu__item">
						<svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" height="24" width="24"
							fill="#000000" viewBox="0 0 24 24">
							<path d="M0 0h24v24H0V0z" fill="none" />
							<path
								d="M19.43 12.98c.04-.32.07-.65.07-.98s-.03-.66-.07-.98l2.11-1.65c.19-.15.24-.42.12-.64l-2-3.46c-.12-.22-.39-.3-.61-.22l-2.49 1c-.52-.4-1.08-.73-1.69-.98l-.38-2.65A.488.488 0 0014 2h-4c-.25 0-.46.18-.49.42l-.38 2.65c-.61.25-1.17.58-1.69.98l-2.49-1a.506.506 0 00-.61.22l-2 3.46c-.13.22-.07.5.12.64l2.11 1.65c-.05.32-.08.65-.08.98s.03.66.07.98L2.57 14.63a.5.5 0 00-.12.64l2 3.46c.12.22.39.3.61.22l2.49-1c.52.4 1.08.73 1.69.98l.38 2.65c.03.24.24.42.49.42h4c.25 0 .46-.18.49-.42l.38-2.65c.61-.25 1.17-.58 1.69-.98l2.49 1c.23.09.49 0 .61-.22l2-3.46a.5.5 0 00-.12-.64l-2.11-1.65zM12 15.5c-1.93 0-3.5-1.57-3.5-3.5S10.07 8.5 12 8.5s3.5 1.57 3.5 3.5-1.57 3.5-3.5 3.5z" />
						</svg>
						<span class="side-menu__label">Settings</span>
					</a>
				</li>
<li class="slide">
  <a href="#" class="side-menu__item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
    <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" height="24" width="24" fill="#000000" viewBox="0 0 24 24">
      <path d="M0 0h24v24H0V0z" fill="none"/>
      <path d="M16 13v-2H7V8l-5 4 5 4v-3zM20 3h-8v2h8v14h-8v2h8c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2z"/>
    </svg>
    <span class="side-menu__label">Logout</span>
  </a>

  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
  </form>
</li>


				<!-- End::slide -->

				<!-- Start::slide 
				<li class="slide has-sub">
					<a href="javascript:void(0);" class="side-menu__item">
						<svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" height="24px"
							viewBox="0 0 24 24" width="24px" fill="#000000">
							<path d="M0 0h24v24H0V0z" fill="none"></path>
							<path
								d="M11 7h6v2h-6zm0 4h6v2h-6zm0 4h6v2h-6zM7 7h2v2H7zm0 4h2v2H7zm0 4h2v2H7zM20.1 3H3.9c-.5 0-.9.4-.9.9v16.2c0 .4.4.9.9.9h16.2c.4 0 .9-.5.9-.9V3.9c0-.5-.5-.9-.9-.9zM19 19H5V5h14v14z">
							</path>
						</svg>
						<span class="side-menu__label">Campaigns</span>
						<i class="fe fe-chevron-right side-menu__angle"></i>
					</a>
					<ul class="slide-menu child1">

						<li class="slide">
							<a href=" class="side-menu__item">Manage Campaigns</a>
						</li>
						<li class="slide">
							<a href="{{ url('campaigns') }}" class="side-menu__item">Approve Campaigns</a>
						</li>
					</ul>
				</li>
				-- End::slide -->

			</ul>
			<div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24"
					height="24" viewBox="0 0 24 24">
					<path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z">
					</path>
				</svg></div>
		</nav>
		<!-- End::nav -->

	</div>
	<!-- End::main-sidebar -->
    @include('modals.logout_admin')

</aside>