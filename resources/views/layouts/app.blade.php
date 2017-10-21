<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Smarthack</title>

    <!-- Global stylesheets -->
{!! Html::style('/assets/css/fonts/roboto.css') !!}
{!! Html::style('/assets/css/icons/icomoon/styles.css') !!}
{!! Html::style('/assets/css/icons/fontawesome/styles.min.css') !!}
{!! Html::style('/assets/css/bootstrap.css') !!}
{!! Html::style('/assets/css/core.css') !!}
{!! Html::style('/assets/css/components.css') !!}
{!! Html::style('/assets/css/colors.css') !!}

<!-- /global stylesheets -->


    @stack('styles')

    <script>
        window.react = {!! json_encode([
        'csrfToken'=> csrf_token()
        ]) !!};
    </script>

</head>

<body>

@include('elements.navbar.navbar')

<div class="page-container" style="height: 2000px">
    <div class="page-content">
        <div class="sidebar sidebar-main">
            <div class="sidebar-content">
                @include('elements.sidebar.sidebar')
            </div>
        </div>

        <div class="content-wrapper">
            @include('elements.page-header.page-header')
            <div class="content">

                @yield('content')

            </div>
        </div>
    </div>
</div>

{{-- Core --}}
{!! Html::script("/assets/js/plugins/loaders/pace.min.js") !!}
{!! Html::script("/assets/js/core/libraries/jquery.min.js") !!}
{!! Html::script('/assets/js/core/libraries/bootstrap.min.js') !!}
{!! Html::script("/assets/js/plugins/loaders/blockui.min.js") !!}
{!! Html::script("/assets/js/core/app.js") !!}
{!! Html::script("/assets/js/smarthack.js") !!}
{{-- /core --}}

@stack('scripts')

</body>
</html>