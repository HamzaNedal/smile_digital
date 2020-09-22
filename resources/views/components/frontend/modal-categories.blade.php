
<div class="modal fade" id="MakeYourOrder" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="MakeYourOrder">{{ __('home.categories') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @if ($categories->isNotEmpty())
                    @foreach ($categories as $category)
                            <div class="row  p-2">
                                <div class="col-6 text-dark">
                                    {{ $category->name }}
                                </div>
                                <div class="col-6">
                                    <a role="button" data-toggle="modal" data-backdrop="static" data-keyboard="false"
                                        data-target="#MyServices-{{ $category->id }}"
                                        class="btn btn-primary {{ session('lang') == 'ar' ? 'float-left' : 'float-right' }}"
                                        data-dismiss="modal">{{ __('home.show') }} {{ __('home.services') }}</a>
                              
                                </div>
                            </div>
                    @endforeach
                @else
                        <div class="text-center te text-dark">
                            {{ __('home.There_are_no_categories_yet') }}
                        </div>
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('home.close') }}</button>
            </div>
        </div>
    </div>
</div>