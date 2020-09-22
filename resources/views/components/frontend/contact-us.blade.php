    <!-- Contact -->
    <section class="contact-us" id="contact">
        <div class="container">
            <h2 class="wow flipInX">{{ __('home.Need_Help') }}<?= session('lang')=='ar' ? '؟' : '?'?> {{ __('home.Say_Hello') }}</h2>
            {{-- <p class="wow lightSpeedIn">Aliquam a augue suscipit, luctus neque purus ipsum neque dolor primis libero tempus, tempor posuere ligula varius impedit enim tempor sapien</p> --}}
            <p class="wow lightSpeedIn"></p>
            <form action="{{ route('storeContactUs') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-4 wow flipInX">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="{{ __('home.USERNAME') }}" name="name">
                        </div>
                    </div>
                    <div class="col-md-4 wow flipInX">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="{{ __('home.PHONE_NUMBER') }}" name="phone">
                            {{-- <span>+972</span> --}}
                        </div>
                    </div>
                    <div class="col-md-4 wow flipInX">
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="{{ __('home.E-Mail') }}" name="email">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 wow flipInX">
                        <div class="form-group">
                            <textarea class="form-control" rows="5" placeholder="{{ __('home.palceholder_message') }}" name="message"></textarea>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-contact float-right">{{ __('home.Send_Message') }}</button>
            </form>
        </div>
    </section>

