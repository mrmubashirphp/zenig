@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">
        <h4 class="card-title">General Setting</h4>
    </div>
    <div class="card-body">
        <!-- Nav tabs -->
        <div class="default-tab">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="tab" href="#sst-percentage"><i
                            class="la la-sst-percentage me-2"></i>
                        SST Percentage</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#po-important-note">
                        PO Important Note</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#spec-break">
                        Spec Break</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#initial-ref-no">
                        Initial Ref No</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#pr-approval">
                        PR Approval</a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="sst-percentage" role="tabpanel">
                    <div class="pt-4">
                        <form action="{{route('general.setting.sst_percentage_store')}}" method="post">
                            @csrf
                            <div class="row mt-3">
                                <div class="col-md-4">
                                    <label for="sst_percentage">SST Percentage (%)</label>
                                    <input type="number" name="sst_percentage"
                                        value="{{$sst_percentages->sst_percentage}}" class="form-control"
                                        id="sst_percentage">
                                </div>
                            </div>
                            <div class="row mt-5 text-end">
                                <div class="col">
                                    <button class="btn btn-primary" type="submit">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="tab-pane fade" id="po-important-note">
                    <div class="pt-4">
                        <form action="{{route('general.setting.po_important_note_store')}}" method="post">
                            @csrf
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <label for="po_important_note">PO Important Note</label>
                                    <textarea name="po_important_note" class="form-control"
                                        id="po_important_note">{{$po_important_note->po_important_note}}</textarea>
                                </div>
                            </div>
                            <div class="row mt-5 text-end">
                                <div class="col">
                                    <button class="btn btn-primary" type="submit">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="tab-pane fade" id="spec-break">
                    <div class="pt-4">
                        <form action="{{route('general.setting.spec_break_store')}}" method="post">
                            @csrf
                            <div class="row mt-3">
                                <div class="col-md-4">
                                    <label for="normal_hour">Normal Hour</label>
                                    <input type="number" name="normal_hour" value="{{$spec_break->normal_hour}}"
                                        class="form-control" id="normal_hour">
                                </div>
                                <div class="col-md-4">
                                    <label for="ot_hour">OT Hour</label>
                                    <input type="number" name="ot_hour" value="{{$spec_break->ot_hour}}"
                                        class="form-control" id="ot_hour">
                                </div>
                            </div>
                            <div class="row mt-5 text-end">
                                <div class="col">
                                    <button class="btn btn-primary" type="submit">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="tab-pane fade" id="initial-ref-no">
                    <div class="pt-4">
                        <form action="{{route('general.setting.initial_ref_no_store')}}" method="post">
                            @csrf
                            <div class="row">
                                <h4>Initial Ref No</h4>
                                <div class="text-end mb-2">
                                    <button class="btn btn-primary" id="add_row" type="button"><i
                                            class="fa-solid fa-plus"></i>
                                        Add</button>
                                </div>
                            </div>
                            <div class="row my-3">
                                <div class="col">
                                    <table class="table table-bordered" id="initial_ref_no">
                                        <thead>
                                            <tr>
                                                <th>Sr No.</th>
                                                <th>Ref No.</th>
                                                <th>Running No.</th>
                                                <th>Sample</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row mt-5 text-end">
                                <div class="col">
                                    <button class="btn btn-primary" type="submit">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="tab-pane fade" id="pr-approval">
                    <div class="pt-4">
                        <form action="{{route('general.setting.pr_approval_store')}}" method="post">
                            @csrf
                            <div class="row">
                                <h4>PR Approval</h4>
                                <div class="text-end mb-2">
                                    <button class="btn btn-primary" id="add_row_aprroval" type="button"><i
                                            class="fa-solid fa-plus"></i>
                                        Add</button>
                                </div>
                                <div class="row my-3">
                                    <div class="col">
                                        <table class="table table-bordered" id="pr_approval">
                                            <thead>
                                                <tr>
                                                    <th>Sr No.</th>
                                                    <th>Designation</th>
                                                    <th>Department</th>
                                                    <th>Less/More than</th>
                                                    <th>Amount(RM)</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row mt-5 text-end">
                                    <div class="col">
                                        <button class="btn btn-primary" type="submit">Save</button>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection


@push('scripts')

    <script>
        let initial_ref_no = $('#initial_ref_no').DataTable();

        function updateProcessSerialNumbers() {
            $('#initial_ref_no tbody tr').each(function (index) {
                let serialNo = index + 1;
                $(this).find('td:eq(0)').text(serialNo);
            });
        }

        $('#add_row').on('click', function () {
            let serialNo = initial_ref_no.rows().count() + 1;

            let newRow = initial_ref_no.row.add([
                `<span class="text-start">${serialNo}</span>`,
                `<select class="form-select ref_no" name="refNo[${serialNo}][ref_no]">
                                            @foreach ($qoutation as $qoutations)
                                                 <option value="{{$qoutations->id}}">{{$qoutations->ref_no}}</option>
                                            @endforeach
                                        </select>`,
                `<input type="number" class="form-control" name="refNo[${serialNo}][running_no]">`,
                `<input type="number" class="form-control" name="refNo[${serialNo}][sample]">`,
                `<button type='button' class="btn btn-danger process-remove-row"><i class="fa fa-trash"></i></button>`
            ]).draw(false).node();

            $(newRow).find('.ref_no').select2();
        });



        $('#initial_ref_no').on('click', '.process-remove-row', function () {
            initial_ref_no.row($(this).closest('tr')).remove().draw();
            updateProcessSerialNumbers();
        });




        // Pr Approval
        let pr_approval = $('#pr_approval').DataTable();

        function updateapprovalSerialNumbers() {
            $('#pr_approval tbody tr').each(function (index) {
                let serialNo = index + 1;
                $(this).find('td:eq(0)').text(serialNo);
            });
        }

        $('#add_row_aprroval').on('click', function () {
            let serialNo = pr_approval.rows().count() + 1;

            let newRow = pr_approval.row.add([
                `<span class="text-start">${serialNo}</span>`,
                `<select class="form-select designation" name="pr_approval[${serialNo}][designation]">
                    @foreach ($designation as $designations)
                            <option value="{{$designations->id}}">{{$designations->name}}</option>
                    @endforeach
                </select>`,
                `<select class="form-select department" name="pr_approval[${serialNo}][department]">
                    @foreach ($department as $departments)
                            <option value="{{$departments->id}}">{{$departments->name}}</option>
                    @endforeach
                </select>`,
                `<select class="form-select less_grate" name="pr_approval[${serialNo}][less_grate]">
                        <option value=">">></option>
                        <option value="<"><</option>
                        <option value="=">=</option>
                </select>`,
                `<input type="number" class="form-control" name="pr_approval[${serialNo}][amount]">`,
                `<button type='button' class="btn btn-danger approval-remove-row"><i class="fa fa-trash"></i></button>`
            ]).draw(false).node();

            $(newRow).find('.less_grate').select2();
            $(newRow).find('.designation').select2();
            $(newRow).find('.department').select2();
        });



        $('#pr_approval').on('click', '.approval-remove-row', function () {
            pr_approval.row($(this).closest('tr')).remove().draw();
            updateapprovalSerialNumbers();
        });
    </script>

@endpush