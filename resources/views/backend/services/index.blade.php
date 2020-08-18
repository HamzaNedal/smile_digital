@extends('backend.layouts.app')
@section('title', 'Service')

@section('content')

<section class="content-header">

</section>
<div class="content">
    <div class="clearfix"></div>
    <x-backend.message />
    <div class="clearfix"></div>
    <div class="box box-primary">
        <div class="box-body">
             @include('backend.services.table')
        </div>
    </div>

</div>
@push('js')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
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
          ajax: '{!! route('admin.service.datatable') !!}',
          columns: [
              { data: 'name', name: 'name' },
              { data: 'category', name: 'category' },
              { data: 'description', name: 'description' },
              { data: 'created_at', name: 'created_at' },
              {data: 'actions', name: 'actions', orderable: false, searchable: false}
          ]
      });
  });
</script>
@endpush
@endsection

