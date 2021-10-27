<footer class="footer mt-auto">
    <div class="container">
        <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between pt-3 my-4 border-top">
            <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
                © {{ date('Y') }} {{ config('green.app_name') }}
            </a>

            <ul class="nav col-12 col-md-auto mb-2 justify-content-start mb-md-0">
                <li><a href="{{ route('green.about') }}" class="nav-link px-2 link-dark">{{ __('green.welcome_about_us') }}</a></li>
                <li><a href="{{ route('green.technologies') }}" class="nav-link px-2 link-dark">{{ __('green.welcome_technologies') }}</a></li>
                <li><a href="{{ route('green.product.index') }}" class="nav-link px-2 link-dark">{{ __('green.welcome_product') }}</a></li>
                <li><a href="{{ route('green.blog.index') }}" class="nav-link px-2 link-dark">{{ __('green.welcome_blog') }}</a></li>
                <li><a href="{{ route('green.contacts') }}" class="nav-link px-2 link-dark">{{ __('green.welcome_contacts') }}</a></li>
            </ul>

            <div class="col-md-3 text-end">
                {{ Greenhouse::getVersion() }}
            </div>
        </header>
      </div>
</footer>