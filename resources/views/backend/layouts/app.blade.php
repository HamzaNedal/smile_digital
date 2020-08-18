<!DOCTYPE html >
<html >
  <head>
    <x-backend.base_layout.header.header />
    @stack('css')
    <title>@yield('title')</title>
  </head>
  <body class="hold-transition sidebar-mini layout-fixed">
   
    <div class="wrapper">
      <x-backend.base_layout.aside />
      <x-backend.base_layout.nav />
      <div class="content-wrapper">
        @yield('content')
      </div>
        <x-backend.base_layout.footer.footer />
     </div>
    
     <x-backend.base_layout.footer.footer-meta />
    @stack('js')

  </body>
</html>
