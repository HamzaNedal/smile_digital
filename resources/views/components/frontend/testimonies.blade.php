{{-- @dd($testimonies->toArray()) --}}
@empty(!$testimonies->toArray())
    <!-- Testimonies -->
    <section class="testimonies wow slideInUp" id="testimonies">
        <div class="container">
            <h2 class="section-title">{{ __('home.Testimonies') }}</h2>
        </div>

        <div class="testimonies-slider">
            <div class="container">
                <div class="owl-carousel owl-carousel-testimonies owl-theme">
                    @foreach ($testimonies as $testimony)
                        <div class="item text-center">
                            <i class="fa fa-quote-right fa-5x text-light"></i>
                            <p>{{ $testimony->description }}.</p>
                            <img src="{{ asset('images/'.$testimony->parent->image) }}" alt="">
                            <h4>{{ $testimony->name }}</h4>
                        </div>
                    @endforeach
              
                </div>
            </div>
        </div>
    </section>
@endempty