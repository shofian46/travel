<!-- @format -->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>@yield('title')</title>
  @stack('prepend-style')
  @include('includes.style')
  @stack('addon-style')
</head>

<body>
  <div class="container">
      @include('includes.navbar')
  </div>
  @yield('content')
  @include('includes.footer')
  @include('includes.script')
</body>

</html>
