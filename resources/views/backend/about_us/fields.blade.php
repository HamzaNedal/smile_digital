<nav>
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
      <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">عربي</a>
      <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">انجليزي</a>
      <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">تركي</a>
    </div>
  </nav>
  <div class="tab-content" id="nav-tabContent" style="padding: 1rem">
    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
        <div class="row" id="form-static">
            <x-backend.about_us name='who_are_smile_digital'  title='من هي smile digital' lang='ar' dataAboutUs="{{ $about_us->translation->where('lang_code','ar')[0]->value }}"  />
            <x-backend.about_us name='our_vision'  title='رؤيتنا' lang='ar' dataAboutUs="{{ $about_us->translation->where('lang_code','ar')[1]->value }}"  />
            <x-backend.about_us name='our_mission'   title='مهمتنا' lang='ar' dataAboutUs="{{ $about_us->translation->where('lang_code','ar')[2]->value }}"  />
            <x-backend.about_us name='our_values'   title='قيمنا' lang='ar' dataAboutUs="{{ $about_us->translation->where('lang_code','ar')[3]->value }}"  />
            <x-backend.about_us name='our_team'   title='فريقنا' lang='ar' dataAboutUs="{{ $about_us->translation->where('lang_code','ar')[4]->value }}"  />
        </div>
    </div>
    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab"> 
        <div class="row" id="form-static">
            <x-backend.about_us name='who_are_smile_digital'  title='Who are Smile Digital?' lang='en' dataAboutUs="{{ $about_us->translation->where('lang_code','en')[5]->value }}"  />
            <x-backend.about_us name='our_vision'  title='Our Vision' lang='en' dataAboutUs="{{ $about_us->translation->where('lang_code','en')[6]->value }}"  />
            <x-backend.about_us name='our_mission'   title='Our Mission' lang='en' dataAboutUs="{{ $about_us->translation->where('lang_code','en')[7]->value }}"  />
            <x-backend.about_us name='our_values'   title='Our Values' lang='en' dataAboutUs="{{ $about_us->translation->where('lang_code','en')[8]->value }}"  />
            <x-backend.about_us name='our_team'   title='Our Team' lang='en' dataAboutUs="{{ $about_us->translation->where('lang_code','en')[9]->value }}"  />
        </div>
   </div>
    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
        <div class="row" id="form-static">
            <x-backend.about_us name='who_are_smile_digital'  title='Who are Smile Digital?' lang='tr' status="" dataAboutUs="{{ $about_us->translation->where('lang_code','tr')[10]->value }}"  />
            <x-backend.about_us name='our_vision'  title='Our Vision' lang='tr' dataAboutUs="{{ $about_us->translation->where('lang_code','tr')[11]->value }}"  />
            <x-backend.about_us name='our_mission'   title='Our Mission' lang='tr' dataAboutUs="{{ $about_us->translation->where('lang_code','tr')[12]->value }}"  />
            <x-backend.about_us name='our_values'   title='Our Values' lang='tr' dataAboutUs="{{ $about_us->translation->where('lang_code','tr')[13]->value }}"  />
            <x-backend.about_us name='our_team'   title='Our Team' lang='tr' dataAboutUs="{{ $about_us->translation->where('lang_code','tr')[14]->value }}"  />
        </div>
    </div>
  </div>
    <!-- /.card-body -->