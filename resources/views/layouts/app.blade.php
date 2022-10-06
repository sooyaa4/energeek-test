<!doctype html>
<html lang="en">
    <head>
        @include('includes.meta')

        @stack('before-style')
        @include('includes.styles')
        @stack('after-style')

        <title>{{ $title ?? env('APP_NAME') }}</title>
    </head>
    <body>
        <div class="w-80">           

            @include('partials.alert')

            @yield('content')
           
        </div>

        @stack('before-script')
        @include('includes.script')
        @stack('after-script')

    </body>
</html>