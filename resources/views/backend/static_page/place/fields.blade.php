
<div class="card-body">
  <div class="form-group">
  <label for="name">اسم المكان</label>
  <input type="text" class="form-control" id="name" @isset($place)  value="{{ $place->value }}" @endisset  name="name" placeholder="ادخل الاسم">
  </div>

</div>
<!-- /.card-body -->

