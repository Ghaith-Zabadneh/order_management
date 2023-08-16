@extends('Backend.layouts.admin_master')
@section('body')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="card-title">جدول المستخدمين</h4>

                        <div class="page-title-right">
                            <a href="{{route('admin.create')}}" class="btn btn-primary waves-effect waves-light">إضافة مستخدم </a>
                        </div>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">

                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="datatable2"
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
                                                        aria-label="Position: activate to sort column ascending">البريد الالكتروني
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="datatable"
                                                    rowspan="1" colspan="1" style="width: 289.2px;"
                                                    aria-label="Position: activate to sort column ascending"> الكود
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="datatable"
                                                        rowspan="1" colspan="1" style="width: 139.2px;"
                                                        aria-label="Office: activate to sort column ascending">الوظيفة
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="datatable"
                                                        rowspan="1" colspan="1" style="width: 69.2px;"
                                                        aria-label="Age: activate to sort column ascending">الحالة</th>

                                                    <th class="sorting" tabindex="0" aria-controls="datatable"
                                                        rowspan="1" colspan="1" style="width: 118.2px;"
                                                        aria-label="Salary: activate to sort column ascending">العمليات</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @foreach ($users as $key => $user )
                                                <tr>

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
            $('#datatable2').DataTable();
        });
        </script>
    @endsection


@endsection
