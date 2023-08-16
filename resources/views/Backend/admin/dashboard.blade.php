@extends('Backend.layouts.admin_master')
@section('body')

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-xl-4 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="text-truncate font-size-14 mb-2">عدد المستخدمين</p>
                                <h4 class="mb-2">{{$users_count == 0 ? '0' : $users_count}}</h4>

                            </div>
                            <div class="avatar-sm">
                                <span class="avatar-title bg-light text-primary rounded-3">
                                    <i class=" ri-survey-line font-size-24"></i>
                                </span>
                            </div>
                        </div>
                    </div><!-- end cardbody -->
                </div><!-- end card -->
            </div><!-- end col -->
            <div class="col-xl-4 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="text-truncate font-size-14 mb-2">عدد الموظفين</p>

                                <h4 class="mb-2">{{$employees_count == 0 ? '0' : $employees_count}}</h4>

                            </div>
                            <div class="avatar-sm">
                                <span class="avatar-title bg-light text-success rounded-3">
                                    <i class="ri-todo-line font-size-24"></i>
                                </span>
                            </div>
                        </div>
                    </div><!-- end cardbody -->
                </div><!-- end card -->
            </div><!-- end col -->
            <div class="col-xl-4 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="text-truncate font-size-14 mb-2">عدد الطلبات</p>
                                <h4 class="mb-2">{{count($orders)== 0 ? '0' : count($orders)}}</h4>
                            </div>
                            <div class="avatar-sm">
                                <span class="avatar-title bg-light text-primary rounded-3">
                                    <i class=" ri-file-forbid-line font-size-24"></i>
                                </span>
                            </div>
                        </div>
                    </div><!-- end cardbody -->
                </div><!-- end card -->
            </div><!-- end col -->

        </div><!-- end row -->

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title mb-4">جدول المستخدمين</h4>

                        <div class="table-responsive">
                            <table class="table table-centered mb-0 align-middle table-hover table-nowrap">
                                <thead class="table-light">
                                    <tr>
                                        <th>الرقم التسلسلي</th>
                                        <th>اسم المستخدم</th>
                                        <th>البريد الالكتروني</th>
                                        <th>الكود</th>
                                        <th>الوظيفة</th>
                                        <th>الحالة</th>
                                        <th>العمليات</th>
                                    </tr>
                                </thead><!-- end thead -->
                                <tbody>
                                    @foreach ($users as $key => $user )
                                    <tr>
                                        <td>{{++$key}}</td>
                                        <td><h6 class="mb-0">{{$user->name}}</h6></td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->code}}</td>
                                        <td>
                                            {{trans('role.'.$user->role)}}
                                        </td>
                                        <td>
                                            @if ($user->status == '1')

                                            <div class="font-size-13"><i class="ri-checkbox-blank-circle-fill font-size-10 text-success align-middle me-2"></i>فعال</div>

                                            @else

                                            <div class="font-size-13"><i class="ri-checkbox-blank-circle-fill font-size-10 text-danger align-middle me-2"></i>غير فعال</div>
                                            @endif
                                        </td>


                                        <td>
                                            <a class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#status{{$user->id}}" >تعديل الحالة</a>

                                        </td>
                                    </tr>
                                     <!-- end -->
                                     @include('Backend.admin.edit_status')

                                     @if ($key == 5)
                                        @break
                                    @endif

                                     @endforeach

                                </tbody><!-- end tbody -->
                            </table> <!-- end table -->
                        </div>
                    </div><!-- end card -->
                </div><!-- end card -->
            </div>
            <!-- end col -->

        </div>
        <!-- end row -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title mb-4">جدول الطلبات</h4>

                        <div class="table-responsive">
                            <table class="table table-centered mb-0 align-middle table-hover table-nowrap">
                                <thead class="table-light">
                                    <tr>
                                        <th>الرقم التسلسلي</th>
                                        <th>العنوان</th>
                                        <th>وصف الطلب</th>
                                        <th>حالة الطلب</th>
                                        <th>تاريخ الطلب</th>
                                        <th style="width: 120px;">العمليات</th>
                                    </tr>
                                </thead><!-- end thead -->
                                <tbody>
                                    @foreach ($orders as $key => $order )


                                    <tr>
                                        <td>{{++$key}}</td>
                                        <td><h6 class="mb-0">{{$order->subject}}</h6></td>
                                        <td>
                                            {{Str::limit($order->description, 50, '...')}}
                                        </td>

                                        <td>
                                            @if($order->order_status == 'قيد المعالجة')
                                            <div class="font-size-13"><i class="ri-checkbox-blank-circle-fill font-size-10 text-warning align-middle me-2"></i>{{$order->order_status}}</div>
                                            @elseif($order->order_status == 'مقبول')
                                            <div class="font-size-13"><i class="ri-checkbox-blank-circle-fill font-size-10 text-success align-middle me-2"></i>{{$order->order_status}}</div>
                                            @elseif($order->order_status == 'مرفوض')
                                            <div class="font-size-13"><i class="ri-checkbox-blank-circle-fill font-size-10 text-danger align-middle me-2"></i>{{$order->order_status}}</div>
                                            @endif
                                        </td>

                                        <td>
                                           {{$order->created_at->diffForHumans()}}
                                        </td>
                                        <td>

                                            <a class="btn btn-danger waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#admin-delete{{$order->id}}"><i class='fa fa-trash'></i></a>
                                            <a class="btn btn-info waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#details{{$order->id}}" ><i class='fa fa-info'></i></a>
                                        </td>
                                    </tr>
                                   @include('Backend.user.order_details')
                                   @include('Backend.admin.delete_order')
                                   @if ($key == 5)
                                        @break
                                    @endif
                                    @endforeach
                                     <!-- end -->
                                </tbody><!-- end tbody -->
                            </table> <!-- end table -->
                        </div>
                    </div><!-- end card -->
                </div><!-- end card -->
            </div>
            <!-- end col -->

        </div>
        <!-- end row -->

    </div>

</div>
<!-- End Page-content -->
@endsection
