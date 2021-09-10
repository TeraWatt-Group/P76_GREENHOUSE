@extends('vendor.green.layouts.app')

@section('title', __('green.'))
@section('description', __('green.'))

@section('content')

	<!-- Bootstrap core CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">



	<style>
	  body {
		min-height: 100vh;
		min-height: -webkit-fill-available;
	  }

	  html {
		height: -webkit-fill-available;
	  }

	  main {
		display: flex;
		flex-wrap: nowrap;
		height: 100vh;
		height: -webkit-fill-available;
		max-height: 100vh;
		overflow-x: auto;
		overflow-y: hidden;
	  }

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

	  .scrollarea {
		overflow-y: auto;
	  }

	  .fw-semibold { font-weight: 600; }
	  .lh-tight { line-height: 1.25; }



		.outer{
		  writing-mode: tb-rl;
		  display: flex;
		  align-items: center;
		  justify-content: center;
		}
		.inner{
		  transform: rotate(180deg);
		  text-align: center;
		}

		main {
			width: 100%;
		    background: url('vendor/green/img/josefin-WS5yjFjycNY-unsplash.jpg') no-repeat center center fixed;
		    -webkit-background-size: cover;
		    -moz-background-size: cover;
		    background-size: cover;
		    -o-background-size: cover;
		}
		.btn:focus {
		  outline: none;
		  box-shadow: none;
		}
		::-webkit-scrollbar {
		    width: 10px;
		}
		::-webkit-scrollbar-thumb {
		    background: #888;
		}
		::-webkit-scrollbar-thumb:hover {
		    background: #555;
		}
	</style>


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
			<style>
				.b-example-divider {
				  height: 3rem;
				  background-color: rgba(0, 0, 0, .1);
				  border: solid rgba(0, 0, 0, .15);
				  border-width: 1px 0;
				  box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
				}

				.bi {
				  vertical-align: -.125em;
				  fill: currentColor;
				}

				.feature-icon {
				  display: inline-flex;
				  align-items: center;
				  justify-content: center;
				  width: 4rem;
				  height: 4rem;
				  margin-bottom: 1rem;
				  font-size: 2rem;
				  color: #fff;
				  border-radius: .75rem;
				}

				.icon-link {
				  display: inline-flex;
				  align-items: center;
				}
				.icon-link > .bi {
				  margin-top: .125rem;
				  margin-left: .125rem;
				  transition: transform .25s ease-in-out;
				  fill: currentColor;
				}
				.icon-link:hover > .bi {
				  transform: translate(.25rem);
				}

				.icon-square {
				  display: inline-flex;
				  align-items: center;
				  justify-content: center;
				  width: 3rem;
				  height: 3rem;
				  font-size: 1.5rem;
				  border-radius: .75rem;
				}

				.text-shadow-1 { text-shadow: 0 .125rem .25rem rgba(0, 0, 0, .25); }
				.text-shadow-2 { text-shadow: 0 .25rem .5rem rgba(0, 0, 0, .25); }
				.text-shadow-3 { text-shadow: 0 .5rem 1.5rem rgba(0, 0, 0, .25); }

				.card-cover {
				  background-repeat: no-repeat;
				  background-position: center center;
				  background-size: cover;
				}
			</style>
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

		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

@endsection