@extends('backend.layouts.app')
@section('title', 'تعديل بيانات القسم')

@section('content')

    <div class="content">
        <div class="content">
            <x-backend.errors/>             
          <div class="box box-primary">
            <div class="box-body">
                    <div class="col-md-6">
                        <!-- general form elements -->
                        <div class="card card-primary mt-2 mr-2">
                          <div class="card-header">
                            <h3 class="card-title float-left">تعديل القسم</h3>
                          </div>
                          <form action="{{ route('admin.category.update',['id'=>$category->id]) }}" method="post" enctype="multipart/form-data">
                              @csrf
                              @method('put')
                              @include('backend.services.categories.fields')
                                                        
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
<script>
    function resetFile() { 
        const file = 
            document.getElementById('photoInput'); 
        file.value = ''; 
    } 
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function(e) {
            $('#image').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
    }

    $("#photoInput").change(function() {
        readURL(this);
    });
    $(document).on('click','.undoImage',function(){
        // console.log('asfd');
        resetFile();
        src = $('.backImage').attr('src');
        $('#image').attr('src', src);
    
    })
 </script>
@endpush
@endsection