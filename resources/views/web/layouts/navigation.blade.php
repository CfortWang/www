<nav class="navbar-default navbar-static-side" role="navigation">
	<div class="sidebar-collapse">
		<ul class="nav metismenu" id="side-menu">
			<li class="nav-header">
				<div class="dropdown profile-element text-center">
					<span>
						<a href="/"><img alt="logo" class="navigation-logo" src="/img/logo/logo.png"/></a>
					</span>
					<!-- <a data-toggle="dropdown" class="dropdown-toggle" href="#">
						<span class="clear">
							<span class="block m-t-xs">
								<strong class="font-bold">App Locale :  {{ App::getLocale() }} </strong>
							</span>
							<span class="text-muted text-xs block">Session Locale : {{ session('locale') }}
								<b class="caret"></b>
							</span>
							<span class="text-muted text-xs block">rount name : {{ Route::currentRouteName() }}
								<b class="caret"></b>
							</span>
						</span>
					</a> -->
					<!-- <ul class="dropdown-menu animated fadeInRight m-t-xs">
						<li><a href="#">Logout</a></li>
					</ul> -->
				</div>
				<div class="logo-element">
					Bean<br>POP
				</div>
			</li>

			<li class="{{ isActiveRoute('shop', 1) }}">
				<a href="{{ url('/shop') }}">
					<i class="fa fa-user-secret"></i>
					<span class="nav-label">{{ __('navigation.shop_info') }}</span>
				</a>
			</li>
			<li class="{{ isActiveRoute('packages', 1) }}">
				<a href="{{ url('/packages') }}">
					<i class="fa fa-buysellads"></i>
					<span class="nav-label">{{ __('navigation.packages') }}</span>
				</a>
				<ul class="nav nav-second-level collapse">
					<li class="{{ isActiveRoute('buyerRequest', 2) }}">
						<a href="{{ url('/packages/buyer_request') }}">{{ __('navigation.buyer_request') }}</a>
					</li>
					<li class="{{ isActiveRoute('packageSales', 2) }}">
						<a href="{{ url('/packages/package_sales') }}">{{ __('navigation.package_sales') }}</a>
					</li>
				</ul>
			</li>
			<li class="{{ isActiveRoute('gift', 1) }}">
				<a href="{{ url('/gift') }}">
					<i class="fa fa-gift"></i>
					<span class="nav-label">{{ __('navigation.gift') }}</span>
				</a>
			</li>
			<li class="{{ isActiveRoute('event', 1) }}">
				<a href="{{ url('/even') }}">
					<i class="fa fa-star"></i>
					<span class="nav-label">{{ __('navigation.event') }}</span>
				</a>
				<ul class="nav nav-second-level collapse">
					<li class="{{ isActiveRoute('eventlist', 2) }}">
						<a href="{{ url('/event/eventlist') }}">{{ __('navigation.eventlist') }}</a>
					</li>
					<li class="{{ isActiveRoute('couponlist', 2) }}">
						<a href="{{ url('/event/couponlist') }}">{{ __('navigation.couponlist') }}</a>
					</li>
				</ul>
			</li>
			<li class="{{ isActiveRoute('stamp', 1) }}">
				<a href="{{ url('/stamp') }}">
					<i class="fa fa-star"></i>
					<span class="nav-label">{{ __('navigation.stamp') }}</span>
				</a>
				<ul class="nav nav-second-level collapse">
					<li class="{{ isActiveRoute('setting', 2) }}">
						<a href="{{ url('/stamp/setting') }}">{{ __('navigation.stampSetting') }}</a>
					</li>
					<li class="{{ isActiveRoute('coupon', 2) }}">
						<a href="{{ url('/stamp/coupon') }}">{{ __('navigation.stampCoupon') }}</a>
					</li>
					<li class="{{ isActiveRoute('user', 2) }}">
						<a href="{{ url('/stamp/user') }}">{{ __('navigation.stampUser') }}</a>
					</li>
				</ul>
			</li>
			<li class="{{ isActiveRoute('ad', 1) }}">
				<a href="{{ url('/ad/list') }}">
					<i class="fa fa-archive"></i>
					<span class="nav-label">{{ __('navigation.ad') }}</span>
				</a>
			</li>
			<li class="{{ isActiveRoute('cash', 1) }}">
				<a href="{{ url('/cash/list') }}">
					<i class="fa fa-recycle"></i>
					<span class="nav-label">{{ __('navigation.cash_out') }}</span>
				</a>
			</li>
			<li class="{{ isActiveRoute('account', 1) }}">
				<a href="{{ url('/account/list') }}">
					<i class="fa fa-user"></i>
					<span class="nav-label">{{ __('navigation.account_info') }}</span>
				</a>
			</li>
		</ul>
	</div>
</nav>
