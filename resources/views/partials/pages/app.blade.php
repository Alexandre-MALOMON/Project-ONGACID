<!DOCTYPE html>
<html lang="en">
@include('partials.pages.head')

<body>

    @include('partials.website.header')

    @yield('pages_content')


    @include('partials.website.script')
    @include('partials.website.footer')

</body>

</html>
