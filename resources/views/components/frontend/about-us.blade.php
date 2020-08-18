<section class="about wow slideInLeft" id="about">
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
</section>