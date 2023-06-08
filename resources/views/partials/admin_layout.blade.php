<!DOCTYPE html>
<html lang="en">
<script src="https://cdn.tiny.cloud/1/xnd9dwfurd8tzwtcx1yr68qca5zq09b0v66cnn0b4z5d9jw6/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

@include('partials.head')

<body id="page-top">
    <div id="wrapper">
        @include('partials.sidebar')
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                @include('partials.topbar')
                <div>
                    @yield('content')
                </div>
            </div>
            <div>
                @include('partials.scripts')
            </div>

</body>
<script type="text/javascript">
    var url = "{{ route('changeLang') }}";

    $(".changeLang").change(function() {
        console.log('oh');
        window.location.href = url + "?lang=" + $(this).val();
    });


    tinymce.init({
        selector: 'textarea#myTextarea', // Replace this CSS selector to match the placeholder element for TinyMCE
        plugins: 'code table lists',
        toolbar: 'undo redo | formatselect| bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table'
    });
</script>

</html>
