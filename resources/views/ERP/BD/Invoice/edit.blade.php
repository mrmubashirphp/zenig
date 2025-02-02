@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">
        <h4>Invoice Edit</h4>
    </div>

    <form action="{{route('bd.invoice.update', $invoice->id)}}" method="post">
        @csrf
        @method('PUT')
        <div class="card-body">
            <div class="row my-3">
                <div class="col-md-6">
                    <div class="form-group pt-2">
                        <label for="">DO No:</label>
                        <select class="form-select do_no" name="do_no" id="do_no">
                            <option value="" selected disabled>Select any One</option>
                            <option value="do_no_1" {{$invoice->do_no == 'do_no_1' ? 'selected' : ''}}>DO No 1</option>
                            <option value="do_no_2" {{$invoice->do_no == 'do_no_2' ? 'selected' : ''}}>DO No 2</option>
                            <option value="do_no_3" {{$invoice->do_no == 'do_no_3' ? 'selected' : ''}}>DO No 3</option>
                        </select>
                        @error('do_no')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Invoice No:</label>
                        <input type="text" class="form-control" name="invoice_no" value="{{ $invoice->invoice_no }}"
                            id="invoice_no">
                        @error('invoice_no')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row my-3">
                <div class="col-md-6">
                    <div class="form-group pt-2">
                        <label for="customer">Customer:</label>
                        <select class="form-select customer" name="customer" id="customer">
                            <option value="" selected disabled>Select any One</option>
                            @foreach ($cutomers as $cutomer)
                                <option value="{{$cutomer->id}}" data-address='{{$cutomer->address}}'
                                    data-pic_name='{{$cutomer->pic_name}}' data-phone_no='{{$cutomer->phone_no}}'
                                    data-pic_fax='{{$cutomer->pic_fax}}' {{ $invoice->cutomer_id == $cutomer->id ? 'selected' : '' }}>
                                    {{$cutomer->name}}
                                </option>
                            @endforeach
                        </select>
                        @error('customer')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="date">Date:</label>
                        <input type="date" class="form-control" name="date" value="{{$invoice->date}}" id="date">
                        @error('date')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row my-3">
                <div class="col-md-6">
                    <div class="form-group pt-2">
                        <label for="address">Address:</label>
                        <textarea name="address" class="form-control"
                            id="address">{{ $invoice->customer->address }}</textarea>
                        @error('address')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="create_by">Create By:</label>
                        <input type="text" class="form-control" name="create_by" value="{{ $invoice->create_by }}"
                            id="create_by">
                        @error('create_by')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row my-3">
                <div class="col-md-6">
                    <div class="form-group pt-2">
                        <label for="attn">Attn:</label>
                        <input type="text" name="attn" class="form-control" id="attn"
                            value="{{ $invoice->customer->pic_name }}">
                        @error('attn')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="term">Term:</label>
                        <input type="text" class="form-control" name="term" value="{{ $invoice->term }}" id="term">
                        @error('term')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row my-3">
                <div class="col-md-6">
                    <div class="form-group pt-2">
                        <label for="tel">Tel:</label>
                        <input type="tel" name="tel" class="form-control" id="tel"
                            value="{{ $invoice->customer->phone_no }}">
                        @error('tel')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="fax">Fax:</label>
                        <input type="text" class="form-control" name="fax" value="{{ $invoice->customer->pic_fax }}"
                            id="fax">
                        @error('fax')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row my-3">
                <div class="col-md-6">
                    <div class="form-group pt-2">
                        <label for="ac_no">A/C No:</label>
                        <input type="text" name="ac_no" class="form-control" id="ac_no" value="{{ $invoice->ac_no }}">
                        @error('ac_no')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>


            <div class="row mt-5 mb-3 text-end">
                <div class="col-md">
                    <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#myModal">
                        Product
                    </button>
                </div>
            </div>

            <!-- The Modal -->
            <div class="modal fade" id="myModal">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <table class="table table-bordered" id="myModalTable">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" class="form-check-input main" name="main" id="main"></th>
                                        <th>Part No.</th>
                                        <th>Part Name</th>
                                        <th class="text-start">Unit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                        @if(!in_array($product->id, $invoice->invoice_detail->pluck('product_id')->toArray()))
                                            <tr>
                                                <td><input type="checkbox" value="{{$product->id}}"
                                                        class="form-check-input bodycheck" name="bodycheck" id="bodycheck"></td>
                                                <td>{{$product->part_no}}</td>
                                                <td>{{$product->part_name}}</td>
                                                <td class="text-start">{{$product->unit->name}}</td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" data-bs-dismiss="modal" class="btn btn-dark">Add</button>
                        </div>

                    </div>
                </div>
            </div>



            <div class="row">
                <div class="col-md">
                    <div class="form-group my-3">
                        <table class="table table-bordered" id="outerTable">
                            <thead>
                                <tr>
                                    <th>Sr No.</th>
                                    <th>Part No.</th>
                                    <th>Part Name</th>
                                    <th>Unit</th>
                                    <th>Quantity</th>
                                    <th>Unit Price</th>
                                    <th class="text-start">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($invoice->invoice_detail as $detail)
                                    <tr data-index="{{$loop->iteration}}">
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$detail->product->part_no ?? ''}}<input
                                                name="products[{{$detail->product->id ?? ''}}][product_id]" type="hidden"
                                                value="{{$detail->product->id ?? ''}}" /></td>
                                        <td>{{$detail->product->part_name ?? ''}}</td>
                                        <td>{{$detail->product->unit->name ?? ''}}</td>
                                        <td><input class="form-control" type="number" value="{{$detail->quantity ?? 1}}"
                                                name="products[{{$detail->product->id ?? ''}}][quantity]"></td>
                                        <td><input class="form-control" type="number" value="{{$detail->unit_price ?? 1}}"
                                                name="products[{{$detail->product->id ?? ''}}][unit_price]"></td>
                                        <td class="text-start"><button class="btn btn-danger remove-row"><i class="fa fa-trash"></i></button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>





            <div class="row mt-5">
                <div class="col-sm-2 float-start">
                    <a class="btn btn-primary" href="{{ route('bd.invoice.index') }}">
                        <i class="fa-solid fa-circle-arrow-left px-2"></i> Back
                    </a>
                </div>
                <div class="col-sm-1 offset-9">
                    <button class="btn btn-primary" type="submit">Update</button>
                </div>
            </div>
        </div>
    </form>

    @endsection

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script>
            $(document).ready(function () {

                let outerTable = $('#outerTable').DataTable();
                let modalTable = $('#myModalTable').DataTable({
                    columnDefs: [
                        { targets: [0], orderable: false },
                    ]
                });

                $('.main').on('click', function () {
                    let isChecked = $(this).prop('checked');
                    $('.bodycheck').prop('checked', isChecked);
                });


                $(document).on('click', '.bodycheck', function () {
                    let allChecked = $('.bodycheck:checked').length === $('.bodycheck').length;
                    $('.main').prop('checked', allChecked);
                });

                $('#myModal .modal-footer .btn-dark').on('click', function () {
                    modalTable.rows().every(function () {
                        let row = this.node();
                        let checkbox = $(row).find('input[type="checkbox"]');

                        if (checkbox.is(':checked')) {
                            let serialNo = outerTable.rows().count() + 1;
                            let product_part_no = $(row).find('td:eq(1)').text().trim();
                            let product_part_name = $(row).find('td:eq(2)').text().trim();
                            let product_unit_name = $(row).find('td:eq(3)').text().trim();

                            outerTable.row.add([
                                `<span class="text-start">${serialNo}</span>`,
                                `${product_part_no}<input name="products[${checkbox.val()}][product_id]" type="hidden" value="${checkbox.val()}"/>`,
                                `${product_part_name}`,
                                `${product_unit_name}`,
                                `<input class="form-control" type="number" name="products[${checkbox.val()}][quantity]">`,
                                `<input class="form-control" type="number" name="products[${checkbox.val()}][unit_price]">`,
                                `<button type='button' class="btn btn-danger remove-row"><i class="fa fa-trash"></i></button>`
                            ]).draw(false);

                            modalTable.row(this).remove().draw(false);
                        }
                    });

                    $('.main').prop('checked', false);
                    $('#myModal').modal('hide');
                });

                function updateSerialNumbers() {
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
                    let product_unit_name = rowData[3].trim();
                    let checkboxVal = rowData[1].match(/value="(\d+)"/)[1];

                    modalTable.row.add([
                        `<input class="form-check-input bodycheck" type="checkbox" value="${checkboxVal}" name="main">`,
                        product_part_no,
                        product_part_name,
                        `<span class="text-start">${product_unit_name}</span>`
                    ]).draw(false);

                    updateSerialNumbers();
                });

                $('.customer').on('change', function () {
                    const selectedOption = $(this).find(':selected');
                    $('#address').val(selectedOption.data('address') || '');
                    $('#attn').val(selectedOption.data('pic_name') || '');
                    $('#tel').val(selectedOption.data('phone_no') || '');
                    $('#fax').val(selectedOption.data('pic_fax') || '');
                });
            });

        </script>
    @endpush