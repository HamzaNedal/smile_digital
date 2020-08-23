  <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">حذف العنصر</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label for="recipient-name" class="col-form-label">هذا القسم يحتوي على خدمات </label>
                <small>هل تريد تغيير القسم للخدمات</small>
              </div>

            <div class="input-group">
                <input type="hidden"  id="old_category_id" value="{{ $data->$fk }}">
                <select class="custom-select" id="new_category_id" name="category_id" aria-label="Example select with button addon">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                 
                </select>
                <div class="input-group-append">
                  <button class="btn btn-primary" type="button" id="update">تعديل وحذف</button>
                </div>
              </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
          <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('هل انت متأكد من الحذف ؟')"> حذف </button>
        </div>
      </div>
    </div>
  </div>

