@extends('layouts.app')

@section('title', 'Show Order')

@section('content')
    <div class="container mt-2">
        <div class="card">
            <div class="card-header">
                <h4>Create Order</h4>
                <div class="text-end">
                    <a href="{{ route('order.index') }}" class="btn btn-primary">Back to List</a>
                </div>
            </div>
            <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <label for="created_by" class="form-label">Created By</label>
                            <input type="text" name="created_by" id="created_by" class="form-control" 
                                value="{{ auth()->user()?->name }}" readonly>
                        </div>
                    </div>

                    <!-- General Information Section -->
                    <h3 class="mb-3 mt-3">General Information</h3>
                    <div class="row mb-3">
                        <!-- Created Date -->
                        <div class="col-md-3">
                            <label for="created_date" class="form-label">Created Date</label>
                            <input type="date" name="created_date" id="created_date" class="form-control" 
                                value="{{ now()->format('Y-m-d') }}" readonly>
                        </div>
                        <!-- Order No -->
                        <div class="col-md-3">
                            <label for="order_no" class="form-label">Order No</label>
                            <input type="text" name="order_no" id="order_no" class="form-control" placeholder="Enter Order No" value="{{$order->order_no}}" readonly>
                        </div>
                        <!-- PO No -->
                        <div class="col-md-3">
                            <label for="po_no" class="form-label">PO No</label>
                            <input type="text" name="po_no" id="po_no" value="{{$order->po_no}}" class="form-control" placeholder="Enter PO No" readonly>
                        </div>
                        <!-- Order Month -->
                        <div class="col-md-3">
                            <label for="order_month" class="form-label">Order Month</label>
                            <input type="month" name="order_month" value="{{$order->order_month}}" id="order_month" class="form-control" readonly>
                        </div>
                    </div>

                    <!-- Status Section -->
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <label for="status" class="form-label">Status</label>
                            <select name="status" id="status" class="form-control" disabled>
                            <option value="">Select status</option>
                            <option value="in-progress" {{ $order->status == 'in-progress' ? 'selected' : '' }}>In progress</option>
                            <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Completed</option>
                            </select>
                        </div>
                        <!-- Attachment -->
                        <div class="col-md-3">
                            <label for="attachment" class="form-label">Attachment</label>
                            <input type="file" name="attachment"  id="attachment" class="form-control" readonly>
                        </div>
                    </div>

                    <!-- Customer Details Section -->
                    <h3 class="mb-3 mt-3">Customer Details</h3>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="customer_id" class="form-label">Customer Name</label>
                            <select name="customer_id" id="customer_id" class="form-control" disabled>
                                <option value="">Select Customer</option>
                                @foreach($customers as $customer)
                                    <option value="{{ $customer->id }}" 
                                        data-pic-name="{{ $customer->pic_name }}" 
                                        data-pic-email="{{ $customer->pic_email }}" 
                                        data-pic-phone="{{ $customer->pic_phone_work }}"
                                        {{$order->customer_id == $customer->id ? 'selected' : ''}}>
                                        {{ $customer->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label for="pic_name" class="form-label">PIC Name</label>
                            <input type="text" id="pic_name" value="{{$order->customer->pic_name}}" name="pic_name" class="form-control" readonly>
                        </div>
                        <div class="col-md-3">
                            <label for="pic_email" class="form-label">PIC Email</label>
                            <input type="email" id="pic_email" value="{{$order->customer->pic_email}}" name="pic_email" class="form-control" readonly>
                        </div>
                        <div class="col-md-3">
                            <label for="pic_phone" class="form-label">PIC Phone No</label>
                            <input type="tel" id="pic_phone" value="{{$order->customer->pic_phone_work}}" name="pic_phone" class="form-control" readonly>
                        </div>
                    </div>

                    <!-- Product Selection -->
                    <h3 class="mb-3 mt-3">Product Detail</h3>
                    <!-- <div class="row mb-3 text-end">
                        <div class="col-md">
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#myModal">
                                Product
                            </button>
                        </div>
                    </div> -->

                    <!-- Modal for Product Selection -->
                    <div class="modal fade" id="myModal">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>

                                <!-- Modal Body with Product Table -->
                                <div class="modal-body">
                                    <table id="myTable" class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th><input type="checkbox" class="form-check-input" name="main" id="main"></th>
                                                <th>Part No</th>
                                                <th>Part Name</th>
                                                <th>Unit</th>
                                                <th>Model</th>
                                                <th>Variance</th>
                                                <th>Type of Product</th>
                                                <th>Category</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($products as $product)
                                            @if(!in_array($product->id, $order->order_product->pluck('product_id')->toArray()))
                                                <tr>
                                                    <td><input type="checkbox" value="{{$product->id}}"
                                                    class="form-check-input bodycheck" name="bodycheck" id="bodycheck"></td>
                                                    <td>{{ $product->part_no }}</td>
                                                    <td>{{ $product->part_name }}</td>
                                                    <td>{{ $product->unit->name }}</td>
                                                    <td>{{ $product->model }}</td>
                                                    <td>{{ $product->variance }}</td>
                                                    <td>{{ $product->typeOfProduct->name }}</td>
                                                    <td>{{ $product->category->name }}</td>
                                                </tr>
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>

                                    <!-- Add Button -->
                                    
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Added Products Table -->
                    <!-- <h3 class="mb-3 mt-3">Added Products</h3> -->
                    <div class="table-responsive">
                    <table id="outerTable" class="table table-responsive table-bordered">
                        <thead>
                            <tr>
                                <th>Part No</th>
                                <th>Part Name</th>
                                <th>Unit</th>
                                <th>Model</th>
                                <th>Variance</th>
                                <th>Type of Product</th>
                                <th>Category</th>
                                <th>Price (Unit)</th>
                                <th>SST %</th>
                                <th>SST Value</th>
                                <th>Firm 1 Month Qty</th>
                                <th>N+1 Forecast Month Qty</th>
                                <th>N+2 Forecast Month Qty</th>
                                <th>N+3 Forecast Month Qty</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="outerTablebody">
                                 @foreach ($order->order_product as $detail)
                                    <tr data-index="{{$loop->iteration}}">
                                        <td>{{$detail->product->part_no ?? ''}}<input
                                                name="products[{{$detail->product->id ?? ''}}][product_id]" type="hidden"
                                                value="{{$detail->product->id ?? ''}}" readonly /></td>
                                        <td>{{$detail->product->part_name ?? ''}}</td>
                                        <td>{{$detail->product->unit->name ?? ''}}</td>
                                        <td>{{$detail->product->model ?? ''}}</td>
                                        <td>{{$detail->product->variance ?? ''}}</td>
                                        <td>{{$detail->product->typeOfProduct->name ?? ''}}</td>
                                        <td>{{$detail->product->category->name ?? ''}}</td>
                                        <td><input class="form-control" type="number" value="{{$detail->price_unit ?? 1}}"
                                                name="products[{{$detail->product->id ?? ''}}][price_unit]" readonly></td>
                                        <td><input class="form-control" type="number" value="{{$detail->sst_percent ?? 1}}"
                                                name="products[{{$detail->product->id ?? ''}}][sst_percent]" readonly></td>
                                        <td><input class="form-control" type="number" value="{{$detail->sst_value ?? 1}}"
                                                name="products[{{$detail->product->id ?? ''}}][sst_value]"readonly></td>
                                        <td><input class="form-control" type="number" value="{{$detail->firm_qty ?? 1}}"
                                                name="products[{{$detail->product->id ?? ''}}][firm_qty]"readonly></td>
                                        <td><input class="form-control" type="number" value="{{$detail->forecast_qty_1 ?? 1}}"
                                                name="products[{{$detail->product->id ?? ''}}][forecast_qty_1]"readonly></td>
                                        <td><input class="form-control" type="number" value="{{$detail->forecast_qty_2 ?? 1}}"
                                                name="products[{{$detail->product->id ?? ''}}][forecast_qty_2]"readonly></td>
                                        <td><input class="form-control" type="number" value="{{$detail->forecast_qty_3 ?? 1}}"
                                                name="products[{{$detail->product->id ?? ''}}][forecast_qty_3]"readonly></td>
                                        <td class="text-start"><button class="btn btn-danger ">Remove</button></td>
                                    </tr>
                                @endforeach
                        </tbody>
                    </table>

                    <input type="hidden" name="added_products" id="added_products_data">
                    </div>    
        </div>
    </div>
    </div>

@endsection

@push('scripts')
<script>
$(document).ready(function () {
    const modalTable = $('#myTable').DataTable();
    const addedProductsTable = $('#outerTable').DataTable();
    // Customer data population based on selection
    $('#customer_id').on('change', function () {
        const selectedOption = $(this).find('option:selected');
        if (selectedOption.val()) {
            $('#pic_name').val(selectedOption.data('pic-name') || '');
            $('#pic_email').val(selectedOption.data('pic-email') || '');
            $('#pic_phone').val(selectedOption.data('pic-phone') || '');
        } else {
            $('#pic_name').val('');
            $('#pic_email').val('');
            $('#pic_phone').val('');
        }
    });

    // Select/Deselect all checkboxes
    $('#main').on('click', function () {
        const mainChecked = $(this).prop('checked');
        $('.bodycheck').prop('checked', mainChecked);
    });

    $('.bodycheck').on('click', function () {
        const allChecked = $('.bodycheck').length === $('.bodycheck:checked').length;
        $('#main').prop('checked', allChecked);
    });

    // Add products to the outer table
    $('#addProducts').on('click', function () {
        const mainTableBody = $('#outerTable tbody');

        $('#myModal .table tbody tr').each(function () {
            const checkbox = $(this).find('input[type="checkbox"]');

            if (checkbox.is(':checked')) {
                const productPartNo = $(this).find('td:eq(1)').text();
                const productPartName = $(this).find('td:eq(2)').text();
                const productUnitName = $(this).find('td:eq(3)').text();
                const productModel = $(this).find('td:eq(4)').text();
                const productVariance = $(this).find('td:eq(5)').text();
                const productTypeOfProduct = $(this).find('td:eq(6)').text();
                const productCategory = $(this).find('td:eq(7)').text();

             
                mainTableBody.append(`
                    <tr>
                        <td>${productPartNo}<input name="products[${checkbox.val()}][product_id]" type="hidden" value="${checkbox.val()}"/></td>
                        <td>${productPartName}</td>
                        <td>${productUnitName}</td>
                        <td>${productModel}</td>
                        <td>${productVariance}</td>
                        <td>${productTypeOfProduct}</td>
                        <td>${productCategory}</td>
                        <td><input class="form-control" type="number" name="products[${checkbox.val()}][price_unit]"></td>
                        <td><input class="form-control" type="number" name="products[${checkbox.val()}][sst_percent]"></td>
                        <td><input class="form-control" type="number" name="products[${checkbox.val()}][sst_value]"></td>
                        <td><input class="form-control" type="number" name="products[${checkbox.val()}][firm_qty]"></td>
                        <td><input class="form-control" type="number" name="products[${checkbox.val()}][forecast_qty_1]"></td>
                        <td><input class="form-control" type="number" name="products[${checkbox.val()}][forecast_qty_2]"></td>
                        <td><input class="form-control" type="number" name="products[${checkbox.val()}][forecast_qty_3]"></td>
                        <td class='text-start'><button type='button' class="btn btn-danger remove-row">/button></td>
                    </tr>
                `);

                $(this).remove();
            }
        });

        // Uncheck the main checkbox
        $('#main').prop('checked', false);

        // Close the modal
        $('#myModal').modal('hide');
    });

    // Remove a product from the outer table and add it back to the modal
    $(document).on('click', '.remove-row', function () {
        const row = $(this).closest('tr');

        const productPartNo = row.find('td:eq(0)').text();
        const productPartName = row.find('td:eq(1)').text();
        const productUnitName = row.find('td:eq(2)').text();
        const productModel = row.find('td:eq(3)').text();
        const productVariance = row.find('td:eq(4)').text();
        const productTypeOfProduct = row.find('td:eq(5)').text();
        const productCategory = row.find('td:eq(6)').text();

        // Append back to the modal table
        $('#myModal .table tbody').append(`
            <tr>
                <td><input class="form-check-input bodycheck" type="checkbox"></td>
                <td>${productPartNo}</td>
                <td>${productPartName}</td>
                <td>${productUnitName}</td>
                <td>${productModel}</td>
                <td>${productVariance}</td>
                <td>${productTypeOfProduct}</td>
                <td>${productCategory}</td>
            </tr>
        `);

        // Remove the row from the main table
        row.remove();
    });
    $(document).ready(function() {
    $('#customer_id').select2();
    $('#status').select2();
});
});


</script>
@endpush
