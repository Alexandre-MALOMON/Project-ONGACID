<!DOCTYPE html>
<html lang="fr">
@include('partials.website.head')

<body>
    @include('partials.website.header')

    @yield('website_content')

    @include('partials.website.footer')
    @include('partials.website.script')

</body>
<script type="text/javascript">
    var url = "{{ route('changeLang') }}";

    $(".changeLang").change(function() {
        console.log('oh');
        window.location.href = url + "?lang=" + $(this).val();
    });
</script>

</html>
