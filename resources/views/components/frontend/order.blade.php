@empty(!$staticPages->toArray())

<section class="hero wow flipInX">
    <div class="container">
        <div class="row d-flex align-items-center">
            <div class="col-md-6  wow slideInLeft">
                <div class="hero-containt">
                    <h2>{{ $staticPages->name }}</h2>
                    <p>{{ $staticPages->value }}</p>
                    @if ($staticPages->parent->value)
                      <a href="{{ $staticPages->parent->value }}" class="btn btn-hero">{{ __('home.make_your_order') }}</a>
                    @endif
                </div>
            </div>
            <div class="col-md-6  wow slideInRight">
                <div class="img-containt">
                    <img src="{{ asset('frontend') }}/img/hero.svg" width="100%" alt="">
                </div>

            </div>
        </div>
    </div>
</section>

@endempty