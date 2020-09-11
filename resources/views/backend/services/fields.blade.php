<nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">عربي</a>
    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">انجليزي</a>
    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">تركي</a>
  </div>
</nav>
<div class="tab-content" id="nav-tabContent">
  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
   <x-backend.services.forms.form name="ar" :categories="$categories->where('lang_code','ar')" title='العنوان' desc='الوصف'  categoryTitle="القسم" addCategory="اضافة قسم">
     <x-slot name='title_placeholder'>ادخل العنوان</x-slot>
     <x-slot name='desc_placeholder'>ادخل الوصف</x-slot>
     @isset($service->translation[0])
     <x-slot name='title_data'>{{ $service->translation[0]->name }}</x-slot>
     <x-slot name='desc_data'>{{ $service->translation[0]->description }}</x-slot>
    @endisset
   </x-backend.service.forms.form>
  </div>
  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab"> 
    <x-backend.services.forms.form name="en" :categories="$categories->where('lang_code','en')" title='Title' desc='Description' categoryTitle="Category" addCategory="Add Category">
    <x-slot name='title_placeholder'>Enter Title</x-slot>
    <x-slot name='desc_placeholder'>Enter Description</x-slot>
    @isset($service->translation[1])
      <x-slot name='title_data'>{{ $service->translation[1]->name }}</x-slot>
      <x-slot name='desc_data'>{{ $service->translation[1]->description }}</x-slot>
    @endisset 
  </x-backend.service.forms.form>
 </div>
  <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
    <x-backend.services.forms.form name="tr"  title='Başlık'  desc='tanım' categoryTitle="Kategori" addCategory="Kategori ekle">
      <x-slot name='title_placeholder'>Adresi girin</x-slot>
      <x-slot name='desc_placeholder'>Açıklamayı girin</x-slot>
      @isset($service->translation[2])
        <x-slot name='title_data'>{{ $service->translation[2]->name }}</x-slot>
        <x-slot name='desc_data'>{{ $service->translation[2]->description }}</x-slot>
      @endisset 
    </x-backend.service.forms.form>
  </div>
  <div class="form-group" style="padding: 1rem">
    <label for="category_id">القسم</label>
    
    <select class="form-control" name="category_id">
      
      @foreach ($categories as $category)
      @isset($service)
      <option value="{{ $category->id }}" @isset($category)@if ($category->translation->where('id',$service->translation[0]->fk_category_translation)->first()) {{ 'selected' }} @endif @endisset>
        {{ $category->translation->where('lang_code','ar')->first()->name }}
       </option>
       @else
       <option value="{{ $category->id }}">
        {{ $category->translation->where('lang_code','ar')->first()->name }}
       </option>
      @endisset

      @endforeach  
    </select>   
    <small><a href="{{ route('admin.category.create') }}">اضافة قسم</a></small>
 </div>
</div>
  <!-- /.card-body -->