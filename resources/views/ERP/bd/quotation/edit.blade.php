@extends('layouts.app')

@section('title', 'Edit Order')

@section('content')
    <div class="container mt-0">
        <div class="card">
            <div class="card-header">
                <h4>Quotation edit</h4>
                <div class="text-end">
                    <a href="{{ route('ERP.bd.quotation.index') }}" class="btn btn-primary">Back to List</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('ERP.bd.quotation.update', ['id' => $quotation->id]) }}" method="POST">
                    @csrf
                    @method('PUT')


                    <h3 class="mb-3">Customer Details</h3>
                    <div class="row">

                        <!-- Customer Details -->
                        <div class="row my-3">
                            <div class="col-md-3">
                                <label for="customer_id" class="form-label">Customer Name</label>
                                <select name="customer_id" id="customer_id" class="form-control">
                                    <option value="">Select Customer</option>
                                    @foreach ($customers as $customer)
                                        <option value="{{ $customer->id }}" data-pic-name="{{ $customer->pic_name }}"
                                            data-address="{{ $customer->address }}" data-attn="{{ $customer->pic_name }}"
                                            data-department="{{ $customer->pic_department }}"
                                            {{ $quotation->customer_id == $customer->id ? 'selected' : '' }}>
                                            {{ $customer->name }}
                                        </option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="col-md-3">
                                <div class="form-group pt-2">
                                    <label for="customer_address">Customer Address</label>
                                    <input type="text" id="customer_address" name="customer_address"
                                        value="{{ $quotation->customer->address }}" class="form-control" readonly>
                                </div>
                            </div>


                            <div class="col-md-3">
                                <div class="form-group pt-2">
                                    <label for="attn">Attn</label>
                                    <input type="text" id="attn" name="attn"
                                        value="{{ $quotation->customer->pic_name }}" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group pt-2">
                                    <label for="department">Department</label>
                                    <input type="text" id="department" name="department"
                                        value="{{ $quotation->customer->pic_department }}" class="form-control" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="row my-2">
                            <div class="col-md-3">
                                <div class="form-group pt-2">
                                    <label for="cc">CC</label>
                                    <input type="text" id="cc" name="cc" value="{{ $quotation->cc }}"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group pt-2">
                                    <label for="cc">Department</label>
                                    <input type="text" id="Department" name="outer_department"
                                        value="{{ $quotation->department }}" class="form-control">
                                </div>
                            </div>
                        </div>

                    </div>

                    <h3 class="mt-4 mb-2">Quotation Details</h3>
                    <div class="row py-4">
                        <div class="col-md-4">
                            <label for="ref_no" class="form-label">Ref No</label>
                            <input type="text" readonly name="ref_no" id="ref_no" class="form-control"
                                value="{{ $rowCount }}">
                        </div>
                        <div class="col-md-4">
                            <label for="created_by" class="form-label">Created By</label>
                            <input type="text" name="created_by" id="created_by" class="form-control"
                                value="{{ auth()->user()?->name }}" readonly>

                        </div>

                        <div class="col-md-4 mt-2">
                            <label for="created_date" class="form-label">Created Date</label>
                            <input type="date" name="created_date" id="created_date" class="form-control"
                                value="{{ now()->format('Y-m-d') }}" readonly>
                        </div>
                    </div>


                    <h3 class="mb-3 mt-3"> Product Detail </h3>
                    <div class="row  mb-3 text-end">
                        <div class="col-md">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                                Product
                            </button>
                        </div>
                    </div>

                    <!-- The Modal -->
                    <div class="modal fade" id="myModal">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>

                                <!-- Modal Body -->
                                <div class="modal-body">
                                    <!-- Product Table -->
                                    <table id="myTable" class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th><input type="checkbox" class="form-check-input" name="main"
                                                        id="main"></th>
                                                <!-- Move the Select All checkbox here -->
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
                                            @foreach ($products as $product)
                                                <tr>
                                                    <td><input type="checkbox" value="{{ $product->id }}"
                                                            class="form-check-input bodycheck" name="bodycheck"
                                                            id="bodycheck"></td>
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
                    <!-- Main Table for Editing -->
                    <table id="outerTable" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Part No</th>
                                <th>Part Name</th>
                                <th>Remarks</th>
                                <th>Price (RM)</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="addedProductsBody">
                            <!-- Dynamically added rows go here -->
                            @foreach ($quotation->qoutation_detail as $detail)
                                <tr data-product-id="{{ $detail->product_id }}">
                                    <td>{{ $detail->products->part_no }}<input
                                            name="products[{{ $detail->product_id }}][product_id]" type="hidden"
                                            value="{{ $detail->product_id }}" /></td>
                                    <td>{{ $detail->products->part_name }}</td>
                                    <td><input class="form-control" type="text"
                                            name="products[{{ $detail->product_id }}][remarks]"
                                            value="{{ $detail->remarks }}" /></td>
                                    <td><input class="form-control" type="number"
                                            name="products[{{ $detail->product_id }}][price_rm]"
                                            value="{{ $detail->price_rm }}" /></td>
                                    <td><button type="button" class="btn btn-danger remove-row">Remove</button></td>
                                </tr>
                                @endforeach
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-lg-12 col-sm-12 col-12">
                            <div class="mb-3">
                                <label for="term" class="form-label">TERM AND CONDITION</label>
                                <textarea placeholder="Enter Here" value="{{ $quotation->term }}" id="term" rows="4"
                                    class="form-control" name="term"></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Save Button -->
                    <div class="text-end mt-3">
                        <button type="submit" class="btn btn-secondary">update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            const $customerSelect = $('#customer_id');
            const $customerAddress = $('#customer_address');
            const $attn = $('#attn');
            const $department = $('#department');

            // Customer selection event
            $customerSelect.on('change', function() {
                const $selectedOption = $(this).find(':selected');

                if ($selectedOption.val()) {
                    $customerAddress.val($selectedOption.data('address') || '');
                    $attn.val($selectedOption.data('attn') || '');
                    $department.val($selectedOption.data('department') || '');
                } else {
                    $customerAddress.val('');
                    $attn.val('');
                    $department.val('');
                }
            });

            // Main checkbox for selecting all products
            $('#main').on('click', function() {
                const isChecked = $(this).prop('checked');
                $('.bodycheck').prop('checked', isChecked);
            });

            // Body checkbox to update main checkbox
            $('.bodycheck').on('click', function() {
                const allChecked = $('.bodycheck').length === $('.bodycheck:checked').length;
                $('#main').prop('checked', allChecked);
            });

            // Add button in modal
            $('#addProducts').on('click', function() {
                const mainTableBody = $('#outerTable tbody');

                $('#myModal .table tbody tr').each(function() {
                    const $checkbox = $(this).find('input[type="checkbox"]');

                    if ($checkbox.is(':checked')) {
                        const productId = $checkbox.val();
                        const productPartNo = $(this).find('td:eq(1)').text();
                        const productPartName = $(this).find('td:eq(2)').text();

                        mainTableBody.append(`
                    <tr data-product-id="${productId}">
                        <td>${productPartNo}<input name="products[${productId}][product_id]" type="hidden" value="${productId}" /></td>
                        <td>${productPartName}</td>
                        <td><input class="form-control" type="number" name="products[${productId}][remarks]" /></td>
                        <td><input class="form-control" type="number" name="products[${productId}][price_rm]" /></td>
                        <td><button type="button" class="btn btn-danger remove-row">Remove</button></td>
                    </tr>
                `);

                        $(this).remove();
                    }
                });

                $('#main').prop('checked', false);
                $('#myModal').modal('hide');
            });

            // Remove row from the outer table and return to modal
            $(document).on('click', '.remove-row', function() {
                const $row = $(this).closest('tr');
                const productPartNo = $row.find('td:eq(0)').text();
                const productPartName = $row.find('td:eq(1)').text();
                const productId = $row.data('product-id');

                $('#myModal .table tbody').append(`
            <tr>
                <td><input class="form-check-input bodycheck" type="checkbox" value="${productId}" /></td>
                <td>${productPartNo}</td>
                <td>${productPartName}</td>
            </tr>
        `);

                $row.remove();
            });
            
        });
        // In your Javascript (external .js resource or <script> tag)
        $(document).ready(function() {
            $('#customer_id').select2();

        });
        $(document).ready(function() {
            $('#outerTable').DataTable({
                responsive: true
            });
        });
        $(document).ready(function() {
            $('#myTable').DataTable({
                responsive: true
            });
        });
    </script>
@endpush
