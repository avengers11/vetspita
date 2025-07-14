@extends('admin.layouts.master')
@section('master')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Create Invoice</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Invoices</a></li>
                    <li class="breadcrumb-item active">Create Invoice</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->
@php
    $costVisible = auth()->user()->can('Invoice Cost') ? '' : 'd-none';
@endphp

<div class="row justify-content-center">
    <div class="col-xxl-12">
        <div class="card">
            <form action="" method="POST" class="needs-validation">
                @csrf 

                <div class="card-body border-bottom border-bottom-dashed p-4">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="profile-user mx-auto  mb-3">
                                <img src="{{Storage::url(getSettings('favicon'))}}" style="height: 82px">
                            </div>
                            <div>
                                <div>
                                    <label for="companyAddress">Address</label>
                                </div>
                                <div class="mb-2">
                                    <input type="text" class="form-control bg-light border-0" id="address" name="address" required />
                                </div>
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-lg-4 ms-auto">
                            <div  class="mb-2">
                                <select id="all_pets" name="patient_id" class="selectpicker" data-live-search="true">
                                    <option value="">Select a patient</option>
                                    @foreach ($pets as $item)
                                        <option value="{{ $item->unique_id }}" data-id="{{ $item->id }}" data-subtext="{{ $item->unique_id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-2">
                                <input type="text" class="form-control bg-light border-0" placeholder="Patient Name" name="patient_name" id="patient_name"  required />
                            </div>
                            <div class="mb-2">
                                <input type="text" class="form-control bg-light border-0" placeholder="Parent's Name" name="parents_name" id="parents_name" required />
                            </div>
                            <div>
                                <input type="text" class="form-control bg-light border-0" placeholder="Mobile Number" id="user_number" name="user_number" required />
                            </div>
                        </div>
                    </div>
                    <!--end row-->
                </div>
                <div class="card-body p-4">
                    <div class="row g-3">
                        <div class="col-lg-4 col-sm-6">
                            <label for="invoicenoInput">Invoice No</label>
                            <input type="text" class="form-control bg-light border-0"  value="{{ $invoice_id }}" name="unique_id" readonly="readonly" />
                        </div>
                        <!--end col-->
                        <div class="col-lg-4 col-sm-6">
                            <div>
                                <label for="date-field">Date</label>
                                <input type="datetime-local" class="form-control" name="date" value="{{ \Carbon\Carbon::now()->format('Y-m-d\TH:i') }}" required>
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-lg-4 col-sm-6">
                            <label for="choices-payment-status">Payment Method</label>
                            <div class="input-light">
                                <select class="form-control" name="payment_method" required>
                                    <option value="">Select Payment Method</option>
                                    <option value="Bank">Bank</option>
                                    <option value="Cash">Cash</option>
                                </select>
                            </div>
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->
                </div>
               
                <div class="card-body p-4">
                    <div class="table-responsive">
                        <table class="invoice-table table table-borderless table-nowrap mb-0">
                            <thead class="align-middle">
                                <tr class="table-active">
                                    <th scope="col" style="width: 50px;">#</th>
                                    <th scope="col">Item Details</th>
                                    <th scope="col" style="width: 120px;"><div class="d-flex currency-select input-light align-items-center">Rate (৳)</div></th>
                                    <th scope="col" style="width: 120px;">Quantity</th>
                                    <th scope="col" class="text-start" style="width: 150px;">Discount (৳)</th>
                                    <th scope="col" class="text-start" style="width: 150px;">Amount (৳)</th>
                                    <th scope="col" class="text-start {{ $costVisible }}" style="width: 150px;">Cost (৳)</th>
                                    <th scope="col" class="text-end" style="width: 105px;">Action</th>
                                </tr>
                            </thead>
                            <tbody id="newlink">
                                {{-- <tr>
                                    <th scope="row">1</th>
                                    <td class="text-start">
                                        <div class="mb-2">
                                            <input type="text" class="form-control" placeholder="Item Details" required />
                                        </div>
                                    </td>
                                    <td>
                                        <input type="number" class="form-control item-price"  placeholder="0.00" required />
                                    </td>
                                    <td>
                                        <div class="input-step">
                                            <button type="button" class='minus'>–</button>
                                            <input type="number" class="item-quantity" value="0" readonly>
                                            <button type="button" class='plus'>+</button>
                                        </div>
                                    </td>
                                    <td class="text-end">
                                        <div>
                                            <input type="text" class="form-control item-discount" placeholder="00" />
                                        </div>
                                    </td>
                                    <td class="text-end">
                                        <div>
                                            <input type="text" class="form-control bg-light border-0 item-total-price" placeholder="00" readonly />
                                        </div>
                                    </td>
                                    <td class="item-removal">
                                        <div class="d-flex justify-content-end">
                                            <button class="btn btn-danger">Delete</button>
                                        </div>
                                    </td>
                                </tr> --}}
                            </tbody>
                            <tbody>
                                <tr>
                                    <td colspan="6">
                                        <a data-bs-toggle="modal" data-bs-target="#addItems" class="btn btn-soft-secondary fw-medium"><i class="ri-add-fill me-1 align-bottom"></i> Add Item</a>
                                    </td>
                                </tr>
                                <tr class="border-top border-top-dashed mt-2">
                                    <td colspan="3"></td>
                                    <td colspan="4" class="p-0">
                                        <table class="table table-borderless table-sm table-nowrap align-middle mb-0">
                                            <tbody>
                                                <tr>
                                                    <th scope="row">Sub Total (৳)</th>
                                                    <td style="width:150px;">
                                                        <input type="text" class="form-control bg-light border-0" id="cart-subtotal" name="cart_subtotal" placeholder="00" readonly />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Discount <small class="text-muted">(FIXED)</small> (৳)</th>
                                                    <td>
                                                        <input type="text" class="form-control" id="cart-discount" placeholder="00" name="cart_discount" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Total Amount (৳)</th>
                                                    <td>
                                                        <input type="text" class="form-control bg-light border-0" id="cart-total" name="cart_total" placeholder="00" readonly />
                                                    </td>
                                                </tr>
                                                <tr class="border-top border-top-dashed">
                                                    <th scope="row">Paid Amount (৳)</th>
                                                    <td>
                                                        <input type="text" class="form-control" id="cart-paid" placeholder="00" name="cart_paid" required/>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Due Amount(৳)</th>
                                                    <td>
                                                        <input type="text" class="form-control" id="cart-due" placeholder="00" name="cart_due" readonly/>
                                                    </td>
                                                </tr>


                                                <tr class="border-top border-top-dashed {{ $costVisible }}">
                                                    <th scope="row">Total Cost (৳)</th>
                                                    <td>
                                                        <input type="text" class="form-control" id="cart-cost" placeholder="00" name="cart_cost" readonly/>
                                                    </td>
                                                </tr>
                                                <tr class="{{ $costVisible }}">
                                                    <th scope="row">Total Profit(৳)</th>
                                                    <td>
                                                        <input type="text" class="form-control" id="total-profit" placeholder="00" readonly/>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <!--end table-->
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <!--end table-->
                    </div>
                    
                    <div class="hstack gap-2 justify-content-end d-print-none mt-4">
                        <button type="submit" class="btn btn-success"><i class="ri-printer-line align-bottom me-1"></i> Save & Print</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!--end col-->
</div>
<!--end row-->


<!-- Modal -->
<div class="modal fade" id="addItems" tabindex="-1" aria-labelledby="addItemsLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addItemsLabel">Select Item Type</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="text" style="background: #F3F6F9; border: 1px solid #F3F6F9; color: #999; cursor: pointer;" class="form-control mb-3" style="cursor: pointer" id="select-item-any" value="Empty Item" readonly>

                <select class="selectpicker invoice-equipment-selector  mb-3" data-live-search="true" id="select-item-product">
                    <option value="">Select a product</option>
                    @foreach ($equipmentProducts as $item)
                        <option value="{{ $item->id }}" data-type="product" data-name="{{ $item->name }}" data-price="{{ $item->price }}" data-cost="{{ $item->cost }}">{{ $item->name }}</option>
                    @endforeach
                </select>

                <select class="selectpicker invoice-equipment-selector  mb-3" data-live-search="true" id="select-item-service">
                    <option value="">Select a service</option>
                    @foreach ($equipmentServices as $item)
                        <option value="{{ $item->id }}" data-type="service" data-name="{{ $item->name }}" data-price="{{ $item->price }}" data-cost="{{ $item->cost }}">{{ $item->name }}</option>
                    @endforeach
                </select>

                {{-- <select class="selectpicker invoice-equipment-selector  mb-3" data-live-search="true" id="select-item-category">
                    <option value="">Select a category</option>
                    @foreach ($equipmentCategorys as $item)
                        <option value="{{ $item->id }}" data-type="category" data-name="{{ $item->name }}" data-price="{{ $item->price }}" data-cost="{{ $item->cost }}">{{ $item->name }}</option>
                    @endforeach
                </select> --}}

                <select class="selectpicker invoice-equipment-selector  mb-3" data-live-search="true" id="select-item-surgery">
                    <option value="">Select a surgery</option>
                    @foreach ($equipmentSurgerys as $item)
                        <option value="{{ $item->id }}" data-type="surgery" data-name="{{ $item->name }}" data-price="{{ $item->price }}" data-cost="{{ $item->cost }}">{{ $item->name }}</option>
                    @endforeach
                </select>
                
                <select class="selectpicker invoice-equipment-selector  mb-3" data-live-search="true" id="select-item-vaccine">
                    <option value="">Select a Vaccine</option>
                    @foreach ($equipmentVaccine as $item)
                        <option value="{{ $item->id }}" data-type="vaccine" data-name="{{ $item->name }}" data-price="{{ $item->price }}" data-cost="{{ $item->cost }}">{{ $item->name }}</option>
                    @endforeach
                </select>

                <select class="selectpicker invoice-equipment-selector" data-live-search="true" id="select-item-test">
                    <option value="">Select a test</option>
                    @foreach ($equipmentTests as $item)
                        <option value="{{ $item->id }}" data-type="test" data-name="{{ $item->name }}" data-price="{{ $item->price }}" data-cost="{{ $item->cost }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
</div>


@endsection

@push('js')
    <script>
        // Add Newe Item  
        $("#select-item-any").click(function(){
            addNewItemFileds("", "", "", "", "", false);
            $("#addItems .btn-close").click();
        });
        $(".invoice-equipment-selector").change(function(){
            const selectedOption = $(this).find('option:selected');
            let id = selectedOption.val();
            let name = selectedOption.data('name');
            let price = selectedOption.data('price');
            let cost = selectedOption.data('cost');
            let type = selectedOption.data('type');
            if(name == ""){
                return;
            }

            addNewItemFileds(id, name, price, cost, type, true);
            $("#addItems .btn-close").click();
        });

        const addNewItemFileds = (id, name, price, cost, type, disabled) => {
            let length = $("#newlink").children().length + 1;
            
            $("#newlink").append(`
            <tr>
                <th scope="row">
                    <span class="item-serial">${length}</span>
                    <input type="hidden" name="item_id[]" value="0"/>
                    <input type="hidden" name="item_db_id[]" value="${id}"/>
                    <input type="hidden" name="item_type[]" value="${type}"/>
                </th>
                <td class="text-start">
                    <div class="mb-2">
                        <input type="text" name="item_details[]" class="form-control item-details" placeholder="Item Details" value="${name}" required />
                    </div>
                </td>
                <td>
                    <input type="number" name="item_price[]" class="form-control item-price"  placeholder="00" value="${price}" ${disabled} required />
                </td>
                <td>
                    <div class="input-step">
                        <button type="button" class='minus'>–</button>
                        <input type="number" name="item_quantity[]" class="item-quantity" value="1" readonly>
                        <button type="button" class='plus'>+</button>
                    </div>
                </td>
                <td class="text-end">
                    <div>
                        <input type="text" name="item_discount[]" class="form-control item-discount" placeholder="00" />
                    </div>
                </td>
                <td class="text-end">
                    <div>
                        <input type="text" name="item_total_amount[]" value="${price}" class="form-control bg-light border-0 item-total-price" placeholder="00" readonly />
                    </div>
                </td>
                <td class="text-end">
                    <div>
                        <input type="text" name="item_total_cost[]" value="${cost}" class="form-control bg-light border-0 item-total-cost" placeholder="00" readonly />
                        <input type="hidden" value="${cost}" class="form-control bg-light border-0 item-cost" placeholder="00" readonly />
                    </div>
                </td>
                <td class="item-removal">
                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-danger">Delete</button>
                    </div>
                </td>
            </tr>
            `);

            $("#addItems select option").prop("selected", false);

            GrandBalance();
        }
        /*
        ==============
        Amount Calc 
        ==============
        */
        //items 
        $(document).on("input", "#newlink .item-price, #newlink .item-quantity, #newlink .item-discount", function(){
            let price = Number($(this).closest('tr').find('.item-price').val());
            let cost = Number($(this).closest('tr').find('.item-cost').val());
            let quantity = Number($(this).closest('tr').find('.item-quantity').val());
            let discount = Number($(this).closest('tr').find('.item-discount').val());
            
            let amount = (price*quantity)-discount;
            let total_cost = (cost*quantity);
            $(this).closest('tr').find('.item-total-price').val(amount);
            $(this).closest('tr').find('.item-total-cost').val(total_cost);
            GrandBalance();
        });

        // quatity 
        $(document).on("click", "#newlink .input-step .plus", function(){
            let quantity = Number($(this).closest('tr').find('.item-quantity').val());
            $(this).closest('tr').find('.item-quantity').val(quantity + 1).trigger('input');
        });
        $(document).on("click", "#newlink .input-step .minus", function(){
            let quantity = Number($(this).closest('tr').find('.item-quantity').val());
            if(quantity > 1){
                $(this).closest('tr').find('.item-quantity').val(quantity - 1).trigger('input');
            }
        });


        // remove 
        $(document).on("click", "#newlink .item-removal", function(){
            let quantity = $(this).closest('tr').remove();
            GrandBalance();

            // fix the sr number 
            $("#newlink tr .item-serial").each(function(index) {
                $(this).text(index + 1);
            });
        });

        // cart discount 
        $(document).on("input", "#cart-discount, #cart-paid", function(){
            GrandBalance();
        });
        const GrandBalance = () => {
            let amount = 0;
            $("#newlink tr .item-total-price").each(function() {
                amount += parseFloat($(this).val()) || 0;
            });
            $("#cart-subtotal").val(amount);
            let discount = Number($("#cart-discount").val());
            $("#cart-total").val(amount - discount);

            let totalAmount = $("#cart-total").val();
            let paid = $("#cart-paid").val();
            $("#cart-due").val(totalAmount - paid);

            // total cost
            let total_cost = 0;
            $("#newlink tr .item-total-cost").each(function() {
                total_cost += parseFloat($(this).val()) || 0;
            });
            $("#cart-cost").val(total_cost);
            $("#total-profit").val(totalAmount - total_cost);
        }

        // select a pets 
        $("#all_pets").change(function() {
            const selectedOption = $(this).find('option:selected');
            const id = selectedOption.data('id');

            if (id == "") {
                return;
            }
            $.ajax({
                method: "POST",
                url: "/admin/prescription/pet-info",
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                data: {
                    id
                },
                success: function(data) {
                    $("#patient_name").val(data.pet.name != null ? data.pet.name : "");
                    $("#parents_name").val(data.user.name != null ? data.user.name : "");
                    $("#user_number").val(data.user.number != null ? data.user.number : "");
                    $("#address").val(data.user.address != null ? data.user.address : "");
                }
            });
        });
    </script>
@endpush