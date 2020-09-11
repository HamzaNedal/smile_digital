@extends('backend.layouts.app')
@section('title', 'إنشاء خدمة')

@section('content')

        <div class="content">
        <x-backend.errors/>
        <div class="box box-primary">
                    <div class="col-md-6">
                        <!-- general form elements -->
                        <div class="card card-primary mt-2 mr-2">
                          <div class="card-header">
                            <h3 class="card-title float-left">اضف خدمة</h3>
                          </div>
                          <form action="{{ route('admin.service.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            
                                @include('backend.services.fields')
                                
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">حفظ</button>
                            </div>
                          </form>
                         </div>
                     </div>
                </div>
    </div>
@endsection
