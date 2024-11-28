<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>@yield('title'){{ config('app.name', 'Laravel') }}</title>

    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="{{ asset('admin/css/font-awesome.css') }}" rel="stylesheet">

    <!-- Ico-font -->
    <link href="{{ asset('admin/css/vendors/icofont.css') }}" rel="stylesheet">

    <!-- Themify icon-->
    <link href="{{ asset('admin/css/vendors/themify.css') }}" rel="stylesheet">

    <!-- Flag icon -->
    <link href="{{ asset('admin/css/vendors/flag-icon.css') }}" rel="stylesheet">

    <!-- Feather icon -->
    <link href="{{ asset('admin/css/vendors/feather-icon.css') }}" rel="stylesheet">

    <!-- Plugins CSS Start -->
    <link href="{{ asset('admin/css/vendors/scrollbar.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/vendors/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/vendors/chartist.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/vendors/date-picker.css') }}" rel="stylesheet">
    <!-- Plugins CSS End -->

    <!-- Bootstrap CSS -->
    <link href="{{ asset('admin/css/vendors/bootstrap.css') }}" rel="stylesheet">

    <!-- App CSS -->
    <link href="{{ asset('admin/css/style.css') }}" rel="stylesheet">

    <!-- Color Scheme -->
    <link id="color" href="{{ asset('admin/css/color-1.css') }}" rel="stylesheet" media="screen">

    <!-- Responsive CSS -->
    <link href="{{ asset('admin/css/responsive.css') }}" rel="stylesheet">

    @livewireStyles
</head>
<body>

  <div class="page-wrapper compact-wrapper" id="pageWrapper">
    @include('layouts.inc.admin.navbar')
    <div class="page-body-wrapper">
        @include('layouts.inc.admin.sidebar')
        <div class="page-body">
          <div class="container-fluid"> 
                @yield('content')
            </div>
        </div>
    </div>
</div>

<!-- Latest jQuery -->
<script src="{{ asset('admin/js/jquery-3.5.1.min.js') }}"></script>

<!-- Bootstrap JS -->
<script src="{{ asset('admin/js/bootstrap/bootstrap.bundle.min.js') }}"></script>

<!-- Feather Icon JS -->
<script src="{{ asset('admin/js/icons/feather-icon/feather.min.js') }}"></script>
<script src="{{ asset('admin/js/icons/feather-icon/feather-icon.js') }}"></script>

<!-- Scrollbar JS -->
<script src="{{ asset('admin/js/scrollbar/simplebar.js') }}"></script>
<script src="{{ asset('admin/js/scrollbar/custom.js') }}"></script>

<!-- Sidebar JS -->
<script src="{{ asset('admin/js/config.js') }}"></script>

<!-- Plugins JS Start -->
<script src="{{ asset('admin/js/sidebar-menu.js') }}"></script>
<script src="{{ asset('admin/js/chart/chartist/chartist.js') }}"></script>
<script src="{{ asset('admin/js/chart/chartist/chartist-plugin-tooltip.js') }}"></script>
<script src="{{ asset('admin/js/chart/knob/knob.min.js') }}"></script>
<script src="{{ asset('admin/js/chart/knob/knob-chart.js') }}"></script>
<script src="{{ asset('admin/js/chart/apex-chart/apex-chart.js') }}"></script>
<script src="{{ asset('admin/js/chart/apex-chart/stock-prices.js') }}"></script>
<script src="{{ asset('admin/js/notify/bootstrap-notify.min.js') }}"></script>
<script src="{{ asset('admin/js/dashboard/default.js') }}"></script>
<script src="{{ asset('admin/js/notify/index.js') }}"></script>
<script src="{{ asset('admin/js/datepicker/date-picker/datepicker.js') }}"></script>
<script src="{{ asset('admin/js/datepicker/date-picker/datepicker.en.js') }}"></script>
<script src="{{ asset('admin/js/datepicker/date-picker/datepicker.custom.js') }}"></script>
<script src="{{ asset('admin/js/typeahead/handlebars.js') }}"></script>
<script src="{{ asset('admin/js/typeahead/typeahead.bundle.js') }}"></script>
<script src="{{ asset('admin/js/typeahead/typeahead.custom.js') }}"></script>
<script src="{{ asset('admin/js/typeahead-search/handlebars.js') }}"></script>
<script src="{{ asset('admin/js/typeahead-search/typeahead-custom.js') }}"></script>
<script src="{{ asset('admin/js/tooltip-init.js') }}"></script>
<!-- Plugins JS End -->

<!-- Theme JS -->
<script src="{{ asset('admin/js/script.js') }}"></script>
<script src="{{ asset('admin/js/theme-customizer/customizer.js') }}"></script>

<!-- Livewire Scripts -->
@livewireScripts

</body>
</html>