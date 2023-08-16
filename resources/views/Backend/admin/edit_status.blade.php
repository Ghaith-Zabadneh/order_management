 <!-- Modal -->
 <div class="modal fade" id="status{{$user->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel"> تعديل الحالة</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form method="post" action="{{route('admin.update',$user->id)}}">
                @csrf
                @method('PUT')
                <label class="form-label">الحالة</label>
                <select class="form-select" name="status" aria-label="Default select example" required>
                    <option selected>اخترالحالة</option>
                    <option value="1">مفعل</option>
                    <option value="0">غير مفعل</option>
                </select>
                @if ($errors->has('status'))
                    <span class="text-danger">{{ $errors->first('status') }}</span>
                 @endif


        </div>
        <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button>
                <button type="submit" class="btn btn-primary">تحديث </button>
            </form>
        </div>
      </div>
    </div>
  </div>


