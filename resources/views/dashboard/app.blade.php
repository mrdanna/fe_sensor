
<!DOCTYPE html>
<html lang="en">
    @include('dashboard.plugin')
    <body>
        <div class="wrapper flex">
            @include('dashboard.sidebar')
            <div class="main flex-1 flex flex-col">
                @include('dashboard.header')

                <div class="content flex-1 p-6">
                    @yield('content')
                </div>

                @include('dashboard.footer')
            </div>
        </div>
        @include('dashboard.script')
    </body>
</html>
