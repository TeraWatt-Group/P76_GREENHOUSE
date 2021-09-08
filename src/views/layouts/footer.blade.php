<footer class="footer mt-auto">
    <div class="container">
        <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between pt-3 my-4 border-top">
            <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
                © {{ date('Y') }} {{ env('APP_NAME') }}
            </a>

            <ul class="nav col-12 col-md-auto mb-2 justify-content-start mb-md-0">
                <li><a href="#" class="nav-link px-2 link-dark">Home</a></li>
                <li><a href="#" class="nav-link px-2 link-dark">Terms</a></li>
                <li><a href="#" class="nav-link px-2 link-dark">Privacy</a></li>
                <li><a href="#" class="nav-link px-2 link-dark">Features</a></li>
                <li><a href="#" class="nav-link px-2 link-dark">Pricing</a></li>
                <li><a href="#" class="nav-link px-2 link-dark">FAQs</a></li>
                <li><a href="#" class="nav-link px-2 link-dark">About</a></li>
            </ul>

            <div class="col-md-3 text-end">
                {{ config('green.app_version') }}
            </div>
        </header>
      </div>
</footer>