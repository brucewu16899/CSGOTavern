<!DOCTYPE html>
<!--[if IE 8]>
<html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]>
<html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
{{--<!-- BEGIN HEAD -->--}}
<head>
    <meta charset="utf-8"/>
    <title>
        @section('title')
            :: @setting('platform.app.title')
        @show
    </title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <meta name="description" content="@yield('meta-description')">
    <meta name="author" content="Vionox Inc."/>
    <meta name="description" content="A Skin Site for the Masses"/>
    <meta name="keywords" content="csgo,skins,tavern,sell">
    {{--<meta name="base_url" content="{{ URL::to('/') }}"> --}}
    <meta name="base_asset_url" content="{{ Asset::getUrl('/') }}">
    <meta name="base_url" content="{{ url('/') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ Asset::getUrl('img/icons/favicon-beer.ico') }}">
    {{--<!-- BEGIN GLOBAL MANDATORY STYLES -->--}}
    <link href="//fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet"
          type="text/css">
    {{ Asset::queue('font-awesome', 'font-awesome/css/font-awesome.min.css') }}
    {{ Asset::queue('simple-line-icons', 'global/plugins/simple-line-icons/simple-line-icons.min.css', 'font-awesome') }}
    {{ Asset::queue('bootstrap', 'global/plugins/bootstrap/css/bootstrap.min.css', 'simple-line-icons') }}
    {{ Asset::queue('unsemantic', 'plugins/unsemantic/assets/stylesheets/unsemantic-grid-responsive.css', 'bootstrap') }}
    {{ Asset::queue('uniform.default', 'global/plugins/uniform/css/uniform.default.css', 'unsemantic') }}
    {{--<!-- END GLOBAL MANDATORY STYLES -->--}}
    {{--<!-- BEGIN THEME STYLES -->--}}
    {{ Asset::queue('components', 'global/css/components-md.css', 'uniform.default') }}
    {{ Asset::queue('plugins', 'global/css/plugins-md.css', 'components') }}
    {{ Asset::queue('custom', 'css/master.css', 'plugins') }}
    {{ Asset::queue('layout', 'sass/admin/layout3/layout.scss', 'custom') }}
    {{--    {{ Asset::queue('style', 'sass/themes/tavern.scss', 'layout') }}--}}
    {{ Asset::queue('style', 'sass/themes/tavern.scss', 'layout') }}
    {{--<!-- END THEME STYLES -->--}}
    {{-- Compiled styles --}}
    @foreach (Asset::getCompiledStyles() as $style)
        <link href="{{ $style }}" rel="stylesheet">
    @endforeach

    {{-- Call custom inline styles --}}
    @section('styles')
    @show

    <!--[if (lt IE 9) & (!IEMobile)]>
        <link rel="stylesheet" href="{{ Asset::getUrl('plugins/unsemantic/assets/stylesheets/ie.css') }}"/>
        <![endif]-->
</head>
{{--<!-- END HEAD -->--}}
{{--<!-- BEGIN BODY -->--}}
<body class="page-md" id="page-body">
@include('extensions/google/tagmanager')
{{--<!-- BEGIN HEADER -->--}}
@include('partials/header')
{{--<!-- END HEADER -->--}}
{{--<!-- BEGIN PAGE CONTAINER -->--}}
<div class="page-container">

    <div class="page-head">
        <div class="container-fluid">
            @yield('page-head')
        </div>
    </div>

    <div class="page-content">
        <div class="container-fluid">
            @yield('page')
        </div>
    </div>
</div>
{{--<!-- END PAGE CONTAINER -->--}}
{{--<!-- BEGIN FOOTER -->--}}
@include('partials/footer')
{{--<!-- END FOOTER -->--}}
{{--<!-- BEGIN JAVASCRIPTS -->--}}
<!--[if lt IE 9]>
<script src="{{ Asset::getUrl('global/plugins/respond.min.js') }}"></script>
<script src="{{ Asset::getUrl('global/plugins/excanvas.min.js') }}"></script>
<![endif]-->
{{--<script type="text/javascript" src="https://js.stripe.com/v2/"></script>--}}
{{ Asset::queue('jquery', 'global/plugins/jquery.min.js') }}

{{--{{ Asset::queue('unsemantic', 'plugins/unsemantic/assets/stylesheets/unsemantic-grid-responsive.css', 'jquery') }}--}}

{{ Asset::queue('jquery-migrate', 'global/plugins/jquery-migrate.min.js', 'jquery') }}
{{-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip --> --}}
{{ Asset::queue('jquery-ui', 'global/plugins/jquery-ui/jquery-ui.min.js', 'jquery') }}
{{ Asset::queue('bootstrap', 'global/plugins/bootstrap/js/bootstrap.min.js', 'jquery') }}
{{ Asset::queue('bootstrap-hover-dropdown', 'global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js', 'bootstrap') }}
{{ Asset::queue('jquery-slimscroll', 'global/plugins/jquery-slimscroll/jquery.slimscroll.min.js', 'jquery') }}
{{ Asset::queue('jquery.blockui', 'global/plugins/jquery.blockui.min.js', 'jquery') }}
{{ Asset::queue('jquery.cokie', 'global/plugins/jquery.cokie.min.js', 'jquery') }}
{{ Asset::queue('uniform', 'global/plugins/uniform/jquery.uniform.min.js', 'jquery') }}

{{ Asset::queue('metronic', 'global/scripts/metronic.js', [ 'jquery', 'jquery-migrate', 'jquery-ui', 'bootstrap', 'bootstrap-hover-dropdown', 'jquery-slimscroll',
    'jquery.blockui', 'jquery.cokie', 'uniform' ]) }}
{{ Asset::queue('layout', 'admin/layout3/scripts/layout.js', 'metronic') }}

{{--{{ Asset::queue('sockjs', 'plugins/sockjs-client/sockjs.min.js', 'layout') }}--}}
{{--{{ Asset::queue('stomp-websocket', 'plugins/stomp-websocket/stomp.min.js', 'sockjs') }}--}}
{{--{{ Asset::queue('amqp-handler', 'js/amqp/amqp-handler.js', ['sockjs', 'stomp-websocket']) }}--}}

{{-- Compiled scripts --}}
@foreach ( Asset::getCompiledScripts() as $script )
    <script src="{{ $script }}"></script>
@endforeach

{{-- Call custom inline scripts --}}
@section( 'scripts' )
    <script>
        jQuery(document).ready(function () {
            Metronic.init();
            Layout.init();
        });
    </script>
@show
{{--<!-- END JAVASCRIPTS -->--}}
</body>
{{--<!-- END BODY -->--}}
</html>