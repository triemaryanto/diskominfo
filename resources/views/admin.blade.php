<!DOCTYPE html>
<html lang="en">

<head>
    @include('content.head')
    <title>Halaman | Admin</title>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper" id="app">
        @include('content.nav')
        @include('content.aside')
        <div class="content-wrapper">
            <div class="content">
                <router-view></router-view>
            </div>
        </div>
        @include('content.footer')
    </div>
    @include('content.script')
</body>

</html>