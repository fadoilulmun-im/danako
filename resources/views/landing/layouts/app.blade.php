<!doctype html>
<html lang="zxx">

<head>
    @include('landing.includes.meta')

    <title>@yield('title')</title>

    @stack('before-style')
    @include('landing.includes.style')
    @stack('after-style')
</head>

<body>

    <div class="loader-content">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="sk-circle">
                    <div class="sk-circle1 sk-child"></div>
                    <div class="sk-circle2 sk-child"></div>
                    <div class="sk-circle3 sk-child"></div>
                    <div class="sk-circle4 sk-child"></div>
                    <div class="sk-circle5 sk-child"></div>
                    <div class="sk-circle6 sk-child"></div>
                    <div class="sk-circle7 sk-child"></div>
                    <div class="sk-circle8 sk-child"></div>
                    <div class="sk-circle9 sk-child"></div>
                    <div class="sk-circle10 sk-child"></div>
                    <div class="sk-circle11 sk-child"></div>
                    <div class="sk-circle12 sk-child"></div>
                </div>
            </div>
        </div>
    </div>

        @include('landing.includes.navbar')
                    @yield('content')    
        @include('landing.includes.footer')
       
 
    @stack('before-script')
    @include('landing.includes.script')
    @stack('after-script')
</body>

</html>
