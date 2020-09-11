<div class="card-body">
    <div class="form-group">
       <label for="title">{{ $title }}</label>
       <input type="text" class="form-control" id="title" @isset($title_data)value="{{ $title_data }}" @endisset value="{{ old($name."[title]") }}" name={{ $name."[title]" }} placeholder="{{ $title_placeholder }}">
    </div>

    <div class="form-group">
      <label for="description">{{ $desc }}</label>
      <textarea class="form-control" name= {{ $name."[description]" }} id="description" cols="30" rows="10"  placeholder="{{ $desc_placeholder }}">@isset($desc_data){{ $desc_data }}@endisset{{ old( $name."[description]")}}</textarea>
    </div>
  </div>
