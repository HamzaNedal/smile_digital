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
     @isset($page_static)
     <x-slot name='title_data'>{{ $page_static->where('key','company')->first()->translation->where('lang_code','ar')->first()->name }}</x-slot>
     <x-slot name='desc_data'>{{ $page_static->where('key','company')->first()->translation->where('lang_code','ar')->first()->value }}</x-slot>
    @endisset
   </x-backend.service.forms.form>
   <x-backend.services.forms.file fileName='فيديو' attrNameFile='ar[file]' />
  </div>
  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab"> 
    <x-backend.services.forms.form name="en" title='Title' desc='Description'>
    <x-slot name='title_placeholder'>Enter Title</x-slot>
    <x-slot name='desc_placeholder'>Enter Description</x-slot>
    @isset($page_static)
      <x-slot name='title_data'>{{ $page_static->where('key','company')->first()->translation->where('lang_code','en')->first()->name }}</x-slot>
      <x-slot name='desc_data'>{{ $page_static->where('key','company')->first()->translation->where('lang_code','en')->first()->value }}</x-slot>
    @endisset 
    
  </x-backend.service.forms.form>
  <x-backend.services.forms.file fileName='video' attrNameFile='en[file]' />
 </div>
  <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
    <x-backend.services.forms.form name="tr" title='Başlık' desc='tanım'>
      <x-slot name='title_placeholder'>Adresi girin</x-slot>
      <x-slot name='desc_placeholder'>Açıklamayı girin</x-slot>
      @isset($page_static)
        <x-slot name='title_data'>{{ $page_static->where('key','company')->first()->translation->where('lang_code','tr')->first()->name }}</x-slot>
        <x-slot name='desc_data'>{{ $page_static->where('key','company')->first()->translation->where('lang_code','tr')->first()->value }}</x-slot>
      @endisset 
    </x-backend.service.forms.form>
    <x-backend.services.forms.file fileName='video' attrNameFile='tr[file]' />
  </div>

</div>
  <!-- /.card-body -->