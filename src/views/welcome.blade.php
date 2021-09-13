<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" >
<head class="h-100">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="apple-touch-icon" sizes="57x57" href="/img/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/img/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/img/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/img/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/img/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/img/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/img/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/img/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/img/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="/img/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/img/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/img/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/img/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <title>@yield('title')</title>
    <meta name="keywords" content="best business software, business software, software system">
    <meta name="description" content="@yield('description')">

    <meta property="og:title" content="@yield('title')">
    <meta property="og:description" content="@yield('description')">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->full() }}">
    <meta property="og:image" content="{{ asset('/img/mls_v4_1024x1024.jpg') }}" />
    <meta property="og:site_name" content="{{ env('APP_NAME') }}">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <!-- Styles -->
    <link href="{{ 'css/app.css' }}" rel="stylesheet">
    <link href="{{ 'css/green.css' }}" rel="stylesheet">
    @livewireStyles
</head>
<body class="h-100">
		<main>
			<div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
				<div class="offcanvas-header p-3">
					<h5 class="offcanvas-title" id="offcanvasExampleLabel">Menu</h5>
					<button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
				</div>
				<div class="offcanvas-body d-flex flex-column flex-shrink-0">
					<ul class="nav nav-pills flex-column mb-auto">
					      <li class="nav-item">
					        <a href="#" class="nav-link" aria-current="page">

					          Home
					        </a>
					      </li>
					      <li>
					        <a href="#" class="nav-link link-dark">

					          Dashboard
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
					    </ul>
					    <div class="dropdown">
					          <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
					            <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
					            <strong>mdo</strong>
					          </a>
					          <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
					            <li><a class="dropdown-item" href="#">New project...</a></li>
					            <li><a class="dropdown-item" href="#">Settings</a></li>
					            <li><a class="dropdown-item" href="#">Profile</a></li>
					            <li><hr class="dropdown-divider"></li>
					            <li><a class="dropdown-item" href="#">Sign out</a></li>
					          </ul>
					    </div>
					    <hr>
					    <div class="text-center">
					    	<span class="fs-5 fw-bold">0629 410 124</span>
					    </div>

				</div>
			</div>

			<div class="d-flex flex-column flex-shrink-1 p-4 bg-light col-4 col-xs-2 col-sm-2 col-md-2 col-lg-2">
				<div class="d-flex justify-content-center">
					<a href="#" class="d-flex align-items-center mb-3 link-dark text-decoration-none">
						<span class="fs-4 fw-bold">green.</span>
					</a>
				</div>


				<div class="flex-column align-items-end m-auto">
					<div class="outer">
						<div class="inner">
							<span class="fw-bold display-3">
								Greenhouse
							</span>
						</div>
					</div>
				</div>

				<div class="d-flex justify-content-center fw-bold">
					<div class="px-2"><a href="https://terawatt-group.com/" class="text-decoration-none link-dark">twg</a></div>
					<div class="px-2"><a href="https://www.facebook.com/TeraWattGroup/" class="text-decoration-none link-dark">fb</a></div>
				</div>
			</div>

			<div class="d-flex flex-column py-3 px-sm-4 bg-light col-2 col-xs-1 col-sm-6 col-md-6 col-lg-6 offset-6 offset-sm-4 offset-md-4 offset-lg-4">
				<header class="d-flex flex-wrap justify-content-center justify-content-sm-start py-2 mb-4">
		            <button class="btn link-dark px-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
		      		    <svg aria-hidden="true" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" style="height: 25px;"><path fill="currentColor" d="M442 114H6a6 6 0 0 1-6-6V84a6 6 0 0 1 6-6h436a6 6 0 0 1 6 6v24a6 6 0 0 1-6 6zm0 160H6a6 6 0 0 1-6-6v-24a6 6 0 0 1 6-6h436a6 6 0 0 1 6 6v24a6 6 0 0 1-6 6zm0 160H6a6 6 0 0 1-6-6v-24a6 6 0 0 1 6-6h436a6 6 0 0 1 6 6v24a6 6 0 0 1-6 6z" class=""></path></svg>
		      		</button>
			    </header>

				<div class="col-12 d-none d-sm-block">
				    <div class="h-100 py-5">
				        <h2 class="pb-2 border-bottom">Add borders</h2>
				        <p>Or, keep it light and add a border for some added definition to the boundaries of your content. Be sure to look under the hood at the source HTML here as we've adjusted the alignment and sizing of both column's content for equal-height.</p>
				        <button class="btn btn-outline-secondary" type="button">Example button</button>
				    </div>
				</div>
			</div>
		</main>
		<div class="container">
			<div class="h-100">
				<div class="container px-4 py-5" id="custom-cards">
				    <h2 class="pb-2 border-bottom">News</h2>

				    <div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-5">
				      <div class="col">
				        <div class="card card-cover h-100 overflow-hidden" style="background-image: url('sarah-dorweiler-x2Tmfd1-SgA-unsplash.jpg');">
				          <div class="d-flex flex-column h-100 p-5 pb-3 text-shadow-1">
				            <h2 class="mb-4 display-6 lh-1 fw-bold">Short title, long jacket</h2>
				            <ul class="d-flex list-unstyled mt-auto">
				              <li class="me-auto">
				                <img src="https://github.com/twbs.png" alt="Bootstrap" width="32" height="32" class="rounded-circle border border-white">
				              </li>
				              <li class="d-flex align-items-center me-3">
				                <svg class="bi me-2" width="1em" height="1em"><use xlink:href="#geo-fill"></use></svg>
				                <small>Earth</small>
				              </li>
				              <li class="d-flex align-items-center">
				                <svg class="bi me-2" width="1em" height="1em"><use xlink:href="#calendar3"></use></svg>
				                <small>3d</small>
				              </li>
				            </ul>
				          </div>
				        </div>
				      </div>

				      <div class="col">
				        <div class="card card-cover h-100 overflow-hidden" style="background-image: url('sarah-dorweiler-2s9aHF4eCjI-unsplash.jpg');">
				          <div class="d-flex flex-column h-100 p-5 pb-3 text-shadow-1">
				            <h2 class="mb-4 display-6 lh-1 fw-bold">Much longer title that wraps to multiple lines</h2>
				            <ul class="d-flex list-unstyled mt-auto">
				              <li class="me-auto">
				                <img src="https://github.com/twbs.png" alt="Bootstrap" width="32" height="32" class="rounded-circle border border-white">
				              </li>
				              <li class="d-flex align-items-center me-3">
				                <svg class="bi me-2" width="1em" height="1em"><use xlink:href="#geo-fill"></use></svg>
				                <small>Pakistan</small>
				              </li>
				              <li class="d-flex align-items-center">
				                <svg class="bi me-2" width="1em" height="1em"><use xlink:href="#calendar3"></use></svg>
				                <small>4d</small>
				              </li>
				            </ul>
				          </div>
				        </div>
				      </div>

				      <div class="col">
				        <div class="card card-cover h-100 overflow-hidden" style="background-image: url('jazmin-quaynor-8ioenvmof-I-unsplash.jpg');">
				          <div class="d-flex flex-column h-100 p-5 pb-3 text-shadow-1">
				            <h2 class="mb-4 display-6 lh-1 fw-bold">Another longer title belongs here</h2>
				            <ul class="d-flex list-unstyled mt-auto">
				              <li class="me-auto">
				                <img src="https://github.com/twbs.png" alt="Bootstrap" width="32" height="32" class="rounded-circle border border-white">
				              </li>
				              <li class="d-flex align-items-center me-3">
				                <svg class="bi me-2" width="1em" height="1em"><use xlink:href="#geo-fill"></use></svg>
				                <small>California</small>
				              </li>
				              <li class="d-flex align-items-center">
				                <svg class="bi me-2" width="1em" height="1em"><use xlink:href="#calendar3"></use></svg>
				                <small>5d</small>
				              </li>
				            </ul>
				          </div>
				        </div>
				      </div>
				    </div>

				    <div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 pb-5">
				      <div class="col">
				        <div class="card card-cover h-100 overflow-hidden" style="background-image: url('sarah-dorweiler-x2Tmfd1-SgA-unsplash.jpg');">
				          <div class="d-flex flex-column h-100 p-5 pb-3 text-shadow-1">
				            <h2 class="mb-4 display-6 lh-1 fw-bold">Short title, long jacket</h2>
				            <ul class="d-flex list-unstyled mt-auto">
				              <li class="me-auto">
				                <img src="https://github.com/twbs.png" alt="Bootstrap" width="32" height="32" class="rounded-circle border border-white">
				              </li>
				              <li class="d-flex align-items-center me-3">
				                <svg class="bi me-2" width="1em" height="1em"><use xlink:href="#geo-fill"></use></svg>
				                <small>Earth</small>
				              </li>
				              <li class="d-flex align-items-center">
				                <svg class="bi me-2" width="1em" height="1em"><use xlink:href="#calendar3"></use></svg>
				                <small>3d</small>
				              </li>
				            </ul>
				          </div>
				        </div>
				      </div>

				      <div class="col">
				        <div class="card card-cover h-100 overflow-hidden" style="background-image: url('sarah-dorweiler-2s9aHF4eCjI-unsplash.jpg');">
				          <div class="d-flex flex-column h-100 p-5 pb-3 text-shadow-1">
				            <h2 class="mb-4 display-6 lh-1 fw-bold">Much longer title that wraps to multiple lines</h2>
				            <ul class="d-flex list-unstyled mt-auto">
				              <li class="me-auto">
				                <img src="https://github.com/twbs.png" alt="Bootstrap" width="32" height="32" class="rounded-circle border border-white">
				              </li>
				              <li class="d-flex align-items-center me-3">
				                <svg class="bi me-2" width="1em" height="1em"><use xlink:href="#geo-fill"></use></svg>
				                <small>Pakistan</small>
				              </li>
				              <li class="d-flex align-items-center">
				                <svg class="bi me-2" width="1em" height="1em"><use xlink:href="#calendar3"></use></svg>
				                <small>4d</small>
				              </li>
				            </ul>
				          </div>
				        </div>
				      </div>

				      <div class="col">
				        <div class="card card-cover h-100 overflow-hidden" style="background-image: url('jazmin-quaynor-8ioenvmof-I-unsplash.jpg');">
				          <div class="d-flex flex-column h-100 p-5 pb-3 text-shadow-1">
				            <h2 class="mb-4 display-6 lh-1 fw-bold">Another longer title belongs here</h2>
				            <ul class="d-flex list-unstyled mt-auto">
				              <li class="me-auto">
				                <img src="https://github.com/twbs.png" alt="Bootstrap" width="32" height="32" class="rounded-circle border border-white">
				              </li>
				              <li class="d-flex align-items-center me-3">
				                <svg class="bi me-2" width="1em" height="1em"><use xlink:href="#geo-fill"></use></svg>
				                <small>California</small>
				              </li>
				              <li class="d-flex align-items-center">
				                <svg class="bi me-2" width="1em" height="1em"><use xlink:href="#calendar3"></use></svg>
				                <small>5d</small>
				              </li>
				            </ul>
				          </div>
				        </div>
				      </div>
				    </div>

				  </div>
			</div>
		</div>

	@include('vendor.green.layouts.footer')

    <!-- Scripts -->
    @livewireScripts
    <script src="{{ 'js/app.js' }}" defer></script>
    @stack('scripts')
    @yield('script')
</body>
</html>