 @empty (!$categories->toArray())
 <!-- Achievements -->
    <section class="achievements" id="achievements" title="{{ __('home.Our_Achievements') }}">
        <div class="container">
            <h2 class="section-title" title="{{ __('home.Our_Achievements') }}">{{ __('home.Our_Achievements') }}</h2>
            <div class="row mt-5">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        @foreach ($categories as $category)
                        @if ($category->achievements->isEmpty())
                            @continue
                        @endif
                        <a class="nav-item nav-link {{ $loop->first ?  'active' : '' }}" id="nav-home-tab" data-toggle="tab" href="#nav-home-{{ $category->id }}" 
                            role="tab" aria-controls="nav-home" aria-selected="true">{{ $category->translation->where('lang_code',session('lang'))->first()->name }}</a>
                        @push('achve')
                        <div class=" pt-5 tab-pane fade show {{ $loop->first ?  'active' : '' }}" id="nav-home-{{ $category->id }}" role="tabpanel" aria-labelledby="nav-home-tab">
                            <div class="row">
                            @foreach ($category->achievements as $achievement)
                              <div class="col-md-4">
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
                        @endpush
                        @endforeach
                    </div>
                  </nav>
                  <div class="tab-content" id="nav-tabContent">
                    @stack('achve')
                  </div>


            </div>
        </div>


            <!-- /.card-body -->
    </section>
    @endempty
