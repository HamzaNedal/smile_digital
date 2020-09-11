    <!-- Our Clients -->
    
    @empty(!$clients->toArray())
        <section class="clients wow fadeInUpBig">
            <div class="container">
                <h2 class="section-title">{{ __('home.Our_Clients') }}</h2>
            </div>
            
            <div class="owl-carousel owl-carousel-clients owl-theme">
                @foreach ($clients as $client)
                <div class="item text-center" style="padding: 10px;">
                    <div class="clients-img">
                        <a href="{{ $client->parent->link }}" target="_blank">

                            <img src="{{ asset('images/'.$client->parent->image) }}" alt="{{ $client->name }}" title="{{ $client->name }}">
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
           


        </section>
    @endempty
