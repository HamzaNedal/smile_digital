<nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <a class="nav-item nav-link active" id="nav-home-tab1" data-toggle="tab" href="#nav-home1" role="tab" aria-controls="nav-home" aria-selected="true">عربي</a>
    <a class="nav-item nav-link" id="nav-profile-tab1" data-toggle="tab" href="#nav-profile1" role="tab" aria-controls="nav-profile" aria-selected="false">انجليزي</a>
    <a class="nav-item nav-link" id="nav-contact-tab1" data-toggle="tab" href="#nav-contact1" role="tab" aria-controls="nav-contact" aria-selected="false">تركي</a>
  </div>
</nav>
<div class="tab-content" id="nav-tabContent">
  <div class="tab-pane fade show active" id="nav-home1" role="tabpanel" aria-labelledby="nav-home-tab">
   <x-backend.services.forms.form name="ar" title='العنوان'  desc='الوصف'>
     <x-slot name='title_placeholder'>ادخل العنوان</x-slot>
     <x-slot name='desc_placeholder'>ادخل الوصف</x-slot>
     @if($page_static->where('key','order')->first()->translation->where('lang_code','ar')->first() !== null)
     <x-slot name='title_data'>{{ $page_static->where('key','order')->first()->translation->where('lang_code','ar')->first()->name }}</x-slot>
     <x-slot name='desc_data'>{{ $page_static->where('key','order')->first()->translation->where('lang_code','ar')->first()->value }}</x-slot>
    @endif
   </x-backend.service.forms.form>
  </div>
  <div class="tab-pane fade" id="nav-profile1" role="tabpanel" aria-labelledby="nav-profile-tab"> 
    <x-backend.services.forms.form name="en" title='Title' desc='Description'>
    <x-slot name='title_placeholder'>Enter Title</x-slot>
    <x-slot name='desc_placeholder'>Enter Description</x-slot>
    @if($page_static->where('key','order')->first()->translation->where('lang_code','en')->first() !== null)
      <x-slot name='title_data'>{{ $page_static->where('key','order')->first()->translation->where('lang_code','en')->first()->name}}</x-slot>
      <x-slot name='desc_data'>{{ $page_static->where('key','order')->first()->translation->where('lang_code','en')->first()->value }}</x-slot>
    @endif 
  </x-backend.service.forms.form>
 </div>
  <div class="tab-pane fade" id="nav-contact1" role="tabpanel" aria-labelledby="nav-contact-tab">
    <x-backend.services.forms.form name="tr" title='Başlık' desc='tanım'>
      <x-slot name='title_placeholder'>Adresi girin</x-slot>
      <x-slot name='desc_placeholder'>Açıklamayı girin</x-slot>
      @if($page_static->where('key','order')->first()->translation->where('lang_code','tr')->first() !== null)
        <x-slot name='title_data'>{{ $page_static->where('key','order')->first()->translation->where('lang_code','tr')->first()->name }}</x-slot>
        <x-slot name='desc_data'>{{$page_static->where('key','order')->first()->translation->where('lang_code','tr')->first()->value }}</x-slot>
      @endif 
    </x-backend.service.forms.form>
    
  </div>
  <div class="form-group" style="padding: 1rem">
    <label for="link">الرابط</label>
    
    <input type="text" class="form-control" name="link" id="link" @isset($page_static)value="{{  $page_static->where('key','order')->first()->value }}" @else value="" @endisset >
 </div>
</div>
  <!-- /.card-body -->