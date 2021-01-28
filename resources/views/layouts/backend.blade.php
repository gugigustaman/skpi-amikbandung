<!DOCTYPE html>

<html lang="id" class="default-style layout-fixed">

<head>
  <title>
    @if (Request::segment(3) != null)
		{{ ucfirst(str_replace('-', ' ', Request::segment(2))) }} - @yield('title')
	@else
		@yield('title')
	@endif
 </title>

  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="IE=edge,chrome=1">
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
  <link rel="icon" type="image/x-icon" href="{{ asset('asset/temp_backend/img/favicon.ico') }}">

  <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900" rel="stylesheet">

  <!-- Icon fonts -->
  <link rel="stylesheet" href="{{ asset('asset/temp_backend/vendor/fonts/fontawesome.css') }}">
  <link rel="stylesheet" href="{{ asset('asset/temp_backend/vendor/fonts/ionicons.css') }}">
  <link rel="stylesheet" href="{{ asset('asset/temp_backend/vendor/fonts/linearicons.css') }}">
  <link rel="stylesheet" href="{{ asset('asset/temp_backend/vendor/fonts/open-iconic.css') }}">
  <link rel="stylesheet" href="{{ asset('asset/temp_backend/vendor/fonts/pe-icon-7-stroke.css') }}">

  <!-- Core stylesheets -->
  <link rel="stylesheet" href="{{ asset('asset/temp_backend/vendor/css/rtl/bootstrap.css') }}" class="theme-settings-bootstrap-css">
  <link rel="stylesheet" href="{{ asset('asset/temp_backend/vendor/css/rtl/appwork.css') }}" class="theme-settings-appwork-css">
  <link rel="stylesheet" href="{{ asset('asset/temp_backend/vendor/css/rtl/theme-corporate.css') }}" class="theme-settings-theme-css">
  <link rel="stylesheet" href="{{ asset('asset/temp_backend/vendor/css/rtl/colors.css') }}" class="theme-settings-colors-css">
  <link rel="stylesheet" href="{{ asset('asset/temp_backend/vendor/css/rtl/uikit.css') }}">
  <link rel="stylesheet" href="{{ asset('asset/temp_backend/css/demo.css') }}">

  <!-- Additional stylesheets -->
  <link rel="stylesheet" href="{{ asset('asset/temp_backend/vendor/libs/sweetalert2/sweetalert2.css') }}">
   <link rel="stylesheet" href="{{ asset('asset/temp_backend/css/line-awesome.css') }}">

  <!-- Load polyfills -->
  <script src="{{ asset('asset/temp_backend/vendor/js/polyfills.js') }}"></script>
  <script>document['documentMode']===10&&document.write('<script src="https://polyfill.io/v3/polyfill.min.js?features=Intl.~locale.en"><\/script>')</script>

  <script src="{{ asset('asset/temp_backend/vendor/js/material-ripple.js') }}"></script>
  <script src="{{ asset('asset/temp_backend/vendor/js/layout-helpers.js') }}"></script>

  <!-- Theme settings -->
  <!-- This file MUST be included after core stylesheets and layout-helpers.js in the <head> section -->
  <script src="{{ asset('asset/temp_backend/vendor/js/theme-settings.js') }}"></script>
  <script>
    window.themeSettings = new ThemeSettings({
      cssPath: '{{ asset('asset/temp_backend/vendor/css/rtl') }},
      themesPath: '{{ asset('asset/temp_backend/vendor/css/rtl') }}'
    });
  </script>

  <!-- Core scripts -->
  <script src="{{ asset('asset/temp_backend/vendor/js/pace.js') }}"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <!-- Libs -->
  <link rel="stylesheet" href="{{ asset('asset/temp_backend/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}">
  @yield('css')
  <link rel="stylesheet" href="{{ asset('asset/temp_backend/vendor/libs/sweetalert2/sweetalert2.css') }}">
  <link rel="stylesheet" href="{{ asset('asset/temp_backend/vendor/libs/growl/growl.css') }}">
  <link rel="stylesheet" href="{{ asset('asset/temp_backend/vendor/libs/toastr/toastr.css') }}">
  <link rel="stylesheet" href="{{ asset('asset/temp_backend/vendor/libs/spinkit/spinkit.css') }}">
  <link rel="stylesheet" href="{{ asset('asset/temp_backend/vendor/libs/nestable/nestable.css')}}">
  <link rel="stylesheet" href="{{ asset('asset/temp_backend/vendor/libs/jstree/themes/default/style.css')}}">

  <link rel="stylesheet" href="{{ asset('asset/temp_backend/vendor/libs/datatables/datatables.css')}}">

</head>

<body>
  <div class="page-loader">
    <div class="bg-primary"></div>
  </div>

  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-2">
    <div class="layout-inner">

      <!-- Layout sidenav -->
      <div id="layout-sidenav" class="layout-sidenav sidenav sidenav-vertical bg-dark">

        <!-- Brand demo (see asset/css/demo/demo.css) -->
        <div class="app-brand demo">
          <span class="app-brand-logo demo bg-primary">
            <svg viewBox="0 0 148 80" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><defs><linearGradient id="a" x1="46.49" x2="62.46" y1="53.39" y2="48.2" gradientUnits="userSpaceOnUse"><stop stop-opacity=".25" offset="0"></stop><stop stop-opacity=".1" offset=".3"></stop><stop stop-opacity="0" offset=".9"></stop></linearGradient><linearGradient id="e" x1="76.9" x2="92.64" y1="26.38" y2="31.49" xlink:href="#a"></linearGradient><linearGradient id="d" x1="107.12" x2="122.74" y1="53.41" y2="48.33" xlink:href="#a"></linearGradient></defs><path style="fill: #fff;" transform="translate(-.1)" d="M121.36,0,104.42,45.08,88.71,3.28A5.09,5.09,0,0,0,83.93,0H64.27A5.09,5.09,0,0,0,59.5,3.28L43.79,45.08,26.85,0H.1L29.43,76.74A5.09,5.09,0,0,0,34.19,80H53.39a5.09,5.09,0,0,0,4.77-3.26L74.1,35l16,41.74A5.09,5.09,0,0,0,94.82,80h18.95a5.09,5.09,0,0,0,4.76-3.24L148.1,0Z"></path><path transform="translate(-.1)" d="M52.19,22.73l-8.4,22.35L56.51,78.94a5,5,0,0,0,1.64-2.19l7.34-19.2Z" fill="url(#a)"></path><path transform="translate(-.1)" d="M95.73,22l-7-18.69a5,5,0,0,0-1.64-2.21L74.1,35l8.33,21.79Z" fill="url(#e)"></path><path transform="translate(-.1)" d="M112.73,23l-8.31,22.12,12.66,33.7a5,5,0,0,0,1.45-2l7.3-18.93Z" fill="url(#d)"></path></svg>
          </span>
          <a href="" class="app-brand-text demo sidenav-text font-weight-normal ml-2">SKPI</a>
          <a href="javascript:void(0)" class="layout-sidenav-toggle sidenav-link text-large ml-auto">
            <i class="ion ion-md-menu align-middle"></i>
          </a>
        </div>

        <div class="sidenav-divider mt-0"></div>
            @include('backend.sidebar')
        </div>
      <!-- / Layout sidenav -->

      <!-- Layout container -->
      <div class="layout-container">
        <!-- Layout navbar -->
        <nav class="layout-navbar navbar navbar-expand-lg align-items-lg-center bg-white container-p-x" id="layout-navbar">

          <!-- Brand demo (see asset/css/demo/demo.css) -->
          <a href="" class="navbar-brand app-brand demo d-lg-none py-0 mr-4">
            <span class="app-brand-logo demo bg-primary">
              <svg viewBox="0 0 148 80" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><defs><linearGradient id="a" x1="46.49" x2="62.46" y1="53.39" y2="48.2" gradientUnits="userSpaceOnUse"><stop stop-opacity=".25" offset="0"></stop><stop stop-opacity=".1" offset=".3"></stop><stop stop-opacity="0" offset=".9"></stop></linearGradient><linearGradient id="e" x1="76.9" x2="92.64" y1="26.38" y2="31.49" xlink:href="#a"></linearGradient><linearGradient id="d" x1="107.12" x2="122.74" y1="53.41" y2="48.33" xlink:href="#a"></linearGradient></defs><path style="fill: #fff;" transform="translate(-.1)" d="M121.36,0,104.42,45.08,88.71,3.28A5.09,5.09,0,0,0,83.93,0H64.27A5.09,5.09,0,0,0,59.5,3.28L43.79,45.08,26.85,0H.1L29.43,76.74A5.09,5.09,0,0,0,34.19,80H53.39a5.09,5.09,0,0,0,4.77-3.26L74.1,35l16,41.74A5.09,5.09,0,0,0,94.82,80h18.95a5.09,5.09,0,0,0,4.76-3.24L148.1,0Z"></path><path transform="translate(-.1)" d="M52.19,22.73l-8.4,22.35L56.51,78.94a5,5,0,0,0,1.64-2.19l7.34-19.2Z" fill="url(#a)"></path><path transform="translate(-.1)" d="M95.73,22l-7-18.69a5,5,0,0,0-1.64-2.21L74.1,35l8.33,21.79Z" fill="url(#e)"></path><path transform="translate(-.1)" d="M112.73,23l-8.31,22.12,12.66,33.7a5,5,0,0,0,1.45-2l7.3-18.93Z" fill="url(#d)"></path></svg>
            </span>
            <span class="app-brand-text demo font-weight-normal ml-2">Appwork</span>
          </a>

          <!-- Sidenav toggle (see asset/css/demo/demo.css) -->
          <div class="layout-sidenav-toggle navbar-nav d-lg-none align-items-lg-center mr-auto">
            <a class="nav-item nav-link px-0 mr-lg-4" href="javascript:void(0)">
              <i class="ion ion-md-menu text-large align-middle"></i>
            </a>
          </div>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#layout-navbar-collapse">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="navbar-collapse collapse" id="layout-navbar-collapse">
            <!-- Divider -->
            <hr class="d-lg-none w-100 my-2">

            <div class="navbar-nav align-items-lg-center">
              <!-- Search -->
             
            </div>

            <div class="navbar-nav align-items-lg-center ml-auto">
              <!-- Divider -->
              <div class="nav-item d-none d-lg-block text-big font-weight-light line-height-1 opacity-25 mr-3 ml-1">|</div>

              <div class="demo-navbar-user nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
                  <span class="d-inline-flex flex-lg-row-reverse align-items-center align-middle">
                    <img src="{{ Auth::user()['profile_photo_path'] != null ? asset('userfile/photo/'.Auth::user()['profile_photo_path']) : asset('asset/temp_backend/img/avatars/1.png')  }}" alt class="d-block ui-w-30 rounded-circle">
                    <span class="px-1 mr-lg-2 ml-2 ml-lg-0">{{ Auth::user()['name'] }}</span>
                  </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                  <a href="" class="dropdown-item"><i class="ion ion-ios-person text-lightest"></i> &nbsp; My profile</a>
                   <div class="dropdown-divider"></div>
                  <a href="{{ route('logout') }}"onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="dropdown-item"><i class="ion ion-ios-log-out text-danger"></i> &nbsp; Log Out</a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                  </form>
                </div>
              </div>
            </div>
          </div>
        </nav>
        <!-- / Layout navbar -->

        <!-- Layout content -->
        <div class="layout-content">
            @yield('content')
          <!-- Content -->
        
          <!-- / Content -->

          <!-- Layout footer -->
          <nav class="layout-footer footer bg-footer-theme">
            <div class="container-fluid d-flex flex-wrap justify-content-between text-center container-p-x pb-3">
              <div class="pt-3">
                <span class="footer-text font-weight-bolder">SKPI </span> ©
              </div>
              <div>
                
              </div>
            </div>
          </nav>
          <!-- / Layout footer -->

        </div>
        <!-- Layout content -->

      </div>
      <!-- / Layout container -->

    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-sidenav-toggle"></div>
  </div>
  <!-- / Layout wrapper -->

  <!-- Core scripts -->
  <script src="{{ asset('asset/temp_backend/vendor/libs/popper/popper.js') }}"></script>
  <script src="{{ asset('asset/temp_backend/vendor/js/bootstrap.js') }}"></script>
  <script src="{{ asset('asset/temp_backend/vendor/js/sidenav.js') }}"></script>

  <!-- Libs -->
  <script src="{{ asset('asset/temp_backend/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
  <script src="{{ asset('asset/temp_backend/js/ui_modals.js') }}"></script>
  <script src="{{ asset('asset/temp_backend/vendor/libs/chartjs/chartjs.js') }}"></script>
  @yield('jsfoot')
  <!-- Demo -->
  <script src="{{ asset('asset/temp_backend/js/demo.js') }}"></script>
  <script src="{{ asset('asset/temp_backend/js/dashboards_dashboard-2.js') }}"></script>
  <script src="{{ asset('asset/temp_backend/js/ui_modals.js') }}"></script>
  <script src="{{ asset('asset/temp_backend/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>
  <script src="{{ asset('asset/temp_backend/vendor/libs/growl/growl.js') }}"></script>
  <script src="{{ asset('asset/temp_backend/vendor/libs/toastr/toastr.js') }}"></script>
  <!-- Demo -->

  <script src="{{ asset('asset/temp_backend/vendor/libs/datatables/datatables.js')}}"></script>

<!-- Demo -->
<script src="{{ asset('asset/temp_backend/js/demo.js')}}"></script>
<script src="{{ asset('asset/temp_backend/js/tables_datatables.js')}}"></script>

  <script src="{{ asset('asset/temp_backend/js/ui_tooltips.js')}}"></script>
  @yield('jsbody')

</body>

</html>