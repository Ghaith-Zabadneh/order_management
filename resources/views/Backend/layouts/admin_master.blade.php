<!doctype html >
<html lang="en" dir="rtl">

    <head>

        <meta charset="utf-8" />
        <title>Order Management</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Order Management Project" name="description" />
        <meta content="Ghaith" name="author" />

        @include('Backend.layouts.styles_file')
        @yield('style')

    </head>
    <body data-topbar="dark">

        <!-- <body data-layout="horizontal" data-topbar="dark"> -->

            <!-- Begin page -->
            <div id="layout-wrapper">


                @include('Backend.layouts.body.header')

                <!-- ========== Right Sidebar Start ========== -->
                <div class="vertical-menu">

                    @include('Backend.layouts.body.sidebar')
                </div>
                <!-- Right Sidebar End -->
                <!-- ============================================================== -->
                <!-- Start right Content here -->
                <!-- ============================================================== -->
                <div class="main-content">

                    @yield('body')

                    @include('Backend.layouts.body.footer')

                </div>
                <!-- end main content-->

            </div>
            <!-- END layout-wrapper -->



            @include('Backend.layouts.scripts_files')
            @yield('script')
        </body>

    </html>
