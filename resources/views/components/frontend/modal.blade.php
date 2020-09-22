<li role="button" data-backdrop="static" data-keyboard="false" data-toggle="modal"
    data-target="#MyServices-{{ $service->id }}" data-id="{{ $service->id }}">
    {{ $service->name }}
</li>
<div class="modal fade" id="MyServices-{{ $service->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="MyServices-{{ $service->id }}">{{ __('home.services') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @if ($service->translation->isNotEmpty())
                    @foreach ($service->translation as $serviceTranslation)
                            <div class="row  p-2">
                                <div class="col-6 text-dark">
                                    {{ $serviceTranslation->name }}
                                </div>
                                <div class="col-6">
                                    <a role="button" data-toggle="modal" data-backdrop="static" data-keyboard="false"
                                        data-target="#MyService_{{ $serviceTranslation->fk_services }}"
                                        data-id="{{ $service->fk_services }}"
                                        class="btn btn-primary {{ session('lang') == 'ar' ? 'float-left' : 'float-right' }}"
                                        data-dismiss="modal">{{ __('home.make_your_order') }}</a>
                                    @push('modal-form')
                                        {{-- stack exist in <x-frontend.footer /> --}}
                                        <x-frontend.form-service-modal :serviceTranslation="$serviceTranslation" />
                                    @endpush
                                </div>
                            </div>
                    @endforeach
                @else
                        <div class="text-center te text-dark">
                            {{ __('home.There_are_no_services_yet') }}
                        </div>
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('home.close') }}</button>
            </div>
        </div>
    </div>
</div>

