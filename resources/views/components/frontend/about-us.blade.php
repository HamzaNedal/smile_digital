{{-- <section class="about wow slideInLeft" id="about">
    <div class="container">
        <div class="owl-carousel owl-carousel-about owl-theme">
      
            @foreach ($aboutUs->skip(1) as $key => $about)
            <div class="item">
                <div class="row d-flex align-items-center">

                    <div class="col-md-5">
                        <div class="about-containt">
                            <h2 class="section-title">{{ __('home.'.$aboutUs->min()->name) }} </h2>
                            <p>{{ $aboutUs->min()->value }}</p>
                        </div>
                    </div>
                        <div class="col-md-7">
                        <div class="about-img">
                            <img class="idia" src="{{ asset('frontend') }}/img/idia.png" width="20" alt="">
                            <div class="containt">
                                <h3>{{ __('home.'.$about->name) }}</h3>
                                <p>{{ $about->value }}</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section> --}}

        <!-- Start About -->
        <section class="about" id="about">
            <div class="container">
          
                <div class="section-title wow slideInLeft">
                    @foreach ($aboutUs as $key => $about)
                    @if($loop->first)
                            <h2>{{ __('home.'.$aboutUs->min()->name) }}</h2>
                            <p>{{ $aboutUs->min()->value }}.</p>
                    @else
                    @push('about_us')

                    <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                        <div class="containt wow zoomIn">
                            @if ($about->name == 'our_vision')
                             <img src="{{ asset('frontend') }}/img/our_vision.png" alt="">
                            @endif
                            @if ($about->name == 'our_mission')
                            <img src="{{ asset('frontend') }}/img/our_mission.png" alt="">
                           @endif
                            @if ($about->name == 'our_values')
                            <img src="{{ asset('frontend') }}/img/our_values.png" alt="">
                            @endif
                            @if ($about->name == 'our_team')
                                <img src="{{ asset('frontend') }}/img/our_policies.png" alt="">
                            @endif
                            <div class="item-containt">
                                <h4 style="text-transform: capitalize;">{{ __('home.'.$about->name) }}</h4>
                                <p>
                                    {{$about->value}}
                                </p>
                            </div>
                        </div>
                    </div>
                    @endpush

                @endif
                @endforeach
                </div>

                <div class="row contint-card">
                    @stack('about_us')
                </div>
    
            </div>
    
        </section>
        <!-- End About -->   