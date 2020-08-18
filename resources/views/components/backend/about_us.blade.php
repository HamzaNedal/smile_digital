
      <div class="col-md-6">
        <div class="form-group">
          <label for="{{ $lang."[$name]" }}">{{ $title }}</label>
          <textarea class="form-control"  name="{{ $lang."[$name][value]" }}">{{ $dataAboutUs }}</textarea>
          <div class="form-check">
            {{-- <input class="form-check-input" id="{{ $lang."[$name]"."[$status]" }}" type="checkbox"  name="{{ $lang."[$name]"."[$status]" }}" value="{{ $isChecked }}" {{ $isChecked == 1 ? 'checked' :'' }}> --}}
            {{-- <label class="form-check-label" for="{{ $lang."[$name]"."[$status]" }}">الحالة</label> --}}
          </div>
          <div class="form-check"></div>
        </div> 
        </div>

<!-- /.card-body -->
