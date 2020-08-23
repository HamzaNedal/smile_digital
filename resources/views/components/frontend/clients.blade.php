    <!-- Our Clients -->
    
    @empty(!$clients->toArray())
        <section class="clients wow fadeInUpBig">
            <div class="container">
                <h2 class="section-title">{{ __('home.Our_Clients') }}</h2>
            </div>
            
            <div class="owl-carousel owl-carousel-clients owl-theme">
                @foreach ($clients as $client)
                <div class="item text-center">
                    <div class="clients-img">
                        <img src="{{ asset('images/'.$client->parent->image) }}" alt="{{ $client->name }}" title="{{ $client->name }}">
                    </div>
                </div>
                @endforeach
            </div>
           


        </section>
    @endempty
