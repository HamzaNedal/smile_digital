 @empty (!$achievements->toArray())
 <!-- Achievements -->
    <section class="achievements" id="achievements">
        <div class="container">
            <h2 class="section-title">{{ __('home.Our_Achievements') }}</h2>
            <div class="row mt-5">
                @foreach ($achievements as $achievement)

                <div class="col-md-4 wow slideInLeft">
                    <a href="{{ $achievement->link }}">
                        <div class="containt">
                            <div class="desc">
                                <h4>{{ $achievement->translation->where('lang_code',session('lang'))->first()->name }}</h4>
                                {{-- <h5>Brand Design</h5> --}}
                                <i class="fa fa-arrow-right fa-1x"></i>
                            </div>
                    </a>
                    <img src="{{ asset('images/'.$achievement->image) }}" alt="{{ $achievement->translation->where('lang_code',session('lang'))->first()->name }}">
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </section>
    @endempty
