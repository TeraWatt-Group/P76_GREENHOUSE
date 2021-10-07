<div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
	<div class="offcanvas-header p-3">
		<h5 class="offcanvas-title" id="offcanvasExampleLabel">{{ __('green.welcome_menu') }}</h5>
		<button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
	</div>
	<div class="offcanvas-body d-flex flex-column flex-shrink-0">
		<ul class="nav nav-pills flex-column mb-auto">
			<li class="nav-item">
				<a href="{{ route('welcome') }}" class="nav-link" aria-current="page">
					{{ __('green.welcome_home') }}
				</a>
			</li>
			<li>
				<a href="{{ route('green.product.index') }}" class="nav-link link-dark">
					{{ __('green.welcome_product') }}
				</a>
			</li>
			<li>
				<a href="#" class="nav-link link-dark">
					Orders
				</a>
			</li>
			<li>
				<a href="#" class="nav-link link-dark">
					Products
				</a>
			</li>
			<li>
				<a href="#" class="nav-link link-dark">
					Customers
				</a>
			</li>
			<li class="border-top my-3"></li>
			@if (Route::has('login'))
				@auth
					<li>
						<a class="nav-link link-dark" href="{{ route('home') }}"><strong>{{ Auth::user()->name }}</strong></a>
					</li>
					@if (Route::has('user.profile'))
						<li><hr class="dropdown-divider"></li>
						<li><a class="nav-link link-dark" href="{{ route('user.api_tokens') }}">{{ __('API токени') }}</a></li>
						<li><a class="nav-link link-dark" href="{{ route('user.profile') }}">{{ __('Налаштування') }}</a></li>
					@endif
					<li>
						<a class="nav-link link-dark" href="{{ route('logout') }}"
							onclick="event.preventDefault();
							document.getElementById('logout-form').submit();">
							{{ __('auth.logout') }}
						</a>
					</li>
					<li>
						<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
							@csrf
						</form>
					</li>
				@else
					<li><a href="{{ route('login') }}" class="nav-link link-dark">{{ __('auth.login') }}</a></li>

					@if (Route::has('register'))
						<li><a href="{{ route('register') }}" class="nav-link link-dark">{{ __('auth.register') }}</a></li>
					@endif
				@endauth
			@endif
		</ul>
		<div class="lex-column mt-auto"></div>
		<div class="text-center">
			<span class="fs-5 fw-bold">0629 410 124</span>
		</div>
	</div>
</div>