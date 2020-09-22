    <!-- Footer -->
    <footer class="footer wow fadeIn">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <img src="{{ asset('frontend') }}/img/Group 122.png" alt="">
                </div>
                <div class="col-md-4">
                    <ul>
                        @if ($staticPages->where('key', 'address')->first()->value)
                            <li>
                                <i
                                    class="fa fa-map-marker"></i>{{ $staticPages->where('key', 'address')->first()->value }}
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
                <div class="col-md-4 ">
                    <h6>{{ __('home.Our_Services') }}</h6>
                    <ul>
                        @foreach ($ServiceCategories as $service)
                            <x-frontend.modal :service="$service" />
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
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
    @endpush