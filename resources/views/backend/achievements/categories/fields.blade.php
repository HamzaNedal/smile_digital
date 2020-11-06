<nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">عربي</a>
    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">انجليزي</a>
    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">تركي</a>
  </div>
</nav>
<div class="tab-content" id="nav-tabContent">
  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
   <x-backend.services.forms.category_form name="ar" title='العنوان'>
     <x-slot name='title_placeholder'>ادخل العنوان</x-slot>
     @isset ($category->translation[0])
        <x-slot name='title_data'>{{ $category->translation->where('lang_code','ar')->first()->name }}</x-slot>
    @endisset
   </x-backend.service.forms.category_form>
  </div>
  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab"> 
    <x-backend.services.forms.category_form name="en" title='Title' >
    <x-slot name='title_placeholder'>Enter Title</x-slot>
    @isset ($category->translation[1])
      <x-slot name='title_data'>{{ $category->translation->where('lang_code','en')->first()->name }}</x-slot>
    @endisset
  </x-backend.service.forms.category_form>
 </div>
  <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
    <x-backend.services.forms.category_form name="tr" title='Başlık' >
      <x-slot name='title_placeholder'>Adresi girin</x-slot>
      @isset ($category->translation[2])
       <x-slot name='title_data'>{{ $category->translation->where('lang_code','en')->first()->name }}</x-slot>
      @endisset
    </x-backend.service.forms.category_form>
  </div>

</div>
  <!-- /.card-body -->

