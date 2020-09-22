@extends('backend.layouts.app')
@section('title', 'الخدمات')

@section('content')

    <section class="content-header">
        {{-- <h1 class="pull-left">{{ __('dashboard.attributes.prodcut') }}</h1> --}}

    </section>
    <div class="content">
        <div class="clearfix"></div>
        <x-backend.message />
        <div class="clearfix"></div>
        <div class="box box-primary">
 
            <div class="box-body">
                    @include('backend.services.service_requests.table')
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
              ajax: '{!! route('admin.service_requests.datatable') !!}',
              columns: [
                  { data: 'name', name: 'name' },
                  { data: 'name_service', name: 'name_service' },
                  { data: 'email', name: 'email' },
                  { data: 'phone_no',
                        render: function(data, type, row, meta)
                      {
                          return '+'+row.phone_country_code+''+row.phone_no;
                      },
                   },
                  { data: 'short_description', name: 'short_description' },
                  { data: 'country', name: 'country' },
                  { data: 'file', name: 'file' },
                  { data: 'read', name: 'read' },
                  { data: 'created_at', name: 'created_at' },
                  {data: 'deletebtn', render: function(data, type, row, meta)
                      {
                          return row.deletebtn+''+row.readbtn;
                      }, orderable: false, searchable: false}
              ]
          });
      });
  </script>
@endpush
@endsection

