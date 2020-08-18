    <!-- Footer -->
    <footer class="footer wow fadeIn">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <img src="{{ asset('frontend') }}/img/logo-footer.png" alt="">
                </div>
                <div class="col-md-4">
                    <ul>
                        <li>
                            <i class="fa fa-map-marker"></i>{{ $staticPages->where('key','address')->first()->value }}
                        </li>
                        <li>
                            <i class="fa fa-whatsapp "></i> {{ $staticPages->where('key','whats_app')->first()->value }}
                        </li>
                        <li>
                            <i class="fa fa-phone "></i> {{ $staticPages->where('key','phone')->first()->value }}
                        </li>
                    </ul>
                </div>
                <div class="col-md-4 ">
                    <h6>{{ __('home.Our_Services') }}</h6>
                    <ul>
                        @foreach ($ServiceCategories as $category)
                        <li>
                            {{ $category->name }}
                        </li>
                        @endforeach
                       
                    </ul>
                </div>
            </div>
        </div>
    </footer>