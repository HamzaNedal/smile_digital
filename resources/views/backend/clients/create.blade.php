@extends('backend.layouts.app')
@section('title', 'Add Client')

@section('content')

    <div class="content">
        <div class="content">
            <x-backend.errors/>       
          <div class="box box-primary">
                    <div class="col-md-6">
                        <!-- general form elements -->
                        <div class="card card-primary mt-2 mr-2">
                          <div class="card-header">
                            <h3 class="card-title float-left">إضافة عميل</h3>
                          </div>
                          <form action="{{ route('admin.client.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            
                                @include('backend.clients.fields')
                                
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">حفظ</button>
                            </div>
                          </form>
                         </div>
                     </div>
                </div>
            </div>
        </div>
    </div>
    @push('js')
    <script src="{{ asset('backend') }}/plugins/summernote/summernote-bs4.min.js"></script>
    <script src="{{ asset('js/summernote-ext-rtl.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
             $('.textarea').summernote({
              height: 200,
              dialogsInBody: true,
              callbacks:{
                  onInit:function(){
                  $('body > .note-popover').hide();
                  }
               },
           });
        });
        function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function(e) {
            $('#image').attr('src', e.target.result);
            $('#image').removeClass('d-none');
            }
            
            reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
        }

        $("#photoInput").change(function() {
            readURL(this);
        });
  </script>
    @endpush
@endsection
