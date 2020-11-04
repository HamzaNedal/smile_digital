 @empty (!$achievements->toArray())
 <!-- Achievements -->
    <section class="achievements" id="achievements" title="{{ __('home.Our_Achievements') }}">
        <div class="container">
            <h2 class="section-title" title="{{ __('home.Our_Achievements') }}">{{ __('home.Our_Achievements') }}</h2>
            <div class="row mt-5">
                @foreach ($achievements as $achievement)

                <div class="col-md-4 wow slideInLeft">
                    <a rel="nofollow" target="_blank" href="{{ $achievement->link }}" title="{{ $achievement->translation->where('lang_code',session('lang'))->first()->name }}">
                        {{-- <div class="containt" style='background-image: url("{{ asset('images/'.$achievement->image) }}") '> --}}
                            <div class="containt">
                            <div class="desc">
                                <h4>{{ $achievement->translation->where('lang_code',session('lang'))->first()->name }}</h4>
                                {{-- <h5>Brand Design</h5> --}}
                                <i class="fa fa-arrow-right fa-1x"></i>
                            </div>
                    
                    <img src="{{ asset('images/'.$achievement->image) }}" alt="{{ $achievement->translation->where('lang_code',session('lang'))->first()->name }}">
                    {{-- <img src="{{ asset('images/'.$achievement->image) }}" "> --}}
                    </div>
					</a>
                </div>
                @endforeach

            </div>
        </div>
    </section>
    @endempty
