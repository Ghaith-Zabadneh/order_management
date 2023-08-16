 <!-- Modal -->
 <div class="modal fade" id="processing{{$order->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">معالجة الطلب</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form method="post" action="{{route('employee-order.store')}}">
                @csrf

                <label for="subject" class="form-label">العنوان</label>
                <input class="form-control" id="subject" type="text" value="{{$order->subject}}" aria-label="Disabled input example" disabled>
                <label for="exampleFormControlTextarea1" class="form-label">الوصف</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" readonly>{{ $order->description}}</textarea>
                <br>
                <select class="form-select" name="order_status" aria-label="Default select example" required>
                    <option selected>اختر نتيجة الطلب</option>
                    <option value="مقبول">قبول الطلب</option>
                    <option value="مرفوض">رفض الطلب</option>
                </select>
                @if ($errors->has('order_status'))
                    <span class="text-danger">{{ $errors->first('order_status') }}</span>
                 @endif
                <input type="hidden" name="id" value="{{$order->id}}">


        </div>
        <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button>
                <button type="submit" class="btn btn-primary">تحديث الطلب</button>
            </form>
        </div>
      </div>
    </div>
  </div>


