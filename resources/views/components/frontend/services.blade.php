@if($servicesCategories->isNotEmpty()) 

<!-- Our Servise -->
    <section class="services" id="services">
        <div class="container">
          @stack('head')
            

            <div class="row mt-5 text-center">
                @foreach ($servicesCategories as $serCat)
                @if($serCat->translation->isNotEmpty())
                @if ($loop->first)
                    @push('head')
                         <h2 class="section-title">{{ __('home.Our_Services') }}</h2>
                    @endpush
                @endif
                <div class="col-md-4">
                    <div class="services-containt wow zoomIn">
                        <div class="services-img">
                            <img src="{{ asset('frontend/img') }}/serves.png" alt="">
                            <img src="{{ asset('images/'.$serCat->parent->image) }}" alt="">
                        </div>

                        <h3>{{ $serCat->name }}</h3>
                        <ul>
                            @foreach ($serCat->translation as $key => $item)
                            <li role="button" data-backdrop="static" data-keyboard="false" data-toggle="modal"
                            data-target="#MyService_{{ $item->fk_services }}"><span class="number">{{ ++$key }}</span>{{ $item->name }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @endif

                @endforeach

            </div>
        </div>
    </section>
@endif