
  <nav>
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
      <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">عربي</a>
      <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">انجليزي</a>
      <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">تركي</a>
    </div>
  </nav>
  <div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
     <x-backend.services.forms.form name="ar"  title='العنوان' desc='الوصف'  addCategory="اضافة قسم">
       <x-slot name='title_placeholder'>ادخل العنوان</x-slot>
       <x-slot name='desc_placeholder'>ادخل الوصف</x-slot>
       @isset($slider->translation[0])
       <x-slot name='title_data'>{{ $slider->translation[0]->title }}</x-slot>
       <x-slot name='desc_data'>{{ $slider->translation[0]->description }}</x-slot>
      @endisset
     </x-backend.service.forms.form>
    </div>
    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab"> 
      <x-backend.services.forms.form name="en"  title='Title' desc='Description' categoryTitle="Category" addCategory="Add Category">
      <x-slot name='title_placeholder'>Enter Title</x-slot>
      <x-slot name='desc_placeholder'>Enter Description</x-slot>
      @isset($slider->translation[1])
        <x-slot name='title_data'>{{ $slider->translation[1]->title }}</x-slot>
        <x-slot name='desc_data'>{{ $slider->translation[1]->description }}</x-slot>
      @endisset 
    </x-backend.service.forms.form>
   </div>
    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
      <x-backend.services.forms.form name="tr"  title='Başlık'  desc='tanım' categoryTitle="Kategori" addCategory="Kategori ekle">
        <x-slot name='title_placeholder'>Adresi girin</x-slot>
        <x-slot name='desc_placeholder'>Açıklamayı girin</x-slot>
        @isset($slider->translation[2])
          <x-slot name='title_data'>{{ $slider->translation[2]->title }}</x-slot>
          <x-slot name='desc_data'>{{ $slider->translation[2]->description }}</x-slot>
        @endisset 
      </x-backend.service.forms.form>
    </div>
      <div class="form-group p-3">
        <label for="link">الرابط</label>
        <input type="text" class="form-control" id="link" @isset($slider)  value="{{ $slider->link }}" @endisset  value="{{ old('link') }}"  name="link" placeholder="أدخل الرابط">
      </div>
    {{-- <div class="form-group p-3">
      <label for="photo">صورة(اختياري)</label>
      <div class="input-group">
        <div class="custom-file">
          <input type="file"  id="photoInput" name="image">
          <label class="custom-file-label" for="image">Add Image</label>
          @isset($slider)
          <img src="{{ asset('image/'.$slider->image) }}" alt="" class="returnImage" style="width: 50px;" id="image"> 
          <img src="{{ asset('image/'.$slider->image) }}" class="d-none backImage" style="width: 50px;"> 
          <i class="fa fa-undo undoImage"  aria-hidden="true" alt='undo' style="margin-left: 8px;cursor: pointer;"></i>
          @else
          <img src="#" class="d-none" alt="" style="width: 50px;" id="image">
        @endisset
        </div>

      </div>
    </div> --}}
    <div class="form-group p-3">
      <label for="background-image">صورة كخلفية</label>
      <div class="input-group">
        <div class="custom-file">
          <input type="file"  id="background-image" name="background_image">
          {{-- <label class="custom-file-label" for="image">Add Background Image</label> --}}
          @isset($slider)
          <img src="{{ asset('background_image/'.$slider->background_image) }}" alt="" style="width: 50px;" class="returnImage" id="background_image"> 
          <img src="{{ asset('background_image/'.$slider->background_image) }}" class="d-none backImage" style="width: 50px;"> 
          <i class="fa fa-undo undoImage"  aria-hidden="true" alt='undo' style="margin-left: 8px;cursor: pointer;"></i>
          @else
          <img src="#" class="d-none" alt="" style="width: 50px;" id="background_image">
        @endisset
        </div>

      </div>
    </div>

  </div>
