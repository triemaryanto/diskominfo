<!DOCTYPE html>
<html lang="en">

<head>
    @include('content.head')
</head>

<body class="hold-transition login-page">
    <div id="app"></div>
    <div class="login-box">
        <div class="login-logo ">
            <img src="https://diskominfo.wonosobokab.go.id/front/assets/images/diskominfo.png" class="rounded mx-auto d-block" alt="Logo" border="0" width="200" style="display: block; width: 200px; max-width: 200px; min-width: 200px;">
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">ADMINNISTRATOR</p>

                <form action="{{ route('proses') }}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" name="email" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="password" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    @if (session('failed'))
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fas fa-ban"></i> Alert!</h5>
                        {{ session('failed') }}
                    </div>

                    @endif
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <!-- /.social-auth-links -->
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    @include('content.script')
</body>

</html>