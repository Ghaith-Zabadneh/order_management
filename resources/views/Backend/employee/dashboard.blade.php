@extends('Backend.layouts.admin_master')
@section('style')

@endsection
@section('body')



<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">لوحة التحكم</h4>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-xl-4 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="text-truncate font-size-14 mb-2">الطلبات الكلية</p>
                                <h4 class="mb-2">{{count($orders)== 0 ? '0' : count($orders)}}</h4>

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
                                <p class="text-truncate font-size-14 mb-2">الطلبات المقبولة</p>

                                <h4 class="mb-2">{{ $pass == 0 ? '0' : $pass}}</h4>

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
                                <p class="text-truncate font-size-14 mb-2">الطلبات المرفوضة</p>
                                <h4 class="mb-2">{{ $fail == 0 ? '0' : $fail}}</h4>
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

                        <h4 class="card-title mb-4">جدول الطلبات</h4>

                        <div class="table-responsive">
                            <table class="table table-centered mb-0 align-middle table-hover table-nowrap">
                                <thead class="table-light">
                                    <tr>
                                        <th></th>
                                        <th>اسم المستخدم</th>
                                        <th>عنوان الطلب</th>
                                        <th>وصف الطلب</th>
                                        <th>حالة الطلب</th>
                                        <th>تاريخ الطلب</th>
                                        <th>العمليات</th>
                                    </tr>
                                </thead><!-- end thead -->
                                <tbody>
                                    @foreach ( $orders as $key => $order)
                                    <tr>
                                        <td>{{++$key}}</td>
                                        <td><h6 class="mb-0">{{$order->user->name}}</h6></td>
                                        <td>
                                            {{$order->subject}}
                                        </td>
                                        <td>
                                            {{Str::limit($order->description, 40, '...')}}
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

                                        <td>{{$order->created_at->diffForHumans()}}</td>
                                        <td>
                                            @if($order->order_status == "قيد المعالجة")
                                                <a class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#processing{{$order->id}}" > معالجة الطلب</a>
                                            @else
                                                تمت المعالجة
                                            @endif
                                        </td>
                                        @include('Backend.employee.processing_order')
                                    </tr>
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

@section('script')

@endsection
@endsection
