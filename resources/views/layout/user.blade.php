<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Jak Bazar| {{__('User')}}</title>
	<link rel="icon" href="{{asset('front/images/favicon.ico')}}" type="image/x-icon">
	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="{{asset('global_assets/css/icons/icomoon/styles.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('assets/css/bootstrap_limitless.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('assets/css/layout.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('assets/css/components.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('assets/css/colors.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('assets/css/toastr.css')}}" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script src="{{asset('global_assets/js/main/jquery.min.js')}}"></script>
	<script src="{{asset('global_assets/js/main/bootstrap.bundle.min.js')}}"></script>
	<script src="{{asset('global_assets/js/plugins/loaders/blockui.min.js')}}"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script src="{{asset('global_assets/js/plugins/tables/datatables/datatables.min.js')}}"></script>
	<script src="{{asset('global_assets/js/plugins/extensions/jquery_ui/interactions.min.js')}}"></script>

	<script src="{{asset('global_assets/js/plugins/tables/datatables/datatables.min.js')}}"></script>
	<script src="{{asset('global_assets/js/demo_pages/form_select2.js')}}"></script>

	<script src="{{asset('global_assets/js/plugins/forms/selects/select2.min.js')}}"></script>
    <script src="{{asset('global_assets/js/plugins/forms/styling/uniform.min.js')}}"></script>
    
	<script src="{{asset('global_assets/js/plugins/visualization/d3/d3.min.js')}}"></script>
	<script src="{{asset('global_assets/js/plugins/visualization/d3/d3_tooltip.js')}}"></script>
	<script src="{{asset('global_assets/js/plugins/forms/styling/switchery.min.js')}}"></script>
	<script src="{{asset('global_assets/js/plugins/forms/selects/bootstrap_multiselect.js')}}"></script>
	<script src="{{asset('global_assets/js/plugins/ui/moment/moment.min.js')}}"></script>
	<script src="{{asset('global_assets/js/plugins/pickers/daterangepicker.js')}}"></script>

	<script src="{{asset('assets/js/app.js')}}"></script>
	<script src="{{asset('global_assets/js/demo_pages/datatables_basic.js')}}"></script>
	<script src="{{asset('global_assets/js/demo_pages/form_layouts.js')}}"></script>
	<script src="{{asset('global_assets/js/demo_pages/dashboard.js')}}"></script>
	<script src="{{asset('global_assets/js/demo_pages/form_checkboxes_radios.js')}}"></script>
	<!-- /theme JS files -->
    <!-- <style>
	    .txt2{
			font-size: x-large;
		}
		.txt3{
			font-size: large!important;
		}
		.txt4{
			font-size: medium!important;
		}
	</style> -->
	<!-- <style>
		.table-responsive {
			display: block !important;
			width: 100%;
			overflow-x: auto;
			-webkit-overflow-scrolling: touch;
		}
	</style> -->
	@yield('styles')
</head>

<body>

	<!-- Main navbar -->
	<div class="navbar navbar-expand-md navbar-dark">
		<div class="navbar-brand">
			<a href="{{route('front.home')}}" class="text-light">
				<h3 class="m-0 txt2">JAK BAZAR</h3>
			</a>
		</div>

		<div class="d-md-none">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
				<i class="icon-tree5"></i>
			</button>
			<button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
				<i class="icon-paragraph-justify3"></i>
			</button>
		</div>

		<div class="collapse navbar-collapse" id="navbar-mobile">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a href="#" class="navbar-nav-link sidebar-control sidebar-main-toggle d-none d-md-block">
						<i class="icon-paragraph-justify3"></i>
					</a>
				</li>
			</ul>

			<span class="badge bg-success ml-md-3 mr-md-auto">{{__('Online')}}</span>

			<ul class="navbar-nav">



				<li class="nav-item dropdown dropdown-user">
					<a href="" class="navbar-nav-link d-flex align-items-center dropdown-toggle txt2" data-toggle="dropdown">
						<img src="{{Auth::user()->image}}" class="rounded-circle mr-2" height="34" alt="">
						<span>{{Auth::user()->name}}</span>
					</a>

					<div class="dropdown-menu dropdown-menu-right">
						<a href="{{route('logout')}}" class="dropdown-item txt4"><i class="icon-switch2"></i> {{__('Logout')}}</a>
					</div>
				</li>
			</ul>
		</div>
	</div>
	<!-- /main navbar -->


	<!-- Page content -->
	<div class="page-content">

		<!-- Main sidebar -->
		<div class="sidebar sidebar-dark sidebar-main sidebar-expand-md">

			<!-- Sidebar mobile toggler -->
			<div class="sidebar-mobile-toggler text-center">
				<a href="#" class="sidebar-mobile-main-toggle">
					<i class="icon-arrow-left8"></i>
				</a>
				{{__('Navigation')}}
				<a href="#" class="sidebar-mobile-expand">
					<i class="icon-screen-full"></i>
					<i class="icon-screen-normal"></i>
				</a>
			</div>
			<!-- /sidebar mobile toggler -->


			<!-- Sidebar content -->
			<div class="sidebar-content">

				<!-- User menu -->
				<div class="sidebar-user">
					<div class="card-body">
						<div class="media">
							<div class="mr-3">
								{{-- <a href="#"><img src="{{App\Models\Preference::find(1)->logo}}" width="38" height="38" class="rounded-circle" alt=""></a> --}}
							</div>

							<div class="media-body">
								<div class="media-title font-weight-semibold txt3">{{Auth::user()->name}}</div>
								<div class="font-size-xs opacity-50">
									<i class="icon-pin font-size-sm txt3">{{Auth::user()->email}}</i>
								</div>
							</div>

							<div class="ml-3 align-self-center">
								{{-- <a href="{{route('admin.preference.index')}}" class="text-white"><i class="icon-cog3"></i></a> --}}
							</div>
						</div>
					</div>
				</div>
				<!-- /user menu -->


				<!-- Main navigation -->
				<div class="card card-sidebar-mobile">
					<ul class="nav nav-sidebar" data-nav-type="accordion">

						<!-- Main -->
						<li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">{{__('Main')}}</div> <i class="icon-menu" title="Main"></i></li>
						<li class="nav-item">
							<a href="{{route('user.dashboard')}}" class="nav-link txt3 {{Request::is('user/dashboard')?'active':''}}">
								<i class="icon-home4"></i>
								<span>{{__('Dashboard')}}</span>
							</a>
						</li>
						<li class="nav-item">
							<a target="_blank" href="{{route('front.howitworks')}}"
								class="nav-link txt3 {{Request::is('admin/dashboard')?'active':''}}">
								<i class="icon-more"></i>
								<span>{{__('How it works')}}</span>
							</a>
						</li>
                        <li class="nav-item">
							<a href="{{route('user.profile.index')}}" class="nav-link txt3 {{Request::is('user/profile')?'active':''}}">
								<i class="icon-user"></i>
								<span>{{__('Profile')}}</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{route('user.order.create')}}" class="nav-link txt3 {{Request::is('vendor/order')?'active':''}}">
								<i class="icon-rotate-cw2 "></i>
								<span>{{__('Order Pending')}}</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{route('user.order.index')}}" class="nav-link txt3 {{Request::is('vendor/order')?'active':''}}">
								<i class="icon-cube3"></i>
								<span>{{__('Order History')}}</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{route('user.deposit.index')}}" class="nav-link txt3 {{Request::is('admin/user')?'active':''}}">
								<i class="icon-cube3"></i>
								<span>{{__('Deposit To Wallet')}}</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{route('user.transactions')}}" class="nav-link txt3 {{Request::is('transactions')?'active':''}}">
								<i class="icon-cube3"></i>
								<span>{{__('Transaction')}}</span>
							</a>
						</li>
						<li class="nav-item nav-item-submenu {{Request::is('user/ticket*')?'nav-item-open':''}}">
							<a href="#" class="nav-link txt3"><i class="icon-stack2"></i> <span>{{__('Tickets')}}</span></a>

							<ul class="nav nav-group-sub" data-submenu-title="Layouts" style="{{Request::is('vendor/order*')?'display:block':''}}">
								
								<li class="nav-item"><a href="{{route('user.ticket.create')}}" class="nav-link txt3 {{Request::is('user/ticket/create')?'active':''}}">{{__('Create Ticket')}}</a></li>
								
								<li class="nav-item"><a href="{{route('user.ticket.index')}}" class="nav-link txt3 {{Request::is('vendor/ticket')?'active':''}}">{{__('Generated Tickets')}}</a></li>
							</ul>
						</li>

						<li class="nav-item nav-item-submenu {{Request::is('user/withdraw*')?'nav-item-open':''}}">
							<a href="#" class="nav-link txt3"><i class="icon-stack2"></i> <span>{{__('Withdraw')}}</span></a>

							<ul class="nav nav-group-sub" data-submenu-title="Layouts" style="{{Request::is('user/withdraw*')?'display:block':''}}">
								
								<li class="nav-item"><a href="{{route('user.withdraw-account.index')}}" class="nav-link txt3 {{Request::is('user/withdraw-account/')?'active':''}}">{{__('Create Withdraw Account')}}</a></li>
								
								<li class="nav-item"><a href="{{route('user.withdraw.create')}}" class="nav-link txt3 {{Request::is('user/withdraw/create')?'active':''}}">{{__('New Withdraw Request')}}</a></li>
								
								<li class="nav-item"><a href="{{route('user.withdraw.index')}}" class="nav-link txt3 {{Request::is('user/withdraw')?'active':''}}">{{__('Pending Request')}}</a></li>
								
								<li class="nav-item"><a href="{{route('user.withdraw.accepted')}}" class="nav-link txt3 {{Request::is('user/accepted/withdraw')?'active':''}}">{{__('Accepted')}}</a></li>

								<li class="nav-item"><a href="{{route('user.withdraw.rejected')}}" class="nav-link txt3 {{Request::is('user/rejected/withdraw')?'active':''}}">{{__('Rejected')}}</a></li>
							</ul>
						</li>
						
                    
						{{-- 

						

						 <li class="nav-item">
							<a href="{{route('admin.category.index')}}" class="nav-link txt3 {{Request::is('admin/category')?'active':''}}">
								<i class="icon-cube3"></i>
								<span>Category</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{route('admin.subcategory.index')}}" class="nav-link txt3 {{Request::is('admin/subcategory')?'active':''}}">
								<i class="icon-cube3"></i>
								<span>Subcategory</span>
							</a>
						</li>
						
						<li class="nav-item">
							<a href="{{route('admin.vendor.index')}}" class="nav-link txt3 {{Request::is('admin/user')?'active':''}}">
								<i class="icon-cube3"></i>
								<span>Vendor Management</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{route('admin.gateway.index')}}" class="nav-link txt3 {{Request::is('admin/gateway')?'active':''}}">
								<i class="icon-cube3"></i>
								<span>Gateways</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{route('admin.contactmsgs')}}" class="nav-link txt3 {{Request::is('admin/contact/messages')?'active':''}}">
								<i class="icon-cube3"></i>
								<span>Contact Messages</span>
							</a>
						</li> --}}
						{{--
						
						<li class="nav-item">
							<a href="{{route('admin.preference.index')}}" class="nav-link txt3 {{Request::is('admin/preference')?'active':''}}">
								<i class="icon-cube3"></i>
								<span>Preference</span>
							</a>
						</li>
						
						<li class="nav-item">
							<a href="{{route('admin.user.index')}}" class="nav-link txt3 {{Request::is('admin/user')?'active':''}}">
								<i class="icon-cube3"></i>
								<span>Users</span>
							</a>
						</li>
						
						<li class="nav-item">
							<a href="{{route('admin.admin.index')}}" class="nav-link txt3 {{Request::is('admin/admin')?'active':''}}">
								<i class="icon-cube3"></i>
								<span>Admins</span>
							</a>
						</li> --}}

					

					</ul>
				</div>
				<!-- /main navigation -->

			</div>
			<!-- /sidebar content -->
			
		</div>
		<!-- /main sidebar -->


		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Page header -->
			<div class="page-header page-header-light">
				<div class="page-header-content header-elements-md-inline">
					<div class="page-title d-flex">
						<h4><i class="icon-star-full2 mr-2"></i> <span class="font-weight-semibold">@yield('title')</span></h4>
						<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
					</div>

					<div class="header-elements d-none">
						<div class="d-flex justify-content-center">

							<a href="#" class="btn btn-float mt-3">
								<h4><span id="ct" class="font-weight-semibold"></span></h4>
							</a>
						</div>
					</div>
					@yield('print_button')

				</div>
			</div>
			<!-- /page header -->


			<!-- Content area -->
			<div class="content">

				@yield('content')

			</div>
			<!-- /content area -->


			<!-- Footer -->
			<div class="navbar navbar-expand-lg navbar-light">
				<div class="text-center d-lg-none w-100">
					<button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target="#navbar-footer">
						<i class="icon-unfold mr-2"></i>
						{{__('Footer')}}
					</button>
				</div>

				<div class="navbar-collapse collapse" id="navbar-footer">
					<span class="navbar-text ml-lg-auto">
						
					</span>
				</div>
			</div>
			<!-- /footer -->

		</div>
		<!-- /main content -->

	</div>
	<!-- /page content -->


	<script src="{{asset('assets/js/toastr.js')}}"></script>
	@toastr_render
	@yield('scripts')
</body>
</html>
