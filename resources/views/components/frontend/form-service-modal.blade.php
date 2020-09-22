<div class="MyService_{{ $serviceTranslation->fk_services }} modal fade" id="MyService_{{ $serviceTranslation->fk_services }}" tabindex="-1" role="dialog"
    aria-labelledby="MyService" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="MyService-{{ $serviceTranslation->fk_services }}">{{ $serviceTranslation->name }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('storeServiceResquests') }}" method="post" enctype="multipart/form-data" id="formService">
                    @csrf
                    <input type="hidden" name="service_id" value="{{ $serviceTranslation->fk_services }}">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">{{ __('home.name') }}:</label>
                        <input type="text" class="form-control" id="" name="name">
                      </div>
                      <div class="form-group">
                        <label for="recipient-name" class="col-form-label">{{ __('home.country_name') }}:</label>
                        @include('frontend.country.country_name')
                      </div>
                      <div class="form-group">
                        <label for="recipient-name" class="col-form-label">{{ __('home.country_code') }}:</label>
                        @include('frontend.country.country_code')
                      </div>
                      <div class="form-group">
                        <label for="recipient-name" class="col-form-label">{{ __('home.phone_no') }}:</label>
                        <input type="text" class="form-control" id="" name="phone_no">
                      </div>
                      <div class="form-group">
                        <label for="recipient-name" class="col-form-label">{{ __('home.email') }}:</label>
                        <input type="email" class="form-control" id="" name="email">
                      </div>
                      <div class="form-group">
                        <label for="recipient-name" class="col-form-label">{{ __('home.short_description') }}:</label>
                        <input type="text" class="form-control" id="" name="short_description" >
                      </div>
                      <div class="form-group">
                        <label for="recipient-name" class="col-form-label">{{ __('home.file') }}:</label>
                        <div>
                            <input type="file"  name="file" id="customFile" >
                        </div>
                      </div>
                    
                </form>   
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('home.close') }}</button>
                <input type="submit" class="btn btn-primary" value="{{ __('home.send') }}" id="submit-form">
            </div>
        </div>
    </div>
</div>
@push('js')
<script>
    $('#submit-form').on('click',function(){
        $('#formService').submit();
    })
</script>
@endpush
