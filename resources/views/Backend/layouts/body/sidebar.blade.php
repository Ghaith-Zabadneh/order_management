<div data-simplebar class="h-100">

    <!-- User details -->
    <div class="user-profile text-center mt-3">
        <div class="">
            <img src="{{asset('image/profile.png')}}" alt="" class="avatar-md rounded-circle">
        </div>
        <div class="mt-3">
            <h4 class="font-size-16 mb-1">{{Auth::user()->name}}</h4>
            <span class="text-muted"><i class="ri-record-circle-line align-middle font-size-14 text-success"></i> متصل</span>
        </div>
    </div>

    <!--- Sidemenu -->
    <div id="sidebar-menu">
        <!-- Left Menu Start -->
        @if(Auth::user()->role == 'user')
        <ul class="metismenu list-unstyled" id="side-menu">
            <li class="menu-title" >القائمة</li>

            <li>
                <a href="{{route('user-dashboard')}}" class="waves-effect">
                    <i class="ri-dashboard-line"></i>
                    <span style="font-size: 14px">لوحة التحكم</span>
                </a>
            </li>

            <li>
                <a href="{{route('user-order.create')}}" class=" waves-effect" >
                    <i class=" ri-file-edit-fill"></i>
                    <span  style="font-size: 14px">إضافة طلب</span>
                </a>
            </li>

        </ul>
        @elseif (Auth::user()->role == 'admin')
        <ul class="metismenu list-unstyled" id="side-menu">
            <li class="menu-title">القائمة</li>

            <li>
                <a href="{{route('admin.index')}}" class="waves-effect">
                    <i class="ri-dashboard-line"></i><span class="badge rounded-pill bg-success float-end"></span>
                    <span>لوحة التحكم</span>
                </a>
            </li>

            <li>
                <a href="{{route('admin.show','user')}}" class=" waves-effect">
                    <i class=" fas fa-user"></i>
                    <span>جدول المستخدمين</span>
                </a>
            </li>
            <li>
                <a href="{{route('get-order')}}" class=" waves-effect">
                    <i class="ri-calendar-2-line"></i>
                    <span>جدول الطلبات</span>
                </a>
            </li>

        </ul>

        @elseif (Auth::user()->role == 'employee')
        <ul class="metismenu list-unstyled" id="side-menu">
            <li class="menu-title">القائمة </li>

            <li>
                <a href="{{route('employee-order.index')}}" class="waves-effect">
                    <i class="ri-dashboard-line"></i><span class="badge rounded-pill bg-success float-end"></span>
                    <span>لوحة التحكم</span>
                </a>
            </li>

            <li>
                <a href="{{route('employee-order.show','order')}}" class=" waves-effect">
                    <i class="ri-calendar-2-line"></i>
                    <span>جدول الطلبات</span>
                </a>
            </li>

        </ul>
        @endif
    </div>
    <!-- Sidebar -->
</div>
