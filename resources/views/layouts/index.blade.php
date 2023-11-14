<!DOCTYPE html>
<html lang="en">
    @include('layouts.header')

    <style>
        .main-sidebar .sidebar-menu li ul.dropdown-menu li a {
            padding-left: 45px;
        }
    </style>

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
        @include('layouts.navbar')
        @include('layouts.sidebar')

      <!-- Main Content -->
      <div class="main-content">
        @yield('content')
      </div>
        @include('layouts.footer')
    </div>
  </div>

    @include('layouts.script')
</body>
</html>
