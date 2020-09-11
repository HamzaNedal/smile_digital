@extends('backend.layouts.app')
@section('title', 'تعديل بيانات العميل')

@section('content')

    <div class="content">
        <div class="content">
            <x-backend.errors/>             
          <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <!-- general form elements -->
                        <div class="card card-primary mt-2 mr-2">
                          <div class="card-header">
                            <h3 class="card-title float-left">تعديل بيانات العميل</h3>
                          </div>
                          <form action="{{ route('admin.client.update',['id'=>$client->id]) }}" method="post" enctype="multipart/form-data">
                              @csrf
                              @method('put')
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
</div>
@endsection