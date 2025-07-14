@extends('admin.layouts.master')
@push('css')
@endpush
@section('master')

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Invoice List</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Invoices</a></li>
                    <li class="breadcrumb-item active">Invoice List</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- end page title -->


<div class="row dashboard">
    <div class="col-md-6">
        <div class="card card-height-100">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Balance Summary for {{request('date', now()->toDateString())}}</h4>
            </div>
            <!-- end card header -->
            <div class="card-body">
                <div class="table-responsive mt-3">
                    <table class="table table-borderless table-sm table-centered align-middle table-nowrap mb-0">
                        <tbody class="border-0">
                            <tr>
                                <td>
                                    <h4 class="text-truncate fs-14 mb-0"><i class="ri-stop-fill align-middle fs-18 text-primary me-2"></i>Total Amount</h4>
                                </td>
                                <td>
                                    <p class="text-muted mb-0">{{$total_amount}} <i class="ri-coin-fill"></i> <span class="balance-summary-total-amount"></span></p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h4 class="text-truncate fs-14 fs-medium mb-0"><i class="ri-stop-fill align-middle fs-18 text-warning me-2"></i>Total Cost</h4>
                                </td>
                                <td>
                                    <p class="text-muted mb-0">{{$total_cost}} <i class="ri-coin-fill"></i> <span class="balance-summary-total-cost"></span></p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h4 class="text-truncate fs-14 fs-medium mb-0"><i class="ri-stop-fill align-middle fs-18 text-info me-2"></i>Total Income</h4>
                                </td>
                                <td>
                                    <p class="text-muted mb-0">{{$total_profit}} <i class="ri-coin-fill"></i> <span class="balance-summary-total-profit"></span></p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->
    </div>

    <div class="col-md-6">
        <div class="card card-height-100">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Filtering</h4>
            </div>

            <form action="" method="post">
                <div class="card-body">
                    <ul class="list-group list-group-flush border-dashed mb-0">
    
                        <li class="list-group-item px-0">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1 ms-2">
                                    <h6 class="mb-0">Filtering by date</h6>
                                </div>
                                <div class="flex-shrink-0 text-end">
                                    <input type="date" class="form-control" name="date" value="{{request('date') !== null ? request('date') : date('Y-m-d')}}">
                                </div>
                            </div>
                        </li>
                        
                        <li class="list-group-item px-0">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1 ms-2">
                                    <h6 class="mb-0">Filtering by items</h6>
                                </div>
                                <div class="flex-shrink-0 text-end">
                                    <select class="form-select" name="item">
                                      <option selected>Select an option</option>
                                      <option value="product" @if(request('item') === "product") selected @endif>Product</option>
                                      <option value="service" @if(request('item') === "service") selected @endif>Service</option>
                                      <option value="surgery" @if(request('item') === "surgery") selected @endif>Surgery</option>
                                      <option value="vaccine" @if(request('item') === "vaccine") selected @endif>Vaccine</option>
                                      <option value="test" @if(request('item') === "test") selected @endif>Test</option>
                                    </select>
    
                                </div>
                            </div>
                        </li>
                        
                    </ul>
                </div>
            </form>
            <!-- end card body -->
        </div>
        <!-- end card -->
    </div>

</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="card-title mb-0">All Invoices</h5>
                @can('Invoice Add')
                    <a href="{{ route('admin.invoice.add') }}" class="btn btn-primary btn-label rounded-pill btn-sm"><i class="ri-add-circle-fill label-icon align-middle rounded-pill"></i> Add Invoice</a>
                @endcan
            </div>
            <div class="card-body">
                <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{keywords()->Invoice_ID ?? __('Invoice ID')}}</th>
                            <th>{{keywords()->Patient_ID ?? __('Patient ID')}} </th>
                            <th>{{keywords()->Patient_Name ?? __('Patient Name')}} </th>
                            <th>{{keywords()->Parents_Name ?? __('Parents Name')}} </th>
                            <th>{{keywords()->Total_Amount ?? __('Total Amount')}} </th>
                            <th>{{keywords()->Status ?? __('Status')}} </th>
                            @canany(['Invoice Print', 'Invoice Delete', 'Invoice Add'])
                                <th class="d-flex justify-content-end">{{keywords()->Actions ?? __('Actions')}} </th>
                            @endcanany
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataTypes as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{$data->unique_id}}</td>
                                <td>{{$data->patient_id}}</td>
                                <td>{{$data->patient_name}}</td>
                                <td>{{$data->parents_name}}</td>
                                <td>{{$data->cart_total}}</td>
                                <td class="text-capitalize">{{$data->status}}</td>
                                
                                @canany(['Invoice Print', 'Invoice Delete', 'Invoice Add'])
                                    <td>
                                        <div class="d-flex justify-content-end gap-2">
                                            @can('Invoice Print')
                                                <a href="{{route('admin.invoice.print', $data)}}" class="btn btn-primary btn-label rounded-pill btn-sm"><i class="ri-printer-fill label-icon align-middle rounded-pill"></i> Print</a>
                                            @endcan

                                            @can('Invoice Edit')
                                                @if($data->status === "Due")
                                                    <a onclick="return confirm('Are you sure?')" href="{{route('admin.invoice.paid', $data)}}" class="btn btn-success btn-label rounded-pill btn-sm"><i class="ri-add-circle-fill label-icon align-middle rounded-pill"></i> Mark As Paid</a>
                                                @endif
                                                
                                                <a onclick="return confirm('Are you sure?')" href="{{route('admin.invoice.delete', $data)}}" class="btn btn-danger btn-label rounded-pill btn-sm"><i class="ri-delete-bin-line label-icon align-middle rounded-pill"></i> Delete</a>
                                            @endcan
                                        </div>
                                    </td>
                                @endcanany
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection

@push('js')
<script>
// Check if already initialized and destroy it
if ($.fn.DataTable.isDataTable('#example')) {
  $('#example').DataTable().clear().destroy();
}

// Now reinitialize with your new settings
$('#example').DataTable({
  paging: false
});

</script>


 <script>
  // Function to update the URL parameters
  function updateUrlParam(key, value) {
    const url = new URL(window.location);
    if (value === "" || value === "Select an option") {
      url.searchParams.delete(key); // Remove empty/default selections
    } else {
      url.searchParams.set(key, value); // Set or update the param
    }
    history.replaceState(null, "", url); // Update URL without reload
    
    window.location.reload();
  }

  // Add event listeners
  document.querySelector('[name="date"]').addEventListener('change', function () {
    updateUrlParam('date', this.value);
  });

  document.querySelector('[name="item"]').addEventListener('change', function () {
    updateUrlParam('item', this.value);
  });
</script>
@endpush