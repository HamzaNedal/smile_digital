<nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">عربي</a>
    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">انجليزي</a>
    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">تركي</a>
  </div>
</nav>
<div class="tab-content" id="nav-tabContent">
  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
   <x-backend.services.forms.category_form name="ar" title='الاسم'>
     <x-slot name='title_placeholder'>ادخل الاسم</x-slot>
  
     @isset($client->translation[0])
     <x-slot name='title_data'>{{ $client->translation[0]->name }}</x-slot>
    @endisset
   </x-backend.service.forms.category_form>
  </div>
  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab"> 
    <x-backend.services.forms.category_form name="en" title='Name' >
    <x-slot name='title_placeholder'>Enter the name</x-slot>
    @isset($client->translation[1])
      <x-slot name='title_data'>{{ $client->translation[1]->name }}</x-slot>
    @endisset 
  </x-backend.service.forms.category_form>
 </div>
  <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
    <x-backend.services.forms.category_form name="tr" title='isim' >
      <x-slot name='title_placeholder'>Adı girin</x-slot>
      @isset($client->translation[2])

        <x-slot name='title_data'>{{ $client->translation[2]->name }}</x-slot>
      @endisset 
    </x-backend.service.forms.category_form>
  </div>
  <div class="form-group"  style="padding: 1rem">
    <label for="link">الرابط</label>
    <input type="text" class="form-control" id="link" @isset($client) value="{{ $client->link }}" @endisset value="{{ old('link') }}"  name="link" placeholder="ادخل رابط الموقع">
  </div>
  <div class="form-group " style="padding: 1rem">
    <label for="photoInput">صورة</label>
    <div class="input-group">
      <div class="custom-file">
        <input type="file" class="form-control-file" id="photoInput" name="image">
        @isset($client)
          <img src="{{ asset('images/'.$client->image) }}" alt="" style="width: 50px;" id="image"> 
          <img src="{{ asset('images/'.$client->image) }}" class="d-none backImage" style="width: 50px;"> 
          <i class="fa fa-undo undoImage"  aria-hidden="true" title='undo' alt='undo' style="margin-left: 8px;cursor: pointer;"></i>
          @else
          <img src="#" class="d-none" alt="" style="width: 50px;" id="image">
        @endisset
      </div>
    </div>
  </div>
</div>
  <!-- /.card-body -->