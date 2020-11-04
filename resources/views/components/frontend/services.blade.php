@if($servicesCategories->isNotEmpty()) 

<!-- Our Servise -->
    <section class="services" id="services" title="{{ __('home.Our_Services') }}">
        <div class="container">
            <h2 class="section-title" title="{{ __('home.Our_Services') }}">{{ __('home.Our_Services') }}</h2>
            <div class="row mt-5 text-center">
                @foreach ($servicesCategories as $serCat)
                @if($serCat->translation->isNotEmpty())
           
                <div class="col-md-4">
                    <div class="services-containt wow zoomIn">
                        <div class="services-img">
                            {{-- <img src="{{ asset('frontend/img') }}/serves.png" alt=""> --}}
                            <img src="{{ asset('images/'.$serCat->parent->image) }}" alt="{{ $serCat->name }}" title="{{ $serCat->name }}">
                        </div>

                        <h3 title="{{ $serCat->name }}">{{ $serCat->name }}</h3>
                        <ul>
                            @foreach ($serCat->translation as $key => $item)
                            <li title="{{ $item->name }}" role="button" data-backdrop="static" data-keyboard="false" data-toggle="modal"
                            data-target="#MyService_{{ $item->fk_services }}"><span class="number">{{ ++$key }}</span><span style="display: inline-block;
                            width: calc(100% - 70px);">{{ $item->name }}</span></li>
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