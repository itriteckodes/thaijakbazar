<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Jak Bazar| Admin</title>
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

	<style>
		.table-responsive {
			display: block !important;
			width: 100%;
			overflow-x: auto;
			-webkit-overflow-scrolling: touch;
		}
	</style>

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

			<span class="badge bg-success ml-md-3 mr-md-auto">Online</span>

			<ul class="navbar-nav">
				<li class="nav-item dropdown">
					<a href="#" class="navbar-nav-link dropdown-toggle legitRipple" data-toggle="dropdown" aria-expanded="false">
						<i class="icon-make-group mr-2"></i>
						{{Config::get('app.locale') == 'th'? 'Thailand':'Pakistan'}}
					</a>

					<div class="dropdown-menu dropdown-menu-right dropdown-content">
						<div class="dropdown p-2">
							<div class="row">
								<div class="col-12 col-sm-4">
									<a href="{{route('admin.language',1)}}" class="d-block text-default text-center ripple-dark rounded p-3 legitRipple">
										<img src="{{ asset('images/pakistan-flag.png') }}" height="50px" width="50px">
										<div class="font-size-sm font-weight-semibold text-uppercase mt-2">Pakistan</div>
									</a>

								</div>
								
								<div class="col-12 col-sm-4">
									<a href="{{route('admin.language',2)}}" class="d-block text-default text-center ripple-dark rounded p-3 legitRipple">
										<img src="{{ asset('images/Thailand-Flag-icon.png') }}" height="50px" width="50px">
										<div class="font-size-sm font-weight-semibold text-uppercase mt-2">Thailand</div>
									</a>

									 
								</div>

								
							</div>
						</div>
					</div>
				</li>


				<li class="nav-item dropdown dropdown-user">
					<a href="" class="navbar-nav-link d-flex align-items-center dropdown-toggle txt2" data-toggle="dropdown">
						{{-- <img src="{{App\Models\Preference::find(1)->logo}}" class="rounded-circle mr-2" height="34" alt=""> --}}
						<span>Admin</span>
					</a>

					<div class="dropdown-menu dropdown-menu-right">
						<a href="{{route('admin.logout')}}" class="dropdown-item txt4"><i class="icon-switch2"></i> Logout</a>
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
				Navigation
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
								<div class="font-size-xs opacity-50 txt3">
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
						<li class="nav-item-header">
							<div class="text-uppercase font-size-xs line-height-xs txt3c">Main</div> <i class="icon-menu" title="Main"></i>
						</li>

						@if(Auth::user()->checkRole('admin.dashboard'))
						<li class="nav-item">
							<a href="{{route('admin.dashboard')}}" class="nav-link txt3 {{Request::is('admin/dashboard')?'active':''}}">
								<i class="icon-home4"></i>
								<span>Dashboard</span>
							</a>
						</li>
						@endif
						@if(Auth::user()->checkRole('admin.accountDashboard'))
						<li class="nav-item">
							<a href="{{route('admin.accountDashboard')}}" class="nav-link txt3 {{Request::is('admin/account/dashboard')?'active':''}}">
								<i class="icon-cash4"></i>
								<span>Account Dashboard</span>
							</a>
						</li>
						@endif
						@if(Auth::user()->checkRole('admin.admins.index'))
						<li class="nav-item">
							<a href="{{route('admin.admins.index')}}" class="nav-link txt3 {{Request::is('admin/admins')?'active':''}}">
								<i class="icon-user"></i>
								<span>Admins</span>
							</a>
						</li>
						@endif
						@if(Auth::user()->checkRole('admin.account-approval.index'))
						<li class="nav-item">
							<a href="{{route('admin.account-approval.index')}}" class="nav-link txt3 {{Request::is('admin/account-approval')?'active':''}}">
								<i class="icon-user"></i>
								<span>Account Approvals</span>
							</a>
						</li>
						@endif
						@if(Auth::user()->checkRole('admin.user.index'))
						<li class="nav-item">
							<a href="{{route('admin.user.index')}}" class="nav-link txt3 {{Request::is('admin/user')?'active':''}}">
								<i class="icon-people"></i>
								<span>Users Management</span>
							</a>
						</li>
						@endif
						@if(Auth::user()->checkRole('admin.vendor.index'))
						<li class="nav-item">
							<a href="{{route('admin.vendor.index')}}" class="nav-link txt3 {{Request::is('admin/vendor')?'active':''}}">
								<i class="icon-user"></i>
								<span>Vendor Management</span>
							</a>
						</li>
						@endif
						@if(Auth::user()->checkRole('admin.category.index'))
						<li class="nav-item">
							<a href="{{route('admin.category.index')}}" class="nav-link txt3 {{Request::is('admin/category')?'active':''}}">
								<i class="icon-cube3"></i>
								<span>Category</span>
							</a>
						</li>
						@endif
						@if(Auth::user()->checkRole('admin.subcategory.index'))
						<li class="nav-item">
							<a href="{{route('admin.subcategory.index')}}" class="nav-link txt3 {{Request::is('admin/subcategory')?'active':''}}">
								<i class="icon-cube3"></i>
								<span>Subcategory</span>
							</a>
						</li>
						@endif
						@if(Auth::user()->checkRole('admin.product.index'))
						<li class="nav-item">
							<a href="{{route('admin.product.index')}}" class="nav-link txt3 {{Request::is('admin/product')?'active':''}}">
								<i class="icon-store"></i>
								<span>Products</span>
							</a>
						</li>
						@endif
						@if(Auth::user()->checkRole('admin.coupon.index'))
						<li class="nav-item">
							<a href="{{route('admin.coupon.index')}}" class="nav-link txt3 {{Request::is('admin/coupon')?'active':''}}">
								<i class="icon-gift"></i>
								<span>Coupons</span>
							</a>
						</li>
						@endif
						@if(Auth::user()->checkRole('admin.order.pending'))
						<li class="nav-item nav-item-submenu {{Request::is('admin/order*')?'nav-item-open':''}}">
							<a href="#" class="nav-link txt3"><i class="icon-bag"></i> <span>Order</span></a>
							<ul class="nav nav-group-sub" data-submenu-title="Layouts" style="{{Request::is('admin/order*')?'display:block':''}}">
								<li class="nav-item"><a href="{{route('admin.order.pending')}}" class="nav-link txt3 {{Request::is('admin/orders/pending')?'active':''}}">Pending</a></li>
								<li class="nav-item"><a href="{{route('admin.order.accepted')}}" class="nav-link txt3 {{Request::is('admin/orders/accepted')?'active':''}}">Accepted</a></li>
								<li class="nav-item"><a href="{{route('admin.order.rejected')}}" class="nav-link txt3 {{Request::is('admin/orders/rejected')?'active':''}}">Rejected</a></li>
								<li class="nav-item"><a href="{{route('admin.order.ready')}}" class="nav-link txt3 {{Request::is('admin/orders/history')?'active':''}}">Ready To Ship</a></li>
								<li class="nav-item"><a href="{{route('admin.order.dispatched')}}" class="nav-link txt3 {{Request::is('admin/orders/dispatched')?'active':''}}">Dispatched</a></li>
								<li class="nav-item"><a href="{{route('admin.order.delivered')}}" class="nav-link txt3 {{Request::is('admin/order/delivered')?'active':''}}">Delivered</a></li>

								<li class="nav-item"><a href="{{route('admin.order.history')}}" class="nav-link txt3 {{Request::is('admin/orders/history')?'active':''}}">History</a></li>
							</ul>
						</li>
						@endif
						@if(Auth::user()->checkRole('admin.ticket.index'))
						<li class="nav-item">
							<a href="{{route('admin.ticket.index')}}" class="nav-link txt3 {{Request::is('admin/coupon')?'active':''}}">
								<i class="icon-images2"></i>
								<span>Generated Tickets</span>
							</a>
						</li>

						@endif
						@if(Auth::user()->checkRole('admin.profile.index'))
						<li class="nav-item">
							<a href="{{route('admin.profile.index')}}" class="nav-link txt3 {{Request::is('admin/profile')?'active':''}}">
								<i class="icon-user"></i>
								<span>Profile</span>
							</a>
						</li>
						@endif

						@if(Auth::user()->checkRole('admin.setting.index'))
						<li class="nav-item">
							<a href="{{route('admin.setting.index')}}" class="nav-link txt3 {{Request::is('admin/setting')?'active':''}}">
								<i class="icon-cog6"></i>
								<span>General Setting</span>
							</a>
						</li>
						@endif
						
						@if(Auth::user()->checkRole('admin.gateway.index'))
						<li class="nav-item">
							<a href="{{route('admin.gateway.index')}}" class="nav-link txt3 {{Request::is('admin/gateway')?'active':''}}">
								<i class="icon-cash3"></i>
								<span>Gateways</span>
							</a>
						</li>
						@endif

						@if(Auth::user()->checkRole('admin.tax.index'))
						<li class="nav-item">
							<a href="{{route('admin.tax.index')}}" class="nav-link txt3 {{Request::is('admin/tax')?'active':''}}">
								<i class="icon-cog6"></i>
								<span>Tax</span>
							</a>
						</li>
						@endif


						@if(Auth::user()->checkRole('admin.deposit-method.index'))
						<li class="nav-item">
							<a href="{{route('admin.deposit-method.index')}}" class="nav-link txt3 {{Request::is('admin/deposit-method')?'active':''}}">
								<i class="icon-cash3"></i>
								<span>Deposit Methods</span>
							</a>
						</li>
						@endif


						@if(Auth::user()->checkRole('admin.withdrawmethod.index'))
						<li class="nav-item">
							<a href="{{route('admin.withdrawmethod.index')}}" class="nav-link txt3 {{Request::is('admin/withdrawmethod')?'active':''}}">
								<i class="icon-cash3"></i>
								<span>Withdraw Methods</span>
							</a>
						</li>
						@endif
						@if(Auth::user()->checkRole('admin.withdraw-account.index'))
						<li class="nav-item">
							<a href="{{route('admin.withdraw-account.index')}}" class="nav-link txt3 {{Request::is('admin/withdraw-account')?'active':''}}">
								<i class="icon-cash3"></i>
								<span>Withdraw Account Requests</span>
							</a>
						</li>
						@endif
						@if(Auth::user()->checkRole('admin.withdraw.index'))
						<li class="nav-item nav-item-submenu {{Request::is('admin/withdraw*')?'nav-item-open':''}} ">
							<a href="#" class="nav-link txt3 "><i class="icon-stack2"></i> <span>Withdraw Requests</span></a>
							<ul class="nav nav-group-sub" data-submenu-title="Layouts" style="{{Request::is('admin/withdraw*')?'display:block':''}}">
								<li class="nav-item"><a href="{{route('admin.withdraw.index')}}" class="nav-link txt3 {{Request::is('admin/withdraw')?'active':''}}">Pending Request</a></li>
								<li class="nav-item"><a href="{{route('admin.withdraw.accept')}}" class="nav-link txt3 {{Request::is('admin/withdraw/accepted')?'active':''}}">Accepted Request</a></li>
								<li class="nav-item"><a href="{{route('admin.withdraw.reject')}}" class="nav-link txt3 {{Request::is('admin/withdraw/rejected')?'active':''}}">Rejected Request</a></li>
							</ul>
						</li>
						@endif
						@if(Auth::user()->checkRole('admin.transaction.user'))
						<li class="nav-item nav-item-submenu {{Request::is('admin/transaction*')?'nav-item-open':''}}">
							<a href="#" class="nav-link txt3"><i class="icon-bag"></i> <span>Transactions</span></a>
							<ul class="nav nav-group-sub" data-submenu-title="Layouts" style="{{Request::is('admin/transaction*')?'display:block':''}}">
								<li class="nav-item"><a href="{{route('admin.transaction.user')}}" class="nav-link txt3 {{Request::is('admin/transactions/user')?'active':''}}">User Transactions</a></li>
								<li class="nav-item"><a href="{{route('admin.transaction.vendor')}}" class="nav-link txt3 {{Request::is('admin/transactions/vendor')?'active':''}}">Vendor Transcations</a></li>
							</ul>
						</li>
						@endif

						@if(Auth::user()->checkRole('admin.slider.index'))
						<li class="nav-item nav-item-submenu {{Request::is('admin/slider*')?'nav-item-open':''}}">
							<a href="#" class="nav-link txt3"><i class="icon-images2"></i> <span>Slider</span></a>
							<ul class="nav nav-group-sub" data-submenu-title="Layouts" style="{{Request::is('admin/slider*')?'display:block':''}}">
								<li class="nav-item"><a href="{{route('admin.slider.index')}}" class="nav-link txt3 {{Request::is('admin/slider')?'active':''}}">Add</a></li>
							</ul>
						</li>
						@endif
						@if(Auth::user()->checkRole('admin.banner.index'))
						<li class="nav-item">
							<a href="{{route('admin.banner.index')}}" class="nav-link txt3 {{Request::is('admin/banner')?'active':''}}">
								<i class="icon-youtube2"></i>
								<span>Banners</span>
							</a>
						</li>
						@endif
						@if(Auth::user()->checkRole('admin.contact.create'))
						<li class="nav-item nav-item-submenu {{Request::is('admin/contact*')?'active':''}}">
							<a href="#" class="nav-link txt3"><i class="icon-phone2"></i><span>Contact Messages</span></a>

							<ul class="nav nav-group-sub" data-submenu-title="Layouts" style="{{Request::is('admin/contact*')?'display:block':''}}">
								<li class="nav-item"><a href="{{route('admin.contact.create')}}" class="nav-link txt3 {{Request::is('admin/contact/create')?'active':''}}">New</a></li>

								<li class="nav-item"><a href="{{route('admin.contact.index')}}" class="nav-link txt3 {{Request::is('admin/contact')?'active':''}}">History</a></li>
							</ul>
						</li>
						@endif


						@if(Auth::user()->checkRole('admin.terms'))
						<li class="nav-item nav-item-submenu {{Request::is('admin/policy*')?'nav-item-open':''}}">
							<a href="#" class="nav-link txt3"><i class="icon-stack2"></i> <span>Policy</span></a>

							<ul class="nav nav-group-sub" data-submenu-title="Layouts" style="{{Request::is('admin/policy*')?'display:block':''}}">
								<li class="nav-item"><a href="{{route('admin.terms')}}" class="nav-link txt3 {{Request::is('admin/policy/terms&conditions')?'active':''}}">Terms & Condition</a></li>

								<li class="nav-item"><a href="{{route('admin.refund')}}" class="nav-link  txt3 {{Request::is('admin/policy/refund')?'active':''}}">Refund Policy</a></li>

								<li class="nav-item"><a href="{{route('admin.replacement')}}" class="nav-link txt3 {{Request::is('admin/policy/replacement')?'active':''}}">Replacement Policy</a></li>

								<li class="nav-item"><a href="{{route('admin.privacy')}}" class="nav-link txt3 {{Request::is('admin/policy/privacy')?'active':''}}">Privacy Policy</a></li>

								<li class="nav-item"><a href="{{route('admin.howitworks')}}" class="nav-link txt3 {{Request::is('admin/howitworks')?'active':''}}">How it works</a></li>

								<li class="nav-item"><a href="{{route('admin.aboutus')}}" class="nav-link txt3 {{Request::is('admin/aboutus')?'active':''}}">About Us</a></li>



							</ul>
						</li>
						@endif
						@if(Auth::user()->checkRole('admin.blog.create'))
						<li class="nav-item nav-item-submenu {{Request::is('admin/blog*')?'nav-item-open':''}}">
							<a href="#" class="nav-link txt3"><i class="icon-stack2"></i> <span>Blog</span></a>
							<ul class="nav nav-group-sub" data-submenu-title="Layouts" style="{{Request::is('admin/policy*')?'display:block':''}}">
								<li class="nav-item"><a href="{{route('admin.blog.create')}}" class="nav-link txt3 {{Request::is('admin/blog/create')?'active':''}}">Create Blog</a></li>
								<li class="nav-item"><a href="{{route('admin.blog.index')}}" class="nav-link txt3 {{Request::is('admin/blog')?'active':''}}">View Blogs</a></li>
							</ul>
						</li>
						@endif



						@if(Auth::user()->checkRole('admin.news-ticker.index'))
						<li class="nav-item">
							<a href="{{route('admin.news-ticker.index')}}" class="nav-link txt3 {{Request::is('admin/withdraw-account')?'active':''}}">
								<i class="icon-paragraph-justify3"></i>
								<span>Manage News Shown To Vendor</span>
							</a>
						</li>
						@endif




						@if(Auth::user()->checkRole('admin.newsletter'))
						<li class="nav-item">
							<a href="{{route('admin.newsletter')}}" class="nav-link txt3 {{Request::is('admin/subscribers')?'active':''}}">
								<i class="icon-youtube2"></i>
								<span>Subscribers</span>
							</a>
						</li>
						@endif

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
						<h4 class="txt3"><i class="icon-star-full2 mr-2"></i> <span class="font-weight-semibold">@yield('title')</span></h4>
						<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
					</div>

					<div class="header-elements d-none">
						<div class="d-flex justify-content-center">

							<a href="#" class="btn btn-float mt-3">
								<h4><span id="ct" class="font-weight-semibold">@yield('title1')</span></h4>
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
						Footer
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