<div class="card-body">
  <div class="row" id="form-static">
        <div class="col-md-4">
          <div class="form-group">
            <label for="facebook">فيس بوك</label>
            <input type="text" class="form-control" id="facebook" value="{{ $page_static->where('key','facebook')->first()->value }}" name="facebook">
            </div> 
        </div> 
        <div class="col-md-4">
          <div class="form-group">
            <label for="behance">بيهانس</label>
            <input type="text" class="form-control" id="behance" value="{{ $page_static->where('key','behance')->first()->value }}" name="behance">
            </div> 
        </div> 
        <div class="col-md-4">
          <div class="form-group">
            <label for="twitter">تويتر</label>
            <input type="text" class="form-control" id="twitter" value="{{ $page_static->where('key','twitter')->first()->value }}" name="twitter">
            </div> 
        </div> 
        <div class="col-md-4">
          <div class="form-group">
            <label for="instagram">انستاقرام</label>
            <input type="text" class="form-control" id="instagram" value="{{ $page_static->where('key','instagram')->first()->value }}" name="instagram">
            </div> 
        </div> 
        <div class="col-md-4">
          <div class="form-group">
            <label for="youtube">يوتيوب</label>
            <input type="text" class="form-control" id="youtube" value="{{ $page_static->where('key','youtube')->first()->value }}" name="youtube">
            </div> 
        </div> 
        <div class="col-md-4">
          <div class="form-group">
            <label for="linkedIn">لينكد ان</label>
            <input type="text" class="form-control" id="linkedIn" value="{{ $page_static->where('key','linkedIn')->first()->value }}" name="linkedin">
            </div> 
        </div> 
        <div class="col-md-4">
          <div class="form-group">
            <label for="whats_app">واتس اب</label>
            <input type="text" class="form-control" id="whats_app" value="{{ $page_static->where('key','whats_app')->first()->value }}" name="whats_app">
            </div> 
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="phone">رقم الهاتف</label>
            <input type="text" class="form-control" id="phone" value="{{ $page_static->where('key','phone')->first()->value }}" name="phone">
            </div> 
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="address">العنوان</label>
            <textarea class="form-control" id="address" name="address">{{ $page_static->where('key','address')->first()->value }}</textarea>
            </div> 
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="profile">البروفايل بالعربي</label>
            <input type="file" class="form-control-file" id="profile"  name="profile_ar">
            <a target="_black" href="{{ route('admin.profile.download',['lang'=>'ar']) }}">تحميل الملف</a>
            </div> 
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="profile">البروفايل بالانجليزي</label>
            <input type="file" class="form-control-file" id="profile"  name="profile_en">
            <a target="_black" href="{{ route('admin.profile.download',['lang'=>'en']) }}">تحميل الملف</a>
            </div> 
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="profile">البروفايل بالتركي </label>
            <input type="file" class="form-control-file" id="profile"  name="profile_tr">
            <a target="_black" href="{{ route('admin.profile.download',['lang'=>'tr']) }}">تحميل الملف</a>
            </div> 
        </div>

      </div>
  </div>