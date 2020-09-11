@extends('backend.layouts.app')
@section('title', 'العملاء')

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
                 @include('backend.clients.table')
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
              ajax: '{!! route('admin.client.datatable') !!}',
              columns: [
                  { data: 'name', name: 'name' },
                  { data: 'link', name: 'link' },
                  { data: 'image', name: 'image' },
                  { data: 'created_at', name: 'created_at' },
                  {data: 'actions', name: 'actions', orderable: false, searchable: false}
              ]
          });
      });
  </script>
@endpush
@endsection

