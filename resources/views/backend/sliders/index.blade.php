@extends('backend.layouts.app')
@section('title', 'Sliders')

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
                    @include('backend.sliders.table')
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
              processing: true,
              serverSide: true,
              "language": {
            url: "{{ asset('js/arabic-datatable.json') }}",
            },
              ajax: '{!! route('admin.slider.datatable') !!}',
              columns: [
                  { data: 'title', name: 'title' },
                  { data: 'description', name: 'description' },
                  { data: 'link', name: 'link' },
                //   { data: 'image', name: 'image' },
                  { data: 'background_image', name: 'background_image' },
                  { data: 'created_at', name: 'created_at' },
                  {data: 'action', name: 'action', orderable: false, searchable: false}
              ]
          });
      });
  </script>
@endpush
@endsection

