@extends('backend.layouts.app')
@section('title', 'Create Slider')

@section('content')

    <div class="content">
        <x-backend.errors/>     
      <div class="box box-primary">
            <div class="box-body">
                    <div class="col-md-6">
                        <!-- general form elements -->
                        <div class="card card-primary mt-2 mr-2">
                          <div class="card-header">
                            <h3 class="card-title float-left">اضافة سلايدر</h3>
                          </div>
                          <form action="{{ route('admin.slider.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            
                                @include('backend.sliders.fields')
                                
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">حفظ</button>
                            </div>
                          </form>
                         </div>
                     </div>
            </div>
        </div>
    </div>
    @push('js')
    <script>
    function readURL(input,id) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function(e) {
            $(`#${id}`).attr('src', e.target.result);
            $(`#${id}`).removeClass('d-none');
            }
            
            reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
    }

        $("#photoInput").change(function() {
            readURL(this,'image');
        });
        $("#background-image").change(function() {
            readURL(this,'background_image');
        });
    </script>
@endpush

@endsection
