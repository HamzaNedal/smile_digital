<div class="card-body">
    <div class="form-group">
       <label for="title">{{ $title }}</label>
       <input type="text" class="form-control" id="title" @isset($title_data) value="{{$title_data }}"@endisset value="{{ old($name."[title]") }}" name={{ $name."[title]" }} placeholder="{{ $title_placeholder }}">
     </div>
  </div>