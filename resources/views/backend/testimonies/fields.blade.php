<nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">عربي</a>
    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">انجليزي</a>
    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">تركي</a>
  </div>
</nav>
<div class="tab-content" id="nav-tabContent">
  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
   <x-backend.services.forms.form name="ar" title='العنوان'  desc='الوصف'>
     <x-slot name='title_placeholder'>ادخل العنوان</x-slot>
     <x-slot name='desc_placeholder'>ادخل الوصف</x-slot>
     @isset($testimon)
     <x-slot name='title_data'>{{ $testimon->translation[0]->name }}</x-slot>
     <x-slot name='desc_data'>{{ $testimon->translation[0]->description }}</x-slot>
    @endisset
   </x-backend.service.forms.form>
  </div>
  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab"> 
    <x-backend.services.forms.form name="en" title='Title' desc='Description'>
    <x-slot name='title_placeholder'>Enter Title</x-slot>
    <x-slot name='desc_placeholder'>Enter Description</x-slot>
    @isset($testimon)
      <x-slot name='title_data'>{{ $testimon->translation[1]->name }}</x-slot>
      <x-slot name='desc_data'>{{ $testimon->translation[1]->description }}</x-slot>
    @endisset 
  </x-backend.service.forms.form>
 </div>
  <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
    <x-backend.services.forms.form name="tr" title='Başlık' desc='tanım'>
      <x-slot name='title_placeholder'>Adresi girin</x-slot>
      <x-slot name='desc_placeholder'>Açıklamayı girin</x-slot>
      @isset($testimon)
        <x-slot name='title_data'>{{ $testimon->translation[2]->name }}</x-slot>
        <x-slot name='desc_data'>{{ $testimon->translation[2]->description }}</x-slot>
      @endisset 
    </x-backend.service.forms.form>
    
  </div>
  <div class="form-group" style="padding: 1rem">
    <label for="photoInput">صورة</label>
    <div class="input-group">
      <div class="custom-file">
        <input type="file" class="" id="photoInput" name="image">
        @isset($testimon)
          <img src="{{ asset('images/'.$testimon->image) }}" alt="" style="width: 50px;" id="image"> 
          <img src="{{ asset('images/'.$testimon->image) }}" class="d-none backImage" style="width: 50px;"> 
          <i class="fa fa-undo undoImage"  aria-hidden="true" title='undo' alt='undo' style="margin-left: 8px;cursor: pointer;"></i>
          @else
          <img src="#" class="d-none" alt="" style="width: 50px;" id="image">
        @endisset
      </div>
    </div>
  </div>
</div>
  <!-- /.card-body -->