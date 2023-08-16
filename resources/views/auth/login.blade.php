<!doctype html>
<html lang="en" dir="rtl" >

    <head>

        <meta charset="utf-8" />
        <title>تسجيل الدخول</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Order Management Project" name="description" />
        <meta content="Ghaith" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{asset('assets/images/icon.png')}}">

       <!-- Bootstrap Css -->
        <link href="{{asset('assets/css/bootstrap-rtl.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{asset('assets/css/icons-rtl.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{asset('assets/css/app-rtl.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />

    </head>
    <body class="auth-body-bg">
        <div class="bg-overlay"></div>
        <div class="wrapper-page">
            <div class="container-fluid p-0">
                <div class="card">
                    <div class="card-body">

                        <div class="text-center mt-4">
                            <div class="mb-3">
                                <a href="{{route('login')}}" class="auth-logo">
                                    <img src="{{asset('assets/images/logo-lg.png')}}" height="45" class="logo-dark mx-auto" alt="">
                                    <img src="{{asset('assets/images/logo-lg.png')}}" height="30" class="logo-light mx-auto" alt="">
                                </a>
                            </div>
                        </div>

                        <h4 class="text-muted text-center font-size-18"><b>تسجيل الدخول</b></h4>


                        <div class="p-3">
                            <form class="form-horizontal mt-3" method="POST" action="{{ route('login') }}" dir="ltr">
                                @csrf

                                <div class="form-group mb-3 row">
                                    <div class="col-12">
                                        <input class="form-control" type="email" name="email"  required  placeholder="Your Email">
                                        @if ($errors->has('email'))
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                        @endif

                                    </div>
                                </div>

                                <div class="form-group mb-3 row">
                                    <div class="col-12">
                                        <input class="form-control" type="password" name="password" required placeholder="Your Password">
                                    </div>
                                </div>



                                <div class="form-group mb-3 text-center row mt-3 pt-1">
                                    <div class="col-12">
                                        <button class="btn btn-info w-100 waves-effect waves-light" type="submit">تسجيل الدخول</button>
                                    </div>
                                </div>

                                <div class="form-group mb-0 row mt-2" dir="rtl">
                                    <div class="col-sm-7 mt-3">
                                        <a href="{{route('404_page')}}" class="text-muted"><i class="mdi mdi-lock"></i> نسيت كلمة السر؟ </a>
                                    </div>
                                    <div class="col-sm-5 mt-3">
                                        <a href="{{route('register')}}" class="text-muted"><i class="mdi mdi-account-circle"></i> إنشاء حساب</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- end -->
                    </div>
                    <!-- end cardbody -->
                </div>
                <!-- end card -->
            </div>
            <!-- end container -->
        </div>
        <!-- end -->

            <!-- JAVASCRIPT -->
            <script src="assets/libs/jquery/jquery.min.js"></script>
            <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
            <script src="assets/libs/metismenu/metisMenu.min.js"></script>
            <script src="assets/libs/simplebar/simplebar.min.js"></script>
            <script src="assets/libs/node-waves/waves.min.js"></script>

            <script src="assets/js/app.js"></script>

    </body>
</html>

