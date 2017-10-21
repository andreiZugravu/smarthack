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
{!! Html::style('/assets/css/bootstrap.css') !!}
{!! Html::style('/assets/css/core.css') !!}
{!! Html::style('/assets/css/components.css') !!}
{!! Html::style('/assets/css/colors.css') !!}
{!! Html::style('/assets/css/smarthack.css') !!}


<!-- /global stylesheets -->


</head>


<body class="login-container">

<div class="navbar navbar-inverse">
    <div class="navbar-header">
        {{--<a class="navbar-brand" href="/"><img src="assets/images/logo_light.png" alt=""></a>--}}
        <a class="navbar-brand" href="{{ route("landing.index") }}">Smarthack</a>
        <ul class="nav navbar-nav pull-right visible-xs-block">
            <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
        </ul>
    </div>
</div>

@yield('content')

<!-- Core JS files -->
{!! Html::script('/assets/js/plugins/loaders/pace.min.js') !!}
{!! Html::script('/assets/js/core/libraries/jquery.min.js') !!}
{!! Html::script('/assets/js/core/libraries/bootstrap.min.js') !!}
{!! Html::script('/assets/js/plugins/loaders/blockui.min.js') !!}
<!-- /core JS files -->

<!-- Theme JS files -->
{!! Html::script('/assets/js/plugins/forms/styling/uniform.min.js') !!}
{!! Html::script('/assets/js/core/app.js') !!}
{!! Html::script('/assets/js/pages/login.js') !!}
{!! Html::script('/assets/js/plugins/loaders/pace.min.js') !!}

@stack('scripts')

</body>
</html>

