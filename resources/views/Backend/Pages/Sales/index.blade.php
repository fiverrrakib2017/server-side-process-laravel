@extends('Backend.Layout.App')
@section('title','Dashboard | Admin Panel')
@section('style')
 <!-- vendor css -->
 <link href="{{asset('Backend/lib/@fortawesome/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
		<link href="{{asset('Backend/lib/ionicons/css/ionicons.min.css')}}" rel="stylesheet">
		<link href="{{asset('Backend/lib/highlightjs/styles/github.css')}}" rel="stylesheet">
  
    <link href="{{asset('Backend/lib/datatables.net-dt/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{asset('Backend/lib/datatables.net-responsive-dt/css/responsive.dataTables.min.css')}}" rel="stylesheet">

    <!-- Bracket CSS -->
    <link rel="stylesheet" href="{{asset('Backend/css/bracket.css')}}">

@endsection
@section('content')
      <div class="br-pageheader">
        <nav class="breadcrumb pd-0 mg-0 tx-12">
          <a class="breadcrumb-item" href="index.html">Dashboard</a>
          <a class="breadcrumb-item" href="#">Product</a>
          <span class="breadcrumb-item active">Sale</span>
        </nav>
      </div><!-- br-pageheader -->
<div class="br-section-wrapper" style="padding: 0px !important;"> 
  <div class="table-wrapper">
    <div class="card">
      <div class="card-header">
        <a  href="#" class="btn btn btn-success">Add New Sale</a>
      </div>
      <div class="card-body">
      <table id="datatable1" class="table display responsive nowrap">
      <thead>
        <tr>
          <th class="">No.</th>
          <th class="">Region</th>
          <th class="">Country</th>
          <th class="">Item Type</th>
          <th class="">Sales Channel </th>
          <th class="">Order Priority</th>
          <th class="">Order Date</th>
        </tr>
      </thead>
      <tbody>
         
      </tbody>
    </table>
      </div>
    </div>
    
  </div><!-- table-wrapper -->
</div><!-- br-section-wrapper -->

<div id="custom-spinner" class="spinner-border text-primary" role="status">
    <span class="sr-only">Loading...</span>
</div>
@endsection

@section('script')
    <script src="{{asset('Backend/lib/highlightjs/highlight.pack.min.js')}}"></script>
    <script src="{{asset('Backend/lib/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('Backend/lib/datatables.net-dt/js/dataTables.dataTables.min.js')}}"></script>
    <script src="{{asset('Backend/lib/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('Backend/lib/datatables.net-responsive-dt/js/responsive.dataTables.min.js')}}"></script>
    


    <script>
      $(function(){
        'use strict';
        var customSpinner = $('#custom-spinner');
            customSpinner.hide();
        $('#datatable1').DataTable({
          responsive: true,
          processing: true,
          serverSide: true,
           ajax: '{{ route('sales.data') }}',
         beforeSend: function () {
              // Show Bootstrap spinner before AJAX request
              customSpinner.show();
          },
          complete: function () {
              // Hide Bootstrap spinner after AJAX request
              customSpinner.hide();
          },
          language: {
            searchPlaceholder: 'Search Now',
            sSearch: '',
            lengthMenu: '_MENU_ items/page',
          },
          columns: [
            { data: 'id', name: 'id' },
            { data: 'Region', name: 'Region' },
            { data: 'Country', name: 'Country' },
            { data: 'Item Type', name: 'Item Type' },
            { data: 'Sales Channel', name: 'Sales Channel' },
            { data: 'Order Priority', name: 'Order Priority' },
            { data: 'Order Date', name: 'Order Date' },
        ],
        });

        // Select2
        $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });

      });


    
    </script>


  @if(session('success'))
    <script>
        toastr.success('{{ session('success') }}');
    </script>
    @elseif(session('error'))
    <script>
        toastr.error('{{ session('error') }}');
    </script>
    @endif
    
    @if(session('errors'))
        <script>
            var errors = @json(session('errors'));
            errors.forEach(function(error) {
              toastr.error(error);
            });
        </script>
    @endif    

@endsection

