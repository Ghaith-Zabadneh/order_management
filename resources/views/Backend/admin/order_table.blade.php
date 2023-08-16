@extends('Backend.layouts.admin_master')
@section('body')
    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">جدول الطلبات</h4>
                            <br>
                            <div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">

                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="datatable"
                                            class="table table-bordered dt-responsive nowrap dataTable no-footer dtr-inline"
                                            style="border-collapse: collapse; border-spacing: 0px; width: 100%;"
                                            role="grid" aria-describedby="datatable_info">
                                            <thead>
                                                <tr role="row">
                                                    <th class="sorting_asc" tabindex="0" aria-controls="datatable"
                                                        rowspan="1" colspan="1" style="width: 191.2px;"
                                                        aria-sort="ascending"
                                                        aria-label="Name: activate to sort column descending">اسم المستخدم
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="datatable"
                                                        rowspan="1" colspan="1" style="width: 289.2px;"
                                                        aria-label="Position: activate to sort column ascending">عنوان الطلب
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="datatable"
                                                        rowspan="1" colspan="1" style="width: 139.2px;"
                                                        aria-label="Office: activate to sort column ascending">وصف الطلب
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="datatable"
                                                        rowspan="1" colspan="1" style="width: 69.2px;"
                                                        aria-label="Age: activate to sort column ascending">حالة الطلب</th>
                                                    <th class="sorting" tabindex="0" aria-controls="datatable"
                                                        rowspan="1" colspan="1" style="width: 131.2px;"
                                                        aria-label="Start date: activate to sort column ascending">تاريخ
                                                        الطلب</th>
                                                    <th class="sorting" tabindex="0" aria-controls="datatable"
                                                        rowspan="1" colspan="1" style="width: 118.2px;"
                                                        aria-label="Salary: activate to sort column ascending">العمليات</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @foreach ( $orders as $key => $order)
                                                <tr>

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
                                                        <a class="btn btn-danger waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#admin-delete{{$order->id}}"><i class='fa fa-trash'></i></a>
                                                        <a class="btn btn-info waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#details{{$order->id}}" ><i class='fa fa-info'></i></a>
                                                    </td>
                                                    @include('Backend.user.order_details')
                                                    @include('Backend.admin.delete_order')
                                                </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
        </div>
    </div>
    @section('script')
    <script>
        $(document).ready(function() {
            $('#datatable').DataTable();
        });
        </script>
    @endsection


@endsection
