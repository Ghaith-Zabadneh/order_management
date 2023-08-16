@extends('Backend.layouts.admin_master')
@section('body')


<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->

        <!-- end page title -->
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">إضافة طلب جديد</h3>
                    <p class="card-title-desc">يرجى تعبئة البيانات المطلوبة</p>

                    <form method="POST" class="custom-validation" action="{{route('user-order.store')}}">
                        @csrf
                        <div class="mb-3">
                            <label>العنوان</label>
                            <input type="text" name="subject" value="{{old('subject')}}" class="form-control" required="" placeholder="العنوان">
                            @if ($errors->has('subject'))
                                 <span class="text-danger">{{ $errors->first('subject') }}</span>
                             @endif
                        </div>

                        <div class="mb-3">
                            <label>الوصف</label>
                            <div>
                                <textarea required="" name="description" class="form-control" rows="5">{{{ old('description') }}}</textarea>
                                @if ($errors->has('description'))
                                     <span class="text-danger">{{ $errors->first('description') }}</span>
                                 @endif
                            </div>
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
