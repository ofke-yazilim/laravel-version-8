<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include("frontent.layouts.header")
<body style="padding: 20px;">
    @section('sidebar')

    @show

    <div class="container">
        @yield('content')
    </div>
</body>
@include("frontent.layouts.footer")
</html>
