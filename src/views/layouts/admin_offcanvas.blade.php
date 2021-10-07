<style>
	.b-example-divider {
	  flex-shrink: 0;
	  width: 1.5rem;
	  height: 100vh;
	  background-color: rgba(0, 0, 0, .1);
	  border: solid rgba(0, 0, 0, .15);
	  border-width: 1px 0;
	  box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
	}

	.bi {
	  vertical-align: -.125em;
	  pointer-events: none;
	  fill: currentColor;
	}

	.dropdown-toggle { outline: 0; }

	.nav-flush .nav-link {
	  border-radius: 0;
	}

	.btn-toggle {
	  display: inline-flex;
	  align-items: center;
	  padding: .25rem .5rem;
	  font-weight: 600;
	  color: rgba(0, 0, 0, .65);
	  background-color: transparent;
	  border: 0;
	}
	.btn-toggle:hover,
	.btn-toggle:focus {
	  color: rgba(0, 0, 0, .85);
	  background-color: #d2f4ea;
	}

	.btn-toggle::before {
	  width: 1.25em;
	  line-height: 0;
	  content: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='rgba%280,0,0,.5%29' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M5 14l6-6-6-6'/%3e%3c/svg%3e");
	  transition: transform .35s ease;
	  transform-origin: .5em 50%;
	}

	.btn-toggle[aria-expanded="true"] {
	  color: rgba(0, 0, 0, .85);
	}
	.btn-toggle[aria-expanded="true"]::before {
	  transform: rotate(90deg);
	}

	.btn-toggle-nav a {
	  display: inline-flex;
	  padding: .1875rem .5rem;
	  margin-top: .125rem;
	  margin-left: 1.25rem;
	  text-decoration: none;
	}
	.btn-toggle-nav a:hover,
	.btn-toggle-nav a:focus {
	  background-color: #d2f4ea;
	}
</style>
<div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
	<div class="offcanvas-header p-3">
		<h5 class="offcanvas-title" id="offcanvasExampleLabel">{{ __('green.admin_menu') }}</h5>
		<button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
	</div>
	<div class="offcanvas-body d-flex flex-column flex-shrink-0">
		<ul class="list-unstyled ps-0">
				<li class="mb-1">
				    <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="true">
				    {{ __('Панель адміністратора') }}
				    </button>
				    <div class="collapse show" id="dashboard-collapse">
				    	<ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
					        <li><a href="{{ route('admin.index') }}" class="link-dark rounded">Overview</a></li>
					        <li><a href="#" class="link-dark rounded">Weekly</a></li>
					        <li><a href="#" class="link-dark rounded">Monthly</a></li>
					        <li><a href="#" class="link-dark rounded">Annually</a></li>
				    	</ul>
				    </div>
				</li>
		      <li class="mb-1">
		        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#user-collapse" aria-expanded="false">
		          {{ _('Користувачі') }}
		        </button>
		        <div class="collapse" id="user-collapse">
		          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
		            <li><a href="{{ route('admin.users.index') }}" class="link-dark rounded">{{ __('Користувачі') }}</a></li>
		            <li><a href="{{ route('admin.roles.index') }}" class="link-dark rounded">{{ __('Ролі') }}</a></li>
		            <li><a href="{{ route('admin.permissions.index') }}" class="link-dark rounded">{{ __('Дозволи') }}</a></li>
		          </ul>
		        </div>
		      </li>
		      <li class="mb-1">
		        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#product-collapse" aria-expanded="false">
		          {{ __('Продукти') }}
		        </button>
		        <div class="collapse" id="product-collapse">
		          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
		          	<li><a href="#" class="link-dark rounded">{{ __('Категорії') }}</a></li>
		            <li><a href="{{ route('admin.product.index') }}" class="link-dark rounded">{{ __('Продукти') }}</a></li>
		          </ul>
		        </div>
		      </li>
		      <li class="mb-1">
		        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#equip-collapse" aria-expanded="false">
		          {{ __('Обладнання') }}
		        </button>
		        <div class="collapse" id="equip-collapse">
		          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
		          	<li><a href="#" class="link-dark rounded">{{ __('Категорії') }}</a></li>
		            <li><a href="#" class="link-dark rounded">{{ __('Обладнання') }}</a></li>
		          </ul>
		        </div>
		      </li>
		      <li class="mb-1">
		        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#person-collapse" aria-expanded="false">
		          {{ __('Персонал') }}
		        </button>
		        <div class="collapse" id="person-collapse">
		          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
		          	<li><a href="#" class="link-dark rounded">{{ __('Группи') }}</a></li>
		            <li><a href="#" class="link-dark rounded">{{ __('Персонал') }}</a></li>
		          </ul>
		        </div>
		      </li>
		      <li class="border-top my-3"></li>
		      <li class="mb-1">
		        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#account-collapse" aria-expanded="false">
		          Account
		        </button>
		        <div class="collapse" id="account-collapse">
		          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
		            <li><a href="#" class="link-dark rounded">New...</a></li>
		            <li><a href="#" class="link-dark rounded">Profile</a></li>
		            <li><a href="#" class="link-dark rounded">Settings</a></li>
		            <li><a href="#" class="link-dark rounded">Sign out</a></li>
		          </ul>
		        </div>
		      </li>
		    </ul>
		<div class="lex-column mt-auto"></div>
		<div class="text-center">
			<span class="fs-5 fw-bold">0629 410 124</span>
		</div>
	</div>
</div>