@extends('Backend.layouts.admin_master')
@section('body')


<div class="page-content">
    <div class="container-fluid">


        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h3 class="mb-sm-0">إضافة مستخدم جديد</h3>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <!-- end page title -->
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">

                    <p class="card-title-desc">يرجى تعبئة البيانات المطلوبة</p>

                    <form method="POST" class="custom-validation" action="{{route('admin.store')}}">
                        @csrf
                        <div class="mb-3">
                            <label>الاسم</label>
                            <input type="text" name="name" value="{{old('name')}}" class="form-control" required="" placeholder="الاسم">
                            @if ($errors->has('name'))
                                 <span class="text-danger">{{ $errors->first('name') }}</span>
                             @endif
                        </div>
                        <div class="mb-3">
                            <label>البريد الالكتروني</label>
                            <input type="email" name="email" value="{{old('email')}}" class="form-control" required="">
                            @if ($errors->has('email'))
                                 <span class="text-danger">{{ $errors->first('email') }}</span>
                             @endif
                        </div>
                        <div class="mb-3">
                            <label>كلمة السر </label>
                            <input type="password" name="password" value="{{old('password')}}" class="form-control" required="" placeholder="كلمة السر">
                            @if ($errors->has('password'))
                                 <span class="text-danger">{{ $errors->first('password') }}</span>
                             @endif
                        </div>
                        <div class="mb-3">
                            <label>الوظيفة</label>
                            <select class="form-select" name="role" aria-label="Default select example" required>
                                <option selected>اختر الوظيفة</option>
                                <option value="admin"> مسؤول</option>
                                <option value="employee">موظف </option>
                                <option value="user">مستخدم </option>
                            </select>
                            @if ($errors->has('role'))
                                 <span class="text-danger">{{ $errors->first('role') }}</span>
                             @endif
                        </div>


                        <div class="mb-0">
                            <div>
                                <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                                    إضافة
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

</div>
<!-- End Page-content -->
@endsection
