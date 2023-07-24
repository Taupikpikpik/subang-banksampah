<!DOCTYPE html>
<html lang="en">
  @include('admin.partials.head')
  <body>
    <div class="main-wrapper">
      @include('admin.partials.header')
      @include('admin.partials.sidebar')
      <div class="page-wrapper">
        <div class="content container-fluid">
          @yield('content')
    </div>
    @include('admin.partials.scripts')
  </body>
</html>