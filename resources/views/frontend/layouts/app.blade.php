<!DOCTYPE html >
<html class="notranslate">
  <head>
    @include('frontend.base_layouts.header.header')
    @stack('css')
    @yield('title')
  </head>
  <body>
    <a href="#myBtn"></a>
      <x-frontend.header/>
        @yield('content')
        <x-frontend.footer/>
        @include('frontend.base_layouts.footer.footer')
        <button class="myBtn" id="myBtn"><i class="fa fa-arrow-up"></i></button>
    @stack('js')

  </body>
</html>
