@extends('backend.layouts.app')
@section('title', 'تواصل معنا')

@section('content')

    <section class="content-header">
        {{-- <h1 class="pull-left">{{ __('dashboard.attributes.prodcut') }}</h1> --}}

    </section>
    <div class="content">
        <div class="clearfix"></div>

        {{-- @include('flash::message') --}}

        <div class="clearfix"></div>
        <div class="box box-primary">
 
            <div class="box-body">
                    @include('backend.contactUs.table')
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
              ajax: '{!! route('admin.contactUs.datatable') !!}',
              columns: [
                  { data: 'name', name: 'name' },
                  { data: 'email', name: 'email' },
                  { data: 'phone', name: 'phone' },
                  { data: 'message', name: 'message' },
                  { data: 'created_at', name: 'created_at' },
                  {data: 'action', name: 'action', orderable: false, searchable: false}

              ]
          });
      });
  </script>
@endpush
@endsection

