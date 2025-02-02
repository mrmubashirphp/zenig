@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">
        <h4>Bom Create</h4>
    </div>

    <form action="{{route('engineering.bom.store')}}" method="post">
        @csrf
        <div class="card-body">
            <div class="row my-3">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="product_id">Product:</label>
                        <select class="form-select product_id" name="product_id" id="product_id">
                            <option value="" selected disabled>Select any One</option>
                            @foreach ($products as $product)
                                <option value="{{$product->id}}" data-part_name='{{$product->part_name}}'
                                    data-model='{{$product->model}}' data-variance='{{$product->variance}}'
                                    data-type_of_product='{{$product->typeOfProduct->name}}'>
                                    {{$product->part_no}}
                                </option>
                            @endforeach
                        </select>
                        @error('product_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="part_name">Part Name:</label>
                        <input type="text" class="form-control" name="part_name" id="part_name">
                    </div>
                </div>
            </div>
            <div class="row my-3">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="type_of_product">Type Of Product:</label>
                        <input type="text" class="form-control" name="type_of_product" id="type_of_product">

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="created_by">Create By:</label>
                        <input type="text" class="form-control" name="created_by" value="{{Auth::user()->name }}"
                            id="created_by">
                        @error('created_by')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row my-3">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="model">Model:</label>
                        <input type="text" name="model" class="form-control" id="model">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="customer">Customer:</label>
                        <input type="text" class="form-control" name="customer" value="{{ old('customer') }}"
                            id="customer">
                        @error('customer')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row my-3">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="variance">Variance:</label>
                        <input type="variance" name="variance" class="form-control" id="variance">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="kanban_no">Kanban No:</label>
                        <input type="text" class="form-control" name="kanban_no" value="{{ old('kanban_no') }}"
                            id="kanban_no">
                        @error('kanban_no')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row my-3">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="part_weight">Part Weight:</label>
                        <input type="text" name="part_weight" class="form-control" id="part_weight"
                            value="{{ old('part_weight') }}">
                        @error('part_weight')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="created_date">Created Date:</label>
                        <input type="date" name="created_date" class="form-control" id="created_date"
                            value="{{ old('created_date') }}">
                        @error('created_date')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>



            <!-- Material start -->
            <div class="row mt-4">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Material & Purchase Part</h4>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                        Add Material
                    </button>
                </div>
            </div>


            <div class="modal fade" id="myModal">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                        <div class="modal-header">
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <div class="modal-body table-responsive">
                            <table class="table table-bordered" id="material_table">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" name="main" id="main" class="form-check-input main">
                                        </th>
                                        <th>Part No</th>
                                        <th>Part Name</th>
                                        <th>Model</th>
                                        <th>Variance</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                        <tr>
                                            <td><input type="checkbox" value="{{$product->id}}"
                                                    class="form-check-input bodycheck" name="bodycheck" id="bodycheck"></td>
                                            <td>{{$product->part_no}}</td>
                                            <td>{{$product->part_name}}</td>
                                            <td>{{$product->model}}</td>
                                            <td>{{$product->variance}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Add</button>
                        </div>

                    </div>
                </div>
            </div>


            <div class="row mt-3 table-responsive">
                <table class="table table-bordered" id="outerTable">
                    <thead>
                        <tr>
                            <th>Sr.</th>
                            <th>Part No</th>
                            <th>Part Name</th>
                            <th>Model</th>
                            <th>Variance</th>
                            <th>Qty / Length Required</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>

            <!-- Material end -->


            <!-- Circuit Kanban start-->


            <div class="row mt-4">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Circuit / Kanban</h4>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#circuitModal">
                        Add Material
                    </button>
                </div>
            </div>

            <div class="modal fade" id="circuitModal">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                        <div class="modal-header">
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <div class="modal-body table-responsive">
                            <table class="table table-bordered" id="circuit_table">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" name="main" id="circuit_main"
                                                class="form-check-input circuit_main">
                                        </th>
                                        <th>Part No</th>
                                        <th>Part Name</th>
                                        <th>Model</th>
                                        <th>Variance</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                        <tr>
                                            <td><input type="checkbox" value="{{$product->id}}"
                                                    class="form-check-input circuit_bodycheck" name="circuit_bodycheck"
                                                    id="circuit_bodycheck"></td>
                                            <td>{{$product->part_no}}</td>
                                            <td>{{$product->part_name}}</td>
                                            <td>{{$product->model}}</td>
                                            <td>{{$product->variance}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Add</button>
                        </div>

                    </div>
                </div>
            </div>


            <div class="row mt-3 table-responsive">
                <table class="table table-bordered" id="circuitOuterTable">
                    <thead>
                        <tr>
                            <th>Sr.</th>
                            <th>Part No</th>
                            <th>Part Name</th>
                            <th>Model</th>
                            <th>Variance</th>
                            <th>Qty Required</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>


            <!-- Circuit Kanban end-->

            <!-- Process start -->

            <div class="row mt-4">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Process</h4>
                    <button type="button" class="btn btn-primary" id="add_row"><i class="fa-solid fa-plus me-1"></i> Add
                        Row</button>
                </div>
            </div>

            <div class="row mt-3 table-responsive">
                <table class="table table-bordered" id="process_table">
                    <thead>
                        <tr>
                            <th>Sr No.</th>
                            <th>Process</th>
                            <th>Process No</th>
                            <th>Material Purchase</th>
                            <th>Circuit / Kanban</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>


            <!-- Process end -->


            <div class="row mt-5">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="">
                        <a class="btn btn-primary" href="{{ route('engineering.bom.index') }}">
                            <i class="fa-solid fa-circle-arrow-left px-2"></i> Back
                        </a>
                    </div>
                    <div class="">
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    @endsection

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script>
            $(document).ready(function () {
                $('#product_id').select2();
                // material datatable start
                let materialTable = $('#material_table').DataTable({
                    columnDefs: [
                        { targets: [0], orderable: false },
                    ]
                });
                let outerTable = $('#outerTable').DataTable();
                // material datatable end

                // Circuit datatable start
                let circuitTable = $('#circuit_table').DataTable({
                    columnDefs: [
                        { targets: [0], orderable: false },
                    ]
                });
                let circuitOuterTable = $('#circuitOuterTable').DataTable();
                // Circuit datatable end

                // material checked start

                $('.main').on('click', function () {
                    let isChecked = $(this).prop('checked');
                    $('.bodycheck').prop('checked', isChecked);
                });


                $(document).on('click', '.bodycheck', function () {
                    let allChecked = $('.bodycheck:checked').length === $('.bodycheck').length;
                    $('.main').prop('checked', allChecked);
                });
                // material checked end

                // Circuit checked start

                $('.circuit_main').on('click', function () {
                    let isChecked = $(this).prop('checked');
                    $('.circuit_bodycheck').prop('checked', isChecked);
                });


                $(document).on('click', '.circuit_bodycheck', function () {
                    let allChecked = $('.circuit_bodycheck:checked').length === $('.circuit_bodycheck').length;
                    $('.circuit_main').prop('checked', allChecked);
                });
                // Circuit checked end

                // Material to Modal - Modal to material start

                $('#myModal .modal-footer .btn-dark').on('click', function () {
                    materialTable.rows().every(function () {
                        let row = this.node();
                        let checkbox = $(row).find('input[type="checkbox"]');

                        if (checkbox.is(':checked')) {
                            let serialNo = outerTable.rows().count() + 1;
                            let product_part_no = $(row).find('td:eq(1)').text().trim();
                            let product_part_name = $(row).find('td:eq(2)').text().trim();
                            let product_model = $(row).find('td:eq(3)').text().trim();
                            let product_variance = $(row).find('td:eq(4)').text().trim();

                            outerTable.row.add([
                                `<span class="text-start">${serialNo}</span>`,
                                `${product_part_no}<input name="materials[${checkbox.val()}][product_id]" type="hidden" value="${checkbox.val()}"/>`,
                                `${product_part_name}`,
                                `${product_model}`,
                                `${product_variance}`,
                                `<input class="form-control" type="number" name="materials[${checkbox.val()}][qty-length]" min="1">`,
                                `<button type='button' class="btn btn-danger remove-row"><i class="fa fa-trash"></i></button>`
                            ]).draw(false);


                            materialTable.row(this).remove().draw(false);
                        }
                    });

                    $('.main').prop('checked', false);
                    $('#myModal').modal('hide');
                });

                function updateMaterialSerialNumbers() {
                    $('#outerTable tbody tr').each(function (index) {
                        let serialNo = index + 1;
                        $(this).find('td:eq(0)').text(serialNo);
                    });
                }

                $(document).on('click', '.remove-row', function () {
                    let row = $(this).closest('tr');

                    let rowData = outerTable.row(row).data();
                    outerTable.row(row).remove().draw(false);

                    let product_part_no = rowData[1].split('<input')[0].trim();
                    let product_part_name = rowData[2].trim();
                    let product_model = rowData[3].trim();
                    let product_variance = rowData[4].trim();
                    let checkboxVal = rowData[1].match(/value="(\d+)"/)[1];

                    materialTable.row.add([
                        `<input class="form-check-input bodycheck" type="checkbox" value="${checkboxVal}" name="main">`,
                        product_part_no,
                        product_part_name,
                        product_model,
                        `<span class="text-start">${product_variance}</span>`
                    ]).draw(false);

                    updateMaterialSerialNumbers();
                });

                // Material to Modal - Modal to material end


                // Circuit to Modal - Modal to Circuit start

                $('#circuitModal .modal-footer .btn-dark').on('click', function () {
                    circuitTable.rows().every(function () {
                        let row = this.node();
                        let checkbox = $(row).find('input[type="checkbox"]');

                        if (checkbox.is(':checked')) {
                            let serialNo = circuitOuterTable.rows().count() + 1;
                            let product_part_no = $(row).find('td:eq(1)').text().trim();
                            let product_part_name = $(row).find('td:eq(2)').text().trim();
                            let product_model = $(row).find('td:eq(3)').text().trim();
                            let product_variance = $(row).find('td:eq(4)').text().trim();

                            circuitOuterTable.row.add([
                                `<span class="text-start">${serialNo}</span>`,
                                `${product_part_no}<input name="circuits[${checkbox.val()}][product_id]" type="hidden" value="${checkbox.val()}"/>`,
                                `${product_part_name}`,
                                `${product_model}`,
                                `${product_variance}`,
                                `<input class="form-control" type="number" name="circuits[${checkbox.val()}][qty-required]" min="1">`,
                                `<button type='button' class="btn btn-danger circuit-remove-row"><i class="fa fa-trash"></i></button>`
                            ]).draw(false);


                            circuitTable.row(this).remove().draw(false);
                        }
                    });

                    $('.circuit_main').prop('checked', false);
                    $('#circuitTable').modal('hide');
                });



                function updateCircuitSerialNumbers() {
                    $('#circuitOuterTable tbody tr').each(function (index) {
                        let serialNo = index + 1;
                        $(this).find('td:eq(0)').text(serialNo);
                    });
                }

                $(document).on('click', '.circuit-remove-row', function () {
                    let row = $(this).closest('tr');

                    let rowData = circuitOuterTable.row(row).data();
                    circuitOuterTable.row(row).remove().draw(false);

                    let product_part_no = rowData[1].split('<input')[0].trim();
                    let product_part_name = rowData[2].trim();
                    let product_model = rowData[3].trim();
                    let product_variance = rowData[4].trim();
                    let checkboxVal = rowData[1].match(/value="(\d+)"/)[1];

                    circuitTable.row.add([
                        `<input class="form-check-input circuit_bodycheck" type="checkbox" value="${checkboxVal}">`,
                        product_part_no,
                        product_part_name,
                        product_model,
                        `<span class="text-start">${product_variance}</span>`
                    ]).draw(false);

                    updateCircuitSerialNumbers();
                });

                // Circuit to Modal - Modal to Circuit end


                // Product Select start

                $('.product_id').on('change', function () {
                    const selectedOption = $(this).find(':selected');
                    $('#part_name').val(selectedOption.data('part_name') || '');
                    $('#model').val(selectedOption.data('model') || '');
                    $('#variance').val(selectedOption.data('variance') || '');
                    $('#type_of_product').val(selectedOption.data('type_of_product') || '');

                    const selectedProductId = selectedOption.val();

                    materialTable.rows().every(function () {
                        const row = this.node();
                        const rowProductId = $(row).find('.bodycheck').val().trim();

                        if (rowProductId === selectedProductId) {
                            this.remove();
                        }
                    });

                    materialTable.draw(false);

                    circuitTable.rows().every(function () {
                        const row = this.node();
                        const rowProductId = $(row).find('.circuit_bodycheck').val().trim();

                        if (rowProductId === selectedProductId) {
                            this.remove();
                        }
                    });

                    circuitTable.draw(false);
                });

                // Product Select End

                // process start

                let process_table = $('#process_table').DataTable();

                function updateProcessSerialNumbers() {
                    $('#process_table tbody tr').each(function (index) {
                        let serialNo = index + 1;
                        $(this).find('td:eq(0)').text(serialNo);
                    });
                }

                $('#add_row').on('click', function () {
                    let serialNo = process_table.rows().count() + 1;

                    let materialOptions = '';
                    $('#outerTable tbody tr').each(function () {
                        let partName = $(this).find('td:eq(2)').text().trim();
                        if (partName) {
                            materialOptions += `<option value="${partName}">${partName}</option>`;
                        }
                    });

                    let circuitOptions = '';
                    $('#circuitOuterTable tbody tr').each(function () {
                        let partName = $(this).find('td:eq(2)').text().trim();
                        if (partName) {
                            circuitOptions += `<option value="${partName}">${partName}</option>`;
                        }
                    });

                    // Add new row
                    let newRow = process_table.row.add([
                        `<span class="text-start">${serialNo}</span>`,
                        `<select class="form-select process_id" name="process_name[]">
                            @foreach ($processes as $process)
                                <option value="{{$process->id}}">{{$process->name}}</option>
                            @endforeach
                        </select>`,
                        `<input type="text" class="form-control" name="process_no">`,
                        `<select class="form-select material_purchase" name="material_purchase[]" multiple>${materialOptions}</select>`,
                        `<select class="form-select circuit_kanban" name="circuit_kanban[]" multiple>${circuitOptions}</select>`,
                        `<button type='button' class="btn btn-danger process-remove-row"><i class="fa fa-trash"></i></button>`
                    ]).draw(false).node();

                    // Apply select2 on the newly added row's select elements
                    $(newRow).find('.material_purchase').select2();
                    $(newRow).find('.circuit_kanban').select2();
                    $(newRow).find('.process_id').select2();
                });


                $('#process_table').on('click', '.process-remove-row', function () {
                    process_table.row($(this).closest('tr')).remove().draw();
                    updateProcessSerialNumbers();
                });

                // process End


            });

        </script>


    @endpush