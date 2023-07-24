<!DOCTYPE html>
<html lang="en">
  @include('reviewer.partials.head')
  <body>
    <div class="main-wrapper">
      @include('reviewer.partials.header')
      @include('reviewer.partials.sidebar')
      <div class="page-wrapper">
        <div class="content container-fluid">
          @yield('content')
    </div>
    @include('reviewer.partials.scripts')
  </body>
</html>