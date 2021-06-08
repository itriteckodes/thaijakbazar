<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Jak Bazar| {{__('Vendor')}}</title>
	<link rel="icon" href="{{asset('front/images/favicon.ico')}}" type="image/x-icon">
	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet"
		type="text/css">
	<link href="{{asset('global_assets/css/icons/icomoon/styles.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('global_assets/css/icons/fontawesome/styles.min.css')}}" rel="stylesheet" type="text/css">
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
	<script src="{{asset('global_assets/js/plugins/forms/styling/switch.min.js')}}"></script>
	<script src="{{asset('global_assets/js/plugins/forms/selects/bootstrap_multiselect.js')}}"></script>
	<script src="{{asset('global_assets/js/plugins/ui/moment/moment.min.js')}}"></script>
	<script src="{{asset('global_assets/js/plugins/pickers/daterangepicker.js')}}"></script>

	<script src="{{asset('assets/js/app.js')}}"></script>
	<script src="{{asset('global_assets/js/demo_pages/datatables_basic.js')}}"></script>
	<script src="{{asset('global_assets/js/demo_pages/form_layouts.js')}}"></script>
	<script src="{{asset('global_assets/js/demo_pages/dashboard.js')}}"></script>
	<script src="{{asset('global_assets/js/demo_pages/form_checkboxes_radios.js')}}"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

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

		.preloader {
			background: #fff;
			display: block;
			width: 100%;
			height: 100%;
			position: fixed;
			top: 0;
			left: 0;
			z-index: 100000;
		}

		.preloader .load-list {
			width: 50px;
			height: 50px;
			position: relative;
			top: 50%;
			left: 0;
			margin: 0 auto;
			-webkit-transform: translateY(-50%);
			-ms-transform: translateY(-50%);
			transform: translateY(-50%);
		}

		.preloader .load-list .load {
			position: absolute;
			background: #00401A;
			width: 100%;
			height: 100%;
			opacity: 0.6;
			-webkit-border-radius: 50%;
			-moz-border-radius: 50%;
			-ms-border-radius: 50%;
			border-radius: 50%;
			-webkit-animation: bounce 2s infinite ease-in-out;
			animation: bounce 2s infinite ease-in-out;
		}

		.preloader .load-list .load2 {
			background: #00401A;
			animation-delay: -1s;
			-webkit-animation-delay: -1s;
		}

		@-webkit-keyframes bounce {

			0%,
			100% {
				-webkit-transform: scale(0);
			}

			50% {
				-webkit-transform: scale(1);
			}
		}

		@keyframes bounce {

			0%,
			100% {
				transform: scale(0);
				-webkit-transform: scale(0);
			}

			50% {
				transform: scale(1);
				-webkit-transform: scale(1);
			}
		}
	</style>

	@yield('styles')
</head>

<body>
	<div class="preloader">
		<div class="load-list">
			<div class="load"></div>
			<div class="load load2"></div>
		</div>
	</div>


	<!-- Main navbar -->
	<div class="navbar navbar-expand-md navbar-dark">
		<button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
			<i class="icon-paragraph-justify3"></i>
		</button>
		<div class="navbar-brand">
			<a href="{{route('front.home')}}" class="text-light">
				<h3 class="m-0 txt2">JAK BAZAR</h3>
			</a>
		</div>

		<!-- <div class="d-md-none"> -->
		<button class="navbar-toggler mt-1" type="button" data-toggle="collapse" data-target="#navbar-mobile">
			<i class="fa fa-ellipsis-v"></i>
		</button>
		<!-- </div> -->

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
						<span>{{Auth::user()->name}}</span>
					</a>

					<div class="dropdown-menu dropdown-menu-right">
						<a href="{{route('vendor.logout')}}" class="dropdown-item txt4"><i class="icon-switch2"></i> {{__('Logout')}}</a>
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
				{{__('JAKBAZAR')}}
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
								{{-- <a href="#"><img src="{{App\Models\Preference::find(1)->logo}}" width="38"
								height="38" class="rounded-circle" alt=""></a> --}}
							</div>

							<div class="media-body">
								<div class="media-title font-weight-semibold txt3">{{Auth::user()->name}}</div>
								<div class="font-size-xs opacity-50">
									<i class="icon-pin font-size-sm txt3">{{Auth::user()->email}}</i>
								</div>
							</div>

							<div class="ml-3 align-self-center">
								{{-- <a href="{{route('admin.preference.index')}}" class="text-white"><i
									class="icon-cog3"></i></a> --}}
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
							<div class="text-uppercase font-size-xs line-height-xs">{{__('Main')}}</div> <i
								class="icon-menu" title="Main"></i>
						</li>
						<li class="nav-item">
							<a  href="{{route('vendor.dashboard')}}"
								class="nav-link txt3 {{Request::is('admin/dashboard')?'active':''}}">
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
							<a  href="{{route('vendor.profile.index')}}"
								class="nav-link txt3 {{Request::is('vendor/profile')?'active':''}}">
								<i class="icon-user"></i>
								<span>{{__('Profile')}}</span>
							</a>
						</li>
						<li class="nav-item">
							<a  href="{{route('vendor.settings')}}"
								class="nav-link txt3 {{Request::is('vendor/settings')?'active':''}}">
								<i class="icon-cog2"></i>
								<span>{{__('Settings')}}</span>
							</a>
						</li>
						<li class="nav-item nav-item-submenu {{Request::is('vendor/product*')?'nav-item-open':''}}">
							<a href="#" class="nav-link txt3"><i class="icon-store"></i>
								<span>{{__('Product')}}</span></a>

							<ul class="nav nav-group-sub" data-submenu-title="Layouts"
								style="{{Request::is('vendor/product*')?'display:block':''}}">
								<li class="nav-item"><a  href="{{route('vendor.product.create')}}"
										class="nav-link txt3 {{Request::is('vendor/product/create')?'active':''}}">{{__('Add Product')}}</a>
								</li>
								<li class="nav-item"><a  href="{{route('vendor.product.index')}}"
										class="nav-link txt3 {{Request::is('vendor/product')?'active':''}}">{{__('All Products')}}</a>
								</li>
							</ul>
						</li>
						<li class="nav-item nav-item-submenu {{Request::is('vendor/coupan*')?'nav-item-open':''}}">
							<a href="#" class="nav-link txt3"><i class="icon-gift"></i>
								<span>{{__('Coupan')}}</span></a>

							<ul class="nav nav-group-sub" data-submenu-title="Layouts"
								style="{{Request::is('vendor/coupan*')?'display:block':''}}">
								<li class="nav-item"><a  href="{{route('vendor.coupan.create')}}"
										class="nav-link txt3 {{Request::is('vendor/coupan/create')?'active':''}}">{{__('Add New')}}</a>
								</li>

								<li class="nav-item"><a  href="{{route('vendor.coupan.index')}}"
										class="nav-link txt3 {{Request::is('vendor/coupan')?'active':''}}">{{__('View All')}}</a>
								</li>


							</ul>
						</li>
						<li class="nav-item nav-item-submenu {{Request::is('vendor/order*')?'nav-item-open':''}}">
							<a href="#" class="nav-link txt3"><i class="icon-bag"></i> <span>{{__('Order')}}</span></a>

							<ul class="nav nav-group-sub" data-submenu-title="Layouts"
								style="{{Request::is('vendor/order*')?'display:block':''}}">
								<li class="nav-item"><a href="{{route('vendor.order.pending')}}"
										class="nav-link txt3 {{Request::is('vendor/orders/pending')?'active':''}}">{{__('Pending')}}</a>
								</li>

								<li class="nav-item"><a href="{{route('vendor.order.accepted')}}"
										class="nav-link txt3 {{Request::is('vendor/orders/accepted')?'active':''}}">{{__('Accepted')}}</a>
								</li>

								<li class="nav-item"><a href="{{route('vendor.order.rejected')}}"
										class="nav-link txt3 {{Request::is('vendor/orders/rejected')?'active':''}}">{{__('Rejected')}}</a>
								</li>

								<li class="nav-item"><a href="{{route('vendor.order.ready')}}"
										class="nav-link txt3 {{Request::is('vendor/orders/ready')?'active':''}}">{{__('Ready To Ship')}}</a>
								</li>

								<li class="nav-item"><a href="{{route('vendor.order.dispatched')}}"
										class="nav-link txt3 {{Request::is('vendor/orders/dispatched')?'active':''}}">{{__('Dispatched')}}</a>
								</li>

								<li class="nav-item"><a href="{{route('vendor.order.delivered')}}"
										class="nav-link txt3 {{Request::is('vendor/order/delivered')?'active':''}}">{{__('Delivered')}}</a>
								</li>

								<li class="nav-item"><a href="{{route('vendor.order.history')}}"
										class="nav-link txt3 {{Request::is('vendor/orders/history')?'active':''}}">{{__('History')}}</a>
								</li>
							</ul>
						</li>
						<li class="nav-item">
							<a href="{{route('vendor.transactions')}}"
								class="nav-link txt3 {{Request::is('vendor/transactions')?'active':''}}">
								<i class="icon-cash3"></i>
								<span>{{__('Transaction')}}</span>
							</a>
						</li>
						<li class="nav-item nav-item-submenu {{Request::is('vendor/ticket*')?'nav-item-open':''}}">
							<a href="#" class="nav-link txt3"><i class="icon-stack2"></i>
								<span>{{__('Tickets')}}</span></a>

							<ul class="nav nav-group-sub" data-submenu-title="Layouts"
								style="{{Request::is('vendor/ticket*')?'display:block':''}}">

								<li class="nav-item"><a href="{{route('vendor.ticket.create')}}"
										class="nav-link txt3 {{Request::is('vendor/ticket/create')?'active':''}}">{{__('Create Ticket')}}</a>
								</li>

								<li class="nav-item"><a href="{{route('vendor.ticket.index')}}"
										class="nav-link txt3 {{Request::is('vendor/ticket')?'active':''}}">{{__('Generated Tickets')}}</a>
								</li>
							</ul>
						</li>

						<li class="nav-item nav-item-submenu {{Request::is('vendor/withdraw*')?'nav-item-open':''}}">
							<a href="#" class="nav-link txt3"><i class="icon-coins"></i>
								<span>{{__('Withdraw')}}</span></a>

							<ul class="nav nav-group-sub" data-submenu-title="Layouts"
								style="{{Request::is('vendor/withdraw*')?'display:block':''}}">

								<li class="nav-item"><a href="{{route('vendor.withdraw-account.index')}}"
										class="nav-link txt3 {{Request::is('vendor/withdraw-account/')?'active':''}}">{{__('Create Withdraw Account')}}</a>
								</li>

								<li class="nav-item"><a href="{{route('vendor.withdraw.newRequest')}}"
										class="nav-link txt3 {{Request::is('vendor/withdraw/new/request')?'active':''}}">{{__('New Withdraw Request')}}</a>
								</li>
								<li class="nav-item"><a href="{{route('vendor.withdraw.pendingRequests')}}"
										class="nav-link txt3 {{Request::is('vendor/withdraw/pending/requests')?'active':''}}">{{__('Pending')}}</a>
								</li>
								<li class="nav-item"><a href="{{route('vendor.withdraw.completedRequests')}}"
										class="nav-link txt3 {{Request::is('vendor/withdraw/completed/requests')?'active':''}}">{{__('Completed')}}</a>
								</li>
								<li class="nav-item"><a href="{{route('vendor.withdraw.rejectedRequests')}}"
										class="nav-link txt3 {{Request::is('vendor/withdraw/rejected/requests')?'active':''}}">{{__('Rejected')}}</a>
								</li>

							</ul>
						</li>
						<li class="nav-item">
							<a href="{{route('vendor.deposit.index')}}"
								class="nav-link txt3 {{Request::is('vendor/deposit')?'active':''}}">
								<i class="icon-cash3"></i>
								<span>{{__('Deposit')}}</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{route('vendor.logout')}}" class="nav-link txt3">
								<i class="icon-switch2"></i>
								<span>{{__('Log Out')}}</span>
							</a>
						</li>

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
			<!-- <div class="page-header page-header-light">
				<div class="page-header-content header-elements-md-inline">
					<div class="page-title d-flex">
						<h4><i class="icon-star-full2 mr-2"></i> <span class="font-weight-semibold txt3">@yield('title')</span></h4>
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
			</div> -->
			<!-- /page header -->


			<!-- Content area -->
			<div class="content">

				@yield('content')

			</div>
			<!-- /content area -->


			<!-- Footer -->
			<div class="navbar navbar-expand-lg navbar-light">
				<div class="text-center d-lg-none w-100">
					<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-footer">
						&copy;
						<script>
							document.write(new Date().getFullYear());
						</script>, {{__('made with')}} <i class="fa fa-heart text-success"></i>
					</button>
				</div>


			</div>
			<!-- /footer -->

		</div>
		<!-- /main content -->

	</div>
	<!-- /page content -->


	<script src="{{asset('assets/js/toastr.js')}}"></script>
	<script>
		$(document).ready(function(){

		$(window).on('load', function() {
			$(".preloader .item-wrapper").delay(500).animate({
				top: "-100%"
			},500,"easeInQuart");
			$(".preloader").delay(500).fadeOut(500);

			
		});
	});
	</script>
	@toastr_render
	@yield('scripts')
</body>

</html>