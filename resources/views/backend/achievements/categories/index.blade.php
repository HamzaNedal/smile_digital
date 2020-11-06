@extends('backend.layouts.app')
@section('title', 'الأقسام')

@section('content')
@push('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">

@endpush
    <section class="content-header">
        {{-- <h1 class="pull-left">{{ __('dashboard.attributes.prodcut') }}</h1> --}}

    </section>
    <div class="content">
        <div class="clearfix"></div>
        <x-backend.message />
        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                 @include('backend.achievements.categories.table')
            </div>
        </div>
    
    </div>
@push('js')

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
     {{-- datatable --}}
     <script>
      $(function() {
          $('#form').DataTable({
            "language": {
            url: "{{ asset('js/arabic-datatable.json') }}",
            },
              processing: true,
              serverSide: true,
              ajax: '{!! route('admin.achievements.category.datatable') !!}',
              columns: [
                  { data: 'name', name: 'name' },
                  { data: 'created_at', name: 'created_at' },
                  {data: 'actions', name: 'actions', orderable: false, searchable: false}
              ]
          });
      });
  </script>
      <script>
        $(document).on('click','#update',function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                }
            });
            $.ajax({
            type: "post",
            url: "{{ route('admin.achievements.category.services.update') }}",
            data:{
                'new_category_id':$('#new_category_id').val(),
                'old_category_id':$('#old_category_id').val(),
                '_method': "put"
            },
            dataType: "json",
            success: function (response) {
                if(response.message=='success'){
                    location.reload();
                }
            }
        });
        })

    </script>
@endpush

@endsection

