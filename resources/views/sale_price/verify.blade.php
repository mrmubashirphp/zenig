@extends('layouts.app')

@section('title', 'Verify Sale Price')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-5">
        <h1 class="mb-4">Verify Sale Price</h1>
        <a href="{{ route('saleprice.index') }}" class="btn btn-primary mb-4">Back to List</a>
    </div>

    <div class="card">
        <div class="card-header">
            <h4>Sale Price Information</h4>
        </div>
        <div class="d-flex justify-content-between align-items-center mb-5">
        <h1 class="mb-4">Verify Sale Price</h1>
        <a href="{{ route('saleprice.index') }}" class="btn btn-primary mb-4">Back to List</a>
    </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <p><strong>Part No:</strong> {{ $salePrice->part_no }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Part Name:</strong> {{ $salePrice->part_name }}</p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <p><strong>Model:</strong> {{ $salePrice->model }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Variance:</strong> {{ $salePrice->variance }}</p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <p><strong>Unit:</strong> {{ $salePrice->unit }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Price per Unit (RM):</strong> RM {{ number_format($salePrice->price_per_unit, 2) }}</p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <p><strong>Effective Date:</strong> {{ $salePrice->effective_date->format('Y-m-d') }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Status:</strong> {{ $salePrice->status }}</p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <p><strong>Product Type:</strong> {{ $salePrice->product->typeOfProduct ? $salePrice->product->typeOfProduct->name : 'N/A' }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Category:</strong> {{ $salePrice->product->category ? $salePrice->product->category->name : 'N/A' }}</p>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-end gap-2 mb-3 me-3">
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#verifyModal" onclick="setAction('Completed')">Verify</button>
            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#verifyModal" onclick="setAction('Declined')">Decline</button>
            <a href="{{ route('saleprice.index') }}" class="btn btn-warning">Cancel</a>
        </div>
    </div>
</div>

<div class="modal fade" id="verifyModal" tabindex="-1" aria-labelledby="verifyModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="verifyModalLabel">Verify Sale Price</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-2">
                <table class="table table-borderless mb-0">
                    <tbody>
                        <tr>
                            <td><strong>Date:</strong></td>
                            <td><strong>User:</strong></td>
                            <td><strong>Designation:</strong></td>
                            <td><strong>Department:</strong></td>
                        </tr>
                        <tr>
                            <td>{{ now()->format('Y-m-d') }}</td>
                            <td>{{ auth()->user()->name }}</td>
                            <td>
                                <select class="form-control" id="designation" name="designation">
                                    <option value="">Select Designation</option>
                                    @foreach ($designations as $designation)
                                        <option value="{{ $designation->id }}">{{ $designation->name }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <select class="form-control" id="department" name="department">
                                    <option value="">Select Department</option>
                                    @foreach ($departments as $department)
                                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4"><strong>Reason:</strong></td>
                        </tr>
                        <tr>
                            <td colspan="4">
                                <textarea class="form-control" id="reason" name="reason" rows="3" placeholder="Enter reason"></textarea>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <form action="{{ route('saleprice.verify', $salePrice->id) }}" method="POST" id="verifyForm">
                    @csrf
                    <input type="hidden" name="designation_id" id="designation_id">
                    <input type="hidden" name="department_id" id="department_id">
                    <input type="hidden" name="reason" id="reason_input">
                    <input type="hidden" name="status" id="status_input">
                    <button type="submit" class="btn btn-success" onclick="setHiddenFields()">Confirm</button>
                </form>
                <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<script>
    let actionStatus = '';

    // Set action status when button is clicked
    function setAction(status) {
        actionStatus = status;
    }

    // Set hidden fields and ensure 'status' is set before submission
    function setHiddenFields() {
        if (!actionStatus) {
            alert('Please select an action (Verify or Decline).');
            return;
        }

        // Set the hidden fields before form submission
        document.getElementById('status_input').value = actionStatus;
        document.getElementById('designation_id').value = document.getElementById('designation').value;
        document.getElementById('department_id').value = document.getElementById('department').value;
        document.getElementById('reason_input').value = document.getElementById('reason').value;

        // Submit the form
        document.getElementById('verifyForm').submit();
    }
</script>

@endsection
