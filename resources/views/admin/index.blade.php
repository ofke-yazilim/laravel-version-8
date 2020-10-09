<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include("admin.layouts.header")
<body style="padding: 20px;">
    @section('sidebar')

    @show

    <div class="container">
        @yield('content')
    </div>
</body>
@include("admin.layouts.footer")
</html>
