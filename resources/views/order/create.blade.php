@extends('layouts.app')

@section('title', 'Create Order')

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
                <form action="{{ route('order.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
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
                            <input type="text" name="order_no" id="order_no" class="form-control" placeholder="Enter Order No">
                        </div>
                        <!-- PO No -->
                        <div class="col-md-3">
                            <label for="po_no" class="form-label">PO No</label>
                            <input type="text" name="po_no" id="po_no" class="form-control" placeholder="Enter PO No">
                        </div>
                        <!-- Order Month -->
                        <div class="col-md-3">
                            <label for="order_month" class="form-label">Order Month</label>
                            <input type="month" name="order_month" id="order_month" class="form-control">
                        </div>
                    </div>

                    <!-- Status Section -->
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <label for="status" class="form-label">Status</label>
                            <select name="status" id="status" class="form-control">
                                <option value="">select status</option>
                                <option value="in-progress">In progress</option>
                                <option value="completed">Completed</option>
                            </select>
                        </div>
                        <!-- Attachment -->
                        <div class="col-md-3">
                            <label for="attachment" class="form-label">Attachment</label>
                            <input type="file" name="attachment" id="attachment" class="form-control">
                        </div>
                    </div>

                    <!-- Customer Details Section -->
                    <h3 class="mb-3 mt-3">Customer Details</h3>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="customer_id" class="form-label">Customer Name</label>
                            <select name="customer_id" id="customer_id" class="form-control">
                                <option value="">Select Customer</option>
                                @foreach($customers as $customer)
                                    <option value="{{ $customer->id }}" 
                                        data-pic-name="{{ $customer->pic_name }}" 
                                        data-pic-email="{{ $customer->pic_email }}" 
                                        data-pic-phone="{{ $customer->pic_phone_work }}">
                                        {{ $customer->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label for="pic_name" class="form-label">PIC Name</label>
                            <input type="text" id="pic_name" name="pic_name" class="form-control" readonly>
                        </div>
                        <div class="col-md-3">
                            <label for="pic_email" class="form-label">PIC Email</label>
                            <input type="email" id="pic_email" name="pic_email" class="form-control" readonly>
                        </div>
                        <div class="col-md-3">
                            <label for="pic_phone" class="form-label">PIC Phone No</label>
                            <input type="tel" id="pic_phone" name="pic_phone" class="form-control" readonly>
                        </div>
                    </div>

                    <!-- Product Selection -->
                    <h3 class="mb-3 mt-3">Product Detail</h3>
                    <div class="row mb-3 text-end">
                        <div class="col-md">
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#myModal">
                                Product
                            </button>
                        </div>
                    </div>

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
                                            @endforeach
                                        </tbody>
                                    </table>

                                    <!-- Add Button -->
                                    <div class="text-end mt-3">
                                        <button type="button" class="btn btn-dark" id="addProducts">Add</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Added Products Table -->
                    <h3 class="mb-3 mt-3">Added Products</h3>
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
                        <tbody id="addedProductsBody">
                            <!-- Added products will go here -->
                        </tbody>
                    </table>

                    <!-- Hidden Input for Added Products -->
                    <input type="hidden" name="added_products" id="added_products_data">
                    </div>
                    <!-- Save Button -->
                    <div class="text-end mt-3">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            
        </div>
    </div>
    </div>

@endsection

@push('scripts')
<script>
$(document).ready(function () {
    // Initialize DataTables
    const modalTable = $('#myTable').DataTable();
    const addedProductsTable = $('#outerTable').DataTable();

    // Populate customer data on selection
    $('#customer_id').on('change', function () {
        const selectedOption = $(this).find('option:selected');
        $('#pic_name').val(selectedOption.data('pic-name') || '');
        $('#pic_email').val(selectedOption.data('pic-email') || '');
        $('#pic_phone').val(selectedOption.data('pic-phone') || '');
    });

    // Select/Deselect all checkboxes in the modal
    $('#main').on('click', function () {
        const isChecked = $(this).prop('checked');
        $('.bodycheck').prop('checked', isChecked);
    });

    $('.bodycheck').on('click', function () {
        const allChecked = $('.bodycheck').length === $('.bodycheck:checked').length;
        $('#main').prop('checked', allChecked);
    });

    // Add selected products from modal to the main table
    $('#addProducts').on('click', function () {
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

                // Add to main DataTable
                addedProductsTable.row.add([
                    `${productPartNo}<input name="products[${checkbox.val()}][product_id]" type="hidden" value="${checkbox.val()}"/>`,
                    productPartName,
                    productUnitName,
                    productModel,
                    productVariance,
                    productTypeOfProduct,
                    productCategory,
                    `<input class="form-control" type="number" name="products[${checkbox.val()}][price_unit]">`,
                    `<input class="form-control" type="number" name="products[${checkbox.val()}][sst_percent]">`,
                    `<input class="form-control" type="number" name="products[${checkbox.val()}][sst_value]">`,
                    `<input class="form-control" type="number" name="products[${checkbox.val()}][firm_qty]">`,
                    `<input class="form-control" type="number" name="products[${checkbox.val()}][forecast_qty_1]">`,
                    `<input class="form-control" type="number" name="products[${checkbox.val()}][forecast_qty_2]">`,
                    `<input class="form-control" type="number" name="products[${checkbox.val()}][forecast_qty_3]">`,
                    `<button type='button' class="btn btn-danger remove-row"><i class="fas fa-trash-alt"></i></button>`
                ]).draw();

                // Remove row from modal DataTable
                modalTable.row($(this)).remove().draw();
            }
        });

        // Uncheck the main checkbox and close the modal
        $('#main').prop('checked', false);
        $('#myModal').modal('hide');
    });

    // Remove product from the main table and add it back to the modal
    $(document).on('click', '.remove-row', function () {
        const row = $(this).closest('tr');
        const rowData = addedProductsTable.row(row).data();

        // Add back to modal DataTable
        modalTable.row.add([
            `<input class="form-check-input bodycheck" type="checkbox">`,
            rowData[0].split('<input')[0], // Product Part No
            rowData[1], // Product Part Name
            rowData[2], // Unit Name
            rowData[3], // Model
            rowData[4], // Variance
            rowData[5], // Type of Product
            rowData[6]  // Category
        ]).draw();

        // Remove from main DataTable
        addedProductsTable.row(row).remove().draw();
    });

    // Initialize Select2
    $('#customer_id').select2();
    $('#status').select2();
});
</script>

@endpush
