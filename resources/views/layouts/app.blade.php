<!DOCTYPE html>
<html lang="en">
@include('layouts.app.head')
<body>
    @include('layouts.app.header')
    <div class="container">

        @yield('content')

        @include('layouts.app.footer')
      </div>
</body>
</html>