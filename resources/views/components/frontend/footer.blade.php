    <!-- Footer -->
    <footer class="footer wow fadeIn">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <img src="{{ asset('frontend') }}/img/Group 122.png" alt="">
                </div>
                <div class="{{ $places->isNotEmpty() ? 'col-md-3'  : 'col-md-4' }}">
                    <ul>
                        @if ($staticPages->where('key', 'address')->first()->value)
                            <li>
                                <i class="fa fa-map-marker"></i>{{ $staticPages->where('key', 'address')->first()->value }}
                            </li>
                        @endif
                        @if ($staticPages->where('key', 'whats_app')->first()->value)
                            <li>
                                <i class="fa fa-whatsapp "></i>
                                {{ $staticPages->where('key', 'whats_app')->first()->value }}
                            </li>
                        @endif
                        @if ($staticPages->where('key', 'phone')->first()->value)
                            <li>
                                <i class="fa fa-phone "></i> {{ $staticPages->where('key', 'phone')->first()->value }}
                            </li>
                        @endif
                    </ul>
                </div>
                <div class="{{ $places->isNotEmpty() ? 'col-md-3'  : 'col-md-4' }}">
                    <h6>{{ __('home.Our_Services') }} :</h6>
                    <ul>
                        @foreach ($ServiceCategories as $service)
                            <x-frontend.modal :service="$service" />
                        @endforeach
                    </ul>
                </div>
                @if ($places->isNotEmpty())
                <div class="col-md-3">
                    <h6>{{ __('home.Our_representative_offices') }} :</h6>
                    <ul class="scrollChange translate">
                        @foreach ($places as $key=> $place)
                             <li>{{ $place->value }}<span>&#8204;</span></li>
                        @endforeach
                    </ul>
                       
                </div>
                @endif


            </div>
        </div>
        <div id="google_translate_element"></div>
    </footer>

    {{-- push exist in <x-frontend.modal /> --}}
    @stack('modal-form')
    @push('js')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script>
          $(document).on('change','.country_name',function(){
       var parent_code =  $(this).find(':selected').data('code')
       
       var phone_country_code =$(this).parent().siblings().find('#phone_country_code');
        $(this).parent().siblings().find('#phone_country_code').children().toArray().forEach((element) => {
            if(parent_code == element.value){
                console.log(phone_country_code.val(parent_code));
            }
        }); 
        $('.phone_country_code').trigger('change');
    })
    </script>


    <script>
    function googleTranslateElementInit() {
      new google.translate.TranslateElement({
        pageLanguage: "{{ session('lang') =='ar' ? 'en' : 'ar'}}",
        includedLanguages: "{{ session('lang') }}",
      }, 'google_translate_element');
    }
    </script>
    
    <script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<script>
   interval = setInterval(function(){ 
    var select = $('.goog-te-combo')[0];
        if(select != 'undefined'){
            var event = new Event('change');
            select.dispatchEvent(event);
            select.value ="{{ session('lang') }}";
            clearInterval(interval);
        }
     }, 1000);
    
    
</script>
    @endpush